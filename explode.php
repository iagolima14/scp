<?php
$string = "Cadeira em Aço descricao: Preta  ";
$array = explode(' - descricao:', $string);
$nome_item = $array[0];
$descricao_item = $array[1];

if ($descricao_item == null){
    echo "<br><br>valor nulo!!!";
}

//foreach ($array as $valores) {
  //  echo $valores . '<br />';
//}
?>