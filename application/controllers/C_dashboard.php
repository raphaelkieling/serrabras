<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
    function index(){
        $this->load->view('components/header');
        $this->load->view('page/dashboard/index');
    }
}
?>