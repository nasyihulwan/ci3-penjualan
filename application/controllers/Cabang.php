<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cabang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekSession();
        $this->load->model('M_Cabang');
    }
    public function index()
    {
        $data["cabang"] = $this->M_Cabang->getDataCabang()->result();
        $this->template->load('template/template', 'cabang/v_cabang', $data);
    }
    public function inputCabang()
    {
        $this->load->view('cabang/input_cabang');
    }
    public function simpanCabang()
    {
        $kodeCabang = $this->input->post('kodeCabang');
        $namaCabang = $this->input->post('namaCabang');
        $alamatCabang = $this->input->post('alamatCabang');
        $telepon = $this->input->post('telepon');

        $data = array(
            'kode_cabang' => $kodeCabang,
            'nama_cabang' => $namaCabang,
            'alamat_cabang' => $alamatCabang,
            'telepon' => $telepon,
        );
        $simpan = $this->M_Cabang->insertCabang($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Cabang berhasil disimpan
          </div>');
            redirect('cabang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Cabang gagal disimpan
          </div>');
            redirect('cabang');
        }
    }
    public function editCabang()
    {
        $kodeCabang = $this->uri->segment(3);
        $cabangDetail = $this->M_Cabang->getCabang($kodeCabang);
        $data = array(
            'updateCabang' => $cabangDetail
        );
        $this->load->view('cabang/edit_cabang', $data);
    }
    public function updateCabang()
    {
        $kodeCabang = $this->input->post('kodeCabang');
        $namaCabang = $this->input->post('namaCabang');
        $alamatCabang = $this->input->post('alamatCabang');
        $telepon = $this->input->post('telepon');

        $data = array(
            'nama_cabang' => $namaCabang,
            'alamat_cabang' => $alamatCabang,
            'telepon' => $telepon
        );
        $simpan = $this->M_Cabang->updateCabang($data, $kodeCabang);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Cabang berhasil disimpan
          </div>');
            redirect('cabang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Cabang gagal disimpan
          </div>');
            redirect('cabang');
        }
    }
    public function hapusCabang()
    {
        $kodeCabang = $this->uri->segment(3);
        $hapus = $this->M_Cabang->hapusCabang($kodeCabang);
        if ($hapus == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data cabang berhasil dihapus
          </div>');
            redirect('cabang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data cabang gagal dihapus
          </div>');
            redirect('cabang');
        }
    }
}
