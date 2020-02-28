$(function() {
    //event ketika tombol tambah di klik
    $('.tombolTambahData').on('click', function () {
        //ambil id formmodallabel, lalu ubah isinya
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        //ubah nama tombol menjadi tambah data
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#nrp').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');
    });

    $('.tampilModalUbah').on('click', function () {

        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

        //variable id yang mengambil data id
        const id = $(this).data('id');

        //method ajax 
        $.ajax({
            //menjalankan method get ubah di controller mahasiswa
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            //kirimkan data berupa object yang namanya id, dan isi datanya
            data: {
                id: id
            },
            //data yang dikirimkan menggunakan method post
            method: 'post',
            //tipe data yang dikirimkan berupa object json (object dalam java script)
            dataType: 'json',
            //ketika sukses, terima datanya.
            success: function (data) {
                //isi datanya sesuai data yg dikembalikan ajax, ambil id dan datanya. 
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });

    });

});