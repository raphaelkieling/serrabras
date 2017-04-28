<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_locais extends CI_Controller {
    function index(){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_locais');
    	$data_locais = $this->M_locais->pegaLocais();

        $data = array('locais'=>$data_locais);
        $this->load->view('components/header');
        $this->load->view('page/locais/index',$data);
    }
    function cadastro(){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

    	$nome = $this->input->post('nome');
    	$h_i = $this->input->post('horario_inicial');
    	$h_f = $this->input->post('horario_final');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome','Nome do Local','required');

        if(!$this->form_validation->run() ==FALSE){
            $this->load->model('M_locais');
            $data = $this->M_locais->cadastro($nome,$h_i,$h_f);
            
            if($data){
            $this->session->set_flashdata('message-success','Cadastrado com sucesso');
            }else{
                $this->session->set_flashdata('message','Houve algum erro ao cadastrar');
            }
        }
        $this->index();
    }  
    function altera(){
        $id =$this->input->post('idLocal');
        $data_post = array(
            'nome'           =>$this->input->post('nomeLocal'),
            'horario_inicial'=>$this->input->post('iLocal'),
            'horario_final'  =>$this->input->post('fLocal')
        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nomeLocal','Nome','required');

        if(!$this->form_validation->run() ==FALSE){
            $this->load->model('M_locais');
            $data = $this->M_locais->altera($id,$data_post);
            
            if($data){
                $this->session->set_flashdata('message-success','Cadastrado com sucesso');
            }else{
                $this->session->set_flashdata('message','Houve algum erro ao cadastrar');
            }
        }
        $this->index();

    }
    function deleta($id){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        
        $this->load->model('M_locais');
    	$data = $this->M_locais->deleta($id);

         if($data){
           $this->session->set_flashdata('message-success','Excluido com sucesso');
        }else{
            $this->session->set_flashdata('message','Houve algum erro ao excluir');
        }
        $this->index();
    }
}