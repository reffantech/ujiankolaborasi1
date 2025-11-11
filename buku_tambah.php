<h1 class="mt-4">Tambah Buku</h1>

<div class="card">
    <div class="card-body">
        <form method="post">
            <?php
            if (isset($_POST['submit'])) {
                $id_kategori = $_POST['id_kategori'];
                $judul = $_POST['judul'];
                $penulis = $_POST['penulis'];
                $penerbit = $_POST['penerbit'];
                $tahun_terbit = $_POST['tahun_terbit'];
                $deskripsi = $_POST['deskripsi'];

                // Query simpan buku
                $query = mysqli_query($koneksi, "INSERT INTO buku (id_kategori, judul, penulis, penerbit, tahun_terbit, deskripsi) 
                    VALUES ('$id_kategori', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi')");

                if ($query) {
                    echo '<script>alert("Tambah data berhasil."); location.href="?page=buku";</script>';
                } else {
                    echo '<script>alert("Tambah data gagal.");</script>';
                }
            }
            ?>

            <!-- Pilih Kategori -->
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Kategori</label>
                <div class="col-md-8">
                    <select name="id_kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php
                        $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                        while ($kategori = mysqli_fetch_array($kat)) {
                            echo '<option value="' . $kategori['id_kategori'] . '">' . $kategori['kategori'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Judul Buku -->
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Judul</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="judul" required>
                </div>
            </div>

            <!-- Penulis -->
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Penulis</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="penulis" required>
                </div>
            </div>

            <!-- Penerbit -->
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Penerbit</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="penerbit" required>
                </div>
            </div>

            <!-- Tahun Terbit -->
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Tahun Terbit</label>
                <div class="col-md-8">
                    <input type="number" class="form-control" name="tahun_terbit" required>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Deskripsi</label>
                <div class="col-md-8">
                    <textarea name="deskripsi" rows="5" class="form-control"></textarea>
                </div>
            </div>

            <!-- Tombol -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="?page=buku" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
