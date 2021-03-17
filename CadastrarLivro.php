<?php
require 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Lib - Livros</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<div class="container" width='50'>
    <div class="container" > <p></p>
    <a href="index.php" class="btn"><h1>PROJETO LIB - LIVRO</h1></a>
    </div>
    </div>
    </header>
    <section class="container">
    <div class="container">
    <fieldset>
    <table>
    <th><a href="CadastroAluno.php" class="btn btn-success btn-lg" type="submit">Cadastrar Aluno</a></th>
    <th><a href="CadastrarProfessor.php" class="btn btn-dark btn-lg">Cadastrar Professor</a></th>
    <th><a href="CadastrarLivro.php" class="btn btn-info btn-lg">Cadastrar Livro</a></th>
    </table>

    <br>
    <br>

    <form method="POST" class="form-group">
    Título:
    <input type="text" name="titulo" class="form-control form-control-lg"><br>
    Páginas:
    <input type="text" name="pagina" class="form-control form-control-lg"><br>
    Autor:
    <input type="text" name="autor" class="form-control form-control-lg"><br>
    Editora
    <input type="text" name="editora" class="form-control form-control-lg"><br>
    Categoria:
    <input type="text" name="categoria" class="form-control form-control-lg"><br>
    <input type="submit" value="Cadastrar" class="btn btn-secondary btn-lg">
    <input type="reset" value="Cancelar" class="btn btn-danger btn-lg">

    </form>

    <?php
        if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
            $titulo = addslashes($_POST['titulo']);
            $pagina = addslashes($_POST['pagina']);
            $autor = addslashes($_POST['autor']);
            $editora = addslashes($_POST['editora']);
            $categoria = addslashes($_POST['categoria']);

            $sql = $pdo->prepare('INSERT INTO acervo (titulo, paginas, autor, editora, categoria) VALUES (:titulo, :paginas, :autor, :editora, :categoria)');
            $sql->bindValue(':titulo', $titulo);
            $sql->bindValue(':paginas', $pagina);
            $sql->bindValue(':autor', $autor);
            $sql->bindValue(':editora', $editora);
            $sql->bindValue(':categoria', $categoria);
            $sql->execute();

            header('Location: index.php');    
        }

        
    ?>

    <hr>

    <table class="table">
    <th>Título</th>
    <th>Quant. Páginas</th>
    <th>Autor</th>
    <th>Editora</th>
    <th>Categoria</th>
    

        <?php

    $sql = $pdo->prepare("SELECT * FROM acervo");
    $sql->execute();

    if($sql->rowCount() > 0) {
        foreach ($sql->fetchAll() as $item) {
            ?>
            <tr>
            <td> <?php echo $item['titulo']; ?> </td>
            <td> <?php echo $item['paginas']; ?> </td>
            <td> <?php echo $item['autor']; ?> </td>
            <td> <?php echo $item['editora']; ?> </td>
            <td> <?php echo $item['categoria']; ?> </td>
            </tr>

            <?php
        }
    }

    ?>
    

    </table>
</body>
</html>