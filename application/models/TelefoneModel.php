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
}
