<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Exercicio 1 - PHP</title>

    <style type="text/css">
        body {
            font-size: 30px;
        }
    </style>
</head>
<body>
    <?php

        $cep = $_POST["cep"];
        $logradouro = $_POST["logradouro"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];

        $cep = htmlspecialchars($cep);
        $logradouro = htmlspecialchars($logradouro);
        $bairro = htmlspecialchars($bairro);
        $cidade = htmlspecialchars($cidade);
        $estado = htmlspecialchars($estado);

        echo <<<HTML
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    $cep
                </div>
                <div class="col-sm">
                    $logradouro
                </div>
                <div class="col-sm">
                    $bairro
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    $cidade
                </div>
                <div class="col-sm">
                    $estado
                </div>
            </div>
        </div>    
        HTML;
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>