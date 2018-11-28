<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Class Inicio
 *
 * Classe que carrega a tela de boas vindas
 *
 */
class Editar_perfil extends CI_Controller
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
		
	}
	
	public function index()
	{
		$this->load->view('admin/editar_perfil'); 
	}
}