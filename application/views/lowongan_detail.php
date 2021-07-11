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
                                        <strong class="card-title"><?= $menu['nama_posisi'] ?></strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <strong class="card-title">Spesifikasi Pekerjaan</strong>
                                            <br>
                                            <p>
                                            <?= $menu['spesifikasi'] ?>
                                            </p>
                                        </div>
                                        <br>
                                        <div class="card-text">
                                        <strong class="card-title " >Deskripsi Pekerjaan</strong>
                                        <p>
                                        <?= $menu['deskripsi'] ?>
                                        </p>
                                        </div>
                                    </div>
                                    <a href="<?= base_url('android/lamar/'.$menu['id'])?>" class="btn btn-success">Lamar</a>
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
