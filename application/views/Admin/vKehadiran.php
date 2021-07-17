            <nav class="navbar bg-white topbar static-top shadow-lg fixed-top d-flex align-items-center justify-content-between px-5">
              <h3 class="h5 mb-0 text-gray-800">Daftar Pemilih Pemilu Majelis Jemaat GKJW Karangploso</h3>

            </nav>


            <div class="mt-4">.</div>
            <div class="container-fluid">

              <div class="row mb-4">
                <div class="col">
                  <a href="<?= base_url('Admin/hasil') ?>" class="btn-sm btn-primary btn-icon-split font-weight-bold ml-4" id="tambah">
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


              <!-- Page Heading -->
              <?= $this->session->flashdata('message'); ?>
              <div class="card shadow mb-4">
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

              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Jemaat yang Sudah Memilih</h6>
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
                $('#dataTable, #dataTable2').DataTable({
                  "order": [],
                  "pageLength": 25
                });
                $('table.display').DataTable();
              });
            </script>