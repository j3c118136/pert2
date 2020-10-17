<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<html>
<?php
include "koneksi.php";
$r = mysqli_query($kon, "SELECT * FROM mahasiswa WHERE id=" . $_GET["id"]);
$brs = mysqli_fetch_assoc($r);
echo "Apakah Anda yakin akan menghapus nama " . $brs['nama'] . " dari tabel ?";
?>

<form>
    <input type="hidden" name="idDelete" value="<?php echo $_GET["id"]; ?>">
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" name="jawaban" value="YA">YA</button>
            <button type="submit" class="btn btn-primary" name="jawaban" value="TIDAK">TIDAK</button>
        </div>
    </div>
</form>

<?php
if (isset($_GET['jawaban'])) {
    if ($_GET['jawaban'] == "TIDAK")
        header("location:01_tampildata.php");
    else {
        $r = mysqli_query($kon, "DELETE FROM `mahasiswa` WHERE `id` = " . $_GET['idDelete']);
        header("location:01_tampildata.php");
    }
}
?>

</html>