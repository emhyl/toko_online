<?php

class Dashboard extends CI_controller{

	public function index()
	{


		$idUser = $this->session->userdata('idUser');
		$jml_order = count( $this->model_pesanan->pesanan_order($idUser));

		$data['barang'] = $this->model_barang->tampil_data()->result();
		$cart = $this->model_cart->getOne($idUser);
		// var_dump($data['cart']);
		// die();
		$this->load->view('templates/header',['cart' => $cart,'order'=>$jml_order]);
		$this->load->view('index',$data);
		$this->load->view('templates/footer');
	}

	public function keranjang($cart = null)
	{
		if(!$this->session->userdata('user')){
			redirect(base_url('dashboard/login'));
		}
		
		$idUser = $this->session->userdata('idUser');
		$page = 'keranjang';
		if($cart == 'order'){
			$page = 'order';
		}elseif ($cart == 'riwayat') {
			$page = 'riwayat';
		}

		$data['barang'] = $this->model_cart->getMyCart($idUser);
		$data['user'] = $this->model_user->getWhere($idUser);
		$data['order'] = $this->model_pesanan->pesanan($idUser);
		$data['sukses'] = $this->model_pesanan->getSukses($idUser);

		$jml_order = count( $this->model_pesanan->pesanan_order($idUser));
		// var_dump($data['barang']);
		// die();

		$cart = $this->model_cart->getOne($idUser);

		$this->load->view('templates/header',['cart' => $cart,'order'=>$jml_order]);
		$this->load->view($page,$data);
		$this->load->view('templates/footer');
	}
	
	public function order()
	{
		$idUser = $this->session->userdata('idUser');
		$cart = $this->model_cart->getOne($idUser);

		if($_POST['metode_pembayaran'] == 'TRANSFER'){

			$gambar = $_FILES['gambar']['name'];
			 if ($gambar    =''){}else{
				$config ['upload_path'] = './uploads/bukti_bayar/';
				$config ['allowed_types'] = 'jpg|jpeg|png';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar')){
					echo "Gambar gagal di upload!";
				}else {
					$gambar=$this->upload->data('file_name');
				
				}
			}

		}else{
			$gambar = null;
		}
		date_default_timezone_set('Asia/Makassar');
		$waktu = date('Y-m-d'); 

		$data= [
			'id_user' => $_POST['id_user'],
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
			'no_hp' => $_POST['no_hp'],
			'tgl' => $waktu,
			'metode_bayar' => $_POST['metode_pembayaran'],
			'bukti_pembayaran' => $gambar,
			'item_buah' => $_POST['item_buah'],
			'total' => $_POST['total'],
			'status' => 'order',
			'jenis_pengiriman' => $_POST['jenis_pengiriman']
		];

		$barang = $this->model_cart->getMyCart($idUser);

		foreach($barang as $rowBarang){
			if($rowBarang['id_pesanan'] == null){
				$stok = $rowBarang['stok'] - $rowBarang['item'];
				$this->model_barang->update_stok($rowBarang['id_barang'],$stok);
				// if(!$rowBarang['stok'] >= $rowBarang['item']){
				// 	$this->session->set_flashdata('err_order','berlebihan pesanan')
				// 	redirect(base_url('index.php/dashboard/keranjang'));
				// }
			}
		}
		
		$this->model_pesanan->add($data);
		$cart = $this->model_cart->getMyCart($idUser);



		$id_pesanan = $this->model_pesanan->getNewData()->id;
		$this->model_pesanan->update($id_pesanan);

		redirect(base_url('index.php/dashboard/keranjang'));
	}

	public function hapus_keranjang($id)
	{
	
		$this->model_cart->hapus($id);
		redirect('dashboard/keranjang');
	}

	public function profil()
	{
	
		$idUser = $this->session->userdata('idUser');
		$jml_order = count( $this->model_pesanan->pesanan_order($idUser));

		$cart = $this->model_cart->getOne($idUser);
		// var_dump($data['cart']);
		// die();
		$this->load->view('templates/header',['cart' => $cart,'order'=>$jml_order]);
		$this->load->view('profil');
		$this->load->view('templates/footer');
	}

	public function pembayaran()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pembayaran');
		$this->load->view('templates/footer');
	}
	public function proses_pesanan()
	{
		$is_processed = $this->model_invoice->index();
		if($is_processed){
			$this->cart->destroy();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('proses_pesanan');
			$this->load->view('templates/footer');
		} else {
			echo "maaf, pesanan anda gagal diproses!";
		}

	}

	public function detail($id_brg)
	{
		$data['barang'] = $this->model_barang->detail_brg($id_brg);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_barang',$data);
		$this->load->view('templates/footer');
	}

	public function login()
	{
		if($this->session->userdata('user') != null){
			$this->session->sess_destroy();
			redirect(base_url().'index.php/dashboard/login');
		}
		$this->load->view('form_login');
	}

	public function registrasi($sts=null)
	{
		$this->load->view('registrasi',['sts'=>$sts]);
	}

	public function addCart($idUser = null, $idBrg = null)
	{
		if(!$this->session->userdata('user')){
			redirect(base_url('dashboard/login'));
		}

		$idUser = $this->session->userdata('idUser');
		$barang = $this->model_barang->getWHere($idBrg);
		

		$data = [
			'id_user' => $idUser,
			'id_barang' => $idBrg,
			'id_pesanan' => null
		];
		if($barang->stok >= 1 ){
			$dtChk = $this->model_cart->chk($data);
			if(!count($dtChk)>0){
				$data['id_pesanan'] = null;
				$data['item'] = 1;
				$this->model_cart->add($data);
			}else{
				$item = $dtChk[0]['item'];
				$item = $item + 1;

				$id = $dtChk[0]['id'];

				$this->model_cart->edit($item,$id);
			}
			redirect(base_url());
		}else{
			$this->session->set_flashdata('err_stok','
				<div class="alert alert-danger" role="alert">
				  Stok Habis !
				</div>
				');
			redirect(base_url());
		}
	}
}