<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekSession();
        $this->load->model('M_Pelanggan');
        $this->load->model('M_Penjualan');
        $this->load->model('M_Cabang');
    }
    public function index()
    {
        $data['jmlPelanggan'] = $this->M_Pelanggan->getDataPelanggan()->num_rows();
        $data['jmlPenjualan'] = $this->M_Penjualan->getDataPenjualanHariIni()->num_rows();
        $data['jmlCabang'] = $this->M_Cabang->getDataCabang()->num_rows();
        $data['jmlPendapatan'] = $this->M_Penjualan->getBayarHariIni()->row_array();
        $data['rekapPenjualan'] = $this->M_Penjualan->getPenjualanPerBulan()->result();
        $this->template->load('template/template', 'dashboard/dashboard', $data);
    }
}
