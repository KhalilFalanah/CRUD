<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border=1>
	<p>Proprietario</p>
<tr>
	<th>CPF</th><th>Nome</th><th>Data Nascimento</th>
	<th>Alterar</th>
</tr>
	<?php
    include 'connection.php';
		$sql="select CPF,nome,dataNascimento from proprietario";
		$resultado=$conn->query($sql);
		$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($tabela as $linha){
			echo "<tr>";
			foreach($linha as $coluna){
				echo "<td>".$coluna."</td>";
			}
			echo "<td>";
			echo "<form action='#' method='post'>";
			echo "<input hidden type='text' name='cpf' value=".$linha['CPF'].">";
			echo "<input type='submit' name='alterar' value='Alterar'>";
			echo "</form>";
			echo "</td>";
			
		}
	
	?>	
    </table>
<?php
	if(isset($_POST['alterar'])){
		$cpf=$_POST['cpf'];
		$sql="select CPF,nome,dataNascimento 
			from proprietario where CPF='".$cpf."'";
		$resultado=$conn->query($sql);
		$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($tabela as $linha){
			echo "<form action='#' method='post'>";
			echo "<input type='text' name='nome' value=".$linha['nome'].">";
			echo "<input type='text' name='data' value=".$linha['dataNascimento'].">";
			echo "<input hidden type='text' name='cpf' value=".$linha['CPF'].">";
			echo "<input type='submit' name='confirmar' value='Confirmar'>";
			echo "</form>";
		}

		}
		
		if(isset($_POST['confirmar'])){
			$cpf=$_POST['cpf'];
			$nome=$_POST['nome'];
			$dataNascimento=$_POST['data'];
			$sql="update proprietario set nome=:nome,
			dataNascimento=:dataNascimento where CPF='".$cpf."'";
			$stmt=$conn->prepare($sql);
			$stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
			$stmt->bindParam(':dataNascimento',$dataNascimento,PDO::PARAM_STR);
			$resultado=$stmt->execute();
			if(!$resultado){
				var_dump($stmt->errorInfo());
			}
		}
?>
<br>
<br>
<table border=1>
	<p>Inquilino</p>
<tr>
	<th>CPF</th><th>Nome</th><th>Data Nascimento</th>
	<th>Salario</th><th>IdImovel</th><th>Alterar</th>
</tr>
	<?php
		$sql="select CPF,nome,dataNascimento,salario,id_imovel from inquilino";
		$resultado=$conn->query($sql);
		$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($tabela as $linha){
			echo "<tr>";
			foreach($linha as $coluna){
				echo "<td>".$coluna."</td>";
			}
			echo "<td>";
			echo "<form action='#' method='post'>";
			echo "<input hidden type='text' name='cpf' value=".$linha['CPF'].">";
			echo "<input type='submit' name='alterar' value='Alterar'>";
			echo "</form>";
			echo "</td>";
			
		}
	
	?>	
    </table>
<?php
	if(isset($_POST['alterar'])){
		$cpf=$_POST['cpf'];
		$sql="select CPF,nome,dataNascimento,salario,id_imovel 
			from inquilino where CPF='".$cpf."'";
		$resultado=$conn->query($sql);
		$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($tabela as $linha){
			echo "<form action='#' method='post'>";
			echo "<input type='text' name='nome' value=".$linha['nome'].">";
			echo "<input type='text' name='data' value=".$linha['dataNascimento'].">";
			echo "<input hidden type='text' name='cpf' value=".$linha['CPF'].">";
            echo "<input hidden type='text' name='salario' value=".$linha['salario'].">";
            echo "<input hidden type='text' name='id_imovel' value=".$linha['id_imovel'].">";
			echo "<input type='submit' name='confirmar' value='Confirmar'>";
			echo "</form>";
		}
		
		}
		
		
	
		if(isset($_POST['confirmar'])){
			$cpf=$_POST['cpf'];
			$nome=$_POST['nome'];
			$dataNascimento=$_POST['data'];
			$sql="update inquilino set nome=:nome,
			dataNascimento=:dataNascimento where CPF='".$cpf."'";
			$stmt=$conn->prepare($sql);
			$stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
			$stmt->bindParam(':dataNascimento',$dataNascimento,PDO::PARAM_STR);
			$resultado=$stmt->execute();
			if(!$resultado){
				var_dump($stmt->errorInfo());
			}else{
				header('Location inquilino.php');
			}
		}
?>
<br>
<br>
<table border=1>
	<p>Corretor</p>
<tr>
	<th>CPF</th><th>Nome</th><th>Data Nascimento</th>
	<th>Alterar</th>
</tr>
	<?php
		$sql="select CPF,nome,dataNascimento from corretor";
		$resultado=$conn->query($sql);
		$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($tabela as $linha){
			echo "<tr>";
			foreach($linha as $coluna){
				echo "<td>".$coluna."</td>";
			}
			echo "<td>";
			echo "<form action='#' method='post'>";
			echo "<input hidden type='text' name='cpf' value=".$linha['CPF'].">";
			echo "<input type='submit' name='alterar' value='Alterar'>";
			echo "</form>";
			echo "</td>";

			
		}
	
	?>	
    </table>
<?php
	if(isset($_POST['alterar'])){
		$cpf=$_POST['cpf'];
		$sql="select CPF,nome,dataNascimento
			from corretor where CPF='".$cpf."'";
		$resultado=$conn->query($sql);
		$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($tabela as $linha){
			echo "<form action='#' method='post'>";
			echo "<input type='text' name='nome' value=".$linha['nome'].">";
			echo "<input type='text' name='data' value=".$linha['dataNascimento'].">";
			echo "<input hidden type='text' name='cpf' value=".$linha['CPF'].">";
			echo "<input type='submit' name='confirmar' value='Confirmar'>";
			echo "</form>";
		}
		
		}
		
		
		if(isset($_POST['confirmar'])){
			$cpf=$_POST['cpf'];
			$nome=$_POST['nome'];
			$dataNascimento=$_POST['data'];
			$sql="update corretor set nome=:nome,
			dataNascimento=:dataNascimento where CPF='".$cpf."'";
			$stmt=$conn->prepare($sql);
			$stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
			$stmt->bindParam(':dataNascimento',$dataNascimento,PDO::PARAM_STR);
			$resultado=$stmt->execute();
			if(!$resultado){
				var_dump($stmt->errorInfo());
			}
		}
?>
</body>
</html>