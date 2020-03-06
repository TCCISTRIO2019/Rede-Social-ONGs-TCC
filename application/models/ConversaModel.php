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

//        Pegando nome do usuario2 e id_usuario e email do usuario1
        $this->db->select('pessoa.id_pessoa, pessoa.id_usuario, pessoa.nome, 
            conversa.id_conversa, conversa.id_usuario1, conversa.id_usuario2, conversa.data_inicio,
            usuario.id_usuario, usuario.email');
        $this->db->from('conversa');
//        Rever esta parte de usuario1 e usuario2
        $this->db->join('usuario','usuario.id_usuario = conversa.id_usuario1');
        $this->db->join('pessoa','pessoa.id_usuario = conversa.id_usuario2');
        $this->db->where('md5(conversa.id_usuario1)',$id);
        $this->db->order_by('conversa.data_inicio','DESC');

        $result = $this->db->get('')->result();

        // Não está como usuário 1, testar como usuário 2
        if(count($result) == 0){
            $this->db->select('pessoa.id_pessoa, pessoa.id_usuario, pessoa.nome, 
            conversa.id_conversa, conversa.id_usuario1, conversa.id_usuario2, conversa.data_inicio,
            usuario.id_usuario, usuario.email');
            $this->db->from('conversa');
            $this->db->join('usuario','usuario.id_usuario = conversa.id_usuario2');
            $this->db->join('pessoa','pessoa.id_usuario = conversa.id_usuario1');
            $this->db->where('md5(conversa.id_usuario2)',$id);
            $this->db->order_by('conversa.data_inicio','DESC');

            $result =  $this->db->get('')->result();
        }

        // Retorna se for 1, 2 ou se for nenhum
        return $result;
    }

    public function inserir_conversa($conversa)
    {
        return $this->db->insert('conversa',$conversa);
    }

    public function buscar_conversa($id)
    {
        $this->db->from('conversa');
        $this->db->where('md5(id_conversa)',$id);

        return $this->db->get('')->result();
    }
}
