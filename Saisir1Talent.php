<?php 
require_once('Fonctions.php');

$TitreT = $_POST['titreT'];
$DescriptionT = $_POST['descriptionT'];
$TypeT = $_POST['typeT']; 
$DatePublicationT = date("yy/m/d");
$Categorie = $_POST['categorieT'];

$stmt = mysqli_prepare($session, "INSERT INTO talents(TitreT,DescriptionT,DatePublicationT,TypeT,CodeC) VALUES(?,?,?,?,?)");  //insérer un nouveau talet dans le table talents
mysqli_stmt_bind_param($stmt, 'ssssi', $TitreT, $DescriptionT, $DatePublicationT, $TypeT, $Categorie);

if (mysqli_stmt_execute($stmt) === true) {
        echo "Votre talent a bien été enregistré";
  
        
        //ajouter codeT et CodeU dans le table proposer
    $sql = "select CodeT from talents order by CodeT DESC limit 1";
    $result = mysqli_query ($session, $sql);
    if ($code = mysqli_fetch_array($result)) {   
        $codet = $code['CodeT'];
        $stmt2 = mysqli_prepare($session, "INSERT INTO proposer(CodeU,CodeT) VALUES(?,?)");   // insérer le code de l'utilisateur et le code de catégorie dans le table abonner
        mysqli_stmt_bind_param($stmt2, 'ii', $usercode, $codet);
        mysqli_stmt_execute($stmt2); 
    }  
        
        header("Location: MonProfil.php");
 
        $Email = mysqli_prepare($session, "select Email from utilisateurs where CodeU = $usercode");   
        mysqli_stmt_bind_param($Email, 'i', $usercode);
        mysqli_stmt_execute($Email); 
        
        $destinataire = "$Email"; // adresse mail du destinataire
        $sujet = "Enregistement de votre talent"; // sujet du mail
        $message = "Votre offre a bien été enregistrée et publiée. Vous recevrez une notification dès qu’une personne se sera positionnée sur votre proposition. Vous pourrez alors vous mettre en relation."; // message qui dira que le destinataire a bien lu votre mail
        // maintenant, l'en-tête du mail
        $header = "From: [Quai des savoir-faire]\r\n"; 
        $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
        $header .= "Disposition-Notification-To:l'email d'un administrateur"; // c'est ici que l'on ajoute la directive
        mail ($destinataire, $sujet, $message, $header); // on envois le mail 
        
      
} else {
        ?>

       <script>
           alert("Désolé, votre talent n'a pas été enregistré ! \nVeuillez saisir toutes les information correctement !");
           document.location.href = 'Creer1Talent.php';
        </script>
        
        <?php 
}

?>