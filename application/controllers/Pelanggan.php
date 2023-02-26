<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekSession();
        $this->load->model('M_Pelanggan');
        $this->load->model('M_Cabang');
    }
    public function index()
    {
        $data["pelanggan"] = $this->M_Pelanggan->getDataPelanggan()->result();
        $this->template->load('template/template', 'pelanggan/v_pelanggan', $data);
    }
    public function inputPelanggan()
    {
        $data["cabang"] = $this->M_Cabang->getDataCabang()->result();
        $this->load->view('pelanggan/input_pelanggan', $data);
    }
    public function simpanPelanggan()
    {
        $kodePelanggan = $this->input->post('kodePelanggan');
        $namaPelanggan = $this->input->post('namaPelanggan');
        $alamatPelanggan = $this->input->post('alamatPelanggan');
        $noHP = $this->input->post('noHP');
        $cabang = $this->input->post('cabang');

        $data = array(
            'kode_pelanggan' => $kodePelanggan,
            'nama_pelanggan' => $namaPelanggan,
            'alamat_pelanggan' => $alamatPelanggan,
            'no_hp' => $noHP,
            'kode_cabang' => $cabang
        );
        $simpan = $this->M_Pelanggan->insertPelanggan($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Pelanggan berhasil disimpan
          </div>');
            redirect('pelanggan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Pelanggan gagal disimpan
          </div>');
            redirect('pelanggan');
        }
    }
    public function editPelanggan()
    {
        $kodePelanggan = $this->uri->segment(3);
        $pelangganDetail = $this->M_Pelanggan->getPelanggan($kodePelanggan);
        $data = array(
            'updatePelanggan' => $pelangganDetail
        );
        $data["cabang"] = $this->M_Pelanggan->getPelanggan($kodePelanggan);
        $this->load->view('pelanggan/edit_pelanggan', $data);
    }
    public function updatePelanggan()
    {
        $kodePelanggan = $this->input->post('kodePelanggan');
        $namaPelanggan = $this->input->post('namaPelanggan');
        $alamatPelanggan = $this->input->post('alamatPelanggan');
        $noHP = $this->input->post('noHP');
        $cabang = $this->input->post('cabang');

        $data = array(
            'nama_pelanggan' => $namaPelanggan,
            'alamat_pelanggan' => $alamatPelanggan,
            'no_hp' => $noHP,
            'kode_cabang' => $cabang
        );
        $simpan = $this->M_Pelanggan->updatePelanggan($data, $kodePelanggan);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Pelanggan berhasil diupdate
          </div>');
            redirect('pelanggan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Pelanggan gagal diupdate
          </div>');
            redirect('pelanggan');
        }
    }
    public function hapusPelanggan()
    {
        $kodePelanggan = $this->uri->segment(3);
        $hapus = $this->M_Pelanggan->hapusPelanggan($kodePelanggan);
        if ($hapus == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data pelanggan berhasil dihapus
          </div>');
            redirect('pelanggan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data pelanggan gagal dihapus
          </div>');
            redirect('pelanggan');
        }
    }
}
