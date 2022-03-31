<?php
   $nome = filter_input(INPUT_GET, "nome", FILTER_DEFAULT);
   $stringJson = file_get_contents(__DIR__ . "/data-json/cadastroMedicos.json");
   $arrayDoctors = json_decode($stringJson, true);
   //var_dump($arrayDoctors);
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
    if($doctor["name"] == $nome) {
        var_dump($doctor);
    }
}

?>
</body>
</html>