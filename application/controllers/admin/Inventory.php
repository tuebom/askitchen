<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
		
		$this->load->library('pagination');
		
		$this->lang->load('admin/inventory');
		
		$this->load->model('inventory_model');
		$this->load->model('golongan_model');
		$this->load->model('golongan2_model');
		$this->load->model('golongan3_model');

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_inventory'));
        $this->data['pagetitle'] = '<h1>Inventory</h1>'; //$this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Inventory', 'admin/inventory');
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

            /* Get all users */
            $this->data['inventory'] = $this->inventory_model->get_all();
			
			if ($this->input->get('p')) {
				$page   = $this->input->get('p');
				$offset = ((int)$page-1)*8;
			} else {
				$page   = 1;
				$offset = 0;
			}
				
			$this->data['inventory'] = $this->inventory_model->get_by_category(8, $offset, $kode);
			$total = $this->inventory_model->total_rows($kode);
			$url   = current_url() . '?p=';
			$this->data['pagination'] = $this->paging($total, $page, $url);			
			/* Load Template */
            $this->template->admin_render('admin/inventory/index', $this->data);
        }
	}


	public function create()
	{
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, 'Create Inventory', 'admin/inventory/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Variables */
		// $tables = $this->config->item('tables', 'ion_auth');

		/* Validate form input */
		$this->form_validation->set_rules('kdbar',  'Kode barang', 'required');
		$this->form_validation->set_rules('kdurl',  'Kode url', 'required');
		$this->form_validation->set_rules('nama',   'Nama barang', 'required');

		$this->form_validation->set_rules('kdgol',  'Golongan', 'required');
		$this->form_validation->set_rules('kdgol2', 'Golongan 2', 'required');
		$this->form_validation->set_rules('kdgol3', 'Golongan 3', 'required');

		$this->form_validation->set_rules('satuan', 'Satuan', 'required');
		$this->form_validation->set_rules('merk',   'Merk', 'required');

		$this->form_validation->set_rules('pnj',    'Panjang', 'required');
		$this->form_validation->set_rules('lbr',    'Lebar', 'required');
		$this->form_validation->set_rules('tgi',    'Tinggi', 'required');
		$this->form_validation->set_rules('gambar', 'Gambar', 'required');
		$this->form_validation->set_rules('hjual',  'Harga jual', 'required');
		// $this->form_validation->set_rules('disc',   'Diskon', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			
			$detail_data = array(
			'kdbar'  => $this->input->post('kdbar'),
			'kdurl'  => $this->input->post('kdurl'),
			'nama'   => $this->input->post('nama'),
			
			'kdgol'  => $this->input->post('kdgol'),
			'kdgol2' => $this->input->post('kdgol2'),
			'kdgol3' => $this->input->post('kdgol3'),
			
			'satuan' => $this->input->post('satuan'),
			'merk'   => $this->input->post('merk'),

			'pnj'    => $this->input->post('pnj'),
			'lbr'    => $this->input->post('lbr'),
			'tgi'    => $this->input->post('tgi'),
			'gambar' => $this->input->post('gambar'),
			'hjual'  => $this->input->post('hjual'),
			// 'disc'   => $this->input->post('disc'),
			);
		}

		if ($this->form_validation->run() == TRUE && $this->inventory_model->insert($username, $password, $email, $additional_data))
		{
            $this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/inventory', 'refresh');
		}
		else
		{

			$this->data['golongan'] = $this->golongan_model->get_all();
			
			if (isset($_SESSION["kdgol"])) {
				$this->data['golongan2'] = $this->golongan2_model->get_all();
				$this->data['golongan3'] = $this->golongan3_model->get_all();
			}

			$this->data['brands'] = $this->inventory_model->all_brands();

			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['kdbar'] = array(
				'name'  => 'kdbar',
				'id'    => 'kdbar',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('kdbar'),
			);
			$this->data['kdurl'] = array(
				'name'  => 'kdurl',
				'id'    => 'kdurl',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('kdurl'),
			);
			$this->data['nama'] = array(
				'name'  => 'nama',
				'id'    => 'nama',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('nama'),
			);
			$this->data['satuan'] = array(
				'name'  => 'satuan',
				'id'    => 'satuan',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('satuan'),
			);
			$this->data['merk'] = array(
				'name'  => 'merk',
				'id'    => 'merk',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('merk'),
			);
			$this->data['pnj'] = array(
				'name'  => 'pnj',
				'id'    => 'pnj',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('pnj'),
			);
			$this->data['lbr'] = array(
				'name'  => 'lbr',
				'id'    => 'lbr',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('lbr'),
			);
			$this->data['tgi'] = array(
				'name'  => 'tgi',
				'id'    => 'tgi',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('tgi'),
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
        $this->breadcrumbs->unshift(2, lang('menu_inventory_edit'), 'admin/inventory/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

		/* Validate form input */
		$this->form_validation->set_rules('kdbar', 'lang:edit_user_validation_fname_label', 'required');
		$this->form_validation->set_rules('kdurl', 'lang:edit_user_validation_lname_label', 'required');
		$this->form_validation->set_rules('nama', 'lang:edit_user_validation_phone_label', 'required');
		$this->form_validation->set_rules('satuan', 'lang:edit_user_validation_company_label', 'required');

		if (isset($_POST) && ! empty($_POST))
		{

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
					'kdurl'      => $this->input->post('kdurl'),
					'nama'       => $this->input->post('nama'),

					'kdgol'      => $this->input->post('kdgol'),
					'kdgol2'     => $this->input->post('kdgol2'),
					'kdgol3'     => $this->input->post('kdgol3'),

					'satuan'     => $this->input->post('satuan'),
					'merk'       => $this->input->post('merk'),
					'pnj'        => $this->input->post('pnj'),
					'lbr'        => $this->input->post('lbr'),
					'tgi'        => $this->input->post('tgi'),

					'gambar'     => $this->input->post('gambar'),
					'listrik'    => $this->input->post('listrik'),
					'kapasitas'  => $this->input->post('kapasitas'),
					'gas'        => $this->input->post('gas'),
					'berat'      => $this->input->post('berat'),
					
					'tag'        => $this->input->post('tag'),
					'hjual'      => $this->input->post('hjual'),
				);

                if($this->inventory_model->update($user->id, $data))
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->messages());

				    if ($this->ion_auth->is_admin())
					{
						redirect('admin/inventory', 'refresh');
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

		$this->data['kdbar'] = array(
			'name'  => 'kdbar',
			'id'    => 'kdbar',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('kdbar'),
		);
		$this->data['kdurl'] = array(
			'name'  => 'kdurl',
			'id'    => 'kdurl',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('kdurl'),
		);
		$this->data['nama'] = array(
			'name'  => 'nama',
			'id'    => 'nama',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('nama'),
		);
		$this->data['satuan'] = array(
			'name'  => 'satuan',
			'id'    => 'satuan',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('satuan'),
		);
		$this->data['merk'] = array(
			'name'  => 'merk',
			'id'    => 'merk',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('merk'),
		);
		$this->data['pnj'] = array(
			'name'  => 'pnj',
			'id'    => 'pnj',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('pnj'),
		);
		$this->data['lbr'] = array(
			'name'  => 'lbr',
			'id'    => 'lbr',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('lbr'),
		);
		$this->data['tgi'] = array(
			'name'  => 'tgi',
			'id'    => 'tgi',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('tgi'),
		);


        /* Load Template */
		$this->template->admin_render('admin/users/edit', $this->data);
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

	public function level2()
	{
		$groupid = $this->uri->segment(3);
		// $groupid = $this->input->post("id");
		$data = $this->golongan_model->get_sub_category($groupid);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
				'data' => $data
		)));
	}

	public function level3()
	{
		$groupid = $this->uri->segment(3);
		// $groupid = $this->input->post("id");
		$data = $this->golongan2_model->get_sub_category($groupid);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
				'data' => $data
		)));
	}
}
