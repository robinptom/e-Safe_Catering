<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model
{      
   
        function checkvendorliscenece($liscenece=''){

         $query = $this->db->query("select user_id from user where user_vendor_id ='$liscenece' and user_role='3'");
         if ($query->num_rows()>0) {
            return $query->num_rows();
         }else{
            return '0';
         }

    }

     function checkemail($email=''){

         $query = $this->db->query("select user_id from user where user_name ='$email'");
         if ($query->num_rows()>0) {
            return $query->num_rows();
         }else{
            return '0';
         }

    }
  
     
     
    
         


}