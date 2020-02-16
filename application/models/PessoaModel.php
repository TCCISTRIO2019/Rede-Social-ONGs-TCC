<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PessoaModel extends CI_Model {

    private $id_pessoa;
    private $id_usuario;
    private $nome;
    private $sobrenome;
    private $nascimento;
    private $sexo;

	public function __construct()
	{
		parent::__construct();
    }

    public function inserir($dados)
    {
        return $this->db->insert('pessoa',$dados);
    }

    public function atualizar($dados){
        try {
            $this->db->where('id_usuario', $dados['id_usuario']);
            $this->db->set('nome', $dados['nome']);
            $this->db->set('sobrenome', $dados['sobrenome']);
            $this->db->set('nascimento', $dados['nascimento']);
            $this->db->set('sexo', $dados['sexo']);
            $this->db->update('pessoa');

            if($this->db->trans_status() === TRUE){
                $this->db->trans_commit();
                return TRUE;
            }else{
                $this->db->trans_rollback();
                return FALSE;
            }
        } catch(Exception $exception) {
            return FALSE;
        }
    }
}
