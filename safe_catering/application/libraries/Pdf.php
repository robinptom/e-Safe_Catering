<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) .'/tcpdf/tcpdf.php';
//use Dompdf\Dompdf;

class Pdf extends TCPDF
{
    public function __construct()
    {
        parent::__construct();
        $pdf = new TCPDF();
       
    }
}
