<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Tabela Pokemon</title>
    <style>
        form{text-align: center; content}
    </style>
    <meta charset="utf-8">
  </head>
  <body>

  <form action="Pokedex.php" method="post">
    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome">
    <label for="Tipo">Tipo</label>
    <input type="text" id="tipo" name="tipo">
    <label for="região">Região</label>
    <input type="text" id="região" name="região">
    <label for="imagem">Imagem</label>
    <input type="text" id="imagem" name="imagem">
    <input type="submit" value="Enviar">
   
<?php
    $servername= "localhost";
    $database="Pokedex";
    $username="root";
    $password="";


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $região = $_POST['região'];
        $imagem = $_POST['imagem'];

        $conn= mysqli_connect($servername, $username, $password, $database);

            if (!$conn) {
                die("Connection Failed: ".mysqli_connect_error());
            }
            else{
                echo"Conexão Estabelecida com Sucesso";
                $sql= "Insert INTO pokedex (nome, tipo, região, imagem) VALUES ('$nome','$tipo','$região','$imagem')";
            }

            if (mysqli_query($conn,$sql)){
                echo "Novo Pokemon armazenado";
            }
            else{
                echo "Erro: ". $sql . "<br>". mysqli_error($conn);
            }
            mysqli_close($conn);
    }
?>
  </body>
</html>
