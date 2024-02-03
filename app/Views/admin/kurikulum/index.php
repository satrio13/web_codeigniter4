<?= $this->extend('admin/layout/default'); ?>
<?= $this->section('content'); ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('backend'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ol>
                </div>
            </div>
            </div>
        </div>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <?php 
                    if(session()->getFlashdata('success'))
                    {
                        echo pesan_sukses(session()->getFlashdata('success'));
                    }elseif(session()->getFlashdata('error'))
                    {
                        echo pesan_gagal(session()->getFlashdata('error'));
                    }
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('backend/tambah-kurikulum'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Kurikulum</a>
                            <a href="" target="_self" class="btn bg-maroon btn-sm"><i class="fas fa-sync-alt"></i> Refresh</a>
                            <br><br>
                            <h3 class="text-center"><?= strtoupper($title); ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered table-striped table-sm" id="datatable">
                                    <thead class="bg-secondary text-center">
                                        <tr>
                                            <th width="5%">NO</th>
                                            <th>MATA PELAJARAN</th>
                                            <th>KELOMPOK</th>
                                            <th>NO URUT</th>
                                            <th>ALOKASI WAKTU</th>
                                            <th>STATUS</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; foreach($data as $r): ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $r->mapel; ?></td>
                                            <td class="text-center"><?= $r->kelompok; ?></td>
                                            <td class="text-center"><?= $r->no_urut; ?></td>
                                            <td class="text-center"><?= $r->alokasi; ?></td>
                                            <td class="text-center">
                                                <?php if($r->is_active=='1'){ ?>
                                                    <label class="badge badge-primary">Aktif</span>
                                                <?php }else{ ?>
                                                    <label class="badge badge-danger">Non Aktif</span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center" nowrap>
                                                <a href="<?= base_url(); ?>backend/edit-kurikulum/<?= $r->id_kurikulum; ?>" class="btn btn-info btn-xs" title="EDIT DATA">EDIT</a>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#konfirmasi_hapus" 
                                                data-href="<?= base_url(); ?>backend/hapus-kurikulum/<?= $r->id_kurikulum; ?>" title="HAPUS DATA">HAPUS</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade mt-5" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                <b>Anda yakin ingin menghapus data ini ?</b><br><br>
                <a class="btn btn-danger btn-ok"> Hapus</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
    <script>
        $(document).ready(function () {
            handle_datatable();
            handle_confirm_delete();
        });

        function handle_datatable()
        {
            $("#datatable").DataTable();
        }

        function handle_confirm_delete()
        {
            $("#konfirmasi_hapus").on("show.bs.modal", function (e) {
                $(this).find(".btn-ok").attr("href", $(e.relatedTarget).data("href"));
            });
        }       
    </script>
<?= $this->endSection(); ?>