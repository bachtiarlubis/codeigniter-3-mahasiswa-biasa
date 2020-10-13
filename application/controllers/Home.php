<?php 
	
	class Home extends CI_Controller{
		public function index($nama=""){

			$data = [
				"judul" => "Halaman Index",
				// urldecode agar %20 diubah ke white space
				"nama" => urldecode($nama)
			];

			// Untuk dapat menggunakan base_url() function
			$this->load->helper('url');

			// load header
			$this->load->view('templates/header', $data);
			// load body
			$this->load->view('home/index');
			// load footer
			$this->load->view('templates/footer');
		}
	}