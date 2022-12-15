<html>	
	<head>
		<?php
			include 'connection.php';
		?>
        <title>Inquilino</title>
        <meta charset="UTF-8">
        <link href="style2.css" rel="stylesheet">
	</head>
<body>
    <h1>Inquilino</h1></br>
    <form method="post" action="#">
        <fieldset id="cadastroInquilino">
        <p>CPF:</p><input type='text' name='CPF' required><br>
        <br>
        <p>Nome:</p><input type='text' name='nome' required><br>
        <br>
        <p>Data de nascimento:</p><input type='date' name='dataNascimento' required><br>
        <br>
        <p>Salario:</p><input type='number' name='salario' required><br>
        <br>
        <p>ID:</p><select name='id_imovel' value='id_imovel' required><br>
            <option hidden>Escolha uma opção</option>
                <?php
					$sql="SELECT id FROM imovel";
					$resultado=$conn->query($sql);
					$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
					foreach($tabela as $linha){
					    echo "<option value='".$linha['id']."'>". $linha['id']."</option>";
                    }
                ?>
                </select><br>

        <br><input type="submit" value="Salvar" name="salvar">
        </fieldset>
    </form>
    <?php
    if (isset($_POST['salvar'])){
		$CPF        =$_POST['CPF']; 
		$nome       =$_POST['nome'];
		$dataNascimento=$_POST['dataNascimento'];
        $salario=$_POST['salario'];
        $id_imovel=$_POST['id_imovel'];

        
        $sql="INSERT INTO inquilino (CPF,nome,dataNascimento,salario,id_imovel)
        VALUE(:CPF,:nome,:dataNascimento,:salario,:id_imovel)";
					
                    
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':CPF',$CPF,PDO::PARAM_STR);
        $stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
        $stmt->bindParam(':dataNascimento',$dataNascimento,PDO::PARAM_STR);
        $stmt->bindParam(':salario',$salario,PDO::PARAM_STR);
        $stmt->bindParam(':id_imovel',$id_imovel,PDO::PARAM_INT);
        
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