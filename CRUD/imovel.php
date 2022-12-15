<html>
    <head>
        <?php
            include 'connection.php';
        ?>
        <title>Imovel</title>
        <meta charset="UTF-8">
        <link href="style2.css" rel="stylesheet">
    </head>
<body>
    <h1>Imóvel</h1></br>
        <form method="post" action="#">
            <fieldset id="cadastroImovel">
                <p>ID:</p><input type='text' name='id'><br>
                <br>
                <p>Cidade:</p><input type='text' name='cidade' required><br>
                <br>
                <p>Bairro:</p><input type='text' name='bairro' required><br>
                <br>
                <p>Rua:</p><input type='text' name='rua' required><br>
                <br>
                <p>Número:</p><input type='number' name='numero' required><br>
                <br>
                <p>Complemento:</p><input type='text' name='complemento'><br>
                <br>
                <p>CEP:</p><input type='text' name='CEP'><br>
                <br>
                <p>CPF do Proprietario:</p><select name='CPF_prop' value='CPF_prop' required><br>
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
        <br><input type="submit" value="Salvar" name="salvar"> 
        </fieldset>
        <br>
    </form>
        <?php
            if (isset($_POST['salvar'])){
                $id=$_POST['id'];
                $cidade=$_POST['cidade'];
                $bairro=$_POST['bairro'];
		        $rua=$_POST['rua']; 
		        $numero=$_POST['numero'];
		        $complemento=$_POST['complemento'];
                $CEP=$_POST['CEP'];
                $CPF_prop=$_POST['CPF_prop'];

        $sql="INSERT INTO imovel (id,cidade,bairro,rua,numero,complemento,CEP,CPF_prop)
        VALUE(:id,:cidade,:bairro,:rua,:numero,:complemento,:CEP,:CPF_prop)";					
                    
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_STR);
        $stmt->bindParam(':cidade',$cidade,PDO::PARAM_STR);
        $stmt->bindParam(':bairro',$bairro,PDO::PARAM_STR);
        $stmt->bindParam(':rua',$rua,PDO::PARAM_STR);
        $stmt->bindParam(':numero',$numero,PDO::PARAM_STR);
        $stmt->bindParam(':complemento',$complemento,PDO::PARAM_STR);
        $stmt->bindParam(':CEP',$CEP,PDO::PARAM_STR);
        $stmt->bindParam(':CPF_prop',$CPF_prop,PDO::PARAM_STR);
        
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