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