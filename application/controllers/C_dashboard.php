<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
    function index()
    {
        $this->load->view('components/header');
        $this->load->view('page/dashboard/index');
    }

    function analises()
    {
        $this->load->model('M_dashboard');
        $analitycs = array(
            'data_na'=>$this->M_dashboard->numeroAgendamentos(),
            'data_us'=>$this->M_dashboard->numeroUsuarios(),
            'data_hr'=>$this->M_dashboard->horarios(),
        );

        header('Content-type:application/json');
        echo json_encode($analitycs);

    }

}
?>