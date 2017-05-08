<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_usuarios extends CI_Controller {
    function index(){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        $this->load->model('M_usuarios');
        $usuario = $this->M_usuarios->pegaUsuarios();

        $this->load->model('M_usuarios');
        $quantidadeUsuarios = $this->M_usuarios->nmrUsuarios();

        $data = array('usuario'=>$usuario,'nmrUsuario'=>$quantidadeUsuarios);

        $this->load->view('components/header');
        $this->load->view('page/usuarios/index',$data);
    }
    // function pegaUsuarios(){
    //     $user = $this->session->userdata('user');
    //     if(!$user || !$user['permissao']>=1){
    //         $this->session->set_flashdata('message','Você não tem permissão');
    //         redirect('/');
    //     }

    //     $this->load->model('M_usuarios');
    //     $data = $this->M_usuarios->pegaUsuarios();

    //     header('Content-type:application/json');
    //     echo json_encode($data);
    // }
    function editarUsuario($idUsuario){
         $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_usuarios');
        $data_usuario = $this->M_usuarios->pegaUsuarioId($idUsuario);

        $data = array('usuario'=>$data_usuario[0],'user'=>$user);
        $this->load->view('components/header');
        $this->load->view('page/usuarios/modificar',$data);
    }

    function alterar($idUsuario){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        $this->load->model('M_usuarios');
        //Pegas as variaveis de cadastro
        $nome = $this->input->post('nomeUsuario');
        $empresa = $this->input->post('empresa');
        $endereco = $this->input->post('endereco');
        $cidadeEstado = $this->input->post('cidadeEstado');
        $telefone = $this->input->post('telefone');

        $email = $this->input->post('email');
        $senha = $this->input->post('password');
        $senhaa = $this->input->post('passwordd');
        $permissao = $this->input->post('tipoUsuario');

        //trata as variaves de cadastro
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nomeUsuario',"Nome",'required');
        $this->form_validation->set_rules('empresa',"Empresa",'required');
        $this->form_validation->set_rules('endereco',"Endereço",'required');
        $this->form_validation->set_rules('cidadeEstado',"Cidade ou Estado",'required');
        $this->form_validation->set_rules('telefone',"Telefone",'required');

        $this->form_validation->set_rules('email',"Email",'required');

        //verifica se a senha foi digitada
        if(strlen($senha)>0){
            $this->form_validation->set_rules('password',"Senha",'required');
            $this->form_validation->set_rules('passwordd',"Repetir Senha",'required|matches[password]');
        }

        //verifica se foi colocada alguma imagem no input
        if (!empty($_FILES['image']['name'])) {
            if($this->form_validation->run() == FALSE){
                $this->editarUsuario($idUsuario);
            }else{
                // Trata a imagem
                $config['upload_path']          = 'assets/img/user_photo';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 500;
                $config['max_width']            = 1250;
                $config['max_height']           = 720;
                $config['encrypt_name']         = TRUE;
                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload('image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message',$error['error']);
                    $this->editarUsuario($idUsuario);
                }
                else
                {
                    $data_img = array('upload_data' => $this->upload->data());
                    $imagem = $data_img['upload_data']['file_name'];
                    
                    //coloca tudo em uma variavel
                    if(strlen($senha)>0){
                        $usuario_info = array(
                            'email' => $email,
                            'senha' => md5($senha),
                            'permissao' => $permissao,
                            'nome' => $nome,
                            'empresa' => $empresa,
                            'endereco' => $endereco,
                            'cidadeEstado' => $cidadeEstado,
                            'telefone' => $telefone,
                            'foto_perfil' => $imagem
                        );
                    }else{
                        $usuario_info = array(
                            'email' => $email,
                            'permissao' => $permissao,
                            'nome' => $nome,
                            'empresa' => $empresa,
                            'endereco' => $endereco,
                            'cidadeEstado' => $cidadeEstado,
                            'telefone' => $telefone,
                            'foto_perfil' => $imagem
                        );
                    }
                    //cadastra email senha e imagem em um usuario
                    $resultado_cadastro = $this->M_usuarios->modificar($idUsuario,$usuario_info);
                    if($resultado_cadastro){
                        $this->session->set_flashdata('message-success','Alteração realizada com sucesso!');
                    }else{
                        $this->session->set_flashdata('message','Algo deu errado na hora da alteração...');
                    }          
                    $this->index();
                }
            }
        }else{
            //coloca tudo em uma variavel
            if(strlen($senha)>0){
                $usuario_info = array(
                    'email' => $email,
                    'senha' => md5($senha),
                    'permissao' => $permissao,
                    'nome' => $nome,
                    'empresa' => $empresa,
                    'endereco' => $endereco,
                    'cidadeEstado' => $cidadeEstado,
                    'telefone' => $telefone,
                );
            }else{
                $usuario_info = array(
                    'email' => $email,
                    'permissao' => $permissao,
                    'nome' => $nome,
                    'empresa' => $empresa,
                    'endereco' => $endereco,
                    'cidadeEstado' => $cidadeEstado,
                    'telefone' => $telefone,
                );
            }

            $resultado_cadastro = $this->M_usuarios->modificar($idUsuario,$usuario_info);
            if($resultado_cadastro){
                $this->session->set_flashdata('message-success','Alteração realizada com sucesso!');
            }else{
                $this->session->set_flashdata('message','Algo deu errado na hora da alteração...');
            }          
            $this->index();
        }
        
}
    function perfil($id){
        $user = $this->session->userdata('user');
        if(!$user){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_usuarios');
        $usuario = $this->M_usuarios->pegaUsuarioId($id);

        $this->load->model('M_agendados');
        $pedido = $this->M_agendados-> agendadosPor($id);

        $this->load->helper('currency_helper');

        $data = array('usuario' => $usuario,'pedido'=>$pedido,'user'=>$user);
        
        $this->load->view('components/header');
        $this->load->view('page/usuarios/perfil',$data);
    }

    function deleta($id){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        
        $this->load->model('M_usuarios');
        $data = $this->M_usuarios->apagar($id);

        redirect('/usuarios');
    }
}
?>