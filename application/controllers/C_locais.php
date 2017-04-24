<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_locais extends CI_Controller {
    function index(){
        $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->view('components/header');
        $this->load->view('page/locais/index');
    }
    function cadastro(){
        $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

    	$nome = $this->input->post('nome');
    	$h_i = $this->input->post('horario_inicial');
    	$h_f = $this->input->post('horario_final');

    	$this->load->model('M_locais');
    	$data = $this->M_locais->cadastro($nome,$h_i,$h_f);
    	
        if($data){
            echo true;
        }else{
            echo false;
        }
    }
    function pegaLocais(){
        $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_locais');
    	$data = $this->M_locais->pegaLocais();

        header('Content-type:application/json');
        echo json_encode($data);
    }
    
    function deleta($id){
        $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        
        $this->load->model('M_locais');
    	$data = $this->M_locais->deleta($id);

        if($data){
            echo true;
        }else{
            echo false;
        }
    }
}