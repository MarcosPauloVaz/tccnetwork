<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Class Inicio
 *
 * Classe que carrega a tela de boas vindas
 *
 */
class Pesquisa extends CI_Controller
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
		$this->load->model('Usuario_model','usuario');
		$this->load->model('Publicacao_model','publicacao');
		$this->load->model('Areas_interesse_model','areas_interesse');	
		
	}
	
	public function index()
	{
		$id_usuario = $this->session->userdata('id_usuario');
		$pesquisa = $this->input->post('pesquisa');
		$usuarios = $this->usuario->get_by_like_nome($pesquisa);
		$seguidos_obj = $this->usuario->get_seguir_by_seguidor($id_usuario);
		$seguidos = array();
		foreach ($seguidos_obj as $item) {
			$seguidos[] = $item->id_seguido;
		}
		
		$top_dez = $this->publicacao->get_top_dez();
		
		$areas = $this->areas_interesse->get_areas_de_interesse_by_usuario_random($id_usuario);
		$usuarios_recomendados = $this->usuario->get_usuarios_recomendados($areas, $id_usuario);
		
		$this->load->view('admin/pesquisa',array('usuarios'=>$usuarios,'seguidos'=>$seguidos, 'top_dez'=>$top_dez,'usuarios_recomendados'=>$usuarios_recomendados)); 
	}
}