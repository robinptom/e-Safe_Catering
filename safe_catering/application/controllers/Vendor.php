<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller 
{

    function __construct(){

        parent::__construct();  
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->library('form_validation');
        $this->load->library('pdf');
        $this->load->model('Login_model');
        $this->load->model('Vendor_model');

        if($this->session->userdata('logged_in') != true){
			redirect('Login');
		}
        
    }
    public function index(){
    	if($this->session->userdata('level')==='3'){
    		 $data['userdata'] = $this->Login_model->get_user_profile($this->session->userdata('user_id'));
	         $query= $this->Login_model->user_password_change_page_redirect($this->session->userdata('user_id'));
	         if(!empty($query)) {
	          	$this->load->view('vendor_profile', $data);
	          }else{
	          	$this->load->view('vendor_panel');
          }
        }
      }
    public function vendor_sc1(){
      $userid = $this->session->userdata('user_id');
      $data['supplierdata'] = $this->Vendor_model->fetch_sup_detail($userid);
      $this->load->view('vendor_sc1',$data);

    }
    public function vendor_sc2(){

      $this->load->view('vendor_sc2');

    }
    public function vendor_sc3(){

      $this->load->view('vendor_sc3');

    }
    public function vendor_sc4(){

      $this->load->view('vendor_sc4');

    }

    public function change_vendor_password(){
			$userid = $this->session->userdata('user_id');
			$update = $this->Login_model->update_vendor_password($userid);
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
    public function sc1_insert(){
      $userid = $this->session->userdata('user_id');
      $this->load->library('encrypt');
      $data = array(
        'sc1_date'              =>  date("Y-m-d H:i:s"),
        'sc1_food_item'         =>  $this->encrypt->encode($this->input->post('food_item')),
        'sc1_batch_code'        =>  $this->encrypt->encode($this->input->post('batch_code')),
        'sc1_supplied_by'       =>  $this->encrypt->encode($this->input->post('supp_by')),
        'sc1_use_by_date'       =>  $this->input->post('use_date'),
        'sc1_temp'              =>  $this->encrypt->encode($this->input->post('temp')),
      'sc1_del_vehicle_check' =>  $this->encrypt->encode($this->input->post('del_chk')),
        'sc1_user_id'           =>  $userid,
        'sc1_comment_action'    =>  $this->encrypt->encode($this->input->post('comment'))
      );
      /*  
        */
      

      $isertresult = $this->Vendor_model->sc1_data_insert($data);
      if ($isertresult) {
        $this->session->set_flashdata('success','Data submitted succesfullty');
      }else{
        $this->session->set_flashdata('error','Please check the form data. Something went wrong!');
      }
      
      redirect('Vendor/vendor_sc1');
    }


public function sc2_insert(){

$this->load->library('encrypt');
      $data = array(
        'sc2_date'  =>  date("Y-m-d H:i:s"),
        'sc2_unit'  =>  $this->input->post('sc2_unit'),
        'sc2_temperature'  =>  $this->encrypt->encode($this->input->post('sc2_temperature')),
        'sc2_user_id'  => $this->input->post('created_by'),
        'sc2_comments_action' =>  $this->encrypt->encode($this->input->post('sc2_comments_action'))
      );
      
      $isertresult = $this->Vendor_model->sc2_data_insert($data);
         if ($isertresult) {
        $this->session->set_flashdata('success','Data submitted succesfullty');
      }else{
        $this->session->set_flashdata('error','Please check the form data. Something went wrong!');
      }
      redirect('Vendor/vendor_sc2');

}

public function sc3_insert(){
  $time1   = $this->input->post('sc3_time_started_cooking');
  $time1  = date("H:i:s", strtotime($time1));
  $time2   = $this->input->post('sc3_time_finished_cooking');
  $time2  = date("H:i:s", strtotime($time2));
  $time3   = $this->input->post('sc3_time_into_fridge_bchiller');
  $time3  = date("H:i:s", strtotime($time3));

  $data = array(
        'sc3_date'                      =>  date("Y-m-d H:i:s"),
        'sc3_food'                      =>  $this->encrypt->encode($this->input->post('sc3_food')),
        'sc3_time_started_cooking'      =>  $time1,
        'sc3_time_finished_cooking'     =>  $time2,
        'sc3_core_temp'                 =>  $this->encrypt->encode($this->input->post('sc3_core_temp')),
        'sc3_time_into_fridge_bchiller' =>  $time3,
        'sc3_user_id'                   =>  $this->input->post('sc3_user_id'),
        'sc3_comments_action'           =>  $this->encrypt->encode($this->input->post('sc3_comments_action')));
  /*'sc3_sign'                      =>  $this->encrypt->encode($this->input->post('sc3_sign')),
'sc3_bchiller_sign'             =>  $this->encrypt->encode($this->input->post('sc3_bchiller_sign')),*/

       $isertresult = $this->Vendor_model->sc3_data_insert($data);

   if ($isertresult) {
        $this->session->set_flashdata('success','Data submitted succesfullty');
      }else{
        $this->session->set_flashdata('error','Please check the form data. Something went wrong!');
      }
      redirect('Vendor/vendor_sc3');

}

public function sc4_insert(){

$data = array(
        'sc4_date'                      =>  date("Y-m-d H:i:s"),
        'sc4_food'                      =>  $this->encrypt->encode($this->input->post('sc4_food')),
        'sc4_hot_hold_time'             =>  $this->input->post('sc4_hot_hold_time'),
        'sc4_core_temp_chk1'            =>  $this->encrypt->encode($this->input->post('sc4_core_temp_chk1')),
        'sc4_core_temp_chk2'            =>  $this->encrypt->encode($this->input->post('sc4_core_temp_chk2')),
        'sc4_core_temp_chk3'            =>  $this->encrypt->encode($this->input->post('sc4_core_temp_chk3')),
        'sc4_user_id'                   =>  $this->input->post('sc4_user_id'),
        'sc4_comments_action'           =>  $this->encrypt->encode($this->input->post('sc4_comments_action'))
        
      );
       $isertresult = $this->Vendor_model->sc4_data_insert($data);
      if ($isertresult) {
        $this->session->set_flashdata('success','Data submitted succesfullty');
      }else{
        $this->session->set_flashdata('error','Please check the form data. Something went wrong!');
      }
      redirect('Vendor/vendor_sc4');

  }

function supplier_add(){

    $data['data'] = $this->Vendor_model->supplier_join();
    $this->load->view('vendor_supplier_add',$data);
  }

  function supplier_insert(){

    $this->form_validation->set_rules('sup_name', 'Supplier Name', 'required|trim');
    if($this->form_validation->run() == false){

      $this->supplier_add();
    }
    else
    {

      $data = array(
        'sup_name'    =>  $this->encrypt->encode($this->input->post('sup_name')),
        'sup_created' =>  date('Y-m-d H:i:s'), 
        'sup_user_id' =>  $this->input->post('sup_user_id'),
      );
      $this->Vendor_model->sup_add($data);
      redirect('Vendor');
    }
  }

  function vendor_supplier_view(){
    $user_id = $this->session->userdata('user_id');
    $data['data'] = $this->Vendor_model->fetch_sup_detailvendor($user_id);
    $this->load->view('vendor_supplier_view',$data);
  }

function edit_view_supplier(){  

    $data['data'] = $this->Vendor_model->fetch_supplier_data($this->uri->segment(3));
    $this->load->view('vendor_edit_supplier', $data);
  }


function supplier_edit(){

    $this->load->library('encrypt');

    $data = array(
      'sup_name'   => $this->encrypt->encode($this->input->post('sup_name')),
      'sup_updated'=> date('Y-m-d H:i:s') 
    );

    $this->Vendor_model->edit_supplier($this->input->post('hidden_id'), $data);
    redirect('Vendor/vendor_supplier_view');
  }

function delete_supplier(){

    $id = $this->input->get('id');
    $deleteId = $this->Vendor_model->delete_sup($id);
    $data['data'] = $this->Vendor_model->fetch_sup_detail();
    $this->load->view('vendor_supplier_view',$data);   
  }

 

 public function reports(){
   $form_type='';
   $form_type = $this->input->post('sc_form_type');
    $from_date = $this->input->post('from_date');
    $to_date   = $this->input->post('to_date');
    $from_date = date("Y-m-d",strtotime($from_date));
    $to_date = date("Y-m-d",strtotime($to_date));
    $data = array();
    $user_id = $this->session->userdata('user_id'); 
    if($form_type == '1' ){
        $data['dropdown'] = 'SC Form 1';
        //$id = $this->session->userdata('user_id'); 

        $results = $this->Vendor_model->get_sc1_report($user_id,$from_date,$to_date) ; 
        if (count($results)>0) {
          $data =  $results;
        }else{
          $data = '';
        }
        //echo "<pre>"; print_r($data); die();
        /*$this->load->view('vendor_reports',$data);*/        

        }

   elseif($form_type == '2') {
        $data['dropdown'] = 'SC Form 2';
         //$id = $this->session->userdata('user_id'); 
        $results = $this->Vendor_model->get_sc2_report($user_id,$from_date,$to_date);
        if (count($results)>0) {
          $data =  $results;
        }else{
          $data = '';
        }
       /* $this->load->view('vendor_report',$data);*/

        
    }
    elseif ($form_type == '3') {
        $data['dropdown'] = 'SC Form 3';
        // $id = $this->session->userdata('user_id'); 
        $results = $this->Vendor_model->get_sc3_report($user_id,$from_date,$to_date);
         if (count($results)>0) {
          $data =  $results;
        }else{
          $data = '';
        }
        //echo "<pre>"; print_r($data); die();
      /*  $this->load->view('vendor_report_sc3',$data);*/
       
    }
    elseif ($form_type == '4') {
        
        $data['dropdown'] = 'SC Form 4';
         //$id = $this->session->userdata('user_id'); 
        $results = $this->Vendor_model->get_sc4_report($user_id,$from_date,$to_date);
         if (count($results)>0) {
          $data =  $results;
        }else{
          $data = '';
        }
        /*$this->load->view('vendor_report_sc4',$data);*/

        
    }else{
      $form_type = '';
      $data='';
    }
     $data['data']     = $data;
     $data['formtype'] = $form_type;
     $this->load->view('vendor_reports',$data);
    
}

function vendor_sc1_report(){

     $this->load->view('vendor_reports');
}


function SCformReport(){

    $form_type  = $this->input->get('sc_form_type');  /*$form_type;*/
    $from_date  = $this->input->get('from_date');     /*'2020-04-01';*/
    $to_date    = $this->input->get('to_date');       /*'2020-04-29';*/
   $from_date = date("Y-m-d",strtotime($from_date));
    $to_date = date("Y-m-d",strtotime($to_date));
    $user_id = $this->session->userdata('user_id'); 
     $data = array();
     if($form_type == '1' ){
        $data['dropdown'] = 'SC Form 1';
        $data['data'] = $this->Vendor_model->get_sc1_report($user_id,$from_date,$to_date); 
        if($form_type){
       $dataArr = $data['data']; 
     /*  echo "<pre>";
       print_r($dataArr[0]);
       print_r($this->encrypt->decode($dataArr[0]->ud_fname).$this->encrypt->decode($dataArr[0]->ud_lname).'('.$dataArr[0]->user_vendor_id.')');
       die();
 */
      $this->pdf->AddPage('L');
 $html = "<h1>SC1 - Food Delivery Records -";
 $html .= " ". $this->encrypt->decode($dataArr[0]->ud_fname).'('.$dataArr[0]->user_vendor_id.')'."</h1>";
 $html .= '<br/><br/>
 <table border="1" cellpadding="13" cellspacing="0" width="100%">
 <tr>
 <th>Date</th>
 <th>Food Item</th>
 <th>Batch Code</th>
 <th>Supplied By</th>
 <th>Use-by Date</th>
 <th>Temperature&#X00B0;C</th>
 <th>Delivery Vehicle Check</th>
 <th>Comments/Action</th>
 </tr>';
foreach ($dataArr as $key ) {
  # code...
    $html .= '
  <tr>
  <td>'.date("d-m-Y h:i A",strtotime($key->sc1_date)).'</td>
  <td>'.$this->encrypt->decode($key->sc1_food_item).'</td>
  <td>'.$this->encrypt->decode($key->sc1_batch_code).'</td>
  <td>'.$this->encrypt->decode($key->sc1_supplied_by).'</td>
  <td>'.date("d-m-Y",strtotime($key->sc1_use_by_date)).'</td>
  <td>'.$this->encrypt->decode($key->sc1_temp).'&#X00B0;C</td>
  <td>'.$this->encrypt->decode($key->sc1_del_vehicle_check).'</td>
  <td>'.$this->encrypt->decode($key->sc1_comment_action).'</td>
  </tr>';
  /**/

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
</tr>';
$html .= '</table><br><br>
<div align="right">
<label><b>Signature:  _________________</b></label><br>
</div>';
$this->pdf->writeHTML($html);
$this->pdf->lastPage();
/*ob_end_clean();*/
$this->pdf->Output('sc1_report.pdf', 'I');

    }
        }elseif($form_type == '2') {

        $data['dropdown'] = 'SC Form 2';
        $dataArr = $this->Vendor_model->get_sc2_report($user_id,$from_date,$to_date);
       /* $this->load->view('vendor_report_sc2',$data);*/
        if($form_type!=''){
      $unit = $this->Vendor_model->get_sc2_unit($user_id,$from_date,$to_date);
      if( ob_get_level() > 0 ) ob_flush();
       $this->pdf->AddPage('L');

$html = '<h1>SC2 - Fridge/Freezer/Chill Display Temperature Records - ';
 $html .= " ". $this->encrypt->decode($dataArr[0]->ud_fname).'('.$dataArr[0]->user_vendor_id.')</h1><br>';
$html .= '<table border="1" cellpadding="5" cellspacing="0" width="100%">';
/*$counts = count($unit) +2;
$html .= '<tr style="background-color:black;color:white;"><th colspan="'.$counts.'" style="text-align:center;">UNIT</th></tr>';*/
$html .= '<tr><th><b>Unit</b></th>';
                      foreach ($unit as $row) {
  $html .= '<th colspan="2"><b>'.$row->sc2_unit.'</b></th>';
    }
  $html .= '<th><b>Comments/action</b></th></tr>';
  $html .= '<tr><th><b>Date</b></th>';
                      foreach ($unit as $row) {
  $html .= '<th><b>AM</b></th>';
   $html .= '<th><b>PM</b></th>';
    }
  $html .= '<th style="border-top:none;"></th></tr>';

$dataArr = $this->Vendor_model->get_sc2_report_print($user_id,$from_date,$to_date);
foreach($dataArr as $row)
{
  $html .= '<tr><td>'.date("d-m-Y",strtotime($row->date)).'</td> ';
  $counter=0;
         foreach ($unit as $key => $row2) {
        $temperature = $this->Vendor_model->get_temperature_value($user_id,$row->date,$unit[$key]->sc2_unit);
      
$html .='<td>';
foreach ($temperature as $key2 => $row1) {
      if (strpos($temperature[$key2]->time, 'AM')>0) {
      $html .= $this->encrypt->decode($temperature[$key2]->sc2_temperature).'&#X00B0;C ,  '; 
      }
        } $html .='</td>';
        $html .='<td>';
foreach ($temperature as $key3 => $row1) {
      if(strpos($temperature[$key3]->time, 'PM')>0){
      $html .= $this->encrypt->decode($temperature[$key3]->sc2_temperature).'&#X00B0;C ,  '; 
      }else{}
        } $html .='</td>';
    }
$html .='<td>';
/*-------------------------*/
    foreach ($unit as $key => $row2) {
        $temperature = $this->Vendor_model->get_temperature_value($user_id,$row->date,$unit[$key]->sc2_unit);
foreach ($temperature as $key3 => $row1) {
      $html .= $this->encrypt->decode($temperature[$key3]->sc2_comments_action).','; 

        }
    }
    /*----------------*/
 $html.='</td>';
 $html.='</tr>';
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
</tr>';
$html .= '</table><br><br>
        <div align="right">
        <label><b>Signature:  _________________</b></label><br>
        </div>';

$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('sc2_report.pdf','I');

}
    }
    elseif ($form_type == '3') {
        $data['dropdown'] = 'SC Form 3';
        $data['data'] = $this->Vendor_model->get_sc3_report($user_id,$from_date,$to_date);
        $this->load->view('vendor_report_sc3',$data);
        if($form_type!=''){
       $dataArr = $data['data']; 
      /* ob_end_flush();*/
      $this->pdf->AddPage('L');
$html = '<h1>SC3 - Cooking/Cooling/Reheating Records - ';
$html .= " ". $this->encrypt->decode($dataArr[0]->ud_fname).'('.$dataArr[0]->user_vendor_id.')</h1><br>';
$html .= '
<br><br>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
<th>Date</th>
<th>Food</th>
<th>Time Started Cooking</th>
<th>Time Finished Cooking</th>
<th>Core Temperature&#X00B0;C</th>
<th>Signed</th>
<th>Time into Fridge Blast Chiller</th>
<th>signed</th>
<th>Comments/Action</th>
</tr>';

foreach($dataArr as $row)
{
    $html .= '<tr>
 <td>'.date("d-m-Y h:i A",strtotime($row->sc3_date)).'</td>
 <td>'.$this->encrypt->decode($row->sc3_food).'</td>
 <td>'.$row->sc3_time_started_cooking.'</td>
 <td>'.$row->sc3_time_finished_cooking.'</td>
 <td>'.$this->encrypt->decode($row->sc3_core_temp).'&#X00B0;C</td>
 <td>'.$this->encrypt->decode($row->sc3_sign).'</td>
 <td>'.$row->sc3_time_into_fridge_bchiller.'</td>
 <td></td>
 <td>'.$this->encrypt->decode($row->sc3_comments_action).'</td>
 </tr>';
 /*'.$this->encrypt->decode($row->sc3_bchiller_sign).'*/
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
</tr>';
$html .= '</table><br><br><div align="right">
        <label><b>Signature:  _________________</b></label><br>
        </div>';
$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('sc3_report.pdf','I');

}
    }
    elseif ($form_type == '4') {
        $data['dropdown'] = 'SC Form 4'; 
        $data['data'] = $this->Vendor_model->get_sc4_report($user_id,$from_date,$to_date);
        $this->load->view('vendor_report_sc4',$data);
        if($form_type!=''){
       $dataArr = $data['data']; 
       if( ob_get_level() > 0 ) ob_flush();
       $this->pdf->AddPage('L');
$html = '<h1>SC4 - Hot Hold/Display Records - ';
$html .= " ". $this->encrypt->decode($dataArr[0]->ud_fname).'('.$dataArr[0]->user_vendor_id.')</h1><br>';
$html .= '<br>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
<th>Date</th>
<th>Food</th>
<th>Time Into Hot Hold</th>
<th>Core Temp&#X00B0;C (1st Check)</th>
<th>Core Temp&#X00B0;C (2nd Check)</th>
<th>Core Temp&#X00B0;C (3rd Check)</th>
<th>comments/action</th>
</tr>';

foreach($dataArr as $row)
{
    $html .= '<tr>
<td>'.date("d-m-Y h:i A",strtotime($row->sc4_date)).'</td>
<td>'.$this->encrypt->decode($row->sc4_food).'</td>
<td>'.$row->sc4_hot_hold_time.'</td>
<td>'.$this->encrypt->decode($row->sc4_core_temp_chk1).'&#X00B0;C</td>
<td>'.$this->encrypt->decode($row->sc4_core_temp_chk2).'&#X00B0;C</td>
<td>'.$this->encrypt->decode($row->sc4_core_temp_chk3).'&#X00B0;C</td>
<td>'.$this->encrypt->decode($row->sc4_comments_action).'</td></tr>';
/**/
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
</tr>';
$html .= '</table><br><br>
        <div align="right">
        <label><b>Signature:  _________________</b></label><br>
        </div>';
$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('sc4_report.pdf','I');


     }

        
    }   
/* echo "<script>window.close();</script>";*/
  exit();

}


}
	