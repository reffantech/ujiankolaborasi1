<div class="card">
    <h1 class="mt-4">Peminjaman & Pengembalian Buku</h1>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=peminjaman_tambah"  class="btn btn-primary">
                    <i class="fa fa-plus"></i> tambah peminjaman
                </a>
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Akasi</th>
                    </tr>

                    <?php
                    $id_user = $_SESSION['user']['id_user']; // ambil id dari array
                    $query = mysqli_query($koneksi, 
                        "SELECT * FROM peminjaman 
                        LEFT JOIN user ON user.id_user = peminjaman.id_user 
                        LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku 
                        WHERE peminjaman.id_user = $id_user");

                    $i = 1;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['tanggal_peminjaman']; ?></td>
                            <td><?php echo $data['tanggal_pengembalian']; ?></td>
                            <td><?php echo $data['status_peminjaman']; ?></td>
                            <td>
                                <?php 
                                if($data['status_peminjaman'] != 'dikebalikan') {
                                    
                                
                                ?>
                                <a href="?page=peminjaman_ubah&&id=<?php echo $data['id_peminjaman'];?>"class="btn btn-info">Kembalikan</a>
                                <a onclick="return confrim('yakin?')" href="?page=peminjaman_hapus&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-danger">hapus</a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>