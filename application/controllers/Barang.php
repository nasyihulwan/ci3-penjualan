<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekSession();
        $this->load->model('M_Barang');
        $this->load->model('M_Cabang');
    }
    public function index()
    {
        $data["barang"] = $this->M_Barang->getDataBarang()->result();
        $this->template->load('template/template', 'barang/v_barang', $data);
    }
    public function inputBarang()
    {
        $this->load->view('barang/input_barang');
    }
    public function simpanBarang()
    {
        $kodeBarang = $this->input->post('kodeBarang');
        $namaBarang = $this->input->post('namaBarang');
        $satuan = $this->input->post('satuan');

        $data = array(
            'kode_barang' => $kodeBarang,
            'nama_barang' => $namaBarang,
            'satuan' => $satuan
        );
        $simpan = $this->M_Barang->insertBarang($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil disimpan
          </div>');
            redirect('barang');
        }
    }
    public function editBarang()
    {
        $kodeBarang = $this->uri->segment(3);
        $barangDetail = $this->M_Barang->getBarang($kodeBarang);
        $data = array(
            'updateBarang' => $barangDetail
        );
        $this->load->view('barang/edit_barang', $data);
    }
    public function updateBarang()
    {
        $kodeBarang = $this->input->post('kodeBarang');
        $namaBarang = $this->input->post('namaBarang');
        $satuan = $this->input->post('satuan');

        $data = array(
            'nama_barang' => $namaBarang,
            'satuan' => $satuan
        );
        $simpan = $this->M_Barang->updateBarang($data, $kodeBarang);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil update
          </div>');
            redirect('barang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data gagal update
          </div>');
            redirect('barang');
        }
    }
    public function hapusBarang()
    {
        $kodeBarang = $this->uri->segment(3);
        $hapus = $this->M_Barang->hapusBarang($kodeBarang);
        if ($hapus == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil dihapus
          </div>');
            redirect('barang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data gagal dihapus
          </div>');
            redirect('barang');
        }
    }


    // Harga
    public function harga()
    {
        $data["harga"] = $this->M_Barang->getDataHarga()->result();
        $this->template->load('template/template', 'barang/v_harga', $data);
    }
    public function inputHarga()
    {
        $data["barang"] = $this->M_Barang->getDataBarang()->result();
        $data["cabang"] = $this->M_Cabang->getDataCabang()->result();
        $this->load->view('barang/input_harga', $data);
    }
    public function simpanHarga()
    {
        $kodeHarga = $this->input->post('kodeHarga');
        $kodeBarang = $this->input->post('kodeBarang');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $cabang = $this->input->post('cabang');

        $data = array(
            'kode_harga' => $kodeHarga,
            'kode_barang' => $kodeBarang,
            'harga' => $harga,
            'stok' => $stok,
            'kode_cabang' => $cabang,
        );
        $simpan = $this->M_Barang->insertHarga($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil disimpan
          </div>');
            redirect('barang/harga');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data gagal disimpan
          </div>');
            redirect('barang/harga');
        }
    }
    public function editHarga()
    {
        $kodeHarga = $this->uri->segment(3);
        $hargaDetail = $this->M_Barang->getHarga($kodeHarga)->row();
        $data = array(
            'updateHarga' => $hargaDetail
        );
        $data["barang"] = $this->M_Barang->getDataBarang()->result();
        $data["cabang"] = $this->M_Cabang->getDataCabang()->result();
        $this->load->view('barang/edit_harga', $data);
    }
    public function updateHarga()
    {
        $kodeHarga = $this->input->post('kodeHarga');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        $data = array(
            'harga' => $harga,
            'stok' => $stok,
        );
        $simpan = $this->M_Barang->updateHarga($data, $kodeHarga);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil update
          </div>');
            redirect('barang/harga');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data gagal update
          </div>');
            redirect('barang/harga');
        }
    }
    public function hapusHarga()
    {
        $kodeHarga = $this->uri->segment(3);
        $hapus = $this->M_Barang->hapusHarga($kodeHarga);
        if ($hapus == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil dihapus
          </div>');
            redirect('barang/harga');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data gagal dihapus
          </div>');
            redirect('barang/harga');
        }
    }
}
