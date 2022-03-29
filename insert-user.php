<?php
    $user = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    var_dump($user);
    if($user){
        // Verificar se nome e email foram informados e se o email é válido...
        $user["address"] = ""; // Endereço é informado depois
        $user["phone"] = ""; // Telefone é informado depois
        //var_dump($user);
        $arrayUsers = array();
        // verifica se o json existe
        if(file_exists(__DIR__ . "/data-json/cadastroUsuarios.json")) {
            $stringUsers = file_get_contents(__DIR__ . "/data-json/cadastroUsuarios.json");
            $arrayUsers = json_decode($stringUsers, true);
        }
        $arrayUsers[] = $user;
        $usersJson = json_encode($arrayUsers);
        //var_dump($usersJson);
        $file = fopen(__DIR__ . "/data-json/cadastroUsuarios.json","w+");
        fwrite($file, $usersJson);
        fclose($file);
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
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="passw" class="form-label">Senha</label>
                <input type="text" name="passw" class="form-control" id="passw">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
