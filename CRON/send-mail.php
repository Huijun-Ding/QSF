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
    
    $fp1 = fopen('evaluation-besoin.mail.php','r');
    fread($fp1,filesize('evaluation-besoin.mail.php'));
    fclose($fp1);
    
    $fp2 = fopen('evaluation-talent.mail.php','r');
    fread($fp2,filesize('evaluation-talent.mail.php'));
    fclose($fp2);
    
    sleep($interval); // exécute après 1jour
}while(true);
echo ('Hors de la boucle, reconfigurer la cron');


function taskTable() {
        $model = M("TaskList");
        $status = 0;
        $conditions = array('status' => ':status');
        $result = $model->where($conditions)->bind(':status', $status)->select();
        if (empty($result)) exit('pas d\'email');          
        echo 'Commencer à envoyer :' . "\r\n";
        foreach ($result as $key => $value) {
            //envoyer les mails
            $result = send_email($value['email'], 'Activer les mails', "https://github.com/Huijun-Ding/QSF");
            //succès
            if ($result['error'] == 0) {
                //changer de status à 1
                $model->where(array('id' => $value['id']))->setField('status', 1);
            }
            sleep(10);
            //On peut ajouter d\'un etat d'échec, la valeur de status est 2
            //$model->where(array('id' => $value['id']))->setField('status', 2);
        }
        exit('Fin');
    }
    
    ?>

