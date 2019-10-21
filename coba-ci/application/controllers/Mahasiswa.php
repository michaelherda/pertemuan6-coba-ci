<?php 

class Mahasiswa extends CI_Controller 
{

	public function __construct(){
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
        
        
    }

	public function index()
	{
        $data['judul'] = 'Daftar Mahasiswa';
		$data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        if ($this->input->post('keyword')) {
            $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        }
        $this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
	}

	public function tambah()
	{
        $data['judul'] = 'Form Tambah Data Mahasiswa';

        $this->load->view('templates/header',$data);
        $this->load->view('templates/footer');

		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
         $this->form_validation->set_rules('nrp', '<b>NRP</b>', 'required|numeric');
        $this->form_validation->set_rules('email', '<b>Email</b>', 'required|valid_email');

		if ($this->form_validation->run() == false) {
            // $this->load->view('templates/header', $data);
			$this->load->view('mahasiswa/tambah');
            // $this->load->view('templates/header');
		}else{
			$this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('mahasiswa');
			// $this->db->insert('mahasiswa', $data);
			// redirect('mahasiswa/index');
		}

	}

	 public function hapus($id){
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }

    public function detail($id){
        $data['judul']='Detail Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $this->load->view('templates/header',$data);
        $this->load->view('mahasiswa/detail',$data);
        $this->load->view('templates/footer');;
    }
    
    public function ubah($id){
        $data['judul'] = 'Form Ubah Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $data['jurusan'] = ['Teknik Industri', 'Teknologi Pangan', 'Teknik Mesin', 'Teknik Informatika', 'Teknik Lingkungan', 'Teknik Perencanaan & Wilayah Tata Kota'];
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/ubah');
            $this->load->view('templates/footer');
        }else {
            $this->Mahasiswa_model->ubahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('mahasiswa');
        }   
    }

}
