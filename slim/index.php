<?php
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
require 'vendor/autoload.php';
$app = new \Slim\App;
$datos = file_get_contents("employees.json");
$app->get('/', function() use ($app,$datos) {

    $json_empleados = json_decode($datos, true);
    echo "<table border='1' cellpadding='3'>
    <thead><tr><th>name</th><th>email</th>
    <th>position</th><th>salary</th></tr></thead>";
    $a=1;
    foreach ($json_empleados as $empleado) {
       echo "<tr><td><a href='/slim/$a'>".$empleado["name"]."</a></td><td>".$empleado["email"]."</td><td>".$empleado["position"]."</td><td>".$empleado["salary"]."</td></tr>";
       $a++;
    }
    echo "</table></br><form method='post'><input type='text' name='email'><button type='submit'>Filtrar Email</button></form>";

});
$app->post('/', function($request, $response, $args) use ($app,$datos) {
    $email = $request->getParsedBody()['email'];
    $json_empleados = json_decode($datos, true);
    echo "<table border='1' cellpadding='3'>
    <thead><tr><th>name</th><th>email</th>
    <th>position</th><th>salary</th></tr></thead>";;
  foreach ($json_empleados as $empleado) {
      if ($empleado["email"]==$email)
         echo "<tr><td>".$empleado["name"]."</td><td>".$empleado["email"]."</td><td>".$empleado["position"]."</td><td>".$empleado["salary"]."</td></tr>";
    }
    echo "</table>";
});
$app->get('/{nombre}', function($request, $response) use ($app,$datos) {
    $id=$request->getAttribute('nombre');
    $json_empleados = json_decode($datos, true);
    $a=1;
    foreach ($json_empleados as $empleado) {
      if ($a==$id){
         echo "<ul><li>name:".$empleado["name"]."</li><li>email:".$empleado["email"]."</li><li>phone:".$empleado["phone"]."</li><li>address:".$empleado["address"]."</li><li>position:".$empleado["position"]."</li><li>salary:".$empleado["salary"]."</li><ul>";
         $i=0;
         echo "<ul>";
         foreach ($empleado["skills"] as $skills){
           echo "<li>skill:".$skills["skill"]."</li>";
           $i++;
         }
         echo "</ul>";

       }
      $a++;
    }

});

$app->run();
