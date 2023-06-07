<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = "Daftar Mahasiswa";
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = "Detail Mahasiswa";
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        // kirim data ke model mahasiswa dan jalankan method tambahDataMahasiswa
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setflash('Berhasil', 'ditambahkan', 'success'); // 
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setflash('Gagal', 'ditambahkan', 'danger'); // 
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}
