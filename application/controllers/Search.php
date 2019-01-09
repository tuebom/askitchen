<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends Public_Controller {

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

		$action  = $this->input->get('action');
		
		if ($action) {
			
			$kdbar = $this->input->get('code'); // kode barang => cart

			if ($kdbar != '') {
				
				// $detail = $this->stock_model->get_by_id($kdbar);
				$this->db->select('kdbar, kdurl, nama, hjual, format(hjual,0,"id") as hjualf, gambar, pnj, lbr, tgi');
				$this->db->where('kdurl', $kdbar);
				
				$detail = $this->db->get('stock')->row();
					
				$qty = 1; //$this->input->post('qty');
				
				$itemArray = array( $kdbar => array( 'kdbar' => $detail->kdbar, 'kdurl' => $detail->kdurl,
													'nama'  => $detail->nama,
													'qty'   => $qty,
													'harga' => $detail->hjual,
													'hargaf'=> $detail->hjualf, // harga dgn pemisah ribuan
													'gambar'=> $detail->gambar,
													'pnj'   => $detail->pnj,
													'lbr'   => $detail->lbr,
													'tgi'   => $detail->tgi
												));
	
	
				if(!empty($_SESSION["cart_item"])) {
	
					if(in_array($kdbar, array_keys($_SESSION["cart_item"]))) {
	
						foreach($_SESSION["cart_item"] as $k => $v) {
								
							if($kdbar == $k) {
									
								if(empty($_SESSION["cart_item"][$k]["qty"])) {
									$_SESSION["cart_item"][$k]["qty"] = 0;
								}
								$_SESSION["cart_item"][$k]["qty"] += $qty;
							}
						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
					}
				} else {
					// data array kosong
					$_SESSION["cart_item"] = $itemArray;
				}
	
				// $_SESSION["totqty"] += $qty;
				$val = (int)$this->session->userdata('totqty') + 1;
				$this->session->set_userdata('totqty', $val);
			}
				
			// inisiasi
			$item_price = 0;
			$total_price = 0;
						
			foreach($_SESSION["cart_item"] as $k) {
				$item_price  = (float)$_SESSION["cart_item"][$k]["qty"]*$_SESSION["cart_item"][$k]["harga"];
				$total_price += $item_price;
			}
			$this->session->set_userdata('tot_price', $total_price);
			
			$url = strtok(current_url(), '?');
			header("location: ".$url);
		}
		
		$q  = $this->input->get('q');
		$b  = $this->input->get('b');
		$p1 = $this->input->get('p1');
		$p2 = $this->input->get('p2');


		if ($this->input->get('p')) {
			$page   = $this->input->get('p');
			$offset = ((int)$page-1)*8;
		} else {
			$page   = 1;
			$offset = 0;
		}
		
		$total = $this->stock_model->total_rows($q,$b,$p1,$p2);
		
		$cond = '';
		// filter pencarian
		if ($q) $cond .= 'q='.$q;

		// filter merk / brand
		if ($b) {
			if ($cond !== '') {
				$cond .= '&b='.$b;
			} else {
				$cond .= 'b='.$b;
			}
		}

		// filter harga
		if ($p1) {
			if ($cond !== '') {
				$cond .= '&p1='.$p1;
			} else {
				$cond .= 'p1='.$p1;
			}
		}
		if ($p2) {
			if ($cond !== '') {
				$cond .= '&p2='.$p2;
			} else {
				$cond .= 'p2='.$p2;
			}
		}

		$url   = current_url().'?'.$cond.'&p=';
		
		$this->data['pagination'] = $this->paging($total, $page, $url);

		$this->data['q'] = $q; //data
		$this->data['products'] = $this->stock_model->get_limit_data(8,$offset,$q,$b,$p1,$p2);

		$this->load->view('layout/header', $this->data);
		$this->load->view('search/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
	
	
	public function paging($total,$curr_page,$url){
    
		$page = '';
		$total_page = ceil($total/8);
		
		if($total > 8) { // hasil bagi atau jumlah halaman lebih dari satu
		
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
	}
}