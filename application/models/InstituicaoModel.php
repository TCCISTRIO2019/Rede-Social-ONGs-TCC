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

    public function atualizar($dados){
        try {
            $this->db->where('id_usuario', $dados['id_usuario']);
            $this->db->set('criacao_instituicao', $dados['criacao_instituicao']);
            $this->db->set('logradouro', $dados['logradouro']);
            $this->db->set('numero', $dados['numero']);
            $this->db->set('bairro', $dados['bairro']);
            $this->db->set('complemento', $dados['complemento']);
            $this->db->set('cidade', $dados['cidade']);
            $this->db->set('estado', $dados['estado']);
            $this->db->set('cep', $dados['cep']);
            $this->db->set('qtd_funcionarios', $dados['qtd_funcionarios']);
            $this->db->set('descricao', $dados['descricao']);
            $this->db->update('instituicao');

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

    // Atualizar para pegar todas as instituições
    public function listar_instituicoes()
    {
        $this->db->select('usuario.id_usuario, usuario.foto_perfil, usuario.nome,
            instituicao.id_usuario, instituicao.id_instituicao, instituicao.descricao, instituicao.criacao_instituicao');
        $this->db->from('instituicao');
        $this->db->join('usuario','usuario.id_usuario = instituicao.id_usuario');

//        $this->db->limit(5);
        $this->db->order_by('usuario.nome','ASC');

//	    return $this->db->get('publicacao')->result();
        return $this->db->get('')->result();
    }

    public function pesquisar_instituicoes($dados)
    {
        $this->db->like('nome', $dados['nome']);
        $this->db->join('usuario','usuario.id_usuario = instituicao.id_usuario');
        RETURN $this->db->get('instituicao')->result();
    }
}
