<?= $this->extend('Template/head_foot') ;?>
<?= $this->section('konten');?>
<div class="page-heading">

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Saldo Saya</h4>
                    </div>
                     <!-- Menampilkan pesan kesalahan jika ada -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('errors') ?>
            </div>
        <?php endif; ?>
        
        <!-- Form atau informasi saldo lainnya dapat ditambahkan di sini -->
                    <div class="card-content">
                        <?php foreach($getsaldo as $saldo) :?>
                    <div class="card-body">
                            
                            <p class="card-text">
                              Sisa Saldo kamu :  <?= $saldo['jmlh_saldo'] ?>
                            </p>
                          
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
<?= $this->endSection();?>