<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComentarioModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
    }

    public function inserir_comentario($comentario)
    {
        return $this->db->insert('comentario',$comentario);
    }

    public function buscar_comentarios($idPublicacao)
    {
        $this->db->select('usuario.id_usuario, usuario.foto_perfil, usuario.nome,
            publicacao.id_publicacao,
            comentario.id_comentario, comentario.id_publicacao, comentario.id_usuario, comentario.corpo, comentario.data_enviado');
        $this->db->from('comentario');
        $this->db->join('usuario','usuario.id_usuario = comentario.id_usuario');
        $this->db->join('publicacao','publicacao.id_publicacao = comentario.id_publicacao');

        $this->db->where('comentario.id_publicacao',$idPublicacao);

        $this->db->order_by('comentario.id_comentario','DESC');

        return $this->db->get('')->result();
    }
}
