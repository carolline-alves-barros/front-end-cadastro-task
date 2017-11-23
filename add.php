<html>
<head>
    <title>Add</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$prioridade = $_POST['prioridade'];
	$usuario = $_POST['usuario'];
   
        
    // checking empty fields
    if(empty($nome) || empty($descricao) || empty($usuario)) {                
        if(empty($nome)) {
            echo "<font color='red'>Nome vazio</font><br/>";
        }
        
        if(empty($descricao)) {
            echo "<font color='red'>descricao vazio</font><br/>";
        }
        
        if(empty($usuario)) {
            echo "<font color='red'>usuario vazio</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO users(nome,descricao,prioridade,usuario) VALUES('$nome','$descricao','$prioridade','$usuario')");
        
        //display success message
        echo "<font color='green'>Os dados foram cadastrados com sucesso";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>