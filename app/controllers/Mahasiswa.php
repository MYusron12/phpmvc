<?php

//class mahasiswa turunan dari controller
class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        //ambil data mhs diambil dari model Mahasiswa_model pada method getAllMahasiswa
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        //ambil view header di folder template, kirimkan ke variable data
        $this->view('templates/header', $data);
        //ambil view index di folder mahasiswa kirimkan isinya ke variable data
        $this->view('mahasiswa/index', $data);
        //ambil view footer di folder template
        $this->view('templates/footer');
    }

    //function detail mahasiswa, ambil parameter id di url
    public function detail($id)
    {
        //parameter data mengambil array judul, detail mahasiswa
        $data['judul'] = 'Detail Mahasiswa';
        //array mhs method getmahasiswabyid
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    //method function ubah data 
    public function getubah()
    {
        //jalankan method yang ada dalam model mahasiswa yg namanya getMahasiswaById dengan mengirimkan id, datanya berupa json
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}
