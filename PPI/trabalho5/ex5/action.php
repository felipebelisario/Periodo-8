<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 5 - PHP</title>
</head>
<body>
    <?php
        function carregaString($arquivo) {
            $arq = fopen($arquivo, "r");
            $string = fgets($arq);
            fclose($arq);
            return $string;
        }

        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $passwordFile = carregaString("../ex3-4/senhaHash.txt");
        $emailFile = carregaString("../ex3-4/email.txt");

        $samePassword = password_verify($password, $passwordFile);

        if($samePassword && $email == $emailFile ){
            header("Location: sucesso.html");
            exit();
        }else{
            header("Location: index.html");
            exit();
        }

    ?>
</body>
</html>