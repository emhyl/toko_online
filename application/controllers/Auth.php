<?php

class Auth extends CI_Controller {

	public function login()
	{
	
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$auth = $this->model_auth->cek_login();

		if($auth != FALSE){
			switch ($auth->status) {
				case 'admin':
					$this->session->set_userdata('admin',true);
					redirect(base_url('admin/dashboard_admin'));
					break;
				
				default:
					$this->session->set_userdata('user',$auth->nama);
					$this->session->set_userdata('idUser',$auth->id);
					redirect(base_url());
					break;
			}
		
		}else{
			$this->session->set_flashdata('err_login','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Username atau Passwod Anda Salah!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>
				');
			redirect(base_url('index.php/dashboard/login'));
			
		}

		die();

		// $this->form_validation->set_rules('username', 'Username', 'required',['required' => 'username wajib diisi!']);
		// $this->form_validation->set_rules('password', 'Password', 'required',['required' => 'password wajib diisi!']);
		// if($this->form_validation->run() == FALSE)
		// {
		// 	$this->load->view('templates/header');
		// 	$this->load->view('form_login');
		// 	$this->load->view('templates/footer');
		// }else{
		// 	$auth = $this->model_auth->cek_login();

		// 	if($auth == FALSE)
		// 	{
		// 		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		// 			Username atau Passwod Anda Salah!
		// 			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		// 			    <span aria-hidden="true">&times;</span>
		// 			  </button>
		// 			</div>');
		// 		redirect('auth/login');
		// 	}else {
		// 		$this->session->set_userdata('username',$auth->username);
		// 		$this->session->set_userdata('role_id',$auth->role_id);

		// 		switch($auth->role_id){
		// 			case 1 : 	redirect('admin/dashboard_admin');
		// 						break;
		// 			case 2 :	redirect('dashboard');
		// 						break;
		// 			default: break;
		// 		}
		// 	}
		// }

	}

} 