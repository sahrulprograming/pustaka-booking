<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['judul'] = 'katalog buku';
        $data['buku'] = $this->ModelBuku->getBuku()->result();

        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama'];
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('buku/daftar-buku');
            $this->load->view('templates/templates-user/modal');
            $this->load->view('templates/templates-user/footer');
        } else {
            $data['user'] = 'Pengunjung';
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('buku/daftar-buku');
            $this->load->view('templates/templates-user/modal');
            $this->load->view('templates/templates-user/footer');
        }
    }
    public function detailBuku()
    {
        $id = $this->uri->segment(3);
        $buku = $this->ModelBuku->joinKategoriBuku(['buku.id' => $id])->result();

        $data['user'] = 'Pengunjung';
        $data['title'] = 'Detail Buku';

        foreach ($buku as $fields) {
            $data['judul'] = $fields->judul_buku;
            $data['pengarang'] = $fields->pengarang;
            $data['penerbit'] = $fields->penerbit;
            $data['kategori'] = $fields->kategori;
            $data['tahun'] = $fields->tahun_terbit;
            $data['isbn'] = $fields->isbn;
            $data['gambar'] = $fields->image;
            $data['dipinjam'] = $fields->dipinjam;
            $data['dibooking'] = $fields->dibooking;
            $data['stok'] = $fields->stok;
            $data['id'] = $id;
        }
        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('buku/detail-buku');
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer');
    }
}
