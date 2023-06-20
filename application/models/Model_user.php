<?php

class Model_user extends CI_Model
{
    public function tambah()
    {
        $config['upload_path']          = 'assets/img';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = '2048';

        $this->load->library('upload', $config);

        //Kondisi pertama => Milih bank (Misal BRI) + upload bukti TF     < Client berlaku Jujur >
        if ($this->upload->do_upload('buktiTf') && $this->input->post('namaBank') != "Bayar Nanti") {
            $bank = htmlspecialchars($this->input->post('namaBank', true));
            $fileName = $this->upload->data('file_name');
            $status = 'Sedang Diproses';
        }
        //Kondisi kedua => Milih Bayar Nanti tapi upload bukti TF      < Client berlaku Curang >
        // dan
        //Kondisi ketiga => Milih Bayar Nanti tapi ga upload bukti TF     < Client berlaku Jujur >
        elseif ($this->input->post('namaBank') == "Bayar Nanti") {
            $removeFile = $this->upload->data('file_name');
            unlink("assets/img/" . $removeFile);
            $bank = htmlspecialchars($this->input->post('namaBank', true));
            $fileName = 'belumBayar.png';
            $status = 'Belum Bayar';
        }
        //Kondisi keempat => Milih bank (Misal BRI) + ga upload bukti TF     < Client berlaku Curang >    
        else {
            $bank = 'Bayar Nanti';
            $fileName = 'belumBayar.png';
            $status = 'Belum Bayar';
        }


        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'noHp' => htmlspecialchars($this->input->post('noHp', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'reqHero' => htmlspecialchars($this->input->post('reqHero', true)),
            'password' => htmlspecialchars($this->input->post('password', true)),
            'userId' => htmlspecialchars($this->input->post('userId', true)),
            'loginVia' => htmlspecialchars($this->input->post('loginVia', true)),
            'paketJoki' => htmlspecialchars($this->input->post('paketJoki', true)),
            'harga' => htmlspecialchars($this->input->post('harga', true)),
            'bank' => $bank,
            'buktiTf' => $fileName,
            'status' => $status,
            'tglOrder' => time()
        ];

        $this->db->insert('order_joki', $data);
    }

    public function bayarTf($id)
    {
        $config['upload_path']          = 'assets/img';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = '2048';

        $this->load->library('upload', $config);

        //Kondisi pertama => Milih bank (Misal BRI) + upload bukti TF     < Client berlaku Jujur >
        if ($this->upload->do_upload('buktiTf') && $this->input->post('namaBank') != "Bayar Nanti") {
            $bank = htmlspecialchars($this->input->post('namaBank', true));
            $fileName = $this->upload->data('file_name');
            $status = 'Sedang Diproses';

            $data = [
                'bank' => $bank,
                'buktiTf' => $fileName,
                'status' => $status
            ];

            $this->db->where('id', $id);
            $this->db->update('order_joki', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                    <strong>Bukti TF Sudah Diupload Bre, Mantapp !</strong>
                  </div>'
            );
        }
        //Kondisi kedua => Milih Bayar Nanti tapi upload bukti TF      < Client berlaku Curang >
        // dan
        //Kondisi ketiga => Milih Bayar Nanti tapi ga upload bukti TF     < Client berlaku Jujur >
        elseif ($this->input->post('namaBank') == "Bayar Nanti") {
            $removeFile = $this->upload->data('file_name');
            unlink("assets/img/" . $removeFile);
            $bank = htmlspecialchars($this->input->post('namaBank', true));
            $fileName = 'belumBayar.png';
            $status = 'Belum Bayar';

            $data = [
                'bank' => $bank,
                'buktiTf' => $fileName,
                'status' => $status
            ];

            $this->db->where('id', $id);
            $this->db->update('order_joki', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning alert-dismissible fade show mx-auto" role="alert">
                    <strong>Ya udah Santai.. Gw tau, Lu lagi Kere.. !</strong>
                  </div>'
            );
        }
        //Kondisi keempat => Milih bank (Misal BRI) + ga upload bukti TF     < Client berlaku Curang >          
        else {
            $bank = 'Bayar Nanti';
            $fileName = 'belumBayar.png';
            $status = 'Belum Bayar';

            $data = [
                'bank' => $bank,
                'buktiTf' => $fileName,
                'status' => $status
            ];

            $this->db->where('id', $id);
            $this->db->update('order_joki', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert">
                    <strong>Serius lah bre, Upload bukti TF nya !</strong>
                  </div>'
            );
        }
    }

    public function edit($id)
    {
        $config['upload_path']          = 'assets/img';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = '2048';

        $this->load->library('upload', $config);

        //Kondisi pertama => Milih bank (Misal BRI) + upload bukti TF     < Client berlaku Jujur >
        if ($this->upload->do_upload('buktiTf') && $this->input->post('namaBank') != "Bayar Nanti") {
            $bank = htmlspecialchars($this->input->post('namaBank', true));
            $fileName = $this->upload->data('file_name');
            $status = 'Sedang Diproses';
        }
        //Kondisi kedua => Milih Bayar Nanti tapi upload bukti TF      < Client berlaku Curang >
        // dan
        //Kondisi ketiga => Milih Bayar Nanti tapi ga upload bukti TF     < Client berlaku Jujur >
        elseif ($this->input->post('namaBank') == "Bayar Nanti") {
            $removeFile = $this->upload->data('file_name');
            unlink("assets/img/" . $removeFile);
            $bank = htmlspecialchars($this->input->post('namaBank', true));
            $fileName = 'belumBayar.png';
            $status = 'Belum Bayar';
        }
        //Kondisi keempat => Milih bank (Misal BRI) + ga upload bukti TF     < Client berlaku Curang >    
        else {
            $bank = 'Bayar Nanti';
            $fileName = 'belumBayar.png';
            $status = 'Belum Bayar';
        }

        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'noHp' => htmlspecialchars($this->input->post('noHp', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'reqHero' => htmlspecialchars($this->input->post('reqHero', true)),
            'password' => htmlspecialchars($this->input->post('password', true)),
            'userId' => htmlspecialchars($this->input->post('userId', true)),
            'loginVia' => htmlspecialchars($this->input->post('loginVia', true)),
            'paketJoki' => htmlspecialchars($this->input->post('paketJoki', true)),
            'harga' => htmlspecialchars($this->input->post('harga', true)),
            'bank' => $bank,
            'buktiTf' => $fileName,
            'status' => $status,
            'tglOrder' => time()
        ];

        $this->db->where('id', $id);
        $this->db->update('order_joki', $data);
    }

    public function hapus($id)
    {
        $_id = $this->db->get_where('order_joki', ['id' => $id])->row();
        $delete = $this->db->delete('order_joki', ['id' => $id]);
        if ($delete && $_id->status == 'Sudah Bayar') {
            unlink("assets/img/" . $_id->buktiTf);
        }
    }
}
