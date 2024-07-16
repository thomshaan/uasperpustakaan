  <!----PHP Include---->
  <?php include 'php/dbconnection.php';

    session_start();
    $_SESSION['member_email'];
    $_SESSION['member_id'];
    $member_email = $_SESSION['member_email'];
    $member_id = $_SESSION['member_id'];

    $data = mysqli_query($conn, "select * from `member_tbl` where member_email = '$member_email'");
    $fetchdata = mysqli_fetch_assoc($data);
    $member_id = $fetchdata["member_id"];


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
          <div class="navbar p-3 shadow">
              <div class="d-flex">
                  <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-self-start">
                      <li class="btn py-3 align-self-start" onclick="location.href='dashboardclient.php';">
                          <img src="asset/TAFLogo.png" width="150" class="py-5" ; />
                      </li>
                      <li class="btn py-3 align-self-start" onclick="location.href='adminprofil.php';">
                          <img src="asset/icon/navbar/idcard.png" width="20" ; />
                          <a>Profil</a>
                      </li>
                      <li>
                      <li class="btn py-3 align-self-start" onclick="location.href='adminlistbuku.php';">
                          <img src="asset/icon/navbar/home.png" width="20" ; />
                          <a>List Buku</a>
                      </li>
                      <li>
                      <li class="btn py-3 align-self-start" onclick="location.href='adminlistmember.php';">
                          <img src="asset/icon/navbar/bookshelf.png" width="20" ; />
                          <a>List Member</a>
                      </li>
                      <li>
                      <li class="btn py-3 align-self-start" onclick="location.href='adminstatuspeminjaman.php';">
                          <img src="asset/icon/navbar/bookstatus.png" width="20" ; />
                          <a>Status Peminjaman</a>
                      </li>
                      <li>
                      <li class="btn py-3 align-self-start" onclick="location.href='admintambahbuku.php';">
                          <img src="asset/icon/navbar/settings.png" width="20" ; />
                          <a>Penambahan Buku</a>
                      </li>
                      <li class="btn py-3 align-self-start" onclick="location.href='adminsettings.php';">
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
          <div class="container " style="padding-left: 250px;">
              <h1>Profil anda</h1>
              <p>Kartu Anda Terverifikasi!</p>

              <div class="member-card py-5">
                  <div class="card-header">
                      <h2><b>Kartu Anggota</b></h2>
                      <img src="asset/TAFLogo.png" width="127">

                  </div>
                  <div class="card-body">
                      <div class="info-row">
                          <p><strong>Nama:</strong> <br><?php echo $fetchdata['member_nama'] ?></p>
                          <p><strong>ID Anggota:</strong> <br> <?php echo $fetchdata['member_id']?>
                              </button>
                          </p>
                      </div>

                      <div class="info-row2">
                          <p><strong>Email:</strong> <br><?php echo $fetchdata['member_email']?></p>
                      </div>

                      <div class="info-row3">
                          <p><strong>Jenis Kelamin :</strong> <br><?php echo $fetchdata['member_gender']?></p>
                      </div>

                  </div>
              </div>

              <div class="biodata">
                  <div class="biodata-header">
                      <h2><b>Biodata</b> </h2>
                      <button class="edit-button"><svg width="20" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M21.3179 41.6821L24.8262 31.0902L45.0652 10.8512L52.1488 17.9348L31.9098 38.1738L21.3179 41.6821ZM61.532 1.46802C61.9974 1.93299 62.3666 2.48512 62.6185 3.09284C62.8703 3.70057 63 4.35198 63 5.00984C63 5.66771 62.8703 6.31912 62.6185 6.92685C62.3666 7.53457 61.9974 8.0867 61.532 8.55166L56.3187 13.765L49.235 6.68133L54.4483 1.46802C54.9133 1.00263 55.4654 0.633437 56.0732 0.381545C56.6809 0.129652 57.3323 0 57.9902 0C58.648 0 59.2994 0.129652 59.9072 0.381545C60.5149 0.633437 61.067 1.00263 61.532 1.46802ZM3.93754 11.8119H31.8508L27.9132 15.7495H3.93754V59.0625H47.2505V35.0868L51.1881 31.1492V59.0625C51.1881 60.1068 50.7732 61.1083 50.0348 61.8467C49.2963 62.5852 48.2948 63 47.2505 63H3.93754C2.89324 63 1.89171 62.5852 1.15328 61.8467C0.414848 61.1083 0 60.1068 0 59.0625V15.7495C0 14.7052 0.414848 13.7037 1.15328 12.9652C1.89171 12.2268 2.89324 11.8119 3.93754 11.8119Z" fill="#00303F" />
                          </svg>
                      </button>
                  </div>
                  <hr class="divider">
                  <div class="biodata-body">
                      <div class="info-row">
                          <p><strong>Nama :</strong> <br><?php echo $fetchdata['member_nama'] ?></p>
                          <p><strong>Jenis Kelamin :</strong> <br><?php echo $fetchdata['member_gender'] ?></p>
                      </div>


                      <p><strong>Email :</strong> <br><?php echo $fetchdata['member_email'] ?></p>
                      <p><strong>Alamat :</strong> <br><?php echo $fetchdata['member_alamat'] ?></p>
                      <p><strong>Password :</strong> <br> <?php echo $fetchdata['member_password'] ?></p>
                      <p><strong>Status Keanggotaan :</strong> <br> 
                      <?php if($fetchdata['member_type']==1){
                        echo "Anggota";
                      }
                      else{
                        echo "Administrator";

                      } ?></p>
                  </div>

              </div>
          </div>


  </body>
  <!-- Script Start -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- Script Finished -->

  </html>