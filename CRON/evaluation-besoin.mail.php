<?php 
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