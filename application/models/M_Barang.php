<?php

class M_Barang extends CI_Model
{
    function getDataBarang()
    {
        return $this->db->get('barang_master');
    }
    function insertBarang($data)
    {
        $simpan = $this->db->insert('barang_master', $data);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function updateBarang($data, $kodeBarang)
    {
        $simpan = $this->db->update('barang_master', $data, array("kode_barang" => $kodeBarang));
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function getBarang($kodeBarang)
    {
        return $this->db->get_where('barang_master', ['kode_barang' => $kodeBarang])->row();
    }
    function hapusBarang($kodeBarang)
    {
        $hapus =  $this->db->delete('barang_master', ['kode_barang' => $kodeBarang]);
        if ($hapus) {
            return 1;
        } else {
            return 0;
        }
    }

    // Harga
    function getDataHarga()
    {
        $cabang = $this->session->userdata('kode_cabang');
        if ($cabang != "PST") {
            $this->db->where('barang_harga.kode_cabang', $cabang);
        }
        $this->db->join('barang_master', 'barang_harga.kode_barang = barang_master.kode_barang');
        return $this->db->get('barang_harga');
    }
    function insertHarga($data)
    {
        $simpan = $this->db->insert('barang_harga', $data);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function updateHarga($data, $kodeHarga)
    {
        $simpan = $this->db->update('barang_harga', $data, array("kode_harga" => $kodeHarga));
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function getHarga($kodeHarga)
    {
        $this->db->where('kode_harga', $kodeHarga);
        $this->db->join('barang_master', 'barang_harga.kode_barang = barang_master.kode_barang');
        return $this->db->get('barang_harga');
    }
    function hapusHarga($kodeHarga)
    {
        $hapus =  $this->db->delete('barang_harga', ['kode_harga' => $kodeHarga]);
        if ($hapus) {
            return 1;
        } else {
            return 0;
        }
    }
}
