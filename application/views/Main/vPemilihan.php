<div id="content-wrapper" class="d-flex flex-column">

  <form action="<?= base_url('Dashboard/konfirmasiPilihan') ?>" method="POST">
    <nav class="navbar bg-white topbar shadow-lg fixed-top d-flex align-items-center justify-content-between px-5">
      <div class="row align-items-center">
        <h4 class="text-gray-800 h5">Daftar Calon Penatua & Diaken dari Kelompok <b><?= $kelompok ?></b></h4>
        <div id="kelompok" class="d-none" class="ml-2">
          <h5><b><u><?= $kelompok ?></u></b></h5>
        </div>
      </div>
    </nav>



    <div class="container-fluid mt-5" id="main">

      <div class="row mx-2 mb-2">
        <h6 class="font-weight-bold">
          <?php
          if ($kelompok === "Karangploso") {
            echo "Pilihlah maksimal 15 nama yang akan Bpk/Ibu/Sdr/I calonkan sebagai Penatua & Diaken.";
          } else if ($kelompok === "Pendem" || $kelompok === "GPA") {
            echo "Pilihlah maksimal 6 nama yang akan Bpk/Ibu/Sdr/I calonkan sebagai Penatua & Diaken.";
          } else if ($kelompok === "Babaan") {
            echo "Pilihlah maksimal 4 nama yang akan Bpk/Ibu/Sdr/I calonkan sebagai Penatua & Diaken.";
          }
          ?>
        </h6>
      </div>

      <!-- Page Heading -->
      <div class="card shadow mb-4" id="karangploso">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="row">
                <?php foreach ($lakilaki as $data) : ?>
                  <div class="col-lg-6 col-sm-6 mb-4">
                    <li class="list-group-item list-group-item-primary py-2">
                      <div class="form-check h5 d-flex align-items-center mb-0">
                        <input class="form-check-input my-0" type="checkbox" value="<?= $data['noUrut'] ?>" name="majelis[]" style="transform: scale(1.7);">
                        <div class="ml-4">
                          <label class="form-check-label font-weight-bold h6"><?= $data['nama'] ?></label><br>
                          <label class="form-check-label h6">Jenis Kelamin
                            : <?= $data['jenisKelamin'] ?></label><br>
                          <!-- <label class="form-check-label h6">Kelompok: <?= $data['kelompok'] ?></label> -->
                        </div>
                      </div>
                    </li>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <?php foreach ($perempuan as $data) : ?>
                  <div class="col-lg-6 col-sm-6 mb-4">
                    <li class="list-group-item list-group-item-danger py-2">
                      <div class="form-check h5 d-flex align-items-center mb-0">
                        <input class="form-check-input my-0" type="checkbox" value="<?= $data['noUrut'] ?>" name="majelis[]" style="transform: scale(1.7);">
                        <div class="ml-4">
                          <label class="form-check-label font-weight-bold h6"><?= $data['nama'] ?></label><br>
                          <label class="form-check-label h6">Jenis Kelamin
                            : <?= $data['jenisKelamin'] ?></label><br>
                          <!-- <label class="form-check-label h6">Kelompok: <?= $data['kelompok'] ?></label> -->
                        </div>
                      </div>
                    </li>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  </form>

  <nav class="navbar bg-white topbar shadow-lg fixed-bottom flex-row justify-content-end">
    <div class="d-flex align-items-center justify-content-between px-5">
      <h3 class="h5 text-gray-800 mb-0" id="pilihan"></h3>
      <input class="btn-sm btn-primary font-weight-bold ml-4" id="submit" type="submit" value="SELESAI">
    </div>
  </nav>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
  var kelompok = "";
  var max = 0;
  var numberOfChecked = 0;
  var totalCheckBox = $('input:checkbox').length;

  $(document).ready(function() {
    kelompok = $("#kelompok").text().trim();
    numberOfChecked = $("input:checkbox:checked").length;

    if (kelompok == "Karangploso") {
      max = 15;
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
    }
    if (kelompok == "Pendem") {
      max = 6;
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
    }
    if (kelompok == "GPA") {
      max = 6;
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
    }
    if (kelompok == "Babaan") {
      max = 4;
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
    }

    if (numberOfChecked > 0) {
      $("#submit").show();
    } else {
      $("#submit").hide();
    }
  });

  $("#pilihKelompok").change(function() {
    $("#pilih").click();
  });

  $("#submit").hide();

  $("input:checkbox").click(function() {
    numberOfChecked = $("input:checkbox:checked").length;

    if (numberOfChecked > max) {
      alert("Anda hanya dapat memilih " + max + " Calon")
      return false;
    }
    if (numberOfChecked > 0) {
      $("#submit").show();
    } else {
      $("#submit").hide();
    }

    if (kelompok == "Karangploso") {
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
    } else if (kelompok == "Pendem") {
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
    } else if (kelompok == "GPA") {
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
    } else if (kelompok == "Babaan") {
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
    } else
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
  });
</script>