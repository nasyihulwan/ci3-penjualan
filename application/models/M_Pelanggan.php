<?php

class M_Pelanggan extends CI_Model
{
    function getDataPelanggan()
    {
        $cabang = $this->session->userdata('kode_cabang');
        if ($cabang != "PST") {
            $this->db->where('pelanggan.kode_cabang', $cabang);
        }
        $this->db->join('cabang', 'pelanggan.kode_cabang = cabang.kode_cabang');
        return $this->db->get('pelanggan');
    }
    function insertPelanggan($data)
    {
        $simpan = $this->db->insert('pelanggan', $data);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function updatePelanggan($data, $kodePelanggan)
    {
        $simpan = $this->db->update('pelanggan', $data, array("kode_pelanggan" => $kodePelanggan));
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function getPelanggan($kodePelanggan)
    {
        return $this->db->get_where('pelanggan', ['kode_pelanggan' => $kodePelanggan])->row();
    }
    function hapusPelanggan($kodePelanggan)
    {
        $hapus =  $this->db->delete('pelanggan', ['kode_pelanggan' => $kodePelanggan]);
        if ($hapus) {
            return 1;
        } else {
            return 0;
        }
    }
}
