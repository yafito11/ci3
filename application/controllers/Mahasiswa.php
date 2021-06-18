<?php 

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
        
    }
    public function index() 
    {
        $data['judul'] = "Tabel Mahasiswa";
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        $this->load->view('Templates/header', $data);
		$this->load->view('Templates/sidebar');
		$this->load->view('mahasiswa/index');
		$this->load->view('Templates/footer');
    }
    
    public function tambah()
    {
        $data['judul'] = "Tambah Data Mahasiswa";
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('nim','NIM','required|numeric');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        if( $this->form_validation->run() == FALSE) 
        {
            
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/sidebar');
            $this->load->view('mahasiswa/tambah');
            $this->load->view('Templates/footer');
        } else {
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('mahasiswa');
        }
    }
    public function hapus($id)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('mahasiswa');
    }

    public function detail($id)
    {
        $data['judul'] = "Detail Mahasiswa";
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $this->load->view('Templates/header', $data);
		$this->load->view('Templates/sidebar');
		$this->load->view('mahasiswa/detail', $data);
		$this->load->view('Templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = "Ubah Data Mahasiswa";
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $data['jurusan'] = ['Sistem Informasi','Teknik Informatika','Ilmu Komunikasi','Bahasa Inggris'];

        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('nim','NIM','required|numeric');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        if( $this->form_validation->run() == FALSE) 
        {
            
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/sidebar');
            $this->load->view('mahasiswa/ubah', $data);
            $this->load->view('Templates/footer');
        } else {
            $this->Mahasiswa_model->ubahDataMahasiswa();
            $this->session->set_flashdata('flash','Diubah');
            redirect('mahasiswa');
        }
    }

}
