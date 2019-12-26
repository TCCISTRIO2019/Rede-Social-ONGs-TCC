<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstituicaoModel extends CI_Model {

    private $id_instituicao;
    private $id_usuario;
    private $nome;
    private $criacao_instituicao;
    private $logradouro;
    private $numero;
    private $bairro;
    private $complemento;
    private $cidade;
    private $estado;

    public function __construct()
	{
		parent::__construct();
    }

    public function inserir($dados)
    {
        return $this->db->insert('instituicao',$dados);
    }
}
