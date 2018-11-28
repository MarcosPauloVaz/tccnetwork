<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Class Inicio
 *
 * Classe que carrega a tela de boas vindas
 *
 */
class Pub extends CI_Controller
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
		$this->load->model('Publicacao_model','publicacao');
		$this->load->model('Areas_interesse_model','areas_interesse');
		$this->load->model('Usuario_model','usuario');
	}
	
	public function index()
	{
		/*$id_usuario = $this->session->userdata('id_usuario');
		$publicacoes = $this->publicacao->get_publicacoes_dashboard();
		$gostei_obj = $this->publicacao->get_gostar_by_usuario($id_usuario);
		$gostei = array();
		foreach ($gostei_obj as $item) {
			$gostei[] = $item->id_publicacao;
		}
		
		$top_dez = $this->publicacao->get_top_dez();
		
		$areas = $this->areas_interesse->get_areas_de_interesse_by_usuario_random($id_usuario);
		$usuarios_recomendados = $this->usuario->get_usuarios_recomendados($areas, $id_usuario);
*/
		$categorias = $this->publicacao->get_categorias();
		$fontes = $this->publicacao->get_fontes();
		$ano = $this->publicacao->get_ano();
		
		$this->load->view('admin/pub',array(/*'publicacoes'=>$publicacoes,'gostei'=>$gostei, 'top_dez'=>$top_dez,'usuarios_recomendados'=>$usuarios_recomendados,*/'categorias'=>$categorias,'fontes'=>$fontes,'ano'=>$ano)); 
	}


}