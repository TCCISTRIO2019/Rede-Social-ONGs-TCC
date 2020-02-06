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

    public function verifica_login($dados)
    {
        if ($dados->tipo_usuario == 'fisica') {
            // Checar se está chegando uma entrada e se é o id correto
            $this->db->select('usuario.id_usuario, usuario.email, usuario.senha, usuario.criacao, usuario.modificacao, usuario.foto_perfil, usuario.tipo_usuario,
            pessoa.id_pessoa, pessoa.id_usuario, pessoa.nome, pessoa.sobrenome, pessoa.nascimento, pessoa.sexo,
            telefone.id_telefone, telefone.id_usuario, telefone.telefone');
            $this->db->from('usuario');
            $this->db->join('pessoa', 'usuario.id_usuario = pessoa.id_usuario');
        } else {
            $this->db->select('usuario.id_usuario, usuario.email, usuario.senha, usuario.criacao, usuario.modificacao, usuario.foto_perfil, usuario.tipo_usuario,
            instituicao.id_instituicao, instituicao.id_usuario, instituicao.nome, instituicao.criacao_instituicao, instituicao.logradouro,
            instituicao.numero, instituicao.bairro, instituicao.complemento, instituicao.cidade, instituicao.estado, instituicao.cep, instituicao.qtd_funcionarios,
            telefone.id_telefone, telefone.id_usuario, telefone.telefone');
            $this->db->from('usuario');
            $this->db->join('instituicao', 'usuario.id_usuario = instituicao.id_usuario');
        }

        $this->db->join('telefone', 'usuario.id_usuario = telefone.id_usuario');
        $this->db->where('usuario.id_usuario', $dados->id_usuario);

        return $this->db->get('')->result();
    }

    public function inserir($dados)
    {
        $this->db->insert('usuario',$dados);

        $this->db->where('email', $dados['email']);
        $Usuario = $this->db->get('usuario')->result();

        if(count($Usuario) == 1) {
            return $Usuario[0];
        } else {
            return NULL;
        }
    }

    public function atualizar($dados){
	    try {
            $this->db->update('usuario',$dados);
            $this->db->where('id_usuario', $dados['id_usuario']);

            return TRUE;
        } catch(Exception $exception) {
            return FALSE;
        }
    }
}