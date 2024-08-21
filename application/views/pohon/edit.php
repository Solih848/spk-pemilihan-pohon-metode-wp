<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pohon</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/pohon/create.css'); ?>">

</head>

<body>
    <div class="card">
        <h1>Edit Pohon</h1>
        <form action="<?php echo site_url('pohon/update/' . $pohon->id); ?>" method="post">
            <label>Nama Pohon</label>
            <input type="text" name="nama_pohon" value="<?php echo $pohon->nama_pohon; ?>" required><br>
            <?php foreach ($kriteria as $k) : ?>
                <label><?php echo $k->nama_kriteria; ?></label>
                <?php
                $nilai = 0;
                foreach ($nilai_kriteria as $nk) {
                    if ($nk->kriteria_id == $k->id) {
                        $nilai = $nk->nilai;
                        break;
                    }
                }
                ?>
                <input type="text" name="kriteria[<?php echo $k->id; ?>]" value="<?php echo $nilai; ?>"><br>
            <?php endforeach; ?>
            <button type="submit" class="submit-button" ;>Update</button>
        </form>
    </div>
</body>

</html>