<div class="container mt-5">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3 tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Add +
            </button>
            <h3>Daftar Mahasiswa</h3>

            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs['nama']; ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge text-bg-danger float-end ms-1" onclick="return confirm('Apakah anda yakin ingin meghapus data?')">Hapus</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge text-bg-success float-end ms-1 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id']; ?>">Edit</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge text-bg-primary float-end ms-1">Detail</a>

                    </li>
                <?php endforeach; ?>
            </ul>




        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- kirim data ke controllers Mahasiswa dan jalankan method tambah  -->
                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
                    <input type="hidden" name="id" id='id'>
                    <div class="form-group mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control"">
                    </div>

                    <div class=" form-group mb-3">
                        <label for="nrp">NRP</label>
                        <input type="number" name="nrp" id="nrp" class="form-control"">
                    </div>

                    <div class=" form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"">
                    </div>

                    <div class=" input-group mb-3">
                        <label class="input-group-text" for="jurusan">Jurusan</label>
                        <select class="form-select" id="jurusan" name="jurusan">
                            <option selected>Pilih...</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Teknik Electro">Teknik Electro</option>

                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Data</button>
                </form>
            </div>
        </div>
    </div>
</div>