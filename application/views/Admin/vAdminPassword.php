
      <div id="content-wrapper" class="d-flex flex-column">
        
        <div class="container-fluid mt-5">

        <form action="<?= base_url('Admin/submitPassword')?>" method="POST">
          <!-- Page Heading -->
          <h4 class="mb-0 text-gray-800 text-center mb-4">Silahkan Login terlebih dahulu</h4>
          <div class="dropdown show">
  
          <div class="row d-flex justify-content-center">
            <div class="col col-lg-6">
            <div class="card shadow-lg mb-4">
              <div class="card-body">
                <?= $this->session->flashdata('message');?>
                <div class="form-group">
                <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" required autocomplete="off">
                </div>
                <hr>
                <input class="btn btn-primary btn-block font-weight-bold" type="submit" value="LOGIN">
              </div>
            </div>
            </div>
          </div>
        </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->