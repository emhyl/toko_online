<?php

class Model_user extends CI_Model{

	public function add($data)
	{
		$data['status'] = 'user';
		$this->db->insert('tb_user',$data);
		
	}

	public function tambah_user($data)
	{
		$this->db->insert('tb_user',$data);
		
	}


	public function like($key){
	    $this->db->like('nama', $key,'both');
	    return $this->db->get('tb_user')->result();
	}

	public function edit($data,$id)
	{
		$this->db->update('tb_user',$data,['id'=>$id]);
		
	}

	public function getWhere($id)
	{
		// $this->db->order_by('id','desc');
		return	$this->db->get_where('tb_user',['id'=>$id])->result()[0];
		
	}

	public function getUser()
	{
		// $this->db->order_by('id','desc');
		return	$this->db->get_where('tb_user',['status'=>'user'])->result();
		
	}

	public function hapus($id)
	{
		// $this->db->order_by('id','desc');
		$this->db->delete('tb_user',['id'=>$id]);
		
	}

	public function tampil_id($id)
	{
		// $this->db->order_by('id','desc');
		return	$this->db->get_where('tb_user',['id'=>$id])->row();
		
	}

	public function all()
	{
		// $this->db->order_by('id','desc');
		return	$this->db->get('tb_user')->result();
		
	}

	public function jml()
	{
		// $this->db->order_by('id','desc');
		$data =	$this->db->get_where('tb_user',['status'=>'user'])->result();
		return count($data);
		
	}


}