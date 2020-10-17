<?php
ob_start();
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<h2><center>FORM ISI DATA BARU</center></h2>
<br><br>

<form method="POST" enctype="multipart/form-data">
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">NIM</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nim">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nm">
    </div>
  </div>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" id="male" name="gender" value="Laki-laki">
          <label class="form-check-label" for="male">
            Laki-laki
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="female" name="gender" value="Perempuan">
          <label class="form-check-label" for="female">
            Perempuan
          </label>
        </div>
      </div>
    </div>
  </fieldset>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Agama</label>
    <div class="col-sm-10">
    <select class="form-control" name="agama">
      <option value="Islam">Islam</option>
      <option value="Hindu">Hindu</option>
      <option value="Buddha">Buddha</option>
      <option value="Kristen">Kristen</option>
      <option value="Katolik">Katolik</option>
    </select>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-2">Olahraga</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="of1" name="hobi[]" value="Sepak Bola">
        <label class="form-check-label" for="of1">
          Sepak Bola
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="of2" name="hobi[]" value="Basket">
        <label class="form-check-label" for="of2">
          Basket
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="of3" name="hobi[]" value="Futsal">
        <label class="form-check-label" for="of3">
          Futsal
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="of4" name="hobi[]" value="Renang">
        <label class="form-check-label" for="of4">
          Renang
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="of5" name="hobi[]" value="Badminton">
        <label class="form-check-label" for="of5">
          Badminton
        </label>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Foto</label>
    <div class="col-sm-10">
      <input type="file" name="image">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="sub" value="tambah">Simpan Data</button>
      <button type="submit" class="btn btn-primary" name="sub" value="kembali">Kembali ke Daftar Data</button>
    </div>
  </div>

<?php
  if (isset($_POST['sub'])) {
    if ($_POST['sub'] == 'kembali') {
      header("location:01_tampildata.php");
      ob_end_flush();  
      } else {
            $data = implode(", ", $_POST['hobi']);
            $ukuran = $_FILES['image']['size'];
            $namaFile = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['tmp_name'];

            if ($ukuran > 1000000) {
                echo "<script>
                         alert('Ukuran Gambar Terlalu Besar!');
                      </script>";
                header("location:02_tambahdata.php");
            } else {
                move_uploaded_file($tmpName, 'img/' . $namaFile);
            }

            if (strlen($_POST['nm']) && strlen($_POST['gender']) && strlen($_POST['agama']) && strlen($data) && strlen($namaFile)) {
                include "koneksi.php";
                mysqli_query($kon, "INSERT INTO `mahasiswa` (`nim`,`nama`,`jenis_kelamin`,`agama`,`olahraga`,`foto`) VALUES 
                ('" . $_POST['nim'] . "','" . $_POST['nm'] . "','" . $_POST['gender'] . "','" . $_POST['agama'] . "','" . $data . "','" . $namaFile . "')");

                echo "<br>Data <b>'" . $_POST['nm'] . "'</b> telah dimasukan ke database";
                echo "<br>Kembali ke daftar data";

            } else {
                echo "Data tidak boleh kosong";
            }
        }
    }
?>
</form>