<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'products');
        $this->template->load('template', 'admin/products/products_list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Products_model->json();
    }

    public function read($id)
    {
        $row = $this->Products_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
        'id_product' => $row->id_product,
        'sku' => $row->sku,
        'name_product' => $row->name_product,
        'detail_product' => $row->detail_product,
        'stock' => $row->stock,
        'id_shop' => $row->id_shop,
        );
            $this->template->load('template', 'admin/products/products_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/products'));
        }
    }

    public function create()
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/products/create_action'),
        'id_product' => set_value('id_product'),
        'sku' => set_value('sku'),
        'name_product' => set_value('name_product'),
        'detail_product' => set_value('detail_product'),
        'stock' => set_value('stock'),
        'id_shop' => set_value('id_shop'),
    );
        $this->template->load('template', 'admin/products/products_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
        'sku' => $this->input->post('sku', true),
        'name_product' => $this->input->post('name_product', true),
        'detail_product' => $this->input->post('detail_product', true),
        'stock' => $this->input->post('stock', true),
        'id_shop' => $this->input->post('id_shop', true),
        );

            $this->Products_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/products'));
        }
    }

    public function update($id)
    {
        $row = $this->Products_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/products/update_action'),
        'id_product' => set_value('id_product', $row->id_product),
        'sku' => set_value('sku', $row->sku),
        'name_product' => set_value('name_product', $row->name_product),
        'detail_product' => set_value('detail_product', $row->detail_product),
        'stock' => set_value('stock', $row->stock),
        'id_shop' => set_value('id_shop', $row->id_shop),
        );
            $this->template->load('template', 'admin/products/products_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/products'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('id_product', true));
        } else {
            $data = array(
        'sku' => $this->input->post('sku', true),
        'name_product' => $this->input->post('name_product', true),
        'detail_product' => $this->input->post('detail_product', true),
        'stock' => $this->input->post('stock', true),
        'id_shop' => $this->input->post('id_shop', true),
        );

            $this->Products_model->update($this->input->post('id_product', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/products'));
        }
    }

    public function delete($id)
    {
        $row = $this->Products_model->get_by_id($id);

        if ($row) {
            $this->Products_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/products'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/products'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('sku', 'sku', 'trim|required');
        $this->form_validation->set_rules('name_product', 'name product', 'trim|required');
        $this->form_validation->set_rules('stock', 'stock', 'trim|required');
        $this->form_validation->set_rules('id_shop', 'id shop', 'trim|required');

        $this->form_validation->set_rules('id_product', 'id_product', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-01-13 04:34:15 */
/* http://harviacode.com */