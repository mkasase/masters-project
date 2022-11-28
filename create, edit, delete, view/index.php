<html>

<form action="create_file.php" method="POST">
	File Name: <input type="text" name="name"><p>
    <input type="submit" value="Create File">
</form>
<p>
<h2>Files</h2>

</html>

<?php

$full_path = ".";

$dir = @opendir($full_path) or die ("Unable to open directory");

while($file = readdir($dir))
{
	if($file == "." || $file == ".." || $file == "index.php" || $file == "create_file.php" || $file == "edit_file.php" || $file == "edit.php" || $file == "delete.php")
	
	continue;
	
	echo "<a href='$file'>$file</a> ..... <a href='edit.php?name=$file'>Edit</a> ..... <a href='delete.php?name=$file'>Delete</a><br>";
}

closedir($dir);

?>