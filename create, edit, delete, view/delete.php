<?php

$file = $_GET['name'];

unlink($file);

echo "File Deleted! <a href='index.php'>Click here to continue</a>";

?>