<?php `git pull`;  

$output = shell_exec('git pull');
echo "<pre>$output</pre>";
?>