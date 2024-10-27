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
                                            <th>STATUS</th>
                                            <th>NAMA</th>
                                            <th>TH LULUS</th>
                                            <th>ALAMAT</th>
                                            <th>KESAN</th>
                                            <th>GAMBAR</th>
                                            <th>TGL POSTING</th>
                                            <th width="10%">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $no = 1; 
                                    foreach($data as $r):
                                        if($r->status == 0)
                                        {
                                            $status = '<a href="javascript:void(0)" onclick="status('.$r->id.')" class="badge badge-warning text-white" title="EDIT STATUS">Menunggu</a>';
                                        }elseif($r->status == 1)
                                        {
                                            $status = '<a href="javascript:void(0)" onclick="status('.$r->id.')" class="badge badge-primary" title="EDIT STATUS">Terpublish</a>';
                                        }elseif($r->status == 2)
                                        {
                                            $status = '<a href="javascript:void(0)" onclick="status('.$r->id.')" class="badge badge-danger" title="EDIT STATUS">Ditolak</a>';
                                        }
                                        
                                        if($r->gambar != '' AND file_exists("uploads/img/alumni/$r->gambar"))
                                        {
                                            $img = '<a href="'.base_url("uploads/img/alumni/$r->gambar").'" target="_blank">
                                                        <img src="'.base_url("uploads/img/alumni/$r->gambar").'" class="img img-fluid" width="100px">
                                                    </a>'; 
                                        }else
                                        {
                                            $img = '';
                                        }
                                        
                                        if(strlen($r->kesan) > 200)
                                        {
                                            $isi = substr($r->kesan,0,200); 
                                            $kesan = substr($r->kesan,0,strrpos($isi," ")). '...';
                                        }else
                                        {
                                            $kesan = $r->kesan;
                                        }

                                        echo'<tr>
                                                <td class="text-center">'.$no++.'</td>
                                                <td class="text-center">'.$status.'</td>
                                                <td>'.$r->nama.'</td>
                                                <td>'.$r->th_lulus.'</td>
                                                <td>'.$r->alamat.'</td>
                                                <td>'.$kesan.'</td>
                                                <td class="text-center">'.$img.'</td>
                                                <td>'.date('d-m-Y H:i:s', strtotime($r->created_at)).'</td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" onclick="detail('.$r->id.')" class="btn btn-primary btn-xs" title="LIHAT DETAIL">DETAIL</a>
                                                    <a href="javascript:void(0)" onclick="status('.$r->id.')" class="btn btn-info btn-xs">EDIT STATUS</a>
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#konfirmasi_hapus" 
                                                    data-href="'.base_url("backend/hapus-penelusuran-alumni/$r->id").'" title="HAPUS DATA">HAPUS</a>
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
                    <h5 class="modal-title">Detail Isi Alumni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="load" class="text-center"></div>
                    <div class="row">
                        <div class="col-md-12 text-center" id="img">
                            
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2 text-bold">NAMA LENGKAP</div>
                        <div class="col-md-10" id="nama"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2 text-bold">TAHUN LULUS</div>
                        <div class="col-md-10" id="th_lulus"></div>
                    </div>
                    <?php 
                    if(jenjang() == 1 OR jenjang() == 3)
                    { 
                        echo'<div class="row mt-2">
                                <div class="col-md-2 text-bold">SMA / SMK / MA</div>
                                <div class="col-md-10" id="sma"></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-2 text-bold">PERGURUAN TINGGI</div>
                                <div class="col-md-10" id="pt"></div>
                            </div>';
                    }

                    if(jenjang() == 2 OR jenjang() == 4)
                    {
                        echo'<div class="row mt-2">
                                <div class="col-md-2 text-bold">PERGURUAN TINGGI</div>
                                <div class="col-md-10" id="pt"></div>
                            </div>';
                    } 
                    ?>
                    <div class="row mt-2">
                        <div class="col-md-2 text-bold">INSTANSI</div>
                        <div class="col-md-10" id="instansi"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2 text-bold">ALAMAT INSTANSI</div>
                        <div class="col-md-10" id="alamatins"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2 text-bold">HP</div>
                        <div class="col-md-10" id="hp"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2 text-bold">EMAIL</div>
                        <div class="col-md-10" id="email"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2 text-bold">ALAMAT</div>
                        <div class="col-md-10" id="alamat"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2 text-bold">KESAN</div>
                        <div class="col-md-10" id="kesan"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2 text-bold">TGL POSTING</div>
                        <div class="col-md-10" id="tgl"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_status" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">Form Edit Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="load_status" class="text-center"></div>
                    <form action="#" id="form" class="form-horizontal">
                        <?= csrf_field() ?>
                        <input type="hidden" value="" name="id" id="id"> 
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">STATUS <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <select name="status" class="form-control" id="status">
                                    <option value="0">Menunggu</option>
                                    <option value="1">Publish</option>
                                    <option value="2">Tolak</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save_status()" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> SIMPAN</button>
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
                    url : base_url + "backend/lihat-alumni/"+id,
                    type: "GET",
                    dataType: "JSON",
                    beforeSend: function()
                    {
                        $("#load").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>');
                    },
                    success: function(data)
                    {
                        var date = new Date(data.created_at); // Membuat objek Date
                        var created_at = format_date(date); 
                        var fileUrl = base_url +'uploads/img/alumni/'+ data.gambar;
                        check_file_exists(fileUrl, function(exists)
                        {
                            if(data.gambar != '')
                            {
                                $("#img").html('<img src="'+ base_url +'uploads/img/alumni/'+ data.gambar +'" class="img img-fluid img-thumbnail" width="120px">');
                            }else
                            {
                                $("#img").html('');
                            }
                        });

                        $("#load").html('');
                        $("#nama").html(': ' + data.nama);
                        $("#th_lulus").html(': ' + data.th_lulus);
                        $("#sma").html(': ' + data.sma);
                        $("#pt").html(': ' + data.pt);
                        $("#instansi").html(': ' + data.instansi);
                        $("#alamatins").html(': ' + data.alamatins);
                        $("#hp").html(': ' + data.hp);
                        $("#email").html(': ' + data.email);
                        $("#alamat").html(': ' + data.alamat);
                        $("#kesan").html(': ' + data.kesan);
                        $("#tgl").html(': ' + created_at);
                        $('#modal_form').modal('show'); 
                    },
                    error: function (request)
                    {
                        alert('An error occurred during your request: '+  request.status + ' ' + request.statusText + 'Please Try Again!!');
                    }
                });
            });
        }

        function status(id)
        {
            cek_session(function()
            { 
                $.ajax({
                    url : base_url + "backend/status/"+id,
                    type: "GET",
                    dataType: "JSON",
                    beforeSend: function()
                    {
                        $("#load_status").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>');
                    },
                    success: function(data)
                    {
                        $("#load_status").html('');
                        $('#id').val(data.id);
                        $('#status').val(data.status);
                        $('#modal_status').modal('show'); 
                    },
                    error: function (request)
                    {
                        alert('An error occurred during your request: '+  request.status + ' ' + request.statusText + 'Please Try Again!!');
                    }
                });
            });
        }

        function save_status()
        {
            cek_session(function()
            {
                $('#btnSave').text('saving...'); //change button text
                $('#btnSave').attr('disabled',true); //set button disable 

                $.ajax({
                    url : base_url + "backend/save-status",
                    type: "POST",
                    data: $('#form').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {   
                        $('#modal_status').modal('hide');
                        window.location.replace("<?= base_url('backend/penelusuran-alumni'); ?>");
                        $('#btnSave').html('<i class="fa fa-check"></i> SIMPAN'); //change button text
                        $('#btnSave').attr('disabled',false); //set button enable 
                    },
                    error: function (request)
                    {
                        alert('An error occurred during your request: '+  request.status + ' ' + request.statusText + 'Please Try Again!!');
                        $('#btnSave').html('<i class="fa fa-check"></i> SIMPAN'); //change button text
                        $('#btnSave').attr('disabled',false); //set button enable 
                    }
                });
            });
        }

        function check_file_exists(url, callback)
        {
            var xhr = new XMLHttpRequest();
            xhr.open('HEAD', url, true);
            xhr.onreadystatechange = function()
            {
                if(xhr.readyState === 4)
                {
                    if(xhr.status === 200)
                    {
                        callback(true);
                    }else
                    {
                        callback(false);
                    }
                }
            };
            xhr.send();
        }

        function format_date(date)
        {
            var day = date.getDate().toString().padStart(2, '0'); 
            var month = (date.getMonth() + 1).toString().padStart(2, '0'); 
            var year = date.getFullYear();
            var hours = date.getHours().toString().padStart(2, '0'); 
            var minutes = date.getMinutes().toString().padStart(2, '0'); 
            var seconds = date.getSeconds().toString().padStart(2, '0'); 

            return `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;
        }

        function alert_gagal(str)
        {
            setTimeout(function () { 
                swal({
                    position: 'top-end',
                    icon: 'error',
                    title: str,
                    timer: 8000
                });
            },2000); 
        }
    </script>
<?= $this->endSection(); ?>
