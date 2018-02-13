<?php 
$testing = shell_exec("cd ../ && ls -la");
shell_exec("cd ../ && git pull origin master &");
echo "<pre>$testing</pre>";
