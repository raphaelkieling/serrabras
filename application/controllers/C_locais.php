<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_locais extends CI_Controller {
    function index(){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->helper('currency_helper');
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

        $dias = $this->diasSemana();
    	$local = array(
            "nome"              => $this->input->post('nome'),
            "horario_inicial"   => $this->input->post('horario_inicial').":".$this->input->post('horario_inicial_minutos').":00",
            "limite"            => $this->input->post('limitador'),
            "dias"              => $dias
        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome','Nome do Local','required');
        $this->form_validation->set_rules('limitador','Limite','required|integer');

        if(!$this->form_validation->run() ==FALSE){
            $this->load->model('M_locais');
            $data = $this->M_locais->cadastro($local);
            
            if($data){
                $this->session->set_flashdata('message-success','Cadastrado com sucesso');
            }else{
                $this->session->set_flashdata('message','Houve algum erro ao cadastrar');
            }
        }

        $this->index();
    }  
    function altera(){
        $id =$this->input->post('id_local_modal');

        $dias = $this->diasSemana();

    	$local = array(
            "nome"              => $this->input->post('nome_modal'),
            "horario_inicial"   => $this->input->post('horario_inicial_modal').":".$this->input->post('horario_inicial_minutos_modal').":00",
            "limite"            => $this->input->post('limitador_modal'),
            "dias"              => $dias
        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome_modal','Nome','required');
        $this->form_validation->set_rules('limitador_modal','Limite','required|integer');

        if(!$this->form_validation->run() ==FALSE){
            $this->load->model('M_locais');
            $data = $this->M_locais->altera($id,$local);
            
            if($data){
                $this->session->set_flashdata('message-success','Alterado com sucesso');
            }else{
                $this->session->set_flashdata('message','Houve algum erro ao alterar');
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

    public function diasSemana(){
        $segunda = $this->input->post('segunda');
        $terca = $this->input->post('terca');
        $quarta = $this->input->post('quarta');
        $quinta = $this->input->post('quinta');
        $sexta = $this->input->post('sexta');
        $sabado = $this->input->post('sabado');
        $domingo = $this->input->post('domingo');

        $dias = "";
        
        if(isset($domingo)){$dias = $dias.",0";}
        if(isset($segunda)){$dias = $dias.",1";}
        if(isset($terca)){$dias = $dias.",2";}
        if(isset($quarta)){$dias = $dias.",3";}
        if(isset($quinta)){$dias = $dias.",4";}
        if(isset($sexta)){$dias = $dias.",5";}
        if(isset($sabado)){$dias = $dias.",6";}       

        return $dias;
    }
}