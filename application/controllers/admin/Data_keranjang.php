<?php
class Data_keranjang extends CI_Controller{
	public function index()
	{
		$find = $this->uri->segment(2);
		if(isset($_POST['btn-cari'])){
			$key = $this->input->post('cari');
			$data['cart'] = $this->model_barang->like($key);

		}else{
			$data['cart'] = $this->model_barang->tampil_data()->result();
			
		}


		// $data['cart'] = $this->model_cart->all();
	
		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',['order'=>$this->model_pesanan->getOrder(),'find'=>$find]]);
        $this->load->view('admin/data_keranjang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
;
		$id_user		= $this->input->post('id_user');
		$id_barang		= $this->input->post('id_barang');
		$id_pesanan       = $this->input->post('id_pesanan');
		$item			= $this->input->post('item');
		
		

		$data = array(
			'id_user'		=> $id_user,
			'id_barang'		=> $id_barang,
			'id_pesanan'	=> $id_pesanan,
			'item'			=> $item
		);

		$this->model_cart->add($data);
		$this->session->set_flashdata('sukses','
			<div class="alert alert-success" role="alert">
			  Data brhasil ditambahakan.!
			</div>
			');
		redirect('admin/data_keranjang/index'); 
		
	}
	public function edit($id)
	{
		$user['cart'] = $this->model_cart->tampil_id($id);


		if(isset($_POST['btn-edit'])){
			$id_user		= $this->input->post('id_user');
			$id_barang	= $this->input->post('id_barang');
			$id_pesanan   = $this->input->post('id_pesanan');
			$item		= $this->input->post('item');

			

			$data = array(
				'id_user'		=> $id_user,
				'id_barang'	=> $id_barang,
				'id_pesanan'		=> $id_pesanan,
				'item'			=> $item
			);
			
			$this->model_cart->update($data,$id);
			$this->session->set_flashdata('sukses','
			<div class="alert alert-success" role="alert">
			  Data brhasil diubah.!
			</div>
			');
			redirect('admin/data_keranjang/index'); 
		}
		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',['order'=>$this->model_pesanan->getOrder()]);
        $this->load->view('admin/edit_keranjang', $user);
		$this->load->view('templates_admin/footer');
		
	}

	public function hapus ($id)
	{
	
		$this->model_cart->hapus($id);
		$this->session->set_flashdata('sukses','
			<div class="alert alert-success" role="alert">
			  Data brhasil dihapus.!
			</div>
			');
		redirect('admin/data_keranjang/index');
	}
}
