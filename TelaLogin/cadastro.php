<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro2.css">
    <title>Tela Cadastro</title>
</head>
<body>
    <section>
        <div class="bolota-1"></div>
        <div class="bolota-2"></div>
        <div class="bolota-3"></div>
        <div class="box-principal">
            <div class="area-div">
                <div class="area-img2"></div>
            </div>
            <div class="area-form2">
                
                <form action="" method="post">
                    <div class="area-h1">
                        <h1>Cadastro</h1>
                    </div>
                    <label>Nome</label><br>
                    <input type="text" name="nome" id="" placeholder="Nome Completo"><br><br>

                    <label>Email</label><br>
                    <input type="email" name="email" id="" placeholder="Digite o Email"><br><br>

                    <label>Telefone</label><br>
                    <input type="tel" name="telefone" id="" placeholder="Telefone Completo"><br><br>

                    <label>Senha</label><br>
                    <input type="password" name="senha" id="" placeholder="Digite sua Senha"><br><br>

                    <label>Confirmar Senha</label><br>
                    <input type="password" name="confSenha" id="" placeholder="Confirme a sua Senha"><br><br>

                    <button class="b3">Cadastrar</button>
                    <p class="p">Já Possui uma conta?<a href="login.php">Logar</a></p>
                </form>
            </div>
        </div>
    </section>
    
    <?php
        require_once 'usuario.php';

        
        $usuario = new Usuario();  


        if (isset($_POST['nome'])) 
        {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
            $confSenha = addslashes($_POST['confSenha']);

            if(!empty($nome) && !empty($email) && !empty($telefone) && !empty($senha) && !empty($confSenha)) 
            {

                $usuario->conectar("cadastrousuarioturma33", "localhost", "root", "");

                if ($usuario->msgErro == "") 
                {  
                    if ($senha == $confSenha) 
                    {  
                        if ($usuario->cadastrar($nome, $telefone, $email, $senha)) 
                        {
                            
                            ?>
                            <div class="msg-sucesso">
                                <p>Cadastro realizado com sucesso!</p>
                                <p>Clique <a href="login.php">aqui</a> para fazer login.</p>
                            </div>
                            <?php
                        } else 
                        {
                            
                            ?>
                            <div class="msg-erro">
                                <p>Erro: Email já cadastrado.</p>
                            </div>
                            <?php
                        }
                    } 
                    else 
                    {
                        
                        ?>
                        <div class="msg-erro">
                            <p>Senha e Confirmar Senha não conferem.</p>
                        </div>
                        <?php
                    }
                } 
                else 
                {
                    
                    ?>
                    <div class="msg-erro">
                        <p>Erro: <?php echo $usuario->msgErro; ?></p>
                    </div>
                    <?php
                }
            } 
            else 
            {
                
                ?>
                <div class="msg-erro">
                    <p>Por favor, preencha todos os campos.</p>
                </div>
                <?php
            }
        }
    ?>

</body>
</html>
