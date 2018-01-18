 <form class="form-horizontal" action="<?php echo site_url();?>/user/register" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" placeholder="Masukkan Email" name="email">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-sm-2">Password:</label>
      <div class="col-sm-10">
        <input type="Password" class="form-control" placeholder="Masukkan Password" name="password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Nama:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-sm-2">Jenis Kelamin:</label>
      <div class="col-sm-10">
        <SELECT name="gender" class="form-control">
            <option value="L">Laki - laki</option>
            <option value="P">Perempuan</option>
        </SELECT>
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2">Alamat:</label>
      <div class="col-sm-10">
        <textarea class="form-control" placeholder="Masukkan Alamat Lengkap" name="alamat"></textarea>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Simpan</button>
      </div>
    </div>
  </form>