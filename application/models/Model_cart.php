<?php

class Model_cart extends CI_Model{

	public function add($data)
	{
		$this->db->insert('tb_keranjang',$data);
	}

	public function edit($item,$id)
	{
		$this->db->update('tb_keranjang',['item'=>$item],['id'=>$id]);
		
	}
	public function update($data,$id)
	{
		$this->db->update('tb_keranjang',$data,['id'=>$id]);
		
	}

	public function hapus($id)
	{
		$this->db->delete('tb_keranjang',['id'=>$id]);
		
	}

	public function getOne($id){
	    $data = $this->db->get_where('tb_keranjang',['id_user'=>$id, 'id_pesanan'=>null])->result_array();
	    return count($data);
	}
	public function tampil_id($id){
	    $data = $this->db->get_where('tb_keranjang',['id'=>$id])->row();
	    return $data;
	}


	public function all(){
	    $data = $this->db->get('tb_keranjang')->result();
	    return $data;
	}



	public function chk($data){
	    $data = $this->db->get_where('tb_keranjang',$data)->result_array();
	    return $data;
	}

	public function getMyCart($id){
	  	$this->db->select('*');
		$this->db->from('tb_keranjang');
		$this->db->join('tb_barang', 'tb_barang.id_brg = tb_keranjang.id_barang');

		// if($where != null){
		  
		// }

		$this->db->where(['id_user'=>$id]);

		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getOrderan($id){
	  	$this->db->select('*');
		$this->db->from('tb_keranjang');
		$this->db->join('tb_barang', 'tb_barang.id_brg = tb_keranjang.id_barang');

		// if($where != null){
		  
		// }

		$this->db->where(['id_user'=>$id, 'status' => 'order']);

		$query = $this->db->get()->result_array();
		return $query;
	}


}