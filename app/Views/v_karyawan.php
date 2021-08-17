<?= $this->extend('/template/basetemplate') ?>



<?= $this->section('content') ?>

<!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container pt-3 pb-3 bg-white">
      <div class="container-fluid">
        <form method="post" action="<?= base_url('/tambah_karyawan') ?>">
          <?= csrf_field(); ?>
          <h4 class="mb-4">Buat Data Karyawan Baru</h4>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for=" ">ID Pegawai</label>
              <input type="text" class="form-control" id="" name="id" value="<?= old('id') ?>">
            </div>
            <div class="form-group col-md-6">
              <label for=" ">Nama Pegawai</label>
              <input type="text" class="form-control" id="" name="nama" value="<?= old('nama') ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Jabatan</label>
            <select class="form-control" id="exampleFormControlSelect1" name="jabatan">
            <?php foreach ($jabatan as $jb) : ?>
              <option value="<?=$jb['id_jabatan']?>"><?=$jb['nama_jabatan']?></option>
              <?php endforeach ?>
            </select>
          </div>
      </div>
      <button type="submit" class="btn btn-primary ml-3 mt-3">Tambahkan</button>
      </form>
      <h4 class="mb-4 mt-5">Daftar Karyawan</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">ID Pegawai</th>
            <th scope="col">Nama Pegawai</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($karyawan as $kr) : ?>
            <tr>
              <th scope="row"><?= $i++ ?></th>
              <td><?= $kr['nomor_pegawai'] ?></td>
              <td><?= $kr['nama'] ?></td>
              <td><?= $kr['nama_jabatan'] ?></td>
              <td>
                <a href="<?= base_url("/editkaryawan/$kr[id_karyawan]"); ?>" type="button" class="btn btn-primary btn-sm">Edit</a>
                <a title="Delete" href="<?= base_url("/deletekaryawan/$kr[id_karyawan]"); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
              </td>
            </tr>
            
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>

</div>

<!-- Modal
<div class="modal fade" id="exampleModal<?= $kr['id_karyawan']?>" tabindex="-1" role="dialog" value="id" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= $karyawan['nama']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container pt-3 pb-3 bg-white">
      <div class="container-fluid">
      <form method="post" action="<?= base_url('/tambah_karyawan') ?>">
          <?= csrf_field(); ?>
          <h4 class="mb-4">Buat Data Karyawan Baru<?= $karyawanid['nomor_pegawai']?></h4>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for=" ">ID Pegawai <?= $karyawanid['id_karyawan'] ?></label>
              <input type="text" class="form-control" id="" name="id" value="<?= $kr['nomor_pegawai'] ?>">
            </div>
            <div class="form-group col-md-6">
              <label for=" ">Nama Pegawai</label>
              <input type="text" class="form-control" id="" name="nama" value="<?= old('nama') ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Jabatan</label>
            <select class="form-control" id="exampleFormControlSelect1" name="jabatan">
            <?php foreach ($jabatan as $jb) : ?>
              <option value="<?=$jb['id_jabatan']?>"><?=$jb['nama_jabatan']?></option>
              <?php endforeach ?>
            </select>
          </div>
      </div>
      <button type="submit" class="btn btn-primary ml-3 mt-3">Tambahkan</button>
      </form>
            </div>
            </div>
      </div>
    </div>
  </div>
</div> -->
<?= $this->endSection() ?>