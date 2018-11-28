<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Class Inicio
 *
 * Classe que carrega a tela de boas vindas
 *
 */
class Perfil extends CI_Controller
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
	
	public function index()
	{
		$interesses = $this->interesse->get_by_id_usuario($this->session->userdata('id_usuario'));
		$publicacoes = $this->publicacao->get_publicacoes_favoritas();
		$seguidos = $this->usuario->get_seguir_by_seguidor($this->session->userdata('id_usuario'));
		
		$gostei_obj = $this->publicacao->get_gostar_by_usuario($this->session->userdata('id_usuario'));
		$gostei = array();
		foreach ($gostei_obj as $item) {
			$gostei[] = $item->id_publicacao;
		}
		
		$this->load->view('admin/perfil',array('interesses'=>$interesses,'publicacoes'=>$publicacoes,'seguidos'=>$seguidos,'gostei'=>$gostei)); 
	}
	
	public function editar()
	{
		$this->load->view('admin/editar_perfil'); 
	}
	
	public function visualizar()
	{
		$id_usuario = $this->uri->segment(4);
		$usuario = $this->usuario->get_by_id($id_usuario);
		$interesses = $this->interesse->get_by_id_usuario($id_usuario);
		$publicacoes = $this->publicacao->get_by_id_usuario($id_usuario);
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
		$this->load->view('admin/visualizar_perfil',array('interesses'=>$interesses,'publicacoes'=>$publicacoes,'usuario'=>$usuario,'seguidos'=>$seguidos,'gostei'=>$gostei,'seguidos_list'=>$seguidos_list)); 
	}
}