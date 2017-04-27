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
        $data = array('pedidos'=>$pedidos);


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
        $data = array('pedidos'=>$pedidos);

        $this->load->view('components/header');
        $this->load->view('page/agendado/pedido_info',$data);
    }
    function entregue($id,$idUsuario){
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
    function  cancela($id,$idUsuario){
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