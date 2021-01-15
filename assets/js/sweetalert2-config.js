const flashDataSuccess = $('.flashdata-success').data('flashdata');

if (flashDataSuccess) {
	Swal.fire({
		title: 'Berhasil',
		text: flashDataSuccess + '!',
		icon: 'success'
	});
}

const flashDataFailed = $('.flashdata-failed').data('flashdata');

if (flashDataFailed) {
	Swal.fire({
		title: 'Gagal',
		text: flashDataFailed + '!',
		icon: 'error'
	});
}

$('.btn-delete').on('click', function(e){
	e.preventDefault();

	const href = $(this).attr('href');
	const name = $(this).data('name');

	Swal.fire({
	  title: 'Apakah Anda yakin?',
	  text: "Menghapus data " + name,
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  cancelButtonText: 'Batal',
	  confirmButtonText: 'Hapus Data!'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	});
});