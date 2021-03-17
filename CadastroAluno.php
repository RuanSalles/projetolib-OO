<?php
require_once 'Cadastrar.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Lib - Aluno</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    

    <header class='container-fluid'>
    
    

    <div class="container" width='50'>
    <div class="container" > <p></p>
    <a href="index.php" class="btn"><h1>PROJETO LIB - ALUNO</h1></a>
    </div>
    </div>
    </header>
    <section class="container">
    <div class="container">
    <fieldset>
    <table>
    <th><a href="index.php" class="btn btn-success btn-lg" type="submit">Cadastrar Aluno</a></th>
    <th><a href="CadastrarProfessor.php" class="btn btn-dark btn-lg">Cadastrar Professor</a></th>
    <th><a href="CadastrarLivro.php" class="btn btn-info btn-lg">Cadastrar Livro</a></th>
    </table>
    <form method='POST' class="form-group"> 
   
    <br>
   
   Nome: <br>
    <input type="text" name="nome" class="form-control form-control-lg " placeholder="Digite seu nome" autofocus required><br>
    E-mail: <br>
    <input type="email" name="email" class="form-control form-control-lg" placeholder="Digite seu E-mail" required><br>
    Curso: <br>
    <input type="text" name="curso" class="form-control form-control-lg " required placeholder="Digite seu curso"><br>
    Senha: <br>
    <input type="password" name="senha" class="form-control form-control-lg " placeholder="Digite sua senha" ><br>
    <br>
    <button type="submit" class="btn btn-secondary btn-lg">Cadastrar</button>
    <button type="reset" class="btn btn-danger btn-lg">Cancelar</button>
    
    
    </form>
    </fieldset>
    </div>
    </section>
    <?php
require_once 'config.php';
if(isset($_POST['email']) && !empty($_POST['email'])) {
    $nome = addslashes($_POST['nome']) ;
    $email = addslashes($_POST['email']) ;
    $curso = addslashes($_POST['curso']) ;
    $senha = addslashes($_POST['senha']);

    
    $sql = $pdo->prepare('INSERT INTO aluno (nome, email, curso, senha) VALUES (:nome, :email, :curso, :senha) ');
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':curso', $curso);
    $sql->bindValue(':senha', md5($senha));
    $sql->execute();
    
    
header('Location: index.php');
    
}
?>
    
    <div class="container">

<table class="table">
    <th>Nome</th>
    <th>Curso</th>
    <th>E-mail</th>
    
        <?php

    $sql = $pdo->prepare("SELECT * FROM aluno");
    $sql->execute();

    if($sql->rowCount() > 0) {
        foreach ($sql->fetchAll() as $item) {
            ?>
            <tr>
            <td> <?php echo $item['nome']; ?> </td>
            <td> <?php echo $item['curso']; ?> </td>
            <td> <?php echo $item['email']; ?> </td>
            
            </tr>

            <?php
        }
    }

    ?>
    
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>