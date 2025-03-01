<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Product_orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_orders_model');
        $this->load->model('Products_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'product_orders');
        $this->template->load('template', 'admin/product_orders/product_orders_list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Product_orders_model->json();
    }

    public function read($id)
    {
        $row = $this->Product_orders_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
                'id_product_order' => $row->id_product_order,
                'id_product' => $row->id_product,
                'type_order' => $row->type_order,
                'direction' => $row->direction,
                'qty' => $row->qty,
                'before' => $row->before,
                'after' => $row->after,
                'date' => $row->date,
                'id' => $row->id,
                'detail_order' => $row->detail_order,
            );
            $this->template->load('template', 'admin/product_orders/product_orders_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/product_orders'));
        }
    }

    public function create($jml=1)
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/product_orders/create_action'),
            'id_product_order' => set_value('id_product_order'),
            'id_product' => set_value('id_product'),
            'type_order' => set_value('type_order'),
            'direction' => set_value('direction'),
            'qty' => set_value('qty'),
            'jml' => set_value('jml', $jml),
            'before' => set_value('before'),
            'after' => set_value('after'),
            'date' => set_value('date'),
            'id' => set_value('id'),
            'detail_order' => set_value('detail_order'),
        );
        $this->template->load('template', 'admin/product_orders/product_orders_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $id_productarray =  $this->input->post('id_product[]', true);
            $qtyarray =  $this->input->post('qty[]', true);
            for ($i=0; $i < count($id_productarray); $i++) {
                $id_product = $id_productarray[$i];
                $qty = $qtyarray[$i];
                $type_order =  $this->input->post('type_order', true);
                $direction =  $this->input->post('direction', true);
                $dataProduct = $this->Products_model->get_by_id($id_product);
                if ($dataProduct) {
                    $before = $dataProduct->stock;
                    $after = $type_order == "in" ? ($before + $qty) : ($before - $qty);
                    $data = array(
                        'id_product'=> $id_product,
                        'type_order'=> $type_order,
                        'direction'=> $direction,
                        'qty'       => $qty,
                        'before'    => $before,
                        'after'     => $after,
                        'date'      => $this->input->post('date', true),
                        'id'        => $this->input->post('id', true),
                        'detail_order' => $this->input->post('detail_order', true),
                    );
                    $this->Product_orders_model->insert($data);
                }
            }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/product_orders'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_product[]', 'id product', 'trim|required');
        $this->form_validation->set_rules('type_order', 'type order', 'trim|required');
        $this->form_validation->set_rules('qty[]', 'qty', 'trim|required');
        $this->form_validation->set_rules('date', 'date', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim|required');
        $this->form_validation->set_rules('detail_order', 'detail order', 'trim|required');

        $this->form_validation->set_rules('id_product_order', 'id_product_order', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Product_orders.php */
/* Location: ./application/controllers/Product_orders.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-01-13 04:45:38 */
/* http://harviacode.com */