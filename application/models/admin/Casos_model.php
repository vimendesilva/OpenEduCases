<?php

if (!defined('BASEPATH'))
    exit("Sem direito de acesso direto ao script");

class Casos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($tabela, $data) {
        $this->db->insert($tabela, $data);
        $sql = "SELECT LAST_INSERT_ID() as id;";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function update($tabela, $data, $codigo) {
        $this->db->where('id_caso', $codigo);
        $result = $this->db->update($tabela, $data);
        return $result;
    }

    public function uso_delete($codigo) {
        $this->db->where('casos_id_caso', $codigo);
        $result = $this->db->get('usos')->result();
        return $result;
    }

    public function delete($tabela, $codigo) {

        $this->db->where('casos_id_caso', $codigo);
        $this->db->delete('casos_has_area');

        $this->db->where('casos_id_caso', $codigo);
        $this->db->delete('estrategias_uso_has_casos');

        $this->db->where('casos_id_caso', $codigo);
        $this->db->delete('usos');

        $this->db->where('id_caso', $codigo);
        $result = $this->db->delete($tabela);

        return $result;
    }

    public function get_casos_usuario($id, $n) {
        $sql = 'select casos.*, usuarios.nome_usu, area.nome_area FROM casos
                INNER JOIN usuarios on casos.id_usu = usuarios.id_usu
                inner join casos_has_area on casos.id_caso = casos_has_area.casos_id_caso
                inner join area on casos_has_area.id_area = area.id_area
                WHERE usuarios.id_usu = ' . $id .
                ' ORDER by casos.data_caso desc
                LIMIT ' . $n . ',5';

        $query = $this->db->query($sql);

        return $query->result();
    }

    public function qtd_casos_usuario($id) {
        $this->db->order_by("data_caso", "desc");
        $this->db->where('id_usu', $id);
        $result = $this->db->get('casos')->num_rows();
        return $result;
    }

    public function get_estrategias($id, $usuario) {
        $sql = 'SELECT estrategias_uso.estrategia FROM estrategias_uso
                INNER JOIN estrategias_uso_has_casos on estrategias_uso_has_casos.id_estrategias = estrategias_uso.id_estrategias
                WHERE 
                estrategias_uso_has_casos.casos_id_caso = ' . $id;
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function get_casos($n) {
        $sql = 'select casos.*, usuarios.nome_usu, area.nome_area FROM casos
                INNER JOIN usuarios on casos.id_usu = usuarios.id_usu
                inner join casos_has_area on casos.id_caso = casos_has_area.casos_id_caso
                inner join area on casos_has_area.id_area = area.id_area
                ORDER by casos.data_caso desc
                LIMIT ' . $n . ',5';

        $query = $this->db->query($sql);

        return $query->result();
    }

    public function qtd_casos() {
        $result = $this->db->get('casos')->num_rows();
        return $result;
    }

    public function get_casos_id($id) {
        $this->db->join('usuarios', 'casos.id_usu = usuarios.id_usu');
        $this->db->where('id_caso', $id);
        $result = $this->db->get('casos')->result();
        return $result;
    }

    public function nova_estrategia($usuario, $id, $estrategia) {
        $data = array(
            'estrategia' => $estrategia,
            'usuarios_id_usu' => $usuario
        );
        $this->db->insert('estrategias_uso', $data);
        $insert_id = $this->db->insert_id();

//        $this->db->where('estrategia', $estrategia);
//        $r = $this->db->get('estrategias_uso')->result();

        $d = array(
            'id_estrategias' => $insert_id,
            'estrategias_id_usu' => $usuario,
            'casos_id_caso' => $id,
        );
        $result = $this->db->insert('estrategias_uso_has_casos', $d);
        return $result;
    }

    public function novo_uso($id, $caso) {
        $this->db->where('casos_id_caso', $caso);
        $this->db->where('usuarios_id_usu', $id);
        $r = $this->db->get('usos')->result();

        if ($r) {
            return 0;
        } else {
            $data = array(
                'casos_id_caso' => $caso,
                'usuarios_id_usu' => $id
            );
            $result = $this->db->insert('usos', $data);
            return $result;
        }
    }

    public function usos($id, $n) {
        $sql = 'SELECT casos.*, usuarios.nome_usu, area.nome_area FROM casos 
                INNER JOIN usos ON usos.casos_id_caso = casos.id_caso 
                INNER JOIN usuarios ON casos.id_usu = usuarios.id_usu
                inner join casos_has_area on casos.id_caso = casos_has_area.casos_id_caso
                inner join area on casos_has_area.id_area = area.id_area
                WHERE usos.usuarios_id_usu = ' . $id .
                ' order by casos.data_caso desc 
                limit ' . $n . ', 5';
//        $sql = 'SELECT casos.* FROM casos INNER JOIN usos ON usos.casos_id_caso = casos.id_caso WHERE usos.usuarios_id_usu = ' . $id . ' order by casos.data_caso desc limit ' . $n . ', 5';
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function qtd_usos($id) {
        $sql = 'SELECT casos.* FROM casos INNER JOIN usos ON usos.casos_id_caso = casos.id_caso WHERE usos.usuarios_id_usu = ' . $id . ' order by casos.data_caso desc ';
        $query = $this->db->query($sql);

        return $query->num_rows();
    }

    public function get_areas() {
        $this->db->order_by("nome_area", "asc");
        $result = $this->db->get('area')->result();
        return $result;
    }

    public function get_subarea($id_area) {
        $this->db->order_by("nome_sub", "asc");
        $this->db->where('id_area', $id_area);
        $result = $this->db->get('subarea')->result();

        return $result;
    }

    public function casos_area($tabela, $dados) {
        $r = $this->db->insert($tabela, $dados);
        return $r;
    }

    public function casos_area_update($tabela, $dados, $codigo) {
        $this->db->where('casos_id_caso', $codigo);
        $result = $this->db->update($tabela, $dados);
        return $result;
    }

    public function buscar_caso($busca) {
        $sql = "SELECT * FROM casos 
                inner join casos_has_area on casos.id_caso = casos_has_area.casos_id_caso
                inner join area on casos_has_area.id_area = area.id_area
                WHERE casos.nome_caso LIKE '%" . $busca . "%' 
                or casos.palavra_chave_caso LIKE '%" . $busca . "%' 
                ORDER BY data_caso";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function buscar_caso_area($busca) {
        $sql = "SELECT * FROM `casos` 
INNER join casos_has_area on casos_has_area.casos_id_caso = casos.id_caso
inner join area on casos_has_area.id_area = area.id_area
WHERE casos_has_area.id_area = " . $busca;
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function areasubarea_caso($codigo) {
        $sql = "select area.nome_area, subarea.nome_sub, casos_has_area.id_sub, casos_has_area.id_area from casos_has_area inner join area on area.id_area = casos_has_area.id_area inner join subarea on subarea.id_sub = casos_has_area.id_sub where casos_has_area.casos_id_caso = " . $codigo;
        $query = $this->db->query($sql);

        return $query->result();
    }

}
