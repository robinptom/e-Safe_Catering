<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{      
    function getRoles(){

        $query = $this->db->query("select role_id,role_name from role");
        return $query->result();
    }

    function role_insert($data){

        $this->db->insert('user_details', $data);
    }

    function user_insert($result){

        $this->db->insert('user', $result);
        return $this->db->insert_id();
    }

    function suspend_auditor_action($id,$data){

        $this->db->where('user_id',$id);
        $query = $this->db->update('user',$data);
        return $query ;
    }

   

    function sup_add($data){

        $this->db->insert('supplier', $data);
        return true;
    }

    function view_admin(){

       $query = $this->db->query("select * from user AS e left JOIN user_details AS u ON e.user_id = u.ud_user_id WHERE e.user_role = '1'");
       return $query->result();
    }

    function view_auditor(){

       $query = $this->db->query("select * from user AS e INNER JOIN user_details AS u ON e.user_id = u.ud_user_id WHERE e.user_role = '2'");
       return $query->result();
    }

    function fetch_sup_detail(){

        $query=$this->db->query("select * from supplier INNER JOIN user_details ON supplier.sup_user_id = user_details.ud_user_id  ");
        return $query->result();
    }

    function view_vendor(){

        $query=$this->db->query("select * from user AS e INNER JOIN user_details AS u ON e.user_id = u.ud_user_id WHERE e.user_role = '3'");
        return $query->result();
    }
    function get_auditor($userid=''){

        $query=$this->db->query("select user_name from user AS e INNER JOIN user_details AS u ON e.user_id = u.ud_user_id WHERE e.user_role = '2' and e.user_id='$userid'");
        return $query->result();
    }

    function supplier_join(){

        $query=$this->db->query("select user_id from user where user_role='1' ");
        return $query->result();
    }
     

      function fetch_admin_data($userid=''){

       /* $this->db->where('ud_id', $id);
        return $this->db->get('user_details');*/
        $query=$this->db->query("select * from user AS e left JOIN user_details AS u ON e.user_id = u.ud_user_id WHERE  e.user_id='$userid'");
        return $query->result();
    }

    function fetch_auditor_data($userid=''){

       /* $this->db->where('ud_id', $id);
        return $this->db->get('user_details');*/
        $query=$this->db->query("select * from user AS e left JOIN user_details AS u ON e.user_id = u.ud_user_id WHERE  e.user_id='$userid'");
        return $query->result();
    }

    function fetch_vendor_data($userid=''){
        $query=$this->db->query("select * from user AS e left JOIN user_details AS u ON e.user_id = u.ud_user_id WHERE  e.user_id='$userid'");
        return $query->result();
    }

    function fetch_supplier_data($id){

        $this->db->where('sup_id', $id);
        return $this->db->get('supplier');
    }

    function delete_row($id){

        $this->db->where('ud_id', $id);
        return $this->db->delete('user_details');
    }

     function delete_rowuser($id){

        $this->db->where('user_id', $id);
        return $this->db->delete('user');
    }


    function delete_by_row($id){

        $this->db->where('ud_id', $id);
        return $this->db->delete('user_details');
    }

    function delete_by_rowuser($id){

        $this->db->where('user_id', $id);
        return $this->db->delete('user');
    }

    function delete_sup($id){

        $this->db->where('sup_id', $id);
        return $this->db->delete('supplier');
    }

    function edit_auditor($id, $data){

        $this->db->where('ud_user_id', $id);
        $this->db->update('user_details', $data);
    }

     function edit_auditoruser($id, $data){

        $this->db->where('user_id', $id);
        $this->db->update('user', $data);
    }

    function edit_vendor($id, $data){

        $this->db->where('ud_user_id', $id);
        $this->db->update('user_details', $data);
    }

    function edit_vendoruser($id, $data){

        $this->db->where('user_id', $id);
        $this->db->update('user', $data);
    }
    function edit_supplier($id, $data){

        $this->db->where('sup_id', $id);
        $this->db->update('supplier', $data);
    }
    function form_1(){
        
        $query = $this->db->query("
                     select 
                        *
                     from
                        sc1_food_delivery
                     INNER JOIN user ON sc1_food_delivery.sc1_user_id = user.user_id
                      INNER JOIN user_details ON sc1_food_delivery.sc1_user_id = user_details.ud_user_id

                      INNER JOIN role ON user.user_role = role.role_id ");
        return $query->result();
    }
    function form_2(){

         $query = $this->db->query("
                     select 
                        *
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                      INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id

                      INNER JOIN role ON user.user_role = role.role_id ");
        return $query->result();
    }
    function form_3(){

        $query = $this->db->query("
                     select 
                        *
                     from
                        sc3_reheating
                     INNER JOIN user ON sc3_reheating.sc3_user_id = user.user_id
                      INNER JOIN user_details ON sc3_reheating.sc3_user_id = user_details.ud_user_id

                      INNER JOIN role ON user.user_role = role.role_id ");
        return $query->result();
    }
    function form_4(){  

       $query = $this->db->query("
                     select 
                        *
                     from
                        sc4_display_records
                     INNER JOIN user ON sc4_display_records.sc4_user_id = user.user_id
                      INNER JOIN user_details ON sc4_display_records.sc4_user_id = user_details.ud_user_id

                      INNER JOIN role ON user.user_role = role.role_id ");
        return $query->result();

    }


    function auditor_sc1_data($id='')
    {
        $query = $this->db->query("
                     select 
                        *
                     from
                        sc1_food_delivery
                     INNER JOIN user ON sc1_food_delivery.sc1_user_id = user.user_id
                     INNER JOIN user_details ON sc1_food_delivery.sc1_user_id = user_details.ud_user_id INNER JOIN role ON user.user_role = role.role_id  WHERE sc1_food_delivery.sc1_id = $id");
        return $query->result();


    }

    function auditor_sc2_data($id=''){
        $query = $this->db->query("
                     select 
                        *
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id INNER JOIN role ON user.user_role = role.role_id  WHERE sc2_refrigeration.sc2_id = $id");
        return $query->result();


    }
    function auditor_sc3_data($id=''){
                $query = $this->db->query("
                     select 
                        *
                     from
                        sc3_reheating
                     INNER JOIN user ON sc3_reheating.sc3_user_id = user.user_id
                     INNER JOIN user_details ON sc3_reheating.sc3_user_id = user_details.ud_user_id INNER JOIN role ON user.user_role = role.role_id  WHERE sc3_reheating.sc3_id = $id");
        return $query->result();

    }

    function auditor_sc4_data($id=''){
                $query = $this->db->query("
                     select 
                        *
                     from
                        sc4_display_records
                     INNER JOIN user ON sc4_display_records.sc4_user_id = user.user_id
                     INNER JOIN user_details ON sc4_display_records.sc4_user_id = user_details.ud_user_id INNER JOIN role ON user.user_role = role.role_id  WHERE sc4_display_records.sc4_id = $id");
        return $query->result();

    }

    function suspend_vendor_action($id,$data){

        $this->db->where('user_id',$id);
        $query = $this->db->update('user',$data);
        return $query ;
    }

    function suspend_activate_user($id,$data){

        $this->db->where('user_id',$id);
        $query = $this->db->update('user',$data);
        return $query ;
    }

}