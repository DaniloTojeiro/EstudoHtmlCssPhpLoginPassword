<?php

   // Definindo o host, vulgo servidor onde estará a aplicação
   define('HOST', 'localhost');
   define('USER', 'root');
   define('PASS', '');
   define('BASE', 'banco_teste');

   $conn = new mysqli(HOST, USER, PASS, BASE);

?>