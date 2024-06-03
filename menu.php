<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_daftar_menu
    LEFT JOIN tb_kategori_menu ON tb_kategori_menu.id = tb_daftar_menu.kategori");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Menu
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn  btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah
                        Menu</button>
                </div>
            </div>
            <!-- Modal tambah user -->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3 needs-validation" novalidate action="proses/proses_input_user.php"
                                method="POST">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto"
                                                placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="uploadFoto">Upload Foto Menu</label>
                                            <div class="invalid-feedback">
                                                Masukkan File Foto Menu 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Nama Menu" name="nama_menu" required>
                                            <label for="floatingInput">Nama Menu</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Menu
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" aria-label="Default select example" name="level" requ
                                        required>
                                        <option selected hidden value="">Pilih Level User</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Kasir</option>
                                        <option value="3">Pelayan</option>
                                        <option value="4">dapur</option>
                                    </select>
                                    <label for="floatingInput">Level User</label>
                                    <div class="invalid-feedback">
                                        Pilih Level User
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingPassword"
                                                placeholder="Password" disabled value="1234567" name="password">
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="sumbit" class="btn btn-primary" name="input_user_validate"
                                        value="1234">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir Modal tambah user -->
            <?php
            foreach ($result as $row) {
                ?>
                <!-- modal view -->
                <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3 needs-validation" novalidate action="proses/proses_input_user.php"
                                    method="POST">
                                    
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput"
                                                    placeholder="Your Name" name="nama" value="<?php echo $row['nama'] ?>">
                                                <label for="floatingInput">Nama</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input disabled type="email" class="form-control" id="floatingInput"
                                                    placeholder="name@example.com" name="username"
                                                    value="<?php echo $row['username'] ?>">
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Username
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                    <select disabled class="form-select" aria-label="Default select example" name="level" id="">
                                        <?php
                                            $data = array("Owner/Admin","Kasir","Pelayan","Dapur");
                                            foreach($data as $key => $value){
                                                if($row['level'] ==$key+1){
                                                    echo "<option selected value='$key' > $value</option>";
                                                }else{
                                                    echo "<option  value='$key' > $value</option>";
                                                }
                                            }
                                        ?>
                                        </select>
                                        <label for="floatingInput">Level User</label>
                                        <div class="invalid-feedback">
                                            Pilih Level User
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" id="floatingPassword"
                                                    placeholder="Password" disabled value="1234567" name="password">
                                                <label for="floatingPassword">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir modal view -->
                <!-- modal edit -->
                <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3 needs-validation" novalidate action="proses/proses_edit_user.php"
                                    method="POST">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Your Name" name="nama" required
                                                    value="<?php echo $row['nama'] ?>">
                                                <label for="floatingInput">Nama</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input <?php echo ($row['username'] == $_SESSION['username_restoran']) ? 'disabled' : '' ; ?> type="email" class="form-control" id="floatingInput"
                                                    placeholder="name@example.com" name="username" required
                                                    value="<?php echo $row['username'] ?>">
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Username
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" name="level" id="">
                                        <?php
                                            $data = array("Owner/Admin","Kasir","Pelayan","Dapur");
                                            foreach($data as $key => $value){
                                                if($row['level'] ==$key+1){
                                                    echo "<option selected value=".($key+1)." > $value</option>";
                                                }else{
                                                    echo "<option  value=".($key+1)." > $value</option>";
                                                }
                                            }
                                        ?>
                                        </select>
                                        <label for="floatingInput">Level User</label>
                                        <div class="invalid-feedback">
                                            Pilih Level User
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" id="floatingPassword"
                                                    placeholder="Password" value="1234567" name="password">
                                                <label for="floatingPassword">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="sumbit" class="btn btn-primary" name="input_user_validate"
                                            value="1234">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir modal edit -->
                
                <!-- modal Delete -->
                <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3 needs-validation" novalidate action="proses/proses_delete_user.php"
                                    method="POST">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                    <div class="col-lg-12">
                                        <?php
                                        if($row['username'] == $_SESSION['username_restoran']){
                                            echo "<div class='alert alert-danger'>Anda tidak dapat menghapus akun Admin</div>";
                                        }
                                        else{
                                            echo "Apakah Anda Ingin Menghapus User <b> $row[username]</b>";
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="sumbit" class="btn btn-danger" name="input_user_validate"
                                            value="1234"
                                            <?php echo ($row['username'] == $_SESSION['username_restoran']) ? 'disabled' : '' ; ?>
                                            >Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir modal Delete -->
                <?php
            }
            if (empty($result)) {
                echo "Data User tidak ada";
            } else {


                ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Foto Menu</th>
                                <th scope="col">Nama Menu</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Jenis Menu</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {

                                ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $no++ ?>
                                    </th>
                                    <td>
                                        <div style="width: 180px;">
                                            <img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo $row['nama_menu'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['keterangan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['kategori_menu'] ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['jenis_menu']== 1) ? "Makanan" : "Minuman" ?>
                                    </td>
                                    <td>
                                        <?php echo $row['harga'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['stok'] ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                                            data-bs-target="#ModalView<?php echo $row['id'] ?>"><i
                                                class="bi bi-eye"></i></button>
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                                            data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i
                                                class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i 
                                                class="bi bi-trash3"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
</div>

<script>(() => {
        'use strict';

        // Function to handle form submission
        const handleFormSubmission = (form) => {
            form.addEventListener('submit', (event) => {
                // Check if the form passes validation
                if (!form.checkValidity()) {
                    event.preventDefault(); // Prevent form submission
                    event.stopPropagation(); // Stop event propagation
                }

                form.classList.add('was-validated'); // Apply Bootstrap validation styles
            }, false);
        };

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation');

        // Loop over forms and apply event listeners
        Array.from(forms).forEach(form => {
            handleFormSubmission(form);
        });
    })();
</script>