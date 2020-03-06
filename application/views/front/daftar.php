<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/bootstrap-modif-min.css">

  <!-- CSS Mal -->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/mal.css">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">

          <!-- gambar gede -->
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>


          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar member</h1>
              </div>

              <!-- mulai form -->
              <?php echo form_open('daftar/validasi', ['class'=>'user']) ?>

                <!-- email -->
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleFirstName" placeholder="Email..." name="email">

                    <div class="pesan-error-form user">
                      <span><?php echo form_error('email') ?></span>
                    </div>
                </div>

                <!-- error jika emai sudah dipakai -->
                <?php if($email) : ?>
                <div class="pesan-error-form user">
                  <span>Email sudah terdaftar</span>
                </div>
                <?php endif ?>
                <br>

                <!-- password -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">

                    <div class="pesan-error-form user">
                      <span><?php echo form_error('password') ?></span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="repeatpassword">

                    <div class="pesan-error-form user">
                      <span><?php echo form_error('repeatpassword') ?></span>
                    </div>
                  </div>
                </div>

                <!-- error jika password berbeda -->
                <?php if($password) : ?>
                <div class="pesan-error-form user">
                  <span>Password harus sama</span>
                </div>
                <?php endif ?>

                <br>

                <!-- nama -->
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="Nama..." name="nama">

                  <div class="pesan-error-form user">
                    <span><?php echo form_error('nama') ?></span>
                  </div>
                </div>

                <!-- nomor induk -->
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="Nomor Induk Guru..." name="nomorinduk">

                  <div class="pesan-error-form user">
                    <span><?php echo form_error('nomorinduk') ?></span>
                  </div>
                </div>

                <!-- alamat -->
                <div class="form-group">
                  <textarea rows="4" cols="50" class="form-control form-control-user" placeholder="Alamat..." name="alamat"></textarea>

                  <div class="pesan-error-form user">
                    <span><?php echo form_error('alamat') ?></span>
                  </div>
                </div>

                <!-- sekolah -->
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="Guru di...(Misal: SMPN 1 Jakarta)" name="sekolah">

                  <div class="pesan-error-form user">
                        <span><?php echo form_error('sekolah') ?></span>
                      </div>
                </div>

                <!-- hp -->
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="Nomor HP..." name="hp">

                  <div class="pesan-error-form user">
                    <span><?php echo form_error('hp') ?></span>
                  </div>
                </div>

                <!-- btn submit -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                  </div>
                <?php echo form_close() ?>
                <hr>
                
              </form>
              <hr>
              
              <div class="text-center">
                <a class="small" href="<?php echo base_url() ?>login">Sudah punya akun? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>