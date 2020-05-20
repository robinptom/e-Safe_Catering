<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct(){

		parent::__construct();
		if($this->session->userdata('logged_in') != true){
		redirect('Login');
		}

        $this->load->library('form_validation');
	    $this->load->library('encrypt');
		$this->load->model('Login_model');
    	$this->load->model('Admin_model');
      $this->load->model('Common_model');
    	$this->load->library('pdf');
	}

	public function index(){

		if($this->session->userdata('level')==='1'){
          $data['userdata'] = $this->Login_model->get_user_profile($this->session->userdata('user_id')); 
          $query= $this->Login_model->user_password_change_page_redirect($this->session->userdata('user_id'));

         if(!empty($query)) {
            $this->load->view('admin_header', $data);
          	$this->load->view('admin_profile', $data);
          }else{
            $this->load->view('admin_header', $data);
          	$this->load->view('admin_panel');
          }
        }
	}

	public function create_user(){ 

		//$data['data'] = $this->Admin_model->getRoles();
    $data['auditor'] = $this->Admin_model->view_auditor();
    $this->load->view('admin_header', $data);
		$this->load->view('user_create');
	}

	public function role_insert_validation(){

		$this->form_validation->set_rules('ud_email', 'Email', 'required|trim');
		$this->form_validation->set_rules('ud_fname', 'First Name', 'required|trim');
		$this->form_validation->set_rules('ud_lname', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('ud_address', 'Address', 'required|trim');
		$this->form_validation->set_rules('ud_phone', 'Phone Number', 'required|numeric|trim');
		$this->form_validation->set_rules('role', 'Select User', 'required');
		if($this->form_validation->run() == false){

			$this->create_user();
		}
		else{
      if ($this->input->post('role')=='3') {
        $auditorsid = $this->input->post('auditors');
        if ($auditorsid=='') {
          $this->session->set_flashdata('error','Auditor selection is required for vendor creation!');
          redirect('Admin/create_user');
        }else{
          $selectorid =  $auditorsid;
        }
        $liscenece = $this->input->post('unique_id_vendor');
    $result    = $this->Common_model->checkvendorliscenece($liscenece);
    if ($result>0) {
      
        $this->session->set_flashdata('error','Vendor licence number already exists!');
      redirect('Admin/create_user');
    }else{
    
    }
      }

      /*-------------------------------------------*/
           $email = $this->input->post('ud_email');
    $resulte    = $this->Common_model->checkemail($email);
    if ($resulte>0) {
      
        $this->session->set_flashdata('error','Email id already exists!');
      redirect('Admin/create_user');
    }else{
    
    }
    if ($selectorid=='') {
     $selectorid =  $this->input->post('hidden_id');
    }
      /*-------------------------------------------*/
			$result = array(
				'user_role'	        =>	$this->input->post('role'),
				'user_name'			    =>	$this->input->post('ud_email'),
				'user_pwd'  		    =>  'safecatering',  //temporary user login password
				'user_created_date'	=>	date('Y-m-d H:i:s'),
				'user_created_by'   =>  $selectorid,
        'user_vendor_id'    =>  $this->input->post('unique_id_vendor'),
        'user_active_status' => true
			);

			$id = $this->Admin_model->user_insert($result);

			$data = array(
				'ud_user_id'	=>	$id,
				'ud_fname'		=>	$this->encrypt->encode($this->input->post('ud_fname')),
				'ud_lname'		=>	$this->encrypt->encode($this->input->post('ud_lname')),
				'ud_address'	=>	$this->encrypt->encode($this->input->post('ud_address')),
				'ud_ph_no'		=>	$this->encrypt->encode($this->input->post('ud_phone')),
			);
			
			$this->Admin_model->role_insert($data);
			
			$to =  $this->input->post('ud_email');  
   			$subject = 'Welcome To Safe Catering';       
    		$emailContent = ('Hello Sir/Madam,<br/><br/>Your Temporary Login Password,<br/><br/><b style="color:red">Password: safecatering,</b><br/><br/>Thank you.');  

			 $this->load->library('Mailer');

    		$mail = new PHPMailer\PHPMailer\PHPMailer();
			$mail->isSMTP();
			$mail->Host 		='smtp.gmail.com' ;
			$mail->Port 		='587';
			$mail->SMTPAuth 	= true;
			$mail->SMTPSecure 	= 'tls';
			$mail->Username 	='esafecatering@gmail.com';
			$mail->Password 	= 'e-safe@2020';
			$mail->setFrom('esafecatering@gmail.com','SAFE CATERING');
			$mail->addAddress($to);
			$mail->addReplyTo('esafecatering@gmail.com');
			
			
			$mail->isHTML(true);
			$mail->Subject 		= $subject;
			$mail->Body 		= $emailContent;
			if(!$mail->send())
			{
				$this->session->set_flashdata('msg',"Mail sending failed");
				$this->session->set_flashdata('msg_class','Try again after some time');	
				redirect('Admin');
			}
			else{
				$this->session->set_flashdata('msg',"Mail has been sent successfully");
			    $this->session->set_flashdata('msg_class','alert-success');	
			    redirect('Admin');
			}
			
		}
	}

	public function change_admin_password(){

		$userid = $this->session->userdata('user_id');
		$update = $this->Login_model->update_admin_password($userid);
		            $this->session->unset_userdata('logged_in');
    $id     =  $this->session->userdata('user_id');
    $updateArr  = array(
          'log_user_role'   => $this->session->userdata('level'),
          'log_date'        => date('Y-m-d'),
          'log_time'        => date('H:i:s'),
          'logged_in_status'  => false
        );
    
    $update_log   =    $this->Login_model->update_log($id,$updateArr);
		redirect('Login');
    }

    public function suspend_auditor(){

     $id = $this->input->get('id');
     $data = array('user_active_status' => false  );
     $update_suspend = $this->Admin_model->suspend_auditor_action($id,$data);
     redirect('Admin/auditor_view');

    }
    public function suspend_vendor(){

     $id = $this->input->get('id');
     $data = array('user_active_status' => false  );
     $update_suspend = $this->Admin_model->suspend_vendor_action($id,$data);
     redirect('Admin/vendor_view');
    }


      function admin_view(){

      $data['data'] = $this->Admin_model->view_admin();
      /*echo "<pre>"; print_r($data); die();*/
      $this->load->view('admin_header', $data);
      $this->load->view('admin_view'); 
  }

	function auditor_view(){

  		$data['data'] = $this->Admin_model->view_auditor();
      //echo "<pre>"; print_r($data); die();
      $this->load->view('admin_header', $data);
  		$this->load->view('auditor_view');	
	}

	function edit_auditor(){

		$data['data'] = $this->Admin_model->fetch_auditor_data($this->uri->segment(3));
    $this->load->view('admin_header', $data);
		$this->load->view('edit_auditor');
	}

  function edit_admin(){

    $data['data'] = $this->Admin_model->fetch_admin_data($this->uri->segment(3));
    $this->load->view('admin_header', $data);
    $this->load->view('edit_admin');
  }

	function edit_view_vendor($user_id=''){	

		 $result = $this->Admin_model->fetch_vendor_data($user_id);
     $data['data'] = $result;
     $data['auditor'] = $this->Admin_model->view_auditor();
     $this->load->view('admin_header', $data);
		$this->load->view('edit_vendor');
	}

	function edit_view_supplier(){	

		$data['data'] = $this->Admin_model->fetch_supplier_data($this->uri->segment(3));
		$this->load->view('edit_supplier', $data);
	}

	function delete_id($udid,$userid){

		/*$id = $this->input->get('id');*/
		$deleteId = $this->Admin_model->delete_row($udid);
    $deleteId = $this->Admin_model->delete_rowuser($userid);
		/*$data['data'] = $this->Admin_model->view_auditor();*/
  		/*$this->load->view('auditor_view', $data);*/	
       redirect('Admin/auditor_view');
	}


  function admindelete_id($udid,$userid){

    /*$id = $this->input->get('id');*/
    $deleteId = $this->Admin_model->delete_row($udid);
    $deleteId = $this->Admin_model->delete_rowuser($userid);
    /*$data['data'] = $this->Admin_model->view_auditor();*/
      /*$this->load->view('auditor_view', $data);*/ 
       redirect('Admin/admin_view');
  }


	function delete_vendor($udid,$userid){

		/*$id = $this->input->get('id');*/
		$deleteId = $this->Admin_model->delete_by_row($udid);
    $deleteId = $this->Admin_model->delete_by_rowuser($userid);
		/*$data['data'] = $this->Admin_model->view_vendor();*/
		/*$this->load->view('vendor_view', $data);*/	
    redirect('Admin/vendor_view');
	}

	function delete_supplier(){

		$id = $this->input->get('id');
		$deleteId = $this->Admin_model->delete_sup($id);
		$data['data'] = $this->Admin_model->fetch_sup_detail();
		$this->load->view('supplier_view',$data);		
	}

  function admin_edit(){

    $this->form_validation->set_rules('ud_fname', 'First Name', 'required');
    $this->form_validation->set_rules('ud_lname', 'Last Name', 'required');
    $this->form_validation->set_rules('ud_address', 'Address', 'required');
    $this->form_validation->set_rules('ud_phone', 'Phone Number', 'required');
    if($this->form_validation->run() == false){

      $this->edit_auditor(); 
    }
    else{

      $this->load->library('encrypt');

      $data = array(
        'ud_fname'   => $this->encrypt->encode($this->input->post('ud_fname')),
        'ud_lname'   => $this->encrypt->encode($this->input->post('ud_lname')),
        'ud_address' => $this->encrypt->encode($this->input->post('ud_address')),
        'ud_ph_no'   => $this->encrypt->encode($this->input->post('ud_phone'))
        
      );

      $this->Admin_model->edit_auditor($this->input->post('hidden_id'), $data);

      $data2 = array(
        'user_name'   => $this->input->post('ud_email')
      );

      $this->Admin_model->edit_auditoruser($this->input->post('hidden_id'), $data2);
      redirect('Admin/admin_view');
    }
  }

	function auditor_edit(){

		$this->form_validation->set_rules('ud_fname', 'First Name', 'required');
		$this->form_validation->set_rules('ud_lname', 'Last Name', 'required');
		$this->form_validation->set_rules('ud_address', 'Address', 'required');
		$this->form_validation->set_rules('ud_phone', 'Phone Number', 'required');
		if($this->form_validation->run() == false){

			$this->edit_auditor(); 
		}
		else{

			$this->load->library('encrypt');

			$data = array(
				'ud_fname'	 =>	$this->encrypt->encode($this->input->post('ud_fname')),
				'ud_lname'	 =>	$this->encrypt->encode($this->input->post('ud_lname')),
				'ud_address' =>	$this->encrypt->encode($this->input->post('ud_address')),
				'ud_ph_no'	 =>	$this->encrypt->encode($this->input->post('ud_phone'))
				
			);

			$this->Admin_model->edit_auditor($this->input->post('hidden_id'), $data);

      $data2 = array(
        'user_name'   => $this->input->post('ud_email')
      );

      $this->Admin_model->edit_auditoruser($this->input->post('hidden_id'), $data2);
			redirect('Admin/auditor_view');
		}
	}

	function vendor_edit(){

		$this->form_validation->set_rules('ud_fname', 'First Name', 'required|trim');
		$this->form_validation->set_rules('ud_lname', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('ud_address', 'Address', 'required|trim');
		$this->form_validation->set_rules('ud_phone', 'Phone Number', 'required|numeric|trim');
		if($this->form_validation->run() == false){

			$this->edit_view_vendor();
		}
		else
		{
			$this->load->library('encrypt');
         if ($this->input->post('auditors')=='') {
          $this->session->set_flashdata('error','Auditor selection is required for vendor creation!');
          redirect('Admin/edit_view_vendor/'.$this->input->post('hidden_id'));
        }else{
         $data2 = array(
          'user_name'         => $this->input->post('ud_email'),
          'user_created_by'   => $this->input->post('auditors')
      );
         $this->Admin_model->edit_vendoruser($this->input->post('hidden_id'), $data2);
         
        }
			$data = array(
				'ud_fname'	 =>	$this->encrypt->encode($this->input->post('ud_fname')),
				'ud_lname'	 =>	$this->encrypt->encode($this->input->post('ud_lname')),
				'ud_address' =>	$this->encrypt->encode($this->input->post('ud_address')),
				'ud_ph_no'	 =>	$this->encrypt->encode($this->input->post('ud_phone')),
			);

			$this->Admin_model->edit_vendor($this->input->post('hidden_id'), $data);

			redirect('Admin/vendor_view');
		}
	}

	function supplier_edit(){

		$data = array(
			'sup_name'	 =>	$this->encrypt->encode($this->input->post('sup_name')),
			'sup_updated'=>	date('Y-m-d H:i:s') 
		);

		$this->Admin_model->edit_supplier($this->input->post('hidden_id'), $data);
		redirect('Admin/supplier_view');
	}

	function vendor_view(){
    $vendorlists = $this->Admin_model->view_vendor();
    foreach ($vendorlists as $key => $value) {
      $result = $this->Admin_model->get_auditor($vendorlists[$key]->user_created_by);
      $vendorlists[$key]->user_created_by = $result[0]->user_name;
    }

		$data['data'] = $vendorlists;
    $this->load->view('admin_header', $data);
		$this->load->view('vendor_view');	
	}

	function supplier_add(){

		$data['data'] = $this->Admin_model->supplier_join();
		$this->load->view('supplier_add',$data);
	}

	function supplier_insert(){

		$this->form_validation->set_rules('sup_name', 'Supplier Name', 'required|trim');
		if($this->form_validation->run() == false){

			$this->supplier_add();
		}
		else
		{

			$data = array(
				'sup_name'		=>	$this->encrypt->encode($this->input->post('sup_name')),
				'sup_created'	=>	date('Y-m-d H:i:s'), 
				'sup_user_id'	=>	$this->input->post('sup_user_id'),
			);
			$this->Admin_model->sup_add($data);
			redirect('Admin');
		}
	}

	function supplier_view(){

		$data['data'] = $this->Admin_model->fetch_sup_detail();
		$this->load->view('supplier_view',$data);
	}

	function safe_catering_1(){

		$data['data'] = $this->Admin_model->form_1();
		$this->load->view('safe_catering_1',$data);
	}

	function safe_catering_2(){

		$data['data'] = $this->Admin_model->form_2();
		$this->load->view('safe_catering_2',$data);
	}

	function safe_catering_3(){

		$data['data'] = $this->Admin_model->form_3();
		$this->load->view('safe_catering_3',$data);
	}

	function safe_catering_4(){
		
		$data['data'] = $this->Admin_model->form_4();
		$this->load->view('safe_catering_4',$data);
	}

	
//views for SC FORMS

    function admin_sc3_view(){
       $id =  $this->uri->segment(3);
       $data['sc3_data'] = $this->Admin_model->auditor_sc3_data($id);
       $this->load->view('admin_view_sc3_row',$data);   

    }

	function admin_sc4_view(){
        $id =  $this->uri->segment(3);
        $data['sc4_data'] = $this->Admin_model->auditor_sc4_data($id);
        $this->load->view('admin_view_sc4_row',$data);   

    }

	function admin_sc1_view(){

        $id =  $this->uri->segment(3);
        $data['sc1_data'] = $this->Admin_model->auditor_sc1_data($id);
        $this->load->view('admin_view_sc1_row',$data);   
	}
	function admin_sc2_view(){

    	$id =  $this->uri->segment(3);
        $data['sc2_data'] = $this->Admin_model->auditor_sc2_data($id);
        $this->load->view('admin_view_sc2_row',$data);   

	}


//plugin area

function pdf_sc1(){

        
    if($this->uri->segment(3)){
        $id =  $this->uri->segment(3);
        
        $dataArr = $this->Admin_model->auditor_sc1_data($id);
 

        foreach($dataArr as $row){

            $this->pdf->AddPage();
        $html = '<h1>SC1 - Food Delivery Records</h1>
        <br>
        <table border="1" cellpadding="10">
        <tr>
        <th>Date</th>
        <td>'.$row->sc1_date.'</td>
       </tr>
       <tr>
       <th>Food Item</th>
       <td>'.$this->encrypt->decode($row->sc1_food_item).'</td>
       </tr>

        <tr>
       <th>Batch Code</th>
       <td>'.$this->encrypt->decode($row->sc1_batch_code).'</td>
       </tr>
        <tr>
       <th>Supplied By</th>
       <td>'.$this->encrypt->decode($row->sc1_supplied_by).'</td>
       </tr>
        <tr>
       <th>Use By Date</th>
       <td>'.$row->sc1_use_by_date.'</td>
       </tr>
        <tr>
       <th>Temperature</th>
       <td>'.$this->encrypt->decode($row->sc1_temp).'</td>
       </tr>
        <tr>
       <th>Delivery Vehicle Check</th>
       <td>'.$this->encrypt->decode($row->sc1_del_vehicle_check).'</td>
       </tr>
        <tr>
       <th>Comments/Action</th>
       <td>'.$this->encrypt->decode($row->sc1_comment_action).'</td>
       </tr>
        <tr>
       <th>Sign</th>
       <td>'.$this->encrypt->decode($row->sc1_sign).'</td>
       </tr>
        </table>
        <br><br>

        <label><b>Vendor Details:</b></label><br>
        <table border="1" cellpadding="10">
        <tr>
        <th>Name</th>
        <td>'.$this->encrypt->decode($row->ud_fname).' '.$this->encrypt->decode($row->ud_lname).'</td>
       </tr>
       <tr>
        <th>Phone number</th>
        <td>'.$this->encrypt->decode($row->ud_ph_no).'</td>
       </tr>
        </table>
        '; 
$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('$id.pdf');


        }


      
    }

}

public function pdf_sc2(){

    if($this->uri->segment(3)){
        $id =  $this->uri->segment(3);
        $dataArr = $this->Admin_model->auditor_sc2_data($id);
       

        foreach($dataArr as $row){

           

    $this->pdf->AddPage();

        $html = '<h1>SC2 - REFRIGERATION</h1>
        <br>
        <table border="1" cellpadding="10">
        <tr>
        <th>Date</th>
        <td>'.$row->sc2_date.'</td>
       </tr>
       <tr>
       <th>AM</th>
       <td>'.$this->encrypt->decode($row->sc2_am_1).'</td>
       </tr>
        <tr>
       <th>PM</th>
       <td>'.$this->encrypt->decode($row->sc2_pm_1).'</td>
       </tr>

        <tr>
       <th>AM</th>
       <td>'.$this->encrypt->decode($row->sc2_am_2).'</td>
       </tr>
        <tr>
       <th>PM</th>
       <td>'.$this->encrypt->decode($row->sc2_pm_2).'</td>
       </tr>

        <tr>
       <th>AM</th>
       <td>'.$this->encrypt->decode($row->sc2_am_3).'</td>
       </tr>
        <tr>
       <th>PM</th>
       <td>'.$this->encrypt->decode($row->sc2_pm_3).'</td>
       </tr>

       	<tr>
       	<th>AM</th>
       	<td>'.$this->encrypt->decode($row->sc2_am_4).'</td>
       	</tr>
       	<tr>
       	<th>PM</th>
       	<td>'.$this->encrypt->decode($row->sc2_pm_4).'</td>
       	</tr>

       <tr>
       <th>AM</th>
       <td>'.$this->encrypt->decode($row->sc2_am_5).'</td>
       </tr>

       <tr>
       <th>PM</th>
       <td>'.$this->encrypt->decode($row->sc2_pm_5).'</td>
       </tr>

       <tr>
       <th>AM</th>
       <td>'.$this->encrypt->decode($row->sc2_am_6).'</td>
       </tr>
       <tr>
       <th>PM</th>
       <td>'.$this->encrypt->decode($row->sc2_pm_6).'</td>
       </tr>

        <tr>
       <th>Comments/Action</th>
       <td>'.$this->encrypt->decode($row->sc2_comments_action).'</td>
       </tr>
        <tr>
       <th>Sign</th>
       <td>'.$this->encrypt->decode($row->sc2_sign).'</td>
       </tr>
        </table>
        <br><br>

        <label><b>Vendor Details:</b></label><br>
        <table border="1" cellpadding="10">
        <tr>
        <th>Name</th>
        <td>'.$this->encrypt->decode($row->ud_fname).' '.$this->encrypt->decode($row->ud_lname).'</td>
       </tr>
       <tr>
        <th>Phone number</th>
        <td>'.$this->encrypt->decode($row->ud_ph_no).'</td>
       </tr>
        </table>
        '; 

$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('$id.pdf');


        }

    }
}

 function pdf_sc3(){

    if($this->uri->segment(3)){
        $id =  $this->uri->segment(3);
        
        $dataArr = $this->Admin_model->auditor_sc3_data($id);

        foreach($dataArr as $row){


    $this->pdf->AddPage();

        $html = '<h1>SC2 - REFRIGERATION</h1>
        <br>
        <table border="1" cellpadding="15">
        <tr>
        <th>Date</th>
        <td>'.$row->sc3_date.'</td>
       </tr>
       <tr>
       <th>Food</th>
       <td>'.$this->encrypt->decode($row->sc3_food).'</td>
       </tr>
        <tr>
       <th>Time Started Cooking</th>
       <td>'.$row->sc3_time_started_cooking.'</td>
       </tr>

        <tr>
       <th>Time Finished Cooking</th>
       <td>'.$row->sc3_time_finished_cooking.'</td>
       </tr>
        <tr>
       <th>Core Temperature</th>
       <td>'.$this->encrypt->decode($row->sc3_core_temp).'</td>
       </tr>

        <tr>
       <th>Temerature Sign</th>
       <td>'.$this->encrypt->decode($row->sc3_sign).'</td>
       </tr>
        <tr>
       <th>Time into Fridge Bchiller</th>
       <td>'.$row->sc3_time_into_fridge_bchiller.'</td>
       </tr>

       	<tr>
       	<th>Bchiller sign</th>
       	<td>'.$this->encrypt->decode($row->sc3_bchiller_sign).'</td>
       	</tr>
       	<tr>
       	<th>Comments/Action</th>
       	<td>'.$this->encrypt->decode($row->sc3_comments_action).'</td>
       	</tr>

       <tr>
       <th>Sign</th>
       <td>'.$this->encrypt->decode($row->sc3_sign).'</td>
       </tr>

        </table>
        <br><br>

        <label><b>Vendor Details:</b></label><br>
        <table border="1" cellpadding="10">
        <tr>
        <th>Name</th>
        <td>'.$this->encrypt->decode($row->ud_fname).' '.$this->encrypt->decode($row->ud_lname).'</td>
       </tr>
       <tr>
        <th>Phone number</th>
        <td>'.$this->encrypt->decode($row->ud_ph_no).'</td>
       </tr>
        </table>
        ';
        $this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('$id.pdf');

        }
       
    }

}


function pdf_sc4(){

    if($this->uri->segment(3)){
        $id =  $this->uri->segment(3);
        
        $dataArr = $this->Admin_model->auditor_sc4_data($id);
       

        foreach($dataArr as $row){
                        $date 	= $row->sc4_date;
                        $food 	= $this->encrypt->decode($row->sc4_food);
                        $time 	= $row->sc4_hot_hold_time;
                        $chk1   = $this->encrypt->decode($row->sc4_core_temp_chk1);
                        $chk2 	= $this->encrypt->decode($row->sc4_core_temp_chk2);
                        $chk3 	= $this->encrypt->decode($row->sc4_core_temp_chk3);
                        $comments=$this->encrypt->decode($row->sc4_comments_action);
                        $sign   = $this->encrypt->decode($row->sc4_sign);
                        $check  = $row->sc4_mgr_supvsr_chk;
                        $mgr_sign=$this->encrypt->decode($row->sc4_mgr_sign);



    $this->pdf->AddPage();

        $html = '<h1>SC4 - Hot Hold/Display Records
</h1>
        <br>
        <table border="1" cellpadding="15">
        <tr>
        <th>Date</th>
        <td>'.$row->sc4_date.'</td>
       </tr>
       <tr>
       <th>Food Item</th>
       <td>'.$this->encrypt->decode($row->sc4_food).'</td>
       </tr>
       <tr>
       <th>Hot Hold Time</th>
       <td>'.$row->sc4_hot_hold_time.'</td>
       </tr>
        <tr>
       <th>Temperature Check 1</th>
       <td>'.$this->encrypt->decode($row->sc4_core_temp_chk1).'</td>
       </tr>

        <tr>
       <th>Temperature Check 2</th>
       <td>'.$this->encrypt->decode($row->sc4_core_temp_chk2).'</td>
       </tr>
        <tr>
       <th>Temperature Check 3</th>
       <td>'.$this->encrypt->decode($row->sc4_core_temp_chk3).'</td>
       </tr>

       
       	<tr>
       	<th>Comments/Action</th>
       	<td>'.$this->encrypt->decode($row->sc4_comments_action).'</td>
       	</tr>

       <tr>
       <th>Sign</th>
       <td>'.$this->encrypt->decode($row->sc4_sign).'</td>
       </tr>

        </table>
        <br><br>

        <label><b>Vendor Details:</b></label><br>
        <table border="1" cellpadding="10">
        <tr>
        <th>Name</th>
        <td>'.$this->encrypt->decode($row->ud_fname).' '.$this->encrypt->decode($row->ud_lname).'</td>
       </tr>
       <tr>
        <th>Phone number</th>
        <td>'.$this->encrypt->decode($row->ud_ph_no).'</td>
       </tr>
        </table>
        ';
        $this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('$id.pdf');


        }


    }


}

//overall pdf download functions

public function sc1_dwld_pdf(){

$id = $this->session->userdata('user_id');
 $dataArr = $this->Admin_model->form_1($id);

$this->pdf->AddPage('L');

$html = "<h1>SC1 - Food Delivery Records</h1>
  ";

 $html .= '<br/><br/>
 <table border="1" cellpadding="13" cellspacing="0" width="100%">
                    <tr>
                        <th>Date</th>
                        <th>Food Item</th>
                        <th>Batch Code</th>
                        <th>Supplied By</th>
                        <th>Use-by Date</th>
                        <th>Temp°C</th>
                        <th>Delivery Vehicle Check</th>
                        <th>Comments/Action</th>
                        <th>Sign</th>
         </tr>
            ';
foreach($dataArr as $row)
{
    $html .= '
  <tr>
                            <td>'.$row->sc1_date.'</td>
                            <td>'.$this->encrypt->decode($row->sc1_food_item).'</td>
                            <td>'.$this->encrypt->decode($row->sc1_batch_code).'</td>
                            <td>'.$this->encrypt->decode($row->sc1_supplied_by).'</td>
                            <td>'.$row->sc1_use_by_date.'</td>
                            <td>'.$this->encrypt->decode($row->sc1_temp).'</td>
                            <td>'.$this->encrypt->decode($row->sc1_del_vehicle_check).'</td>
                            <td>'.$this->encrypt->decode($row->sc1_comment_action).'</td>
                            <td>'.$this->encrypt->decode($row->sc1_sign).'</td>
                            </tr>
 ';
}

$html .= "</table>";

$html .= '<br><br><table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
            <th>Manager/Supervisor Check on</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
         </tr>
         <tr>
         <th>Sign</th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         </tr>
            ';
$html .= '</table>';

$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('sc1.pdf');



//plugin dompdf
 

}

public function sc2_dwld_pdf(){

//plugin dompdf
 $id = $this->session->userdata('user_id');
 $dataArr = $this->Admin_model->form_2($id);

 $this->pdf->AddPage('L');

 
$html = '

<center><h3>SC2 - Fridge/Freezer/Chill Display Temperature Records
</h3></center>
<br>
<br><br>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                        <th>Date</th>
                        <th>AM</th>
                        <th>PM</th>
                        <th>AM</th>
                        <th>PM</th>
                        <th>AM</th>
                        <th>PM</th>
                        <th>AM</th>
                        <th>PM</th>
                        <th>AM</th>
                        <th>PM</th>
                        <th>AM</th>
                        <th>PM</th>
                        <th>Comments/action</th>
                        <th>Sign</th>
                        
                    </tr>



';

foreach($dataArr as $row)
{
    $html .= '
  <tr>
                            <td>'.$row->sc2_date.'</td>
                            <td>'.$this->encrypt->decode($row->sc2_am_1).'</td>
                            <td>'.$this->encrypt->decode($row->sc2_pm_1).'</td>
                            <td>'.$this->encrypt->decode($row->sc2_am_2).'</td>
                            <td>'.$this->encrypt->decode($row->sc2_pm_2).'</td>
                            <td>'.$this->encrypt->decode($row->sc2_am_3).'</td>
                            <td>'.$this->encrypt->decode($row->sc2_pm_3).'</td>
                            <td>'.$this->encrypt->decode($row->sc2_am_4).'</td>
                            <td>'.$this->encrypt->decode($row->sc2_pm_4).'</td>
                            <td>'.$this->encrypt->decode($row->sc2_am_5).'</td>
                            <td>'.$this->encrypt->decode($row->sc2_pm_5).'</td>
                            <td>'.$this->encrypt->decode($row->sc2_am_6).'</td>
                            <td>'.$this->encrypt->decode($row->sc2_pm_6).'</td>
                            <td>'.$this->encrypt->decode($row->sc2_comments_action).'</td>
                            <td>'.$this->encrypt->decode($row->sc2_sign).'</td>
                            </tr>
 ';
}

$html .= '</table>
<br><br>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
            <th>Manager/Supervisor Check on</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
         </tr>
         <tr>
         <th>Manager Sign</th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         </tr>
            ';
$html .= '</table>';

$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('sc2.pdf');


}

public function sc3_dwld_pdf(){

//plugin dompdf
 $id = $this->session->userdata('user_id');
 $dataArr = $this->Admin_model->form_3($id);

 
$this->pdf->AddPage('L');
 
 
$html = '

<center><h3>SC3 - Cooking/Cooling/Reheating Records
</h3></center>
<br>
<br><br>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                        <th>Date</th>
                        <th>Food</th>
                        <th>Time Started Cooking</th>
                        <th>Time Finished Cooking</th>
                        <th>Core Temperature</th>
                        <th>Sign</th>
                        <th>Fridge Bchiller Time</th>
                        <th>Bchiller sign</th>
                        <th>Comments/action</th>
                      
                    </tr>



';

foreach($dataArr as $row)
{
    $html .= '
  <tr>
                           <td>'.$row->sc3_date.'</td>
                            <td>'.$this->encrypt->decode($row->sc3_food).'</td>
                            <td>'.$row->sc3_time_started_cooking.'</td>
                            <td>'.$row->sc3_time_finished_cooking.'</td>
                            <td>'.$this->encrypt->decode($row->sc3_core_temp).'</td>
                            <td>'.$this->encrypt->decode($row->sc3_sign).'</td>
                            <td>'.$row->sc3_time_into_fridge_bchiller.'</td>
                            <td>'.$this->encrypt->decode($row->sc3_bchiller_sign).'</td>
                            <td>'.$this->encrypt->decode($row->sc3_comments_action).'</td>
                            </tr>
 ';
}

$html .= '</table>
<br><br>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
            <th>Manager/Supervisor Check on</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
         </tr>
         <tr>
         <th>Manager Sign</th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         </tr>
            ';
$html .= '</table>';

$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('sc3.pdf');



}


public function sc4_dwld_pdf(){

//plugin dompdf
 $id = $this->session->userdata('user_id');
 $dataArr = $this->Admin_model->form_4($id);


$this->pdf->AddPage('L');
 
 
$html = '

<center><h3>SC4 - Hot Hold/Display Records
</h3></center>
<br><br>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                         <th>Date</th>
                        <th>Food</th>
                        <th>Time Into Hot Hold</th>
                        <th>Core Temp° (1st Check)</th>
                        <th>Core Temp° (2nd Check)</th>
                        <th>Core Temp° (3rd Check)</th>
                        <th>comments/action</th>
                        <th>Signed</th>
                    </tr>



';

foreach($dataArr as $row)
{
    $html .= '
  <tr>
                          <td>'.$row->sc4_date.'</td>
                            <td>'.$this->encrypt->decode($row->sc4_food).'</td>
                            <td>'.$row->sc4_hot_hold_time.'</td>
                            <td>'.$this->encrypt->decode($row->sc4_core_temp_chk1).'</td>
                            <td>'.$this->encrypt->decode($row->sc4_core_temp_chk2).'</td>
                            <td>'.$this->encrypt->decode($row->sc4_core_temp_chk3).'</td>
                            <td>'.$this->encrypt->decode($row->sc4_comments_action).'</td>
                            <td>'.$this->encrypt->decode($row->sc4_sign).'</td>
                            </tr>
 ';
}

$html .= '</table>
<br><br>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
            <th>Manager/Supervisor Check on</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
         </tr>
         <tr>
         <th>Manager Sign</th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         </tr>
            ';
$html .= '</table>';

$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('sc4.pdf');




}

public function suspend_auditor_1(){

     

     $id = $this->input->post('id');
     $data = array('user_active_status' => '0' );
     $update_suspend = $this->Admin_model->suspend_activate_user($id,$data);
     /*redirect('Auditor/vendor_list');*/
     if ($update_suspend) {
       echo "MAKE ACTIVE";
     }else{

      echo "NOTUPDATED";
     }
    
    }

    public function suspend_admin(){
     $id = $this->input->post('id');
     $data = array('user_active_status' => '0' );
     $update_suspend = $this->Admin_model->suspend_activate_user($id,$data);
     if ($update_suspend) {
       echo "MAKE ACTIVE";
     }else{

      echo "NOTUPDATED";
     }
    
    }
     public function make_active_admin(){

     $id = $this->input->post('id');
     $data = array('user_active_status' => '1' );
     $update_suspend = $this->Admin_model->suspend_activate_user($id,$data);
     /*redirect('Auditor/vendor_list');*/
     if ($update_suspend) {
       echo "MAKE ACTIVE";
     }else{

      echo "NOTUPDATED";
     }
   }

     public function make_active_auditor(){

     $id = $this->input->post('id');
     $data = array('user_active_status' => '1' );
     $update_suspend = $this->Admin_model->suspend_activate_user($id,$data);
     /*redirect('Auditor/vendor_list');*/
     if ($update_suspend) {
       echo "MAKE ACTIVE";
     }else{

      echo "NOTUPDATED";
     }
   }
    
public function suspend_vendor_1(){

     

     $id = $this->input->post('id');
     $data = array('user_active_status' => '0' );
     $update_suspend = $this->Admin_model->suspend_activate_user($id,$data);
     /*redirect('Auditor/vendor_list');*/
     if ($update_suspend) {
       echo "MAKE ACTIVE";
     }else{

      echo "NOTUPDATED";
     }
    
    }

     public function make_active_vendor(){

     $id = $this->input->post('id');
     $data = array('user_active_status' => '1' );
     $update_suspend = $this->Admin_model->suspend_activate_user($id,$data);
     /*redirect('Auditor/vendor_list');*/
     if ($update_suspend) {
       echo "MAKE ACTIVE";
     }else{

      echo "NOTUPDATED";
     }


    }









}
