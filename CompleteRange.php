<?php
class CompleteRange{
  protected $array;
  protected $rpta;
  static function build($lista){
    $array = $lista;
    $long = count($array);
    $cont=0;
    for($i=$array[0] ; $i<=$array[$long-1]; $i++){
        $rpta[$cont] = $i;
        $cont++;
      }
    echo "[".implode(',',$rpta)."]";
}
}
?>
