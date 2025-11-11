<h1 class="mt-4">
    <?php echo isset($_GET['id']) ? 'Ubah Buku' : 'Tambah Buku'; ?>
</h1>

<div class="card">
    <div class="card-body">
        <form method="post">
            <?php
            // Ambil id jika ada (mode edit)
            $id = isset($_GET['id']) ? $_GET['id'] : '';

            // Ambil data lama jika mode edit
            if ($id != '') {
                $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = '$id'");
                $data = mysqli_fetch_array($query);
            } else {
                $data = [
                    'id_kategori' => '',
                    'judul' => '',
                    'penulis' => '',
                    'penerbit' => '',
                    'tahun_terbit' => '',
                    'deskripsi' => ''
                ];
            }

            // Proses simpan
            if (isset($_POST['submit'])) {
                $id_kategori = $_POST['id_kategori'];
                $judul = $_POST['judul'];
                $penulis = $_POST['penulis'];
                $penerbit = $_POST['penerbit'];
                $tahun_terbit = $_POST['tahun_terbit'];
                $deskripsi = $_POST['deskripsi'];

                if ($id == '') {
                    // Mode tambah
                    $query = mysqli_query($koneksi, "INSERT INTO buku (id_kategori, judul, penulis, penerbit, tahun_terbit, deskripsi)
                        VALUES ('$id_kategori', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi')");
                    $pesan = $query ? "Tambah data berhasil." : "Tambah data gagal.";
                } else {
                    // Mode ubah
                    $query = mysqli_query($koneksi, "UPDATE buku SET 
                        id_kategori='$id_kategori', 
                        judul='$judul', 
                        penulis='$penulis', 
                        penerbit='$penerbit', 
                        tahun_terbit='$tahun_terbit', 
                        deskripsi='$deskripsi' 
                        WHERE id_buku='$id'");
                    $pesan = $query ? "Ubah data berhasil." : "Ubah data gagal.";
                }

                echo "<script>alert('$pesan'); location.href='?page=buku';</script>";
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
                            $selected = ($kategori['id_kategori'] == $data['id_kategori']) ? 'selected' : '';
                            echo "<option value='{$kategori['id_kategori']}' $selected>{$kategori['kategori']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Judul Buku -->
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Judul</label>
                <div class="col-md-8">
                    <input type="text" value="<?php echo $data['judul']; ?>" class="form-control" name="judul" required>
                </div>
            </div>

            <!-- Penulis -->
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Penulis</label>
                <div class="col-md-8">
                    <input type="text" value="<?php echo $data['penulis']; ?>" class="form-control" name="penulis" required>
                </div>
            </div>

            <!-- Penerbit -->
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Penerbit</label>
                <div class="col-md-8">
                    <input type="text" value="<?php echo $data['penerbit']; ?>" class="form-control" name="penerbit" required>
                </div>
            </div>

            <!-- Tahun Terbit -->
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Tahun Terbit</label>
                <div class="col-md-8">
                    <input type="number" value="<?php echo $data['tahun_terbit']; ?>" class="form-control" name="tahun_terbit" required>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Deskripsi</label>
                <div class="col-md-8">
                    <textarea name="deskripsi" rows="5" class="form-control"><?php echo $data['deskripsi']; ?></textarea>
                </div>
            </div>

            <!-- Tombol -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <a href="?page=buku" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
