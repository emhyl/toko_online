<?php
class Data_user extends CI_Controller{
	public function index()
	{
		$find = $this->uri->segment(2);
		if(isset($_POST['btn-cari'])){
			$key = $this->input->post('cari');
			$data['user'] = $this->model_user->like($key);

		}else{
			$data['user'] =  $this->model_user->all();
			
		}

		// $data['user'] = $this->model_user->all();

		// $dt = (array)$data["user"][0];
		// var_dump(json_encode($dt));
		// die();
		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',['order'=>$this->model_pesanan->getOrder(),'find'=>$find]);
        $this->load->view('admin/data_user', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
;
		$nama		= $this->input->post('nama');
		$username		= $this->input->post('username');
		$password       = $this->input->post('password');
		$no_hp			= $this->input->post('no_hp');
		$alamat 			= $this->input->post('alamat');
		$status 			= $this->input->post('status');
	
		

		$data = array(
			'nama'		=> $nama,
			'username'	=> $username,
			'password'		=> $password,
			'no_hp'			=> $no_hp,
			'alamat'			=> $alamat,
			'status'	    => $status
		);

		$this->model_user->tambah_user($data);
		$this->session->set_flashdata('sukses','
			<div class="alert alert-success" role="alert">
			  Data brhasil ditambahakan.!
			</div>
			');
		redirect('admin/data_user/index'); 
		
	}
	public function edit($id)
	{
		$user['user'] = $this->model_user->tampil_id($id);

		if(isset($_POST['btn-edit'])){
			$nama		= $this->input->post('nama');
			$username		= $this->input->post('username');
			$password       = $this->input->post('password');
			$no_hp			= $this->input->post('no_hp');
			$alamat 			= $this->input->post('alamat');
			$status 			= $this->input->post('status');
		
			

			$data = array(
				'nama'		=> $nama,
				'username'	=> $username,
				'password'		=> $password,
				'no_hp'			=> $no_hp,
				'alamat'			=> $alamat,
				'status'	    => $status
			);

			$this->model_user->edit($data,$id);
			$this->session->set_flashdata('sukses','
				<div class="alert alert-success" role="alert">
				  Data brhasil diubah.!
				</div>
				');
			redirect('admin/data_user/index'); 
		}
		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',['order'=>$this->model_pesanan->getOrder()]);
        $this->load->view('admin/edit_user', $user);
		$this->load->view('templates_admin/footer');
		
	}

	public function hapus ($id)
	{
	
		$this->model_user->hapus($id);
		$this->session->set_flashdata('sukses','
			<div class="alert alert-success" role="alert">
			  Data brhasil dihapus.!
			</div>
			');
		redirect('admin/data_user/index');
	}
}
