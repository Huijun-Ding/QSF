<?php 
$Titre = $_POST['type'].": ".$_POST['titre'];   // récupéré les valeurs selon la méthode POST
$Description = $_POST['description'];
$DateButoire = $_POST['datebutoire'];
$Type = $_POST['type'];   
$DatePublicationB = date("yy/m/d");
$Categorie = $_POST['categorie'];

require_once('Fonctions.php');

$stmt = mysqli_prepare($session, "INSERT INTO besoins(TitreB,DescriptionB,DateButoireB,DatePublicationB,TypeB,CodeC) VALUES(?,?,?,?,?,?)");  //insérer un nouveau besoin dans le table besoins
mysqli_stmt_bind_param($stmt, 'sssssi', $Titre, $Description, $DateButoire, $DatePublicationB, $Type, $Categorie);

if (mysqli_stmt_execute($stmt) === true) {
        echo "Votre besoin a bien été enregistré";
        header("Location: MonProfil.php");
} else {
    ?>
       <script>
           alert("Désolé, votre besoin n'a pas été enregistré ! \nVeuillez saisir toutes les information correctement ! \n(La date butoire d'un besoin doit être supérieure à aujourd'hui)");
           document.location.href = 'Creer1Besoin.php';
        </script>
        <?php 
        
}
//ajouter codeb et codeu dans le table saisir
    $sql = "select CodeB from besoins order by CodeB DESC limit 1";
    $result = mysqli_query ($session, $sql);
    if ($code = mysqli_fetch_array($result)) {   
        $codeb = $code['CodeB'];
        $stmt2 = mysqli_prepare($session, "INSERT INTO saisir(CodeU,CodeB) VALUES(?,?)");   // insérer le code de l'utilisateur et le code de catégorie dans le table abonner
        mysqli_stmt_bind_param($stmt2, 'ii', $usercode, $codeb);
        mysqli_stmt_execute($stmt2); 
    }  
?>