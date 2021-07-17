        <!-- Custom styles for this page -->
        <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <nav class="navbar bg-white topbar static-top shadow-lg fixed-top d-flex align-items-center justify-content-between px-5">
            <h3 class="h4 mb-0 text-gray-800">Pemilu Majelis Jemaat GKJW Jemaat Karangploso</h3>
          </nav>

          <h1 class="h3 mb-4 text-gray-800 mt-5">Tambah Jemaat</h1>

          <?= $this->session->flashdata('message'); ?>
          <form action="<?= base_url('Admin/submitTambahJemaat') ?>" method="POST">
            <div class="card shadow mb-4">
              <div class="card-header bg-primary py-3">
                <h6 class="m-0 font-weight-bold text-white">Data Jemaat</h6>
              </div>
              <div class="card-body">
                <ul class="list-group">
                  <li class="list-group-item">
                    <label for="Id" class="font-weight-bold">Id</label>
                    <input type="text" class="form-control d-block" value="<?= $jumlah + 10001 ?>" name="id" readonly>
                  </li>
                  <li class="list-group-item">
                    <label for="Username" class="font-weight-bold">Nama</label>
                    <input type="text" class="form-control d-block" name="nama" autocomplete="off" required>
                  </li>
                  <li class="list-group-item">
                    <label for="Jenis Kelamin" class="font-weight-bold">Jenis Kelamin</label>
                    <select class="custom-select" name="kelompok" required>
                      <option value="" disabled selected>Pilih kelompok</option>
                      <option value="Karangploso" class="d-block">Karangploso</option>
                      <option value="Pendem" class="d-block">Pendem</option>
                      <option value="GPA" class="d-block">GPA</option>
                      <option value="Babaan" class="d-block">Babaan</option>
                    </select>
                  </li>
                </ul>

                <button type="submit" class="btn btn-success btn-icon-split mt-4 float-right">
                  <span class="icon"><i class="fas fa-fw fa-plus"></i></span>
                  <span class="text">TAMBAH JEMAAT</span>
                </button>
          </form>
        </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->