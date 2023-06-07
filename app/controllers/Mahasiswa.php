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

    public function hapus($id)
    {
        if ($data['mhs'] = $this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setflash('Berhasil', 'dihapus', 'success'); // 
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setflash('Gagal', 'dihapus', 'danger'); // 
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setflash('Berhasil', 'diubah', 'success'); // 
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setflash('Gagal', 'diubah', 'danger'); // 
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}
