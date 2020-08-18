<?php
require_once 'Fonctions.php';

$mail = $_POST['adressemail'];
if (is_unique_login($session, $mail) == false) {       //si cette adresse mail existe
    
    //Génerer un mot de passe aléatoire
    $mdp = generate_password( $length = 8 );
    
    // masqué ce mot de passe
    $ResetPassword = password_hash($mdp,PASSWORD_DEFAULT);
    
    //insérer le mot de passe masqué dans le bdd
    $stmt = mysqli_prepare($session, "UPDATE utilisateurs SET MotDePasse = ? WHERE Email = '$mail'");   
    mysqli_stmt_bind_param($stmt, 's', $ResetPassword); 

    if (mysqli_stmt_execute($stmt) == true) {   
        // l'envoie du mail
            $destinataire = "$mail"; // adresse mail du destinataire
            $sujet = "[COUP DE MAIN, COUP DE POUCE] Nouveau mot de passe"; // sujet du mail
            $message = '
            <!DOCTYPE html>
            <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="x-apple-disable-message-reformatting">
            <meta name="format-detection" content="telephone=no">
            <title>Nouveau mot de passe</title>

            <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
            <!--##custom-font-resource##-->
            <!--[if gte mso 16]>
            <xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
            </xml>
            <![endif]-->
            <style>
            html,body,table,tbody,tr,td,div,p,ul,ol,li,h1,h2,h3,h4,h5,h6 {
            margin: 0;
            padding: 0;
            }

            body {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            }

            table {
            border-spacing: 0;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            }

            table td {
            border-collapse: collapse;
            }

            h1,h2,h3,h4,h5,h6 {
            font-family: Arial;
            }

            .ExternalClass {
            width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
            line-height: 100%;
            }

            /* Outermost container in Outlook.com */
            .ReadMsgBody {
            width: 100%;
            }

            img {
            -ms-interpolation-mode: bicubic;
            }

            </style>

            <style>
            a[x-apple-data-detectors=true]{
            color: inherit !important;
            text-decoration: inherit !important;
            }

            u + #body a {
            color: inherit;
            text-decoration: inherit !important;
            font-size: inherit;
            font-family: inherit;
            font-weight: inherit;
            line-height: inherit;
            }

            a, a:link, .no-detect-local a, .appleLinks a {
            color: inherit !important;
            text-decoration: inherit;
            }

            </style>

            <style>

            .width600 {
            width: 600px;
            max-width: 100%;
            }

            @media all and (max-width: 599px) {
            .width600 {
            width: 100% !important;
            }
            }

            @media screen and (min-width: 600px) {
            .hide-on-desktop {
            display: none;
            }
            }

            @media all and (max-width: 599px),
            only screen and (max-device-width: 599px) {
            .main-container {
            width: 100% !important;
            }

            .col {
            width: 100%;
            }

            .fluid-on-mobile { 
            width: 100% !important;
            height: auto !important; 
            text-align:center;
            }

            .fluid-on-mobile img {
            width: 100% !important;
            }

            .hide-on-mobile { 
            display:none !important; 
            width:0px !important;
            height:0px !important; 
            overflow:hidden; 
            }
            }

            </style>

            <!--[if gte mso 9]>
            <style>

            .col {
            width: 100% !important;
            }

            .width600 {
            width: 600px;
            }

            .width112 {
            width: 112px;
            height: auto;
            }
            .width144 {
            width: 144px;
            height: auto;
            }

            .hide-on-desktop {
            display: none;
            }

            .hide-on-desktop table {
            mso-hide: all;
            }

            .nounderline {text-decoration: none !important;}

            .mso-font-fix-arial { font-family: Arial, sans-serif;}
            .mso-font-fix-georgia { font-family: Georgia, sans-serif;}
            .mso-font-fix-tahoma { font-family: Tahoma, sans-serif;}
            .mso-font-fix-times_new_roman { font-family: \'Times New Roman\', sans-serif;}
            .mso-font-fix-trebuchet_ms { font-family: \'Trebuchet MS\', sans-serif;}
            .mso-font-fix-verdana { font-family: Verdana, sans-serif;}

            </style>
            <![endif]-->
            </head>
            <body id="body" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="font-family:Arial, sans-serif; font-size:0px;margin:0;padding:0;background-color:#f6f7f8;">

            <style>
            @media screen and (min-width: 600px) {
            .hide-on-desktop {
            display: none;
            }
            }

            @media all and (max-width: 599px) {
            .hide-on-mobile { 
            display:none !important; 
            width:0px !important;
            height:0px !important; 
            overflow:hidden; 
            }
            }
            </style>
            <div style="background-color:#f6f7f8">

            <table height="100%" width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
            <td valign="top" align="left">
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
            <td width="100%">

            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
            <td align="center" width="100%">
            <!--[if gte mso 9]><table width="600" cellpadding="0" cellspacing="0"><tr><td><![endif]-->
            <table class="width600 main-container" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:600px">
            <tr>
            <td width="100%">

            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>

            <td valign="top" style="padding:20px"><table cellpadding="0" cellspacing="0" border="0" width="100%" class="mcol">
            <tr>
            <td valign="top" style="padding:0;mso-cellspacing:0in;">
            <!--[if gte mso 9]><table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><![endif]-->
            <!--[if gte mso 9]><td valign="top" style="padding:0;width:280px;"><![endif]-->
            <table cellpadding="0" cellspacing="0" border="0" width="50%" class="col" align="left">
            <tr>
            <td valign="top" width="100%" style="padding:0;">

            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>

            <td valign="top" align="left"><!--[if gte mso 9]><table width="112" cellpadding="0" cellspacing="0"><tr><td><![endif]-->

            <table cellpadding="0" cellspacing="0" border="0" width="112" style="max-width:100%" class="img-wrap">
            <tr>

            <td valign="top" align="left"><img src="https://images.chamaileon.io/5ef1ca7a9729751f33562d79/5ef1ca7a97297557be562d83/1592904756946_logo.png" width="112" height="68" alt="" border="0" style="display:block;font-size:14px;max-width:100%;height:auto;" class="width112" />
            </td>
            </tr>
            </table>

            <!--[if gte mso 9]></td></tr></table><![endif]-->
            </td>
            </tr>
            </table>

            </td>
            </tr>
            </table>
            <!--[if gte mso 9]></td><![endif]--><!--[if gte mso 9]><td valign="top" style="padding:0;width:280px;"><![endif]-->
            <table cellpadding="0" cellspacing="0" border="0" width="50%" class="col" align="left">
            <tr>
            <td valign="top" width="100%" style="padding:0;">

            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>

            <td valign="top" style="padding-top:5px"><table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td width="100%" align="right"><table cellpadding="0" cellspacing="0" border="0"><tr><td><!--[if true]><table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td valign="top" style="padding:0;" width="24"><![endif]--><table align="left" cellpadding="0" cellspacing="0" border="0" style="width:24px"><tr><td align="center"><a href="https://www.facebook.com/" target="_blank"><img width="24" border="0" height="24" src="https://plugins.edmdesigner.com/mega-editor/3.0.54/img/Facebook/fb-5-colorful.png" /></a></td></tr></table><!--[if true]></td><td valign="top" style="padding:0;" width="10"><![endif]--><table align="left" width="10" height="10"
            border="0"><tr><td></td></tr></table><!--[if true]></td><td valign="top" style="padding:0;" width="24"><![endif]--><table align="left" cellpadding="0" cellspacing="0" border="0" style="width:24px"><tr><td align="center"><a href="https://www.instagram.com/" target="_blank"><img width="24" border="0" height="24" src="https://plugins.edmdesigner.com/mega-editor/3.0.54/img/Instagram/ig-5-colorful.png" /></a></td></tr></table><!--[if true]></td><td valign="top" style="padding:0;" width="10"><![endif]--><table align="left" width="10" height="10" border="0"><tr><td></td></tr></table><!--[if true]></td><td valign="top" style="padding:0;" width="24"><![endif]--><table align="left" cellpadding="0" cellspacing="0" border="0" style="width:24px"><tr><td align="center"><a
            href="https://www.twitter.com/" target="_blank"><img width="24" border="0" height="24" src="https://plugins.edmdesigner.com/mega-editor/3.0.54/img/Twitter/tw-5-colorful.png" /></a></td></tr></table><!--[if true]></td></tr></table><![endif]--></td></tr></table></td></tr></table>
            </td>
            </tr>
            </table>

            </td>
            </tr>
            </table>
            <!--[if gte mso 9]></td><![endif]-->
            <!--[if gte mso 9]></tr></table><![endif]-->
            </td>
            </tr>
            </table>
            </td>
            </tr>
            </table>

            </td>
            </tr>
            </table>
            <!--[if gte mso 9]></td></tr></table><![endif]-->
            </td>
            </tr>
            </table>

            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
            <td align="center" width="100%">
            <!--[if gte mso 9]><table width="600" cellpadding="0" cellspacing="0"><tr><td><![endif]-->
            <table class="width600 main-container" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:600px">
            <tr>
            <td width="100%">

            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>

            <td valign="top" style="padding-top:20px">
            <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#ffffff" style="background-color:#ffffff">
            <tr>

            <td valign="top" style="padding:30px">
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>

            <td valign="top" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px"><div style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:30px;color:#9ab0e0;line-height:37px;text-align:left"><p style="padding: 0; margin: 0;text-align: center;"><strong>Votre nouveau mot de passe</strong></p><span class="mso-font-fix-arial">
            </span></div>
            </td>
            </tr>
            </table>

            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>

            <td valign="top" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px"><div style="font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;font-size:15px;color:#114b5f;line-height:25px;text-align:left"></span><p style="padding: 0; margin: 0;">&nbsp;</p><span class="mso-font-fix-tahoma">

            <p style="padding: 0; margin: 0;">Bonjour,</p><span class="mso-font-fix-tahoma">

            </span><p style="padding: 0; margin: 0;">&nbsp;</p><span class="mso-font-fix-tahoma">

            </span><p style="padding: 0; margin: 0;">Votre nouveau mot de passe est : '.$mdp.'</p><span class="mso-font-fix-tahoma">

            </span><p style="padding: 0; margin: 0;">&nbsp;</p><span class="mso-font-fix-tahoma">

            </span><p style="padding: 0; margin: 0;">Vous pouvez changer votre mot de passe dans Mon Profil. </p><span class="mso-font-fix-tahoma">  

            </span><p style="padding: 0; margin: 0;">&nbsp;</p><span class="mso-font-fix-tahoma">

            </span></div>
            </td>
            </tr>
            </table>

            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>

            <td valign="top" align="center" style="padding:20px">
            <!--[if !mso]><!-- -->
            <a href="" target="_blank" style="display:inline-block; text-decoration:none;" class="fluid-on-mobile">
            <span>

            <table cellpadding="0" cellspacing="0" border="0" bgcolor="#9ab0e0" style="border-radius:3px;border-collapse:separate !important;background-color:#9ab0e0" class="fluid-on-mobile">
            <tr>

            <td align="center" style="padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px">
            <span style="color:#ffffff !important;font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:18px;mso-line-height:exactly;line-height:25px;mso-text-raise:3px;">
            <font style="color:#ffffff;" class="button">
            <span><a href="https://qualif-qsf.cpam31.fr/Accueil.php">Se connecter</a></span>
            </font>
            </span>
            </td>
            </tr>
            </table>

            </span>
            </a>
            <!--<![endif]-->
            <div style="display:none; mso-hide: none;">

            <table cellpadding="0" cellspacing="0" border="0" bgcolor="#9ab0e0" style="border-radius:3px;border-collapse:separate !important;background-color:#9ab0e0" class="fluid-on-mobile">
            <tr>

            <td align="center" style="padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px">
            <a href="" target="_blank" style="color:#ffffff !important;font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:18px;mso-line-height:exactly;line-height:25px;mso-text-raise:3px;text-decoration:none;text-align:center;">

            <span style="color:#ffffff !important;font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:18px;mso-line-height:exactly;line-height:25px;mso-text-raise:3px;">
            <font style="color:#ffffff;" class="button">
            <span><a href="https://qualif-qsf.cpam31.fr/Accueil.php">Se connecter</a></span>
            </font>
            </span>
            </a>
            </td>
            </tr>
            </table>

            </div>
            </td>
            </tr>
            </table>

            </td>
            </tr>
            </table>

            </td>
            </tr>
            </table>

            </td>
            </tr>
            </table>
            <!--[if gte mso 9]></td></tr></table><![endif]-->
            </td>
            </tr>
            </table>

            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
            <td align="center" width="100%">
            <!--[if gte mso 9]><table width="600" cellpadding="0" cellspacing="0"><tr><td><![endif]-->
            <table class="width600 main-container" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:600px">
            <tr>
            <td width="100%">

            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>

            <td valign="top" style="padding:30px">
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>

            <td valign="top" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px"><div style="font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:13px;color:#979797;line-height:20px;text-align:left"><a href="https://qualif-qsf.cpam31.fr/contact.html.php"><p style="padding: 0; margin: 0;text-align: center;">Contact</p></a><span class="mso-font-fix-arial">

            </span><p style="padding: 0; margin: 0;text-align: center;">Copyright &copy;&nbsp;CPAM Haute-Garonne, 2020. All rights reserved.</p><span class="mso-font-fix-arial">
            </span></div>
            </td>
            </tr>
            </table>

            </td>
            </tr>
            </table>

            </td>
            </tr>
            </table>
            <!--[if gte mso 9]></td></tr></table><![endif]-->
            </td>
            </tr>
            </table>

            </td>
            </tr>
            </table>
            </td>
            </tr>
            </table>
            </div>
            </body>
            </html>'; // message qui dira que le destinataire a bien lu votre mail
            // maintenant, l'en-tête du mail
             // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';
     // En-têtes additionnels
     $headers[] = 'From: COUP DE MAIN, COUP DE POUCE<admincmcp@assurance-maladie.fr>';

     mail ($destinataire, $sujet, $message, implode("\r\n", $headers)); // on envois le mail  
 
        ?>
        <script type="text/javascript">
            alert("Nous allons vous envoyer votre nouveau mot de passe par mail, merci de consulter vos emails . ");
            document.location.href = window.history.go(-2);
        </script>
        <?php          
    } else {
        ?>
        <script type="text/javascript">
            alert("Désolé, veuillez réessayer");
            document.location.href = window.history.go(-2);
        </script>    
        <?php
    }    
      
} else {                                                //si cette adresse mail existe
    ?>
    <script type="text/javascript">
        alert("Cette adresse mail n'existe pas, veuillez réessayer !");
        document.location.href = window.history.go(-2);
    </script>
    <?php     
}

?>