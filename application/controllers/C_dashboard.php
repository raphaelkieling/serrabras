<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
    function index(){
        $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        
        $this->load->view('components/header');
        $this->load->view('page/dashboard/index');
    }
}
?>