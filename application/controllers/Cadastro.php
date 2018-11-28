<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cadastro extends CI_Controller
{
    
    public function __construct(){
        parent:: __construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library(array('form_validation'));
		$this->load->helper(array('array'));
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Areas_interesse_model','area_interesse')    ;   
        
    }
    
    public function index()
    {
        $interesses = $this->area_interesse->get_all(); 
		$options = array();
		foreach ($interesses as $interesse) {
			$options[$interesse->id_interesse] = $interesse->descricao;
		}
        $this->load->view('cadastro',array('interesses' => $options));  
    }
	
	
}