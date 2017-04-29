<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_notificacao extends CI_Controller {
    function index(){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        
        $this->load->model('M_notificacao');
        $data_not = $this->M_notificacao->pegaNotificacao();

        $this->load->helper('currency_helper');
        $data = array('notificacao' => $data_not);

        $this->load->view('components/header');
        $this->load->view('page/notificacao/index',$data);
    }
    function cadastrar(){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

    	$this->load->helper('currency_helper');

    	$data_post = array(
    		'titulo'=>$this->input->post('titulo'),
    		'descricao'=>$this->input->post('descricao'),
    		'destino'=>$this->input->post('destino'),
    		'importancia'=>$this->input->post('importancia'),
    		'data_inicial'=>dataConvert($this->input->post('data_inicial'),'mysql'),
    		'data_final'=>dataConvert($this->input->post('data_final'),'mysql'),	
    	);

    	$this->load->model('M_notificacao');
    	$data = $this->M_notificacao->cadastrar($data_post);
    	if($data){
            $this->session->set_flashdata('message-success','Cadastro realizado com sucesso!');
        }else{
            $this->session->set_flashdata('message','Algo deu errado na hora do cadastro...');
        }         
        $this->index();
    }
    function cancela($id){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_notificacao');
        $data = $this->M_notificacao->cancela($id);
        
        if($data){
            $this->session->set_flashdata('message-success','Notificação cancelada com sucesso!');
        }else{
            $this->session->set_flashdata('message','Algo deu errado na hora do cancelamento...');
        }         
        $this->index();
    }
}