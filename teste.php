<?php

$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "pukemon";       


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nome']) && !empty($_POST['tipo']) && !empty($_POST['regiao']) && !empty($_POST['imagem'])) {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $regiao = $_POST['regiao'];
    $imagem = $_POST['imagem'];

   
    $sql_insert = "INSERT INTO eu (nome, tipo, regiao, imagem) VALUES ('$nome', '$tipo', '$regiao', '$imagem')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "Novo Pokémon adicionado com sucesso!";
        
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Erro ao adicionar Pokémon: " . $conn->error;
    }
}


$sql = "SELECT id, nome, tipo, regiao, imagem FROM eu";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pokédex</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; color: #333; }
        .pokedex { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 20px; }
        .pokemon-card { width: 200px; padding: 15px; border: 1px solid #ddd; border-radius: 10px; background-color: #fff; text-align: center; box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.1); }
        .pokemon-card img { width: 100%; height: auto; border-radius: 5px; }
        .pokemon-info { margin-top: 10px; }
        .pokemon-info h3 { margin: 5px 0; font-size: 20px; }
        .pokemon-info p { margin: 5px 0; font-size: 14px; color: #555; }
        form { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    
    <h1 style="text-align: center;">Pokédex</h1>

    
    <form action="" method="post">
        <label for="nome">Nome: </label>
        <input type="text" id="nome" name="nome" required>
        <label for="tipo">Tipo: </label>
        <input type="text" id="tipo" name="tipo" required>
        <label for="regiao">Região: </label>
        <input type="text" id="regiao" name="regiao" required>
        <label for="imagem">Imagem (URL): </label>
        <input type="text" id="imagem" name="imagem" required>
        <input type="submit" value="Enviar">
    </form>

   
    <div class="pokedex">
        <?php
        if ($result->num_rows > 0) {
    
            while($row = $result->fetch_assoc()) {
                echo '<div class="pokemon-card">';
                echo '<img src="' . htmlspecialchars($row["imagem"]) . '" alt="Imagem do ' . htmlspecialchars($row["nome"]) . '">';
                echo '<div class="pokemon-info">';
                echo '<h3>' . htmlspecialchars($row["nome"]) . '</h3>';
                echo '<p>Tipo: ' . htmlspecialchars($row["tipo"]) . '</p>';
                echo '<p>Região: ' . htmlspecialchars($row["regiao"]) . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>Nenhum Pokémon encontrado.</p>";
        }
    
        $conn->close();
        ?>
    </div>
 
</body>
</html>