<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_agendados extends CI_Controller {
    function index(){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        $this->load->helper('currency_helper');

        $this->load->model('M_agendados');
        $pedidos = $this->M_agendados->pegaTodosOsPedidos();
        $data = array('pedidos'=>$pedidos,'user'=>$user);


        $this->load->view('components/header');
        $this->load->view('page/agendado/index',$data);
    }
    function pedidoInfo($idAgenda){
        $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        $this->load->helper('currency_helper');

        $this->load->model('M_agendados');
        $pedidos = $this->M_agendados->pegaPedidoPorAgendamento($idAgenda);
        $data = array('pedidos'=>$pedidos,'user'=>$user);

        $this->load->view('components/header');
        $this->load->view('page/agendado/pedido_info',$data);
    }
    function fornecedorPedidos($idUsuario){
        $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_agendados');
        $data_limit = $this->M_agendados->fornecedorPedidos($idUsuario);

        $data = array('agendamentos'=>$data_limit,'user'=>$user);
        $this->load->helper('currency_helper');
        
        $this->load->view('components/header');
        $this->load->view('page/agendado/index_fornecedor',$data);
    }
    function entregue($id){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_agendados');
        $dado = $this->M_agendados->entregue($id);
        
        $url = $_SERVER['HTTP_REFERER'];
        redirect($url);
    }
    function cancela($id){
        $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_agendados');
        $dado = $this->M_agendados->cancela($id);

        $url = $_SERVER['HTTP_REFERER'];
        redirect($url);
    }
}
?>