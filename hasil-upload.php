
 <?php
include("koneksi.php");
$judul = $_POST['judul'];
  $kategori = $_POST['kategori'];
  $deskripsi = $_POST['deskripsi'];
  $tgl_upload = date("Ymd");

  $sql = "INSERT INTO upload (nama_file, kategori, deskripsi, tgl_upload)
            VALUES('$judul','$kategori','$deskripsi','$tgl_upload')";
  $query = $conn->query($sql);   

  if ($query) {
        echo "<div align='center'>Dokumen berhasil ditambahkan</div>";
      } else {
        echo "<div align='center'><b>Dokumen gagal ditambahkan </b></div>";
      }
  
?>