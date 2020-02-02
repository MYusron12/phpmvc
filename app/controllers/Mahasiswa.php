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
}
