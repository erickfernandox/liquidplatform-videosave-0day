<?php
	
	include "simple_html_dom.php";
	
	function multiexplode ($delimiters,$string) {
		
		$ready = str_replace($delimiters, $delimiters[0], $string);
		$launch = explode($delimiters[0], $ready);
		return  $launch;
	
	}

	function ExtraVideo($Hash){
	
		$url = "https://fast.player.liquidplatform.com/v3/v1/6169876d5ac3a7d26e69d4471ef941b7/$Hash";
		
		$url = explode(" ",$url);
		
		$url = join($url);
		
		$html = file_get_html($url);
		//print($html);
		
		$split = explode('+',$html);
		
		$cont = count($split);
		
		$junta = "";
		
		for($i=1;$i<=$cont-1;$i++){
			$junta = $junta.$split[$i]."+";
		}
		

		$urlmp4 = (base64_decode($junta));
		
		//print("<br>".$urlmp4);
		
		
		
		$split2 = multiexplode(array('?sts','"'),$urlmp4);
		
		//print_r($split2);
		
		$Videos = [];
		
		foreach($split2 as $s){
			if((substr($s, -3) == "mp4") and (substr($s, -5) != "p.mp4")){
				$Videos[] = $s;
			}
		}
		
		foreach($Videos as $v){
		?>
		<center>
		<video width="480" height="280" controls>
		  <source src="<?=$v?>" type="video/mp4">
		</video>
		<br>
		<a href="<?=$v?>" download>Download - 480P</a>
		</center>
		<?php
		}
	}
	
		
	$hashvideo1 = $_POST['hash1'];
	$hashvideo2 = $_POST['hash2'];
	$hashvideo3 = $_POST['hash3'];
	$hashvideo4 = $_POST['hash4'];
	$hashvideo5 = $_POST['hash5'];
	
	ExtraVideo($hashvideo1);
	ExtraVideo($hashvideo2);
	ExtraVideo($hashvideo3);
	ExtraVideo($hashvideo4);
	ExtraVideo($hashvideo5);
	
	

?>