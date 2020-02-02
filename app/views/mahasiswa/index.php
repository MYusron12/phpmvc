<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            <!-- //menampilkan data mahasiswa hanya namaya saja -->
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $mhs['nama']; ?>
                    <!-- lakukan fungsi detail dari data mahasiswa, masuk ke method mahasiswa berdasarkan id-->
                    <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>