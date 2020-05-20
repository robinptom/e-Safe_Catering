 <?php defined('BASEPATH') OR exit('No direct script access allowed');

require 'application/third_party/PHPMailer/Exception.php';
require 'application/third_party/PHPMailer/PHPMailer.php';
require 'application/third_party/PHPMailer/SMTP.php';

class Mailer  {

	
	function load(){

		$mail = new PHPMailer;
		return $mail;
	}
 

}