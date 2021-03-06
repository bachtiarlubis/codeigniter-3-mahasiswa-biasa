
<div class="container">
	<div class="row mt-3">
		<div class="col-lg-7">
			
			<div class="card">
				<div class="card-header">
			    	Form Tambah Data Mahasiswa
			  	</div>
			  	<div class="card-body">
			  		<!-- Untuk menampilkan error validasi -->
			  		<?php 
			  			/*if(validation_errors()){
			  				echo validation_errors('<p class="alert alert-danger alert-dismissible fade show" role="alert">
			  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  							</button>'); 
			  			 } */
  					?>

			  		<!-- actionnya berarti mahasiswa/tambah karena dikosongkan -->
			    	<form action="" method="post">
						<div class="form-group">
					    	<label for="nama">Nama</label>
					    	<input type="text" name="nama" class="form-control" id="nama">
					    	<?php if (form_error('nama')): ?>
			    				<small class="text-danger mt-1 form-text " role="alert">
					    			<?= form_error('nama'); ?>
					    			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    							<span aria-hidden="true">&times;</span>
		  							</button>
		  						</small>
					    	<?php endif ?>
						</div>

						<div class="form-group">
					    	<label for="nim">NIM</label>
					    	<input type="number" name="nim" class="form-control" id="nim">
					    	<?php if (form_error('nim')): ?>
					    		<small class="text-danger mt-1 form-text " role="alert">
					    			<?= form_error('nim'); ?>
					    			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    							<span aria-hidden="true">&times;</span>
		  							</button>
					    		</small>
					    	<?php endif ?>
						</div>

						<div class="form-group">
					    	<label for="email">Email</label>
					    	<input type="text" name="email" class="form-control" id="email">
					    	<?php if (form_error('email')): ?>
					    		<small class="text-danger mt-1 form-text " role="alert">
					    			<?= form_error('email'); ?>
					    			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    							<span aria-hidden="true">&times;</span>
		  							</button>
					    		</small>
					    	<?php endif ?>
						</div>

						<div class="form-group">
						    <label for="jurusan">Jurusan</label>
						    <select class="form-control" id="jurusan" name="jurusan">
						    	<option value="">::Pilih Jurusan::</option>
						    	<?php foreach($jurusan as $jrs): ?>
						    		<option value="<?= $jrs->id; ?>"><?= $jrs->jurusan; ?> (<?= $jrs->fakultas; ?>)</option>
						    	<?php endforeach ?>
							</select>
							<?php if (form_error('jurusan')): ?>
					    		<small class="text-danger mt-1 form-text " role="alert">
					    			<?= form_error('jurusan'); ?>
					    			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    							<span aria-hidden="true">&times;</span>
		  							</button>
					    		</small>
					    	<?php endif ?>
						</div>

						<button type="submit" name="tbh_submit" class="btn btn-primary float-right">Tambah Data</button>
						<button type="reset" name="tbh_submit" class="btn btn-warning float-right mr-2">Reset Data</button>

					</form>

				</div>
			</div>

		</div>
	</div>
</div>