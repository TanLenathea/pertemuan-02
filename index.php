<?php

declare(strict_types=1);

use Praktikum\Mahasiswa;
use Praktikum\Produk;

require_once __DIR__ . '/Mahasiswa.php';
require_once __DIR__ . '/Produk.php';

$daftarMahasiswa = [
    new Mahasiswa('20260001', 'Andi Pratama', 'Informatika', 3.85),
    new Mahasiswa('20260002', 'Bunga Lestari', 'Sistem Informasi', 3.35),
    new Mahasiswa('20260003', 'Citra Maharani', 'Manajemen', 2.90),
];

$daftarProduk = [
    new Produk('Buku tulis', 5000, 20),
    new Produk('Pulpen', 3000, 30),
    new Produk('Penghapus', 2000, 15),
];

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum PBO — Pertemuan 02</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px auto; max-width: 1000px; padding: 0 20px; }
        h1, h2 { color: #203957; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 28px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #dbe2eb; }
        th { background: #203957; color: white; }
        .angka { text-align: right; }
        .catatan { color: #526174; line-height: 1.6; }
    </style>
</head>
<body>
    <h1>Praktikum PBO — Pertemuan 02</h1>
    <p class="catatan">Data fiktif untuk latihan class, constructor, object, dan method.</p>
    <h2>Data Mahasiswa</h2>
    <table>
        <thead><tr><th>Informasi mahasiswa</th><th>Predikat</th></tr></thead>
        <tbody>
            <?php foreach ($daftarMahasiswa as $mahasiswa) : ?>
                <tr>
                    <td><?= htmlspecialchars(
                        $mahasiswa->info(),
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    ) ?></td>
                    <td><?= htmlspecialchars(
                        $mahasiswa->predikat(),
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    ) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p class="catatan">
        Asumsi latihan: Cumlaude ≥ 3,51; Sangat Memuaskan ≥ 3,01 dan &lt; 3,51;
        Memuaskan ≥ 2,76 dan &lt; 3,01. IPK lebih rendah belum memenuhi batas predikat.
        Ketentuan ini hanya menggunakan IPK dan dapat disesuaikan dengan instruksi dosen.
    </p>
    <h2>Data Produk</h2>
    <table>
        <thead>
            <tr><th>Nama</th><th>Harga satuan</th><th>Stok</th><th>Total nilai</th></tr>
        </thead>
        <tbody>
            <?php foreach ($daftarProduk as $produk) : ?>
                <tr>
                    <td><?= htmlspecialchars(
                        $produk->getNama(),
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    ) ?></td>
                    <td class="angka">Rp<?= number_format($produk->getHarga(), 0, ',', '.') ?></td>
                    <td class="angka"><?= $produk->getStok() ?></td>
                    <td class="angka">Rp<?= number_format($produk->totalNilai(), 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
