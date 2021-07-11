            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                <div class="col-md-4">
                <?php 
                                    $no = 1;
                                    foreach($datamenu as $data => $menu){
                            ?>
                                <div class="card border border-primary">
                                    <div class="card-header">
                                        <strong class="card-title">Lamaran untuk <?= $menu['nama_posisi'] ?></strong>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data" action="<?= base_url('android/proses_lamar/'.$menu['id']); ?>">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Upload CV</label>
                                                <input type="file" class="form-control" name="cv" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Upload KTP</label>
                                                <input type="file" class="form-control" name="ktp" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Upload Surat Lamaran</label>
                                                <input type="file" class="form-control" name="surat_lamaran" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Upload Kartu Keluarga</label>
                                                <input type="file" class="form-control" name="kk" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Upload SKCK</label>
                                                <input type="file" class="form-control" name="skck" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Upload Foto</label>
                                                <input type="file" class="form-control" name="foto" required>
                                            </div>
                                           
                                    </div>
                                    <div class="modal-footer" >
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            <?php
                                    }
                            ?>
                            </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
