<?php
	
	class Jurusan_model extends CI_model{
		private $ref_jurusan = "ref_jurusan",
				$ref_fakultas = "ref_fakultas";

		public function getAllJurusan(){
			$this->db->select("{$this->ref_jurusan}.id, {$this->ref_jurusan}.jurusan, {$this->ref_jurusan}.id_fakultas, {$this->ref_fakultas}.fakultas");
			$this->db->from($this->ref_jurusan);
			$this->db->join($this->ref_fakultas, "{$this->ref_jurusan}.id_fakultas = {$this->ref_fakultas}.id", 'inner');
			$query = $this->db->get();

			return $query->result();

			// Produces:
			// SELECT id, jurusan, id_fakultas, fakultas 
			// FROM ref_jurusan 
			// INNER JOIN ref_fakultas ON ref_jurusan.id_fakultas = ref_fakultas.id
		}
	}