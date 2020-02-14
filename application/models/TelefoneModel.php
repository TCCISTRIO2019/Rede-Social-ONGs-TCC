<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TelefoneModel extends CI_Model {

    private $id_telefone;
    private $id_usuario;
    private $telefone;

	public function __construct()
	{
		parent::__construct();
    }

    public function inserir($dados)
    {
        return $this->db->insert('telefone',$dados);
    }

    public function atualizar($dados){
        try {
            $this->db->where('id_usuario', $dados['id_usuario']);
            $this->db->set('telefone', $dados['telefone']);
            $this->db->update('telefone');

            if($this->db->trans_status() === TRUE){
                $this->db->trans_commit();
                return TRUE;
            }else{
                $this->db->trans_rollback();
                return FALSE;
            }

//            $this->db->update('telefone',$dados);
//            $this->db->where('id_usuario', $dados['id_usuario']);
//
//            return TRUE;
        } catch(Exception $exception) {
            return FALSE;
        }
    }
}
