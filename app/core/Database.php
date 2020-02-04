<?php
//DATABASE WRAPPER

//class database
class Database
{
    //visibilitas private, isi dari class database
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    //variabel untuk koneksi dbh (database handdler)
    private $dbh;
    //variable statement koneksi database
    private $stmt;

    public function __construct()
    {
        //data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        //variable optimasi database / mengoptimasi ke database
        $option = [
            //untuk membuat database kita koneksinya terjaga terus
            PDO::ATTR_PERSISTENT => true,
            //mode error menampilkan exception
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //function untuk menjalankan query, function dibuat secara generic agar bisa digunnakan untuk CRUD, supaya fleksible
    public function query($query)
    {
        //menyiapkan querynya
        $this->stmt = $this->dbh->prepare($query);
    }

    //binding data, mengambil parameter dari query, where, set, insert into
    //function berisi:parameter, value, type, dan tipedata defaultnya null
    public function bind($param, $value, $type = null)
    {
        //kalau tipenya null
        if (is_null($type)) {
            //lakukan sesuatu, dan jalankan switchnya
            switch (true) {
                    //kalau tipenya integer
                case is_int($value):
                    //set menjadi parameter integer
                    $type = PDO::PARAM_INT;
                    break;
                    //jika boolean
                case is_bool($value):
                    //tipenya adalah boolean
                    $type = PDO::PARAM_BOOL;
                    break;
                    //jika valuenya null
                case is_null($value):
                    //maka tipenya null
                    $type = PDO::PARAM_NULL;
                    break;
                    //jika tipenya default
                default:
                    //maka tipenya parameter string
                    $type = PDO::PARAM_STR;
            }
        }
        //lakukan statement binding ke parameter, supaya aman dan terhindar dari sql injection
        $this->stmt->bindValue($param, $value, $type);
    }

    //eksekusi statement
    public function execute()
    {
        $this->stmt->execute();
    }

    //munculkn banyak hasilnya
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //memmunculkan satu hasil
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
