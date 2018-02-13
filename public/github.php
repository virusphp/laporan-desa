<?php 
$testing = shell_exec("cd ../ && ls -la");
$gitpull = shell_exec("cd ../ && git pull origin master 2>&1");
echo "<pre>$testing</pre>";
echo "<pre>$gitpull</pre>";
