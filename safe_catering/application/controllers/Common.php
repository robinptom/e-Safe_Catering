<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller
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

   public function check_vendor_liscenece(){
    $liscenece = $this->input->post('liscence');
    $result    = $this->Common_model->checkvendorliscenece($liscenece);
    if ($result>0) {
     /* $res = array('result' =>$result);
      echo json_encode($res);*/
      echo "EXIST";
    }else{
      /*$res = array('result' =>'0');
      echo json_encode($res);*/
      echo '0';
    }

   }


}
