<?php
class ChangeString{
  protected $cadena;
  protected $rpta;
  static function build($str){
  $cadena= $str;
  $rpta='';
  $longitud=strlen($cadena);
  for($i=0 ; $i<$longitud; $i++){
    $c = ord($cadena[$i]);//c es un caracter
    if(($c>=65 && $c<=90)||($c>=97 && $c<=122)){
      switch($c){
        case 78:
          $rpta=$rpta.chr(165);
          break;
        case 90:
          $rpta=$rpta.chr(65);
          break;
        case 110:
          $rpta=$rpta.chr(164);
          break;
        case 122:
          $rpta=$rpta.chr(97);
          break;
        default:
          $rpta=$rpta.chr($c+1);
      }
    }
    else{
      $rpta=$rpta.chr($c);
    }
  }
  echo utf8_encode($rpta);

  }
}
?>
