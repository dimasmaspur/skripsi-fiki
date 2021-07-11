            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="container-fluid">
                     <!-- USER DATA-->
                     <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        User</h3>
                                    
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        No
                                                    </td>
                                                    <td>Nama</td>
                                                    <td>Alamat</td>
                                                    <td>No Telpon</td>
                                                    <td>role</td>
                                                    <td>action</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $no = 1;
                                                foreach($datauser as $data => $user){
                                            ?>
                                                <tr>
                                                    <td>
                                                       <?= $no;?>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6><b><?= $user['nama'];?></b></h6>
                                                            <span>
                                                                <?= $user['email'];?>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?= $user['alamat'];?>
                                                    </td>
                                                    <td>
                                                        <?= $user['no_telp'];?>
                                                    </td>
                                                    <td>
                                                        <?= $user['role'];?>
                                                    </td>
                                                    <td>
                                                    <div class="table-data-feature">
                                                        <a href="<?= base_url('dashboard/delete_user/'.$user['id']) ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a >
                                                    </div>
                                                    </td>
                                                   
                                                </tr>
                                                <?php
                    
                                                    $no++;
                                                    }
                                                    ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                   
                                </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
