<?php
defined('BASEPATH') or exit('No Direct script access allowed');
class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index($table)
    {
        $data['judul'] = 'Laporan Data ' . $table;
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        // if ($table == 'member'){
        //     $this->db->where_not_in('role_id !=', '1');
        // }
        $data[$table] = $this->ModelLaporan->getData($table)->result_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("laporan/laporan-$table", $data);
        $this->load->view('templates/footer');
    }
    public function cetak_laporan($table)
    {
        $data[$table] = $this->ModelLaporan->getData($table)->result_array();
        if ($table == 'buku') {
            $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
        }

        $this->load->view("laporan/laporan-print-$table", $data);
    }
    public function cetak_laporan_pdf($table)
    {
        $data[$table] = $this->ModelLaporan->getData($table)->result_array();
        if ($table == 'buku') {
            $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
        }

        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $this->pdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->pdf->filename = "laporan_data_$table.pdf";
        $this->pdf->load_view("laporan/laporan-pdf-$table", $data);
    }

    public function export_excel($table){
        $data['judul'] = $table;
        $data[$table] = $this->ModelLaporan->getData($table)->result_array();
        if ($table == 'buku') {
            $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
        }
        $this->load->view("laporan/laporan-excel-$table", $data);
    }
}
