<?php

$host = 'localhost';
$usuario='root';
$senha='';
$banco='bd-login';

$conexao = mysqli_connect($host,$usuario,$senha,$banco) or die ("Conexão Negada!");