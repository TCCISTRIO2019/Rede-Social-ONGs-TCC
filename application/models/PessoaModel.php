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
}
