

  <!-- Page Content -->
  <div class="container" style="padding-bottom: 60px">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-md-8">

        <!-- Title -->
        <h1 class="mt-4"><?php echo $posts['judul'] ?></h1>

        <!-- Author -->
        <p class="lead">
          oleh
          <a href="#"><?php echo $posts['nama'] ?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><?php echo $posts['waktupublish'] ?></p>

        <hr>

        <!-- Preview Image -->
        <!-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt=""> -->

        <!-- <hr> -->

        <!-- Post Content -->
        <p class="lead"><?php echo $posts['isipost'] ?></p>

        <hr>

        <!-- point dan vote -->
        <span class="text-warning font-weight-bold">
          <?php echo $posts['totalpoint'] ?>
        </span> <i class="fas fa-star" style="color: orange"></i> | <i class="fas fa-eye"></i> <?php echo $posts['view'] ?>

        <hr>

        <!-- jika post sendiri, komen tidak muncul -->
        
        <?php if($posts['idauthor'] != $this->session->userdata('id_member')) : ?>

        <!-- jika sdh pernah komentar, tutup kolom komentar -->
        <?php 
          $kolomkomentar = true;
          foreach($posts['komentar'] as $komen){
            if($komen['idkomentator'] == $this->session->userdata['id_member']){
              $kolomkomentar = false;
            }
          }
        ?>

        <?php if($kolomkomentar) : ?>
        <div class="card my-4">
          <h5 class="card-header">Beri Komentar dan Point:</h5>
          <div class="card-body">

            <!-- form komentar -->
            
            <?php echo form_open('postdetail/komentar/'.$posts['idpost']) ?>

              <!-- isi komentar -->

              <div class="pesan-error-form user">
                <span><?php echo form_error('komentar') ?></span>
              </div>

              <div class="form-group">
                Komentar
                <textarea class="form-control" rows="3" name="komentar"></textarea>
              </div>

              <!-- point nilai -->

              <div class="pesan-error-form user">
                <span><?php echo form_error('rating') ?></span>
              </div>

              <div class="form-group">
                Point
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rating" id="rating1" value="1" checked>
                    <label class="form-check-label" for="rating1">
                      <i class="fas fa-star" style="color: orange"></i>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rating" id="rating2" value="2">
                    <label class="form-check-label" for="rating2">
                      <i class="fas fa-star" style="color: orange"></i>
                      <i class="fas fa-star" style="color: orange"></i>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rating" id="rating3" value="3">
                    <label class="form-check-label" for="rating3">
                      <i class="fas fa-star" style="color: orange"></i>
                      <i class="fas fa-star" style="color: orange"></i>
                      <i class="fas fa-star" style="color: orange"></i>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rating" id="rating4" value="4">
                    <label class="form-check-label" for="rating4">
                      <i class="fas fa-star" style="color: orange"></i>
                      <i class="fas fa-star" style="color: orange"></i>
                      <i class="fas fa-star" style="color: orange"></i>
                      <i class="fas fa-star" style="color: orange"></i>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rating" id="rating5" value="5">
                    <label class="form-check-label" for="rating5">
                      <i class="fas fa-star" style="color: orange"></i>
                      <i class="fas fa-star" style="color: orange"></i>
                      <i class="fas fa-star" style="color: orange"></i>
                      <i class="fas fa-star" style="color: orange"></i>
                      <i class="fas fa-star" style="color: orange"></i>
                    </label>
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Beri Komentar dan Point</button>

              <a class="btn btn-danger" href="<?php echo base_url() ?>forum">Kembali</a>

              
              <?php echo form_close() ?>
            <!-- end form komentar -->


          </div>
        </div>
        <?php endif ?> <!-- end if jika sdh pernah komentar, tutup kolom komentar -->
        <?php endif ?> <!-- end if jika post sendiri, komen tidak muncul -->

        <?php foreach($posts['komentar'] as $komen) : ?>
        <!-- Single Comment -->
        <div class="card shadow mb-4">
          
          
          <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                    
                  <p class="text-center">
                    <img class="mr-3 rounded-circle" style="max-width: 70px" src="<?php echo base_url() ?>upload/memberpic/<?php echo $komen['foto'] ?>" alt="">
                    <br>
                    <span><?php echo $komen['nama'] ?></span>
                    <br>
                    <span><?php echo $komen['sekolah'] ?></span>
                  </p>
                </div>
                <div class="col">
                  <p><?php echo $komen['isikomentar'] ?></p>
                </div>
              </div> <!-- end of row -->
          </div> <!-- end of card-body -->

          <div class="card-footer">
            <span>Nilai: </span>
            <i class="fas fa-star" style="color: orange"></i>
            <i class="fas fa-star" style="color: orange"></i>
            <i class="fas fa-star" style="color: orange"></i>
            <i class="fas fa-star" style="color: orange"></i>
            <i class="fas fa-star" style="color: orange"></i>

            | <?php echo $komen['waktukomentar'] ?>
          </div>

        </div> <!-- end of card -->
        
        <!-- end of single Comment -->
        <?php endforeach ?>

      


      </div>

