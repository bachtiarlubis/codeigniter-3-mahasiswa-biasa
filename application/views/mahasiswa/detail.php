
<div class="container mt-5 d-flex justify-content-center">
			
	<div class="card" style="width: 18rem;">
		<img src="<?= base_url("assets/img/chrollo.jpg"); ?>" class="card-img-top" alt="<?= $mahasiswa->nama; ?>">
	  	<div class="card-body">
	    	<h5 class="card-title"><?= $mahasiswa->nama; ?></h5>
	    	<h6 class="card-subtitle mb-2 text-muted"><?= $mahasiswa->nim; ?></h6>
	    	<p class="card-text"><?= $mahasiswa->email; ?></p>
	    	<p class="card-text"><?= $mahasiswa->jurusan; ?> (<?= $mahasiswa->fakultas; ?>)</p>
	    	<a href="<?= base_url("mahasiswa/index"); ?>" class="card-link">Kembali</a>
	  </div>
	</div>

</div>