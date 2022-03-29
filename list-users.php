<?php
if(file_exists(__DIR__ . "/data-json/cadastroUsuarios.json")){
    $stringUsers = file_get_contents(__DIR__ . "/data-json/cadastroUsuarios.json");
    //var_dump($stringUsers);
    $arrayUsers = json_decode($stringUsers, true);
    //var_dump($arrayUsers);
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
        <table class="table caption-top">
            <caption>Lista de Usuarários</caption>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Endereço</th>
                <th scope="col">Telefone</th>
                <th scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>
                <?php
                   if(!empty($arrayUsers)) {
                       $cod = 1;
                       foreach ($arrayUsers as $user) {
                           echo "<tr> 
                             <th scope=\"row\">{$cod}</th>
                             <td>{$user["name"]}</td>
                             <td>{$user["email"]}</td>
                             <td>{$user["address"]}</td>
                             <td>{$user["phone"]}</td>
                             <td>
                               <a href='edit-user.php?name={$user["name"]}'><img src=\"assets/file.svg\"></a>
                               <a href='#'><img src=\"assets/trash.svg\"></a>
                              </i>
                             </td>
                            </tr>";
                           $cod++;
                       }
                   }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
