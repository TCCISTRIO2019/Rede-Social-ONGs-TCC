<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConversaModel extends CI_Model {

    private $id_conversa;
    private $id_usuario1;
    private $id_usuario2;
    private $data_inicio;

	public function __construct()
	{
		parent::__construct();
    }

    public function listar_conversas_usuario($id)
    {
        $result = null;

//        A lógica é: Se é o usuario1 que está abrindo a página, deve aparecer a foto do usuário2 e vice-versa
//        Pegando nome do usuario2 e id_usuario e email do usuario1
        $this->db->select('usuario.id_usuario, usuario.nome, usuario.foto_perfil,
            conversa.id_conversa, conversa.id_usuario1, conversa.id_usuario2, conversa.data_inicio');
        $this->db->from('conversa');
        $this->db->join('usuario','usuario.id_usuario = conversa.id_usuario2');
        $this->db->where('md5(conversa.id_usuario1)',$id);
        $this->db->order_by('conversa.data_inicio','DESC');

        $result = $this->db->get('')->result();

        // Verificando se não está como usuário 1, testar como usuário 2
        if(count($result) == 0){
            $this->db->select('usuario.id_usuario, usuario.nome, usuario.foto_perfil,
            conversa.id_conversa, conversa.id_usuario1, conversa.id_usuario2, conversa.data_inicio');
            $this->db->from('conversa');
            $this->db->join('usuario','usuario.id_usuario = conversa.id_usuario1');
            $this->db->where('md5(conversa.id_usuario2)',$id);
            $this->db->order_by('conversa.data_inicio','DESC');

            $result = $this->db->get('')->result();
        }

        // Retorna se for usuário 1, 2 ou nenhum
        return $result;
    }

    public function inserir_conversa($conversa)
    {
        $this->db->insert('conversa',$conversa);

        $this->db->where('id_usuario1', $conversa['id_usuario1']);
        $this->db->where('id_usuario2', $conversa['id_usuario2']);
        $retorno = $this->db->get('conversa')->result();

        if(count($retorno) == 1) {
            return $retorno[0];
        } else {
            return NULL;
        }
    }

    public function buscar_conversa($id)
    {
        $this->db->from('conversa');
        $this->db->where('md5(id_conversa)',$id);

        return $this->db->get('')->result();
    }
}
