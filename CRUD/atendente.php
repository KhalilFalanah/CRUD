<html>
    <head>
        <?php
            include 'connection.php';
        ?>
        <title>Atende</title>
        <meta charset="UTF-8">
        <link href="style2.css" rel="stylesheet">
    </head>
<body>
    <h1>Atende</h1></br>
    <form method="post" action="#">
        <fieldset id="cadastroAtendente">
            <p>ID:</p><input type='number' name='id' required><br>
            <br>
            <p>Data:</p><input type='date' name='dataAtendimento'  required><br>
            <br>
            <p>CPF Corretor:</p><select name='CPF_co' value='CPF_co' required><br>
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
                     <br>
            <p>CPF Inquilino:</p><select name='CPF_inq' value='CPF_inq' required><br>
                <option hidden>Escolha uma opção</option>
                    <?php
					    $sql="SELECT CPF FROM inquilino";
						$resultado=$conn->query($sql);
						$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
						foreach($tabela as $linha){
							echo "<option value='".$linha['CPF']."'>". $linha['CPF']."</option>";
						}
					?>
            </select><br>
                    <br><input type="submit" value="Salvar" name="salvar">
        </fieldset>   
    </form>
<?php
    if (isset($_POST['salvar'])){
        $id           =$_POST['id'];
        $dataAtendimento=$_POST['dataAtendimento'];
        $CPF_co     =$_POST['CPF_co'];
		$CPF_inq        =$_POST['CPF_inq']; 
		
        $sql="INSERT INTO atender (id,dataAtendimento,CPF_co,CPF_inq)
        VALUE(:id,:dataAtendimento,:CPF_co,:CPF_inq)";
					         
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_STR);
        $stmt->bindParam(':dataAtendimento',$dataAtendimento,PDO::PARAM_STR);
        $stmt->bindParam(':CPF_co',$CPF_co,PDO::PARAM_STR);
        $stmt->bindParam(':CPF_inq',$CPF_inq,PDO::PARAM_STR);
        
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