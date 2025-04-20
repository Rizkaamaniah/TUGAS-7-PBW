<?php
include 'koneksi.php';
$id = $_GET['id'];

if (isset($_POST['submit'])) {
  $npm = $_POST['mahasiswa_npm'];
  $kode_mk = $_POST['matakuliah_kodemik'];
  mysqli_query($conn, "UPDATE krs SET mahasiswa_npm='$npm', matakuliah_kodemik='$kode_mk' WHERE id=$id");
  header("Location: index.php");
}

$data = mysqli_query($conn, "SELECT * FROM krs WHERE id=$id");
$row = mysqli_fetch_assoc($data);

$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa");
$matkul = mysqli_query($conn, "SELECT * FROM mata_kuliah");
?>

<h2>Edit Data KRS</h2>
<form method="POST">
  <label>Mahasiswa</label><br>
  <select name="mahasiswa_npm">
    <?php while ($m = mysqli_fetch_assoc($mahasiswa)) : ?>
      <option value="<?= $m['npm'] ?>" <?= ($m['npm'] == $row['mahasiswa_npm']) ? 'selected' : '' ?>>
        <?= $m['nama'] ?>
      </option>
    <?php endwhile; ?>
  </select><br><br>

  <label>Mata Kuliah</label><br>
  <select name="matakuliah_kodemik">
    <?php while ($mk = mysqli_fetch_assoc($matkul)) : ?>
      <option value="<?= $mk['kode_mk'] ?>" <?= ($mk['kode_mk'] == $row['matakuliah_kodemik']) ? 'selected' : '' ?>>
        <?= $mk['nama_mk'] ?> (<?= $mk['jumlah_sks'] ?> SKS)
      </option>
    <?php endwhile; ?>
  </select><br><br>

  <button type="submit" name="submit">Update</button>
</form>

