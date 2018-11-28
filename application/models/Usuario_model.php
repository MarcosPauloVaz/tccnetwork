<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
	public function salvar($dados=NULL)
	{
        if ($dados != null) 
        {            
            $this->db->insert('usuario', $dados);   
			         
            return $this->db->insert_id();                                         
        }
		return false;
    }
	
	public function inserir_interesse($id_usuario=NULL,$id_interesse=null)
	{
        if ($id_interesse != null && $id_usuario != null) 
        {
        	$dados = array('id_usuario'=>$id_usuario,
						   'id_interesse'=>$id_interesse);     
            $this->db->insert('usuario_interesse', $dados);            
            return true;                                         
        }
		return false;
    }
	
	public function get_usuario_by_condicao($condicao){
		return( $this->db->select('*')
						->from('usuario')
						->where('email = "'.$condicao['email'].'" and senha = "'.$condicao['senha'].'"')
						->get()
						->row());
	}

	public function get_by_like_nome($nome){
		return( $this->db->select('*')
						->from('usuario')
						->where('nome like "%'.$nome.'%" and id_usuario <> '.$this->session->userdata('id_usuario'))
						->get()
						->result());
	}

	public function get_by_id($id_usuario){
		return( $this->db->select('*')
						->from('usuario')
						->where('id_usuario ='.$id_usuario)
						->get()
						->row());
	}
	
	public function get_seguir_by_seguidor($id_seguidor){
		return( $this->db->select('*')
						->from('seguir')
						->join('usuario','id_seguido = id_usuario')
						->where('id_seguidor ='.$id_seguidor)
						->get()
						->result());
	}

	public function get_seguir_by_seguidor_seguido($id_seguidor, $id_seguido){
		return( $this->db->select('*')
						->from('seguir')
						->where('id_seguidor ='.$id_seguidor.' and id_seguido = '.$id_seguido)
						->get()
						->row());
	}
	
	public function seguir($dados=NULL)
	{
        if ($dados != null) 
        {            
            $this->db->insert('seguir', $dados);   
			         
            return true;                                         
        }
		return false;
    }
	
	public function deixar_seguir($dados=NULL)
	{
        if ($dados != null) 
        {   
            $this->db->delete('seguir', array('id_seguidor'=>$dados['id_seguidor'],'id_seguido'=>$dados['id_seguido']));   
			         
            return true;                                         
        }
		return false;
    }
	
	public function get_usuarios_recomendados($areas, $id_usuario)
	{
		
		$interesses = "";
		foreach ($areas as $area) {
			$interesses .= $area->id_interesse.',';
		}
		$interesses = substr($interesses,0,-1);
		//var_dump($interesses );die;
		
		$query = $this->db->select('usuario.id_usuario, usuario.nome , count(usuario_interesse.id_interesse) as interesse_comum, 
									(select data 
									 from publicacao 
									 where publicacao.id_usuario = usuario.id_usuario 
									 order by data desc
									 limit 1) as data_')
						->from('usuario')
						->join('usuario_interesse','usuario.id_usuario = usuario_interesse.id_usuario')
						->where('usuario_interesse.id_interesse in ('.$interesses.') 
								 and usuario.id_usuario <> '.$id_usuario.'
								 and usuario.id_usuario not in (select seguir.id_seguido 
																from seguir
																where seguir.id_seguidor = '.$id_usuario.')')
						->group_by('usuario.id_usuario')
						->order_by('data_ desc, interesse_comum desc')
						->limit(3)
						->get()
						->result();
		
		
		return $query;
		
	}
	
}