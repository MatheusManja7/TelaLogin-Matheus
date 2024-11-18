<?php
    
    require_once 'usuario.php';

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $usuario = new Usuario();
        $usuario->conectar("cadastrousuarioturma33", "localhost", "root", "");

        $sqlSelect = "DELETE FROM usuario WHERE id_usuario = $id";

        $usuario->excluirUsuario($id);

        header('Location: areaRestrita.php');
    }
    else
    {
        echo "ID do usuário não fornecido!";
    }
?>