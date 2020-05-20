<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_function extends CI_Controller 
{
	function __construct(){

        parent::__construct();  
        $this->load->library('encrypt');
        $this->load->model('Cron_model');

        
    }

			  public function index(){
			 
			  $date   = date('Y-m-d',strtotime("-1 days"));
			  $todaydate   = date('Y-m-d');
			  /*sc1*/
              $scresults1 = $this->Cron_model->sc1check($date);
              if ($scresults1[0]->user_id!='') {
              $scresults11  = explode(',', $scresults1[0]->user_id);
              if ($scresults11) {
              	 $scresults111 = array_unique($scresults11);
              }else{
              	$scresults111=0;
              }
             
              if (count($scresults111)>0) {
              	 $user1 = $this->Cron_model->user_check($scresults111);
              if($user1){
              foreach ($user1 as $key1 => $value1) {
			  $data = array(
			  	'alert_user_id '  => $user1[$key1]->user_id,
			  	'alert_form_type'	=>	'SC1', 
			  	'alert_date'	=>	$date,
			    'alert_created_date'=>$todaydate
			  );
              	$this->Cron_model->insert_alert($data);
              }
              }
              }
             
              }

              /*sc2*/
              $scresults2 = $this->Cron_model->s2check($date);
              if ($scresults2[0]->user_id!='') {
              $scresults22  = explode(',', $scresults2[0]->user_id);
              if ($scresults22) {
              $scresults222 = array_unique($scresults22);
              }
              
              if (count($scresults222)>0) {
              $user2 = $this->Cron_model->user_check($scresults222);
              if ($user2) {
              	 foreach ($user2 as $key2 => $value2) {
              
              $data = array(
			  	'alert_user_id '		=>	$user2[$key2]->user_id,
			  	'alert_form_type'	=>	'SC2', 
			  	'alert_date'	=>	$date,
			    'alert_created_date'=>$todaydate
			  );

              $this->Cron_model->insert_alert($data);
              }
              }
              }
              
             
              }

              /*sc3*/
              $scresults3 = $this->Cron_model->sc3check($date);
              if ($scresults3[0]->user_id!='') {
              $scresults33  = explode(',', $scresults3[0]->user_id);
              if ($scresults33) {
              	$scresults333 = array_unique($scresults33);
              }
              
              if (count($scresults333)>0) {
              	$user3 = $this->Cron_model->user_check($scresults333);
              if ($user3) {
              	foreach ($user3 as $key3 => $value3) {
              $data = array(
			  	'alert_user_id '		=>	$user3[$key3]->user_id,
			  	'alert_form_type'	=>	'SC3', 
			  	'alert_date'	=>	$date,
			    'alert_created_date'=>$todaydate
			  );
              	$this->Cron_model->insert_alert($data);
              }
              }
              }
              
              
              }

              /*sc4*/
              $scresults4  = $this->Cron_model->sc4check($date);
              if ($scresults4[0]->user_id!='') {
              $scresults44  = explode(',', $scresults4[0]->user_id);
              if ($scresults44) {
              	$scresults444  = array_unique($scresults44);
              }
              
              if (count($scresults444)>0) {
              	 $user4 = $this->Cron_model->user_check($scresults444);
               if ($user4) {
            	  foreach ($user4 as $key4 => $value4) {
               $data = array(
			  	'alert_user_id '		=>	$user4[$key4]->user_id,
			  	'alert_form_type'	=>	'SC4', 
			  	'alert_date'	=>	$date,
			    'alert_created_date'=>$todaydate
			  );
              	$this->Cron_model->insert_alert($data);
              }
            }
              }
             
              }
             
              exit();
			  }




}