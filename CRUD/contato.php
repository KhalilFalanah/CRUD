<html>
    <head>
        <?php
            include 'connection.php';
        ?>
        <title>Contato</title>
        <meta charset="UTF-8">
        <link href="style2.css" rel="stylesheet">
    </head>
<body>
    <h1>Contato</h1></br>
    <form method="post" action="#">
        <fieldset id="cadastroContato">
            <p>ID:</p><input type='text' name='id'><br>
            <br>
            <p>Data:</p><input type='date' name='dataContato' required><br>
            <br>
            <p>CPF Corretor:</p><select name='CPF_prop'  required><br>
                <option hidden>Escolha uma opção</option>
                    <?php
					    $sql="SELECT CPF FROM proprietario";
						$resultado=$conn->query($sql);
						$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
						foreach($tabela as $linha){
						    echo "<option value='".$linha['CPF']."'>". $linha['CPF']."</option>";
						}
				    ?>
            </select><br>
                     <br>
            <p>CPF Proprietário:</p><select name='CPF_co'  required><br>
                <option hidden>Escolha uma opção</option>
                    <?php
						$sql="SELECT CPF FROM corretor";
						$resultado=$conn->query($sql);
						$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
						foreach($tabela as $linha){
							echo "<option value='".$linha['CPF']."'>". $linha['CPF']."</option>";
						}
					?>
            </select><br>
            <br><input type="submit" value="Salvar" name="salvar">   
        </fieldset><br>
    </form>
<?php
    if (isset($_POST['salvar'])){
        $id           =$_POST['id'];
        $dataContato=$_POST['dataContato'];
        $CPF_prop     =$_POST['CPF_prop'];
		$CPF_co        =$_POST['CPF_co']; 
		        
        $sql="INSERT INTO contactar (id,dataContato,CPF_prop,CPF_co)
        VALUE(:id,:dataContato,:CPF_prop,:CPF_co)";
					             
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_STR);
        $stmt->bindParam(':dataContato',$dataContato,PDO::PARAM_STR);
        $stmt->bindParam(':CPF_prop',$CPF_prop,PDO::PARAM_STR);
        $stmt->bindParam(':CPF_co',$CPF_co,PDO::PARAM_STR);
        
        $resultado=$stmt->execute();
        if(!$resultado){
            var_dump($stmt->errorInfo());
            exit;
        }else{
            echo $stmt->rowCount()." Linha Inserida";
        } }
?>
    </body>
</html>