<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $nome=$_POST['nome'];
    $descricao=$_POST['descricao'];
    $prioridade=$_POST['prioridade']; 
	$usuario=$_POST['usuario']; 	
    
    // checking empty fields
    if(empty($nome) || empty($descricao) || empty($usuario)) {            
        if(empty($nome)) {
            echo "<font color='red'>Nome vazio</font><br/>";
        }
        
        if(empty($descricao)) {
            echo "<font color='red'>Descricao vazio</font><br/>";
        }
        
        if(empty($usuario)) {
            echo "<font color='red'>Usuario vazio</font><br/>";
        }        
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE users SET nome='$nome',descricao='$descricao',prioridade='$prioridade',usuario='$usuario' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
  
	$nome=$res['nome'];
    $descricao=$res['descricao'];
    $prioridade=$res['prioridade']; 
	$usuario=$res['usuario']; 
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nome</td>
                <td><input type="text" name="nome" value="<?php echo $nome;?>"></td>
            </tr>
            <tr> 
                <td>Descricao</td>
                <td><input type="text" name="descricao" value="<?php echo $descricao;?>"></td>
            </tr>
            <tr> 
                <td>Prioridade</td>
                <td><input type="text" name="prioridade" value="<?php echo $prioridade;?>"></td>
            </tr>
			<tr> 
                <td>Usuario</td>
                <td><input type="text" name="usuario" value="<?php echo $usuario;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>