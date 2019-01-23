Liquidplataform Video Save - 0day

Este Algoritmo consegue burlar a proteção antipirataria da liquidplataform e baixar os videos originais em MP4, explorando uma vulnerabilidade na plataforma, sendo que até então não era possivel baixar video por ela.

Funciona de tal forma, a liquidplataform tem um URL com 2 hashs, onde o primeiro representa o usuario e o ultimo representa o codigo do vide.

onde esta:
$url = "https://fast.player.liquidplatform.com/v3/v1/6169876d5ac3a7d26e69d4471ef941b7/$Hash";

Subistituir onde esta "6169876d5ac3a7d26e69d4471ef941b7" pelo primeiro hash do URL que representa o codigo da empresa, e onde está a variavel $hash, esta vindo do formulario HTML na pagina anterior a requisição POST, ae se coloca no campo HTML na pagina inicial o ultimo hash do video original. Assim juntando o hash da empresa e o hash do video no Algoritmo, ele faz o trabalho e apresenta na tela o video original em MP4.
