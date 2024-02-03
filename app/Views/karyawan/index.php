<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12"><h3><b>TENAGA NON EDUKATIF</b></h3><hr></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table table-responsive">
                <table class="table table-bordered table-striped table-sm" id="datatable">
                    <thead class="bg-theme text-white text-center">
                        <tr>
                            <th width="5%">NO</th>
                            <th>NAMA</th>
                            <th>NIP</th>
                            <th>NUPTK</th>
                            <th>ALAMAT</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($data)
                    {
                        $no = 1;
                        foreach($data as $r):
                            echo'<tr>
                                    <td class="text-center">'.$no++.'</td>
                                    <td><a href="'.base_url("karyawan/detail/$r->id").'" target="_blank">'.$r->nama.'</a></td>
                                    <td>'.$r->nip.'</td>
                                    <td>'.$r->nuptk.'</td>
                                    <td>'.$r->alamat.'</td>
                                </tr>';
                        endforeach;
                    }else
                    {
                        echo'<tr>
                                <td class="text-center text-danger" colspan="5">DATA KOSONG</td>
                            </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
    
<?= $this->endSection(); ?>