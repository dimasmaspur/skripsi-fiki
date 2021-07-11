            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="container-fluid">
                     <!-- USER DATA-->
                     <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        Lowongan Kerja</h3>
                                        <div style="margin-left:40px;"><button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#exampleModal">
                                            <i class="zmdi zmdi-plus"></i>Tambah</button>
                                            </div>
                                            <br>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>
                                                       No
                                                    </td>
                                                    <td>Nama Posisi</td>
                                                    <td>Spesifikasi</td>
                                                    <td>Deskripsi</td>
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
                                                        <?= $user['nama_posisi'];?>
                                                    </td>
                                                    <td>
                                                        <?= $user['spesifikasi'];?>
                                                    </td>
                                                    <td>
                                                        <?= $user['deskripsi'];?>
                                                    </td>
                                                    <td>
                                                    <div class="table-data-feature">
                                                        <a href="<?= base_url('dashboard/edit_loker/'.$user['id']); ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="<?= base_url('dashboard/delete_loker/'.$user['id']); ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>
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

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Loker</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data" action="<?= base_url('dashboard/create_loker'); ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Posisi</label>
                <input type="text" class="form-control" name="nama_posisi" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Spesifikasi Pekerjaan</label>
                <textarea name="spesifikasi" id="" cols="30" class="form-control" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi Pekerjaan</label>
                <textarea name="deskripsi" id="" cols="30" class="form-control" rows="10"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>