<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>register ke PerpusKu</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">register ke PerpusKu</h3></div>
                                    <div class="card-body">
                                         <?php
                                        if(isset($_POST['register'])) {
                                            $nama = $_POST['nama'];
                                            $email = $_POST['email'];
                                            $alamat = $_POST['alamat'];
                                            $no_telepon = $_POST['no_telepon'];
                                            $username = $_POST['username'];
                                            $level = $_POST['level'];
                                            $password = md5($_POST['password']);
                                            
                                          
                                            $insert =mysqli_query($koneksi, "INSERT INTO user(nama,email,alamat,no_telepon,username,level,password) VALUES('$nama','$email','$alamat','$no_telepon','$username','$level','$password')");
                                            
                                            if($insert){
                                                echo '<script>alert("register berhasil"); location.href="login.php"</script>';
                                            }else{
                                                echo '<script>alert("register gagal");</script>';
                                            }
                                        }
                                        ?>
                

                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control"type="text" required name="nama" placeholder="Masukkan Nama Lengkap" />
                                                <label>nama lengkap</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control"type="text" required name="email" placeholder="Masukkan Eemail" />
                                                <label>Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control"type="text" required name="no_telepon" placeholder="Masukkan No Telepon" />
                                                <label>no telepon</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea name="alamat" rows="5" required class="form-control"></textarea>
                                                <label>alamat</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="username" required name="username" placeholder="masukkan username " />
                                                <label>Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" required name="password" type="password" placeholder=" masukkan Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                           <div class="form-floating mb-3">
    <select name="level" required class="form-select">
        <option value="peminjam">Peminjam</option>
        <option value="admin">Admin</option>
    </select>
    <label for="level">Level</label>
</div>

                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary"type="submit"  name="register" value="register">register</button>
                                                <a class="btn btn-danger" href="login.php">login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"> &copy; 2025 PerpusKu </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
           
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
