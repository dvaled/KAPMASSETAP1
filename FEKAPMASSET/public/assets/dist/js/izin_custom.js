$(document).ready(function () {
    // Setup AJAX untuk mengirimkan CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('#izin').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "izin/getdata", // Ganti dengan URL endpoint yang sesuai
            type: 'GET'
        },
        columns: [
            {
                data: 'DT_RowIndex',
                title: 'No',
                orderable: false,
            },
            {
                data: 'tipeIzin',
            },
            {
                data: 'tanggal',
            },
            {
                data: 'jam',
            },
            {
                data: 'jumlahJam',
            }, {
                data: 'namaAtasan',
            }, {
                data: 'nippAtasan',
            }, {
                data: 'telepon',
            }, {
                data: 'alasan',
            }, {
                data: 'statusApprove',
            }
        ],
        order: [
            [3, 'desc'] // Urut berdasarkan kolom tanggal (indeks 3)
        ],
    });
});
