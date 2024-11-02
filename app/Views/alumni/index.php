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
        <div class="col-md-12"><h3><b>DATA ALUMNI</b></h3><hr></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table table-responsive">
                <table class="table table-bordered table-striped table-sm" id="datatable">
                    <thead class="bg-theme text-white text-center">
                        <tr>
                            <th width="5%">NO</th>
                            <th>TAHUN PELAJARAN</th>
                            <th>JUMLAH LAKI-LAKI</th>
                            <th>JUMLAH PEREMPUAN</th>
                            <th>JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if($data)
                    {
                        $no = 1; 
                        foreach($data as $r):
                            $total = $r->jml_l + $r->jml_p;
                            echo'<tr>
                                    <td class="text-center">'.$no++.'</td>
                                    <td>'.$r->tahun.'</td>
                                    <td class="text-right">'.$r->jml_l.'</td>
                                    <td class="text-right">'.$r->jml_p.'</td>
                                    <td class="text-right">'.$total.'</td>
                                </tr>';
                        endforeach;
                    }else
                    {
                        echo'<tr>
                                <td class="text-center" colspan="5">Data Kosong</td>
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
