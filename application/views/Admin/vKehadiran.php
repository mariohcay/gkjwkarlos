            <nav class="navbar bg-white topbar static-top shadow-lg fixed-top d-flex align-items-center justify-content-between px-4">
              <h3 class="h5 mb-0 text-gray-800">Daftar Pemilih Pemilu Majelis Jemaat GKJW Karangploso</h3>

            </nav>


            <div class="mt-4">.</div>
            <div class="container-fluid">

              <div class="row mb-4">
                <div class="col">
                  <a href="<?= base_url('Admin/hasil') ?>" class="btn-sm btn-primary btn-icon-split font-weight-bold text-decoration-none">
                    <span class="icon text-white-50">
                      <i class="fas fa-eye text-white"></i>
                    </span>
                    <span class="text">LIHAT HASIL</span>
                  </a>
                </div>
                <div class="col d-flex justify-content-end">
                  <a href="<?= base_url('Logout') ?>" class="btn-sm btn-danger btn-icon-split font-weight-bold ml-4 text-decoration-none">
                    <span class="icon text-white-50">
                      <i class="fas fa-power-off text-white"></i>
                    </span>
                    <span class="text">LOGOUT</span>
                  </a>
                </div>
              </div>

              <div class="row">

                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pemilih</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($jemaat) ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-danger shadow h-100 py-2">
                    <a href="#belum" class="text-decoration-none scroll">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                              Belum Memilih</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($belum) ?></div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-warning shadow h-100 py-2">
                    <a href="#sedang" class="text-decoration-none scroll">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                              Sedang Memilih</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($sedang) ?></div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-success shadow h-100 py-2">
                    <a href="#sudah" class="text-decoration-none scroll">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              Sudah Memilih</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($sudah) ?></div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

              </div>

              <!-- Page Heading -->
              <?= $this->session->flashdata('pesan'); ?>
              <div class="card shadow mb-4" id="belum">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Jemaat yang Belum Memilih</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nama</th>
                          <th>Kelompok</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($belum as $data) : ?>
                          <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['kelompok'] ?></td>
                            <td><?= $data['status'] ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card shadow mb-4" id="sedang">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Jemaat yang Sedang Memilih</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="dataTable2" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nama</th>
                          <th>Kelompok</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($sedang as $data) : ?>
                          <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['kelompok'] ?></td>
                            <td><?= $data['status'] ?></td>
                            <td>
                              <a href="<?= base_url('Admin/resetStatus/' . $data['id'] . '/' . $data['nama']) ?>" class="btn-sm btn-info btn-icon-split font-weight-bold ml-4 text-decoration-none" id="tambah">
                                <span class="icon text-white-50">
                                  <i class="fas fa-refresh text-white"></i>
                                </span>
                                <span class="text">RESET</span>
                              </a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card shadow mb-4" id="sudah">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Jemaat yang Sudah Memilih</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="dataTable3" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nama</th>
                          <th>Kelompok</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($sudah as $data) : ?>
                          <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['kelompok'] ?></td>
                            <td><?= $data['status'] ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- <ul class="list-group">
              <div class="row px-4">
                <?php foreach ($majelis as $data) : ?>
                <div class="col-lg-3 col-sm mb-4">
                  <li class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center align-middle">
                    <div class="form-check h5">
                      <input class="form-check-input" type="checkbox" value="<?= $data['nama'] ?>" name="majelis[]" style="transform: scale(1.7);">
                      <div class="ml-5">
                        <label class="form-check-label font-weight-bold"><?= $data['noUrut'] ?>. </label>
                        <label class="form-check-label font-weight-bold"><?= $data['nama'] ?></label><br>
                        <label class="form-check-label h6">Kelompok: <?= $data['kelompok'] ?></label>
                      </div>
                    </div>
                  </li>
                </div>
                <?php endforeach; ?> 
              </div>
            </ul> -->

            </div>
            <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <script>
              $(document).ready(function() {
                $('#dataTable, #dataTable2, #dataTable3').DataTable({
                  "order": [],
                  "pageLength": 25
                });
                $('table.display').DataTable();

                $('.scroll').on('click', function(e) {
                  e.preventDefault();
                  var offset = 90;
                  var target = this.hash;
                  if ($(this).data('offset') != undefined) offset = $(this).data('offset');
                  $('html, body').stop().animate({
                    'scrollTop': $(target).offset().top - offset
                  }, 0, '', function() {});
                });
              });
            </script>