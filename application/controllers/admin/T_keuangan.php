<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_keuangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_keuangan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $users = $this->T_keuangan_model->get_all();

        $data = array(
            'users_data' => $users,
            'title' => 'Kas'
        );        
        $this->template->load('template','admin/t_keuangan/t_keuangan_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->T_keuangan_model->json();
    }

    public function read($id) 
    {
        $row = $this->T_keuangan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_keuangan' => $row->id_keuangan,
		'tgl' => $row->tgl,
		'deskprisi' => $row->deskprisi,
		'jenis' => $row->jenis,
		'total' => $row->total,
	    );
            $this->template->load('template','admin/t_keuangan/t_keuangan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_keuangan'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/t_keuangan/create_action'),
	    'id_keuangan' => set_value('id_keuangan'),
	    'tgl' => set_value('tgl'),
	    'deskprisi' => set_value('deskprisi'),
	    'jenis' => set_value('jenis'),
	    'total' => set_value('total'),
	);
        $this->template->load('template','admin/t_keuangan/t_keuangan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl' => $this->input->post('tgl',TRUE),
		'deskprisi' => $this->input->post('deskprisi',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'total' => $this->input->post('total',TRUE),
	    );

            $this->T_keuangan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/t_keuangan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_keuangan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/t_keuangan/update_action'),
		'id_keuangan' => set_value('id_keuangan', $row->id_keuangan),
		'tgl' => set_value('tgl', $row->tgl),
		'deskprisi' => set_value('deskprisi', $row->deskprisi),
		'jenis' => set_value('jenis', $row->jenis),
		'total' => set_value('total', $row->total),
	    );
            $this->template->load('template','admin/t_keuangan/t_keuangan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_keuangan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_keuangan', TRUE));
        } else {
            $data = array(
		'tgl' => $this->input->post('tgl',TRUE),
		'deskprisi' => $this->input->post('deskprisi',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'total' => $this->input->post('total',TRUE),
	    );

            $this->T_keuangan_model->update($this->input->post('id_keuangan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/t_keuangan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_keuangan_model->get_by_id($id);

        if ($row) {
            $this->T_keuangan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/t_keuangan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_keuangan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('deskprisi', 'deskprisi', 'trim|required');
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('total', 'total', 'trim|required');

	$this->form_validation->set_rules('id_keuangan', 'id_keuangan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T_keuangan.php */
/* Location: ./application/controllers/T_keuangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-11-13 02:36:43 */
/* http://harviacode.com */