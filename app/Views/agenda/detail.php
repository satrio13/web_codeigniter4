<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<section id="isi" class="pt-3 pb-5">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('agenda'); ?>">Agenda</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-9 text-break"><h3><b><?= $title; ?></b></h3><hr></div>
        <div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 text-break">
                <div class="row">
                    <?php if($data->gambar != '' AND file_exists("uploads/img/agenda/$data->gambar")){ ?>
                        <div class="col-md-12">
                            <a href="<?= base_url("uploads/img/agenda/$data->gambar"); ?>" class="image-link">
                                <img src="<?= base_url("uploads/img/agenda/$data->gambar"); ?>" class="img img-fluid"><br>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="col-md-12">
                        <?= htmlspecialchars_decode($data->keterangan); ?>
                        <hr>
                        <table>
                            <tr>
                                <td style="vertical-align: top"><i class="fa fa-calendar"></i></td>
                                <td style="vertical-align: top" width="15%">Tanggal</td>
                                <td style="vertical-align: top">:</td>
                                <td style="vertical-align: top"><?php 
                                    if($data->berapa_hari == 2 AND $data->tgl_mulai != '0000-00-00' AND $data->tgl_selesai != '0000-00-00')
                                    {
                                        echo date('d-m-Y', strtotime($data->tgl_mulai)).' s.d. '.date('d-m-Y', strtotime($data->tgl_selesai));
                                    }elseif($data->berapa_hari == 1 AND $data->tgl != '0000-00-00')
                                    {
                                        echo date('d-m-Y', strtotime($data->tgl));
                                    }else
                                    {
                                        
                                    } 
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top"><i class="fa fa-map-marker"></i></td>
                                <td style="vertical-align: top" width="15%">Jam</td>
                                <td style="vertical-align: top">:</td>
                                <td style="vertical-align: top"><?php
                                    if($data->jam_mulai != '' AND $data->jam_selesai != '')
                                    {
                                        echo date('H:i', strtotime($data->jam_mulai)).' s.d. '.date('H:i', strtotime($data->jam_selesai));
                                    }else
                                    {
                                    
                                    }
                                    ?> 
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top"><i class="fa fa-clock-o"></i></td>
                                <td style="vertical-align: top" width="15%">Tempat</td>
                                <td style="vertical-align: top">:</td>
                                <td style="vertical-align: top"><?= $data->tempat; ?></td>
                            </tr>
                        </table>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-none d-sm-none d-md-block">
                <ol class="breadcrumb-homepage breadcrumb bg-theme" style="margin-bottom: 5px">
                    <li class="text-white"><i class="fa fa-newspaper-o"></i> <b>BERITA POPULER</b></li>
                </ol>
                <ul class="list-group">
                    <?php
                    if($berita_populer)
                    {
                        foreach($berita_populer as $r):
                            if($r->gambar != '' AND file_exists("uploads/img/berita/$r->gambar"))
                            {
                                $img = $r->gambar;
                            }else
                            {
                                $img = 'no-image.png';
                            }
                            echo'<li class="list-group-item d-flex justify-content-start align-items-start text-break">
                                    <a href="'.base_url("berita/detail/$r->slug").'">
                                        <img src="'.base_url("uploads/img/berita/$img").'" class="img img-fluid mr-2" style="max-width: 80px">
                                    </a>
                                    <small>
                                        <a href="'.base_url("berita/detail/$r->slug").'" class="text-dark">'.$r->nama.'</a>
                                        <br><i class="fa fa-calendar"></i> <b>'.date('d M Y', strtotime($r->created_at)).'</b>
                                    </small>
                                </li>';
                        endforeach;
                    }else
                    {
                        echo'<li class="list-group-item d-flex justify-content-center text-danger text-break">
                                <b>BELUM ADA BERITA</b>
                            </li>';
                    }
                    ?>
                </ul>
                <br>
                <ol class="breadcrumb-homepage breadcrumb bg-theme" style="margin-bottom: 5px">
                    <li class="text-white"><i class="fa fa-link"></i> <b>LINK TERKAIT</b></li>
                </ol>
                <ul class="list-group">
                <?php
                    if($link_terkait)
                    {
                        foreach($link_terkait as $r):
                            if(is_url($r->link))
                            {
                                echo'<li class="list-group-item d-flex justify-content-start text-break">
                                        <i class="fa fa-check-circle mr-2 mt-2"></i>      
                                        <a href="'.$r->link.'" class="text-dark">'.$r->nama.'</a>
                                    </li>';           
                            }
                            else
                            {
                                echo'<li class="list-group-item d-flex justify-content-start text-break">
                                        <i class="fa fa-check-circle  mr-2 mt-2"></i>
                                        <a href="javascript:void(0)" class="text-dark" onclick="return alert("LINK OFF")">'.$r->nama.'</a>
                                    </a>';
                            }
                        endforeach;
                    }else
                    {
                        echo'<li class="list-group-item d-flex justify-content-center text-danger text-break">
                                <b>BELUM ADA LINK</b>
                            </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
    
<?= $this->endSection(); ?>
