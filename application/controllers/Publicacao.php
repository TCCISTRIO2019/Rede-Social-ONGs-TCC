<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacao extends CI_Controller {

	public function fazer_publicacao()
	{
        // $this->form_validation->set_rules('corpo', 'Corpo', 'required'); // Botar max size por conta do banco

        // if($this->form_validation->run() == FALSE){
        //     redirect(base_url('home'));
        // } else {

            $dadosRequest['corpo'] = $this->input->post('corpo');
            $dadosRequest['id_usuario'] = $this->input->post('id_usuario');
            $dadosRequest['curtidas'] = 0;

            $now = new DateTime();
            $datetime = $now->format('Y-m-d h:m:s');
            $dadosRequest['data_criacao'] = $datetime;

            // Para nao entrar em caso que o corpo e a imagem estao vazios
            if($_FILES['imagem_publicacao']['size'] != 0 || !empty($dadosRequest['corpo'])) {
                $configuracao = array(
                    'upload_path'   => './assets/public/images/publicacoes/',
                    'allowed_types' => 'gif|jpg|png',
                    'file_name'     => '',
                    'max_size'      => 1000,
                    'max_width'     => 1024,
                    'max_height'    => 768,
                    'overwrite'     => FALSE
                );
                $this->load->library('upload', $configuracao);
                $this->upload->initialize($configuracao);
                
                if($this->upload->do_upload('imagem_publicacao')){
                    $dadosRequest['imagem'] = '/assets/public/images/publicacoes/'.$this->upload->data('file_name');
                } else {
                    // $erro = array('error' => $this->upload->display_errors());
    
                    // redirect(base_url('home', $erro));
    
                    // $this->load->view('upload_success', $data);
    
                    echo $this->upload->display_errors();
                }

                $this->load->model('PublicacaoModel', 'modelpublicacao');
                $this->modelpublicacao->inserir_publicacao($dadosRequest);
                
    //            $dadosUsuario = $this->modelusuario->verifica_login($retornoUsuario);
    //            $dadosSessao['userlogado'] = $dadosUsuario[0];
            }

            $dadosSessao['logado'] = TRUE;
            $this->session->set_userdata($dadosSessao);

            redirect(base_url('home'));

        // }
    }

    public function criar_comentario()
    {
        $this->form_validation->set_rules('corpo', 'Comentario', 'required');

        if($this->form_validation->run() == FALSE){
            redirect(base_url('home'));
        } else {
            $dadosRequest['corpo'] = $this->input->post('corpo');
            $dadosRequest['id_usuario'] = $this->input->post('id_usuario');
            $dadosRequest['id_publicacao'] = $this->input->post('id_publicacao');

            $now = new DateTime();
            $datetime = $now->format('Y-m-d h:m:s');
            $dadosRequest['data_enviado'] = $datetime;

            $this->load->model('ComentarioModel', 'modelcomentario');
            $this->modelcomentario->inserir_comentario($dadosRequest);
            
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }

    public function listar_comentarios_publicacao($idPublicacao)
    {
        $dados['titulo'] = 'Comentários Publicação - TCC Rede Social';

        $this->load->model('PublicacaoModel', 'modelpublicacao');
        $publicacao = $this->modelpublicacao->buscar_publicacao($idPublicacao);
        $dados['publicacao'] = $publicacao[0];

        $this->load->model('ComentarioModel', 'modelcomentario');
        $dados['comentarios'] = $this->modelcomentario->buscar_comentarios($idPublicacao);

        $this->load->view('template/html-header', $dados);
        $this->load->view('template/header');
        $this->load->view('public/comentariosview');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
    }
}
