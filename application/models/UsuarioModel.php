<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModel extends CI_Model {

    private $id_usuario;
    private $senha;
    private $email;
    private $criacao;
    private $modificacao;
    private $foto_perfil;
    private $tipo_usuario;

	public function __construct()
	{
		parent::__construct();
    }

    public function listar_usuarios()
    {
	    $this->db->order_by('id_usuario','ASC');

	    return $this->db->get('usuario')->result();
    }
}
