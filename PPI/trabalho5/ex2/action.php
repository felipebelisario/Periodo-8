<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Exercicio 2 - PHP</title>

    <style type="text/css">
        body {
            font-size: 30px;
        }
    </style>
</head>

<body>
    <?php
    $produtos = ['Produto 1','Produto 2','Produto 3','Produto 4','Produto 5','Produto 6','Produto 7','Produto 8','Produto 9','Produto 10'];
    $descricao = ['Descrição 1','Descrição 2','Descrição 3','Descrição 4','Descrição 5','Descrição 6','Descrição 7','Descrição 8','Descrição 9','Descrição 10'];

    $qde = $_GET["qde"];

    for($i = 0; $i < $qde; $i++){
        $rand = rand(0,9);
        $index = $i + 1;
        
        echo <<<HTML
        <div class="row">
            <div class="col-4">
                $index
            </div>
            <div class="col-4">
                $produtos[$rand]
            </div>
            <div class="col-4">
                $descricao[$rand]
            </div>
        </div>
        HTML;
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>