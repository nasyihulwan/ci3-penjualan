<?php

class M_Penjualan extends CI_Model
{
    function cekBarang()
    {
        $idUser = $this->session->userdata('id_user');
        return $this->db->get_where('penjualan_detail_temp', array('id_user' => $idUser));
    }

    function getLastFaktur($bulan, $tahun, $cabang)
    {
        $this->db->select('no_faktur');
        $this->db->from('penjualan');
        $this->db->where('kode_cabang', $cabang);
        $this->db->where('MONTH(tgltransaksi)', $bulan);
        $this->db->where('YEAR(tgltransaksi)', $tahun);
        $this->db->order_by('no_faktur', 'desc');
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        $this->db->limit(1);
        return $this->db->get();
    }

    // Data sementara
    function cekBarangTemp($kode_barang, $id_user)
    {
        return $this->db->get_where('penjualan_detail_temp', array(
            'kode_barang' => $kode_barang,
            'id_user' => $id_user
        ));
    }

    function insertBarangTemp($data)
    {
        $this->db->insert('penjualan_detail_temp', $data);
    }

    function getDataBarangTemp($id_user)
    {
        $this->db->select('penjualan_detail_temp.kode_barang,nama_barang,harga,qty,(qty * harga) as total,id_user');
        $this->db->from('penjualan_detail_temp');
        $this->db->join('barang_master', 'penjualan_detail_temp.kode_barang = barang_master.kode_barang');
        $this->db->where('id_user', $id_user);
        return $this->db->get();
    }

    function deleteBarangTemp($kode_barang, $id_user)
    {
        $hapus = $this->db->delete('penjualan_detail_temp', [
            'kode_barang' => $kode_barang,
            'id_user' => $id_user
        ]);
        if ($hapus) {
            return 1;
        } else {
            return 0;
        }
    }

    // Meyinpan data penjualan
    function insertPenjualan($data)
    {
        $simpan = $this->db->insert('penjualan', $data);
        if ($simpan) {
            $detailPenjualan = $this->db->get_where('penjualan_detail_temp', array('id_user' => $data['id_user']));
            $totalPenjualan = 0;
            $berhasil = 0;
            $error = 0;
            foreach ($detailPenjualan->result() as $d) {
                $totalPenjualan = $totalPenjualan + ($d->qty * $d->harga);
                $dataDetail = array(
                    'no_faktur' => $data['no_faktur'],
                    'kode_barang' => $d->kode_barang,
                    'qty' => $d->qty,
                    'harga' => $d->harga,
                );
                $simpanDetail = $this->db->insert('penjualan_detail', $dataDetail);
                if ($simpanDetail) {
                    $berhasil++;
                } else {
                    $error++;
                }
            }
            if ($error > 0) {
                $hapusDetailPenjualan = $this->db->delete('penjualan_detail', array('no_faktur' => $data['no_faktur']));
                $hapusDataPenjualan = $this->db->delete('penjualan', array('no_faktur' => $data['no_faktur']));
                $this->session->set_flashdata("msg", "<div class='alert alert-danger'>Data gagal disimpan!</div>");
                redirect('penjualan/inputPenjualan');
            } else {
                $hapusTemp = $this->db->delete('penjualan_detail_temp', ['id_user' => $data['id_user']]);
                if ($hapusTemp) {
                    if ($data['jenistransaksi'] == "tunai") {
                        $tahun = date('Y');
                        $thn = substr($tahun, 2, 2);
                        $getLastNoBukti = $this->db->query("SELECT nobukti FROM historibayar WHERE YEAR(tglbayar) = '$tahun' ORDER BY nobukti DESC LIMIT 1")->row_array();
                        $nomorTerakhir = $getLastNoBukti['nobukti'];
                        $noBukti = buatKode($nomorTerakhir, $thn, 6);
                        $dataBayar = array(
                            'nobukti' => $noBukti,
                            'no_faktur' => $data['no_faktur'],
                            'tglbayar' => $data['tgltransaksi'],
                            'bayar' => $totalPenjualan,
                            'id_user' => $data['id_user'],
                        );
                        $bayar = $this->db->insert('historibayar', $dataBayar);
                        if ($bayar) {
                            $this->session->set_flashdata("msg", "<div class='alert alert-success'>Data berhasil disimpan!</div>");
                            redirect('penjualan/inputPenjualan');
                        } else {
                            $hapusDetailPenjualan = $this->db->delete('penjualan_detail', array('no_faktur' => $data['no_faktur']));
                            $hapusDataPenjualan = $this->db->delete('penjualan', array('no_faktur' => $data['no_faktur']));
                            $this->session->set_flashdata("msg", "<div class='alert alert-danger'>Data gagal disimpan!</div>");
                            redirect('penjualan/inputPenjualan');
                        }
                    } else {
                        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Data berhasil disimpan!</div>");
                        redirect('penjualan/inputPenjualan');
                    }
                } else {
                    $hapusDetailPenjualan = $this->db->delete('penjualan_detail', array('no_faktur' => $data['no_faktur']));
                    $hapusDataPenjualan = $this->db->delete('penjualan', array('no_faktur' => $data['no_faktur']));
                    $this->session->set_flashdata("msg", "<div class='alert alert-danger'>Data gagal disimpan!</div>");
                    redirect('penjualan/inputPenjualan');
                }
            }
        }
    }

