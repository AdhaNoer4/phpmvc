<?php

class Mahasiswa_model
{

    private $dbh; // database handler =  Koneksi database
    private $stmt; // query database

    public function __construct()
    {
        //data source name
        $dsn = 'mysql:host=localhost;dbname=phpmvc';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa()
    {
        //panggil table 
        $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
        $this->stmt->execute(); // eksekusi
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); // tampilkan dalam bentuk array assoc
    }
}
