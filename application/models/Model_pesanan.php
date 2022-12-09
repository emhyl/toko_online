<?php

class Model_pesanan extends CI_Model{

	public function add($data)
	{
		
		$this->db->insert('tb_pesanan',$data);
		// $this->db->update('tb_keranjang',['status'=>'order'],['status'=>'cart']);

	}
	
	public function dataWhere($id)
	{
		
		return $this->db->get_where('tb_pesanan',['id'=>$id])->row();
		// $this->db->update('tb_keranjang',['status'=>'order'],['status'=>'cart']);

	}

	public function update($id)
	{
		$this->db->update('tb_keranjang',['id_pesanan'=>$id],['id_pesanan'=>null]);
		
	}
	
	public function update_data($id,$data)
	{
		$this->db->update('tb_pesanan',$data,['id'=>$id]);
		
	}

	public function hapus($id)
	{
		$this->db->delete('tb_pesanan',['id'=>$id]);
		
	}

	public function getNewData(){
		$this->db->order_by('id','desc');
		return $this->db->get('tb_pesanan')->result()[0];
	 
	}

	public function pesanan($id){
		// $this->db->order_by('id','desc');
		return $this->db->get_where('tb_pesanan',['id_user'=>$id])->result();
	 
	}
	public function all(){
		// $this->db->order_by('id','desc');
		return $this->db->get('tb_pesanan')->result();
	 
	}

	public function pesanan_order($id){
		// $this->db->order_by('id','desc');
		return $this->db->get_where('tb_pesanan',['id_user'=>$id,'status'=>'order'])->result();
	 
	}

	public function getSukses($id){
		// $this->db->order_by('id','desc');
		return $this->db->get_where('tb_pesanan',['id_user'=>$id])->result();
	 
	}

	public function all_pesanan(){
		// $this->db->order_by('id','desc');
		return $this->db->get_where('tb_pesanan',['status'=>'order'])->result();
	 
	}

	public function all_proses(){
		// $this->db->order_by('id','desc');
		return $this->db->get_where('tb_pesanan',['status'=>'proses'])->result();
	 
	}


	public function like($key){
	    $this->db->like('nama', $key,'both');
	    return $this->db->get('tb_pesanan')->result();
	}

	public function tampil_sukses(){
		// $this->db->order_by('id','desc');
		return $this->db->get_where('tb_pesanan',['status'=>'sukses'])->result();
	 
	}

	public function getOrder(){
		// $this->db->order_by('id','desc');
		return $this->db->get_where('tb_pesanan',['status'=> 'order'])->result();
	 
	}

	public function ACC($id){
		// $this->db->order_by('id','desc');
		$this->db->update('tb_pesanan',['status' => 'proses'],['id'=> $id]);
	 
	}

	public function sukses($id){
		// $this->db->order_by('id','desc');
		$this->db->update('tb_pesanan',['status' => 'sukses'],['id'=> $id]);
	 
	}

	public function all_cart(){
	    $this->db->select('*');
	  	$this->db->from('tb_keranjang');
	  	$this->db->join('tb_barang', 'tb_barang.id_brg = tb_keranjang.id_barang');

	  	// if($where != null){
	  	  
	  	// }
	  	
	  	// $this->db->where(['id_user'=>$id]);

	  	$query = $this->db->get()->result();
	  	return $query;
	}
	
	public function all_cart_proses(){
	  	$this->db->select('*');
		$this->db->from('tb_pesanan');
		$this->db->join('tb_keranjang', 'tb_keranjang.id_pesanan = tb_pesanan.id');
		$this->db->join('tb_barang', 'tb_barang.id_brg = tb_keranjang.id_barang');

		// if($where != null){
		  
		// }

		$this->db->where(['status'=> 'proses']);

		$query = $this->db->get()->result_array();
		return $query;
	}


}