<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'user') {
            redirect('auth/blocked');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Home';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function buatPesanan()
    {
        $this->form_validation->set_rules('noHp', 'No Hp', 'required', [
            'required' => "Jangan Dikosongin Nomor Hp nya Bre... !"
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => "Jangan Dikosongin Email nya Bre... !"
        ]);
        $this->form_validation->set_rules('reqHero', 'Req Hero', 'required', [
            'required' => "Jangan Dikosongin Request Hero nya Bre... !"
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => "Jangan Dikosongin Password nya Bre... !"
        ]);
        $this->form_validation->set_rules('userId', 'User ID', 'required', [
            'required' => "Jangan Dikosongin User Id ML nya Bre... !"
        ]);
        $this->form_validation->set_rules('loginVia', 'Login Via', 'required', [
            'required' => "Isi Login lewat mana nya Woy... !"
        ]);
        $this->form_validation->set_rules('paketJoki', 'Paket Joki', 'required', [
            'required' => "Isi Paketan Joki nya, Dipilih Dulu Bre... !"
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => "Harga Muncul Kalo Udah Milih Paket Joki !"
        ]);
        $this->form_validation->set_rules('namaBank', 'Nama Bank', 'required', [
            'required' => "Pilih TF dulu Lewat Apa Cuyy, Aduhhh..! <br> <span class='pl-3'>Ga Usah Upload TF Kalo Bayarnya Nanti...</span>"
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['login_via'] = $this->db->get('login_via')->result();
            $data['paket_joki'] = $this->db->get('paket_joki')->result();
            $data['bank'] = $this->db->get('bank')->result();
            $data['title'] = 'Buat Pesanan';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/buatPesanan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->model('Model_user');
            $this->Model_user->tambah();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                    <strong>Data Pesanan Berhasil Ditambahkan !</strong>
                  </div>'
            );
            redirect('user/history');
        }
    }


    public function history()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['history'] = $this->db->get('order_joki')->result();
        $data['title'] = 'History';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/history', $data);
    }

    public function about()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'About';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/about', $data);
    }

    public function bayarPaket($id)
    {
        $this->form_validation->set_rules('namaBank', 'Nama Bank', 'required', [
            'required' => "Niat TF Ga sih bre?  Aduhhh..!"
        ]);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bank'] = $this->db->get('bank')->result();
        $data['data_lawas'] = $this->db->get_where('order_joki', ['id' => $id])->row();
        $data['title'] = 'Bayar Pesanan';

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pembayaran', $data);
        } else {
            $this->load->model('Model_user');
            $this->Model_user->bayarTf($id);
            redirect('user/history');
        }
    }

    public function editHistory($id)
    {
        $this->form_validation->set_rules('noHp', 'No Hp', 'required', [
            'required' => "Jangan Dikosongin Nomor Hp nya Bre... ! <br> <br>"
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => "Jangan Dikosongin Email nya Bre... ! <br> <br>"
        ]);
        $this->form_validation->set_rules('reqHero', 'Req Hero', 'required', [
            'required' => "Jangan Dikosongin Request Hero nya Bre... ! <br> <br>"
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => "Jangan Dikosongin Password nya Bre... ! <br> <br>"
        ]);
        $this->form_validation->set_rules('userId', 'User ID', 'required', [
            'required' => "Jangan Dikosongin User Id ML nya Bre... ! <br> <br>"
        ]);
        $this->form_validation->set_rules('loginVia', 'Login Via', 'required', [
            'required' => "Isi Login lewat mana nya Woy... ! <br> <br>"
        ]);
        $this->form_validation->set_rules('paketJoki', 'Paket Joki', 'required', [
            'required' => "Isi Paketan Joki nya, Dipilih Dulu Bre... ! <br> <br>"
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => "Harga Muncul Kalo Udah Milih Paket Joki ! <br> <br>"
        ]);
        $this->form_validation->set_rules('namaBank', 'Nama Bank', 'required', [
            'required' => "Pilih TF dulu Lewat Apa Cuyy, Aduhhh..! <br> <span class='pl-1'>Ga Usah Upload TF Kalo Bayarnya Nanti...</span> <br> <br>"
        ]);

        if ($this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_lawas'] = $this->db->get_where('order_joki', ['id' => $id])->row();
        $data['login_via'] = $this->db->get('login_via')->result();
        $data['paket_joki'] = $this->db->get('paket_joki')->result();
        $data['bank'] = $this->db->get('bank')->result();
        $data['title'] = 'Edit List History';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/editHistory', $data);
        } else {
            $this->load->model('Model_user');
            $this->Model_user->edit($id);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                    <strong>Data Pesanan Berhasil Diubah Bre... !</strong>
                  </div>'
            );
            redirect('user/history');
        }
    }

    public function hapusHistory($id)
    {
        $this->load->model('Model_user');
        $this->Model_user->hapus($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert">
                <strong>Data List History Berhasil Dihapus !</strong>
              </div>'
        );
        redirect('user/history');
    }
}
