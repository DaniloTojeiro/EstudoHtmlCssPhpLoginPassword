<?php

   $nome = $_POST['nomeCliente'];
   $sobrenome = $_POST['sobrenomeCliente'];
   $sexo = $_POST['sexo'];
   $cpf = $_POST['cpf'];
   $tipo = $_POST['tipo'];
   
   $strcon = mysqli_connect('localhost', 'joao', '123', 'banco_teste') or die ('Erro ao conectar com o servidor MySQL');
   
   $sql = "INSERT INTO cadastro (nomeCliente, sobrenomeCliente, sexo, tipo, cpf) VALUES ";
   $sql .= "('$nome', '$sobrenome', '$sexo', '$tipo', '$cpf')";
   
   mysqli_query($strcon, $sql) or die ("Erro ao tentar cadastrar registro");
   mysqli_close($strcon);
   
   echo "Cadastro realizado com sucesso!";
   
?>
