<?php 
    require_once 'usuario.php';
    $usuario = new Usuario();
    $usuario->conectar("cadastrousuarioturma33","localhost","root", "");
    $dados = $usuario->listarUsuarios();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ListarUsuarios.css">
   
    <title>Listar Dados</title>
</head>
<body>
    <section>
        <div class="conteiner">
        <h2>Listar Usuarios</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <?php 
                    if(!empty($dados))
                    {
                        foreach ($dados as $pessoa):
                ?>
                    <tr>
                        <td><?php echo $pessoa['nome'];?></td>
                        <td><?php echo $pessoa['email'];?></td>
                        <td><?php echo $pessoa['telefone'];?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $pessoa['id_usuario']; ?>"><button>Editar</button></a>
                        </td>
                        <td>
                            <a href="delete.php?id=<?php echo $pessoa['id_usuario']; ?>"><button class="excluir">Excluir</button></a>
                        </td>

                        
                    </tr>
                <?php endforeach;
                    }
                    else
                    {
                        echo "Nenhum usuário cadastrado";
                    }
                ?>
            </table>
        </div>          
    </section>    
</body>
</html>