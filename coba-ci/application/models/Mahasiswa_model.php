<?php 

class Mahasiswa_model extends CI_Model
{
	
	public function getAllMahasiswa()
	{
		return $this->db->get('mahasiswa')->result_array();
	}

    public function hapusDataMahasiswa($id){
        $this->db->delete('mahasiswa', ['id'=>$id]);
    }

    public function getMahasiswaById($id){
        return $this->db->get_where('mahasiswa', ['id'=> $id])->row_array();
    }

    public function ubahDataMahasiswa(){
        $data = [
                "nama" => $this->input->post('nama', true),
                "nrp" => $this->input->post('nrp', true),
                "email" => $this->input->post('email', true),
                "email" => $this->input->post('jurusan', true),
        ];
        $this->db->where('id', $this->input->post('id'));
        
        $this->db->update('mahasiswa', $data);
        
    }

}