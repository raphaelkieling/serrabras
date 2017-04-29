<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_medidas extends CI_Controller {
    function index(){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_medidas');
        $data_medida = $this->M_medidas->pegaMedidas();

        $data = array('medida'=>$data_medida);

        $this->load->view('components/header');
        $this->load->view('page/medidas/index',$data);
    }
    function cadastra(){
        $data_post = array(
            'qualidade'=>$this->input->post('qualidade'),
            'espessura'=>$this->input->post('espessura'),
            'largura'=>$this->input->post('largura'),
            'comprimento'=>$this->input->post('comprimento'),
        );

        $this->load->model('M_medidas');
        $data = $this->M_medidas->cadastra($data_post);

        if($data){
            $this->session->set_flashdata('message-success','Cadastro realizado com sucesso!');
        }else{
            $this->session->set_flashdata('message','Algo deu errado na hora do cadastro...');
        } 
        redirect('medidas');
    }
    function apagar($id){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_medidas');
        $this->M_medidas->apagar($id);
    }
}
?>