<?php 
	
	class Mahasiswa extends CI_Controller{
		public function __construct(){
			parent::__construct();
			// $this->load->helper("url");
			// load model
			$this->load->model("Mahasiswa_model");
			$this->load->model("Jurusan_model");

			$this->load->library("form_validation");
		}

		public function index(){
			$data = [
				"judul" => "Halaman Mahasiswa",
				"mahasiswa" => $this->Mahasiswa_model->getAllMahasiswa(),
				"jurusan" => $this->Jurusan_model->getAllJurusan()
			];
			
			$this->load->view("templates/header", $data);
			$this->load->view("mahasiswa/index");
			$this->load->view("templates/footer");
		}

		public function detail($id){

			$data = [
				'judul' => 'Detail Mahasiswa',
				'mahasiswa' => $this->Mahasiswa_model->getMahasiswaById($id)
			];

			$this->load->view("templates/header", $data);
			$this->load->view("mahasiswa/detail");
			$this->load->view("templates/footer");
		}

		public function cari(){
			$keywoard = $this->input->post('keywoard');
			$data = [
				"judul" => "Cari Mahasiswa",
				"mahasiswa" => $this->Mahasiswa_model->getMahasiswaByName($keywoard),
				"jurusan" => $this->Jurusan_model->getAllJurusan()
			];

			$this->load->view("templates/header", $data);
			$this->load->view("mahasiswa/index");
			$this->load->view("templates/footer");
		}


		public function tambah(){
			$data = [
				'judul' => 'Form Tambah Data Mahasiswa',
				"jurusan" => $this->Jurusan_model->getAllJurusan()
			];

			$this->form_validation->set_rules('nama', 'NAMA', 'trim|required',
				['required' => "<b>%s</b> tidak boleh kosong !"]
			);
			$this->form_validation->set_rules('nim', 'NIM', 'trim|required|numeric',
				[
					'required' => "<b>%s</b> tidak boleh kosong !",
					'numeric' => "<b>%s</b> harus angka !"
				]
			);
			$this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email',
				[
					'required' => "<b>%s</b> tidak boleh kosong !",
					'valid_email' => "<b>%s</b> tidak valid bambang !"
				]
			);
			$this->form_validation->set_rules('jurusan', 'JURUSAN', 'trim|required',
				['required' => "<b>%s</b> tidak boleh kosong !"]
			);

			// cek apakah gagal validasi input form
			if ($this->form_validation->run() == FALSE) {
				
				$this->load->view("templates/header", $data);
				$this->load->view("mahasiswa/tambah");
				$this->load->view("templates/footer");		

			} else {

				// $postData = $this->input->post(); // dapat dipanggil langsung di model
				// $updateData = $this->Mahasiswa_model->tambahDataMahasiswa($postData);
				$insertData = $this->Mahasiswa_model->tambahDataMahasiswa();
				if ($insertData !== false) {
					
					// set session
					$this->session->set_flashdata('status', 'success');
					$this->session->set_flashdata('pesan', 'Data <b>'.$this->input->post("nim", true).' '.$this->input->post("nama", true).'</b> berhasil ditambahkan');

					redirect('mahasiswa/index');
				}else{
					// alert if we failed
					// set session
					$this->session->set_flashdata('status', 'danger');
					$this->session->set_flashdata('pesan', 'Data <b>'.$this->input->post("nim", true).' '.$this->input->post("nama", true).'</b> gagal ditambahkan');

					redirect('mahasiswa/index');
				}

			}
		}

		public function hapus(){
			$id = $this->input->post('id_mhs');
			$nim = $this->input->post('nim_mhs');
			$nama = $this->input->post('nama_mhs');

			if ($this->Mahasiswa_model->hapusDataMahasiswa($id) !== false) {

				// set session
				$this->session->set_flashdata('status', 'success');
				$this->session->set_flashdata('pesan', 'Data <b>'.$nim.' '.$nama.'</b> berhasil dihapus');

				// redirect ke method index()
				// header("location:".base_url("mahasiswa/index"));
				redirect('mahasiswa/index');

			}else{
				// set session
				$this->session->set_flashdata('status', 'danger');
				$this->session->set_flashdata('pesan', 'Data <b>'.$nim.' '.$nama.'</b> gagal dihapus');

				// redirect ke method index()
				// header("location:".base_url("mahasiswa/index"));
				redirect('mahasiswa/index');
			}
		}

		// Ajax untuk menampilkan data di modal
		public function getData(){
			$id = $this->input->post('id');
			$data = [
				'mahasiswa' => $this->Mahasiswa_model->getMahasiswaById($id)
			];

			// nilai kembalian ajax
			echo json_encode($data);
		}

		public function ubah(){
			$postData = $this->input->post();
			$updateData = $this->Mahasiswa_model->ubahDataMahasiswa($postData);
			if ($updateData !== false) {
				
				// set session
				$this->session->set_flashdata('status', 'success');
				$this->session->set_flashdata('pesan', 'Data <b>'.$_POST["nim"].' '.$_POST["nama"].'</b> berhasil diubah');

				// redirect ke method index()
				// header("location:".base_url("mahasiswa/index"));
				redirect('mahasiswa/index');
			}else{
				// alert it we failed
				// set session
				$this->session->set_flashdata('status', 'danger');
				$this->session->set_flashdata('pesan', 'Data <b>'.$_POST["nim"].' '.$_POST["nama"].'</b> gagal diubah');

				/*var_dump($postData);
				var_dump($updateData);*/

				// redirect ke method index()
				// header("location:".base_url("mahasiswa/index"));
				redirect('mahasiswa/index');
			}
		}
	}