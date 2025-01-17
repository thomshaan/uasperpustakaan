<!----PHP Include---->
<?php
include 'php/dbconnection.php';

session_start();
$_SESSION['member_email'];
$_SESSION['member_id'];

$member_id = $_SESSION['member_id'];

if (isset($_POST['diterima'])) {
  $peminjam_id = $_POST['peminjamanid'];
  $status = "Diterima";

  $insert_query = mysqli_query($conn, "update `dipinjam_tbl` SET peminjaman_status = '$status' where peminjaman_id = '$peminjam_id'") or die("insert query failed");
  if ($insert_query) {
    echo "<script type='text/javascript'>alert('Update berhasil dimasukkan!');</script>";
  } else {
    echo "<script type='text/javascript'>alert('Terjadi kesalahan, coba kembali!');</script>";
  }
}

if (isset($_POST['dikembalikan'])) {
  $peminjam_id = $_POST['peminjamanid'];
  $status = "Dikembalikan";

  $insert_query = mysqli_query($conn, "update `dipinjam_tbl` SET peminjaman_status = '$status' where peminjaman_id = '$peminjam_id'") or die("insert query failed");
  if ($insert_query) {
    echo "<script type='text/javascript'>alert('Update berhasil dimasukkan!');</script>";
  } else {
    echo "<script type='text/javascript'>alert('Terjadi kesalahan, coba kembali!');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <!-- My CSS -->
  <link rel="stylesheet" href="style.css" />

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet" />

  <!-- End of Font -->
  <title>Main Page</title>
</head>

<body class="antialiased align-self-center">

  <aside>
    <div class="col-sm-auto navbar p-3 shadow">
      <div class="d-flex flex-sm-column flex-row flex-nowrap align-items-center ">
        <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
          <li class="btn py-3 align-self-start" onclick="location.href='statuspeminjaman.php';">
            <img src="asset/TAFLogo.png" width="150" class="py-5" ; />
          </li>
          <li class="btn py-3 align-self-start" onclick="location.href='profil.php';">
            <img src="asset/icon/navbar/idcard.png" width="20" ; />
            <a>Profil</a>
          </li>
          <li>
          <li class="btn py-3 align-self-start" onclick="location.href='listbuku.php';">
            <img src="asset/icon/navbar/home.png" width="20" ; />
            <a>List Buku</a>
          </li>
          <li>
          <li class="btn py-3 align-self-start" onclick="location.href='dashboardclient.php';">
            <img src="asset/icon/navbar/bookshelf.png" width="20" ; />
            <a>Dashboard</a>
          </li>
          <li>
          <li class="btn py-3 align-self-start" onclick=" location.href='statuspeminjaman.php' ;">
            <img src="asset/icon/navbar/bookstatus.png" width="20" ; />
            <a>Status Peminjaman</a>
          </li>
          <li>
          <li class="btn py-3 align-self-start" onclick="location.href='settings.php';">
            <img src="asset/icon/navbar/settings.png" width="20" ; />
            <a>Pengaturan</a>
          </li>
          </li>
          <li>
          <li class="btn py-5 align-self-start" onclick="location.href='index.php';">
            <img src="asset/icon/navbar/logout.png" width="20" ; />
            <a>Keluar</a>

          </li>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </aside>

  <div class="jumbotron center py-5 ">
    <div class="container " style="padding-left: 150px;">


      <div class="biodata">
        <div class="biodata-header">
          <h1>Status Peminjaman</h1>
          <button class="edit-button">
            <path d="M21.3179 41.6821L24.8262 31.0902L45.0652 10.8512L52.1488 17.9348L31.9098 38.1738L21.3179 41.6821ZM61.532 1.46802C61.9974 1.93299 62.3666 2.48512 62.6185 3.09284C62.8703 3.70057 63 4.35198 63 5.00984C63 5.66771 62.8703 6.31912 62.6185 6.92685C62.3666 7.53457 61.9974 8.0867 61.532 8.55166L56.3187 13.765L49.235 6.68133L54.4483 1.46802C54.9133 1.00263 55.4654 0.633437 56.0732 0.381545C56.6809 0.129652 57.3323 0 57.9902 0C58.648 0 59.2994 0.129652 59.9072 0.381545C60.5149 0.633437 61.067 1.00263 61.532 1.46802ZM3.93754 11.8119H31.8508L27.9132 15.7495H3.93754V59.0625H47.2505V35.0868L51.1881 31.1492V59.0625C51.1881 60.1068 50.7732 61.1083 50.0348 61.8467C49.2963 62.5852 48.2948 63 47.2505 63H3.93754C2.89324 63 1.89171 62.5852 1.15328 61.8467C0.414848 61.1083 0 60.1068 0 59.0625V15.7495C0 14.7052 0.414848 13.7037 1.15328 12.9652C1.89171 12.2268 2.89324 11.8119 3.93754 11.8119Z" fill="#00303F" />
            </svg>
          </button>
        </div>
        <hr class="divider">
        <div class="biodata-body">
          <table class="table">
            <thead class="table-dark">
              <th>Kode Peminjaman</th>
              <th>Nama Buku</th>
              <th>ISBN Buku</th>
              <th>Informasi Buku</th>
              <th>Status Buku</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              <?php
              $select_book = mysqli_query($conn, "select * from `dipinjam_tbl` where id_anggota = '$member_id'");
              if (mysqli_num_rows($select_book) > 0) {
                while ($fetch_book = mysqli_fetch_assoc($select_book)) {


                  $select_book = mysqli_query($conn, "SELECT 
                                buku_tbl.buku_nama, 
                                buku_tbl.buku_pengarang, 
                                buku_tbl.buku_isbn,
                                buku_tbl.buku_foto,
                                dipinjam_tbl.peminjaman_tanggaldipinjam,
                                dipinjam_tbl.peminjaman_tanggalkembali,
                                dipinjam_tbl.peminjaman_status,
                                dipinjam_tbl.peminjaman_id,
                                dipinjam_tbl.id_anggota,
                                dipinjam_tbl.id_buku
                            FROM buku_tbl
                            JOIN dipinjam_tbl ON dipinjam_tbl.id_buku = buku_tbl.buku_id
                            WHERE dipinjam_tbl.id_anggota = '$member_id'
                            AND dipinjam_tbl.peminjaman_status <> 'SELESAI'");

                  if (mysqli_num_rows($select_book)) {
                    while ($fetch_book = mysqli_fetch_assoc($select_book)) {
                      $judul_buku = $fetch_book['buku_nama'];
                      $penulis = $fetch_book["buku_pengarang"];
                      $isbn = $fetch_book["buku_isbn"];
                      $tanggal_pinjam = $fetch_book["peminjaman_tanggaldipinjam"];
                      $tanggal_kembali = $fetch_book["peminjaman_tanggalkembali"];
                      $statusbuku = $fetch_book['peminjaman_status'];
                      $peminjamanid = $fetch_book['peminjaman_id'];
                      $id_anggota = $fetch_book['id_anggota'];
                      $id_buku = $fetch_book['id_buku'];
                      $buku_foto = $fetch_book['buku_foto'];
              ?>

                      <tr>
                        <td><?php echo $peminjamanid ?></td>
                        <td><a href=""></a><?php echo $judul_buku ?></td>
                        <td><?php echo $isbn ?></td>
                        <td>
                          Tanggal Pinjam : <?php echo $tanggal_pinjam ?> ||
                          Tanggal Kembali : <?php echo $tanggal_kembali ?>
                        </td>
                        <td><b><?php echo $statusbuku ?></b></td>
                        <td class="align-middle">
                          <form action="" class="action" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $peminjamanid ?>" name="peminjamanid">
                            <button type="submit" name="diterima" value="Diterima" class="btn btn-dark py-2;">Buku Diterima</button>
                            <hr class="divider">
                            <button type="submit" name="dikembalikan" value="Dikembalikan" class="btn btn-dark py-1;">Buku Dikembalikan</button>
                        </td>

                        </form>

                      </tr><?php
                          }
                        } else {
                          echo "Tidak ada data yang ditemukan.";
                        }
                      }
                    }
                            ?>


            </tbody>
          </table>
        </div>

      </div>




    </div>
    <div class="container py-5" style="padding-left: 150px;">
      <div class="biodata py-5">
        <div class="biodata-header">
          <h1>Riwayat Peminjaman</h1>
          <button class="edit-button">
            <path d="M21.3179 41.6821L24.8262 31.0902L45.0652 10.8512L52.1488 17.9348L31.9098 38.1738L21.3179 41.6821ZM61.532 1.46802C61.9974 1.93299 62.3666 2.48512 62.6185 3.09284C62.8703 3.70057 63 4.35198 63 5.00984C63 5.66771 62.8703 6.31912 62.6185 6.92685C62.3666 7.53457 61.9974 8.0867 61.532 8.55166L56.3187 13.765L49.235 6.68133L54.4483 1.46802C54.9133 1.00263 55.4654 0.633437 56.0732 0.381545C56.6809 0.129652 57.3323 0 57.9902 0C58.648 0 59.2994 0.129652 59.9072 0.381545C60.5149 0.633437 61.067 1.00263 61.532 1.46802ZM3.93754 11.8119H31.8508L27.9132 15.7495H3.93754V59.0625H47.2505V35.0868L51.1881 31.1492V59.0625C51.1881 60.1068 50.7732 61.1083 50.0348 61.8467C49.2963 62.5852 48.2948 63 47.2505 63H3.93754C2.89324 63 1.89171 62.5852 1.15328 61.8467C0.414848 61.1083 0 60.1068 0 59.0625V15.7495C0 14.7052 0.414848 13.7037 1.15328 12.9652C1.89171 12.2268 2.89324 11.8119 3.93754 11.8119Z" fill="#00303F" />
            </svg>
          </button>
        </div>
        <hr class="divider">
        <div class="biodata-body">
          <table class="table">
            <thead class="table-dark">
              <th>Kode Peminjaman</th>
              <th>Nama Buku</th>
              <th>ISBN Buku</th>
              <th>Informasi Buku</th>
              <th>Status Buku</th>
            </thead>
            <tbody>
              <?php
              $select_book2 = mysqli_query($conn, "select * from `dipinjam_tbl` where id_anggota = '$member_id' AND peminjaman_status = 'Selesai'");
              if (mysqli_num_rows($select_book2) > 0) {
                while ($fetch_book = mysqli_fetch_assoc($select_book2)) {


                  $select_book2 = mysqli_query($conn, "SELECT 
                                buku_tbl.buku_nama, 
                                buku_tbl.buku_pengarang, 
                                buku_tbl.buku_isbn,
                                buku_tbl.buku_foto,
                                dipinjam_tbl.peminjaman_tanggaldipinjam,
                                dipinjam_tbl.peminjaman_tanggalkembali,
                                dipinjam_tbl.peminjaman_status,
                                dipinjam_tbl.peminjaman_id,
                                dipinjam_tbl.id_anggota,
                                dipinjam_tbl.id_buku
                            FROM buku_tbl
                            JOIN dipinjam_tbl ON dipinjam_tbl.id_buku = buku_tbl.buku_id
                            WHERE dipinjam_tbl.id_anggota = '$member_id' AND dipinjam_tbl.peminjaman_status = 'Selesai'");

                  if (mysqli_num_rows($select_book2)) {
                    while ($fetch_book = mysqli_fetch_assoc($select_book2)) {
                      $judul_buku = $fetch_book['buku_nama'];
                      $penulis = $fetch_book["buku_pengarang"];
                      $isbn = $fetch_book["buku_isbn"];
                      $tanggal_pinjam = $fetch_book["peminjaman_tanggaldipinjam"];
                      $tanggal_kembali = $fetch_book["peminjaman_tanggalkembali"];
                      $statusbuku = $fetch_book['peminjaman_status'];
                      $peminjamanid = $fetch_book['peminjaman_id'];
                      $id_anggota = $fetch_book['id_anggota'];
                      $id_buku = $fetch_book['id_buku'];
                      $buku_foto = $fetch_book['buku_foto'];
              ?>

                      <tr>
                        <td><?php echo $peminjamanid ?></td>
                        <td><a href=""></a><?php echo $judul_buku ?></td>
                        <td><?php echo $isbn ?></td>
                        <td>
                          Tanggal Pinjam : <?php echo $tanggal_pinjam ?> ||
                          Tanggal Kembali : <?php echo $tanggal_kembali ?>
                        </td>
                        <td><b><?php echo $statusbuku ?></b></td>

                        </form>

                      </tr><?php
                          }
                        } else {
                          echo "Tidak ada data yang ditemukan.";
                        }
                      }
                    }
                            ?>


            </tbody>
          </table>
        </div>

      </div>
    </div>

</body>
<!-- Script Start -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Script Finished -->

</html>