
<?php
		// Dipanggil fungsi tokenisasi
$i=1;
$kalimat = isset($_GET['search']) ? $_GET['search']: '';
$kalimat = preg_replace( "/(,|\"|\.|\?|:|!|;|-| - )/", " ", $kalimat );
$kalimat = preg_replace( "/\n/", " ", $kalimat ); // menghilangkan enter
$kalimat = preg_replace( "/\s\s+/", " ", $kalimat ); // menghilangkan spasi
$kalimat = explode(" ",$kalimat); // memisahkan kata per spasi
		
		function tokenisasi($input){
			$results = array();

			foreach ($input as $key=>$word) {
				$phrase = '';

			// FOR $i = 1 => diambil 1 kata
			// $input[$key] => ngambil 1 kata dimasukin ke $phrase

				for ($i=0;$i<1;$i++) {
					$phrase = strtolower($input[$key]);

				}

			// $results[$phrase] => menaruk kata ke array untuk dihitung perulangannya
			// $phrase adalah kata yg didapat, $result[$phrase] jumlahnya

				$a = explode(" ","yang di dan itu dengan untuk tidak ini dari dalam akan pada juga saya ke karena tersebut bisa ada mereka lebih kata tahun sudah atau saat oleh menjadi orang ia telah adalah seperti sebagai bahwa dapat para harus namun kita dua satu masih hari hanya mengatakan kepada kami setelah melakukan lalu belum lain dia kalau terjadi banyak menurut  anda hingga tak baru beberapa ketika saja jalan sekitar secara dilakukan sementara tapi sangat hal sehingga  seorang bagi besar lagi selama antara waktu sebuah jika sampai jadi terhadap tiga serta pun salah merupakan atas sejak  membuat baik memiliki  kembali selain tetapi pertama kedua memang pernah apa mulai sama tentang bukan agar semua sedang kali kemudian hasil sejumlah juta persen sendiri katanya demikian masalah  mungkin umum setiap bulan bagian bila lainnya terus luar cukup termasuk sebelumnya bahkan wib tempat perlu menggunakan memberikan rabu sedangkan kamis langsung apakah pihak melalui diri mencapai  minggu aku  berada tinggi ingin sebelum tengah kini the tahu bersama depan selasa begitu  merasa  berbagai mengenai  maka jumlah masuk   katanya  mengalami sering ujar kondisi akibat hubungan empat paling mendapatkan selalu lima  meminta melihat sekarang mengaku mau kerja acara menyatakan masa proses tanpa selatan sempat  adanya hidup datang senin rasa maupun seluruh mantan lama jenis segera misalnya  mendapat bawah jangan meski terlihat akhirnya jumat  punya yakni terakhir kecil panjang badan juni of  jelas jauh tentu semakin tinggal kurang  mampu posisi  asal sekali  sesuai sebesar berat  dirinya memberi pagi  sabtu  ternyata mencari sumber ruang menunjukkan biasanya nama  sebanyak utara berlangsung barat kemungkinan yaitu  berdasarkan  sebenarnya cara utama pekan terlalu  membawa kebutuhan suatu menerima  penting  tanggal bagaimana terutama tingkat awal sedikit nanti pasti  muncul dekat lanjut ketiga biasa dulu kesempatan  ribu  akhir  membantu terkait  sebab menyebabkan khusus  bentuk ditemukan  diduga mana ya kegiatan sebagian tampil hampir bertemu usai berarti keluar pula digunakan justru  padahal menyebutkan  gedung  apalagi program  milik teman menjalani keputusan sumber a  upaya mengetahui mempunyai berjalan menjelaskan  b mengambil benar lewat belakang ikut barang meningkatkan kejadian kehidupan keterangan penggunaan masing-masing menghadapi");
				foreach ($a as $banned) unset($results[$banned]);

				if (!isset($results[$phrase])){
					$results[$phrase]=1;
				} else {
					$results[$phrase]++;
				}
			}

		array_multisort($results, SORT_DESC); //mengurutkan dari frekuensi besar ke kecil
		return $results;
	} // end fungsi tokenisasi

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	</head>
	<body>


		<!-- Navbar goes here -->
		<nav>
			<div class="nav-wrapper">
				<a href="http://localhost/perpus/index.php" class="brand-logo center"><img src="img/logo.png" style="width:45px;height:45px; margin-top: 10px;"> Paperpush</a>
			</div>
		</nav>


		<nav>
			<div class="nav-wrapper  pink darken-1">
				<form action="index.php" method="GET">
					<div class="input-field">
						<input id="search" type="search" name="search" required>
						<label class="label-icon" for="search"><i class="material-icons">search</i></label>
						<i class="material-icons">close</i>
					</div>
				</form>
			</div>
		</nav>

		<table style="margin-bottom: 100px;">
			<thead>
				<tr>
					<th>NO</th>
					<th>Nama Buku</th>
					<th>Genre</th>
				</tr>
			</thead>
			<tbody>
				<?php
      // Dipanggil fungsi tokenisasi
				$stats = tokenisasi($kalimat);
				$i=1;
				foreach ($stats as $term => $count) {
      // if term != "", supaya gak diindex term yg kosong
					if($term != ""){
						?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $term ?></td>
							<td><?php echo $count ?></td>
						</tr>
						<?php
						$i++;
					}
				}
				?>
			</tbody>
		</table>


	</body>

	<footer class="page-footer" style="position: fixed;left: 0;bottom: 0;width: 100%;">
		<div class="footer-copyright">
			<div class="container">
				© 2018 Copyright Paperpush
				<a class="grey-text text-lighten-4 right" href="#!">Paperpush.com</a>
			</div>
		</div>
	</footer>
	</html>