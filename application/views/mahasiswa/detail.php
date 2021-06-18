<div class="container">
    <div class="row mt-3 mb-3 justify-content-center">
        <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $mahasiswa['nama']; ?></h5>
                <br>
                <h6 class="card-subitle mb-2 text-muted"><?= $mahasiswa['email']; ?></h6>
                <p class="card-text"><?= $mahasiswa['nim']; ?></p>
                <p class="card-text"><?= $mahasiswa['jurusan']; ?></p>
    
                <a href="<?php echo base_url() ?>mahasiswa" class="btn btn-primary">Kembali</a>
            </div>
            </div>
        </div>
    </div>
</div>
</div>