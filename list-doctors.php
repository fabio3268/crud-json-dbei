<?php
   $esp = filter_input(INPUT_GET,"esp", FILTER_DEFAULT);
   $stringDoctor = file_get_contents(__DIR__ . "/data-json/cadastroMedicos.json");

   $arrayDoctors = json_decode($stringDoctor,true);

?>


<!DOCTYPE html>
<html lang="pt-BR">
<?php
include __DIR__ . "/assets/head.php";
?>
<body class="bg-success p-2 text-dark bg-opacity-10">
<?php
include __DIR__ . "/assets/navigator.php";

  foreach ($arrayDoctors as $doctor){
      if($doctor["especialidade"] == $esp){
       var_dump($doctor);
      }
  }
?>
</body>
</html>