    function getDataPenjualan($rowno, $rowperpage, $no_faktur, $nama_pelanggan, $dari, $sampai)
    {
        if ($no_faktur != "") {
            $this->db->where('penjualan.no_faktur', $no_faktur);
        }
        if ($nama_pelanggan != "") {
            $this->db->like('pelanggan.nama_pelanggan', $nama_pelanggan);
        }
        if ($dari != "") {
            $this->db->where('tgltransaksi > ', $dari);
        }
        if ($sampai != "") {
            $this->db->where('tgltransaksi < ', $sampai);
        }
        $this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,jenistransaksi,jatuhtempo,penjualan.id_user,nama_lengkap,totalpenjualan,totalbayar');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        $this->db->join('view_totalpenjualan', 'penjualan.no_faktur = view_totalpenjualan.no_faktur');
        $this->db->join('view_totalbayar', 'penjualan.no_faktur = view_totalbayar.no_faktur', 'left');
        $this->db->limit($rowperpage, $rowno);
        return $this->db->get();
    }
    function getDataPenjualanCount($no_faktur, $nama_pelanggan, $dari, $sampai)
    {
        if ($no_faktur != "") {
            $this->db->where('penjualan.no_faktur', $no_faktur);
        }
        if ($nama_pelanggan != "") {
            $this->db->like('pelanggan.nama_pelanggan', $nama_pelanggan);
        }
        if ($dari != "") {
            $this->db->where('tgltransaksi > ', $dari);
        }
        if ($sampai != "") {
            $this->db->where('tgltransaksi < ', $sampai);
        }
        $this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,jenistransaksi,jatuhtempo,penjualan.id_user,nama_lengkap,totalpenjualan,totalbayar');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        $this->db->join('view_totalpenjualan', 'penjualan.no_faktur = view_totalpenjualan.no_faktur');
        $this->db->join('view_totalbayar', 'penjualan.no_faktur = view_totalbayar.no_faktur', 'left');
        return $this->db->get();
    }

    // Menghapus data penjualan
    function deletePenjualan($no_faktur)
    {
        $hapus = $this->db->delete('penjualan', ['no_faktur' => $no_faktur]);
        if ($hapus) {
            $hapusDetail = $this->db->delete('penjualan_detail', ['no_faktur' => $no_faktur]);
            if ($hapusDetail) {
                $hapusHistoriBayar = $this->db->delete('historibayar', ['no_faktur' => $no_faktur]);
                if ($hapusHistoriBayar) {
                    $this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert'>Data berhasil dihapus!</div>");
                    redirect('penjualan');
                }
            }
        }
    }

    // Menceteak data penjualan 
    function getPenjualan($no_faktur)
    {
        $this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,alamat_pelanggan,jenistransaksi,jatuhtempo,penjualan.id_user,nama_lengkap as kasir');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        $this->db->where('no_faktur', $no_faktur);
        return $this->db->get();
    }
    function getDetailPenjualan($no_faktur)
    {
        $this->db->select('penjualan_detail.kode_barang,nama_barang,penjualan_detail.harga,qty,satuan');
        $this->db->from('penjualan_detail');
        $this->db->join('barang_master', 'penjualan_detail.kode_barang = barang_master.kode_barang');
        $this->db->where('no_faktur', $no_faktur);
        return $this->db->get();
    }

