<div class="col-md-8">
<?php 
if(validation_errors()){
  echo "<div style='color:red'>".validation_errors()."</div>";
}
if($this->session->flashdata('pesan_error')){
  echo "<div style='color:red'>".
  $this->session->flashdata('pesan_error')."</div>";
}
if($this->session->flashdata('pesan_sukses')){
  echo "<div style='color:red'>".
  $this->session->flashdata('pesan_error')."</div>";
}
?>
  <form class="form-horizontal" action="<?php echo site_url();?>/user/store" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2">Email:</label>
      <div class="col-sm-10">
        <input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user ;?>">
        <input type="email" class="form-control" placeholder="Masukkan Email" name="email" value="<?php echo $email ;?>">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-sm-2">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
        <input type="hidden" class="form-control" placeholder="Masukkan Password" name="password1" value="<?php echo $password ;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Nama:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" value="<?php echo $nama ;?>">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2">Jenis Kelamin:</label>
      <div class="col-sm-10">
        <SELECT name="gender" class="form-control">
          <?php if($gender=="L") { ?>
            <option value="L" selected="selected">Laki - laki</option>
            <option value="P">Perempuan</option>
            <?php
          }
          else { ?>
            <option value="L">Laki - laki</option>
            <option value="P" selected="selected">Perempuan</option>
            <?php
          }
          ?>
          ?>
        </SELECT>
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2">Alamat:</label>
      <div class="col-sm-10">
        <textarea class="form-control" placeholder="Masukkan Alamat Lengkap" name="alamat"><?php echo $alamat ;?></textarea>
      </div>
    </div>
          <div class="form-group">
      <label class="control-label col-sm-2">Persetujuan:</label>
      <div class="col-sm-10">
        <SELECT name="status" class="form-control">
          <?php if($status==0) { ?>
            <option value="0" selected="selected">Belum DI setujui</option>
            <option value="1">DI setuhui</option>
            <?php
          }
          else { ?>
            <option value="0">Belum</option>
            <option value="1" selected="selected">Disetujui</option>
            <?php
          }
          ?>
          ?>
        </SELECT>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Simpan</button>
      </div>
    </div>
  </form>
</div>
