<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin'){
            redirect('auth/blocked');
        }
    }

    public function index()
    {
        $this->load->model('Model_admin');
        $data['list_order'] = $this->Model_admin->read();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard List';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
    }

    public function terima($id)
    {
        $this->load->model('Model_admin');
		$this->Model_admin->terima($id);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> Bukti Transfer sudah <b>Diterima</b> ! </strong>
        </div>'
        );
        redirect('Admin');
    }

    public function batalkan($id)
    {
        $this->load->model('Model_admin');
		$this->Model_admin->batalkan($id);     

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Bukti Transfer sudah <b>Dibatalkan</b> ! </strong>
        </div>'
        );
        redirect('Admin');
    }

    public function hapusList($id)
    {
        $this->load->model('Model_admin');
		$this->Model_admin->hapus($id);   

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> Data Client Berhasil Dihapus ! </strong>
        </div>'
        );
        redirect('Admin');
    }
}
