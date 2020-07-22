<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacao extends CI_Controller {

	public function fazer_publicacao()
	{
        $this->form_validation->set_rules('corpo', 'Corpo', 'required'); // Botar max size por conta do banco

        if($this->form_validation->run() == FALSE){
            redirect(base_url('home'));
        } else {
            $dadosRequest['corpo'] = $this->input->post( 'corpo');
            $dadosRequest['id_usuario'] = $this->input->post( 'id_usuario');
            $dadosRequest['curtidas'] = 0;

            $now = new DateTime();
            $datetime = $now->format('Y-m-d h:m:s');
            $dadosRequest['data_criacao'] = $datetime;

            $configuracao = array(
                'upload_path'   => './assets/public/images/',
                'allowed_types' => 'gif|jpg|png',
                'file_name'     => md5(),
                'max_size'      => 100,
                'max_width'     => 1024,
                'max_height'    => 768
            );
            $this->load->library('upload', $configuracao);
            $this->upload->initialize($configuracao);
            
            if($this->upload->do_upload('imagem_publicacao')){
                // $dadosImagem = $this->upload->data();
                // $dadosRequest['imagem'] = $dadosImagem['file_name'];
                $dadosRequest['imagem'] = $this->upload->data('file_name');

                $this->load->model('PublicacaoModel', 'modelpublicacao');
                $this->modelpublicacao->inserir_publicacao($dadosRequest);
                
//            $dadosUsuario = $this->modelusuario->verifica_login($retornoUsuario);
//            $dadosSessao['userlogado'] = $dadosUsuario[0];
                $dadosSessao['logado'] = TRUE;

                $this->session->set_userdata($dadosSessao);

                redirect(base_url('home'));
            } else {
                // $erro = array('error' => $this->upload->display_errors());

                // redirect(base_url('home', $erro));

                // $this->load->view('upload_success', $data);

                echo $this->upload->display_errors();
            }

        }
    }

    public function curtida()
    {

    }
}
