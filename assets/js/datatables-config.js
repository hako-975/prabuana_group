$(document).ready(function() {
	$('#table_id').DataTable({
		"language": {
            "decimal":        "",
            "emptyTable":     "Tidak ada data",
            "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 data",
            "infoFiltered":   "(Menyaring dari _MAX_ total data)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Menampilkan _MENU_ data",
            "loadingRecords": "Memuat...",
            "processing":     "Pengolahan...",
            "search":         "Cari:",
            "zeroRecords":    "Tidak ada data yang cocok",
            "paginate": {
                "first":      "Awal",
                "last":       "Akhir",
                "next":       "Selanjutnya",
                "previous":   "Sebelumnya"
            },
            "aria": {
                "sortAscending":  ": aktifkan untuk mengurutkan kolom yang naik",
                "sortDescending": ": aktifkan untuk mengurutkan kolom menurun"
            }
        },
        "order": [],
        "pageLength" : 10,
        "lengthMenu" : [[10, 20, 50, -1], [10, 20, 50, 'Semua']]
	});
});