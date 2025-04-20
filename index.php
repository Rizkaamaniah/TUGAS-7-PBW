<?php
include 'koneksi.php';
$no = 1;
$query = "SELECT 
            krs.id,
            mahasiswa.nama AS nama_mahasiswa, 
            mata_kuliah.nama_mk AS nama_mk, 
            mata_kuliah.jumlah_sks AS sks 
          FROM krs 
          JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm
          JOIN mata_kuliah ON krs.matakuliah_kodemik = mata_kuliah.kode_mk";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Data KRS</title>
  <style>
    table { border-collapse: collapse; width: 100%; font-family: Arial; }
    th, td { padding: 10px; border: 1px solid #ccc; }
    tr:nth-child(even) { background-color: #f9f9f9; }
    th { background-color: #eee; }
    .highlight { color: #d63384; font-weight: bold; }
    .btn { padding: 6px 12px; text-decoration: none; background: #007bff; color: white; border-radius: 4px; margin-right: 5px; }
    .btn-danger { background: #dc3545; }
    .btn-add { background: #28a745; margin-bottom: 10px; display: inline-block; }
  </style>
</head>
<body>

  <h2>Data KRS Mahasiswa</h2>
  <a href="tambah.php" class="btn btn-add">+ Tambah Data</a>

  <table>
    <tr>
      <th>No</th>
      <th>Nama Lengkap</th>
      <th>Mata Kuliah</th>
      <th>Keterangan</th>
      <th>Aksi</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $row['nama_mahasiswa'] ?></td>
      <td><?= $row['nama_mk'] ?></td>
      <td>
        <span class="highlight"><?= $row['nama_mahasiswa'] ?></span> mengambil mata kuliah 
        <span class="highlight"><?= $row['nama_mk'] ?></span> (<?= $row['sks'] ?> SKS)
      </td>
      <td>
        <a href="edit.php?id=<?= $row['id'] ?>" class="btn">Edit</a>
        <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>

  </table>

</body>
</html>

