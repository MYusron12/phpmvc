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

    public function tambahDataMahasiswa($data){
        $query = "INSERT INTO mahasiswa
                    VALUES
                    ('', :nama, :nrp, :email, :jurusan)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id){
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