    // Pembayaran kredit
    function getBayar($no_faktur)
    {
        return $this->db->get_where('historibayar', ['no_faktur' => $no_faktur]);
    }
    function insertBayar()
    {
        $id_user = $this->session->userdata('id_user');
        $no_faktur = $this->input->post('i_no_faktur');
        $tglBayar = $this->input->post('i_tglBayar');
        $jmlBayar = $this->input->post('i_jmlBayar');

        $tahun = date('Y');
        $thn = substr($tahun, 2, 2);
        $getLastNoBukti = $this->db->query("SELECT nobukti FROM historibayar WHERE YEAR(tglbayar) = '$tahun' ORDER BY nobukti DESC LIMIT 1")->row_array();
        $nomorTerakhir = $getLastNoBukti['nobukti'];
        $noBukti = buatKode($nomorTerakhir, $thn, 6);
        $dataBayar = array(
            'nobukti' => $noBukti,
            'no_faktur' => $no_faktur,
            'tglbayar' => $tglBayar,
            'bayar' => $jmlBayar,
            'id_user' => $id_user,
        );
        $bayar = $this->db->insert('historibayar', $dataBayar);
        if ($bayar) {
            $this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert'>Data berhasil disimpan!</div>");
            redirect('penjualan/detailFaktur/' . $no_faktur);
        } else {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>Data gagal disimpan!</div>");
            redirect('penjualan/detailFaktur/' . $no_faktur);
        }
    }

    // Menghapus pembayaran kredit
    function deleteBayar($nobukti, $no_faktur)
    {
        $hapus = $this->db->delete('historibayar', ['nobukti' => $nobukti]);
        if ($hapus) {
            $this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert'>Data berhasil dihapus!</div>");
            redirect('penjualan/detailFaktur/' . $no_faktur);
        } else {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>Data gagal dihapus!</div>");
            redirect('penjualan/detailFaktur/' . $no_faktur);
        }
    }

    // Mendapatkan data laporan penjualan
    function getLaporanPenjualan($cabang = "", $dari, $sampai)
    {
        if ($cabang != "") {
            $this->db->where('users.kode_cabang', $cabang);
        }

        $this->db->where('tgltransaksi >=', $dari);
        $this->db->where('tgltransaksi <=', $sampai);
        $this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,jenistransaksi,jatuhtempo,penjualan.id_user,nama_lengkap,totalpenjualan,totalbayar');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        $this->db->join('view_totalpenjualan', 'penjualan.no_faktur = view_totalpenjualan.no_faktur');
        $this->db->join('view_totalbayar', 'penjualan.no_faktur = view_totalbayar.no_faktur', 'left');
        return $this->db->get();
    }

    // Menampilkan penjualan hari ini
    function getDataPenjualanHariIni()
    {
        $hariIni = date('Y-m-d');
        if ($this->session->userdata('kode_cabang') != "PST") {
            $this->db->where('users.kode_cabang', $this->session->userdata('kode_cabang'));
        }
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        return $this->db->get_where('penjualan', array('tgltransaksi' => $hariIni));
    }

    // Menampilkan pendapatan hari ini
    function getBayarHariIni()
    {
        if ($this->session->userdata('kode_cabang') != "PST") {
            $this->db->where('users.kode_cabang', $this->session->userdata('kode_cabang'));
        }
        $hariIni = date('Y-m-d');
        $this->db->select('SUM(bayar) as totalbayar');
        $this->db->from('historibayar');
        $this->db->join('penjualan', 'historibayar.no_faktur = penjualan.no_faktur');
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        $this->db->where('tglbayar', $hariIni);
        return $this->db->get();
    }

    // Menampilkan grafik pendapatan
    function getPenjualanPerBulan()
    {
        $tahun = date('Y');
        $query = "SELECT id,namabulan,totalpenjualan FROM bulan 
        LEFT JOIN ( 
        SELECT
        MONTH(tgltransaksi) as bulan ,SUM(harga*qty) as totalpenjualan
        FROM penjualan_detail
        INNER JOIN penjualan ON penjualan_detail.no_faktur = penjualan.no_faktur
        WHERE YEAR(tgltransaksi) = '$tahun'
        GROUP BY MONTH(tgltransaksi)
        ) pnj ON (bulan.id = pnj.bulan)";

        return $this->db->query($query);
    }
}
