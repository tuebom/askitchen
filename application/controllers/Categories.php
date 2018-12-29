<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
		// $this->load->library('pagination');
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
			$this->data['kdgol'] = $kode;
		} else {
			$this->data['title'] = $this->golongan_model->get_by_subid($kode)->nama;
			$this->data['kdgol'] = substr($kode,0,2);
		}

		/*if ($this->input->get('p')) {
			$page   = $this->input->get('p');
			$offset = ((int)$page-1)*8;
		} else {
			$page   = 1;
			$offset = 0;
		}
		
		$total = $this->stock_model->total_rows($kode);
		$url   = current_url() . '?p=';*/
		
		// $this->data['categories'] = $this->golongan_model->get_sample($item->kdgol);
		
		$this->data['kode'] = $kode;
		
		// $this->data['pagination'] = $this->paging($total, $page, $url);

		$this->load->view('layout/header', $this->data);
		$this->load->view('categories/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
	
	
	/*public function paging($total,$curr_page,$url){
    
		$page = '';
		$total_page = ceil($total/12);
		
		if($total > 12) { // hasil bagi atau jumlah halaman lebih dari satu
		
		   $page = '<ul class="pagination no-print">';
			
		   if($curr_page > 1)
				 $page .='<li><a href="'.$url.($curr_page-1).'">Prev</a></li>';
		   
		   for($x = 1;$x <= $total_page;$x++){
				
				$active = '';
				
				if($x == $curr_page)
					$active = 'class="active"';
				  
				$page .='<li '.$active.'><a href="'.$url.$x.'">'.$x.'</a></li>';
				
			}
			if($curr_page < $total_page)
				$page .='<li><a href="'.$url.($curr_page+1).'">Next</a></li>';
			
			$page .='</ul>';
		}
			
		return $page;
	}*/
}
