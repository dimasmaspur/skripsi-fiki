            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="container-fluid">
                     <!-- USER DATA-->
                     <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        Edit Lowongan Kerja</h3>
                                       <div style="margin-left:40px;margin-right:40px;">
                                        <form method="POST" enctype="multipart/form-data" action="<?= base_url('dashboard/proses_edit_loker/'.$datamenu[0]['id']); ?>">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Posisi</label>
                                                <input type="text" class="form-control" name="nama_posisi" value="<?= set_value('nama_posisi',$datamenu[0]['nama_posisi'])?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Spesifikasi Pekerjaan</label>
                                                <textarea name="spesifikasi" id="" cols="30" class="form-control" rows="10"><?= $datamenu[0]['spesifikasi']?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Deskripsi Pekerjaan</label>
                                                <textarea name="deskripsi" id="" cols="30" class="form-control" rows="10"><?= $datamenu[0]['deskripsi']?></textarea>
                                            </div>
                                    </div>
                                    <div class="modal-footer" style="margin-right:40px;">
                                        <button type="submit" class="btn btn-warning">Simpan</button>
                                        </form>
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