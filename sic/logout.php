<?php
	session_start(); // Inicia a sessão
	session_unset(); // Destrói a sessão limpando todos os valores salvos
	session_destroy(); // Destrói a sessão limpando todos os valores salvos
	header("Location: index.php"); exit; // Redireciona o visitante
?>