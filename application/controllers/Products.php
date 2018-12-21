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
		
		if ($this->input->get('page')) {
			// $page   = $this->input->get('page');
			$page   = $this->uri->segment(3);
			$offset = ((int)$page-1)*12;
		} else {
			$page   = 1;
			$offset = 0;
		}
		
		if (strlen($kode) == 2) {
			$this->data['title'] = $this->golongan_model->get_by_id($kode)->nama;
			$this->data['kdgol'] = $kode;
		} else {
			$this->data['title'] = $this->golongan_model->get_by_subid($kode)->nama;
			$this->data['kdgol'] = substr($kode,0,2);
		}
		
		$this->data['products'] = $this->stock_model->get_by_category(12, $offset, $kode);
		$this->data['price_range'] = $this->stock_model->get_price_range($kode);
		$this->data['kode'] = $kode;

        // $pcfg = array(
        //     'base_url' => current_url(),
        //     'per_page' => 12,
		// 	'total_rows' => $this->stock_model->total_rows($kode),
		// 	'uri_segment' => 3,
        //     'attributes' => array('class' => 'btn btn-default'),
        //     'full_tag_open' => '<div class="btn-group">',
        //     'full_tag_close' => '</div>',
        //     'cur_tag_open' => '<button type="button" class="btn btn-primary">',
        //     'cur_tag_close' => '</button>',
        //     'first_link' => 'Awal',
        //     'last_link' => 'Akhir',
        // );
             
		$config['base_url'] = base_url() . 'paging/index'; //current_url();
		$config['total_rows'] = $this->stock_model->total_rows($kode);
		$config['per_page'] = 12; //$limit_per_page;
		$config['uri_segment'] = 3;
	    $config['attributes'] = array('class' => 'btn btn-default');
        $config['full_tag_open'] = '<div class="btn-group">';
        $config['full_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<button type="button" class="btn btn-primary">';
        $config['cur_tag_close'] = '</button>';

		$this->pagination->initialize($config);
		
		// $total = $this->stock_model->total_rows($kode);
		// $url   = current_url();

        // $this->data['pagination'] = $this->paging($total, $page, $url);

		$this->load->view('layout/header', $this->data);
		$this->load->view('products/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
	
	
	public function paging($total,$curr_page,$url){
    
		$page = '';
		$total_page = ceil($total/12);
		   
		if($total > 12) {
		
		   $page = '<ul class="pagination no-print">';
			
		   if($curr_page > 1)
				 $page +='<li><a href="'+$url+($curr_page-1)+'">Prev</a></li>';
		   
		   for($x = 1;$x <= $total_page;$x++){
				
				$active = '';
				
				if($x == $curr_page)
					$active = 'class="active"';
				  
				$page +='<li '+$active+'><a href="'+$url+$x+'">'+$x+'</a></li>';
				
			}
			if($curr_page < $total_page)
				$page +='<li><a href="'+$url+($curr_page+1)+'">Next</a></li>';
			
			$page +='</ul>';
		}
			
		return $page;
	}
}
