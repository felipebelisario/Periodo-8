<?php

    require "../database/conexaoMysql.php";
    $pdo = mysqlConnect();

    $email = $password = "";

    if (isset($_POST["email"])) $email = $_POST["email"];
    if (isset($_POST["password"])) $password = $_POST["password"];

    $hashsenha = password_hash($password, PASSWORD_DEFAULT);

    try {

    $sql = <<<SQL
    -- Repare que a coluna Id foi omitida por ser auto_increment
    INSERT INTO ex3_usuario (email, hash_senha)
    VALUES (?, ?)
    SQL;

    // Neste caso utilize prepared statements para prevenir
    // ataques do tipo SQL Injection, pois precisamos
    // cadastrar dados fornecidos pelo usuário 
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $email, $hashsenha
    ]);

    header("location: index.html");
    exit();
    } 
    catch (Exception $e) {  
    //error_log($e->getMessage(), 3, 'log.php');
    if ($e->errorInfo[1] === 1062)
        exit('Dados duplicados: ' . $e->getMessage());
    else
        exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    }

?>
