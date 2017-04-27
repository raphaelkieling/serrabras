<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
    function index()
    {
        $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_agendados');
        $data_limit = $this->M_agendados->pegaLimit(5);

        $data = array('agendamentos'=>$data_limit);
        $this->load->helper('currency_helper');
        
        $this->load->view('components/header');
        $this->load->view('page/dashboard/index',$data);
    }

    // function analises()
    // {
    //     $this->load->model('M_dashboard');
    //     $analitycs = array(
    //         'data_na'=>$this->M_dashboard->numeroAgendamentos(),
    //         'data_us'=>$this->M_dashboard->numeroUsuarios(),
    //         'data_hr'=>$this->M_dashboard->horarios(),
    //     );

    //     header('Content-type:application/json');
    //     echo json_encode($analitycs);

    // }

}
?>