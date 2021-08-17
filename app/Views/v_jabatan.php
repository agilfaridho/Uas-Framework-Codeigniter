<?= $this->extend('/template/basetemplate') ?>
<?= $this->section('content') ?>

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid pt-3 pb-3 bg-white">
            <h4 class="mt-4 mb-4">
                Daftar Jabatan
            </h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Jabatan</th>
                        <th scope="col">Nominal Gaji Perhari</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jabatan as $d) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $d['nama_jabatan'] ?></td>
                            <td>Rp. <?= $d['nominal_gaji'] ?></td>
                            <td>
                                <a title="Edit" href="<?= base_url("/editjabatan/$d[id_jabatan]"); ?>" class="btn btn-success btn-sm">Edit</a>
                                <a title="Delete" href="<?= base_url("/deletejabatan/$d[id_jabatan]"); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
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