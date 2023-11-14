<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "dreamslibrary";

$connection = new mysqli($servername, $username, $password, $database);

$nome = "";
$email = "";
$cpf = "";
$tel = "";

$errorMessage = "";
$successMessage = "";


if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $tel = $_POST["tel"];

    do {
        if ( empty($nome) || empty($email) || empty($cpf) || empty($tel) ) {
            $errorMessage = "Todos os campos são obrigatórios";
            break;
        }

        //add um novo usuario no banco de dados

        $sql = "INSERT INTO usuarios (nome, email, cpf, tel) " .
                "VALUES ('$nome', '$email', '$cpf', '$tel')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $nome = "";
        $email = "";
        $cpf = "";
        $tel = "";

        $successMessage = "Usuário registrado com sucesso";

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
    <title>DreamsLibrary - Criar Usuários</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/usuarios.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header class="cabecalho">
        <a href="index.html"><img class="cabecalho-logo" src="assets/images/logotipo.png"></a>
        <nav class="cabecalho-menu">
            <a class="cabecalho-menu-item" href="index.html"><i class="bi bi-house-fill"></i>Home</a>
            <a class="cabecalho-menu-item" href="livros.php"><i class="bi bi-book"></i>Livros</a>
            <a class="cabecalho-menu-item" href="usuarios.php"><i class="bi bi-person-badge-fill"></i>Usuários</a>
            <a class="cabecalho-menu-item" href="emprestimos.php"><i class="bi bi-journals"></i>Empréstimos</a>
        </nav>
    </header>
    <main>
        <div class="container my-5">
            <h2 class="main-titulo">Registrar Usuário</h2>

            <?php
            if ( !empty($errorMessage) ) {
                echo "
                <div class='alert alert-warning alert-dimissible fade show' id='alert' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='burron' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                </div>
                ";
            }
            ?>

            <form method="post">
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
            <div class="rodape-conteudo-cri">
                <h4 class="cri">Criadores:</h4>
                <a class="link" href="https://github.com/AlexandreOliveiraSanches"><i class="bi bi-github mx-2"></i>Alexandre Oliveira</a>
                <a class="link" href="https://github.com/Analauravf"><i class="bi bi-github mx-2"></i>Ana Laura Fantatto</a>
                <a class="link" href="https://github.com/AnnaJuliaOliveira"><i class="bi bi-github mx-2"></i>Anna Julia Oliveira</a>
                <a class="link" href="https://github.com/larissamanso"><i class="bi bi-github mx-2"></i>Larissa Manço</a>
            </div>
            <div class="rodape-conteudo-doc">
                <h4 class="doc">Documentações</h4>
                <a class="link" 
                href="https://seducsp-my.sharepoint.com/:w:/g/personal/00001067463112sp_aluno_educacao_sp_gov_br/ERdBilRI4ntHkHxyd4r3ZDgBbFDAEILxjenuPese9mBizg?e=08bQSD&ovuser=6f9e3b1e-1809-444a-81d3-82d40a928812%2Canna.josantos%40senacsp.edu.br&clickparams=eyJBcHBOYW1lIjoiVGVhbXMtRGVza3RvcCIsIkFwcFZlcnNpb24iOiIyNy8yMzA5MjkxMTIwOCIsIkhhc0ZlZGVyYXRlZFVzZXIiOmZhbHNlfQ%3D%3D">
                <i class="bi bi-file-earmark-word"></i>Monografia</a>
                <a class="link" 
                href="https://www.canva.com/design/DAF0CvR1-es/Bw-bRh2bIo0esvEDZYBXEA/edit">
                <i class="bi bi-file-earmark-play"></i>Apresentação de Slides</a>
                <a class="link"
                href="https://www.figma.com/file/MZQoJd23RnsynIZU91ZFUD/Untitled?type=design&node-id=0%3A1&mode=design&t=vbDK6EqKGd7yvCUw-1">
                <i class="bi bi-window-sidebar"></i>Figma</a>
                <a class="link"
                href="https://lucid.app/lucidchart/54a35dc3-e9e9-43ce-a065-da1bb129791b/edit?viewport_loc=-2860%2C-642%2C2920%2C1497%2C0_0&invitationId=inv_627e874a-27cf-4f47-b423-4146a94b628d">
                <i class="bi bi-arrows"></i>Fluxograma</a>
                <a class="link"
                href="https://lucid.app/lucidchart/1e93f32e-e496-47ef-b300-05974dac1df9/edit?viewport_loc=-1492%2C-1413%2C2164%2C1109%2C0_0&invitationId=inv_1396a9d1-a807-4a61-982a-e1002ab5bf1d">
                <i class="bi bi-database-fill"></i>Modelagem de Dados</a>

            </div>
            
        </div>
    </footer>
</body>
</html>