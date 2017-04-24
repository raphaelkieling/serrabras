<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_agendados extends CI_Controller {
    function index(){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        
        $this->load->view('components/header');
        $this->load->view('page/agendado/index');
    }
}
?>