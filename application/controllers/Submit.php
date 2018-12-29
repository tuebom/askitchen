<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submit extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
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
		
		// $q = $this->input->post('q');
		// $b = $this->input->post('b');
		// $p1 = $this->input->post('p1');
		// $p2 = $this->input->post('p2');

        // $this->data['q'] = $q; //data
		// $this->data['products'] = $this->stock_model->get_limit_data(12,0,$q,$b,$p1,$p2);

		$this->load->view('layout/header', $this->data);
		$this->load->view('submit/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
