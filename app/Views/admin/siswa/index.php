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
                            <a href="<?= base_url('backend/tambah-siswa'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Peserta Didik</a>
                            <a href="" target="_self" class="btn bg-maroon btn-sm"><i class="fas fa-sync-alt"></i> Refresh</a>
                            <br><br>
                            <h3 class="text-center"><?= strtoupper($title); ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered table-striped table-sm" id="datatable">
                                    <thead class="bg-secondary text-center">
                                        <tr>
                                            <th colspan="2">JUMLAH PESERTA DIDIK</th>
                                            <th colspan="3">Kelas <?php 
                                                                if(jenjang() == 1 OR jenjang() == 3)
                                                                {
                                                                    echo'VII';
                                                                }elseif(jenjang() == 2 OR jenjang() == 4)
                                                                {
                                                                    echo'X';
                                                                } 
                                                                ?>
                                            </th>
                                            <th colspan="3">Kelas <?php 
                                                                if(jenjang() == 1 OR jenjang() == 3)
                                                                {
                                                                    echo'VIII';
                                                                }elseif(jenjang() == 2 OR jenjang() == 4)
                                                                {
                                                                    echo'XI';
                                                                } 
                                                                ?>
                                            </th>
                                            <th colspan="3">Kelas <?php 
                                                                if(jenjang() == 1 OR jenjang() == 3)
                                                                {
                                                                    echo'IX';
                                                                }elseif(jenjang() == 2 OR jenjang() == 4)
                                                                {
                                                                    echo'XII';
                                                                } 
                                                                ?>
                                            </th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th width="5%">NO</th>
                                            <th>TAHUN PELAJARAN</th>
                                            <th>L</th>
                                            <th>P</th>
                                            <th>TOTAL</th>
                                            <th>L</th>
                                            <th>P</th>
                                            <th>TOTAL</th>
                                            <th>L</th>
                                            <th>P</th>
                                            <th>TOTAL</th>
                                            <th>JUMLAH</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; foreach($data as $r): ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $r->tahun; ?></td>
                                            <td class="text-center"><?= $r->jml1pa; ?></td>
                                            <td class="text-center"><?= $r->jml1pi; ?></td>
                                            <td class="text-center"><?= $r->jml1pa+$r->jml1pi; ?></td>
                                            <td class="text-center"><?= $r->jml2pa; ?></td>
                                            <td class="text-center"><?= $r->jml2pi; ?></td>
                                            <td class="text-center"><?= $r->jml2pa+$r->jml2pi; ?></td>
                                            <td class="text-center"><?= $r->jml3pa; ?></td>
                                            <td class="text-center"><?= $r->jml3pi; ?></td>
                                            <td class="text-center"><?= $r->jml3pa+$r->jml3pi; ?></td>
                                            <td class="text-center"><?= $r->jml1pa+$r->jml1pi+$r->jml2pa+$r->jml2pi+$r->jml3pa+$r->jml3pi; ?></td>
                                            <td class="text-center" nowrap>
                                                <a href="<?= base_url("backend/edit-siswa/$r->id"); ?>" class="btn btn-info btn-xs" title="EDIT DATA">EDIT</a>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#konfirmasi_hapus" 
                                                data-href="<?= base_url("backend/hapus-siswa/$r->id"); ?>" title="HAPUS DATA">HAPUS</a>
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