<?php
//Méthode 1 : exécuter en ligne de commande, chaque jour à 8 heure
//0 8 * * *   lynx evaluation.mail.php
    
//Méthode 2 : exécuter en script PHP
ignore_user_abort(); //même si le client est fermé, le script peut toujours exécuter
set_time_limit(0); // no time limit
$interval=86400; // interval est 86400 seconds donc 1 jour
do{
    include('cron-config.php'); 
    if($cron_config['run']=="false") break; // si $cron_config['run'] est false, exécute echo "Hors de la boucle"
    $fp = fopen('evaluation.mail.php','r');
    fread($fp,filesize('evaluation.mail.php'));
    fclose($fp);
    sleep($interval); // exécute après 1jour
}while(true);
echo ('Hors de la boucle, regonfigurer la cron');

