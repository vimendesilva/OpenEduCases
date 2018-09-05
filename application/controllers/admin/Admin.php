<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/casos_model');
        $this->load->model('usuario_model');
    }

    public function validar_sessao() {
        if (!$this->session->userdata('LOGADO')) {
            redirect('inicio');
        }
        return true;
    }
    
//    public function index($n) {
//        $this->validar_sessao();
//        $dados['todos'] = $this->casos_model->get_casos($n);
//        $dados['qtd'] = $this->casos_model->qtd_casos();
//        $dados['atual'] = $n;
//        
//        $this->load->view('admin/includes/topo');
//        $this->load->view('admin/includes/menu');
//        $this->load->view('admin/dashboard', $dados);
//        $this->load->view('admin/includes/rodape');
//    }
    
    public function dash($n) {
        $this->validar_sessao();
        $dados['todos'] = $this->casos_model->get_casos($n);
        $dados['qtd'] = $this->casos_model->qtd_casos();
        $dados['atual'] = $n;
        
        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/dashboard', $dados);
        $this->load->view('admin/includes/rodape');
    }
    
    public function meus_casos() {
        $this->validar_sessao();
        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/meus_casos');
        $this->load->view('admin/includes/rodape');
    }
    
    public function perfil($id) {
        $this->validar_sessao();
        $dados['usu'] = $this->usuario_model->get_usuario($id);
        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/perfil',$dados);
        $this->load->view('admin/includes/rodape');
    }
    
    public function repositorio($n) {
        $this->validar_sessao();
        $dados['todos'] = $this->casos_model->get_casos($n);
        $dados['qtd'] = $this->casos_model->qtd_casos();
        $dados['areas'] = $this->casos_model->get_areas();
        $dados['atual'] = $n;
        $dados['busca'] = '';
         
        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/repositorio', $dados);
        $this->load->view('admin/includes/rodape');
    }
    
    
    
    
}
