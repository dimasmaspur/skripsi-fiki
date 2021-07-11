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
                                        <strong class="card-title">Lamaran <?= $menu['nama_posisi'] ?></strong>

                                    </div>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <strong class="card-title">Status Lamaran</strong> &nbsp;
                                            <?php
                                                if($menu['status'] === 'interview'){
                                                    ?>
                                                        <span class="btn btn-success"><?= $menu['status'] ?></span>
                                                      
                                                        <p class="mt-4">Admin akan menghubungi untuk proses interview</p>
                                                    <?php
                                                }
                                                else if($menu['status'] === 'di tolak'){
                                                    ?>
                                                        <span class="btn btn-danger"><?= $menu['status'] ?></span>
                                                        <p class="mt-4">Maaf kamu masih belum memenuhi kualifikasi kami</p>

                                                    <?php
                                                }
                                                else if($menu['status'] === 'melamar'){
                                                    ?>
                                                        <span class="btn btn-info"><?= $menu['status'] ?></span>
                                                        <a href="<?= base_url('android/delete_lamaran/'.$menu['id']); ?>"><span class="btn btn-danger">Batalkan</span></a>

                                                    <?php
                                                }
                                                else if($menu['status'] === 'di review'){
                                                    ?>
                                                        <span class="btn btn-warning"><?= $menu['status'] ?></span>
                                                        <p class="mt-4">Lamaran kamu sedang kami review</p>

                                                    <?php
                                                }
                                            ?>
                                        </div>
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
