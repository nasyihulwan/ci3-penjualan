<?php

class M_Cabang extends CI_Model
{
    function getDataCabang()
    {
        return $this->db->get('cabang');
    }
    function insertCabang($data)
    {
        $simpan = $this->db->insert('cabang', $data);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function updateCabang($data, $kodeCabang)
    {
        $simpan = $this->db->update('cabang', $data, array("kode_cabang" => $kodeCabang));
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function getCabang($kodeCabang)
    {
        return $this->db->get_where('cabang', ['kode_cabang' => $kodeCabang])->row();
    }
    function hapusCabang($kodeCabang)
    {
        $hapus =  $this->db->delete('cabang', ['kode_cabang' => $kodeCabang]);
        if ($hapus) {
            return 1;
        } else {
            return 0;
        }
    }
}
