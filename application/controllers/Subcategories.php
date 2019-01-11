<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategories extends Public_Controller {

    public function __construct()
    {
		parent::__construct();

		$this->load->model('golongan_model');
		$this->load->model('golongan2_model');
		$this->load->model('stock_model');
		// $this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
        
        $kode = $this->uri->segment(3);
		
		// if (strlen($kode) == 2) {
			$this->data['title']  = $this->golongan2_model->get_by_id($kode)->nama;
			$this->data['kdgol']  = substr($kode,0,2);
			$this->data['kdgol2'] = $kode;
		// } else {
		// 	$this->data['title'] = $this->golongan2_model->get_by_subid($kode)->nama;
		// 	$this->data['kdgol'] = substr($kode,0,2);
		// }

		$this->data['item_'.$kode] = $this->golongan2_model->get_sub_category($kode);
		$this->data['kode'] = $kode;
		
		$this->load->view('layout/header', $this->data);
		$this->load->view('subcategories/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
