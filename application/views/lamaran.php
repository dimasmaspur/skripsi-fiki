            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="container-fluid">
                     <!-- USER DATA-->
                     <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        Lamaran</h3>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>
                                                       No
                                                    </td>
                                                    <td>Nama Loker</td>
                                                    <td>Nama User</td>
                                                    <td>No Telpon</td>
                                                    <td>Email</td>
                                                    <td>cv</td>
                                                    <td>ktp</td>
                                                    <td>surat lamaran</td>
                                                    <td>kartu keluarga</td>
                                                    <td>skck</td>
                                                    <td>foto</td>
                                                    <td>status</td>
                                                    <td>Action</td>
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
                                                    <?= $user['nama_user'];?>
                                                    </td>
                                                    <td>
                                                    <?= $user['no_telp'];?>
                                                    </td>
                                                    <td>
                                                    <?= $user['email'];?>
                                                    </td>
                                                    <td>
                                                    <a href="<?= base_url('uploads/'.$user['cv']) ?>" target="_blank">
                                                    <span class="status--process">Download</span>
                                                    </a>
                                                    </td>
                                                    <td>
                                                    <a href="<?= base_url('uploads/'.$user['ktp']) ?>" target="_blank">
                                                    <span class="status--process">Download</span>
                                                    </a>
                                                    </td>
                                                    <td>
                                                    <a href="<?= base_url('uploads/'.$user['surat_lamaran']) ?>" target="_blank">
                                                    <span class="status--process">Download</span>
                                                    </a>
                                                    </td>
                                                    <td>
                                                    <a href="<?= base_url('uploads/'.$user['kk']) ?>" target="_blank">
                                                    <span class="status--process">Download</span>
                                                    </a>
                                                    </td>
                                                    <td>
                                                    <a href="<?= base_url('uploads/'.$user['skck']) ?>" target="_blank">
                                                    <span class="status--process">Download</span>
                                                    </a>                                                    
                                                    </td>
                                                    <td>
                                                        <img src="<?= base_url('uploads/'.$user['foto']) ?>" alt="foto" width="50">
                                                    </td>
                                                    <td><?= $user['status'];?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('dashboard/tolak/'.$user['id']); ?>" class="item" data-toggle="tooltip" data-placement="top" title="Tolak Lamaran">
                                                            <span class="role admin">Tolak</span>
                                                        </a>
                                                      
                                                    </td>
                                                    <td>  
                                                        <a href="<?= base_url('dashboard/review/'.$user['id']); ?>" class="item" data-toggle="tooltip" data-placement="top" title="Review Lamaran">
                                                            <span class="role user">Review</span>
                                                        </a>
                                                       
                                                   </td>
                                                    <td> 
                                                        <a href="<?= base_url('dashboard/interview/'.$user['id']); ?>" class="item" data-toggle="tooltip" data-placement="top" title="Panggil interview">
                                                            <span class="role member">Interview</span>
                                                        </a>
                                                    </td>
                                                    <td> 
                                                        <a href="<?= base_url('dashboard/delete_lamaran/'.$user['id']); ?>" class="item" data-toggle="tooltip" data-placement="top" title="Hapus Lamaran">
                                                            <span class="role admin">Hapus</span>
                                                        </a>
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