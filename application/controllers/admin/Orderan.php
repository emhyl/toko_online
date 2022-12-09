<?php

class Orderan extends CI_Controller{
	public function index()
	{
		$data['orderan'] = $this->model_pesanan->all_pesanan();
		$data['all_cart'] = $this->model_pesanan->all_cart();
		$data['proses'] = $this->model_pesanan->all_proses();
		// var_dump($data['orderan']);
		// die();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar',['order'=>$this->model_pesanan->getOrder()]);
		$this->load->view('admin/orderan',$data);
		$this->load->view('templates_admin/footer');

	}

	public function detail($id_invoice)
	{
	
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar',['order'=>$this->model_pesanan->getOrder()]);
		$this->load->view('admin/detail_invoice',$data);
		$this->load->view('templates_admin/footer');

	}

	public function setuju($id)
	{
		$this->model_pesanan->ACC($id);
		redirect(base_url('admin/orderan'));

	}

	public function selesai($id)
	{
		$this->model_pesanan->sukses($id);
		redirect(base_url('admin/orderan'));

	}
}