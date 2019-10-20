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
		$data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
		$this->load->view('mahasiswa/index', $data);
	}

	public function tambah()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');

		if ($this->form_validation->run() == false) {
			$this->load->view('mahasiswa/tambah');
		}else{
			$data=[
				'nama'=>$this->input->post('nama'),
				'nrp'=>$this->input->post('nrp'),
				'email'=>$this->input->post('email'),
				'jurusan'=>$this->input->post('jurusan')

			];

			$this->db->insert('mahasiswa', $data);
			redirect('mahasiswa/index');
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
