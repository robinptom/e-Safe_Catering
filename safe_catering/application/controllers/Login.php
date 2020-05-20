<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

    function __construct(){

        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');
    }
    public function index(){
	
        $this->load->view('login');
    }

    public function login(){

		$this->form_validation->set_rules('email', 'Email','required');
		$this->form_validation->set_rules('pass', 'Password','required');
			
    	if($this->form_validation->run()){
		     // get the post values
    		$username 		= 	$this->input->post('email',true);
			$password 		= 	$this->input->post('pass',true);
			$result  		=   $this->Login_model->check_user($username,$password);

			if ($result->num_rows()>0) {
				$data 		= $result->row_array();   
				$email 		= $data['user_name'];
				$user_id    = $data['user_id'];
				$level 		= $data['user_role'];
				$active_status = $data['user_active_status'];
				}

				if($active_status == true){

				$log_status = 	 $this->Login_model->get_log_status($user_id);
				if ($log_status!="NOTFOUND") 
				{
					if($log_status[0]->logged_in_status=='0')
					{


						$insertArr 	= array(

						'log_user_id'   	=> $user_id,
						'log_user_role'		=> $level,
						'log_date'      	=> date('Y-m-d'),
						'log_time'      	=> date('H:i:s'),
						'logged_in_status'  => true
						);
						$insert 	=    $this->Login_model->insert_log($insertArr);

					}
					else
					{
						
						$this->session->set_flashdata('error','User is already logged in!');
						redirect('/');
						
					}
				}
				else
				{

					$insertArr 	= array(

					'log_user_id'   	=> $user_id,
					'log_user_role'		=> $level,
					'log_date'      	=> date('Y-m-d'),
					'log_time'      	=> date('H:i:s'),
					'logged_in_status'  => true
					);
					$insert 	=    $this->Login_model->insert_log($insertArr);
					//echo "user already logged!";  die();
				}

				$sesdata 	= array(

					'email' 	=> $email,
					'user_id'   => $user_id,
					'level' 	=> $level,
					'logged_in' => true
				);

				$this->session->set_userdata($sesdata);
				if($level === '1'){
					redirect('Admin');
				}
				elseif ($level === '2') {
					redirect('Auditor');
				}
				elseif ($level === '3') {
					redirect('Vendor');
				}
				else{
					echo '<h1>error</h1>';
				}

				$this->load->view('login');
			
		}
	}
			
			$this->session->set_flashdata('error','Invalid username or password');
			redirect('/');
		

		

	}
	
	function logout(){

		$this->session->unset_userdata('logged_in');
		$id 		=  $this->session->userdata('user_id');
		$updateArr 	= array(
					'log_user_role'		=> $this->session->userdata('level'),
					'log_date'      	=> date('Y-m-d'),
					'log_time'      	=> date('H:i:s'),
					'logged_in_status'  => false
				);
		
		$update_log 	=    $this->Login_model->update_log($id,$updateArr);

		redirect('Login');
	}
}
	