<?php 
include "proses/connect.php";
date_default_timezone_set('asia/jakarta');
$query =mysqli_query($conn,"SELECT tb_order.*,tb_bayar.*,nama,SUM(harga*jumlah) AS harganya FROM tb_order LEFT JOIN tb_user ON tb_user.id = tb_order.pelayan
LEFT JOIN tb_list_order ON tb_list_order.kode_order=tb_order.id_order
LEFT JOIN tb_daftar_menu ON tb_daftar_menu.id = tb_list_order.menu
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
GROUP BY id_order ORDER BY waktu_order ASC ");
while ($record = mysqli_fetch_array($query)) {
  $result[]= $record;
}
//$select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu,kategori_menu FROM tb_kategori_menu");
?>


<div class="col-lg-9  mt-2">
    <div class="card">
  <div class="card-header">
     halaman REPORT
  </div>
  <div class="card-body">
  <?php
      if (empty($result)) {
        echo "Data menu makanan atau minuman tidak ada tidak ada";
      } else {
        foreach ($result as $row) {
          ?>

 <!-- Modal Reset Password-->
 <?php
        }
        foreach ($result as $row) {
          ?>
          <div class="modal fade" id="ModalResetPassword<?php echo $row['id'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_reset_password.php" method="POST">
                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                    <div class="col-lg-12">
                      <?php
                      if ($row['username'] == $_SESSION['username_decafe']) {
                        echo "<div class='alert alert-danger'>Anda tidak dapat mereset password akun sendiri.</div>";
                      } else {
                        echo "Apakah anda yakin ingin mereset password user <b> $row[username]</b> menjadi password bawaan sistem yaitu <b>password</b> <b></b>";
                      }
                      ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success" name="input_user_validate" value="12345" <?php echo ($row['username'] == $_SESSION['username_decafe']) ? 'disabled' : ''; ?>>Reset Password</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- End Modal Delete-->
          <?php
        }


        ?>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr class="text-nowrap">
                <th scope="col">No</th>
                <th scope="col">Kode Order</th>
                <th scope="col">Waktu Order</th>
                <th scope="col">Waktu Bayar</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Meja</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Pelayan</th>
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
                    <?php echo $row['id_order'] ?>
                  </td>
                  <td>
                    <?php echo $row['waktu_order'] ?>
                  </td>
                  <td>
                    <?php echo $row['waktu_bayar'] ?>
                  </td>
                  <td>
                    <?php echo $row['pelanggan'] ?>
                  </td>
                  <td>
                    <?php echo $row['meja'] ?>

                  </td>
                  <td>
                    <?php echo number_format((int) $row['harganya'], 0, ',', '.') ?>

                  </td>
                  <td>
                    <?php echo $row['nama'] ?>
                  </td>
                  <td>
                    <div class="d-flex">
                      <a class="btn btn-info btn-sm me-1"
                        href="./?x=viewitem&order=  <?php echo $row['id_order'] . "&meja=" . $row['meja'] . "&pelanggan=" . $row['pelanggan'] ?>"><i
                          class="bi bi-eye"></i></a>
                    </div>
                  </td>
                </tr>

                <?php
              } ?>
            </tbody>
          </table>
        </div>
        <?php
      } ?>
    </div>
  </div>
</div>