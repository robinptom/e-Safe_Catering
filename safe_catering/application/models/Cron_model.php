<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_model extends CI_Model
{      
   
        function sc1check($date){
         $query = $this->db->query("select GROUP_CONCAT(sc1_user_id) as user_id from sc1_food_delivery  where date(sc1_date) =$date");
        return $query->result();

    }
     function s2check($date){
        $query = $this->db->query("select GROUP_CONCAT(sc2_user_id) as user_id from sc2_refrigeration where date(sc2_date) =$date ");
        return $query->result();

    }
     function sc3check($date){
         $query = $this->db->query("select GROUP_CONCAT(sc3_user_id) as user_id from sc3_reheating where date(sc3_date) =$date ");
        return $query->result();

    }
     function sc4check($date){
         $query = $this->db->query("select GROUP_CONCAT(sc4_user_id) as user_id from sc4_display_records where date(sc4_date) =$date ");
        return $query->result();

    }
    function user_check($userids){
        if (count($userids)) {
         $userids= implode(',',$userids);
        $query = $this->db->query("select user_id from user where user_id not in ('".$userids."') and user_role ='3' ");
        return $query->result();
        }else{
            return false;
        }
        

    }

    function getsc2unit($id='',$from_date='',$to_date=''){
    $query = $this->db->query("select sc2_unit ,  date(sc2_date) as date from sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id WHERE user.user_id = '$id' AND  date(sc2_refrigeration.sc2_date) >= '$from_date' AND date(sc2_refrigeration.sc2_date) <= '$to_date' GROUP BY sc2_unit");
        return $query->result();

}
function getsc2report_print($id,$from_date,$to_date){

$query = $this->db->query("
                     select 
                      date(sc2_date) as date
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id WHERE user.user_id = '$id' AND  date(sc2_refrigeration.sc2_date)>= '$from_date' AND date(sc2_refrigeration.sc2_date) <='$to_date' GROUP BY date");
        return $query->result();
    }

    function gettemperaturevalue($id,$date='',$sc2_unit=''){

    $query = $this->db->query("
                     select 
                      sc2_temperature, DATE_FORMAT(sc2_date, '%r') as time , date(sc2_date) as date_value, sc2_id, sc2_user_id, sc2_unit,sc2_comments_action
                     from
                        sc2_refrigeration
                     INNER JOIN user ON sc2_refrigeration.sc2_user_id = user.user_id
                     INNER JOIN user_details ON sc2_refrigeration.sc2_user_id = user_details.ud_user_id WHERE user.user_id = '$id' AND date(sc2_date) = '$date' and sc2_unit='$sc2_unit' ");
        return $query->result();




}

    function insert_alert($data){

        $query = $this->db->insert('alert', $data);
         return  $query;

    }
     
     
    
         


}