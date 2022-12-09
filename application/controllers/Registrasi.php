<?php

class Registrasi extends CI_Controller{

	public function index()
	{	
		
		if($this->model_auth->cek_username($_POST['username'])){
			$this->session->set_flashdata('err_registrasi','
				<div class="alert alert-danger" role="alert">
				  Username telah digunakan, silahkan masukkan username yang lain.!
				</div>
				');
			redirect(base_url().'index.php/dashboard/registrasi');	
			die();		
		}else{
			$this->model_user->add($_POST);
			$this->session->set_flashdata('err_registrasi','
				<div class="alert alert-success" role="alert">
				  anda berhasil registrasi.!
				</div>
				');
			redirect(base_url().'index.php/dashboard/registrasi/sukses');
		}

	}
}