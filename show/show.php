<!DOCTYPE html>
<?php 
     include_once "../conf/default.inc.php";
     require_once "../conf/Conexao.php";
     $title = "Lista de Clientes";
     $id = isset($_GET['id']) ? $_GET['id'] : "1";
     $cor = "vermelho";
     $teste = "";

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" href="../css/estilo.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<a href="../salto/salto.php"><button>Listar</button></a>
<a href="../salto/cad.php"><button>Novo</button></a>
</br></br>

<table border="1">
<tr>
        <th>ID</th>
        <th>Nota 1</th> 
        <th>Nota 2</th>
        <th>Nota 3</th>
        <th>Nota 4</th>
        <th>Nota 5</th>
        <th>Idade</th>
        <th>Média das notas</th>
        <th>Menor nota</th>
        <th>Maior nota</th>
        <th>Menor nota válida</th>
        <th>Maior nota válida</th>
</tr>

<?php
   
    $sql = "SELECT * FROM salto WHERE id = $id";
   
    $pdo = Conexao::getInstance(); 
    $consulta = $pdo->query($sql);
    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)){

       $idade =  date("Y")- date("Y",strtotime($linha['nascimento']));
        if($idade < 18){
        $cor = "verde";
       } elseif ($idade > 50){
           $cor = "azul";
       }else{
           $cor = "";
       }

       $notas = array_unique(array($linha['nota1'], $linha['nota2'], $linha['nota3'], $linha['nota4'], $linha['nota5']));

        $NotasMaiores = max($notas);

        $NotasMenores = min($notas);

        $notasN = array_diff($notas, [$NotasMaiores, $NotasMenores]);

        $Menornotavalida = min($notasN);
        $Maiornotavalida = max($notasN);

        //var_dump($notasN);
        

        $média = array_sum(array_unique($notasN)) / count(array_unique($notasN)) ;

       



       ?>
       <tr>
           <td><?php echo $linha['id'];?></td>
           <td><?php echo $linha['nota1'];?></td>
           <td><?php echo $linha['nota2'];?></td>
           <td><?php echo $linha['nota3'];?></td>
           <td><?php echo $linha['nota4'];?></td>
           <td><?php echo $linha['nota5'];?></td>

           <td class="<?php echo $cor;?>"><?php echo $idade;?></td>

           <td><?php echo number_format($média, 2, '.' , ',');?></td>

           <td><?php echo $NotasMenores;?></td>

           <td><?php echo $NotasMaiores;?></td>

           <td class="vermelho"><?php echo $Menornotavalida;?></td>
           
           <td class="azul2"><?php echo $Maiornotavalida;?></td>
       </tr>
    <?php } ?> 







</body>
</html>