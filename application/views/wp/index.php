<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan SPK</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/wp/index.css'); ?>">
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h1>Hasil Perhitungan SPK Metode Weighted Product</h1>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <th>Kode</th>
                    <th>Nama Pohon</th>
                    <th>Nilai</th>
                </tr>
                <?php
                $counter = 1;
                $kodeAlternatif = []; // Array untuk menyimpan kode alternatif
                foreach ($wp as $pohon_id => $nilai) :
                    $kode = 'A' . $counter++;
                    $kodeAlternatif[$pohon_id] = $kode; // Simpan kode alternatif
                ?>
                    <tr>
                        <td><?php echo $kode; ?></td>
                        <td>
                            <?php
                            foreach ($pohon as $p) {
                                if ($p->id == $pohon_id) {
                                    echo $p->nama_pohon;
                                    break;
                                }
                            }
                            ?>
                        </td>
                        <td><?php echo number_format($nilai, 4); ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php if (isset($highest_pohon)) : ?>
                    <tr>
                        <th colspan="3" id="tertinggi">Pohon dengan Nilai Tertinggi</th>
                    </tr>
                    <tr>
                        <td><?php echo $kodeAlternatif[$highest_pohon]; // Tampilkan kode untuk pohon dengan nilai tertinggi 
                            ?></td>
                        <td>
                            <?php
                            foreach ($pohon as $p) {
                                if ($p->id == $highest_pohon) {
                                    echo $p->nama_pohon;
                                    break;
                                }
                            }
                            ?>
                        </td>
                        <td><?php echo number_format($wp[$highest_pohon], 4); ?></td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td colspan="3">Tidak ada pohon yang dihitung.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</body>

</html>