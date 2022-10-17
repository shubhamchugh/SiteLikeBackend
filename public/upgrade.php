<?php
$path =  shell_exec('cd .. && pwd');
$currentDomain = $_SERVER['SERVER_NAME'];
$UserName =  trim(shell_exec('whoami'));

$ownership_fix_command = 'sudo chown -R '.$UserName.':'.$UserName.' '.$path;
$file_permissions_command = 'sudo chmod 755 -R '.$path;

print_r(shell_exec($ownership_fix_command));
print_r(shell_exec($file_permissions_command));


$git_permissions = 'git config --global --add safe.directory '.$path;

echo "<pre>";
echo "<strong>WebApp Path:</strong> $path<br>";
echo "<strong>Domain Url:</strong> $currentDomain <br>";

echo shell_exec('cd .. && sudo chmod -R o+rw bootstrap/cache');
echo shell_exec('cd .. && sudo chmod -R o+rw storage');
echo shell_exec('cd .. && sudo chmod -R 777 storage');
echo shell_exec('cd .. && sudo chmod -R 777 bootstrap/cache');
echo shell_exec('cd .. && sudo chmod -R 777 public');
echo shell_exec('cd .. && sudo chmod -R o+rw public');


echo "<h2>Git Update Output</h2>";
echo $git_permissions;
echo shell_exec($git_permissions);

echo shell_exec('cd .. && git status');
echo shell_exec('cd .. && git remote set-url origin git@github.com:shubhamchugh/SiteLikeBackend.git');
echo shell_exec('cd .. && git reset --hard && git clean -d -f && git pull');

echo "<h2>Composer self update</h2>";
echo shell_exec('cd .. && composer self-update');

echo "<h2>Migration Details</h2>";
echo shell_exec('cd .. && php artisan migrate');

echo "<h2>Cache Clear Update Output</h2>";
$cache_clear = shell_exec('cd .. && php artisan cache:clear');
$cache_truncate = shell_exec('cd .. && php artisan cache:truncate');
$clear_compiled = shell_exec('cd .. && php artisan clear-compiled');
$view_clear = shell_exec('cd .. && php artisan view:clear');
$route_clear = shell_exec('cd .. && php artisan route:clear');
$optimize_clear = shell_exec('cd .. && php artisan optimize:clear');
$event_clear = shell_exec('cd .. && php artisan event:clear');
$config_clear = shell_exec('cd .. && php artisan config:clear');

echo $cache_clear;
echo $cache_truncate;
echo $clear_compiled;
echo $view_clear;
echo $route_clear;
echo $optimize_clear;
echo $event_clear;
echo $config_clear;


echo "<h2>Admin and MenuBar Data Reset</h2>";
echo shell_exec('cd .. && php artisan debugbar:clear');

echo shell_exec('cd .. && sudo chmod -R o+rw bootstrap/cache');
echo shell_exec('cd .. && sudo chmod -R o+rw storage');
echo shell_exec('cd .. && sudo chmod -R 777 storage');
echo shell_exec('cd .. && sudo chmod -R 777 bootstrap/cache');
echo shell_exec('cd .. && sudo chmod -R 777 public');
echo shell_exec('cd .. && sudo chmod -R o+rw public');


echo "<h2>Composer update</h2>";
echo shell_exec('cd .. && COMPOSER_MEMORY_LIMIT=-1 composer update');


print_r(shell_exec($ownership_fix_command));
print_r(shell_exec($file_permissions_command));


 echo "<h2>Cache Create Output</h2>";
 
 $view_cache = shell_exec('cd .. && php artisan view:cache');
 $route_cache = shell_exec('cd .. && php artisan route:cache');
 $event_cache = shell_exec('cd .. && php artisan event:cache');
 $config_cache = shell_exec('cd .. && php artisan config:cache');


 echo $view_cache;
 echo $route_cache;
 echo $event_cache;
 echo $config_cache;

 print_r(shell_exec($ownership_fix_command));
 print_r(shell_exec($file_permissions_command));


 echo '<strong>Last Reboot: </strong>' . shell_exec('who -b');
 die;