<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditor_model extends CI_Model
{      


    function join_role_user_sc1($id){

        $query = $this->db->query("select * from sc1_food_delivery AS e INNER JOIN user AS u ON e.sc1_user_id = u.user_id WHERE e.sc1_id = '$id'");
       return $query->result();
    }

    function get_sc1_id($id='')
    {
        $query = $this->db->query("
                     select 
                        *
                     from
                        sc1_food_delivery
                     INNER JOIN user ON sc1_food_delivery.sc1_user_id = user.user_id
                     INNER JOIN user_details ON sc1_food_delivery.sc1_user_id = user_details.ud_user_id   WHERE sc1_food_delivery.sc1_id = $id");
        return $query->result();

    }

    function get_sc2_id($id=''){
        $query = $this->db->query("
                     select 
                        *
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id  WHERE sc2_refrigeration.sc2_id = $id");
        return $query->result();


    }
    function get_sc3_id($id=''){
                $query = $this->db->query("
                     select 
                        *
                     from
                        sc3_reheating
                     INNER JOIN user ON sc3_reheating.sc3_user_id = user.user_id
                     INNER JOIN user_details ON sc3_reheating.sc3_user_id = user_details.ud_user_id INNER JOIN role ON user.user_role = role.role_id  WHERE sc3_reheating.sc3_id = $id");
        return $query->result();

    }

    function get_sc4_id($id=''){
                $query = $this->db->query("
                     select 
                        *
                     from
                        sc4_display_records
                     INNER JOIN user ON sc4_display_records.sc4_user_id = user.user_id
                     INNER JOIN user_details ON sc4_display_records.sc4_user_id = user_details.ud_user_id INNER JOIN role ON user.user_role = role.role_id  WHERE sc4_display_records.sc4_id = $id");
        return $query->result();

    }

    function get_sc1_report($id,$from_date,$to_date){

         $query = $this->db->query("
                     select 
                        *
                     from
                        sc1_food_delivery
                     INNER JOIN user ON sc1_food_delivery.sc1_user_id = user.user_id
                     INNER JOIN user_details ON sc1_food_delivery.sc1_user_id = user_details.ud_user_id WHERE  date(sc1_food_delivery.sc1_date) >='$from_date' AND  date(sc1_food_delivery.sc1_date) <='$to_date' AND sc1_food_delivery.sc1_user_id='$id'" );
        return $query->result();

    }

    function get_sc2_report($id,$from_date,$to_date){

$query = $this->db->query("
                     select 
                        *
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id WHERE  date(sc2_refrigeration.sc2_date) >= '$from_date' AND date(sc2_refrigeration.sc2_date) <= '$to_date' and sc2_refrigeration.sc2_user_id='$id'");
        return $query->result();
    }


    function get_sc3_report($id,$from_date,$to_date){

$query = $this->db->query("
                     select 
                        *
                     from
                        sc3_reheating
                     INNER JOIN user ON sc3_reheating.sc3_user_id = user.user_id
                     INNER JOIN user_details ON sc3_reheating.sc3_user_id = user_details.ud_user_id WHERE date(sc3_reheating.sc3_date) >= '$from_date' AND date(sc3_reheating.sc3_date) <= '$to_date' and sc3_reheating.sc3_user_id='$id'");
        return $query->result();

    }

    function get_sc4_report($id,$from_date,$to_date){
 $query = $this->db->query("
                     select 
                        *
                     from
                        sc4_display_records
                     INNER JOIN user ON sc4_display_records.sc4_user_id = user.user_id
                     INNER JOIN user_details ON sc4_display_records.sc4_user_id = user_details.ud_user_id WHERE  date(sc4_display_records.sc4_date) >= '$from_date' AND date(sc4_display_records.sc4_date) <= '$to_date' and sc4_display_records.sc4_user_id='$id'");
        return $query->result();


function get_sc2_report_print($id,$from_date,$to_date){

$query = $this->db->query("
                     select 
                      date(sc2_date) as date
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id WHERE user.user_id = '$id' AND  date(sc2_refrigeration.sc2_date)>= '$from_date' AND date(sc2_refrigeration.sc2_date) <='$to_date' GROUP BY date");
        return $query->result();
    }

function get_sc2_unit($id='',$from_date='',$to_date=''){
    $query = $this->db->query("select sc2_unit ,  date(sc2_date) as date from sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id WHERE user.user_id = '$id' AND  date(sc2_refrigeration.sc2_date) >= '$from_date' AND date(sc2_refrigeration.sc2_date) <= '$to_date' GROUP BY sc2_unit");
        return $query->result();

}



function get_temperature_value($id,$date='',$sc2_unit=''){

    $query = $this->db->query("
                     select 
                      sc2_temperature, DATE_FORMAT(sc2_date, '%r') as time , date(sc2_date) as date_value, sc2_id, sc2_user_id, sc2_unit
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id WHERE user.user_id = '$id' AND date(sc2_date) = '$date' and sc2_unit='$sc2_unit' ");
        return $query->result();




}

function get_pm_value($id,$from_date,$to_date){

    $query = $this->db->query("
                     select 
                      sc2_temperature, DATE_FORMAT(sc2_date, '%r') as time 
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id WHERE user.user_id = '$id' AND  date(sc2_refrigeration.sc2_date)>= '$from_date' AND date(sc2_refrigeration.sc2_date)<='$to_date'

");
        return $query->result();




}


    }

    

    function auditor_sc1_data($id='')
    {
        $query = $this->db->query("
                     select 
                        *
                     from
                        sc1_food_delivery
                     INNER JOIN user ON sc1_food_delivery.sc1_user_id = user.user_id
                     INNER JOIN user_details ON sc1_food_delivery.sc1_user_id = user_details.ud_user_id INNER JOIN role ON user.user_role = role.role_id  WHERE sc1_food_delivery.sc1_id = '$id'");
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

    function vendor_lists($id){

        $query =  $this->db->query("select * from user INNER JOIN user_details ON user.user_id = user_details.ud_user_id WHERE user.user_created_by ='$id'");
        return $query->result();
    }
    function vendor_listsforalert($id){

        $query =  $this->db->query("select GROUP_CONCAT(user_id) as vendor_id  from user  WHERE user_created_by ='$id'");
        return $query->result();
    }

    function vendor_listsalert($id){

        $query =  $this->db->query("select * from alert WHERE alert_user_id='$id'");
        return $query->num_rows();
    }

    function pdfff($id){

    return $this->db->get_where('user_details', array('ud_user_id' => $id))->result_array();

    }

    function join_sc1_details(){

    }

    function fetch_vend_aud(){
        $query =   $this->db->query("select role_id,role_name from role WHERE role_id = '3'");
        return $query->result();
    }

    function role_insert($data){

        $this->db->insert('user_details', $data);
    }

    function user_insert($result){
        $this->db->insert('user', $result);
        return $this->db->insert_id();
    }
    function sc1_download(){

         $query = $this->db->query("
                     select 
                        *
                     from
                        sc1_food_delivery
                     INNER JOIN user ON sc1_food_delivery.sc1_user_id = user.user_id
                     INNER JOIN user_details ON sc1_food_delivery.sc1_user_id = user_details.ud_user_id INNER JOIN role ON user.user_role = role.role_id");
        return $query->result();


    }
    function view_vendors($id){

        $query = $this->db->query("select * from user INNER JOIN user_details ON user.user_id = user_details.ud_user_id  WHERE user_id = $id");
        return $query->result();

    }

    function form_1($id){
        
        $query = $this->db->query("
                     select 
                        *
                     from
                        sc1_food_delivery
                     INNER JOIN user ON sc1_food_delivery.sc1_user_id = user.user_id
                      INNER JOIN user_details ON sc1_food_delivery.sc1_user_id = user_details.ud_user_id

                      INNER JOIN role ON user.user_role = role.role_id WHERE user_created_by = $id");
        return $query->result();
    }
    function form_2($id){

         $query = $this->db->query("    
                     select 
                        *
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                      INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id

                      INNER JOIN role ON user.user_role = role.role_id WHERE user_created_by = $id ");
        return $query->result();

    }
    function form_3($id){

        $query = $this->db->query("
                     select 
                        *
                     from
                        sc3_reheating
                     INNER JOIN user ON sc3_reheating.sc3_user_id = user.user_id
                      INNER JOIN user_details ON sc3_reheating.sc3_user_id = user_details.ud_user_id

                      INNER JOIN role ON user.user_role = role.role_id  WHERE user_created_by = $id ");
        return $query->result();
      
    }
    function form_4($id){

          $query = $this->db->query("
                     select 
                        *
                     from
                        sc4_display_records
                     INNER JOIN user ON sc4_display_records.sc4_user_id = user.user_id
                      INNER JOIN user_details ON sc4_display_records.sc4_user_id = user_details.ud_user_id

                      INNER JOIN role ON user.user_role = role.role_id  WHERE user_created_by = $id ");
        return $query->result();


    }

    function get_vendor_licence($id){


        $query = $this->db->query("select user_id,user_created_by,user_vendor_id,ud_fname from user INNER JOIN user_details ON user.user_id = user_details.ud_user_id WHERE user_created_by = '$id'  GROUP BY user.user_id");
        return $query->result();

    }

    function fetch_vendor_data($id=''){

 
         $query=$this->db->query("select * from user AS e INNER JOIN user_details AS u ON e.user_id = u.ud_user_id WHERE e.user_id = '$id'");
        return $query->result();
    }


    function view_vendor(){

        $query=$this->db->query("select * from user AS e INNER JOIN user_details AS u ON e.user_id = u.ud_user_id WHERE e.user_role = '3'");
        return $query->result();
    }


    function suspend_vendor_action($id,$data){

        $this->db->where('user_id',$id);
        $query = $this->db->update('user',$data);
        return $query ;
    }

    function edit_vendor($id, $data){

        $this->db->where('ud_id', $id);
        $this->db->update('user_details', $data);
    }
     function edit_vendoruser($id, $data){

        $this->db->where('user_id', $id);
        $this->db->update('user', $data);
    }

    function delete_by_row($id=''){

        $this->db->where('ud_id', $id);
        return $this->db->delete('user_details');
    }
    function delete_by_rowuser($id=''){

        $this->db->where('user_id', $id);
        return $this->db->delete('user');
    }



}