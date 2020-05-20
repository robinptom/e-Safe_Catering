<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_model extends CI_Model
{      
    function sc1_data_insert($data){

        $query =$this->db->insert('sc1_food_delivery', $data);
        return  $query;
    }

    function sc2_data_insert($data){

         $query = $this->db->insert('sc2_refrigeration', $data);
         return  $query;

    }
    function sc3_data_insert($data){

         $query = $this->db->insert('sc3_reheating', $data);
         return  $query;
    }
    
    function sc4_data_insert($data){

         $query = $this->db->insert('sc4_display_records', $data);
         return  $query;
    }

     function sup_add($data){

         $query = $this->db->insert('supplier', $data);
         return  $query;
    }

    function fetch_sup_detail($userid=''){
       /*  $userid = $this->session->userdata('user_id');
         $query=$this->db->query("select user_created_by from user where user_id='$userid'");
         $auditor = $query->result();
         $auditor = $auditor[0]->user_created_by;
         $query= $this->db->query("select * from supplier WHERE sup_user_id in ('$userid','$auditor')");
         $results = $query->result();
        return  $results;*/
        $query= $this->db->query("select * from supplier WHERE sup_user_id='$userid'");
         $results = $query->result();
        return  $results;
    }

     function fetch_sup_detailvendor($userid=''){
         $userid = $this->session->userdata('user_id');
        $query= $this->db->query("select * from supplier WHERE sup_user_id ='$userid'");
         $results = $query->result();
        return  $results;
    }

    function supplier_join(){

        $query=$this->db->query("select user_id from user where user_role='1' ");
        return $query->result();
    }

    function fetch_supplier_data($id){

        $this->db->where('sup_id', $id);
        return $this->db->get('supplier');
    }

    function delete_sup($id){

        $this->db->where('sup_id', $id);
        return $this->db->delete('supplier');
    }

    function edit_supplier($id, $data){

        $this->db->where('sup_id', $id);
        $this->db->update('supplier', $data);
    }   

    function get_sc1_report($user_id='',$from_date='',$to_date=''){


         $query = $this->db->query("
                     select 
                        *
                     from
                        sc1_food_delivery
                     INNER JOIN user ON sc1_food_delivery.sc1_user_id = user.user_id
                     INNER JOIN user_details ON sc1_food_delivery.sc1_user_id = user_details.ud_user_id INNER JOIN role ON user.user_role = role.role_id  WHERE date(sc1_food_delivery.sc1_date)>= '$from_date' AND date(sc1_food_delivery.sc1_date)<='$to_date' and sc1_food_delivery.sc1_user_id='$user_id' " );
        return $query->result();

    }

    function get_sc2_report($user_id='',$from_date='',$to_date=''){

$query = $this->db->query("
                     select 
                        *
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id INNER JOIN role ON user.user_role = role.role_id  WHERE date(sc2_refrigeration.sc2_date)>=  '$from_date' AND date(sc2_refrigeration.sc2_date) <='$to_date' and sc2_refrigeration.sc2_user_id='$user_id'");
        return $query->result();
    }

    function get_sc3_report($user_id='',$from_date='',$to_date=''){

$query = $this->db->query("
                     select 
                        *
                     from
                        sc3_reheating
                     INNER JOIN user ON sc3_reheating.sc3_user_id = user.user_id
                     INNER JOIN user_details ON sc3_reheating.sc3_user_id = user_details.ud_user_id INNER JOIN role ON user.user_role = role.role_id  WHERE date(sc3_reheating.sc3_date)>= '$from_date' AND date(sc3_reheating.sc3_date)<='$to_date' and sc3_reheating.sc3_user_id='$user_id'");
        return $query->result();

    }

    function get_sc4_report($user_id='',$from_date='',$to_date=''){
 $query = $this->db->query("
                     select 
                        *
                     from
                        sc4_display_records
                     INNER JOIN user ON sc4_display_records.sc4_user_id = user.user_id
                     INNER JOIN user_details ON sc4_display_records.sc4_user_id = user_details.ud_user_id INNER JOIN role ON user.user_role = role.role_id  WHERE date(sc4_display_records.sc4_date)>=  '$from_date' AND date(sc4_display_records.sc4_date)<= '$to_date' and sc4_display_records.sc4_user_id='$user_id'");
        return $query->result();

    }

    function get_sc2_unit($user_id='',$from_date,$to_date){


$query = $this->db->query("
                     select 
                      sc2_unit ,  date(sc2_date) as date
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id WHERE   date(sc2_refrigeration.sc2_date)>= '$from_date' AND date(sc2_refrigeration.sc2_date)<='$to_date' and sc2_refrigeration.sc2_user_id='$user_id' GROUP BY sc2_unit

");
        return $query->result();

}

function get_temperature_value($user_id='',$date='',$sc2_unit=''){


    $query = $this->db->query("
                     select 
                      sc2_temperature, DATE_FORMAT(sc2_date, '%r') as time , date(sc2_date) as date_value, sc2_id, sc2_user_id, sc2_unit,sc2_comments_action
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id WHERE date(sc2_date) = '$date' and sc2_unit='$sc2_unit' and sc2_refrigeration.sc2_user_id='$user_id'");
        return $query->result();




}
function get_sc2_report_print($user_id='',$from_date,$to_date){

$query = $this->db->query("
                     select 
                      date(sc2_date) as date
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id WHERE date(sc2_refrigeration.sc2_date)>=  '$from_date' AND date(sc2_refrigeration.sc2_date)<='$to_date' and sc2_refrigeration.sc2_user_id = '$user_id' GROUP BY date

");


$query = $this->db->query("
                     select 
                         date(sc2_date) as date, sc2_temperature 
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id INNER JOIN role ON user.user_role = role.role_id  WHERE date(sc2_refrigeration.sc2_date)>=  '$from_date' AND date(sc2_refrigeration.sc2_date)<='$to_date' and sc2_refrigeration.sc2_user_id = '$user_id' GROUP BY date ");
        return $query->result();
        return $query->result();
    }


}