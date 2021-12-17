<!DOCTYPE html>
<?php 
include_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";
$title = "Tabela saltos ";
$consulta = isset($_POST['consulta']) ? $_POST['consulta'] : "";
$tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : 2;


?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title   >
    <link rel="stylesheet" href="../css/estilo.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script>
        function excluirRegistro(url) {
            if (confirm("Confirmar Exclusão?"))
                location.href = url; 
        }
    </script>
</head>
<body>
    <br>
    <a href="cad.php"><button>Novo</button></a>
    <br><br>
    <form method="post">
    <input type="text" name="consulta" id="consulta" value="<?php echo $consulta; ?>">
    <input type="submit" value="Pesquisar">
    <br><br>
        <legend>Método de pesquisa: </legend>
        <input type="radio" name="tipo" value="1" <?php if ($tipo == 1){echo 'checked';}?>>
        <label for="id">Pesquisa por id</label>
        <input type="radio" name="tipo" value="2" <?php if ($tipo == 2){echo 'checked';}?>>
        <label for="nome">Pesquisa por nomes</label>
    </form>
    
    <br>
    <table border="1">
       <tr><th>ID</th>
        <th>Nome</th> 
        <th>Data de nascimento</th>
        <th>Detalhes</th>
        <th>Editar</th>
        <th>Excluir</th>
        </tr>
    <?php 
    $pdo = Conexao::getInstance();

    if ($tipo == 1 ) 
    $consulta = $pdo->query("SELECT * FROM salto 
                             WHERE id 
                             <= $consulta");

    else
    $consulta = $pdo->query("SELECT * FROM salto
                            WHERE nome 
                            LIKE '$consulta%'");


    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   

        ?>
        <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo date("d/m/Y",strtotime($linha['nascimento']));?></td>
            <td><a href='../show/show.php?id=<?php echo $linha['id'];?>'> <img class="icon" src="../img/show.png" alt=""> </a></td>
            <td><a href='cad.php?acao=editar&id=<?php echo $linha['id'];?>'><img class="icon" src="../img/edit.png" alt=""></a></td>
            <td><a href="javascript:excluirRegistro('acao.php?acao=excluir&id=<?php echo $linha['id'];?>')"><img class="icon" src="../img/delete.png" alt=""></a></td>
        </tr>
    <?php } ?>       
    </table>
    
</body>
</html>
