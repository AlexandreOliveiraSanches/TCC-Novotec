<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "dreamslibrary";

$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$nome = "";
$email = "";
$cpf = "";
$tel = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

    if ( !isset($_GET["id"]) ) {
        header("location: /TCC-NOVOTEC/usuarios.php");
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /TCC-NOVOTEC/usuarios.php");
        exit;
    }

    $nome = $row["nome"];
    $email = $row["email"];
    $cpf = $row["cpf"];
    $tel = $row["tel"];

}
else {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $tel = $_POST["tel"];

    do {
        if ( empty($id) || empty($nome) || empty($email) || empty($cpf) || empty($tel) ) {
            $errorMessage = "Todos os campos são obrigatórios";
            break;
        }

        $sql = "UPDATE usuarios " .
                "SET nome = '$nome', email = '$email', cpf = '$cpf', tel = '$tel' " .
                "WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Usuário atualizado com sucesso";
        header("location: /TCC-NOVOTEC/usuarios.php");
        exit;

    } while (false);

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site para moderação de usúarios, livros e empréstimos para sua biblioteca virtual">
    <title>DreamsLibrary - Editar Usuário</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/livros.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header class="cabecalho">
        <a href="index.html"><img class="cabecalho-logo" src="assets/images/dreams-removebg-preview.png"></a>
        <nav class="cabecalho-menu">
            <a class="cabecalho-menu-item" href="index.html"><i class="bi bi-house-fill"></i>Home</a>
            <a class="cabecalho-menu-item" href="livros.php"><i class="bi bi-book"></i>Livros</a>
            <a class="cabecalho-menu-item" href="usuarios.php"><i class="bi bi-person-badge-fill"></i>Usuários</a>
            <a class="cabecalho-menu-item" href="emprestimos.php"><i class="bi bi-journals"></i>Empréstimos</a>
        </nav>
    </header>
    <main>
        <div class="container my-5">
            <h2>Editar Usuário</h2>

            <?php
            if ( !empty($errorMessage) ) {
                echo "
                <div class='alert alert-warning alert-dimissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='burron' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                </div>
                ";
            }
            ?>

            <form method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Nome</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">CPF</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="cpf" value="<?php echo $cpf ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Tel/Cel</label>
                    <div class="col-sm-6">
                        <input type="tel" class="form-control" name="tel" value="<?php echo $tel; ?>">
                    </div>
                </div>

                <?php
                    if ( !empty($successMessage) ) {
                        echo "
                        <div class='row mb-3'>
                            <div class='offset-sm-3 col-sm-6>
                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>$successMessage</strong>
                                    <button type='button' class='btn btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                ?>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="/TCC-NOVOTEC/usuarios.php" role="button">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>

    </main>
    <footer class="rodape">
        <div class="rodape-conteudo">
            <h4 class="cri">Criadores:</h4>
            <a class="link" href="https://github.com/AlexandreOliveiraSanches"><i class="bi bi-github"></i>Alexandre</a>
            <a class="link" href="https://github.com/Analauravf"><i class="bi bi-github"></i>Ana Laura</a>
            <a class="link" href="https://github.com/AnnaJuliaOliveira"><i class="bi bi-github"></i>Anna Julia</a>
            <a class="link" href="https://github.com/larissamanso"><i class="bi bi-github"></i>Larissa</a>
        </div>
    </footer>
</body>
</html>