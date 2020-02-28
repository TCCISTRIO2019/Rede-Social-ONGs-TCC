<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConversaModel extends CI_Model {

    private $id_publicacao;
    private $id_usuario;
    private $corpo;
    private $comentarios;
    private $curtidas;
    private $imagem;
    private $data_criacao;

	public function __construct()
	{
		parent::__construct();
    }

    public function listar_publicacoes()
    {
        $this->db->select('usuario.id_usuario, usuario.email, 
            publicacao.id_publicacao, publicacao.id_usuario, publicacao.curtidas, publicacao.corpo, publicacao.imagem, publicacao.data_criacao,
            pessoa.id_pessoa, pessoa.id_usuario, pessoa.nome');
        $this->db->from('publicacao');
        $this->db->join('usuario','usuario.id_usuario = publicacao.id_usuario');
        $this->db->join('pessoa','usuario.id_usuario = pessoa.id_usuario');

        $this->db->limit(5);
	    $this->db->order_by('publicacao.data_criacao','DESC');

//	    return $this->db->get('publicacao')->result();
        return $this->db->get('')->result();
    }

    public function listar_conversas_usuario($id)
    {
        $this->db->select('usuario.id_usuario, usuario.email, 
            conversa.id_conversa, conversa.id_usuario1, conversa.id_usuario2, conversa.data_inicio,
            pessoa.id_pessoa, pessoa.id_usuario, pessoa.nome');
        $this->db->from('conversa');
//        Rever esta parte de usuario1 e usuario2
        $this->db->join('usuario','usuario.id_usuario = conversa.id_usuario1');
        $this->db->join('pessoa','usuario.id_usuario = pessoa.id_usuario');

        $this->db->where('md5(usuario.id_usuario)',$id);

        $this->db->order_by('conversa.data_inicio','DESC');

        return $this->db->get('')->result();
    }

    public function inserir_conversa($conversa)
    {
        return $this->db->insert('conversa',$conversa);
    }
}
