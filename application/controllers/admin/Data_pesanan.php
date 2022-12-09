<?php
class Data_pesanan extends CI_Controller{
	public function index()
	{

		$find = $this->uri->segment(2);
		if(isset($_POST['btn-cari'])){
			$key = $this->input->post('cari');
			$data['pesanan'] = $this->model_pesanan->like($key);

		}else{
			$data['pesanan'] = $this->model_pesanan->all();
			
		}


		// $data['pesanan'] = $this->model_pesanan->all();
		$data['id_user'] = $this->model_user->getUser();
		// $dt = (array)$data["pesanan"][0];
		// var_dump(json_encode($dt));
		// die();

		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',['order'=>$this->model_pesanan->getOrder(),'find'=>$find]);
        $this->load->view('admin/data_pesanan', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
		$idUser				= $this->input->post('idUser');
		$nama 				= $this->input->post('nama');
		$alamat 	    	= $this->input->post('alamat');
		$no_hp				= $this->input->post('no_hp');
		$tgl 				= $this->input->post('tgl');
		$metode_bayar 		= $this->input->post('metode_bayar');
		$total 				= $this->input->post('total');
		$status 			= $this->input->post('status');

		if($metode_bayar == 'TRANSFER'){
			$bukti_pembayaran	= $_FILES['gambar']['name'];
			 if ($bukti_pembayaran    =''){
			 	$bukti_pembayaran = 'tidak ada gambar';
			 }else{
				$config ['upload_path'] = './uploads/bukti_bayar/';
				$config ['allowed_types'] = 'jpg|jpeg|png';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar')){
					echo "Gambar gagal di upload!";
				}else {
					$bukti_pembayaran=$this->upload->data('file_name');
				
				}
			}
		}else{
			$bukti_pembayaran = null;
		}

		$data = array(
			'id_user'		=> $idUser,
			'nama'			=> $nama,
			'alamat'		=> $alamat,
			'no_hp'			=> $no_hp,
			'tgl'			=> $tgl,
			'metode_bayar'	=> $metode_bayar,
			'bukti_pembayaran'	=> $bukti_pembayaran,
			'total'			=> $total,
			'status'		=> $status
		);


		$this->model_pesanan->add($data);
		$this->session->set_flashdata('sukses','
			<div class="alert alert-success" role="alert">
			  Data brhasil ditambahakan.!
			</div>
			');
		redirect('admin/data_pesanan/index'); 
		
	}

	public function edit($id)
	{
		$data['pesanan'] = $this->model_pesanan->dataWhere($id);
		$data['id_user'] = $this->model_user->getUser();

		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',['order'=>$this->model_pesanan->getOrder()]);
        $this->load->view('admin/edit_pesanan', $data);
		$this->load->view('templates_admin/footer');
	}
	public function update($id){

		$idUser				= $this->input->post('idUser');
		$nama 				= $this->input->post('nama');
		$alamat 	    	= $this->input->post('alamat');
		$no_hp				= $this->input->post('no_hp');
		$tgl 				= $this->input->post('tgl');
		$metode_bayar 		= $this->input->post('metode_bayar');
		$total 				= $this->input->post('total');
		$status 			= $this->input->post('status');

		if($metode_bayar == 'TRANSFER'){
			$bukti_pembayaran	= $_FILES['gambar']['name'];
			 if ($bukti_pembayaran == ''){
			 	$bukti_pembayaran = $this->model_pesanan->dataWhere($id)->bukti_pembayaran;
			 }else{
				$config ['upload_path'] = './uploads/bukti_bayar/';
				$config ['allowed_types'] = 'jpg|jpeg|png';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar')){
					echo "Gambar gagal di upload!";
				}else {
					$bukti_pembayaran=$this->upload->data('file_name');
				
				}
			}
		}else{
			$bukti_pembayaran = $this->model_pesanan->dataWhere($id)->bukti_pembayaran;
		}

		$data = array(
			'id_user'		=> $idUser,
			'nama'			=> $nama,
			'alamat'		=> $alamat,
			'no_hp'			=> $no_hp,
			'tgl'			=> $tgl,
			'metode_bayar'	=> $metode_bayar,
			'bukti_pembayaran'	=> $bukti_pembayaran,
			'total'			=> $total,
			'status'		=> $status
		);

		$this->model_pesanan->update_data($id,$data);
		$this->session->set_flashdata('sukses','
			<div class="alert alert-success" role="alert">
			  Data brhasil diubah.!
			</div>
			');
		redirect('admin/data_pesanan/index');
	}

	public function hapus ($id)
	{
		
		$this->model_pesanan->hapus($id);
		$this->session->set_flashdata('sukses','
			<div class="alert alert-success" role="alert">
			  Data brhasil dihapus.!
			</div>
			');
		redirect('admin/data_pesanan/index');
	}
}
