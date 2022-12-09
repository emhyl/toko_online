<?php
class Data_barang extends CI_Controller{
	public function index()
	{
		$find = $this->uri->segment(2);
		if(isset($_POST['btn-cari'])){
			$key = $this->input->post('cari');
			$data['barang'] = $this->model_barang->like($key);

		}else{
			$data['barang'] = $this->model_barang->tampil_data()->result();
			
		}

		// $dt = (array)$data["barang"][0];
		// var_dump(json_encode($dt));
		// die();
		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',['order'=>$this->model_pesanan->getOrder(),'find'=>$find]);
        $this->load->view('admin/data_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
		$nama_brg		= $this->input->post('nama_brg');
		$keterangan		= $this->input->post('keterangan');
		$kategori       = $this->input->post('kategori');
		$harga			= $this->input->post('harga');
		$stok 			= $this->input->post('stok');
		$gambar 		= $_FILES['gambar']['name'];
		 if ($gambar    =''){}else{
			$config ['upload_path'] = './uploads';
			$config ['allowed_types'] = 'jpg|jpeg|png';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
				echo "Gambar gagal di upload!";
			}else {
				$gambar=$this->upload->data('file_name');
			
			}
		}

		$data = array(
			'nama_brg'		=> $nama_brg,
			'keterangan'	=> $keterangan,
			'kategori'		=> $kategori,
			'harga'			=> $harga,
			'stok'			=> $stok,
			'gambar'	    => $gambar
		);

		$this->model_barang->tambah_barang($data, 'tb_barang');
		$this->session->set_flashdata('sukses','
			<div class="alert alert-success" role="alert">
			  Data brhasil ditambahakan.!
			</div>
			');
		redirect('admin/data_barang/index'); 
		
	}

	public function edit($id)
	{
		$where = array('id_brg' =>$id);
		$data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->row();

		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',['order'=>$this->model_pesanan->getOrder()]);
        $this->load->view('admin/edit_barang', $data);
		$this->load->view('templates_admin/footer');
	}
	public function update($id){

		$nama_brg 		= $this->input->post('nama_brg');
		$keterangan 	= $this->input->post('keterangan');
		$kategori 		= $this->input->post('kategori');
		$harga 			= $this->input->post('harga');
		$stok 			= $this->input->post('stok');
		$gambar 		= $_FILES['gambar']['name'];

		 if ($gambar == ""){
		 	$gambar = $this->model_barang->getWhere($id)->gambar;

		 }else{
			$config ['upload_path'] = './uploads';
			$config ['allowed_types'] = 'jpg|jpeg|png';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
				echo "Gambar gagal di upload!";
			}else {
				$gambar=$this->upload->data('file_name');
			
			}
		}

		$data = array(

        'nama_brg'		=> $nama_brg,
        'keterangan'	=> $keterangan,
        'kategori'		=> $kategori,
        'harga'			=> $harga,
        'stok'			=> $stok,
        'gambar'		=> $gambar
		);

		$where = array(
		    'id_brg'	=> $id
		);

		$this->model_barang->update_data($where,$data, 'tb_barang');
		$this->session->set_flashdata('sukses','
			<div class="alert alert-success" role="alert">
			  Data brhasil diubah.!
			</div>
			');
		redirect('admin/data_barang/index');
	}

	public function hapus ($id)
	{
		$where = array('id_brg' => $id);
		$this->model_barang->hapus_data($where, 'tb_barang');
		$this->session->set_flashdata('sukses','
			<div class="alert alert-success" role="alert">
			  Data brhasil dihapus.!
			</div>
			');
		redirect('admin/data_barang/index');
	}
}
