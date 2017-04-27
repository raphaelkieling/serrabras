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
        $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        
        $this->load->helper('currency_helper');

        $data_post = array(
            "codUsuario"   => $this->input->post('cadastrante'),
            "codLocal"     =>$this->input->post('local'),
            "data"         =>dataConvert($this->input->post('datepicker'),"mysql"),
            "hora_entrega" =>$this->input->post('hora')
        );
        $this->load->model('M_agendamento');
        $data_idAgendamento = $this->M_agendamento->cadastrarAgendamento($data_post);
        $data_post_pedido = array(
            'codAgendamento'=> $data_idAgendamento,
            'nmr_pacotes'   => $this->input->post('nmr_pacotes[]'),
            'medida'        =>$this->input->post('medida[]'),
            'peca'          =>$this->input->post('pecas[]'),
        );
        $pacotes = $data_post_pedido['nmr_pacotes'];
        $medida  = $data_post_pedido['medida'];
        $peca    = $data_post_pedido['peca'];

        for($index = 0;$index < count($data_post_pedido['nmr_pacotes']);$index++){
            $data = $this->M_agendamento->cadastrarPedido($data_idAgendamento,$pacotes[$index],$medida[$index],$peca[$index]);
        }
    
        if($data){
            $this->session->set_flashdata('message-success','Tudo ocorreu como esperado');
        }else{
            $this->session->set_flashdata('message','Algo deu errado...');
        }
        redirect('/agendamento');
    }
    function buscaHorarioUsado($data,$local){
        $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->helper('currency_helper');
        $data_convertida = dataConvert($data,"mysql");

        $this->load->model('M_agendamento');
        $datal = $this->M_agendamento->buscahorario($data_convertida,$local);

        header('Content-type:application/json');
        echo json_encode($datal);
    }
    function buscaMedidas(){
        $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_medidas');
        $medidas = $this->M_medidas->pegaMedidas();

        header('Content-type:application/json');
        echo json_encode($medidas);
    }
}
?>