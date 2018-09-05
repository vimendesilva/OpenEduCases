<?php

class Usuario_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_usuario($id){
        $this->db->where('id_usu', $id);
        return $this->db->get('usuarios')->result();
    }
    ////////////////////////////////////////////////////
    ////////////////// SISTEMA LOGIN ///////////////////
    ////////////////////////////////////////////////////
    function ver_user_login($email) {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('email_usu', $email);
        return $this->db->get()->result()[0];
    }

    function logar($usuario, $senha) {
        $this->db->where('email_usu', $usuario);
        $this->db->where('senha_usu', $senha);
        return $this->db->get('usuarios')->result();
    }


    ////////////////////////////////////////////////////////
    ////////////////// SISTEMA DE CADASTRO /////////////////
    ////////////////////////////////////////////////////////
    function cadastrar($nome, $email, $senha) {
        if (($nome != null) && ($email != null) && ($senha != null)) {
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('usuarios.email_usu', $email);
            $resultado = (bool) ($this->db->get()->result());
            if (!$resultado) {
                $data = array(
                    'nome_usu' => $nome,
                    'email_usu' => $email,
                    'senha_usu' => $senha,
                );
                $this->db->insert('usuarios', $data);


                return $this->db->affected_rows();
            } else {
                return 2;
            }
        } else {
            return 3;
        }
    }

    function confirma_cadastro($usu_login) {
        if (($usu_login != null)) {

            return 1;
        } else {
            return 0;
        }
    }

    public function update($tabela, $data, $codigo) {
        $this->db->where('id_usu', $codigo);
        $result = $this->db->update($tabela, $data);
        return $result;
    }
    ////////////////////////////////////////////////////////
    //////////////// SISTEMA DE RECUPERAÇAO ////////////////
    ////////////////////////////////////////////////////////

    function recupera_senha($email, $senha1) {
        $this->db->set('senha_usu', $senha1);
        $this->db->where('email_usu', $email);
        $this->db->update('usuarios');

        return $this->db->affected_rows();
    }

}
