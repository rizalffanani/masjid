<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Web_model');
    }

    public function index()
    {
        $kategori       = $this->Web_model->get_all_kategori();
        $menu           = $this->Web_model->get_all_menu();
        $slider   = $this->Web_model->get_all("slider");

        $b  = array('kategori' => $kategori, 'menu' => $menu, 'slider' => $slider);

        $this->template->load('front','frontend/home', $b);
    }   

    public function page($page)
    {
        $this->load->model('Page_model');
        $kategori       = $this->Web_model->get_all_kategori();
        $row = $this->Page_model->get_by_link($page);
        $menu = $this->Web_model->get_all_menu5();
        $data = array(
            'title' => 'Page',
            'id_page' => $row->id_page,
            'link' => $row->link,
            'judul' => $row->judul,
            'deskripsi' => $row->deskripsi,
            'foto' => $row->foto,
            'enum' => $row->enum,
            'menu' => $menu,
            'kategori' => $kategori,
        );
        $this->template->load('front','frontend/page', $data);
    } 

    public function search(){
        $kategori = $this->Web_model->get_all_kategori();
        $menu = $this->Web_model->get_all_menu5();
        $keyword = $this->input->post('keyword');
        $row=$this->Web_model->get_product_keyword($keyword);
        $data = array(
            'judul' => 'Hasil Pencarian',
            'row' => $row,
            'menu' => $menu,
            'kategori' => $kategori,
        );
        $this->template->load('front','frontend/search', $data);
    }

    public function kategori($id){
        $kategori = $this->Web_model->get_all_kategori();
        $menu = $this->Web_model->get_all_menu5();
        $keyword = $this->input->post('keyword');
        $rows=$this->Web_model->get_row_kategori($id);
        $row=$this->Web_model->get_all_katbuletin($id);
        $data = array(
            'judul' => 'Kategori '.$rows->nama_kate,
            'row' => $row,
            'menu' => $menu,
            'kategori' => $kategori,
        );
        $this->template->load('front','frontend/search', $data);
    }

    public function t_keuangan()
    {
        $this->authclass->check_isvalidated(base_url());
        $this->load->model('T_keuangan_model');
        $row = $this->T_keuangan_model->get_all();
        $kategori = $this->Web_model->get_all_kategori();
        $menu = $this->Web_model->get_all_menu5();
        $data = array(
            'judul' => 'Laporan Keuangan',
            'row' => $row,
            'menu' => $menu,
            'kategori' => $kategori,
        );
        $this->template->load('front','frontend/t_keuangan', $data);
    } 
    public function t_jadwal()
    {
        $this->load->model('T_jadwal_model');
        $row = $this->T_jadwal_model->get_all();
        $kategori = $this->Web_model->get_all_kategori();
        $menu = $this->Web_model->get_all_menu5();
        $data = array(
            'judul' => 'Kegiatan Masjid',
            'row' => $row,
            'menu' => $menu,
            'kategori' => $kategori,
        );
        $this->template->load('front','frontend/t_jadwal', $data);
    } 
    public function t_sholat()
    {
        $this->load->model('T_sholat_model');
        $row = $this->T_sholat_model->get_all();
        $kategori = $this->Web_model->get_all_kategori();
        $menu = $this->Web_model->get_all_menu5();
        $data = array(
            'judul' => 'Imam Sholat',
            'row' => $row,
            'menu' => $menu,
            'kategori' => $kategori,
        );
        $this->template->load('front','frontend/t_sholat', $data);
    } 
    public function t_donasi()
    {
        $this->authclass->check_isvalidated(base_url());
        $this->load->model('T_donasi_model');
        $row = $this->T_donasi_model->get_all();
        $kategori = $this->Web_model->get_all_kategori();
        $menu = $this->Web_model->get_all_menu5();
        $data = array(
            'judul' => 'Donasi',
            'row' => $row,
            'menu' => $menu,
            'kategori' => $kategori,
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
        $this->template->load('front','frontend/t_donasi', $data);
    } 
    public function t_buletin()
    {
        $this->load->library('pagination');
        $this->load->model('T_buletin_model');
 
        //konfigurasi pagination
        $config['base_url'] = site_url('web/t_buletin'); //site url
        $config['total_rows'] = $this->db->count_all('t_buletin'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="blog_pagination_section pd22 jb_cover edu_couse_pagination"><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></div>';
        $config['num_tag_open']     = '<li><span href="#">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="third_pagger"><span href="#">';
        $config['cur_tag_close']    = '</span></li>';

        $config['next_tag_open']    = '<li><span href="#" class="next">';
        $config['next_tagl_close']  = '</span></li>';
        $config['prev_tag_open']    = '<li><span href="#" class="prev">';
        $config['prev_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['judul'] = 'Buletin';
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['row'] = $this->T_buletin_model->get_all_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();

        $this->template->load('front','frontend/buletin', $data);
    }
    public function detail($id) {
        $this->load->model('T_buletin_model');
        $row = $this->T_buletin_model->get_by_id($id);
        $kategori = $this->Web_model->get_all_kategori();
        $menu = $this->Web_model->get_all_menu5();
        $data = array(
            'title' => 'Read',
            'id_page' => $row->id_buletin,
            'judul' => $row->judul_b,
            'id_user' => $row->id_user,
            'deskripsi' => $row->artikel,
            'foto' => $row->cover_gambar,
            'date' => $row->date,
            'time' => $row->time,
            'id_kate' => $row->id_kate,
            'menu' => $menu,
            'kategori' => $kategori,
        );
        $this->template->load('front','frontend/page', $data);
    }
    function login() {
        $v= $this->session->userdata("validated");
        if ($v!=1) {
            $data['judul'] = 'Login';;           
            $data['err'] = $this->session->flashdata('flash_msg');
            $data['val'] = (object)@$this->session->flashdata('backval');
            $data['t']="log";
            $this->template->load('front','frontend/login', $data);
        }else{
            redirect(site_url('web/login'));
        }
    }
    public function regis() {
        $data['judul'] = 'Pendafataran';;  
        $data['errs2'] = $this->session->flashdata('flash_msgi');
        $data['vals'] = (object)@$this->session->flashdata('users');
        $data['t']="regis";
        $this->template->load('front','frontend/login', $data);
    }   
    public function _rules() 
    {
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-02-07 01:38:10 */
/* http://harviacode.com */