<?php

	class Stemming {


		public function katadasar(){
			$katadasar = file_get_contents('text-processing/katadasar.txt');
			$katadasar = $this->tokenisasi($katadasar);
			return $katadasar;
		}

		public function porterkamus($kata){
			if($this->cari($kata)!=1){
				$kata = $this->hapuspartikel($kata);
			}
			if($this->cari($kata)!=1){
				$kata = $this->hapuspp($kata);
			}

			$kata1 = $kata;

			if($this->cari($kata)!=1){
				$kata = $this->hapusawalan1($kata);
			}

			if($kata1==$kata){
				if($this->cari($kata)!=1){
					$kata = $this->hapusawalan2($kata);
				}
				if($this->cari($kata)!=1){
					$kata = $this->hapusakhiran($kata);
				}
			} else {
				$kata2 = $kata;
				if($this->cari($kata)!=1){
					$kata = $this->hapusakhiran($kata);
				}
				if($this->cari($kata)!=1){
					if($kata2 = $kata){
						$kata = $this->hapusawalan2($kata);
					}
				}
			}
			return $kata;			
		}
		public function cari($kata){
		
			
			$katadasar = $this->katadasar();
			if(in_array($kata, $katadasar)){
				$hasil = 1;
			} else {
				$hasil = 0;
			}
			return $hasil; //memberikan jawaban kata ada di database atau tidak
		}


		//langkah 1 - hapus partikel
		public function hapuspartikel($kata){
			if((substr($kata, -3) == 'kah' )||( substr($kata, -3) == 'lah' )||( substr($kata, -3) == 'pun' )){
				$kata = substr($kata, 0, -3);   
			}
			return $kata;
		}

		//langkah 2 - hapus possesive pronoun
		public function hapuspp($kata){
			if($this->cari($kata)!=1){
				if(strlen($kata) > 4){
					if((substr($kata, -2)== 'ku')||(substr($kata, -2)== 'mu')){
						$kata = substr($kata, 0, -2);
					} else if((substr($kata, -3)== 'nya')){
						$kata = substr($kata,0, -3);
					}
				}
			}
			return $kata;
		}

		//langkah 3 hapus first order prefiks (awalan pertama)
		public function hapusawalan1($kata){
			if(substr($kata,0,4)=="meng"){
				if(substr($kata,4,1)=="e"||substr($kata,4,1)=="u"){
					$kata = substr($kata,4);
				}else{
					$kata = substr($kata,4);
				}
			}else if(substr($kata,0,4)=="meny"){
				$kata = "s".substr($kata,4);
			}else if(substr($kata,0,3)=="men"){
				$kata = substr($kata,3);
			}else if(substr($kata,0,3)=="mem"){
				if(substr($kata,3,1)=="a"){
					$kata = "m".substr($kata,3);
				} else if(substr($kata,3,2)=="in"){
					$kata = "m".substr($kata,3);
				} else if(substr($kata,3,1)=="i"){
					$kata = "p".substr($kata,3);
				} else{
					$kata = substr($kata,3);
				}
			} else if(substr($kata,0,2)=="me"){
				$kata = substr($kata,2);
			} else if(substr($kata,0,4)=="peng"){
				if(substr($kata,4,1)=="e"){
					$kata = "k".substr($kata,4);
				}else{
					$kata = substr($kata,4);
				}
			} else if(substr($kata,0,4)=="peny"){
				$kata = "s".substr($kata,4);
			}else if(substr($kata,0,3)=="pen"){
				if(substr($kata,3,1)=="a" || substr($kata,3,1)=="i" || substr($kata,3,1)=="e" || substr($kata,3,1)=="u" || substr($kata,3,1)=="o"){
					$kata = "t".substr($kata,3);
				}else{
					$kata = substr($kata,3);
				}
			}else if(substr($kata,0,3)=="pem"){
				if(substr($kata,3,1)=="a" || substr($kata,3,1)=="i" || substr($kata,3,1)=="e" || substr($kata,3,1)=="u" || substr($kata,3,1)=="o"){
					$kata = "p".substr($kata,3);
				}else{
					$kata = substr($kata,3);
				}
			}else if(substr($kata,0,2)=="di"){
				$kata = substr($kata,2);
			}else if(substr($kata,0,3)=="ter"){
				$kata = substr($kata,3);
			}else if(substr($kata,0,2)=="ke"){
				$kata = substr($kata,2);
			}
			return $kata;
		}


		//langkah 4 hapus second order prefiks (awalan kedua)
		public function hapusawalan2($kata){
			$kataasli = $kata;
			if(substr($kata,0,3)=="ber"){
				$kata = substr($kata,3);
				if($this->cari($kata)!=1){
					$kata = $kataasli;
					$kata = substr($kata,2);
				}
			}else if(substr($kata,0,3)=="bel"){
				$kata = substr($kata,3);
			}else if(substr($kata,0,2)=="be"){
				$kata = substr($kata,2);
			}else if(substr($kata,0,3)=="per" && strlen($kata) > 5){
				$kata = substr($kata,3);
			}else if(substr($kata,0,2)=="pe"  && strlen($kata) > 5){
				$kata = substr($kata,2);
			}else if(substr($kata,0,3)=="pel"  && strlen($kata) > 5){
				$kata = substr($kata,3);
			}else if(substr($kata,0,2)=="se"  && strlen($kata) > 5){
				$kata = substr($kata,2);
			}
			return $kata;
		}


		////langkah 5 hapus suffiks
		public function hapusakhiran($kata){
			if (substr($kata, -3)== "kan" ){
				$kata = substr($kata, 0, -3);
			} else if(substr($kata, -1)== "i" ){
				$kata = substr($kata, 0, -1);
			} else if(substr($kata, -2)== "an"){
				$kata = substr($kata, 0, -2);
			}
			return $kata;
		}
	}
?>