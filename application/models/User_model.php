<?php
class User_model extends ci_model{
	function get_all(){
		$this->db->join('grup','grup.id_grup=user.id_grup','LEFT');
		$query=$this->db->get('user');
		return $query;
	}
	function get_byid($id_user){
		$query=$this->db->get_where('user',array('id_user'=>$id_user));
		if($query)return $query;
		return false;
	}
	function tambah($data){
		$query=$this->db->insert('user',$data);
		if($query)return $query;
		return false;
	}
	function ubah($id,$data){
		$query=$this->db->update('user',$data,array('id_user'=>$id));
		if($query)return $query;
		return false;
	}
	function hapus($id_user){
		$query=$this->db->delete('user',array('id_user'=>$id_user));
		if($query)return $query;
		return false;
	}
	function getprofil()
	{
		$query=$this->db->get_where('user',array('id_user'=>$this->session->userdata('id_user')));
		if($query)return $query;
		return false;
	}
}