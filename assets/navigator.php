


<?php
$stringJson = file_get_contents(__DIR__ . "/../data-json/cadastroEspecialidades.json");
$arrayEspecialidades = json_decode($stringJson,true);

$stringDoctors = file_get_contents(__DIR__ . "/../data-json/cadastroMedicos.json");
$arrayDoctors = json_decode($stringDoctors, true);
//var_dump($arrayDoctors);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid bg-success p-2 text-dark bg-opacity-10">
        <a class="navbar-brand" href="index.php">Cadatro Usuários</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="profile.php">Perfil</a>
                </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Área do Usuário
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="login.php">Login</a></li>
                        <li><a class="dropdown-item" href="profile.php">Perfil</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuários
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="list-users.php">Lista</a></li>
                        <li><a class="dropdown-item" href="insert-user.php">Incluir</a></li>
                        <li><a class="dropdown-item" href="delete-user.php">Excluir</a></li>
                        <li><a class="dropdown-item" href="#">Buscar</a></li>
                        <li><a class="dropdown-item" href="#">Buscar</a></li>
                        <!--
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        -->
                    </ul>

                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Especialidades
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                          foreach ($arrayEspecialidades as $especialidade){
                              echo "<li><a class=\"dropdown-item\" href=\"list-doctors.php?esp={$especialidade["nome"]}\">{$especialidade["nome"]}</a></li>";
                          }
                        ?>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Médicos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        foreach ($arrayDoctors as $doctor){
                            echo "<li><a class=\"dropdown-item\" href=\"doctor.php?nome={$doctor["name"]}\">{$doctor["name"]}</a></li>";
                        }
                        ?>
                    </ul>
                </li>

            </ul>
            <form class="d-flex" method="post" action="search-user.php">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>