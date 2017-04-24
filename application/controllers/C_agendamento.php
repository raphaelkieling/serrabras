<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_agendamento extends CI_Controller {
    function index(){
        $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_locais');
        $locais_data = $this->M_locais->pegaLocais();

        $data = array('locais' => $locais_data);
        
        $this->load->view('components/header');
        $this->load->view('page/agendamento/index',$data);
    }
}
?>