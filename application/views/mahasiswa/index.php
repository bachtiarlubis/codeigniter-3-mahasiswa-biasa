
<div class="container">
		
	<div class="row mt-3">
		<div class="col-lg-7">
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
		<div class="col-lg-7">
			<a href="<?= base_url("mahasiswa/tambah"); ?>" class="btn btn-primary">Tambah Data Mahasiswa</a>
		</div>
	</div>

	<div class="row mt-2">
		<div class="col-lg-7">
			<?php if($this->session->flashdata()): ?>
				<!-- otomatis unset session setelah digunakan -->
				<div class="alert alert-<?= $this->session->flashdata('status'); ?> alert-dismissible fade show" role="alert">
					<p><?php echo $this->session->flashdata('pesan'); ?></p>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    	<span aria-hidden="true">&times;</span>
				  	</button>
				</div>
			<?php endif; ?>
	
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-lg-7">
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
			  			<a href="" class="badge badge-warning badge-pill float-right ml-1">ubah</a>
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
