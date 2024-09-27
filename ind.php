<?php
$apikey = 'Wwa9uLCjp2_G_iW_vcM5jxJJ_eEsrXHEC8scPjYBTD4';
$daftarBuku = [
    [
        "judul" => "Belajar JavaScript",
        "penulis" => "John Doe",
        "tahunTerbit" => 2020,
        "genre" => "Teknologi"
    ],
    [
        "judul" => "Pengantar Pemrograman Python",
        "penulis" => "Jane Smith",
        "tahunTerbit" => 2018,
        "genre" => "Teknologi"
    ],
    [
        "judul" => "Seni Berbicara di Depan Umum",
        "penulis" => "Alice Johnson",
        "tahunTerbit" => 2019,
        "genre" => "Pengembangan Diri"
    ],
    [
        "judul" => "Dasar-Dasar Desain Grafis",
        "penulis" => "Bob Brown",
        "tahunTerbit" => 2021,
        "genre" => "Desain"
    ],
    [
        "judul" => "Sejarah Peradaban Dunia",
        "penulis" => "Emily White",
        "tahunTerbit" => 2015,
        "genre" => "Sejarah"
    ]
];

function getImgUnsplash($apikey){
  $url = 'https://api.unsplash.com/photos/random?client_id=' . $apikey;
  $respons = file_get_contents($url);
  $data = json_decode($respons, true);

  if(isset($data['urls']['regular'])){
    return $data['urls']['regular'];
  } else {
    return 'error';
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Meta tag yang diperlukan -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
      .card-img-top {
        width: 100%;
        height: 200px; /* Tentukan tinggi gambar yang tetap */
        object-fit: cover; /* Memotong gambar jika ukurannya lebih besar tanpa merusak proporsi */
      }
    </style>
    <title>Perpustakaan</title>
  </head>
  <body>
    <div class="container mt-4">
      <div class="row">
        <?php foreach ($daftarBuku as $buku) : ?>
          <div class="col-md-4 mb-4">
            <div class="card" style="width: 100%;">
              <img class="card-img-top img-fluid" src="<?= getImgUnsplash($apikey); ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?= $buku['judul']; ?></h5>
                <p class="card-text">Penulis: <?= $buku['penulis']; ?><br>Tahun Terbit: <?php echo $buku['tahunTerbit']; ?><br>Genre: <?php echo $buku['genre']; ?></p>
                <a href="#" class="btn btn-primary">Detail</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- JavaScript Opsional -->
    <!-- jQuery terlebih dahulu, kemudian Popper.js, kemudian JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
