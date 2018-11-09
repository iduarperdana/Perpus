
 <?php
// Baca lokasi file sementar dan nama file dari form (fupload)
include'text-processing/class.pdf2text.php';
include 'text-processing/IDNstemmer.php';
// include('Enhanced_CS.php');

$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
// Tentukan folder untuk menyimpan file
$folder = "testupload/$nama_file";
// tanggal sekarang
$tgl_upload = date("Ymd");
// Apabila file berhasil di upload
if (move_uploaded_file($lokasi_file,"$folder")){
  echo "Nama File : <b>$nama_file</b> sukses di upload";
  
  // Masukkan informasi file ke database
  $konek = mysqli_connect("localhost","root","","db_stki");
  $query = "INSERT INTO upload (nama_file, deskripsi, tgl_upload)
            VALUES('$nama_file', '$_POST[deskripsi]', '$tgl_upload')";
            
  mysqli_query($konek, $query);
  
  $tekspdf = new PDF2Text();
  
  echo $nama_file;
 // $nama_file="./folder/"."uupangan2.pdf";
 $nama_file="./files/".$nama_file;
    echo ">>>>>>>>>>>>>>>>".$nama_file;
 // $a->setFilename('./folder/uupangan.pdf');
  $tekspdf->setFilename($nama_file);
  echo "bisa";
  
$tekspdf->decodePDF();
//echo $tekspdf->output(); 
 // preproses($tekspdf->output(),$nama_file);
  
 // $pdf    = $parser->parseFile($lokasi_file."/folder/".'$nama_file');  
//$text = $pdf->getText();
//echo $text;
///preprosesing
//------------------------------------------------------------------------- 
//-------------------------------------------------------------------------
///
  
}
else{
  echo "File gagal di upload";
}
?>