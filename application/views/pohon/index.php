<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pohon</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/pohon/index.css'); ?>">
    <style>
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-container {
            position: relative;
            display: flex;
            align-items: center;
            margin-left: 20px;
            width: 300px;
        }

        .search-input {
            padding: 8px;
            box-sizing: border-box;
            width: 100%;
            padding-right: 30px;
            /* Tambahkan ruang untuk tombol "x" */
        }

        .clear-button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #888;
        }

        .clear-button:hover {
            color: #333;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h1>Daftar ALternatif</h1>
        </div>
        <div class="card-body">
            <!-- Baris atas untuk tombol dan pencarian -->
            <div class="top-bar">
                <a class="btn" href="<?php echo site_url('pohon/create'); ?>">Tambah Alternatif dan Data Lainnya!!</a>
                <!-- Pindahkan input pencarian di sini -->
                <div class="search-container">
                    <input type="text" id="searchInput" class="search-input" placeholder="Cari pohon atau kode alternatif...">
                    <button id="clearButton" class="clear-button" title="Hapus pencarian">&times;</button>
                </div>
            </div>

            <table id="pohonTable">
                <thead>
                    <tr>
                        <th>Kode Alternatif</th>
                        <th>Nama Pohon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = 1;
                    foreach ($pohon as $p) : ?>
                        <tr>
                            <td><?php echo 'A' . $counter++; ?></td>
                            <td><?php echo $p->nama_pohon; ?></td>
                            <td class="action-links">
                                <a href="<?php echo site_url('pohon/edit/' . $p->id); ?>">Edit</a>
                                <a href="#" onclick="confirmDelete(<?php echo $p->id; ?>)">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // JavaScript untuk menangani pencarian
        document.getElementById('searchInput').addEventListener('keyup', function() {
            filterTable();
        });

        document.getElementById('clearButton').addEventListener('click', function() {
            document.getElementById('searchInput').value = '';
            filterTable();
        });

        function filterTable() {
            var input = document.getElementById('searchInput').value.toLowerCase();
            var rows = document.querySelectorAll('#pohonTable tbody tr');

            rows.forEach(function(row) {
                var kodeAlternatif = row.cells[0].textContent.toLowerCase();
                var namaPohon = row.cells[1].textContent.toLowerCase();
                if (kodeAlternatif.indexOf(input) > -1 || namaPohon.indexOf(input) > -1) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // JavaScript untuk konfirmasi penghapusan
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                window.location.href = '<?php echo site_url('pohon/destroy/'); ?>' + id;
            }
        }
    </script>
</body>

</html>