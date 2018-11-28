<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipo_servico_model extends CI_Model
{

	public function get_all_json()
	{
		$this->load->library('Datatables');
	
        $this->datatables->select('nome,id_tipo_servico')->from('tipo_servico');
		
		return $this->datatables->generate();
	}
	
	public function get_all()
	{
        return $this->db->select('*')->from('tipo_servico')->order_by('nome')->get()->result();
	}
	
	public function salvar($dados=NULL)
	{
        if ($dados != null) 
        {            
            $this -> db -> insert('tipo_servico', $dados);            
            return true;                                         
        }
		return false;
    }
	
	public function update($dados=null, $id_tipo_servico=null)
    {
        if($dados != null and $id_tipo_servico != null)
        {
			$this->db->update('tipo_servico', $dados, 'id_tipo_servico ='.$id_tipo_servico);         
            return true;            
        }        
		return false;
    } 
	
	public function excluir($id_tipo_servico = null)
	{					
		if ($id_tipo_servico != null)
		{			
			$this->db->delete('tipo_servico', array('id_tipo_servico' => $id_tipo_servico));
			
			return TRUE;
		}		
		return FALSE;
		 
	}
	
}