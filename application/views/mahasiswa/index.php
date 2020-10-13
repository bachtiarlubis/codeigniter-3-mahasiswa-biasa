
<div class="container">
		
	<div class="row mt-3">
		<div class="col-md-6">
			<form action="<?= base_url("mahasiswa/cari"); ?>/keywoard" method="POST">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="cari mahasiswa..." name="keywoard" id="keywoard" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-outline-primary" type="submit" id="btnCari">Cari</button>
					</div>
				</div>
			</form>	
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-lg-6">
			<!-- Button trigger modal -->
				<!-- data-toggle dan data-target yang akan memicu modal tampil -->
			<button class="btn btn-primary" type="button" id="btnTambahData" data-toggle="modal" data-target="#formModal">
				Tambah Data Mahasiswa
			</button>
		</div>
	</div>

	<div class="row mt-2">
		<div class="col-lg-6">
			<?php if($this->session->flashdata('status') == 'success'): ?>
				<!-- otomatis unset session setelah digunakan -->
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<p><?php echo $this->session->flashdata('pesan'); ?></p>
				</div>
			<?php elseif($this->session->flashdata('status') == 'danger'): ?>
				<!-- otomatis unset session setelah digunakan -->
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<p><?php echo $this->session->flashdata('pesan'); ?></p>
				</div>
			<?php endif; ?>
	
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-6">
			<h3 class="mt-1">Daftar Mahasiswa</h3>
			<ul class="list-group">
				<?php foreach($mahasiswa as $mhs): ?>
			  		<li class="list-group-item">
			  			<?= $mhs->nama; ?>
			  			<?php 
			  				// set attribute id
			  				$frmId = "delForm".$mhs->id;
			  				$attributes = [ 
			  					'id' => $frmId
			  				];
			  				// set input hidden type with name="id_mhs" value="<?= html_escape($mhs->id); ?"
			  				$hidden = [
			  					'id_mhs' => html_escape($mhs->id),
			  					'nim_mhs' => html_escape($mhs->nim),
			  					'nama_mhs' => html_escape($mhs->nama)
			  				];
			  			?>
			  			<a href="#" onclick="sweetConfirm('Hapus data mahasiswa <?= $mhs->nama; ?> dengan nim <?= $mhs->nim ?>', 'Hapus', '<?= $frmId; ?>');" class="badge badge-danger badge-pill float-right ml-1">hapus</a>
			  			
				  		<!-- proses ubah ada di js/my_script.js -->
			  			<a href="" class="badge badge-warning badge-pill float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-idmhs="<?= $mhs->id; ?>" data-urlgetdata="<?= base_url("mahasiswa/getdata"); ?>" data-urlaction="<?= base_url("mahasiswa/ubah"); ?>/nama/nim/email/id_jurusan">ubah</a>
				  		<a href="<?= base_url("mahasiswa/detail/".$mhs->id); ?>" class="badge badge-primary badge-pill float-right ml-1">detail</a>
		  			</li>
		  			<?php
		  				// Generate form fields hapus data mahasiswa
		  				echo form_open('mahasiswa/hapus', $attributes, $hidden);
		  				echo form_close();
		  			?>
			  	<?php endforeach; ?>
			</ul>
		</div>
	</div>

</div>


<!-- Modal -->
<!-- data-backdrop="static" apabila user mengeklik diluar modal tidak akan menutup jendela modal -->
<div class="modal fade" id="formModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>

	      	<form action="<?= base_url("mahasiswa/tambah"); ?>/nama/nim/email/id_jurusan" method="post">
	      		<input type="hidden" style="display: none;" id="id_mhs" name="id_mhs">
		      	<div class="modal-body">
	        		<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama">
				  	</div>
				  	<div class="form-group">
						<label for="nim">NIM</label>
						<input type="number" class="form-control" id="nim" name="nim">
				  	</div>
				  	<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email">
				  	</div>
				  	<div class="form-group">
				    	<label for="id_jurusan">Jurusan</label>
				    	<select class="form-control" id="id_jurusan" name="id_jurusan">
				    		<option value="" selected>Pilih Jurusan</option>
				    		<?php foreach($jurusan as $jrs_mhs): ?>
					      		<option value="<?= $jrs_mhs->id; ?>"><?= $jrs_mhs->jurusan; ?></option>
					    	<?php endforeach ?>
					      	
				    	</select>
				  	</div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        	<button type="submit" onclick="return confirm('Anda yakin ingin menambahkan data ?');" class="btn btn-primary">Tambah Data</button>
		      	</div>
	      	</form>

    	</div>
	</div>
</div>