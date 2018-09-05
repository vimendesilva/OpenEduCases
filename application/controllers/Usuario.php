<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
        $this->load->helper('security');
    }

    public function index() {

        //$this->load->view('admin/dashboard');
        $this->load->view('cadastro');
    }

    ////////////////////////////////////////////////////
    ////////////////// SISTEMA LOGIN ///////////////////
    ////////////////////////////////////////////////////

    public function logar() {

        $email = $this->input->post('email');
        $senha = do_hash($this->input->post('senha'), 'MD5');
        $usuario = $this->usuario_model->logar($email, $senha);

        if (count($usuario) === 1) {
            $dados['id'] = $usuario[0]->id_usu;
            $dados['nome'] = $usuario[0]->nome_usu;
            $dados['LOGADO'] = TRUE;

            $this->session->set_userdata($dados);
            redirect("admin/admin/dash/0");
        } else {
            $mensagem = array('msg' => 'login', 'tipo' => 'danger');
            $this->session->set_flashdata('msg', $mensagem);
            redirect("inicio");
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("inicio");
    }

    ////////////////////////////////////////////////////////
    ////////////////// SISTEMA DE CADASTRO /////////////////
    ////////////////////////////////////////////////////////
    public function cadastro() {

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $senha = do_hash($this->input->post('senha'), 'MD5');
        $senha1 = do_hash($this->input->post('senha1'), 'MD5');

        if ($senha == $senha1) {
            $resultado = $this->usuario_model->cadastrar($nome, $email, $senha);


            if ($resultado == 1) {
                $arquivo = "<b>Cadastro no Repositório de Casos</b><br>
                Link para confirmação de sua conta: <a href=\"" . base_url() . "usuario/confirmacao/" . $email . "\">Confirmar cadastro</a><br>
                Caso você não tenha solicitado o cadastro apenas ignore este e-mail!";
                $destino = $email;
                $assunto = "Confirmação de cadastro no Repositório de Casos";
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: Labsoft <labsoft@muz.ifsuldeminas.edu.br>';
                $enviaremail = mail($destino, $assunto, $arquivo, $headers);
                if ($enviaremail) {
                    $mensagem = array('msg' => 'confirm-ok', 'tipo' => 'success');
                    $this->session->set_flashdata('msg', $mensagem);
                    redirect("inicio");
                } else {

                    $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
                    $this->session->set_flashdata('msg', $mensagem);
                    redirect("usuario");
                }
            } else {
                $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
                $this->session->set_flashdata('msg', $mensagem);
                redirect("usuario");
            }
        } else {
            $mensagem = array('msg' => 'senha-dif', 'tipo' => 'danger');
            $this->session->set_flashdata('msg', $mensagem);
            redirect("usuario");
        }
    }

    public function confirmacao($usu_login = null) {

        $resultado = $this->usuario_model->confirma_cadastro($usu_login);

        if ($resultado) {
            $mensagem = array('msg' => 'cad-confirm', 'tipo' => 'success');
            $this->session->set_flashdata('msg', $mensagem);
            redirect("inicio");
        } else {
            $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
            $this->session->set_flashdata('msg', $mensagem);
            redirect("inicio");
        }
    }

    public function atualizar($id) {

        $data['nome_usu'] = $this->input->post('nome');
        $data['email_usu'] = $this->input->post('email');
        $data['senha_usu'] = do_hash($this->input->post('senha'), 'MD5');

        $resultado = $this->usuario_model->update('usuarios', $data, $id);

        if ($resultado == 1) {
            $mensagem = array('msg' => 'sucesso', 'tipo' => 'success');
            $this->session->set_flashdata('msg', $mensagem);
            redirect("admin/admin/perfil/" . $id);
        } else {
            $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
            $this->session->set_flashdata('msg', $mensagem);
            redirect("admin/admin/perfil/" . $id);
        }
    }

    ////////////////////////////////////////////////////////
    //////////////// SISTEMA DE RECUPERAÇAO ////////////////
    ////////////////////////////////////////////////////////
    public function esqueci_senha() {
        $this->load->view('esqueci');
    }

    public function esqueceu() {
        $email = $this->input->post('email');
        $user = $this->usuario_model->ver_user_login($email);

        if ($user == 1) {
            $arquivo = "<b>Recuperar senha - Aprendizagem baseada em Casos</b><br>
                Link para recuperação de senha: <a href=\"" . base_url() . "usuario/nova_senha/" . $email . "\">Recuperar senha</a><br>
                Caso você não tenha solicitado a recuperação de senha, apenas ignore este e-mail!";
            $destino = $user->email_usu;
            $assunto = "Recuperar senha - Aprendizagem baseada em Casos";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: Labsoft <labsoft@muz.ifsuldeminas.edu.br>';
            $enviaremail = mail($destino, $assunto, $arquivo, $headers);
            if ($enviaremail) {
                $mensagem = array('msg' => 'rec-senha', 'tipo' => 'success');
                $this->session->set_flashdata('msg', $mensagem);
                redirect("usuario/esqueci_senha");
            } else {
                $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
                $this->session->set_flashdata('msg', $mensagem);
                redirect("usuario/esqueci_senha");
            }
        }
    }

    public function nova_senha($email) {
        $dado['email'] = $email;
        $this->load->view('nova_senha', $dado);
    }

    public function recuperar() {

        $senha1 = do_hash($this->input->post('senha'), 'MD5');
        $senha2 = do_hash($this->input->post('conf_senha'), 'MD5');
        $email = $this->input->post('email');

        if ($senha1 == $senha2) {
            $resultado = $this->usuario_model->recupera_senha($email, $senha1);

            if ($resultado) {
                $mensagem = array('msg' => 'senha-alt', 'tipo' => 'success');
                $this->session->set_flashdata('msg', $mensagem);
                redirect("inicio");
            } else {
                $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
                $this->session->set_flashdata('msg', $mensagem);
                redirect("inicio");
            }
        } else {
            $mensagem = array('msg' => 'senha-dif', 'tipo' => 'danger');
            $this->session->set_flashdata('msg', $mensagem);
            redirect("usuario/nova_senha/" . $email);
        }
    }

}
