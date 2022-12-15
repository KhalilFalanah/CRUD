<html>
	<head>
		<?php
	    	include 'connection.php';
		?>
    	<title>Corretor</title>
    	<meta charset="UTF-8">
    	<link href="style2.css" rel="stylesheet">
	</head>
<body>
    <h1>Corretor</h1></br>
    <form method="post" action="#">
        <fieldset id="cadastroCorretor">
            <p>CPF:</p><input type='number' name='CPF' required><br>
            <br>
            <p>Nome:</p><input type='text' name='nome' required><br>
            <br>
            <p>Data de nascimento:</p><input type='date' name='dataNascimento' required><br>
            <br>
            <input type="submit" value="Salvar" name="salvar">
        </fieldset><br>    
    </form>
<?php
    if (isset($_POST['salvar'])){
		$CPF        =$_POST['CPF']; 
		$nome       =$_POST['nome'];
		$dataNascimento=$_POST['dataNascimento'];

        $sql="INSERT INTO corretor (CPF,nome,dataNascimento)
        VALUE(:CPF,:nome,:dataNascimento)";
					            
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':CPF',$CPF,PDO::PARAM_STR);
        $stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
        $stmt->bindParam(':dataNascimento',$dataNascimento,PDO::PARAM_STR);
        
        $resultado=$stmt->execute();
        if(!$resultado){
            var_dump($stmt->errorInfo());
            exit;
        }else{
            echo $stmt->rowCount()." Linha inserida";
        } }
?>
    </body>
</html>