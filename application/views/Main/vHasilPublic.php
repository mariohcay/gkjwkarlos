            <nav class="navbar bg-white topbar static-top shadow-lg fixed-top d-flex align-items-center justify-content-between px-5">
                <h3 class="h5 mb-0 text-gray-800">Hasil Pemilu Majelis Jemaat GKJW Jemaat Karangploso</h3>
            </nav>


            <div class="mt-4">.</div>
            <div class="container-fluid">

                <div class="row">
                    <div class="col mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Suara Masuk
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round((count($sudah) / count($jemaat) * 100), 2) ?>%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
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