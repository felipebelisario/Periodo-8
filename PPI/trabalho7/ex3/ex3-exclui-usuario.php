<?php
require "../database/conexaoMysql.php";
$pdo = mysqlConnect();

$email = "";
if (isset($_GET["email"]))
  $email = $_GET["email"];

try {

  $sql = <<<SQL
  DELETE FROM ex3_usuario
  WHERE email = ?
  LIMIT 1
  SQL;

  // Neste caso utilize prepared statements para prevenir
  // ataques do tipo SQL Injection, pois a declaração
  // SQL contem um parâmetro (cpf) vindo da URL
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$email]);

  header("location: ex3-mostra-usuarios.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha inesperada: ' . $e->getMessage());
}
