<?= $this->extend('Template/head_foot') ;?>
<?= $this->section('konten');?>
<div class="page-heading">

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pemasukan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('errors')) : ?>
                            <div class="alert alert-danger">
                                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <p><?= esc($error); ?></p>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <form class="form" method="post" action="<?=base_url('/save_pemasukan'); ?>"
                                enctype="multipart/form-data">
                                <?= csrf_field() ;?>
                                <div class="row">


                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="jumlah-column" class="form-label">Jumlah</label>
                                            <input type="number" id="jumlah-column" class="form-control" required
                                                placeholder="Jumlah" name="jumlah" data-parsley-required="true" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <input type="text" id="keterangan" class="form-control"
                                                placeholder="Keterangan" name="keterangan" required
                                                data-parsley-required="true" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="catatan" class="form-label">Catatan</label>
                                            <textarea class="form-control" id="catatan" rows="3" placeholder="Catatan" required
                                                name="catatan"></textarea>
                                        </div>
                                    </div>




                                </div>

                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">

                            <table class="table table-striped" id="table1">

                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                        <th>Catatan</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($getdata as $data) : ?>
                                    <tr>
                                        <td> <?= $data['created_at'] ?></td>
                                        <td><?= $data['keterangan'] ?></td>
                                        <td><?= $data['jumlah'] ?></td>
                                        <td><?= $data['catatan'] ?></td>


                                    </tr>
                                    <?php endforeach ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
<?= $this->endSection();?>