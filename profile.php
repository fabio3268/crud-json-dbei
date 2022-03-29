<?php
session_start();
if(empty($_SESSION["user"]) || empty($_COOKIE["logado"])){
    header("Location:login.php");
} else {
    $user = $_SESSION["user"];
    //var_dump($user);
}

$post = filter_input_array(INPUT_POST,FILTER_DEFAULT);
var_dump($post);
if($post){
    $stringUsers = file_get_contents(__DIR__ . "/data-json/cadastroUsuarios.json");
    $arrayUsers = json_decode($stringUsers, true);

    $i = $_SESSION["i"];
    $arrayUsers[$i] = $post;
    $arrayUsers[$i]["passw"] = $_SESSION["user"]["passw"];

    $usersJson = json_encode($arrayUsers);
    $file = fopen(__DIR__ . "/data-json/cadastroUsuarios.json","w");
    fwrite($file, $usersJson);
    fclose($file);
    // atualiza a SESSAO
    $_SESSION["user"] = $post;
    $_SESSION["user"]["passw"] = $arrayUsers[$i]["passw"];
    $user = $post;
    //header("Location:profile.php");
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<?php
include __DIR__ . "/assets/head.php";
?>
<body class="bg-success p-2 text-dark bg-opacity-10">
<?php
include __DIR__ . "/assets/navigator.php";
?>
<div class="container">
    <div class="row">
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" id="name" value="<?=$user["name"];?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email" class="form-control" id="email" value="<?=$user["email"];?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Endereço</label>
                <input type="text" name="address" class="form-control" id="address" value="<?=$user["address"];?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telefone</label>
                <input type="text" name="phone" class="form-control" id="phone" value="<?=$user["phone"];?>">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
</body>
</html>