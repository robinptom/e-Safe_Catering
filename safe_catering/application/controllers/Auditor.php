<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditor extends CI_Controller 
{

function __construct(){

    parent::__construct();
    $this->load->library('session');
    $this->load->library('form_validation');
    $this->load->model('Login_model');
    $this->load->model('Cron_model');
    $this->load->model('Common_model');
    $this->load->model('Auditor_model');
    $this->load->library('encrypt');
    $this->load->library('Pdf');
    if($this->session->userdata('logged_in') != true){
    redirect('Login');
    }      
}
   
public function index(){

    if($this->session->userdata('level')==='2'){
        $data['userdata'] = $this->Login_model->get_user_profile($this->session->userdata('user_id')); 
        $query= $this->Login_model->user_password_change_page_redirect($this->session->userdata('user_id'));
        $id = $this->session->userdata('user_id'); 
    $vendoridlist = $this->Auditor_model->vendor_lists($id);
    $vendorlist = $this->Auditor_model->vendor_listsforalert($id);
    $vendorid = explode(',', $vendorlist[0]->vendor_id);
    $year  = date("Y");
    $month = date("m");
    $day     = date("d");
    
    $totaldate =cal_days_in_month(CAL_GREGORIAN,$month,$year);
    $result = array();
    $red= 0;
    $orange =0;
    $yellow=0;
    foreach ($vendoridlist as $key => $value) {
      $noentrycount1 =0;
      $noentrycount2 =0;
      $noentrycount3 =0;
      $noentrycount4 =0;
        $created_date  = strtotime($vendoridlist[$key]->user_created_date);
    $currentdate    = strtotime(date("Y-m-d H:m:s"));
    $diff           = abs($currentdate - $created_date);  
    $years          = floor($diff / (365*60*60*24));
    $months         = floor(($diff - $years * 365*60*60*24)/ (30*60*60*24));
    $days           = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
    $vendoridlist[$key]->dayscount = $days;
     for ($i=1; $i <= $day; $i++) { 
      /*sc1*/
      $checkresultsc1 = $this->Cron_model->sc1check("'".$year."-".$month."-".$i."'");
      $nonentrysc1 = array_diff($vendorid, array_unique(explode(',', $checkresultsc1[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc1)) {
        $noentrycount1 = $noentrycount1 + 1;
      }
      /*sc2*/
       $checkresultsc2 = $this->Cron_model->s2check("'".$year."-".$month."-".$i."'");
      $nonentrysc2 = array_diff($vendorid, array_unique(explode(',', $checkresultsc2[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc2)) {
        $noentrycount2 = $noentrycount2 + 1;
      }
      /*sc3*/
       $checkresultsc3 = $this->Cron_model->sc3check("'".$year."-".$month."-".$i."'");
      $nonentrysc3 = array_diff($vendorid, array_unique(explode(',', $checkresultsc3[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc3)) {
        $noentrycount3 = $noentrycount3 + 1;
      }
      /*sc4*/
       $checkresultsc4 = $this->Cron_model->sc4check("'".$year."-".$month."-".$i."'");
      $nonentrysc4 = array_diff($vendorid, array_unique(explode(',', $checkresultsc4[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc4)) {
        $noentrycount4 = $noentrycount4 + 1;
      }
      
    }
    /*$vendoridlist[$key]->noentrycountsc1 = $noentrycount1;
    $vendoridlist[$key]->noentrycountsc2 = $noentrycount2;
    $vendoridlist[$key]->noentrycountsc3 = $noentrycount3;
    $vendoridlist[$key]->noentrycountsc4 = $noentrycount4;*/
  

    if ($vendoridlist[$key]->dayscount==1 || $vendoridlist[$key]->dayscount>1) {
    if($noentrycount1==1 || $noentrycount2==1 || $noentrycount3==1 || $noentrycount4==1){
       $yellow = $yellow + 1;
    }
    }
    if ($vendoridlist[$key]->dayscount==2 || $vendoridlist[$key]->dayscount>2) {
    if($noentrycount1==2 || $noentrycount2==2 || $noentrycount3==2 || $noentrycount4==2){
      
        $orange = $orange + 1;
      }
    }
    if ($vendoridlist[$key]->dayscount > 3 || $vendoridlist[$key]->dayscount == 3) {
    if($noentrycount1>2 || $noentrycount2>2 || $noentrycount3>2 || $noentrycount4>2 ){
      
        $red = $red + 1;
      }
    
    }

    }
    /*echo "<pre>";
    print_r($vendoridlist);echo "</br>";
    echo $red;echo "</br>";
    echo $orange;echo "</br>";
    echo $yellow;echo "</br>";
    die();*/
    $data['redcount']    = $red;
    $data['orangecount'] = $orange;
    $data['yellowcount'] = $yellow;
        if(!empty($query)) {
          $this->load->view('auditor_header',$data);
          	$this->load->view('auditor_profile');
            }else{
                  $this->load->view('auditor_header',$data);
          	     $this->load->view('auditor_panel',$data);
            }
        }
}

    
public function vendor_auditor_add(){

    //$data['data'] = $this->Auditor_model->fetch_vend_aud();
    $this->load->view('auditor_user_create');

}

public function create_vendor(){
      $username = $this->input->post('ud_email');
      $vendorid = $this->input->post('vendor_unique_id');
      if ($username=='' && $vendorid =='') {
        $this->session->set_flashdata('error',"Please fill all fields.");
        redirect('Auditor/create_vendor');
      }

       $liscenece = $this->input->post('vendor_unique_id');
    $result    = $this->Common_model->checkvendorliscenece($liscenece);
    if ($result>0) {
      
        $this->session->set_flashdata('error','Vendor licence number already exists!');
      redirect('Auditor/vendor_auditor_add');
    }else{
    
    }
    $resultu    = $this->Common_model->checkemail($username);
    if ($resultu>0) {
      
        $this->session->set_flashdata('error','Email id already exists!');
      redirect('Auditor/vendor_auditor_add');
    }else{
    
    }
    $result = array(
      'user_role' =>  '3',
      'user_name' => $username,
      'user_pwd'  =>  'safecatering',  //temporary user login password
      'user_created_date' =>  date('Y-m-d H:i:s'),
      'user_created_by'   =>  $this->input->post('hidden_id'),
      'user_vendor_id'   => $vendorid
    );
    $id = $this->Auditor_model->user_insert($result);

    $data = array(
      'ud_user_id'  =>  $id,
      'ud_fname'    =>  $this->encrypt->encode($this->input->post('ud_fname')),
      'ud_lname'    =>  $this->encrypt->encode($this->input->post('ud_lname')),
      'ud_address'  =>  $this->encrypt->encode($this->input->post('ud_address')),
      'ud_ph_no'    =>  $this->encrypt->encode($this->input->post('ud_phone')),
    );
      
    $this->Auditor_model->role_insert($data);

    
   $to =  $this->input->post('ud_email');  
            $subject = 'Welcome To Safe Catering';       
            $emailContent = ('Hello Sir/Madam,<br/><br/>Your Temporary Login Password,<br/><br/><b style="color:red">Password: safecatering,</b><br/><br/>Thank you.');  

            $this->load->library('Mailer');
            //$this->Mailer->load();

            $mail = new PHPMailer\PHPMailer\PHPMailer;
            $mail->isSMTP();
            $mail->Host         ='smtp.gmail.com' ;
            $mail->Port         ='587';
            $mail->SMTPAuth     = true;
            $mail->SMTPSecure   = 'tls';
            $mail->Username     ='safecatering.euphontec@gmail.com';
            $mail->Password     = 'euphontecdev';
            $mail->setFrom('safecatering.euphontec@gmail.com','SAFE CATERING');
            $mail->addAddress($to);
            $mail->addReplyTo('safecatering.euphontec@gmail.com');
            
            
            $mail->isHTML(true);
            $mail->Subject      = $subject;
            $mail->Body         = $emailContent;
            if(!$mail->send())
            {
                $this->session->set_flashdata('mailerror',"Vendor account added successfully . Failed to sent confirmation mail.");
                $this->session->set_flashdata('success','Vendor account added successfully'); 
                redirect('Auditor/vendor_list');
            }
            else{
                $this->session->set_flashdata('success','Vendor account added successfully'); 
                redirect('Auditor/vendor_list');
            }

}


public function change_auditor_password(){

    $userid = $this->session->userdata('user_id');
    $update = $this->Login_model->update_auditor_password($userid);
      $this->session->unset_userdata('logged_in');
    $id     =  $this->session->userdata('user_id');
    $updateArr  = array(
          'log_user_role'   => $this->session->userdata('level'),
          'log_date'        => date('d-m-Y'),
          'log_time'        => date('H:i:s'),
          'logged_in_status'  => false
        );
    
    $update_log   =    $this->Login_model->update_log($id,$updateArr);
    redirect('Login');
}


function sc_reports(){

    $form_type    = $this->input->post('sc_form_type');
    $from_date   = $this->input->post('from_date');
    $to_date     = $this->input->post('to_date');
    $id        = $this->input->post('sc_vendor_type');
    if ($from_date!='') {
      $from_date = date("Y-m-d",strtotime($from_date));
    }else{
       $from_date = date("Y-m-d");
    }
    if ($to_date!='') {
     $to_date   = date("Y-m-d",strtotime($to_date));
    }else{
      $to_date   = date("Y-m-d");
    }
    
    $data = array();
    $vendors =  $this->Auditor_model->get_vendor_licence($this->session->userdata('user_id'));
         if (count($vendors)>0) {
          $vendors =  $vendors;
        }else{
          $vendors = '';
        }
    if($form_type == '1' ){
        $data['dropdown'] = 'SC Form 1';
        $results = $this->Auditor_model->get_sc1_report($id,$from_date,$to_date);

        if (count($results)>0) {
          $results =  $results;
        }else{
          $results = '';
        }       

        }

           elseif($form_type == '2') {
        $data['dropdown'] = 'SC Form 2';
        $results = $this->Auditor_model->get_sc2_report($id,$from_date,$to_date);
        if (count($results)>0) {
          $results =  $results;
        }else{
          $results = '';
        }
        
      }

          elseif ($form_type == '3') {
        $data['dropdown'] = 'SC Form 3';
        $results = $this->Auditor_model->get_sc3_report($id,$from_date,$to_date);
         if (count($results)>0) {
          $results =  $results;
        }else{
          $results = '';
        }
       
    }

    elseif ($form_type == '4') {
        
        $data['dropdown'] = 'SC Form 4';
        $results = $this->Auditor_model->get_sc4_report($id,$from_date,$to_date);
         if (count($results)>0) {
          $results =  $results;
        }else{
          $results = '';
        }

        
    }else{
      $form_type = '';
      $results='';
      $from_date = '';
      $to_date = '';
    }
    if ($from_date!='') {
     $from_date = date("d-m-Y",strtotime($from_date));
    }
    if ($to_date!='') {
    $to_date   = date("d-m-Y",strtotime($to_date));
    }
    
     
     $data['from_date']  = $from_date;
     $data['to_date']  = $to_date;
     $data['vendors']  = $vendors;
     $data['vendor_id']  = $id;
     $data['data']     = $results;
     $data['formtype'] = $form_type;
     $this->load->view('auditor_header',$data);
     $this->load->view('auditor_reports');
    
}
public function SCformReport(){

   $form_type  = $this->input->get('sc_form_type');
   $id        = $this->input->get('scvendor');
    $from_date = $this->input->get('from_date');
    $to_date   = $this->input->get('to_date');
     $from_date = date("Y-m-d",strtotime($from_date));
    $to_date = date("Y-m-d",strtotime($to_date));

    //print_r($id); die();

  
    if($form_type == '1' ){
        $data['dropdown'] = 'SC Form 1';
        $data['data'] = $this->Auditor_model->get_sc1_report($id,$from_date,$to_date) ; 

  if($form_type!='')
    {
    
       $dataArr = $data['data']; 
      // print_r($dataArr); die();
       if( ob_get_level() > 0 ) ob_flush();

      $this->pdf->AddPage('L');
      if ($dataArr[0]->ud_fname) {
        $ud_fname = $this->encrypt->decode($dataArr[0]->ud_fname);
      }else{
        $ud_fname = '';
      }
       if ($dataArr[0]->ud_lname) {
        $ud_lname = $this->encrypt->decode($dataArr[0]->ud_lname);
      }else{
        $ud_lname = '';
      }
       if ($dataArr[0]->user_vendor_id) {
       $user_vendor_id = $user_vendor_id = $dataArr[0]->user_vendor_id;
      }else{
        $user_vendor_id = '';
      }

$html = "<h1>SC1 - Food Delivery Records -";
$html .= " ".$ud_fname.'('.$user_vendor_id.')'."</h1>";

 $html .= '<br/><br/>
 <table border="1" cellpadding="13" cellspacing="0" width="100%">
                    <tr>
                        <th>Date</th>
                        <th>Food Item</th>
                        <th>Batch Code</th>
                        <th>Supplied By</th>
                        <th>Use-by Date</th>
                        <th>Temp&#X00B0;C</th>
                        <th>Delivery Vehicle Check</th>
                        <th>Comments/Action</th></tr>';
foreach ($dataArr as $key ) {
  # code...
    $html .= '<tr>
                            <td>'.date("d-m-Y h:i A",strtotime($key->sc1_date)).'</td>
                            <td>'.$this->encrypt->decode($key->sc1_food_item).'</td>
                            <td>'.$this->encrypt->decode($key->sc1_batch_code).'</td>
                            <td>'.$this->encrypt->decode($key->sc1_supplied_by).'</td>
                            <td>'.date("d-m-Y",strtotime($key->sc1_use_by_date)).'</td>
                            <td>'.$this->encrypt->decode($key->sc1_temp).'&#X00B0;C</td>
                            <td>'.$this->encrypt->decode($key->sc1_del_vehicle_check).'</td>
                            <td>'.$this->encrypt->decode($key->sc1_comment_action).'</td>
                            </tr>';
                            /*'.$this->encrypt->decode($key->sc1_del_vehicle_check).'
*/

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
$html .= '</table>
<br><br><div align="right">
        <label><b>Signature:  _________________</b></label><br>
        </div>';

$this->pdf->writeHTML($html);
$this->pdf->lastPage();
//$this->pdf->ob_end_clean();
$this->pdf->Output('sc1_report.pdf','I');

    }
  }

   elseif($form_type == '2') {

        $data['dropdown'] = 'SC Form 2';
        $dataArr1 = $this->Auditor_model->get_sc2_report($id,$from_date,$to_date);
        $unit = $this->Cron_model->getsc2unit($id,$from_date,$to_date);
        if($form_type!=''){
      
      if( ob_get_level() > 0 ) ob_flush();

       $this->pdf->AddPage('L');

 
$html = '<h1>SC2 - Fridge/Freezer/Chill Display Temperature Records - ';
if ($dataArr1) {
  $html .= " ".$this->encrypt->decode($dataArr1[0]->ud_fname).'('.$dataArr1[0]->user_vendor_id.')';
}

$html .="</h1>";
$html .= '<table border="1" cellpadding="5" cellspacing="0" width="100%"><tr><th>Unit</th>';
                      foreach ($unit as $row) {
  $html .= '<th colspan="2">'.$row->sc2_unit.'</th>';
}
            $html .= '<th>Comments/action</th></tr>';
              $html .= '<tr><th><b>Date</b></th>';
                      foreach ($unit as $row) {
  $html .= '<th><b>AM</b></th>';
   $html .= '<th><b>PM</b></th>';
    }
      $html .= '<th style="border-top:none;"></th></tr>';

$dataArr = $this->Cron_model->getsc2report_print($id,$from_date,$to_date);
foreach($dataArr as $row)
{
  
$html .= '
  <tr>
        <td>'.date("d-m-Y",strtotime($row->date)).'</td> ';
        
  $counter=0;
         foreach ($unit as $key => $row2) {
        $temperature = $this->Cron_model->gettemperaturevalue($id,$row->date,$unit[$key]->sc2_unit);
      $html .='<td>';

foreach ($temperature as $key2 => $row1) {
      
      
      if (strpos($temperature[$key2]->time, 'AM')>0) {
    
      $html .= $this->encrypt->decode($temperature[$key2]->sc2_temperature). '&#X00B0;C , '; 
      
      }
        } 
        $html .='</td>';

        $html .='<td>';

foreach ($temperature as $key3 => $row1) {
    
      if(strpos($temperature[$key3]->time, 'PM')>0){
      $html .= $this->encrypt->decode($temperature[$key3]->sc2_temperature).'&#X00B0;C , '; 
       
      }else{}
        } 
        $html .='</td>';
     
    }
$html .='<td>';
/*-------------------------*/
    foreach ($unit as $key => $row2) {
        $temperature = $this->Cron_model->gettemperaturevalue($id,$row->date,$unit[$key]->sc2_unit);
foreach ($temperature as $key3 => $row1) {
      $html .= $this->encrypt->decode($temperature[$key3]->sc2_comments_action).','; 

        }
    }
    /*----------------*/
 $html.='</td>';       
$html .='</tr>';
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
        $data['data'] = $this->Auditor_model->get_sc3_report($id,$from_date,$to_date);

  if($form_type!='')
    {
    
       $dataArr = $data['data']; 
      if( ob_get_level() > 0 ) ob_flush();

          $this->pdf->AddPage('L');
 
 
$html = '<h1>SC3 - Cooking/Cooling/Reheating Records - ';
$html .= " ".$this->encrypt->decode($dataArr[0]->ud_fname).'('.$dataArr[0]->user_vendor_id.')'."</h1>";
$html .='<br><br>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                        <th>Date</th>
                        <th>Food</th>
                        <th>Time Started Cooking</th>
                        <th>Time Finished Cooking</th>
                        <th>Core Temp&#X00B0;C</th>
                        <th>Signed</th>
                        <th>Time into Fridge/Blast Chiller</th>
                        <th>signed</th>
                        <th>Comments/Action</th>
                      
                    </tr>';

foreach($dataArr as $row)
{
    $html .= '
  <tr>
                           <td>'.date("d-m-Y h:i A",strtotime($row->sc3_date)).'</td>
                            <td>'.$this->encrypt->decode($row->sc3_food).'</td>
                            <td>'.$row->sc3_time_started_cooking.'</td>
                            <td>'.$row->sc3_time_finished_cooking.'</td>
                            <td>'.$this->encrypt->decode($row->sc3_core_temp).'&#X00B0;C</td>
                            <td>'.$this->encrypt->decode($row->sc3_sign).'</td>
                            <td>'.$row->sc3_time_into_fridge_bchiller.'</td>
                            <td></td>
                            <td>'.$this->encrypt->decode($row->sc3_comments_action).'</td>
                            </tr>
 ';
 /*'.$this->encrypt->decode($row->sc3_bchiller_sign).'
*/
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
$html .= '</table>
<br><br>

        <div align="right">
        <label><b>Signature:  _________________</b></label><br>
        </div>';

$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('sc3_report.pdf','I');



}
       
    }
    elseif ($form_type == '4') {
       
        $data['dropdown'] = 'SC Form 4';
        $data['data'] = $this->Auditor_model->get_sc4_report($id,$from_date,$to_date);

        if($form_type!='')
    {
    
       $dataArr = $data['data']; 
       if( ob_get_level() > 0 ) ob_flush();

       $this->pdf->AddPage('L');
 
 
$html = '<h1>SC4 - Hot Hold/Display Records - ';
$html .= "  ".$this->encrypt->decode($dataArr[0]->ud_fname).' ('.$dataArr[0]->user_vendor_id.')'."</h1>";
$html .='<br><br>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                         <th>Date</th>
                        <th>Food</th>
                        <th>Time Into Hot Hold</th>
                        <th>Core Temp&#X00B0;C (1st Check)</th>
                        <th>Core Temp&#X00B0;C (2nd Check)</th>
                        <th>Core Temp&#X00B0;C (3rd Check)</th>
                        <th>comments/action</th>
                       
                    </tr>



';

foreach($dataArr as $row)
{
    $html .= '
  <tr>
                          <td>'.date("d-m-Y h:i A",strtotime($row->sc4_date)).'</td>
                            <td>'.$this->encrypt->decode($row->sc4_food).'</td>
                            <td>'.$row->sc4_hot_hold_time.'</td>
                            <td>'.$this->encrypt->decode($row->sc4_core_temp_chk1).'&#X00B0;C</td>
                            <td>'.$this->encrypt->decode($row->sc4_core_temp_chk2).'&#X00B0;C</td>
                            <td>'.$this->encrypt->decode($row->sc4_core_temp_chk3).'&#X00B0;C</td>
                            <td>'.$this->encrypt->decode($row->sc4_comments_action).'</td>
                            </tr>';
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
         </tr>
            ';
$html .= '</table>
<br><br>

        <div align="right">
        <label><b>Signature:  _________________</b></label><br>
        </div>';

$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('sc4_report.pdf','I');


     }

        
    }

    
  exit();
}




function auditor_sc1_report(){

     $this->load->view('auditor_reports',$data);
}



function vendor_auditor_view(){

  $id = $this->session->userdata('user_id');
  
  $data['data'] = $this->Auditor_model->view_vendors($id);
  $this->load->view('auditor_header',$data);
  $this->load->view('vendor_list');

}
    
    function auditor_sc1(){

        $id = $this->session->userdata('user_id'); 
        $data['data'] = $this->Auditor_model->form_1($id);
        //echo "<pre>"; print_r($id); die();
        $this->load->view('auditor_sc1',$data);  
        
    }

    function auditor_sc2(){

        $id = $this->session->userdata('user_id'); 
        $data['data'] = $this->Auditor_model->form_2($id);
                               
       //echo "<pre>";print_r($data); die();
        $this->load->view('auditor_sc2',$data);
    }

    function auditor_sc3(){

         $id = $this->session->userdata('user_id'); 
         //echo "<pre>";print_r($id); die();
        $data['data'] = $this->Auditor_model->form_3($id);
        
        $this->load->view('auditor_sc3',$data);
    }

    function auditor_sc4(){
    
        $id = $this->session->userdata('user_id'); 
        $data['data'] = $this->Auditor_model->form_4($id);
        $this->load->view('auditor_sc4',$data);
    }

    function auditor_sc3_view(){
        $id =  $this->uri->segment(3);
       $data['sc3_data'] = $this->Auditor_model->auditor_sc3_data($id);
        $this->load->view('auditor_view_sc3_row',$data);   

    }

function auditor_sc4_view(){
        $id =  $this->uri->segment(3);
       $data['sc4_data'] = $this->Auditor_model->auditor_sc4_data($id);
        $this->load->view('auditor_view_sc4_row',$data);   

    }

function auditor_sc1_view(){

        $id =  $this->uri->segment(3);
        $data['sc1_data'] = $this->Auditor_model->get_sc1_id($id);
        //echo "<pre>"; print_r($data); die();
        $this->load->view('view_file',$data);   
}
function auditor_sc2_view(){

    $id =  $this->uri->segment(3);
        $data['sc2_data'] = $this->Auditor_model->auditor_sc2_data($id);
        //echo "<pre>"; print_r($data); die();
        $this->load->view('auditor_view_sc2_row',$data);   

}

    
function pdf(){

        
    if($this->uri->segment(3)){
        $id =  $this->uri->segment(3);
        
        $dataArr = $this->Auditor_model->get_sc1_id($id);
        //echo "<pre>"; print_r($dataArr); die();
 

        foreach($dataArr as $row){

            $this->pdf->AddPage();
        $html = '<div><h1>SC1 - Food Delivery Records</h1> </div>
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
        <br><br>

        <div align="right">
        <label><b>Signature:  _________________</b></label><br>
        </div>
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
        $dataArr = $this->Auditor_model->get_sc2_id($id);

        //echo "<pre>"; print_r($dataArr); die();
       
        foreach($dataArr as $row){

          $date = $row->sc2_date;
          $temp_date =  date('d-m-Y',strtotime($date));
          $temperature_time =  date('h:i:s A',strtotime($date));
           //echo $temp_date; die();

           

    $this->pdf->AddPage();

        $html = '<div><h1>SC2 - REFRIGERATION</h1></div>
        <br>
        <table border="1" cellpadding="10">
        <tr>
        <th>Date</th>
        <td>'.$temp_date.'</td>
       </tr>
       <tr>
       <th>REFRIGERATOR UNIT OF COLD STORAGE</th>
       <td>'.$row->sc2_unit.'</td>
       </tr>
       <tr>
       <th>TEMPERATURE</th>
       <td>'.$this->encrypt->decode($row->sc2_temperature).'</td>
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
        <br><br>

        <div align="right">
        <label><b>Signature:  _________________</b></label><br>
        </div>
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
        
        $dataArr = $this->Auditor_model->get_sc3_id($id);

        foreach($dataArr as $row){


    $this->pdf->AddPage();

        $html = '<div><h1>SC2 - REFRIGERATION</h1></div>
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
        <br><br>

        <div align="right">
        <label><b>Signature:  _________________</b></label><br>
        </div>
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
        
        $dataArr = $this->Auditor_model->get_sc4_id($id);
       

        foreach($dataArr as $row){
                        $date   = $row->sc4_date;
                        $food   = $this->encrypt->decode($row->sc4_food);
                        $time   = $row->sc4_hot_hold_time;
                        $chk1   = $this->encrypt->decode($row->sc4_core_temp_chk1);
                        $chk2   = $this->encrypt->decode($row->sc4_core_temp_chk2);
                        $chk3   = $this->encrypt->decode($row->sc4_core_temp_chk3);
                        $comments=$this->encrypt->decode($row->sc4_comments_action);
                        $sign   = $this->encrypt->decode($row->sc4_sign);
                        $check  = $row->sc4_mgr_supvsr_chk;
                        $mgr_sign=$this->encrypt->decode($row->sc4_mgr_sign);



    $this->pdf->AddPage();

        $html = '<div><h1>SC4 - Hot Hold/Display Records
</h1></div>
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
        <br><br>

        <div align="right">
        <label><b>Signature:  _________________</b></label><br>
        </div>
        ';
        $this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('$id.pdf');


        }


    }


}



public function sc1_dwld_pdf(){

$id = $this->session->userdata('user_id');
 $dataArr = $this->Auditor_model->form_1($id);

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
$html .= '</table>
<br><br>

        <div align="right">
        <label><b>Signature:  _________________</b></label><br>
        </div>';

$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('sc1.pdf');



//plugin dompdf
 

}

public function sc2_dwld_pdf(){

//plugin dompdf
 $id = $this->session->userdata('user_id');
 $dataArr = $this->Auditor_model->form_2($id);
 //echo "<pre>"; print_r($dataArr); die();

 $this->pdf->AddPage('L');

 
$html = '

<center><h3>SC2 - Fridge/Freezer/Chill Display Temperature Records
</h3></center>
<br>
<br><br>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                        <th>Date</th>
                        <th>REFRIGERATION UNIT OF COLD STORAGE</th>
                        <th>Comments</th>
                       
                        
                    </tr>



';

foreach($dataArr as $row)
{
  $date = $row->sc2_date; 
  $temperature_date =  date('d-m-Y',strtotime($date)); 
  $temperature_time =  date('d-m-Y',strtotime($date)); 

    $html .= '
  <tr>
                            <td>'.$temperature_date.'</td>
                            <td>'.$this->encrypt->decode($row->sc2_temperature).'</td>
                            <td></td>
                            
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
$html .= '</table><br><br>

        <div align="right">
        <label><b>Signature:  _________________</b></label><br>
        </div>';

$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('sc2.pdf');


}

public function sc3_dwld_pdf(){

//plugin dompdf
 $id = $this->session->userdata('user_id');
 $dataArr = $this->Auditor_model->form_3($id);

 
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
$html .= '</table>
<br><br>

        <div align="right">
        <label><b>Signature:  _________________</b></label><br>
        </div>';

$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('sc3.pdf');



}


public function sc4_dwld_pdf(){

//plugin dompdf
 $id = $this->session->userdata('user_id');
 $dataArr = $this->Auditor_model->form_4($id);


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
$html .= '</table>
<br><br>

        <div align="right">
        <label><b>Signature:  _________________</b></label><br>
        </div>';

$this->pdf->writeHTML($html);
$this->pdf->lastPage();
$this->pdf->Output('sc4.pdf');


}

function vendor_edit(){

        $this->form_validation->set_rules('ud_fname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('ud_lname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('ud_address', 'Address', 'required|trim');
        $this->form_validation->set_rules('ud_phone', 'Phone Number', 'required|numeric|trim');
        if($this->form_validation->run() == false){

            $this->vendor_list();
        }
        else
        {
            $this->load->library('encrypt');

            $data = array(
                'ud_fname'   => $this->encrypt->encode($this->input->post('ud_fname')),
                'ud_lname'   => $this->encrypt->encode($this->input->post('ud_lname')),
                'ud_address' => $this->encrypt->encode($this->input->post('ud_address')),
                'ud_ph_no'   => $this->encrypt->encode($this->input->post('ud_phone')),

            );
            $this->Auditor_model->edit_vendor($this->input->post('hidden_id'), $data);
            $data2 = array(
                /*'user_vendor_id'   => $this->input->post('vendor_unique_id'),*/
                'user_name'   => $this->input->post('username'),

            );
            $result = $this->Auditor_model->edit_vendoruser($this->input->post('userid'), $data2);
            if ($result) {
            $this->session->set_flashdata('success','Vendor details updated successfully'); 
            }
            
            redirect('Auditor/vendor_list');
        }
    }


function vendor_list(){

    $id = $this->session->userdata('user_id'); 
    $vendorlist = $this->Auditor_model->vendor_lists($id);
    foreach ($vendorlist as $key => $value) {
      $count = $this->Auditor_model->vendor_listsalert($vendorlist[$key]->user_id);
      $vendorlist[$key]->alertcount = $count;
    }
    $data['data'] =  $vendorlist;
    //echo "<pre>"; print_r($data); die();
    $this->load->view('auditor_header',$data);
    $this->load->view('auditor_vendor_list');
}

function yellow_offenders(){

    $id = $this->session->userdata('user_id'); 
    $vendoridlist = $this->Auditor_model->vendor_lists($id);
    $vendorlist = $this->Auditor_model->vendor_listsforalert($id);
    $vendorid = explode(',', $vendorlist[0]->vendor_id);
    $year  = date("Y");
    $month = date("m");
    $day     = date("d");
    
    $totaldate =cal_days_in_month(CAL_GREGORIAN,$month,$year);
    $result = array();
    foreach ($vendoridlist as $key => $value) {
      $noentrycount1 =0;
      $noentrycount2 =0;
      $noentrycount3 =0;
      $noentrycount4 =0;
     for ($i=1; $i <= $day; $i++) { 
      /*sc1*/
      $checkresultsc1 = $this->Cron_model->sc1check("'".$year."-".$month."-".$i."'");
      $nonentrysc1 = array_diff($vendorid, array_unique(explode(',', $checkresultsc1[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc1)) {
        $noentrycount1 = $noentrycount1+1;
      }
      /*sc2*/
       $checkresultsc2 = $this->Cron_model->s2check("'".$year."-".$month."-".$i."'");
      $nonentrysc2 = array_diff($vendorid, array_unique(explode(',', $checkresultsc2[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc2)) {
        $noentrycount2 = $noentrycount2+1;
      }
      /*sc3*/
       $checkresultsc3 = $this->Cron_model->sc3check("'".$year."-".$month."-".$i."'");
      $nonentrysc3 = array_diff($vendorid, array_unique(explode(',', $checkresultsc3[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc3)) {
        $noentrycount3 = $noentrycount3+1;
      }
      /*sc4*/
       $checkresultsc4 = $this->Cron_model->sc4check("'".$year."-".$month."-".$i."'");
      $nonentrysc4 = array_diff($vendorid, array_unique(explode(',', $checkresultsc4[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc4)) {
        $noentrycount4 = $noentrycount4+1;
      }
      
    }
    $created_date  = strtotime($vendoridlist[$key]->user_created_date);
    $currentdate   = strtotime(date("Y-m-d H:m:s"));
    $diff   = abs($currentdate - $created_date); 
    $years  = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) 
                               / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 -  
             $months*30*60*60*24)/ (60*60*24)); 
    $vendoridlist[$key]->createddatecount = $days;
    $vendoridlist[$key]->noentrycountsc1  = $noentrycount1;
    $vendoridlist[$key]->noentrycountsc2  = $noentrycount2;
    $vendoridlist[$key]->noentrycountsc3  = $noentrycount3;
    $vendoridlist[$key]->noentrycountsc4  = $noentrycount4;
    }
    
    $data['data'] =  $vendoridlist;
    $this->load->view('auditor_header',$data);
    $this->load->view('yellow_offenders');
}

function orange_offenders(){

    $id = $this->session->userdata('user_id'); 
    $vendoridlist = $this->Auditor_model->vendor_lists($id);
    $vendorlist = $this->Auditor_model->vendor_listsforalert($id);
    $vendorid = explode(',', $vendorlist[0]->vendor_id);
    $year  = date("Y");
    $month = date("m");
    $day     = date("d");
    
    $totaldate =cal_days_in_month(CAL_GREGORIAN,$month,$year);
    $result = array();
    foreach ($vendoridlist as $key => $value) {
      $noentrycount1 =0;
      $noentrycount2 =0;
      $noentrycount3 =0;
      $noentrycount4 =0;
     for ($i=1; $i <= $day; $i++) { 
      /*sc1*/
      $checkresultsc1 = $this->Cron_model->sc1check("'".$year."-".$month."-".$i."'");
      $nonentrysc1 = array_diff($vendorid, array_unique(explode(',', $checkresultsc1[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc1)) {
        $noentrycount1 = $noentrycount1+1;
      }
      /*sc2*/
       $checkresultsc2 = $this->Cron_model->s2check("'".$year."-".$month."-".$i."'");
      $nonentrysc2 = array_diff($vendorid, array_unique(explode(',', $checkresultsc2[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc2)) {
        $noentrycount2 = $noentrycount2+1;
      }
      /*sc3*/
       $checkresultsc3 = $this->Cron_model->sc3check("'".$year."-".$month."-".$i."'");
      $nonentrysc3 = array_diff($vendorid, array_unique(explode(',', $checkresultsc3[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc3)) {
        $noentrycount3 = $noentrycount3+1;
      }
      /*sc4*/
       $checkresultsc4 = $this->Cron_model->sc4check("'".$year."-".$month."-".$i."'");
      $nonentrysc4 = array_diff($vendorid, array_unique(explode(',', $checkresultsc4[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc4)) {
        $noentrycount4 = $noentrycount4+1;
      }
      
    }
     $created_date  = strtotime($vendoridlist[$key]->user_created_date);
    $currentdate    = strtotime(date("Y-m-d H:m:s"));
    $diff   = abs($currentdate - $created_date);
    $years          = floor($diff / (365*60*60*24));
    $months         = floor(($diff - $years * 365*60*60*24)/ (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
    $vendoridlist[$key]->createddatecount = $days;
    $vendoridlist[$key]->noentrycountsc1 = $noentrycount1;
    $vendoridlist[$key]->noentrycountsc2 = $noentrycount2;
    $vendoridlist[$key]->noentrycountsc3 = $noentrycount3;
    $vendoridlist[$key]->noentrycountsc4 = $noentrycount4;
    }
    $data['data'] =  $vendoridlist;
    $this->load->view('auditor_header',$data);
    $this->load->view('orange_offenders');
}

function red_offenders(){
$id = $this->session->userdata('user_id'); 
    $vendoridlist = $this->Auditor_model->vendor_lists($id);
    $vendorlist = $this->Auditor_model->vendor_listsforalert($id);
    $vendorid = explode(',', $vendorlist[0]->vendor_id);
    $year  = date("Y");
    $month = date("m");
    $day     = date("d");
    
    $totaldate =cal_days_in_month(CAL_GREGORIAN,$month,$year);
    $result = array();
    foreach ($vendoridlist as $key => $value) {
      $noentrycount1 =0;
      $noentrycount2 =0;
      $noentrycount3 =0;
      $noentrycount4 =0;
     for ($i=1; $i <= $day; $i++) { 
      /*sc1*/
      $checkresultsc1 = $this->Cron_model->sc1check("'".$year."-".$month."-".$i."'");
      $nonentrysc1 = array_diff($vendorid, array_unique(explode(',', $checkresultsc1[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc1)) {
        $noentrycount1 = $noentrycount1+1;
      }
      /*sc2*/
       $checkresultsc2 = $this->Cron_model->s2check("'".$year."-".$month."-".$i."'");
      $nonentrysc2 = array_diff($vendorid, array_unique(explode(',', $checkresultsc2[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc2)) {
        $noentrycount2 = $noentrycount2+1;
      }
      /*sc3*/
       $checkresultsc3 = $this->Cron_model->sc3check("'".$year."-".$month."-".$i."'");
      $nonentrysc3 = array_diff($vendorid, array_unique(explode(',', $checkresultsc3[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc3)) {
        $noentrycount3 = $noentrycount3+1;
      }
      /*sc4*/
       $checkresultsc4 = $this->Cron_model->sc4check("'".$year."-".$month."-".$i."'");
      $nonentrysc4 = array_diff($vendorid, array_unique(explode(',', $checkresultsc4[0]->user_id)));
      if (in_array($vendoridlist[$key]->user_id, $nonentrysc4)) {
        $noentrycount4 = $noentrycount4+1;
      }
      
    }
     $created_date  = strtotime($vendoridlist[$key]->user_created_date);
    $currentdate    = strtotime(date("Y-m-d H:m:s"));
    $diff           = abs($currentdate - $created_date);
    $years          = floor($diff / (365*60*60*24));
    $months         = floor(($diff - $years * 365*60*60*24)/ (30*60*60*24));
    $days           = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
    $vendoridlist[$key]->createddatecount = $days;
    $vendoridlist[$key]->noentrycountsc1 = $noentrycount1;
    $vendoridlist[$key]->noentrycountsc2 = $noentrycount2;
    $vendoridlist[$key]->noentrycountsc3 = $noentrycount3;
    $vendoridlist[$key]->noentrycountsc4 = $noentrycount4;
    }
    $data['data'] =  $vendoridlist;
    $this->load->view('auditor_header',$data);
    $this->load->view('red_offenders');
}



function edit_view_vendor($userid=''){    
        $data['data'] = $this->Auditor_model->fetch_vendor_data($userid);
        $this->load->view('auditor_edit_vendor', $data);
    }



    function delete_vendor($id='',$userid=''){

        $id = $this->input->get('id');
        $this->Auditor_model->delete_by_row($id);
        $this->Auditor_model->delete_by_rowuser($userid);
    $id = $this->session->userdata('user_id'); 
/*    $data['data'] =  $this->Auditor_model->vendor_lists($id);*/
        /*$this->load->view('auditor_vendor_list', $data);   */ 
       redirect('Auditor/vendor_list');
    }


    public function suspend_vendor(){

     

     $id = $this->input->post('id');
     $data = array('user_active_status' => '0' );
     $update_suspend = $this->Auditor_model->suspend_vendor_action($id,$data);
     /*redirect('Auditor/vendor_list');*/
     if ($update_suspend) {
       echo "MAKE ACTIVE";
     }else{

      echo "NOTUPDATED";
     }
    
    }

     public function make_active(){

     $id = $this->input->post('id');
     $data = array('user_active_status' => '1' );
     $update_suspend = $this->Auditor_model->suspend_vendor_action($id,$data);
     /*redirect('Auditor/vendor_list');*/
     if ($update_suspend) {
       echo "MAKE ACTIVE";
     }else{

      echo "NOTUPDATED";
     }
    
    }




}
	