<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
		
		$this->load->library('pagination');
		
		$this->lang->load('admin/orders');
		
		$this->load->model('admin/orders_model');

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_orders'));
        $this->data['pagetitle'] = '<h1>Orders</h1>'; //$this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Orders', 'admin/orders');
    }


	public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Get all orders */
            // $this->data['orders'] = $this->orders_model->get_all();
			
			if ($this->input->get('p')) {
				$page   = $this->input->get('p');
				$offset = ((int)$page-1)*8;
			} else {
				$page   = 1;
				$offset = 0;
			}
				
			$this->data['orders'] = $this->orders_model->get_limit_data(8, $offset);
			$total = $this->orders_model->total_rows();
			$url   = current_url() . '?p=';
			$this->data['pagination'] = $this->paging($total, $page, $url);			
			/* Load Template */
            $this->template->admin_render('admin/orders/index', $this->data);
        }
	}


	public function create()
	{
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, 'Create Orders', 'admin/orders/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

		/* Validate form input */
		// $this->form_validation->set_rules('kdbar',  'Kode barang', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			
			$order_data = array(
            
            'tglinput'  => $this->input->post('tglinput'),
			'mbrid'     => $this->input->post('mbrid'),
			'addrid'    => $this->input->post('addrid'),
			
			'total'     => $this->input->post('total'),
			'disc'      => $this->input->post('disc'),
			'discrp'    => $this->input->post('discrp'),
			
			'tax'       => $this->input->post('tax'),
			'shipcost'  => $this->input->post('shipcost'),

			'gtotal'    => $this->input->post('gtotal'),
			'payment'   => $this->input->post('payment'),
			'delivery'  => $this->input->post('delivery'),
			'note'      => $this->input->post('note'),
            );
            $this->orders_model->insert($order_data);

            redirect('admin/inventory', 'refresh');
		}
		else
		{

			$this->data['member'] = $this->member_model->get_all();
			
			if (isset($_SESSION["kdgol"])) {
				$this->data['golongan2'] = $this->golongan2_model->get_all();
				$this->data['golongan3'] = $this->golongan3_model->get_all();
			}

			$this->data['message'] = (validation_errors() ? validation_errors() : 'Input data belum benar!');

			$this->data['mbrid'] = array(
				'name'  => 'mbrid',
				'id'    => 'mbrid',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('mbrid'),
			);

            /* Load Template */
            $this->template->admin_render('admin/inventory/create', $this->data);
        }
	}


	public function delete()
	{
        /* Load Template */
		$this->template->admin_render('admin/inventory/delete', $this->data);
	}


	public function edit($id)
	{
        $id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() && ! ($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_order_edit'), 'admin/orders/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

		/* Validate form input */
		// $this->form_validation->set_rules('kdbar', 'lang:edit_user_validation_fname_label', 'required');

		if (isset($_POST) && ! empty($_POST))
		{

			if ($this->form_validation->run() == TRUE)
			{
                $order_id = $this->input->post('id');

                $order_data = array(
					'total'      => $this->input->post('total'),
					'disc'       => $this->input->post('disc'),
					'discrp'     => $this->input->post('discrp'),
					'tax'        => $this->input->post('tax'),
					'shipcost'   => $this->input->post('shipcost'),
					'gtotal'     => $this->input->post('gtotal'),

					'payment'    => $this->input->post('payment'),
					'status'     => $this->input->post('status'),
					'note'       => $this->input->post('note'),
					'delivery'   => $this->input->post('delivery'),
				);

                if($this->orders_model->update($order_id, $order_data))
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->messages());

				    if ($this->ion_auth->is_admin())
					{
						redirect('admin/orders', 'refresh');
					}
					else
					{
						redirect('admin', 'refresh');
					}
			    }
			    else
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());

				    if ($this->ion_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}
			    }
			}
		}


		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->data['total'] = array(
			'name'  => 'total',
			'id'    => 'total',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('total'),
		);


        /* Load Template */
		$this->template->admin_render('admin/orders/edit', $this->data);
	}
	
	
	public function paging($total,$curr_page,$url){
    
		$page = '';
		$total_page = ceil($total/8);
		
		if($total > 8) { // hasil bagi atau jumlah halaman lebih dari satu
		
			$page = '<ul class="pagination no-print">';
			
			if ($total_page > 9 && $curr_page > 2)
		   		$page .='<li><a href="'.$url.'1"><<</a></li>';
			if ($curr_page > 1)
				$page .='<li><a href="'.$url.($curr_page-1).'"><</a></li>';
		   
			if ($total_page < 10) {
				for($x = 1;$x <= $total_page;$x++) {
					
					$active = '';
					
					if($x == $curr_page)
						$active = 'class="active"';
					
					$page .='<li '.$active.'><a href="'.$url.$x.'">'.$x.'</a></li>';
					
				}
			}
			else
			{
				if ($curr_page > 3) {
					for($x = $curr_page-2;$x <= $curr_page-1; $x++) {
						$page .='<li><a href="'.$url.$x.'">'.$x.'</a></li>';
					}
				}
				else
				{
					for($x = 1;$x <= 2;$x++) {
						$active = '';
					
						if($x == $curr_page)
							$active = ' class="active"';
						
						$page .='<li'.$active.'><a href="'.$url.$x.'">'.$x.'</a></li>';
					}
				}

				if ($curr_page >= 3 && $total_page - $curr_page > 3)
					// $page .='<li><a href="#">'.($curr_page).' / '.$total_page.'</a></li>';
					$page .='<li class="active"><a href="#">'.($curr_page).'</a></li>';

				if ($total_page - $curr_page > 3) {
					
					if ($curr_page == 1) {
						for($x = $curr_page+2;$x <= $curr_page+3; $x++) {
							$page .='<li><a href="'.$url.$x.'">'.$x.'</a></li>';
						}
					}
					else
					{
						for($x = $curr_page+1;$x <= $curr_page+2; $x++) {
							$page .='<li><a href="'.$url.$x.'">'.$x.'</a></li>';
						}
					}
				}
			}
			if ($curr_page < $total_page)
				$page .='<li><a href="'.$url.($curr_page+1).'">></a></li>';
			if ($total_page > 9)
				$page .='<li><a href="'.$url.$total_page.'">>></a></li>';
				
			$page .='</ul>';
		}
			
		return $page;
	}
}
