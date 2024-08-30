<!DOCTYPE html>
<!-- YouTube or Website - CodingLab -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/header.css'); ?>">
    <style>

    </style>
</head>

<body>
    <nav class="sidebar">
        <a href="<?php echo base_url('pohon'); ?>" class="logo">SPK ABROR</a>

        <div class="menu-content">
            <ul class="menu-items">
                <li class="item">
                    <a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
                </li>
                <li class="item">
                    <a href="<?php echo site_url('kriteria'); ?>">Kriteria</a>
                </li>
                <li class="item">
                    <a href="<?php echo base_url('pohon'); ?>">Alternatif</a>
                </li>
                <li class="item">
                    <a href="<?php echo site_url('wp'); ?>">Hasil</a>
                </li>

    </nav>

    <nav class="navbar">
        <i class="fa-solid fa-bars" id="sidebar-close"></i>
        <a href="<?php echo site_url('auth/logout'); ?>" class="logout-link">Logout</a>
    </nav>

    <main class="main">
