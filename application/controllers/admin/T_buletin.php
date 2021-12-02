<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_buletin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_buletin_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 't_buletin');
        $this->template->load('template','admin/t_buletin/t_buletin_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->T_buletin_model->json();
    }

    public function read($id) 
    {
        $row = $this->T_buletin_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_buletin' => $row->id_buletin,
		'judul_b' => $row->judul_b,
		'id_user' => $row->id_user,
		'artikel' => $row->artikel,
		'cover_gambar' => $row->cover_gambar,
		'date' => $row->date,
		'time' => $row->time,
		'id_kate' => $row->id_kate,
	    );
            $this->template->load('template','admin/t_buletin/t_buletin_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_buletin'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/t_buletin/create_action'),
	    'id_buletin' => set_value('id_buletin'),
	    'judul_b' => set_value('judul_b'),
	    'id_user' => set_value('id_user'),
	    'artikel' => set_value('artikel'),
	    'cover_gambar' => set_value('cover_gambar'),
	    'date' => set_value('date'),
	    'time' => set_value('time'),
	    'id_kate' => set_value('id_kate'),
	);
        $this->template->load('template','admin/t_buletin/t_buletin_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config = array(
                'upload_path' => 'gambar',
                'allowed_types' => 'gif|jpg|jpeg|png',
                'file_name' => rand(10,1000).'bulet_'.date('dmYHis'),
                'overwrite' => FALSE,
                'max_size' => 2048,   
                'file_ext_tolower' => TRUE,    
                'max_filename' => 0,
                'remove_spaces' => TRUE             
            );
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $fot = (!$this->upload->do_upload('cover_gambar')) ? 'default.png' : $this->upload->file_name;
            $data = array(
        		'judul_b' => $this->input->post('judul_b',TRUE),
        		'id_user' => $this->input->post('id_user',TRUE),
        		'artikel' => $this->input->post('artikel',TRUE),
        		'cover_gambar' => $fot,
        		'date' => $this->input->post('date',TRUE),
        		'time' => $this->input->post('time',TRUE),
        		'id_kate' => $this->input->post('id_kate',TRUE),
            );

            $this->T_buletin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/t_buletin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_buletin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/t_buletin/update_action'),
		'id_buletin' => set_value('id_buletin', $row->id_buletin),
		'judul_b' => set_value('judul_b', $row->judul_b),
		'id_user' => set_value('id_user', $row->id_user),
		'artikel' => set_value('artikel', $row->artikel),
		'cover_gambar' => set_value('cover_gambar', $row->cover_gambar),
		'date' => set_value('date', $row->date),
		'time' => set_value('time', $row->time),
		'id_kate' => set_value('id_kate', $row->id_kate),
	    );
            $this->template->load('template','admin/t_buletin/t_buletin_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_buletin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_buletin', TRUE));
        } else {
            $config = array(
                'upload_path' => 'gambar',
                'allowed_types' => 'gif|jpg|jpeg|png',
                'file_name' => rand(10,1000).'bulet_'.date('dmYHis'),
                'overwrite' => FALSE,
                'max_size' => 2048,   
                'file_ext_tolower' => TRUE,    
                'max_filename' => 0,
                'remove_spaces' => TRUE             
            );
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $data = array(
        		'judul_b' => $this->input->post('judul_b',TRUE),
        		'id_user' => $this->input->post('id_user',TRUE),
        		'artikel' => $this->input->post('artikel',TRUE),
        		'date' => $this->input->post('date',TRUE),
        		'time' => $this->input->post('time',TRUE),
        		'id_kate' => $this->input->post('id_kate',TRUE),
        	);

            if ($this->upload->do_upload('cover_gambar')) {
                $data['cover_gambar'] = $this->upload->file_name;
            }

            $this->T_buletin_model->update($this->input->post('id_buletin', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/t_buletin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_buletin_model->get_by_id($id);

        if ($row) {
            $this->T_buletin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/t_buletin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_buletin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul_b', 'judul b', 'trim|required|max_length[80]');
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('artikel', 'artikel', 'trim|required|min_length[191]');
	// $this->form_validation->set_rules('cover_gambar', 'cover gambar', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required');
	$this->form_validation->set_rules('time', 'time', 'trim|required');
	$this->form_validation->set_rules('id_kate', 'id kate', 'trim|required');

	$this->form_validation->set_rules('id_buletin', 'id_buletin', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T_buletin.php */
/* Location: ./application/controllers/T_buletin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-11-16 17:08:46 */
/* http://harviacode.com */