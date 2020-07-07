<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
​
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
​    <link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>    
    <title>Plateforme</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery.js"></script>
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="Accueil.php">Plateforme</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="Accueil.php">Accueil <span class="sr-only">(current)</span> </a> 
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Besoin.php">Besoins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Talent.php">Talents</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AbonnerCategorie.php">Catégories</a>
          </li>  
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropleft">   
            <?php
            require_once 'Fonctions.php';
            
            if(isset($_SESSION['email'])){
                    echo('<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">');
                    echo $_SESSION['email'];       // quand l'utiliateur n'a pas croché le case Anonyme au moment de l'inscription, on va afficher son adresse mail
                    echo('</a>');
            } else {
                echo('<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">');
                echo "Visiteur";                   //Utilisateur qui n'a pas conncté
                echo('</a>');
            } 
            ?>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                if(isset($_SESSION['email'])){
                    echo ('<a class="dropdown-item" href="MonProfil.php">Mon profil</a>');
                    echo ('<a class="dropdown-item" href="MesCategories.php">Mes catégories</a>');
                    echo ('<a class="dropdown-item" href="Deconnecter.php" onclick="Deconnexion()">Déconnecter</a>');
                ?>
                    <script>
                        function Deconnexion() {
                            alert("Déconnexion réussite !");
                            }
                            
                         $('.navbar-nav mr-auto').find('a').each(function () {
                            if (this.href == document.location.href || document.location.href.search(this.href) >= 0) {
                                $(this).parent().addClass('active'); // this.className = 'active';
                            }
                        });
                    </script>
                <?php
                } else {
                    echo ('<a class="dropdown-item" href="Login.php">Se connecter</a>');
                    echo ('<a class="dropdown-item" href="Inscription.php">S\'inscrire</a>');
                }
                ?>
            </div>
          </li>
        </ul>
      </div>
    </nav>
