<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kriteria</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/kriteria/create.css'); ?>">

</head>

<body>
    <div class="card">
        <h1>Tambah Kriteria</h1>
        <form action="<?php echo site_url('kriteria/store'); ?>" method="post">
            <label>Nama Kriteria</label>
            <input type="text" name="nama_kriteria" required><br>
            <label>Bobot</label>
            <input type="text" name="bobot" inputmode="numeric" required><br>
            <label>Kategori</label>
            <select name="kategori" required>
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
            </select><br>
            <button type="submit" class="submit-button" ;>Simpan</button>
        </form>
    </div>
</body>

</html>