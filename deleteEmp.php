<?php
if ( isset($_GET["id"]) ) {
    $id = $_GET ["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dreamslibrary";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM emprestimos WHERE id=$id";
    $connection->query($sql);
}

header("location: /TCC-NOVOTEC/emprestimos.php");
exit;
?>