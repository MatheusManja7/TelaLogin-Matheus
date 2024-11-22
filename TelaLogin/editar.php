<?php

$host = 'localhost';
$nome = 'root';
$senha = '';
$dbname = 'cadastrousuarioturma33';

$pdo = new mysqli($host, $nome, $senha, $dbname);
if($pdo->connect_error)
{
    die("Falha na Conexão: " . $usuario->connect_error);
}

$id_usuario = isset($_GET['id']) ? $_GET['id'] : null;

$sql = "SELECT nome, email, telefone FROM usuario WHERE id_usuario = ?";
$stmt = $pdo->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$stmt->bind_result($nome, $email, $telefone);
$stmt->fetch();
$stmt->close();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE usuario SET nome = ?, email = ?, telefone = ? WHERE id_usuario = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bind_param("sssi", $nome, $email, $telefone, $id_usuario);

    if($stmt->execute())
    {
        echo "Dados Atualizados!";
    }
    else
    {
        echo "Erro Ao Atualizar os Dados!";
    }
    $stmt->close();
}
$pdo->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar2.css">
    <title>Document</title>
</head>
<body>
    <section>
    <a href="areaRestrita.php"><button class="voltar">Voltar</button></a>
        <div class="area-gggg">
            <div class="borda">
                <form action="" method="post">
                    <div class="area-h1">
                        <h1>Edição</h1>
                    </div>
                        <label>Nome</label><br>
                        <input type="text" name="nome" id="" placeholder="Nome Completo" value="<?php echo htmlspecialchars($nome); ?>"><br><br>
                    
                        <label>Email</label><br>
                        <input type="email" name="email" id="" placeholder="Digite o Email" value="<?php echo htmlspecialchars($email); ?>"><br><br>

                        <label>Telefone</label><br>
                        <input type="tel" name="telefone" id="" placeholder="Telefone Completo" value="<?php echo htmlspecialchars($telefone); ?>"><br><br>
                                
                        <button class="b3">Concluido</button>
                </form>
            </div>
           
        </div>
    </section>
    
</body>
</html>