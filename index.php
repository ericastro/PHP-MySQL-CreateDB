<?php 
	$link = new mysqli('localhost', 'root', '', '');
	$link->set_charset('utf8');

	if ($link)
	{
		echo "conexao ok";
	}
	else
	{
		die('Connect Error (' . mysqli_connecterrno() . ')' .
			mysqli_connect_error());
	}

	$nomeBanco = "meubanco";

	$query_create_schema = "CREATE SCHEMA IF NOT EXISTS $nomeBanco"
	or die ("Error in the consult .. " . $link->connection_error);
	$result_create_schema = $link->query($query_create_schema);

	if ( $link->query($query_create_schema) === TRUE )
	{
		echo "<p>criou banco de dados </p>";
	}
	else
	{
		echo "<p>nao criou banco de dados</p>";
	}

	mysqli_select_db($link , $nomeBanco);

	$query_create_table = "CREATE TABLE IF NOT EXISTS clients (
							id int AUTO_INCREMENT PRIMARY KEY,
							nome varchar(60) NOT NULL,
							email varchar(60) NOT NULL)"
	or die("Error in the create table ... " . $link->connect_error);
	$result_create_table = $link->query($query_create_table);

	if($result_create_table == TRUE)
	{
		echo "<p>criou a tabela</p>";
	}
	else
	{
		echo "<p>nao criou a tabela</p>";
	}

?>
