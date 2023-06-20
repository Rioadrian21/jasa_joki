<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('role') == 'admin'){
            redirect('admin');
        } else {
            redirect('user');
        }
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Profile';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/profile', $data);
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Profile';

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit', $data);
        } else {
            $name = $this->input->post('name', true);
            $email = $this->input->post('email');

            //cek gambar jika ada gambar yg akan diupload
            $upload_image = $_FILES['image'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    unlink('assets/img/profile/' . $this->input->post('gambar_lama', true));
                } else {
                    $new_image = htmlspecialchars($this->input->post('gambar_lama', true));
                    $this->upload->display_errors();
                }
            }

            $this->db->set('image', $new_image);
            $this->db->set('name', htmlspecialchars($name));
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your account has been Updated!.... </div>');
            
            if ($this->session->userdata('role') == 'admin'){
                redirect('admin');
            } else {
                redirect('user');
            }
        }
    }

    public function changepassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('current_password', 'Current Password', 'trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/changepassword', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            $result = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
            // cek apakah user memiliki password
            if ($result->password != null) {
                // jika memiliki, cek curent password
                if (!password_verify($current_password, $data['user']['password'])) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Current Password!.... </div>');
                    redirect('menu/changepassword');
                } else {
                    if ($current_password == $new_password) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New Password cannot be the same as current password!.... </div>');
                        redirect('menu/changepassword');
                    } else {
                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                        $this->db->set('password', $password_hash);
                        $this->db->where('email', $this->session->userdata('email'));
                        $this->db->update('user');

                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password has been changed!.... </div>');
                        redirect('menu/changepassword');
                    }
                }
            } else {
                // jika tidak langsung ganti
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password has been changed!.... </div>');
                redirect('menu/changepassword');
            }
        }
    }
}


