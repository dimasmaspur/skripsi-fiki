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
                                        <p class="card-text">
                                            <?= $menu['spesifikasi'] ?>
                                        </p>
                                    </div>
                                    <a href="<?= base_url('android/lowongan_detail/'.$menu['id'])?>" class="btn btn-info">Detail</a>
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
