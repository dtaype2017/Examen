<?php
class ClearPar{
  protected $cadena;
  protected $rpt;
  static function build($str){
  $cadena= $str;
  $rpt='';
  $longitud=strlen($cadena);
  for($i=0 ; $i<$longitud-1; $i++){
    $c = ord($cadena[$i]);
    $d = ord($cadena[$i+1]);
    if (($d-$c)==1){
      $rpt=$rpt."()";
      $i++;
      }
  }
  echo $rpt;
  }
}
?>
