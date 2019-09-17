<?php

session_start();

session_destroy();

echo "<center>";
echo "Você acabou de deslogar. Click <a href='index.php'>aqui</a> para logar de novo";
echo "</center>";