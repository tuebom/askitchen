<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategories2 extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->lang->load('admin/subcategory');
		$this->load->model('golongan2_model');
		$this->load->model('golongan3_model');

        /* Title Page :: Common */
        // $this->page_title->push(lang('menu_categories'));
        $this->data['pagetitle'] = '<h1>Sub Categories 2</h1>'; //$this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_sub_categories2'), 'admin/subcategories2');
        // $this->output->enable_profiler(TRUE);
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

            $catid = $this->uri->segment(3);
            $this->data['subcategories']  = $this->golongan2_model->get_sub_category($catid);
            $this->session->set_userdata('kdgol2', $catid);

            /* Load Template */
            $this->template->admin_render('admin/subcategories2/index', $this->data);
        }
    }


	public function detail()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $catid = $this->uri->segment(4);
            $this->data['subcategories']  = $this->golongan2_model->get_sub_category($catid);
            $this->session->set_userdata('kdgol2', $catid);

            /* Load Template */
            $this->template->admin_render('admin/subcategories2/index', $this->data);
        }
    }


	public function create()
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('subcategory_create'), 'admin/subcategories2/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $total = (int)$this->golongan2_model->total_sub_category($_SESSION['kdgol2']) + 1;
        $newcode = $total < 10 ? str_pad($total, 2, '0', STR_PAD_LEFT) : $total;
        $newcode = $_SESSION['kdgol2'].'.'. $newcode;
        $this->session->set_flashdata('newcode', $newcode);

		/* Validate form input */
		$this->form_validation->set_rules('nama', 'Sub Category Name', 'required');

		if ($this->form_validation->run() == TRUE)
		{
            $category_data = array(
                'kdgol'  => $this->input->post('kdgol'),
                'kdgol2' => $this->input->post('kdgol2'),
                'kdgol3' => $this->input->post('kdgol3'),
                'nama'   => $this->input->post('nama')
            );
            
            $this->golongan3_model->insert($category_data);
            // $this->session->set_flashdata('message', '');
            redirect('admin/subcategories2/detail/'.$_SESSION['kdgol2'], 'refresh');
		}
		else
		{
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['kdgol'] = array(
                'kdgol' => $this->session->userdata['kdgol'],
            );
            
            $this->data['kdgol2'] = array(
                'kdgol2' => $this->session->userdata['kdgol2'],
            );           

			$this->data['kdgol3'] = array(
				'name'  => 'kdgol3',
				'id'    => 'kdgol3',
				'type'  => 'text',
                'readonly' => TRUE,
                'class' => 'form-control',
				'value' => isset($CI->form_validation) ? $this->form_validation->set_value('kdgol3') : $_SESSION['newcode']
			);

			$this->data['nama'] = array(
				'name'  => 'nama',
				'id'    => 'nama',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('nama')
			);

            /* Load Template */
            $this->template->admin_render('admin/subcategories2/create', $this->data);
		}
	}


	public function delete()
	{
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        elseif ( ! $this->ion_auth->is_admin())
		{
            return show_error('You must be an administrator to view this page.');
        }
        else
        {
            $this->load->view('admin/subcategories2/delete');
        }
	}


	public function edit($id)
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin() OR ! $id OR empty($id))
		{
			redirect('auth', 'refresh');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_subcategory_edit'), 'admin/subcategories2/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Variables */
		$subcategories = $this->golongan3_model->get_by_id($id);
        // $catid = $this->uri->segment(4);

		/* Validate form input */
        $this->form_validation->set_rules('nama', 'Sub Category Name', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
			if ($this->form_validation->run() == TRUE)
			{
                $this->golongan3_model->update($id, array('nama' => $this->input->post('nama')));
                $this->session->set_flashdata('message', '');
                redirect('admin/subcategories2/detail/'.$_SESSION['kdgol2'], 'refresh');
			}
		}

        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
        $this->data['subcategories'] = $subcategories;

        $this->data['kdgol3'] = array(
            'name'  => 'kdgol3',
            'id'    => 'kdgol3',
            'type'  => 'text',
			'readonly' => TRUE,
            'class' => 'form-control',
            'value' => isset($CI->form_validation) ? $this->form_validation->set_value('kdgol3') : $this->data['subcategories']->kdgol3,
        );

		$this->data['nama'] = array(
			'type'    => 'text',
			'name'    => 'nama',
			'id'      => 'nama',
			'value'   => isset($CI->form_validation) ? $this->form_validation->set_value('nama') : $this->data['subcategories']->nama,
            'class'   => 'form-control',
		);

        /* Load Template */
        $this->template->admin_render('admin/subcategories2/edit', $this->data);
	}
}
