<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<?php
	include "koneksi.php";
?>


<h2><center>DATA MAHASISWA</center></h2>
<br><br>


<form action="02_tambahdata.php">
<div class="form-group row">
    <div class="col-sm-10">
	  <input type="submit" value="Tambah Data Baru" class="btn btn-primary">
    </div>
</div>    
</form>


<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIM</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
	    <th scope="col">Agama</th>
	    <th scope="col">Hobi</th>
	    <th scope="col">Foto</th>
	    <th scope="col">Aksi</th>
    </tr>
  </thead>

  
	<?php
		$i = 1;
		$r=mysqli_query($kon,"SELECT * FROM mahasiswa");
		while($brs=mysqli_fetch_assoc($r)) {
	?>


  <tbody>
    <tr>
    <th><?= $i++; ?></td>
    <td><?= $brs['nim']; ?></td>
    <td><?= $brs['nama']; ?></td>
    <td><?= $brs['jenis_kelamin']; ?></td>
    <td><?= $brs['agama']; ?></td>
    <td><?= $brs['olahraga']; ?></td>
    <td><img src="img/<?= $brs['foto']; ?>" height="70px"></td>
    <td><a href="03_edit.php?id=<?= $brs['id']; ?>">Edit</a><br><a href="04_delete.php?id=<?= $brs['id']; ?>">Delete</a></td>
    </tr>
  </tbody>

  <?php 
		}
  ?>
</table>