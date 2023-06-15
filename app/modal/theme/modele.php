<?php

class Theme{


    public function __construct($page){ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>School</title>
</head>


<body class="page_conx">

    <?php require __DIR__.'/../../../office/'.$page.'.php' ?>
    
</body>

</html>

<?php

        
    }
}