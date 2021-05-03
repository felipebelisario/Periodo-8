<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 4 - PHP</title>
</head>
<body>
    <?php
        function carregaString($arquivo) {
            $arq = fopen($arquivo, "r");
            $string = fgets($arq);
            fclose($arq);
            return $string;
        }

        $email = carregaString("email.txt");
        $password = carregaString("senhaHash.txt");

        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);

        echo <<<HTML
        <h1>Email: $email</h1>
        <h1>Senha Hasheada: $password</h1>
        HTML;
    ?>
</body>
</html>