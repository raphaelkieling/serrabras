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
    function cadastro(){
        $this->load->helper('currency_helper');
        $data_post = array(
            "codUsuario" => $this->input->post('cadastrante'),
            "codLocal"=>$this->input->post('local'),
            "data" =>dataConvert($this->input->post('datepicker'),"mysql"),
            "hora_entrega"=>$this->input->post('hora')
        );
        $this->load->model('M_agendamento');
        $data = $this->M_agendamento->cadastrarAgendamento($data_post);

        if($data){
            $this->session->set_flashdata('message-success','Tudo ocorreu como esperado');
            echo "deu";
        }else{
            $this->session->set_flashdata('message','Algo deu errado...');
            echo "nao deu";
        }
        redirect('/agendamento');
    }
    function buscaHorarioUsado($data){
        $this->load->helper('currency_helper');
        $data_convertida = dataConvert($data,"mysql");

        $this->load->model('M_agendamento');
        $datal = $this->M_agendamento->buscahorario($data_convertida);

        header('Content-type:application/json');
        echo json_encode($datal);
    }
}
?>