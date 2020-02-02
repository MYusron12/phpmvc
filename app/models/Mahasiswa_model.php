<?php

class Mahasiswa_model
{
    //visibilitas private untuk tabel mahasiswa
    private $table = 'mahasiswa';
    //variable untuk menampung database
    private $db;

    //function construct yang langsung konek ke database
    public function __construct()
    {
        $this->db = new Database;
    }

    //menjalankan query database mengambil tabel, lalu kembalikan hasilnya dan tampilkan
    public function getAllMahasiswa()
    {
        $this->db->query(' SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    //method getMahasiswaById, 
    public function getMahasiswaById($id)
    {
        //ambil tabel mahasiswa berdasarkan id
        $this->db->query(' SELECT * FROM ' . $this->table . ' WHERE id =:id ');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}
