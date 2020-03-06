<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MensagemModel extends CI_Model {



	public function __construct()
	{
		parent::__construct();
    }

    public function buscar_mensagens($id)
    {
        $this->db->select('pessoa.id_pessoa, pessoa.id_usuario, pessoa.nome, 
            conversa.id_conversa, conversa.id_usuario1, conversa.id_usuario2, conversa.data_inicio,
            mensagem.id_mensagem, mensagem.id_conversa, mensagem.id_usuario_remetente, mensagem.id_usuario_destino, mensagem.hora_envio,
            usuario.id_usuario, usuario.email');
        $this->db->from('mensagem');
        // Precisa buscar os nomes dos dois
        $this->db->join('usuario','usuario.id_usuario = conversa.id_usuario2');
        $this->db->join('pessoa','pessoa.id_usuario = conversa.id_usuario1');

        $this->db->where('id_conversa',$id);

        return $this->db->get('')->result();
    }
}
