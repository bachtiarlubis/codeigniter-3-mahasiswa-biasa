
<div class="container">
	<div class="row mt-3">
		<div class="col-lg-7">
			
			<div class="card">
				<div class="card-header">
			    	Form Ubah Data Mahasiswa
			  	</div>
			  	<div class="card-body">

			  		<!-- actionnya berarti mahasiswa/tambah karena dikosongkan -->
			    	<form action="" id="ubh_data_mhs" method="post">
			    		<input type="hidden" name="id_mhs" id="id_mhs" value="<?= set_value('id_mhs', $mahasiswa->id); ?>">
						<div class="form-group">
					    	<label for="nama">Nama</label>
					    	<input type="text" name="nama" class="form-control" id="nama" value="<?= set_value('nama', $mahasiswa->nama); ?>">
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
					    	<input type="number" name="nim" class="form-control" id="nim" value="<?= set_value('nim', $mahasiswa->nim); ?>">
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
					    	<input type="text" name="email" class="form-control" id="email" value="<?= set_value('email', $mahasiswa->email); ?>">
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
						    	<option value="" >::Pilih Jurusan::</option>
						    	<?php foreach($jurusan as $jrs): ?>
						    		<?php if($jrs->id == $mahasiswa->id_jurusan): ?>
						    			<option value="<?= $jrs->id; ?>" selected><?= $jrs->jurusan; ?> (<?= $jrs->fakultas; ?>)</option>
						    		<?php else: ?>
						    			<option value="<?= $jrs->id; ?>"><?= $jrs->jurusan; ?> (<?= $jrs->fakultas; ?>)</option>
						    		<?php endif; ?>
						    	<?php endforeach; ?>
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

						<button type="button" name="ubh_submit" onclick="sweetConfirm('Ubah data mahasiswa <?= $mahasiswa->nama; ?> nim <?= $mahasiswa->nim ?>', 'ubah', 'ubh_data_mhs');" class="btn btn-primary float-right">Ubah Data</button>
						<button type="reset" name="ubh_submit" class="btn btn-warning float-right mr-2">Reset Data</button>

					</form>

				</div>
			</div>

		</div>
	</div>
</div>