<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site para moderação de usúarios, livros e empréstimos para sua biblioteca virtual">
    <title>DreamsLibrary - Usuários</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/usuarios.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
        <h2 class="main-titulo">Cadastro de Usuários</h2>
        <a class="btn" id="btn_edit" href="/TCC-NOVOTEC/criarU.php" role="button"><i class="bi bi-file-earmark-plus"></i>Novo</a>
        <br/>

        <table class="table table-hover w-75">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Email</th>
              <th>CPF</th>
              <th>Tel/Cel</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "dreamslibrary";

            //Criando conexão
            $connection = new mysqli($servername, $username, $password, $database);

            //Checar conexão
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $sql = "SELECT * FROM usuarios";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

            while($row = $result->fetch_assoc()) {
              echo "
              <tr>
                  <td>$row[nome]</td>
                  <td>$row[email]</td>
                  <td>$row[cpf]</td>
                  <td>$row[tel]</td>
                  <td>
                      <a class='btn btn-secondary btn-sm' href='/TCC-NOVOTEC/editUsuarios.php?id=$row[id]'><i class='bi bi-pencil-square'></i>Editar</a>
                      <a class='btn btn-danger btn-sm' href='/TCC-NOVOTEC/deleteUsuarios.php?id=$row[id]'><i class='bi bi-trash3'></i>Excluir</a>
                  </td>
              </tr>
              ";
            }
            ?>

            
          </tbody>
        </table>

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