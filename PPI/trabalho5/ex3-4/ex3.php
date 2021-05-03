<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 3 - PHP</title>
</head>
<body>
    <?php
        function salvaString($string, $arquivo) {
            $arq = fopen($arquivo, "w");
            fwrite($arq, $string);
            fclose($arq);
        }

        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        salvaString($email, "email.txt");
        salvaString($passwordhash, "senhaHash.txt");

        echo <<<HTML
        <h1> Email e senha salvos com sucesso! </h1>
        HTML;
    ?>
</body>
</html>