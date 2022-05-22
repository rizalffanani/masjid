<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_donasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_donasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array('title' => 't_donasi');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_donasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_donasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_donasi/index.html';
            $config['first_url'] = base_url() . 't_donasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_donasi_model->total_rows($q);
        $t_donasi = $this->T_donasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_donasi_data' => $t_donasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','admin/t_donasi/t_donasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->T_donasi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_donasi' => $row->id_donasi,
		'id_user' => $row->id_user,
		'donatur' => $row->donatur,
		'telepon' => $row->telepon,
		'alamat' => $row->alamat,
		'uang' => $row->uang,
		'barang' => $row->barang,
		'ket' => $row->ket,
	    );
            $this->template->load('template','admin/t_donasi/t_donasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_donasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/t_donasi/create_action'),
	    'id_donasi' => set_value('id_donasi'),
	    'id_user' => set_value('id_user'),
	    'donatur' => set_value('donatur'),
	    'telepon' => set_value('telepon'),
	    'alamat' => set_value('alamat'),
	    'uang' => set_value('uang'),
	    'barang' => set_value('barang'),
	    'ket' => set_value('ket'),
	);
        $this->template->load('template','admin/t_donasi/t_donasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            redirect(site_url('web/t_donasi'));
        } else {
            $data = array(
    		'id_user' => $this->input->post('id_user',TRUE),
    		'donatur' => $this->input->post('donatur',TRUE),
    		'telepon' => $this->input->post('telepon',TRUE),
    		'alamat' => $this->input->post('alamat',TRUE),
    		'uang' => $this->input->post('uang',TRUE),
    		'barang' => $this->input->post('barang',TRUE),
    		'ket' => $this->input->post('ket',TRUE),
    	    );

            $this->T_donasi_model->insert($data);
            $ida= $this->db->insert_id();
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/t_donasi/preview/'.$ida));
        }
    }

    public function preview($id) 
    {
        $row = $this->T_donasi_model->get_by_id($id);
        if ($row) {
            $data = array('row' => $row);
            $this->load->view('admin/t_donasi/t_donasi_cetak',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_donasi'));
        }
    }

    public function cetak($id) 
    {
        $row = $this->T_donasi_model->get_by_id($id);
        if (@$row) {
            $mpdf = new \Mpdf\Mpdf();
            $data = array('row' => $row);
            $html = $this->load->view('admin/t_donasi/t_donasi_cetak',$data,true);
            $mpdf->AddPage('L', // L - landscape, P - portrait
            '', '', '', '',
            3, // margin_left
            3, // margin right
            0, // margin top
            10, // margin bottom
            18, // margin header
            12); // margin footer
            $mpdf->WriteHTML($html);
            $mpdf->Output('vcr'.$in.'_t_'.date('y_m_d_H_i_s').'.pdf', 'I');
        } 
    }
    
    public function update($id) 
    {
        $row = $this->T_donasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/t_donasi/update_action'),
		'id_donasi' => set_value('id_donasi', $row->id_donasi),
		'id_user' => set_value('id_user', $row->id_user),
		'donatur' => set_value('donatur', $row->donatur),
		'telepon' => set_value('telepon', $row->telepon),
		'alamat' => set_value('alamat', $row->alamat),
		'uang' => set_value('uang', $row->uang),
		'barang' => set_value('barang', $row->barang),
		'ket' => set_value('ket', $row->ket),
	    );
            $this->template->load('template','admin/t_donasi/t_donasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_donasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_donasi', TRUE));
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'donatur' => $this->input->post('donatur',TRUE),
		'telepon' => $this->input->post('telepon',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'uang' => $this->input->post('uang',TRUE),
		'barang' => $this->input->post('barang',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->T_donasi_model->update($this->input->post('id_donasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/t_donasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_donasi_model->get_by_id($id);

        if ($row) {
            $this->T_donasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('web/t_donasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('web/t_donasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('donatur', 'donatur', 'trim|required');
	$this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
	$this->form_validation->set_rules('id_donasi', 'id_donasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T_donasi.php */
/* Location: ./application/controllers/T_donasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-02 01:19:08 */
/* http://harviacode.com */