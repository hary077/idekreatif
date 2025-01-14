<?php
// Memasukkan header halaman
include 'includes/header.php';
// Menyertakan file untuk menampilkan notifikasi (jika ada)
include 'includes/toast_notification.php';
?>

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4>Data Kategori</h4>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
        Tambah Kategori
      </button>
    </div>

    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table id="datatable" class="table table-hover">
          <thead>
            <tr class="text-center">
              <th width="50px">#/No</th>
              <th>Nama</th>
              <th width="150px">Pilihan</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
      <!-- mengambil data kategori dari database -->
       <?php
       $index = 1;
       $query = "SELECT * FROM categories";
       $exec = mysqli_query($conn, $query);
       while ($category = mysql_fetch_assoc($exec)) :
        ?>
        <tr>
          <!-- menampilkan nomor, nama kategori, dan opsi -->
           <td><?= $index++; ?></td>
           <td>
            <!-- Dropdown untuk opsi edit dan delete -->
            <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editCategory<?= $category['category_id'] ?>">
                          <i class="bx bx-edit-alt me-2"></i> Edit
                        </a>
                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteCategory<?= $category['category_id'] ?>">
                          <i class="bx bx-trash me-2"></i> Delete</a>
                      </div>
                    </div>
                  </td>
              <tr>
              <!-- modal untuk hapus data kategori -->
               

              <!-- modal untuk update data kategori -->

              
          <?php endwhile; ?>
       </tbody>
       </table>
       </div>
       </div>
       </div>
       </div>
       <?php include '.include/footer.php'; ?>