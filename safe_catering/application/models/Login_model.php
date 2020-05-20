<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function __construct(){
        
        parent::__construct();
    }
    
    public function check_user($username,$password){

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_name',$username);
        $this->db->where('user_pwd',$password);
        $query = $this->db->get();
        return $query;
    }

    public function insert_log($insertArr){

        $query = $this->db->insert('logs',$insertArr);

         return $query;

    }

    public function update_log($id,$updateArr){

        $this->db->where('log_user_id',$id);
        $query = $this->db->update('logs',$updateArr);

         return $query;

    }


    public function get_log_status($user_id=''){


        $query = $this->db->query("select * from logs WHERE log_user_id = '$user_id' order by log_id limit 1");

        if($query->num_rows()>0){

          return $query->result();  

        }
    else{

        return "NOTFOUND";
    }
        
    }

    public function get_user_profile($userId = null){

        if($userId) {
            $sql = "SELECT * FROM user WHERE user_id = ?";
            $query = $this->db->query($sql, array($userId));
            $result = $query->row_array();

            return $result;
        }
    }
    public function update_admin_password($userid) {

        if($userid) {
            $update_data = array(
            'user_pwd' => $this->input->post('admin_password'),
            );
            $this->db->where('user_id', $userid);
            $query = $this->db->update('user', $update_data);
            return ($query === true) ? true : false;
        }
    }

    public function update_auditor_password($userid) {
        if($userid) {
            $update_data = array(
                'user_pwd' => $this->input->post('auditor_password'),
            );
            $this->db->where('user_id', $userid);
            $query = $this->db->update('user', $update_data);
            return ($query === true) ? true : false;
        }
    }

    public function update_vendor_password($userid) {
        if($userid) {
            $update_data = array(
                'user_pwd' => $this->input->post('vendor_password'),
            );
            $this->db->where('user_id', $userid);
            $query = $this->db->update('user', $update_data);
            return ($query === true) ? true : false;
        }
    }


    public function user_password_change_page_redirect($userId = null){

        if($userId) {
            $sql = "SELECT * FROM user WHERE user_id = ? AND user_pwd = 'safecatering'";
            $query = $this->db->query($sql, array($userId));
            $result = $query->row_array();
            return $result;
        }
    }
}