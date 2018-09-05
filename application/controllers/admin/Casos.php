<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Casos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/casos_model');
    }

    public function validar_sessao() {
        if (!$this->session->userdata('LOGADO')) {
            redirect('inicio');
        }
        return true;
    }

    public function index($pag) {
        $this->validar_sessao();
        $dados['pag'] = $pag;
        $dados['areas'] = $this->casos_model->get_areas();

        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/novo_caso', $dados);
        $this->load->view('admin/includes/rodape');
    }

    public function novo_caso($id) {
        $this->validar_sessao();
        $data['nome_caso'] = $this->input->post('nome');
        $data['estoria_caso'] = $this->input->post('estoria');
        $data['origem_caso'] = $this->input->post('origem');
        $data['palavra_chave_caso'] = $this->input->post('chave');

        $data['id_usu'] = $id;

        $result = $this->casos_model->insert('casos', $data);
        $c = $result[0]->id;
        $dados['casos_id_caso'] = $c;
        $dados['id_sub'] = $this->input->post('subarea');
        $dados['id_area'] = $this->input->post('area');
        if (is_numeric($dados['id_sub']) && is_numeric($dados['id_area'])) {
            $r = $this->casos_model->casos_area('casos_has_area', $dados);
        }

//        var_dump ($result);

        if ($result) {
            $mensagem = array('msg' => 'insert-caso-ok', 'tipo' => 'success');
            $this->session->set_flashdata('msg', $mensagem);
        } else {
            $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
            $this->session->set_flashdata('msg', $mensagem);
        }
        redirect('admin/casos/casos_usuario/' . $this->session->userdata('id') . '/0' . '/' . $c);
    }

    public function buscar_caso() {
        $this->validar_sessao();
        $busca = $this->input->post('busca');
        if ($busca) {
            $result['busca'] = $busca;
            $result['todos'] = $this->casos_model->buscar_caso($busca);
            $result['qtd'] = $this->casos_model->qtd_casos();
            $result['atual'] = 0;
            $result['areas'] = $this->casos_model->get_areas();

            $this->load->view('admin/includes/topo');
            $this->load->view('admin/includes/menu');
            $this->load->view('admin/repositorio', $result);
            $this->load->view('admin/includes/rodape');
        } else {
            redirect('admin/admin/repositorio/0');
        }
    }

    public function buscar_caso_area() {
        $this->validar_sessao();
        $busca = $this->input->post('area');
        if ($busca) {
            $result['busca'] = '';
            $result['todos'] = $this->casos_model->buscar_caso_area($busca);
            $result['qtd'] = $this->casos_model->qtd_casos();
            $result['atual'] = 0;
            $result['areas'] = $this->casos_model->get_areas();

            $this->load->view('admin/includes/topo');
            $this->load->view('admin/includes/menu');
            $this->load->view('admin/repositorio', $result);
            $this->load->view('admin/includes/rodape');
        } else {
            redirect('admin/admin/repositorio/0');
        }
    }

    public function casos_usuario($id, $n, $c = null) {
        $this->validar_sessao();
        $dados['ultimo'] = $c;
        $dados['caso'] = $this->casos_model->get_casos_usuario($id, $n);
        $dados['qtd'] = $this->casos_model->qtd_casos_usuario($id);
        $dados['atual'] = $n;

        $usuario = $this->session->userdata('id');
        $dados['estrategias'] = $this->casos_model->get_estrategias($id, $usuario);

        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/meus_casos', $dados);
        $this->load->view('admin/includes/rodape');
    }

    public function estrategia($id, $pag) {
        $this->validar_sessao();
        $dados['caso'] = $this->casos_model->get_casos_id($id);
        $dados['pag'] = $pag;

        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/estrategia', $dados);
        $this->load->view('admin/includes/rodape');
    }
    
    public function ver_caso($id) {
        $this->validar_sessao();
        $dados['caso'] = $this->casos_model->get_casos_id($id);
        $usuario = $this->session->userdata('id');
        $dados['estrategias'] = $this->casos_model->get_estrategias($id, $usuario);
//        $dados['pag'] = $pag;

        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/ver_caso', $dados);
        $this->load->view('admin/includes/rodape');
    }

    public function nova_estrategia($usuario, $id) {
        $this->validar_sessao();
        $estrategia = $this->input->post('estrategia');
        $pag = $this->input->post('pagina');
        if ($estrategia != '') {
            $result = $this->casos_model->nova_estrategia($usuario, $id, $estrategia);

            if ($result) {
                $mensagem = array('msg' => 'insert-con-ok', 'tipo' => 'success');
                $this->session->set_flashdata('msg', $mensagem);
            } else {
                $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
                $this->session->set_flashdata('msg', $mensagem);
            }
            if ($pag == 'meus') {
                redirect('admin/casos/casos_usuario/' . $this->session->userdata('id') . '/0');
            } else {
                redirect('admin/casos/usos/' . $this->session->userdata('id') . '/0');
            }
        } else {
            $mensagem = array('msg' => 'campo-obg', 'tipo' => 'danger');
            $this->session->set_flashdata('msg', $mensagem);
            redirect('admin/casos/estrategia/' . $id . '/' . 'meus');
        }
    }

    public function usar($id, $caso) {
        $this->validar_sessao();
        $r = $this->casos_model->novo_uso($id, $caso);

        if ($r) {
            $mensagem = array('msg' => 'ok-uso', 'tipo' => 'success');
            $this->session->set_flashdata('msg', $mensagem);

            $dados['casos'] = $this->casos_model->usos($id, 0);
            $dados['qtd'] = $this->casos_model->qtd_usos($id);
            $dados['atual'] = 0;

            $this->load->view('admin/includes/topo');
            $this->load->view('admin/includes/menu');
            $this->load->view('admin/usos', $dados);
            $this->load->view('admin/includes/rodape');
        } else {
            $mensagem = array('msg' => 'erro-uso', 'tipo' => 'danger');
            $this->session->set_flashdata('msg', $mensagem);

            redirect('admin/casos/usos/' . $this->session->userdata('id') . '/0');
        }
    }

    public function usos($id, $n) {
        $this->validar_sessao();

        $dados['casos'] = $this->casos_model->usos($id, $n);
        $dados['qtd'] = $this->casos_model->qtd_usos($id);
        $dados['atual'] = $n;

        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/usos', $dados);
        $this->load->view('admin/includes/rodape');
    }

    public function busca_subarea($id_area) {
        $subareas = $this->casos_model->get_subarea($id_area);

        foreach ($subareas as $s) {
            echo "<option value=" . $s->id_sub . ">" . $s->nome_sub . "</option>";
        }
    }

    public function busca_estrategias($id_caso) {
        $usuario = $this->session->userdata('id');
        $estrategias = $this->casos_model->get_estrategias($id_caso, $usuario);

        if (!$estrategias) {
            echo "Não há cadastro de estratégias de uso do caso!";
        } else {
            foreach ($estrategias as $s) {
                echo "<li>" . $s->estrategia . "</li>";
            }
        }
    }

    public function apagar($codigo) {
        $this->validar_sessao();
        $r = $this->casos_model->uso_delete($codigo);
        if ($r) {
            $mensagem = array('msg' => 'ap-caso', 'tipo' => 'danger');
            $this->session->set_flashdata('msg', $mensagem);

            redirect('admin/casos/casos_usuario/' . $this->session->userdata('id') . '/0');
        }
        else{
            $result = $this->casos_model->delete('casos', $codigo);
            if ($result) {
                $mensagem = array('msg' => 'delete-caso-ok', 'tipo' => 'success');
                $this->session->set_flashdata('msg', $mensagem);
            } else {
                $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
                $this->session->set_flashdata('msg', $mensagem);
            }
            redirect('admin/casos/casos_usuario/' . $this->session->userdata('id') . '/0');
            
        }
    }

    public function editar($codigo) {
        $this->validar_sessao();

        $result['areas'] = $this->casos_model->get_areas();
        $result['dados'] = $this->casos_model->get_casos_id($codigo);
        
        $chave = explode(",", $result['dados'][0]->palavra_chave_caso);
//        echo $chave[0];
        $result['chave'] = $chave;
        $result['tam'] = count($chave);
        $result['areasubarea'] = $this->casos_model->areasubarea_caso($codigo);

        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/edita_caso', $result);
        $this->load->view('admin/includes/rodape');
    }

    public function salva_edicao($codigo) {
        $this->validar_sessao();
        $data['nome_caso'] = $this->input->post('nome');
        $data['estoria_caso'] = $this->input->post('estoria');
        $data['origem_caso'] = $this->input->post('origem');
        $data['palavra_chave_caso'] = $this->input->post('chave');

        $data['id_usu'] = $this->session->userdata('id');

        $result = $this->casos_model->update('casos', $data, $codigo);
        $dados['id_sub'] = $this->input->post('subarea');
        $dados['id_area'] = $this->input->post('area');
//        var_dump ($result);

        $r = $this->casos_model->casos_area_update('casos_has_area', $dados, $codigo);

        if ($result) {
            $mensagem = array('msg' => 'update-caso-ok', 'tipo' => 'success');
            $this->session->set_flashdata('msg', $mensagem);
        } else {
            $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
            $this->session->set_flashdata('msg', $mensagem);
        }
        redirect('admin/casos/casos_usuario/' . $this->session->userdata('id') . '/0');
    }

}
