<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $judul; ?></title>
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">CI UNPAS</a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>
		  	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    	<div class="navbar-nav">
			    	<a class="nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
			    	<a class="nav-link" href="<?= base_url("mahasiswa/index"); ?>">Mahasiswa</a>
			    	<a class="nav-link" href="<?= base_url("about/index"); ?>">About</a>
		    	</div>
		  	</div>
		</div>
	</nav>