<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('golongan_model');
		$this->load->model('stock_model');
		// $this->output->enable_profiler(TRUE);
	}

	
	public function index()
	{
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
        
        $kode = $this->uri->segment(2);
		
		if (strlen($kode) == 2) {
			$this->data['title'] = $this->golongan_model->get_by_id($kode)->nama;
		} else {
			$this->data['title'] = $this->golongan_model->get_by_subid($kode)->nama;
		}
		$this->data['products'] = $this->stock_model->get_by_category(12, 0, $kode);
		$this->data['price_range'] = $this->stock_model->get_price_range($kode);
		$this->data['kode'] = $kode;

        $pcfg = array(
            'base_url' => base_url(),
            'per_page' => 12,
            'total_rows' => $this->stock_model->all_data(),
            'attributes' => array('class' => 'btn btn-default'),
            'full_tag_open' => '<div class="btn-group">',
            'full_tag_close' => '</div>',
            'cur_tag_open' => '<button type="button" class="btn btn-danger">',
            'cur_tag_close' => '</button>',
            'first_link' => 'Awal',
            'last_link' => 'Akhir',
        );
        
        $this->pagination->initialize($pcfg);

		$this->load->view('layout/header', $this->data);
		$this->load->view('products/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}

	
	public function brands()
	{
		// $this->load->view('public/home', $this->data);
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
        
        $brand = $this->uri->segment(3);
		
		$this->data['products'] = $this->stock_model->get_by_brand(12, 0, $brand);

		$this->load->view('layout/header', $this->data);
		$this->load->view('products/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
