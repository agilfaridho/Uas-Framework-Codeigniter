<?= $this->extend('/template/basetemplate') ?>
<?= $this->section('content') ?>

<!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid pt-3 pb-3 bg-white">
      <div class="container-fluid">
        <form method="post" action="<?= base_url("/updatekaryawan/$karyawanid[id_karyawan]") ?>">
          <?= csrf_field(); ?>
          <h4 class="mb-4">Edit Karyawan</h4>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for=" ">Nomor Pegawai</label>
              <input type="text" class="form-control" id="" name="nomorpegawai" value="<?= $karyawanid['nomor_pegawai'] ?>">
            </div>
          <div class="form-group col-md-6">
            <label for=" ">Nama Karyawan</label>
            <input type="text" class="form-control" id="" name="namakaryawan" value="<?= $karyawanid['nama'] ?>">
          </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Jabatan</label>
            <select class="form-control" id="exampleFormControlSelect1" name="jabatan">
            <option value="<?= $karyawanid['nama_jabatan'] ?>" selected disabled hidden><?= $karyawanid['nama_jabatan'] ?></option>
            <?php foreach ($jabatan as $jb) : ?>
              <option value="<?=$jb['id_jabatan']?>"><?=$jb['nama_jabatan']?></option>
              <?php endforeach ?>
            </select>
          </div>
         
      </div>
      <button type="submit" class="btn btn-primary ml-3 mt-3">Update</button>
      </form>
    </div>
  </div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>

</div>


<?= $this->endSection() ?>