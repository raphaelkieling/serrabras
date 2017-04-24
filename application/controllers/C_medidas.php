<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_medidas extends CI_Controller {
    function index(){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->view('components/header');
        $this->load->view('page/medidas/index');
    }
    function apagar($id){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_medidas');
        $this->M_medidas->apagar($id);
    }
}
?>