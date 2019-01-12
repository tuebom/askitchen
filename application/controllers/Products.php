<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
		
		$this->load->library('pagination');
		
		$this->load->model('golongan_model');
		$this->load->model('stock_model');
		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
        
        $kdgol = $this->uri->segment(2); // kode golongan
		
		if (strlen($kdgol) == 2) {
			$this->data['title'] = $this->golongan_model->get_by_id($kdgol)->nama;
			$this->data['kdgol'] = $kdgol;
		} else {
			$this->data['title'] = $this->golongan_model->get_by_subid($kdgol)->nama;
			$this->data['kdgol'] = substr($kdgol,0,2);
		}

		$action  = $this->input->get('action');
		
		if ($action) {

			if ($action == 'add') {
			
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
								
								// $item_price  = (float)$_SESSION["cart_item"][$k]["qty"]*$_SESSION["cart_item"][$k]["harga"];
								// $total_price += $item_price;
							}

						} else {
							$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
						}
					} else {
						// data array kosong
						$_SESSION["cart_item"] = $itemArray;
					}

					// $_SESSION["totqty"] += $qty;
					$val = (int)$this->session->userdata('totqty') + $qty;
					$this->session->set_userdata('totqty', $val);
				}
					
				// inisiasi
				$item_price = 0;
				$total_price = 0;
							
				foreach($_SESSION["cart_item"] as $k => $v) {
					$item_price  = (float)$_SESSION["cart_item"][$k]["qty"]*$_SESSION["cart_item"][$k]["harga"];
					$total_price += $item_price;
				}
				$this->session->set_userdata('tot_price', $total_price);
				
				$url = strtok(current_url(), '?');
				header("location: ".$url);
			}
			else
			{
			
				$kdbar = $this->input->get('code'); // kode barang => cart
		
				if ($kdbar != '') {
					
					// $qty = $this->input->post('qty');
					
		
					if(!empty($_SESSION["cart_item"])) {
		
						if(in_array($kdbar, array_keys($_SESSION["cart_item"]))) {
		
							foreach($_SESSION["cart_item"] as $k => $v) {
									
								if($kdbar == $k) {
										
									$val = (int)$this->session->userdata('totqty') - $_SESSION["cart_item"][$k]["qty"];
									$this->session->set_userdata('totqty', $val);
									unset($_SESSION['cart_item'][$k]);
								}
							}
						}
		
					}
			
				}
		
				// inisiasi
				$item_price = 0;
				$total_price = 0;
							
				foreach($_SESSION["cart_item"] as $k => $v) {
					$item_price  = (float)$_SESSION["cart_item"][$k]["qty"]*$_SESSION["cart_item"][$k]["harga"];
					$total_price += $item_price;
				}
				$this->session->set_userdata('tot_price', $total_price);
				
				$url = strtok(current_url(), '?');
				header("location: ".$url);
			}
		}
			
		
		if ($this->input->get('p')) {
			$page   = $this->input->get('p');
			$offset = ((int)$page-1)*8;
		} else {
			$page   = 1;
			$offset = 0;
		}
		
		$total = $this->stock_model->total_rows($kdgol);
		$url   = current_url() . '?p=';
		
		$this->data['products'] = $this->stock_model->get_by_category(8, $offset, $kdgol);
		
		$this->data['kode'] = $kdgol;
		
		$this->data['pagination'] = $this->paging($total, $page, $url);

		$this->load->view('layout/header', $this->data);
		$this->load->view('products/index', $this->data);
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
