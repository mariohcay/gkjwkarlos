
      <div id="content-wrapper" class="d-flex flex-column">
        
        <div class="container-fluid mt-5">

        <form action="<?= base_url('Dashboard/submitPassword')?>" method="POST">
          <!-- Page Heading -->
          <h4 class="mb-0 text-gray-800 text-center mb-4">Silahkan Login terlebih dahulu</h4>
          <div class="dropdown show">
  
          <div class="row d-flex justify-content-center">
            <div class="col col-lg-6">
            <div class="card shadow-lg mb-4">
              <div class="card-body">
                <?= $this->session->flashdata('message');?>
                <div class="form-group">
                  <label for="kelompok">Pilih Kelompok</label>
                  <select name="kelompok" id="kelompok" class="form-control">
                    <option value="Karangploso" <?php if($this->session->flashdata('kelompok') == "Karangploso") { echo "selected"; }?>>Karangploso</option>
                    <option value="Pendem" <?php if($this->session->flashdata('kelompok') == "Pendem") { echo "selected"; }?>>Pendem</option>
                    <option value="GPA" <?php if($this->session->flashdata('kelompok') == "GPA") { echo "selected"; }?>>GPA</option>
                    <option value="Babaan" <?php if($this->session->flashdata('kelompok') == "Babaan") { echo "selected"; }?>>Babaan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="nama">Pilih Nama Anda</label>
                  <select name="nama" id="nama" class="form-control">
                  </select>
                </div>
                <div class="form-group">
                <label for="password">Password</label>
                  <input type="text" class="form-control" name="password" id="password" required autocomplete="off">
                </div>
                <hr>
                <input class="btn btn-primary btn-block font-weight-bold" type="submit" value="LOGIN">
                <p class="text-center my-2">atau</p>
                <a href="<?= base_url('Dashboard/hasil')?>" class="btn btn-secondary btn-block font-weight-bold">LIHAT HASIL SEMENTARA</a>
              </div>
            </div>
            </div>
          </div>
        </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<script>
  $(document).ready(function(){
    var kelompok = $("#kelompok").val();
    $.ajax({
      url: "<?= base_url()?>Dashboard/listNama",
      type: "POST",
      data: {kelompok: kelompok},
      dataType: "json",
      success: function(result){
        var html = '';
        for(var i=0; i<result.length; i++){
          html += '<option value="'+result[i]['nama']+'">'+result[i]['nama']+'</option>';
        }
        $('#nama').html(html);      
      }
    });
  });
  $('#kelompok').change(function(){
    var kelompok = $("#kelompok").val();
    $.ajax({
      url: "<?= base_url()?>Dashboard/listNama",
      type: "POST",
      data: {kelompok: kelompok},
      dataType: "json",
      success: function(result){
        console.log(result);
        var html = '';
        for(var i=0; i<result.length; i++){
          html += '<option value="'+result[i]['nama']+'">'+result[i]['nama']+'</option>';
        }
        $('#nama').html(html);      
      }
    });
  });
</script>