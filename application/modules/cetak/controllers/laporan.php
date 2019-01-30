<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Laporan extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library('pdf_laporan');
  }

  /**
     * This function is used to load page view
     * @return Void
     */
  public function index(){   
    $this->load->view("laporan");
  }
}
?>