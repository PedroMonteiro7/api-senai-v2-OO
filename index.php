<?php

    require('./Connection.php');
    require('./model/ModelPessoa.php');

    $conn = new Connection();
    $modelPessoa = new ModelPessoa($conn->returnConnection());

    $dados = $modelPessoa->findAll();

    echo '<pre>';
    print_r($dados);
    echo '</pre>';
