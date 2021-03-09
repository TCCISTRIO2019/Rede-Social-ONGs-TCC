<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublicacaoModel extends CI_Model {

    private $id_publicacao;
    private $id_usuario;
    private $corpo;
    private $comentarios;
    private $imagem;
    private $data_criacao;

	public function __construct()
	{
		parent::__construct();
    }

    public function buscar_publicacao($idPublicacao)
    {
        $this->db->select('usuario.id_usuario, usuario.email, usuario.foto_perfil, usuario.nome,
            publicacao.id_publicacao, publicacao.id_usuario, publicacao.corpo, publicacao.imagem, publicacao.data_criacao,
            instituicao.id_instituicao, instituicao.id_usuario');
        $this->db->from('publicacao');
        $this->db->join('usuario','usuario.id_usuario = publicacao.id_usuario');
        $this->db->join('instituicao','usuario.id_usuario = instituicao.id_usuario');
        
        $this->db->where('publicacao.id_publicacao',$idPublicacao);

        return $this->db->get('')->result();
    }

    public function listar_publicacoes()
    {
        $this->db->select('usuario.id_usuario, usuario.email, usuario.foto_perfil, usuario.nome,
            publicacao.id_publicacao, publicacao.id_usuario, publicacao.corpo, publicacao.imagem, publicacao.data_criacao,
            instituicao.id_instituicao, instituicao.id_usuario');
        $this->db->from('publicacao');
        $this->db->join('usuario','usuario.id_usuario = publicacao.id_usuario');
        $this->db->join('instituicao','usuario.id_usuario = instituicao.id_usuario');

        $this->db->limit(5);
	    $this->db->order_by('publicacao.data_criacao','DESC');

        return $this->db->get('')->result();
    }

    public function publicacoes_usuario($id)
    {
        $this->db->select('usuario.id_usuario, usuario.email, usuario.foto_perfil, usuario.nome,
            publicacao.id_publicacao, publicacao.id_usuario, publicacao.corpo, publicacao.imagem, publicacao.data_criacao,
            instituicao.id_instituicao, instituicao.id_usuario');
        $this->db->from('publicacao');
        $this->db->join('usuario','usuario.id_usuario = publicacao.id_usuario');
        $this->db->join('instituicao','usuario.id_usuario = instituicao.id_usuario');

        $this->db->where('md5(usuario.id_usuario)',$id);

        $this->db->order_by('publicacao.data_criacao','DESC');

        return $this->db->get('')->result();
    }

    public function inserir_publicacao($publicacao)
    {
        return $this->db->insert('publicacao',$publicacao);
    }
}
