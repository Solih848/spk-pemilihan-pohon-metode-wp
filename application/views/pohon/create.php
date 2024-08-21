<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pohon</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/pohon/create.css'); ?>">
</head>

<body>
    <div class="card">
        <h1>Tambah Alternatif</h1>
        <form action="<?php echo site_url('pohon/store'); ?>" method="post">
            <label>Nama Pohon</label>
            <input type="text" name="nama_pohon"><br>
            <?php foreach ($kriteria as $k) : ?>
                <label><?php echo $k->nama_kriteria; ?></label>
                <input type="text" name="kriteria[<?php echo $k->id; ?>]"><br>
            <?php endforeach; ?>
            <button type="submit" class="submit-button">Simpan</button>
        </form>
    </div>
</body>

</html>