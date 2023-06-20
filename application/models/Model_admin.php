<?php
defined('BASEPATH') or exit('No direct script access allowed');
//khusus menu
class Model_admin extends CI_Model
{
    public function read()
    {
        return $this->db->get('order_joki')->result();
    }
    public function terima($id)
    {
        $data = [
            'status' => 'Sudah Bayar'
        ];

        $this->db->where('id', $id);
        $this->db->update('order_joki', $data);
    }

    public function batalkan($id)
    {
        $_id = $this->db->get_where('order_joki', ['id' => $id])->row();
        if ($_id->buktiTf) {
            unlink("assets/img/" . $_id->buktiTf);
        }

        $data = [
            'status' => 'Belum Bayar',
            'buktiTf' => 'belumBayar.png'
        ];

        $this->db->where('id', $id);
        $this->db->update('order_joki', $data);
    }

    public function hapus($id)
    {
        $_id = $this->db->get_where('order_joki', ['id' => $id])->row();
        $delete = $this->db->delete('order_joki', ['id' => $id]);
        if ($delete) {
            unlink("assets/img/" . $_id->buktiTf);
        }
    } 
}
