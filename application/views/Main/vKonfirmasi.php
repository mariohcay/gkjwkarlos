<div id="content-wrapper" class="d-flex flex-column">

  <div class="container-fluid mb-5">

    <!-- Page Heading -->

    <div class="text-center">
      <h3 class="h4 text-gray-800 mb-4">Pilihan Anda adalah sebagai berikut:</h3>
      <div class="font-weight-bold">
        <?php
        foreach ($majelis as $data) {
        ?>
          <h4 class="font-weight-bold text-dark"><?= $data['nama'] ?></h4>
        <?php
        }
        ?>
      </div>
      <h3 class="h4 mb-4 text-gray-800 mt-4">Apakah sudah yakin dengan pilihan Anda?</h3>
    </div>

    <div class="row d-flex justify-content-center">
      <a href="javascript:history.back()" class="btn btn-danger btn-icon-split mr-3">
        <span class="icon text-white-50">
          <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">KEMBALI</span>
      </a>
      <a href="<?= base_url('Dashboard/submitPilihan') ?>" class="btn btn-success btn-icon-split ml-3">
        <span class="text">YAKIN</span>
        <span class="icon text-white-50">
          <i class="fas fa-arrow-right"></i>
        </span>
      </a>
    </div>


  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->