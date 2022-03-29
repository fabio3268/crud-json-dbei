<?php
   session_start();
   $resp = "";
   $email = "";
   $usuario = filter_input_array( INPUT_POST,  FILTER_DEFAULT);

   if($usuario) {
       $stringJSON = file_get_contents(__DIR__ . "/data-json/cadastroUsuarios.json");
       $arrayUsuarios = json_decode($stringJSON, true);
       var_dump($arrayUsuarios);
       if(in_array('',$usuario)){
           $resp = "Preencha todos os campos...";
       } else if (!filter_var($usuario["email"],FILTER_VALIDATE_EMAIL)){
           $resp = "Digite um e-mail válido...";
       } else if(strlen($usuario["senha"]) <= 3) {
           $resp = "Digite uma senha com mais de 3 digitos...";
           $email = $usuario["email"];
       } else {
           $achei = false;
           foreach ($arrayUsuarios as $i => $usr){
               if($usr["email"] == $usuario["email"] && $usr["passw"] == $usuario["senha"]) {
                   $_SESSION["user"] = $usr;
                   $_SESSION["i"] = $i;
                   setcookie("logado","Logado",time()+60*60);
                   $achei = true;
                   break;
               }
           }
           if($achei){
               header("Location:profile.php?name={$usr["name"]}");
           } else {
               $resp = "Não Achei!";
           }
       }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="assets/styles.css">
    <script type="text/javascript" src="assets/scripts.js" async></script>
</head>
<body>
    <form method="post">
        <h3>Login</h3>
        <input type="text" id="email" name="email" value="<?=$email; ?>" placeholder="Seu Email.."/>
        <input type="password" id="senha" name="senha" value="" placeholder="Sua senha..."/>
        <input type="submit" id="btn" name="acao" value="Enviar">
        <h3><a href="index.php">HOME</a></h3>
        <h3><?= $resp; ?></h3>
    </form>
</body>
</html>
