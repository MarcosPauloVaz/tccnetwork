<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publicacao_model extends CI_Model
{
	public function get_by_id($id_publicacao){
		return( $this->db->select('*')
						->from('publicacao')
						->join('usuario','usuario.id_usuario = publicacao.id_usuario')
						->where('publicacao.id_publicacao = '.$id_publicacao)
						->get()
						->row());
	}
	
	public function get_by_id_usuario($id_usuario){
		return( $this->db->select('*')
						->from('publicacao')
						->join('usuario','usuario.id_usuario = publicacao.id_usuario')
						->where('publicacao.id_usuario = '.$id_usuario)
						->order_by('publicacao.data desc, publicacao.hora desc')
						->get()
						->result());
	}
	
	public function salvar($dados=null)
    {
        if($dados != null)
        {
			$this->db->insert('publicacao', $dados);         
            return true;            
        }        
		return false;
    } 
	
	public function get_publicacoes_dashboard()
	{
		return( $this->db->select('*')
						->from('publicacao')
						->order_by('publicacao.data desc, publicacao.hora desc')
						->get()
						->result());
	}

	public function get_publicacoes_favoritas()
	{
		$id_usuario = $this->session->userdata('id_usuario');
		return( $this->db->select('*')
						->from('publicacao')
						->join('gostar','gostar.id_publicacao = publicacao.id_publicacao and gostar.id_usuario = '.$id_usuario)
						->order_by('publicacao.data desc, publicacao.hora desc')
						->get()
						->result());
	}
	
	public function get_publicacoes_filtro($filtro)
	{
		$where = '1 = 1 ';

		if($filtro['titulo'] != ''){
			$where .= 'and titulo like "%'.$filtro['titulo'].'%"';
		}
		if($filtro['categoria'] != ''){
			$where .= 'and categoria like "%'.$filtro['categoria'].'%"';
		}
		if($filtro['autor'] != ''){
			$where .= 'and autor like "%'.$filtro['autor'].'%"';
		}
		if($filtro['orientador'] != ''){
			$where .= 'and orientador like "%'.$filtro['orientador'].'%"';
		}
		if($filtro['fonte'] != ''){
			$where .= 'and fonte like "%'.$filtro['fonte'].'%"';
		}
		if($filtro['de'] != ''){
			$where .= 'and ano >= "'.$filtro['de'].'"';
		}
		if($filtro['ate'] != ''){
			$where .= 'and ano <= "'.$filtro['ate'].'"';
		}
		if($filtro['palavras_chave'] != ''){
			$where .= 'and palavras_chave like "%'.$filtro['palavras_chave'].'%"';
		}

		return( $this->db->select('*')
						->from('publicacao')
						->where($where)
						->order_by('publicacao.data desc, publicacao.hora desc')
						->get()
						->result());
	}

	public function get_gostar_by_usuario_publicacao($id_usuario, $id_publicacao){
		return( $this->db->select('*')
						->from('gostar')
						->where('id_usuario ='.$id_usuario.' and id_publicacao = '.$id_publicacao)
						->get()
						->row());
	}
	
	public function get_gostar_by_usuario($id_usuario){
		return( $this->db->select('*')
						->from('gostar')
						->where('id_usuario ='.$id_usuario)
						->get()
						->result());
	}
	
	public function gostar($dados=NULL)
	{
        if ($dados != null) 
        {            
            $this->db->insert('gostar', $dados);   
			         
            return true;                                         
        }
		return false;
    }
	
	public function deixar_gostar($dados=NULL)
	{
        if ($dados != null) 
        {   
            $this->db->delete('gostar', array('id_usuario'=>$dados['id_usuario'],'id_publicacao'=>$dados['id_publicacao']));   
			         
            return true;                                         
        }
		return false;
    }
	
	public function get_top_dez(){
		$lista_publicacao = $this->db->select('count(gostar.id_publicacao) as qtd_gostei, publicacao.id_publicacao , publicacao.titulo, publicacao.id_usuario')
				 ->from('gostar')
				 ->join('publicacao','publicacao.id_publicacao = gostar.id_publicacao','right')
				 ->where('publicacao.data = date(NOW())')
				 ->group_by('publicacao.id_publicacao')
				 ->order_by('qtd_gostei','desc')
				 ->limit(10)
				 ->get()
				 ->result();

		foreach ($lista_publicacao as $publicacao) {
			$publicacao->seguido = $this->publicacao_de_seguido($publicacao->id_usuario);
		}
		
		return $lista_publicacao;
	}
	
	public function publicacao_de_seguido($id_seguido){
		$query = $this->db->select('seguir.id_seguido')
				 ->from('seguir')
				 ->where('seguir.id_seguidor = '.$this->session->userdata('id_usuario').' and seguir.id_seguido = '.$id_seguido)
				 ->get()
				 ->row();
				 
		if(count($query) > 0){
			return true;
		}else{
			return false;
		}
	}

	public function get_categorias(){
		return( $this->db->select('distinct(categoria)')
						->from('publicacao')
						
						->get()
						->result());
	}

	public function get_fontes(){
		return( $this->db->select('distinct(fonte)')
						->from('publicacao')
						
						->get()
						->result());
	}

	public function get_ano(){
		return( $this->db->select('distinct(ano)')
						->from('publicacao')
						->order_by('ano')
						->get()
						->result());
	}
	
}