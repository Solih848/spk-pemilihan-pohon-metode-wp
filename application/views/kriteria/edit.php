<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kriteria</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/kriteria/create.css'); ?>">
</head>

<body>
    <div class="card">
        <h1>Edit Kriteria</h1>
        <form action="<?php echo site_url('kriteria/update/' . $kriteria->id); ?>" method="post">
            <label>Nama Kriteria</label>
            <input type="text" name="nama_kriteria" value="<?php echo $kriteria->nama_kriteria; ?>" required><br>
            <label>Bobot</label>
            <input type="text" name="bobot" value="<?php echo $kriteria->bobot; ?>" required><br>
            <label>Kategori</label>
            <select name="kategori" required>
                <option value="benefit" <?php echo ($kriteria->kategori == 'benefit') ? 'selected' : ''; ?>>Benefit</option>
                <option value="cost" <?php echo ($kriteria->kategori == 'cost') ? 'selected' : ''; ?>>Cost</option>
            </select><br>
            <button type="submit" class="submit-button" ;>Update</button>
        </form>
    </div>
</body>

</html>