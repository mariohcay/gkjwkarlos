            <nav class="navbar bg-white topbar static-top shadow-lg fixed-top d-flex align-items-center justify-content-between px-4">
                <h3 class="h5 mb-0 text-gray-800">Hasil Pemilu Majelis Jemaat GKJW Jemaat Karangploso</h3>
            </nav>


            <div class="mt-4">.</div>
            <div class="container-fluid">

                <div class="row mb-4 justify-content-between">
                    <div class="col">
                        <a href="<?= base_url('Admin/exportExcel') ?>" class="btn-sm btn-success btn-icon-split font-weight-bold text-decoration-none">
                            <span class="icon text-white-50">
                                <i class="fas fa-file-excel-o text-white"></i>
                            </span>
                            <span class="text">EXPORT EXCEL</span>
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
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kelompok Karangploso</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped display" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kelompok</th>
                                        <th>Jumlah Suara</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($karangploso as $data) :
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['jenisKelamin'] ?></td>
                                            <td><?= $data['kelompok'] ?></td>
                                            <td><b><?= $data['suara'] ?></b></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kelompok Pendem</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped display" id="dataTable2" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kelompok</th>
                                        <th>Jumlah Suara</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($pendem as $data) :
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['jenisKelamin'] ?></td>
                                            <td><?= $data['kelompok'] ?></td>
                                            <td><b><?= $data['suara'] ?></b></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kelompok GPA</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped display" id="dataTable3" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kelompok</th>
                                        <th>Jumlah Suara</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($gpa as $data) :
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['jenisKelamin'] ?></td>
                                            <td><?= $data['kelompok'] ?></td>
                                            <td><b><?= $data['suara'] ?></b></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kelompok Babaan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped display" id="dataTable4" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kelompok</th>
                                        <th>Jumlah Suara</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($babaan as $data) :
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['jenisKelamin'] ?></td>
                                            <td><?= $data['kelompok'] ?></td>
                                            <td><b><?= $data['suara'] ?></b></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <script>
                $(document).ready(function() {
                    $('#dataTable, #dataTable2, #dataTable3, #dataTable4').DataTable({
                        "order": [],
                        "pageLength": 25
                    });
                    $('table.display').DataTable();
                });
            </script>