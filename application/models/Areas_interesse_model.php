<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Areas_interesse_model extends CI_Model
{
	public function get_by_id_usuario($id_usuario){
		return( $this->db->select('*')
						->from('interesse')
						->join('usuario_interesse','interesse.id_interesse = usuario_interesse.id_interesse')
						->join('usuario','usuario.id_usuario = usuario_interesse.id_usuario')
						->where('usuario_interesse.id_usuario = '.$id_usuario)
						->get()
						->result());
	}
	
	public function get_areas_nao_adicionadas($id_usuario)
	{
		return( $this->db->select('interesse.*')
						->from('interesse')
						->where('interesse.id_interesse not in (SELECT interesse.id_interesse
									FROM interesse
									left JOIN usuario_interesse ON interesse.id_interesse = usuario_interesse.id_interesse
									left JOIN usuario ON usuario.id_usuario = usuario_interesse.id_usuario
									WHERE usuario_interesse.id_usuario='.$id_usuario.')')
						->get()
						->result());
	}
	
	public function get_all()
	{
		return( $this->db->select('interesse.*')
						->from('interesse')
						->get()
						->result());
	}
	
	public function remove_interesse_usuario($id_interesse,$id_usuario){
		$this->db->delete('usuario_interesse', array('id_usuario' => $id_usuario, 
													  'id_interesse' => $id_interesse));
	}

	public function adiciona_interesse_usuario($id_interesse,$id_usuario){
		$this->db->insert('usuario_interesse', array('id_usuario' => $id_usuario, 
													  'id_interesse' => $id_interesse));
	}
	
	public function get_areas_de_interesse_by_usuario_random($id_usuario)
	{
		return( $this->db->select('usuario_interesse.id_interesse')
						->from('usuario_interesse')
						->where(array('id_usuario' => $id_usuario))
						->order_by('RAND()')
						->limit(5)
						->get()
						->result());
	}
	
	/*
	
	
	public function get_all()
	{
        return $this->db->select('*')->from('usuario')->get()->result();
	}
	
	
	
	public function update($dados=null, $id_usuario=null)
    {
        if($dados != null and $id_usuario != null)
        {
			$this->db->update('usuario', $dados, 'id_usuario ='.$id_usuario);         
            return true;            
        }        
		return false;
    } 
	
	public function excluir($id_usuario = null)
	{					
		if ($id_usuario != null)
		{			
			$this->db->delete('usuario', array('id_usuario' => $id_usuario));
			
			return TRUE;
		}		
		return FALSE;
		 
	}*/
	
}