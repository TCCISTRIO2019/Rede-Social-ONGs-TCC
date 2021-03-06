<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MensagemModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
    }

    public function inserir($mensagem)
    {
        return $this->db->insert('mensagem',$mensagem);
    }

    public function buscar_mensagens($id_conversa)
    {
        $this->db->select('mensagem.id_mensagem, mensagem.id_conversa, mensagem.id_usuario_remetente, mensagem.hora_envio, mensagem.corpo,
            usuario.id_usuario, usuario.email, usuario.nome');
        $this->db->from('mensagem');
        // Precisa buscar os nomes dos dois
        $this->db->join('usuario','usuario.id_usuario = mensagem.id_usuario_remetente');

        $this->db->where('mensagem.id_conversa',$id_conversa);

        $this->db->order_by('mensagem.id_mensagem','ASC');

        return $this->db->get('')->result();
    }
}
