<?= $this->extend('/template/basetemplate') ?>
<?= $this->section('content') ?>

<!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid pt-3 pb-3 bg-white">
      <div class="container-fluid">
        <form method="post" action="<?= base_url('/inputabsen') ?>">
          <?= csrf_field(); ?>
          <h4 class="mb-4">Absensi Karyawan</h4>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Data Pegawai</label>
            <select class="form-control" id="exampleFormControlSelect1" name="data_pegawai">
              <?php foreach ($karyawan as $d) : ?>
                <option value="<?= $d['id_karyawan'] ?>"><?= $d['nomor_pegawai'] ?> - <?= $d['nama'] ?> - <?= $d['nama_jabatan'] ?> </option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for=" ">Masuk</label>
              <input type="text" class="form-control" id="" name="masuk" value="<?= old('masuk') ?>">
            </div>
            <div class="form-group col-md-4">
              <label for=" ">Izin</label>
              <input type="text" class="form-control" id="" name="izin" value="<?= old('izin') ?>">
            </div>
            <div class="form-group col-md-4">
              <label for=" ">Sakit</label>
              <input type="text" class="form-control" id="" name="sakit" value="<?= old('sakit') ?>">
            </div>
          </div>
      </div>
      <button type="submit" class="btn btn-primary ml-3 mt-3">Tambahkan</button>
      </form>

      <h4 class="mt-4 mb-4">
        Absensi Karyawan Di Bulan : Juli 2021
      </h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pegawai</th>
            <th scope="col">Masuk</th>
            <th scope="col">Ijin</th>
            <th scope="col">Sakit</th>
            <th scope="col">Total Gaji</th>
            <th scope="col">Print</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($absen as $d) : ?>
            <tr>
              <th scope="row"><?= $i++ ?></th>
              <td><?= $d['nama'] ?></td>
              <td><?= $d['masuk'] ?></td>
              <td><?= $d['izin'] ?></td>
              <td><?= $d['sakit'] ?></td>
              <td>Rp. <?= $d['gaji'] ?></td>
              <td>
                <a title="Print" href="<?= base_url("/printgaji/$d[id_karyawan]/$d[id_absensi]"); ?>" class="btn btn-success btn-sm">Print Slip Gaji</a>
                
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>

</div>
<?= $this->endSection() ?>