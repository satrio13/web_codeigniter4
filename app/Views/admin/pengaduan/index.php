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
                                        <th>NAMA</th>
                                        <th>STATUS</th>
                                        <th>URAIAN PENGADUAN</th>
                                        <th width="15%">AKSI</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $no = 1; 
                                    foreach($data as $r): 
                                        if(strlen($r->isi) > 200)
                                        {
                                            $isi = substr($r->isi,0,200); 
                                            $pengaduan = substr($r->isi,0,strrpos($isi," ")). '...';
                                        }else
                                        {
                                            $pengaduan = $r->isi;
                                        }
                            
                                        if($r->status == 1)
                                        {
                                            $status = 'Peserta Didik';
                                        }elseif($r->status == 2)
                                        {
                                            $status = 'Wali Murid';
                                        }elseif($r->status == 3)
                                        {
                                            $status = 'Masyarakat';
                                        }else
                                        {
                                            $status = '';
                                        }

                                        echo '<tr>
                                                <td class="text-center">'.$no++.'</td>
                                                <td>'.$r->nama.'</td>
                                                <td>'.$status.'</td>
                                                <td>'.$pengaduan.'</td>
                                                <td class="text-center" nowrap>
                                                    <a href="javascript:void(0)" onclick="detail('.$r->id.')" class="btn btn-primary btn-xs" title="LIHAT DETAIL">DETAIL</a>
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#konfirmasi_hapus" data-href="'.base_url("backend/hapus-pengaduan/$r->id").'" title="HAPUS DATA">HAPUS</a>
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

    <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">Detail Pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="load" class="text-center"></div>
                    <div class="row">
                        <div class="col-md-2 text-bold">Nama</div>
                        <div class="col-md-10" id="nama"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2 text-bold">Status</div>
                        <div class="col-md-10" id="status"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2 text-bold">Uraian Pengaduan</div>
                        <div class="col-md-10" id="pengaduan"></div>
                    </div>
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

        function cek_session(callback)
        {
            $.ajax({
                url: base_url + "auth/cek-session", 
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    if(!data.session_active)
                    {
                        swal({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Sesi anda telah habis, silahkan login kembali',
                            timer: 5000
                        }).then(() => {
                            window.location.reload(); 
                        });
                    }else
                    {
                        callback();
                    }
                },
                error: function()
                {
                   alert_gagal('Error checking session. Please check your internet connection!');
                }
            });
        }

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
        
        function detail(id)
        {
            cek_session(function()
            {    
                $.ajax({
                    url : base_url + "backend/lihat-pengaduan/"+id,
                    type: "GET",
                    dataType: "JSON",
                    beforeSend: function()
                    {
                        $("#load").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>');
                    },
                    success: function(data)
                    {
                        var status;
                        if(data.status == '1')
                        {
                            status = 'Peserta Didik';
                        }else if(data.status == '2')
                        {
                            status = 'Wali Murid';
                        }else if(data.status == '3')
                        {
                            status = 'Masyarakat';
                        }else
                        {
                            status = '';
                        }

                        $("#load").html('');
                        $('#nama').html(': ' + data.nama);               
                        $('#status').html(': ' + status);    
                        $('#pengaduan').html(': ' + data.isi);    
                        $('#modal_form').modal('show'); 
                    },
                    error: function (request)
                    {
                        alert_gagal('An error occurred during your request: '+  request.status + ' ' + request.statusText + 'Please Try Again!!');
                    }
                });
            });
        }
    </script>
<?= $this->endSection(); ?>
