<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Class Inicio
 *
 * Classe que carrega a tela de boas vindas
 *
 */
class Publicacao extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array(
			'form',
			'array',
			'util_helper',
			'text',
		));			
		
		$this->load->model('Areas_interesse_model','interesse');
		$this->load->model('Publicacao_model','publicacao');
		$this->load->model('Usuario_model','usuario');	
		
	}
	
	public function visualizar()
	{
		$id_publicacao = $this->uri->segment(4);
		$publicacao = $this->publicacao->get_by_id($id_publicacao);
		
		//INFORMAÇÕES DE PERFIL
		$id_usuario = $this->uri->segment(5);
		$usuario = $this->usuario->get_by_id($id_usuario);
		$interesses = $this->interesse->get_by_id_usuario($id_usuario);
		$seguidos_list = $this->usuario->get_seguir_by_seguidor($id_usuario);
		
		$seguidos_obj = $this->usuario->get_seguir_by_seguidor($this->session->userdata('id_usuario'));
		$seguidos = array();
		foreach ($seguidos_obj as $item) {
			$seguidos[] = $item->id_seguido;
		}
		
		$gostei_obj = $this->publicacao->get_gostar_by_usuario($this->session->userdata('id_usuario'));
		$gostei = array();
		foreach ($gostei_obj as $item) {
			$gostei[] = $item->id_publicacao;
		}
		
		$this->load->view('admin/publicacao', array('interesses'=>$interesses,'publicacao'=>$publicacao,'usuario'=>$usuario,'seguidos'=>$seguidos,'gostei'=>$gostei,'seguidos_list'=>$seguidos_list)); 
	}
	
	public function salvar()
	{
		if($this->input->post('titulo')!= null){
			$dados = array('titulo' => $this->input->post('titulo'),
							'categoria' => $this->input->post('categoria'),
							'autor' => $this->input->post('autor'),
							'orientador' => $this->input->post('orientador'),
							'fonte' => $this->input->post('fonte'),
							'ano' => $this->input->post('ano'),
							'link' => $this->input->post('link'),
							'palavras_chave' => $this->input->post('palavras_chave'),
							'resumo' => $this->input->post('resumo'),
					   		'id_usuario'=>$this->session->userdata('id_usuario')
					  );
			if($this->publicacao->salvar($dados))			  
			{
				redirect('admin/dashboard');
			}
		}
		redirect('admin/dashboard');
	}
	
	public function gostar_deixardegostar()
    {
    	$id_usuario = $this->input->post('id_usuario');
		$id_publicacao = $this->input->post('id_publicacao');
    	$dados = array('id_usuario'=>$id_usuario,
					   'id_publicacao'=>$id_publicacao,
					   'data'=>date('Y-m-d'),
					   'hora'=>date('H:i:s'));
		if($this->publicacao->get_gostar_by_usuario_publicacao($id_usuario,$id_publicacao)==null){
			if($this->publicacao->gostar($dados)){
				echo json_encode('gostar');	
			}
		}else{
			if($this->publicacao->deixar_gostar($dados)){
				echo json_encode('deixar_gostar');	
			}
		}
		
    }
}