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
        <div class="col-md-12"><h3><b>PESERTA DIDIK</b></h3><hr></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead class="bg-theme text-white text-center">
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
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if($data)
                    {
                        $no = 1; 
                        foreach($data as $r): ?>
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
                        </tr>
                        <?php endforeach;
                    }else
                    {
                        echo'<tr>
                                <td class="text-center" colspan="12">DATA KOSONG</td>
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