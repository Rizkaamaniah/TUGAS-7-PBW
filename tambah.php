<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
  $npm = $_POST['mahasiswa_npm'];
  $kode_mk = $_POST['matakuliah_kodemik'];

  mysqli_query($conn, "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemik) VALUES ('$npm', '$kode_mk')");
  header("Location: index.php");
}


$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa");
$matkul = mysqli_query($conn, "SELECT * FROM mata_kuliah");
?>

<h2>Tambah Data KRS</h2>
<form method="POST">
  <label>Mahasiswa</label><br>
  <select name="mahasiswa_npm">
    <?php while ($m = mysqli_fetch_assoc($mahasiswa)) : ?>
      <option value="<?= $m['npm'] ?>"><?= $m['nama'] ?></option>
    <?php endwhile; ?>
  </select><br><br>

  <label>Mata Kuliah</label><br>
  <select name="matakuliah_kodemik">
    <?php while ($mk = mysqli_fetch_assoc($matkul)) : ?>
      <option value="<?= $mk['kode_mk'] ?>"><?= $mk['nama_mk'] ?> (<?= $mk['jumlah_sks'] ?> SKS)</option>
    <?php endwhile; ?>
  </select><br><br>

  <button type="submit" name="submit">Simpan</button>
</form>


