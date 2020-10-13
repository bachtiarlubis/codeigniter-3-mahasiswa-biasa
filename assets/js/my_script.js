/* 
sama dengan :
	$(document).ready(function(){

	});
*/
$(function(){
	// set judul modal dan tombol submit tambah data
	$("#btnTambahData").on('click',  function(event) {
		$("#judulModal").html('Tambah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Tambah Data');
	});

	
	$(".tampilModalUbah").on('click', function(event) {
		// ambil value dari attribute data-idmhs
		const id = $(this).data('idmhs');
		// ambil value dari attribute data-urlgetdata
		const url = $(this).data('urlgetdata');
		// ambil value dari attribute data-urlaction
		const action = $(this).data('urlaction');

		const ubahOnclick = "return confirm('Anda ingin merubah data ini ?');";

		// ganti judul modal
		$("#judulModal").html('Ubah Data Mahasiswa');
		// ganti text tombol submit
		$('.modal-footer button[type=submit]').html('Ubah Data');
		// ganti url action dari element form modal
		$('.modal-content form').attr({
			action: action
		});
		// ganti onclick modal
		$('.modal-content form button[type=submit]').attr({
			onclick: ubahOnclick
		});
		
		// Ajax untuk memuat data mahasiswa di modal
		$.ajax({
			url: url,
			type: 'post',
			dataType : 'json',
			data: {
				id: id,
			},
		})
		.done(function(data) {
			console.log(data.mahasiswa);
			// set nilai input form di modal
			$('#id_mhs').val(data.mahasiswa.id);
			$('#nama').val(data.mahasiswa.nama);
			$('#nim').val(data.mahasiswa.nim);
			$('#email').val(data.mahasiswa.email);
			$('#id_jurusan').val(data.mahasiswa.id_jurusan);

		})
		.fail(function(err) {
			console.log("Error bro...");
			console.log(err);
		})
		.always(function(data) {
			console.log("Selesai bro...");
			console.log("nama"+$('#nama').val());
		});
		
	});
});

// Fungsi konfirmasi proses sweetalert2
var sweetConfirm = (pesan, btnConf, frmId) => {
	var confBtnTxt = ucwordsJs(btnConf);
	
	// var tipe = ['success', 'warning', 'error', 'question', 'info'];

	Swal.fire({
		title: 'Anda yakin ?',
		text: pesan,
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancel',
		confirmButtonText: confBtnTxt,
		showCloseButton: true,
		reverseButtons: true
	}).then((result) => {
  		if (result.isConfirmed) {
 			$("#"+frmId).submit();
 			// sweetAlert('Data selesai diproses !');
  		}
	});			
}

var sweetAlert = (pesan, title='berhasil', status='success') => {
	// status = 'success', 'danger', 'warning', 'info'
	title = ucwordsJs(title);
	pesan = ucwordsJs(pesan);
	Swal.fire(
	  title,
	  pesan,
	  status
	)
}

// Fungsi uppercase huruf pertama dari suatu kata
var ucwordsJs = (str) => {
	str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
	    return letter.toUpperCase();
	});

	return str;
}
