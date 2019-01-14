<?php
	
	include "simple_html_dom.php";
	
	function multiexplode ($var,$string) {
		
		$temp = str_replace($var, $var[0], $string);
		$ok = explode($var[0], $temp);
		return  $ok;
	}

	function ExtraVideo($Hash){
	
		$url = "https://fast.player.liquidplatform.com/v3/v1/6169876d5ac3a7d26e69d4471ef941b7/$Hash"; //URL Codificado em Base64 das Informações do Video
		
		$html = file_get_html($url); //Extrai toda codificação Base64 e Joga em uma variavel
		
		$split = explode('+',$html); //Corta a codificação em vetores pelo simbolo "+"
		
		$cont = count($split); //Conta quantos vetores foi criado
		
		$junta = "";
		
		for($i=1;$i<=$cont-1;$i++){
			$junta = $junta.$split[$i]."+"; //Junta toda a codificação, excluindo a primeira parte da criptografia base64
		}
		
		$urlmp4 = (base64_decode($junta)); //Decodifica todo conteudo codificado em base64 e transforma em texto puro ASCII

		$split2 = multiexplode(array('?sts','"'),$urlmp4); //Separa as URLS em vetores
		
		$Videos = [];
		
		foreach($split2 as $s){
			if((substr($s, -3) == "mp4") and (substr($s, -5) != "p.mp4")){ //Seleciona as URLS que tem o final .mp4
				$Videos[] = $s;
			}
		}
		
		foreach($Videos as $v){ //Mostra o video na tela
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
	
	//Variaveis que vem do formulario HTML da pagina inicial
	$hashvideo1 = $_POST['hash1'];
	$hashvideo2 = $_POST['hash2'];
	$hashvideo3 = $_POST['hash3'];
	$hashvideo4 = $_POST['hash4'];
	$hashvideo5 = $_POST['hash5'];
	
	
	//Chamando a função para extrair o video
	if(!empty($hashvideo1)){
		ExtraVideo($hashvideo1);
	}
	if(!empty($hashvideo2)){
		ExtraVideo($hashvideo2);
	}
	if(!empty($hashvideo3)){
		ExtraVideo($hashvideo3);
	}
	if(!empty($hashvideo4)){
		ExtraVideo($hashvideo4);
	}
	if(!empty($hashvideo5)){
		ExtraVideo($hashvideo5);
	}
?>