<!--------------------------------------------------------------------------------------------------------------------------------------------->  
        <div class="jumbotron">
          <div class="container">
              <h1>Rédiger votre e-mail</h1>      
              <hr>
              <form action="besoinoui.fonction.php" method="POST">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Sujet</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Re: " disabled >
                    </div>
                </div>
                    
                <div class="form-group">
                    <label for="inputEmail4"><strong>Contenu du message</strong></label>
                    
                    <textarea name="contenu_besoin_oui">
                        <!DOCTYPE html>
                        <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

                        <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="x-apple-disable-message-reformatting">
                        <meta name="format-detection" content="telephone=no">
                        <title></title>

                        <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css">
                        <link href="https://fonts.googleapis.com/css?family=Open%20Sans" rel="stylesheet" type="text/css">
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
                        .width600 {
                        width: 600px;
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
                        .mso-font-fix-times_new_roman { font-family: 'Times New Roman', sans-serif;}
                        .mso-font-fix-trebuchet_ms { font-family: 'Trebuchet MS', sans-serif;}
                        .mso-font-fix-verdana { font-family: Verdana, sans-serif;}

                        </style>
                        <![endif]-->
                        </head>
                        <body id="body" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="font-family:Arial, sans-serif; font-size:0px;margin:0;padding:0;background-color:#fcfcfc;">
                        <span style="display:none;font-size:0px;line-height:0px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;">
                        </span>
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
                        <div style="background-color:#fcfcfc">

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

                        <td valign="top">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>

                        <td valign="top" align="center"><!--[if gte mso 9]><table width="112" cellpadding="0" cellspacing="0"><tr><td><![endif]-->

                        <table cellpadding="0" cellspacing="0" border="0" width="112" style="max-width:100%" class="img-wrap">
                        <tr>

                        <td valign="top" align="center"><img src="https://images.chamaileon.io/5ef1ca7a9729751f33562d79/5ef1ca7a97297557be562d83/1592904756946_logo.png" width="112" height="68" alt="" border="0" style="display:block;font-size:14px;max-width:100%;height:auto;" class="width112" />
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

                        <td valign="top">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>

                        <td valign="top" align="center"><!--[if gte mso 9]><table width="600" cellpadding="0" cellspacing="0"><tr><td><![endif]-->

                        <table cellpadding="0" cellspacing="0" border="0" width="600" style="max-width:100%" class="fluid-on-mobile img-wrap">
                        <tr>

                        <td valign="top" align="center" style="padding-top:25px"><img src="https://images.chamaileon.io/5a1d0008ce78e600144619cf/5eb95c8b4738491b78cfa043/1589209760147_email%20header.png" width="600" height="35" alt="" border="0" style="display:block;font-size:14px;max-width:100%;height:auto;" class="width600" />
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

                        <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#ffffff" style="background-color:#ffffff">
                        <tr>

                        <td valign="top" style="padding-top:35px;padding-bottom:35px">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#e6eae2" style="background-color:#e6eae2">
                        <tr>

                        <td valign="top" style="padding-top:17px;padding-right:21px;padding-bottom:15px;padding-left:21px"><div style="font-family:Bitter, Georgia, Times, Times New Roman, serif;font-size:30px;color:#4f772d;line-height:33px;text-align:left"><p style="padding: 0; margin: 0;"><span style="font-size:36px;">Quai des savoir-faire:</span></p><span class="mso-font-fix-georgia">

                        </span><p style="padding: 0; margin: 0;text-align: center;"><span style="font-size:24px;">Re: Demande de partage votre talent </span></p><span class="mso-font-fix-georgia">
                        </span></div>
                        </td>
                        </tr>
                        </table>

                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>

                        <td valign="top" style="padding-top:25px;padding-right:10px;padding-bottom:25px;padding-left:20px"><div style="font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:20px;color:#131313;line-height:25px;text-align:left"><p style="padding: 0; margin: 0;"><strong>Bonjour,</strong></p><span class="mso-font-fix-arial">
                        </span></div>
                        </td>
                        </tr>
                        </table>

                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>

                            <td valign="top" style="padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><div style="font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:16px;color:#131313;line-height:26px;text-align:left"><p style="padding: 0; margin: 0;"> ....<br><br><br><br><br></p><span class="mso-font-fix-arial">
                        </span></div>
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

                        <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#e6eae2" style="background-color:#e6eae2">
                        <tr>

                        <td valign="top" style="padding-top:35px;padding-bottom:35px">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>

                        <td valign="top" style="padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><div style="font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:15px;color:#131313;line-height:26px;text-align:left"><p style="padding: 0; margin: 0;text-align: center;">L&#39;&eacute;quipe Quai des savoir-faire reste toujours &agrave; votre disposition</p><span class="mso-font-fix-arial">
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

                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                        <td align="center" width="100%">
                        <!--[if gte mso 9]><table width="600" cellpadding="0" cellspacing="0"><tr><td><![endif]-->
                        <table class="width600 main-container" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:600px">
                        <tr>
                        <td width="100%">

                        <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#f3f3f3" style="background-color:#f3f3f3">
                        <tr>

                        <td valign="top" style="padding-top:15px;padding-bottom:15px">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>

                        <td valign="top" style="padding-top:10px;padding-bottom:10px;padding-left:10px"><table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td width="100%" align="center"><table cellpadding="0" cellspacing="0" border="0"><tr><td><!--[if true]><table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td valign="top" style="padding:0;" width="32"><![endif]--><table align="left" cellpadding="0" cellspacing="0" border="0" style="width:32px"><tr><td align="center"><a href="https://www.facebook.com/" target="_blank"><img width="32" border="0" height="32" src="https://plugins.edmdesigner.com/mega-editor/3.0.54/img/Facebook/fb-3-grey.png" /></a></td></tr></table><!--[if true]></td><td valign="top" style="padding:0;" width="11"><![endif]--><table align="left" width="11"
                        height="11" border="0"><tr><td></td></tr></table><!--[if true]></td><td valign="top" style="padding:0;" width="32"><![endif]--><table align="left" cellpadding="0" cellspacing="0" border="0" style="width:32px"><tr><td align="center"><a href="https://www.instagram.com/" target="_blank"><img width="32" border="0" height="32" src="https://plugins.edmdesigner.com/mega-editor/3.0.54/img/Instagram/ig-3-grey.png" /></a></td></tr></table><!--[if true]></td><td valign="top" style="padding:0;" width="11"><![endif]--><table align="left" width="11" height="11" border="0"><tr><td></td></tr></table><!--[if true]></td><td valign="top" style="padding:0;" width="32"><![endif]--><table align="left" cellpadding="0" cellspacing="0" border="0" style="width:32px"><tr><td align="center"><a
                        href="https://www.twitter.com/" target="_blank"><img width="32" border="0" height="32" src="https://plugins.edmdesigner.com/mega-editor/3.0.54/img/Twitter/tw-3-grey.png" /></a></td></tr></table><!--[if true]></td></tr></table><![endif]--></td></tr></table></td></tr></table>
                        </td>
                        </tr>
                        </table>

                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>

                        <td valign="top" style="padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><div style="font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:13px;color:#5c5b5b;line-height:21px;text-align:left"><p style="padding: 0; margin: 0;text-align: center;">Quai des savoir-faire</p><span class="mso-font-fix-arial">
                        </span></div>
                        </td>
                        </tr>
                        </table>

                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>

                            <td valign="top" style="padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><div style="font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:13px;color:#5c5b5b;line-height:21px;text-align:left"><p style="padding: 0; margin: 0;text-align: center;"><a href="contact.html.php">Contact</a><span class="mso-font-fix-arial">
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
                        </html>
                    </textarea>
                <script>
                    var editor1 = CKEDITOR.replace('contenu_besoin_oui', {
                        extraAllowedContent: 'div',
                        height: 460
                      });
                </script>
                           
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
                
          </div>
        </div>

        <footer>
          <p id="copyright"><em><small>copyright &#9400; Quai des savoir-faire, CPAM Haute-Garonne, 2020. All rights reserved.</small></em></p>
        </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>