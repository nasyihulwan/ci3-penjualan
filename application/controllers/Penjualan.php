<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekSession();
        $this->load->model('M_Penjualan');
        $this->load->model('M_Pelanggan');
        $this->load->model('M_Barang');
        $this->load->model('M_Cabang');
    }
    public function index($rowno = 0)
    {
        $no_faktur = "";
        $nama_pelanggan = "";
        $dari = "";
        $sampai = "";
        if (isset($_POST['submit'])) {
            $no_faktur = $this->input->post('noFaktur');
            $nama_pelanggan = $this->input->post('namaPelanggan');
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $data = array(
                'no_faktur' => $no_faktur,
                'nama_pelanggan' => $nama_pelanggan,
                'dari' => $dari,
                'sampai' => $sampai,
            );
            $this->session->set_userdata($data);
        } else {
            if ($this->session->userdata('no_faktur') != NULL) {
                $no_faktur = $this->session->userdata('no_faktur');
            }
            if ($this->session->userdata('nama_pelanggan') != NULL) {
                $no_faktur = $this->session->userdata('nama_pelanggan');
            }
            if ($this->session->userdata('dari') != NULL) {
                $no_faktur = $this->session->userdata('dari');
            }
            if ($this->session->userdata('sampai') != NULL) {
                $no_faktur = $this->session->userdata('sampai');
            }
        }
        $rowperpage = 2;
        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        $jumlahdata    = $this->M_Penjualan->getDataPenjualanCount($no_faktur, $nama_pelanggan, $dari, $sampai)->num_rows();

        // Get records
        $datapenjualan = $this->M_Penjualan->getDataPenjualan($rowno, $rowperpage, $no_faktur, $nama_pelanggan, $dari, $sampai)->result();
        $config['base_url']         = base_url() . 'penjualan/index';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows']       = $jumlahdata;
        $config['per_page']         = $rowperpage;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        // Initialize
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['penjualan'] = $datapenjualan;
        $data['row'] = $rowno;
        $data['no_faktur'] = $no_faktur;
        $data['nama_pelanggan'] = $nama_pelanggan;
        $data['dari'] = $dari;
        $data['sampai'] = $sampai;
        $this->template->load('template/template', 'penjualan/v_penjualan', $data);
    }
    public function inputPenjualan()
    {
        $bulan = date('m');
        $tahun = date('Y');
        $thn = substr($tahun, 2, 2);
        $cabang = $this->session->userdata('kode_cabang');

        $getlastFaktur = $this->M_Penjualan->getLastFaktur($bulan, $tahun, $cabang)->row_array();
        $noTerakhir = $getlastFaktur['no_faktur'];
        $noFaktur = buatKode($noTerakhir, $cabang . $bulan . $thn, 4);
        $data["no_faktur"] = $noFaktur;
        $data["pelanggan"] = $this->M_Pelanggan->getDataPelanggan()->result();
        $data["harga"] = $this->M_Barang->getDataHarga()->result();
        $this->template->load('template/template', 'penjualan/input_penjualan', $data);
    }
    public function getJatuhTempo()
    {
        $tglTransaksi = $this->input->post('tglTransaksi');
        $jatuhTempo = date('Y-m-d', strtotime("+1 month", strtotime(date($tglTransaksi))));
        echo $jatuhTempo;
    }
    public function cekBarang()
    {
        $jmlDataBarang = $this->M_Penjualan->cekBarang()->num_rows();
        echo $jmlDataBarang;
    }

    // Data sementara
    public function simpanBarangTemp()
    {
        $kode_barang = $this->input->post('kode_barang');
        $harga = $this->input->post('harga');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');

        $cekBarangTemp = $this->M_Penjualan->cekBarangTemp($kode_barang, $id_user)->num_rows();
        if ($cekBarangTemp > 0) {
            echo "1";
        } else {
            $data = array(
                'kode_barang'  => $kode_barang,
                'harga'  => $harga,
                'qty'  => $qty,
                'id_user'  => $id_user
            );
            $simpan = $this->M_Penjualan->insertBarangTemp($data);
        }
    }

    public function getDataBarangTemp()
    {
        $id_user = $this->input->post('id_user');
        $data["barangTemp"] = $this->M_Penjualan->getDataBarangTemp($id_user)->result();
        $this->load->view('penjualan/penjualan_detail_temp', $data);
    }
    public function hapusBarangTemp()
    {
        $kode_barang = $this->input->post('kode_barang');
        $id_user = $this->input->post('id_user');
        $hapus = $this->M_Penjualan->deleteBarangTemp($kode_barang, $id_user);
        echo $hapus;
    }

    // ./

    // Menyimpan data penjualan
    public function simpanPenjualan()
    {
        $no_faktur = $this->input->post('noFaktur');
        $tgl_transaksi = $this->input->post('tglTransaksi');
        $kode_pelanggan = $this->input->post('kodePelanggan');
        $jenis_transaksi = $this->input->post('jenisTransaksi');
        $jatuh_tempo = $this->input->post('jatuhTempo');
        $id_user = $this->input->post('idUser');

        $data = array(
            'no_faktur' => $no_faktur,
            'tgltransaksi' => $tgl_transaksi,
            'kode_pelanggan' => $kode_pelanggan,
            'jenistransaksi' => $jenis_transaksi,
            'jatuhtempo' => $jatuh_tempo,
            'id_user' => $id_user
        );
        $simpan = $this->M_Penjualan->insertPenjualan($data, $jenis_transaksi, $id_user, $no_faktur);
    }

    // Menghapus data penjualan
    public function hapusPenjualan()
    {
        $no_faktur = $this->uri->segment(3);
        $hapus = $this->M_Penjualan->deletePenjualan($no_faktur);
    }

    // Mencetak data penjualan
    public function cetakPenjualan()
    {
        $no_faktur = $this->uri->segment(3);
        $data['penjualan'] = $this->M_Penjualan->getPenjualan($no_faktur)->row_array();
        $data['detail'] = $this->M_Penjualan->getDetailPenjualan($no_faktur)->result();
        $this->load->view('penjualan/cetak_penjualan', $data);
    }

    // Menampilkan detail faktur, melakukan pembayaran kredit
    public function detailFaktur()
    {
        $no_faktur = $this->uri->segment(3);
        $data['penjualan'] = $this->M_Penjualan->getPenjualan($no_faktur)->row_array();
        $data['detail'] = $this->M_Penjualan->getDetailPenjualan($no_faktur)->result();
        $data['bayar'] = $this->M_Penjualan->getBayar($no_faktur)->result();
        $this->template->load('template/template', 'penjualan/detail_faktur', $data);
    }

    // Pembayaran kredit
    public function inputBayar()
    {
        $data['no_faktur'] = $this->input->post('noFaktur');
        $data['grandtotal'] = $this->input->post('grandTotal');
        $data['totalbayar'] = $this->input->post('totalBayar');
        $this->load->view('penjualan/input_bayar', $data);
    }
    public function simpanBayar()
    {
        $this->M_Penjualan->insertBayar();
    }

    // Menghapus pembayaran kredit
    public function hapusBayar()
    {
        $nobukti = $this->uri->segment(3);
        $no_faktur = $this->uri->segment(4);
        $this->M_Penjualan->deleteBayar($nobukti, $no_faktur);
    }

    // Mencetak laporan penjualan
    public function laporanPenjualan()
    {
        $data["cabang"] = $this->M_Cabang->getDataCabang()->result();
        $this->template->load('template/template', 'penjualan/laporan_penjualan', $data);
    }
    public function cetakLaporanPenjualan()
    {
        $cabang = $this->input->post('cabang');
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $data["cabang"] = $cabang;
        $data["dari"] = $dari;
        $data["sampai"] = $sampai;
        $data['laporanPenjualan'] = $this->M_Penjualan->getLaporanPenjualan($cabang, $dari, $sampai)->result();
        if (isset($_POST['export'])) {
            // Fungsi header dengan mengirimkan raw data excel
            header("Content-type: application/vnd-ms-excel");

            // Mendefinisikan nama file ekspor "hasil-export.xls"
            header("Content-Disposition: attachment; filename=Laporan Penjualan.xls");
        }
        $this->load->view('penjualan/cetak_laporan_penjualan', $data);
    }
}
