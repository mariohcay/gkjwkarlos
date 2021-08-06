<div id="content-wrapper" class="d-flex flex-column">

  <form action="<?= base_url('Dashboard/konfirmasiPilihan') ?>" method="POST">
    <nav class="navbar bg-white topbar shadow-lg fixed-top d-flex align-items-center justify-content-between px-5">
      <div class="row align-items-center justify-content-between">
        <h5 class="text-gray-800 h5 mb-0" id="terpilih"></h5>
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
            echo "Berikut nama - nama calon Penatua dan Diaken. <b class='text-uppercase'>UNTUK KELOMPOK ".$kelompok."</b> diharapkan mencalonkan <b>maksimal 15 orang</b> yang terdiri dari <b>7 calon LAKI-LAKI</b> dan <b>8 calon PEREMPUAN.</b>";
          } else if ($kelompok === "Pendem") {
            echo "Berikut nama - nama calon Penatua dan Diaken. <b class='text-uppercase'>UNTUK PEPANTHAN ".$kelompok."</b> diharapkan mencalonkan <b>maksimal 6 orang</b> yang terdiri dari <b>4 calon LAKI-LAKI</b> dan <b>2 calon PEREMPUAN.</b>";
          } else if ($kelompok === "GPA") {
            echo "Berikut nama - nama calon Penatua dan Diaken. <b class='text-uppercase'>UNTUK KELOMPOK ".$kelompok."</b> diharapkan mencalonkan <b>maksimal 6 orang</b> yang terdiri dari <b>3 calon LAKI-LAKI</b> dan <b>3 calon PEREMPUAN.</b>";
          } else if ($kelompok === "Babaan") {
            echo "Berikut nama - nama calon Penatua dan Diaken. <b class='text-uppercase'>UNTUK KELOMPOK ".$kelompok."</b> diharapkan mencalonkan <b>maksimal 4 orang</b> yang terdiri dari <b>2 calon LAKI-LAKI</b> dan <b>2 calon PEREMPUAN.</b>";
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
                        <input class="form-check-input my-0" type="checkbox" value="<?= $data['noUrut'] ?>" name="majelis[]" id="lakiLaki" style="transform: scale(1.7);">
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
                        <input class="form-check-input my-0" type="checkbox" value="<?= $data['noUrut'] ?>" name="majelis[]" id="perempuan" style="transform: scale(1.7);">
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
  var l = 0;
  var p = 0;
  var lakiLaki = 0;
  var perempuan = 0;
  var numberOfChecked = 0;
  var totalCheckBox = $('input:checkbox').length;

  $(document).ready(function() {
    kelompok = $("#kelompok").text().trim();
    numberOfChecked = $("input:checkbox:checked").length;
    lakiLaki = $('#lakiLaki:checked').length;
    perempuan = $('#perempuan:checked').length;

    if (kelompok == "Karangploso") {
      max = 15;
      l = 7;
      p = 8;
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
      $('#terpilih').text("Terpilih " + lakiLaki + " dari " + l + " calon laki-laki dan " + perempuan + " dari " + p + " calon perempuan");
    }
    if (kelompok == "Pendem") {
      max = 6;
      l = 4;
      p = 2;
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
      $('#terpilih').text("Terpilih " + lakiLaki + " dari " + l + " calon laki-laki dan " + perempuan + " dari " + p + " calon perempuan");
    }
    if (kelompok == "GPA") {
      max = 6;
      l = 3;
      p = 3;
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
      $('#terpilih').text("Terpilih " + lakiLaki + " dari " + l + " calon laki-laki dan " + perempuan + " dari " + p + " calon perempuan");
    }
    if (kelompok == "Babaan") {
      max = 4;
      l = 2;
      p = 2;
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
      $('#terpilih').text("Terpilih " + lakiLaki + " dari " + l + " calon laki-laki dan " + perempuan + " dari " + p + " calon perempuan");
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
    lakiLaki = $('#lakiLaki:checked').length;
    perempuan = $('#perempuan:checked').length;

    if (numberOfChecked > max) {
      alert("Anda hanya dapat memilih " + max + " calon")
      return false;
    }
    if (lakiLaki > l){
      alert("Anda hanya dapat memilih " + l + " calon laki-laki")
      return false;
    }
    if (perempuan > p){
      alert("Anda hanya dapat memilih " + p + " calon perempuan")
      return false;
    }
    if (numberOfChecked > 0) {
      $("#submit").show();
    } else {
      $("#submit").hide();
    }

    if (kelompok == "Karangploso") {
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
      $('#terpilih').text("Terpilih " + lakiLaki + " dari " + l + " calon laki-laki dan " + perempuan + " dari " + p + " calon perempuan");
    } else if (kelompok == "Pendem") {
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
      $('#terpilih').text("Terpilih " + lakiLaki + " dari " + l + " calon laki-laki dan " + perempuan + " dari " + p + " calon perempuan");
    } else if (kelompok == "GPA") {
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
      $('#terpilih').text("Terpilih " + lakiLaki + " dari " + l + " calon laki-laki dan " + perempuan + " dari " + p + " calon perempuan");
    } else if (kelompok == "Babaan") {
      $('#pilihan').text("Terpilih " + numberOfChecked + " dari " + max);
      $('#terpilih').text("Terpilih " + lakiLaki + " dari " + l + " calon laki-laki dan " + perempuan + " dari " + p + " calon perempuan");
    } 
  });
</script>