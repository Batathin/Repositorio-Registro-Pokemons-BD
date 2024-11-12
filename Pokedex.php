<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Tabela Pokemon</title>
    <style>
<<<<<<< HEAD
        form{text-align: center; content}
=======
        form{text-align: center;}
        .pokemon{justify-content:center;}
    
>>>>>>> 063f944 (Quase fim('falta formatação'))
    </style>
    <meta charset="utf-8">
  </head>
  <body>
<<<<<<< HEAD

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
   
=======
    
   

>>>>>>> 063f944 (Quase fim('falta formatação'))
<?php
    $servername= "localhost";
    $database="Pokedex";
    $username="root";
    $password="";

<<<<<<< HEAD

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
=======
    $conn= mysqli_connect($servername, $username, $password, $database);

    if ($_SERVER["REQUEST_METHOD"] == "POST"  ){
>>>>>>> 063f944 (Quase fim('falta formatação'))
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $região = $_POST['região'];
        $imagem = $_POST['imagem'];

<<<<<<< HEAD
        $conn= mysqli_connect($servername, $username, $password, $database);

=======
            
>>>>>>> 063f944 (Quase fim('falta formatação'))
            if (!$conn) {
                die("Connection Failed: ".mysqli_connect_error());
            }
            else{
<<<<<<< HEAD
                echo"Conexão Estabelecida com Sucesso";
=======
                echo"Conexão Estabelecida com Sucesso <br>";
>>>>>>> 063f944 (Quase fim('falta formatação'))
                $sql= "Insert INTO pokedex (nome, tipo, região, imagem) VALUES ('$nome','$tipo','$região','$imagem')";
            }

            if (mysqli_query($conn,$sql)){
                echo "Novo Pokemon armazenado";
<<<<<<< HEAD
=======
                
                header("Location" . $_SERVER['PHP_SELF']);
                exit();
                
>>>>>>> 063f944 (Quase fim('falta formatação'))
            }
            else{
                echo "Erro: ". $sql . "<br>". mysqli_error($conn);
            }
<<<<<<< HEAD
            mysqli_close($conn);
    }
?>
  </body>
</html>
=======
    }
    
    $sql = "SELECT nome, tipo, região, imagem FROM Pokedex";
    $result = $conn->query($sql);
    mysqli_close($conn);
    
?>
    <h1 style="text-align: center;">Pokédex</h1>

    <form action="Pokedex.php" method="post">
    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome" required>
    <label for="Tipo">Tipo</label>
    <input type="text" id="tipo" name="tipo" required>
    <label for="região">Região</label>
    <input type="text" id="região" name="região" required>
    <label for="imagem">Imagem</label>
    <input type="text" id="imagem" name="imagem" required>
    <input type="submit" value="Enviar">
    <br>
<?php
    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            echo '<img src="' . htmlspecialchars($row["imagem"]) . '" alt="Imagem do ' . htmlspecialchars($row["nome"]) . '">';
        }
    }
?>       

  </body>
</html>
>>>>>>> 063f944 (Quase fim('falta formatação'))
