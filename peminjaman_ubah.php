<h1 class="mt-4">Kembalikan Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = intval($_GET['id']); // aman dari SQL injection

                    // Ambil data lama
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman = $id");
                    $data = mysqli_fetch_array($query);

                    if (isset($_POST['submit'])) {
                        $id_buku = $_POST['id_buku'];
                        $id_user = $_SESSION['user']['id_user'];
                        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                        $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                        $status_peminjaman = $_POST['status_peminjaman'];

                        $query_update = mysqli_query($koneksi, "
                            UPDATE peminjaman 
                            SET 
                                id_buku='$id_buku',
                                tanggal_peminjaman='$tanggal_peminjaman',
                                tanggal_pengembalian='$tanggal_pengembalian',
                                status_peminjaman='$status_peminjaman'
                            WHERE id_peminjaman=$id
                        ");

                        if ($query_update) {
                            echo "<script>alert('Ubah data berhasil.'); window.location='?page=peminjaman';</script>";
                        } else {
                            echo "<script>alert('Ubah data gagal.');</script>";
                        }
                    }
                    ?>

                    <div class="row mb-3">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-8">
                            <select name="id_buku" class="form-control">
                                <?php
                                $buku = mysqli_query($koneksi, "SELECT * FROM buku");
                                while ($row = mysqli_fetch_array($buku)) {
                                ?>
                                    <option value="<?= $row['id_buku']; ?>" 
                                        <?= ($row['id_buku'] == $data['id_buku']) ? 'selected' : ''; ?>>
                                        <?= $row['judul']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">Tanggal Peminjaman</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" 
                                   name="tanggal_peminjaman" 
                                   value="<?= $data['tanggal_peminjaman']; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">Tanggal Pengembalian</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" 
                                   name="tanggal_pengembalian" 
                                   value="<?= $data['tanggal_pengembalian']; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">Status Peminjaman</div>
                        <div class="col-md-8">
                            <select name="status_peminjaman" class="form-control">
                                <option value="dipinjam" <?= ($data['status_peminjaman'] == 'dipinjam') ? 'selected' : ''; ?>>Dipinjam</option>
                                <option value="dikebalikan" <?= ($data['status_peminjaman'] == 'dikebalikan') ? 'selected' : ''; ?>>Dikembalikan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
