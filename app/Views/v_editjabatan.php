<?= $this->extend('/template/basetemplate') ?>
<?= $this->section('content') ?>

<!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid pt-3 pb-3 bg-white">
      <div class="container-fluid">
        <form method="post" action="<?= base_url("/updatejabatan/$jabatan[id_jabatan]") ?>">
          <?= csrf_field(); ?>
          <h4 class="mb-4">Edit Jabatan</h4>
          <div class="form-group ">
            <label for=" ">Nama Jabatan</label>
            <input type="text" class="form-control" id="" name="namajabatan" value="<?= $jabatan['nama_jabatan'] ?>">
          </div>
          <div class="form-group">
            <label for=" ">Nominal Gaji Perbulan</label>
            <input type="text" class="form-control" id="" name="nominal" value="<?= $jabatan['nominal_gaji'] ?>">
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