<?php
	
	class Mahasiswa_model extends CI_model{
		private $tbl_mahasiswa = "tbl_mahasiswa",
				$ref_jurusan = "ref_jurusan",
				$ref_fakultas = "ref_fakultas";
		
		public function getAllMahasiswa(){
			// get() untuk SELECT * FROM tbl_mahasiswa
			$query = $this->db->get($this->tbl_mahasiswa);
			// fetch data yang banyak result_array() / result()
			return $query->result();
		}

		public function getMahasiswaById($id){

			$this->db->select("{$this->tbl_mahasiswa}.*, {$this->ref_jurusan}.jurusan, {$this->ref_fakultas}.fakultas");
		    $this->db->from($this->tbl_mahasiswa);
		    $this->db->join($this->ref_jurusan, "{$this->tbl_mahasiswa}.id_jurusan = {$this->ref_jurusan}.id", 'inner');
		    $this->db->join($this->ref_fakultas, "{$this->ref_jurusan}.id_fakultas = {$this->ref_fakultas}.id", 'inner');
		    $this->db->where("{$this->tbl_mahasiswa}.id", $id );
		    $query = $this->db->get();
		    return $query->row();
		}

		public function getMahasiswaByName($name){

			$this->db->select("{$this->tbl_mahasiswa}.*");
		    $this->db->from($this->tbl_mahasiswa);
		    $this->db->join($this->ref_jurusan, "{$this->tbl_mahasiswa}.id_jurusan = {$this->ref_jurusan}.id", 'inner');
		    $this->db->join($this->ref_fakultas, "{$this->ref_jurusan}.id_fakultas = {$this->ref_fakultas}.id", 'inner');
		    $this->db->like("{$this->tbl_mahasiswa}.nama", $name);
		    $query = $this->db->get();
		    return $query->result();
		}

		public function tambahDataMahasiswa($postData){
			$data = [
		        'nama' => $postData["nama"],
		        'nim' => $postData["nim"],
		        'email' => $postData["email"],
		        'id_jurusan' => $postData["id_jurusan"]
			];

			return ($this->db->insert($this->tbl_mahasiswa, $data)) ? $this->db->insert_id()  :   false;
		}

		public function hapusDataMahasiswa($id){
			$data = [
				'id' => $id
			];

			$this->db->delete($this->tbl_mahasiswa, $data);

			$updated_status = $this->db->affected_rows();
			if ($updated_status) {
				return $id;
			}else{
				return false;
			}
		}

		public function ubahDataMahasiswa($postData){
			$id =  $postData["id_mhs"];
			$data = array(
		        'nama' => $postData["nama"],
		        'nim' => $postData["nim"],
		        'email' => $postData["email"],
		        'id_jurusan' => $postData["id_jurusan"]
			);

			// $this->db->where('id', $id);
			// $this->db->update($this->tbl_mahasiswa, $data, ['id'=> $id]);
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update($this->tbl_mahasiswa, $data);
			
			$updated_status = $this->db->affected_rows();
			if ($updated_status) {
				return $id;
			}else{
				return false;
			}
		}

	}