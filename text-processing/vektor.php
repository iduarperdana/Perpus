<?php 
					$text = new Stemming();
					$query=mysqli_query($conn,"SELECT kategori,deskripsi FROM upload WHERE id_upload "); 
					if($rows=mysqli_num_rows($query)>0){ 


					?>

					<?php

					while($input = mysqli_fetch_array($query,MYSQLI_ASSOC)){
					$plain_text=implode($input);
					$plain_text=explode(PHP_EOL, $plain_text);
					foreach ($plain_text as $key ) {
						# code...
					}
					$jumlah_dokumen =count($input);

					
						$stemming = $text->stem($key);
						foreach ($stemming as $kata => $jumlah) {if($kata != ""){
					  ?>
					
					  <?php
					  if($result=preg_match("/$term/i", $kata)) {
					  	//echo ('</br>');
					  	//echo $key,(" -> ");
					  	echo $key;
					  	echo ("kata :"),$kata;
					  
					  	echo (" | frekuensi = "),$jumlah.("--");
					  	
					  } else {
					  	unset($kata);
					  }  
					  ?>
					  <?php 
					  } 
					}
				}
			}
		

					  ?>


					<!-- End Pencocokan -->
					<?php  
}
}
}
?>