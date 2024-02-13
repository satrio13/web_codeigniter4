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
                            <a href="<?= base_url('backend/tambah-agenda'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Agenda</a>
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
                                            <th>NAMA AGENDA</th>
                                            <th>KETERANGAN</th>
                                            <th>TANGGAL</th>
                                            <th>JAM</th>
                                            <th>TEMPAT</th>
                                            <th>GAMBAR</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $no = 1; 
                                    foreach($data as $r): 
                                        if(strlen($r->keterangan) > 200)
                                        {
                                            $isi = substr($r->keterangan,0,200); 
                                            $keterangan = substr($r->keterangan,0,strrpos($isi," ")). '... <a href="'.base_url("agenda/detail/$r->slug").'" target="_blank"><b>Lihat Detail</b></a>';
                                        }else
                                        {
                                            $keterangan = $r->keterangan;
                                        }

                                        if($r->berapa_hari == 2 AND $r->tgl_mulai != '0000-00-00' AND $r->tgl_selesai != '0000-00-00')
                                        {
                                            $tgl = date('d-m-Y', strtotime($r->tgl_mulai)).' s.d. '.date('d-m-Y', strtotime($r->tgl_selesai));
                                        }elseif($r->berapa_hari == 1 AND $r->tgl != '0000-00-00')
                                        {
                                            $tgl = date('d-m-Y', strtotime($r->tgl));
                                        }else
                                        {
                                            $tgl = "";
                                        }

                                        if($r->jam_mulai != '' AND $r->jam_selesai != '')
                                        {
                                            $jam = date('H:i', strtotime($r->jam_mulai)).' s.d. '.date('H:i', strtotime($r->jam_selesai));
                                        }else
                                        {
                                            $jam = "";
                                        }

                                        if($r->gambar != '' AND file_exists("uploads/img/agenda/$r->gambar"))
                                        {
                                            $img = '<a href="'.base_url("uploads/img/agenda/$r->gambar").'" target="_blank">
                                                        <img src="'.base_url("uploads/img/agenda/$r->gambar").'" class="img img-fluid" width="100px">
                                                    </a>'; 
                                        }else
                                        {
                                            $img = '';
                                        }

                                        echo '<tr>
                                                <td class="text-center">'.$no++.'</td>
                                                <td>'.$r->nama_agenda.'</td>
                                                <td>'.htmlspecialchars_decode($keterangan).'</td>
                                                <td>'.$tgl.'</td>
                                                <td>'.$jam.'</td>
                                                <td>'.$r->tempat.'</td>
                                                <td class="text-center">'.$img.'</td>
                                                <td class="text-center" nowrap>
                                                    <a href="'.base_url("backend/edit-agenda/$r->id").'" class="btn btn-info btn-xs" title="EDIT DATA">EDIT</a>
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#konfirmasi_hapus" data-href="'.base_url("backend/hapus-agenda/$r->id").'" title="HAPUS DATA">HAPUS</a>
                                                </td>
                                            </tr>';
                                    endforeach; 
                                    ?>
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
