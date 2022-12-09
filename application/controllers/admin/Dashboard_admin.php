<?php

class Dashboard_admin extends CI_Controller{

	public function index ()
	{

		
		if(!$this->session->userdata('admin')){
			redirect(base_url('dashboard/login'));
		}
		$total = 0;

		$data['barang'] = $this->model_barang->tampil_data()->result();
		$data['sukses'] = $this->model_pesanan->tampil_sukses();
		$data['jml_order'] = $this->model_pesanan->getOrder();
		$data['jml'] = count($data['barang']);
		$data['jml_user'] = $this->model_user->jml();

		foreach ($data['sukses'] as $row) {
			$total = $total + $row->total;
		}

		$data['total'] = $total;
	
        $this->load->view('templates_admin/header',['order' => $data['jml_order']]);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard',$data);
		$this->load->view('templates_admin/footer');
	}

	public function report() {
		$total = 0;
		$sukses = $this->model_pesanan->tampil_sukses();
		foreach ($sukses as $row) {
			$total = $total + $row->total;
		}

        $data['data'] = $this->model_pesanan->tampil_sukses();
        $data['total'] = $total;

		// $this->load->view('view_laporan',$data);


        $this->load->library('lib');
        $this->lib->setPaper('A4', 'potrait');
        $this->lib->filename = 'laporan.pdf';
        $this->lib->load('view_laporan', $data);
   }
}