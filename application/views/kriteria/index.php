<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kriteria</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/kriteria/index.css'); ?>">
    <style>
        /* Tambahan gaya untuk input pencarian dan tombol "x" */
        .card-body {
            display: flex;
            flex-direction: column;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-container {
            position: relative;
            display: flex;
            align-items: center;
            width: 300px;
        }

        .search-input {
            padding: 8px;
            box-sizing: border-box;
            width: 100%;
            padding-right: 30px;
            /* Ruang untuk tombol "x" */
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
            <h1>Daftar Kriteria</h1>
        </div>
        <div class="card-body">
            <div class="top-bar">
                <a class="btn" href="<?php echo site_url('kriteria/create'); ?>">Tambah Kriteria</a>
                <div class="search-container">
                    <input type="text" id="searchInput" class="search-input" placeholder="Cari kriteria...">
                    <button id="clearButton" class="clear-button" title="Hapus pencarian">&times;</button>
                </div>
            </div>
            <table id="kriteriaTable">
                <thead>
                    <tr>
                        <th>Kode Kriteria</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1; // Inisialisasi counter untuk kode kriteria
                    foreach ($kriteria as $k) : ?>
                        <tr>
                            <td><?php echo 'C' . $i++; ?></td> <!-- Menampilkan kode kriteria -->
                            <td><?php echo $k->nama_kriteria; ?></td>
                            <td><?php echo $k->bobot; ?></td>
                            <td><?php echo ucfirst($k->kategori); ?></td> <!-- Menampilkan kategori -->
                            <td class="action-links">
                                <a href="<?php echo site_url('kriteria/edit/' . $k->id); ?>">Edit</a>
                                <a href="#" class="delete-link" data-url="<?php echo site_url('kriteria/destroy/' . $k->id); ?>">Hapus</a>
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
            var rows = document.querySelectorAll('#kriteriaTable tbody tr');

            rows.forEach(function(row) {
                var kodeKriteria = row.cells[0].textContent.toLowerCase();
                var namaKriteria = row.cells[1].textContent.toLowerCase();
                if (kodeKriteria.indexOf(input) > -1 || namaKriteria.indexOf(input) > -1) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // JavaScript untuk konfirmasi sebelum menghapus data
        document.querySelectorAll('.delete-link').forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                var url = this.getAttribute('data-url');
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    window.location.href = url;
                }
            });
        });
    </script>
</body>

</html>