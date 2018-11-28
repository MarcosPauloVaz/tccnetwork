<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Class Inicio
 *
 * Classe que carrega a tela de boas vindas
 *
 */
class Area_interesse extends CI_Controller
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
	}
	
	public function index()
	{
		$areas_adicionadas = $this->interesse->get_by_id_usuario($this->session->userdata('id_usuario'));
		$areas_nao_adicionadas = $this->interesse->get_areas_nao_adicionadas($this->session->userdata('id_usuario'));
		$this->load->view('admin/area_interesse', array('areas_adicionadas'=>$areas_adicionadas,'areas_nao_adicionadas'=>$areas_nao_adicionadas)); 
	}
	
	public function remover(){
		$id_interesse = $this->input->post('id_interesse');
		$id_usuario = $this->session->userdata('id_usuario');
		
		$this->interesse->remove_interesse_usuario($id_interesse,$id_usuario);
		
		echo true;
	}

	public function adicionar(){
		$id_interesse = $this->input->post('id_interesse');
		$id_usuario = $this->session->userdata('id_usuario');
		
		$this->interesse->adiciona_interesse_usuario($id_interesse,$id_usuario);
		
		echo true;
	}
	
}