<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_gerenciadordedias extends CI_Controller {
    function index(){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        $this->load->helper('currency_helper');
        $this->load->model('M_locais');
        $this->load->model('M_gerenciadordedias');

        $dias = $this->M_gerenciadordedias->pegaDias();
        $locais = $this->M_locais->pegaLocais();

        $data = array('locais'=>$locais,'user'=>$user,'dias'=>$dias);
        $this->load->view('components/header');
        $this->load->view('page/locais/gerenciadordedias',$data);
    }

    function cadastro(){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        
        $this->load->helper('currency_helper');
        
        $dias = array(
            'codLocal'  =>$this->input->post('lugar'),
            'motivo' =>$this->input->post('motivo'),
            'data' =>dataConvert($this->input->post('datepicker'),"mysql"),
            'tipo' =>$this->input->post('tipo'),
        );

        $this->load->model('M_gerenciadordedias');
        $data = $this->M_gerenciadordedias->cadastrar($dias);

        if($data){
            $this->session->set_flashdata('message-success','Cadastrado com sucesso');
        }else{
            $this->session->set_flashdata('message','Houve algum erro ao cadastrar');
        }
        $this->index();
    }
    function deleta($id){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_gerenciadordedias');
        $data = $this->M_gerenciadordedias->deletar($id);

        if($data){
            $this->session->set_flashdata('message-success','Deletado com sucesso');
        }else{
            $this->session->set_flashdata('message','Houve algum erro ao deletar');
        }
        $this->index();
    }
}

?>