<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pendidikan</li>
                <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12"><h3><b>KURIKULUM</b></h3><hr></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped table-sm">
                <thead class="bg-theme text-white">
                    <tr>
                        <th colspan="2">MATA PELAJARAN</th>
                        <th class="text-center">ALOKASI WAKTU</th>
                    </tr>
                    <tr>
                        <th width="5%" class="text-center">NO</th>
                        <th>KELOMPOK A</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if($kelompok_a)
                    {
                        $jml_alokasi_a = 0;
                        $no = 1; 
                        foreach($kelompok_a as $a):
                            $jml_alokasi_a = $jml_alokasi_a + $a->alokasi;
                            echo'<tr>
                                    <td class="text-center">'.$no++.'.</td>
                                    <td>'.$a->mapel.'</td>
                                    <td class="text-right">'.$a->alokasi.'</td>
                                </tr>';
                        endforeach;
                            echo'<tr>
                                    <td colspan="2"><b>JUMLAH</b></td>
                                    <td class="text-right">'.$jml_alokasi_a.'</td>
                                </tr>';
                    }else
                    {
                        echo'<tr>
                                <td colspan="3" class="text-center">data masih kosong</td>
                            </tr>';
                    }  

                    echo'<tr>
                            <th width="5%" class="bg-theme text-white text-center">NO</th>
                            <th class="bg-theme text-white">KELOMPOK B</th>
                            <th class="bg-theme text-white"></th>
                        </tr>';

                    if($kelompok_b)
                    {
                        $jml_alokasi_b = 0;
                        $no = 1; 
                        foreach($kelompok_b as $b):
                            $jml_alokasi_b = $jml_alokasi_b + $b->alokasi;
                            echo'<tr>
                                    <td class="text-center">'.$no++.'.</td>
                                    <td>'.$b->mapel.'</td>
                                    <td class="text-right">'.$b->alokasi.'</td>
                                </tr>';
                        endforeach;
                            echo'<tr>
                                    <td colspan="2"><b>JUMLAH</b></td>
                                    <td class="text-right">'.$jml_alokasi_b.'</td>
                                </tr>';
                    }else
                    {
                        echo'<tr>
                                <td colspan="3" class="text-center">data masih kosong</td>
                            </tr>';
                    }

                    echo'<tr>
                            <th width="5%" class="bg-theme text-white text-center">NO</th>
                            <th class="bg-theme text-white">KELOMPOK C</th>
                            <th class="bg-theme text-white"></th>
                        </tr>';
                        
                    if($kelompok_c)
                    {
                        $jml_alokasi_c = 0;
                        $no = 1; 
                        foreach($kelompok_c as $c):
                            $jml_alokasi_c = $jml_alokasi_c + $c->alokasi;
                            echo'<tr>
                                    <td class="text-center">'.$no++.'.</td>
                                    <td>'.$c->mapel.'</td>
                                    <td class="text-right">'.$c->alokasi.'</td>
                                </tr>';
                        endforeach;
                            echo'<tr>
                                    <td colspan="2"><b>JUMLAH</b></td>
                                    <td class="text-right">'.$jml_alokasi_c.'</td>
                                </tr>';
                    }else
                    {
                        echo'<tr>
                                <td colspan="3" class="text-center">data masih kosong</td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<?= $this->endSection(); ?>