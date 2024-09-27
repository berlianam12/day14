<?php
$daftarBuku = [
    "Belajar PHP",
    "Belajar JavaScript",
    "Pemrograman Python",
    "Desain Grafis",
    "Sejarah Dunia"
];

$bukuDipinjam = [];

function tampilkanDaftarBuku($buku) {
    if (count($buku) > 0) {
        echo "\nDaftar Buku:\n";
        foreach ($buku as $index => $judul) {
            echo ($index + 1) . ". " . $judul . "\n";
        }
    } else {
        echo "\nTidak ada buku yang tersedia saat ini.\n";
    }
}

function pinjamBuku(&$daftarBuku, &$bukuDipinjam) {
    echo "\nMasukkan nomor buku yang ingin Anda pinjam:\n";
    tampilkanDaftarBuku($daftarBuku);

    $nomor = (int) trim(fgets(STDIN)) - 1; 
    if (isset($daftarBuku[$nomor])) {
        $bukuDipinjam[] = $daftarBuku[$nomor]; 
        echo "\nAnda meminjam buku: " . $daftarBuku[$nomor] . "\n";
        unset($daftarBuku[$nomor]); 
        $daftarBuku = array_values($daftarBuku);
    } else {
        echo "\nBuku yang Anda pilih tidak tersedia.\n";
    }
}
function kembalikanBuku(&$daftarBuku, &$bukuDipinjam) {
    if (count($bukuDipinjam) > 0) {
        echo "\nMasukkan nomor buku yang ingin Anda kembalikan:\n";
        foreach ($bukuDipinjam as $index => $judul) {
            echo ($index + 1) . ". " . $judul . "\n";
        }

        $nomor = (int) trim(fgets(STDIN)) - 1;

        if (isset($bukuDipinjam[$nomor])) {
            $daftarBuku[] = $bukuDipinjam[$nomor]; 
            echo "\nAnda mengembalikan buku: " . $bukuDipinjam[$nomor] . "\n";
            unset($bukuDipinjam[$nomor]); 
            $bukuDipinjam = array_values($bukuDipinjam); 
        } else {
            echo "\nBuku yang Anda pilih tidak valid.\n";
        }
    } else {
        echo "\nTidak ada buku yang sedang Anda pinjam.\n";
    }
}
function menu() {
    echo "\nSistem Manajemen Perpustakaan Sederhana\n";
    echo "1. Lihat Daftar Buku\n";
    echo "2. Pinjam Buku\n";
    echo "3. Kembalikan Buku\n";
    echo "4. Keluar\n";
}

do {
    menu(); 
    $pilihan = (int) trim(fgets(STDIN)); 

    switch ($pilihan) {
        case 1:
            tampilkanDaftarBuku($daftarBuku); 
            break;
        case 2:
            pinjamBuku($daftarBuku, $bukuDipinjam); 
            break;
        case 3:
            kembalikanBuku($daftarBuku, $bukuDipinjam); 
            break;
        case 4:
            echo "\nTerima kasih telah menggunakan Sistem Manajemen Perpustakaan!\n";
            break;
        default:
            echo "\nPilihan tidak valid. Silakan coba lagi.\n";
    }
} while ($pilihan != 4); 