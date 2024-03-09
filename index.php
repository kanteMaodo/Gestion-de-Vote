<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div id="nav">
         <div id="logo"> Mon logo</div>
         <div id="menu">
            <ul >
                <li><a href="Acceuil.html"> Acceuil</a></li>
                <li><a href="afficher.php">Resultat</a></li>
            </ul>
         </div>
    </div>

    <div id="tout">
        <div id="formleft">
             <form  method="post" id="formleft1">
                <h2 style="text-decoration: underline; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Creer un compte</h2>
                 <input  style="margin-bottom: 9px;" type="text" name="nompr" class="gauche" placeholder="Veuillez saisir le nom du president de bureau"required>
   <input style="margin-bottom: 9px;" type="text" name="prenompr"  class="gauche" placeholder="Veuillez saisir le prenom(s) du president de bureu"required>
   <input style="margin-bottom: 9px;" type="mail" name="mail"  class="gauche" placeholder="Veuillez saisir votre E-mail "required>
   <input style="margin-bottom: 9px;" type="password" name="mdp"  class="gauche" placeholder="Veuillez saisir votre E-mail "required>

   <input type="number" name="idbr" class="gauche" placeholder="Veuillez saisir l'ID du votre bureau de vote "required><br>
   <input style="margin-bottom: 9px;" type="text" name="region"  class="gauche" placeholder="Veuillez saisir la region de votre centre "required>
   <input style="margin-bottom: 9px;" type="text" name="depart"  class="gauche" placeholder="Veuillez saisir le departement de votre centre "required>
   <input style="margin-bottom: 9px;" type="text" name="ville"  class="gauche" placeholder="Veuillez saisir la ville de votre centre "required>

   <input type="submit" name="btn1" value="S'authentifier" class="gauchev" style="color: green;">
                <!-- <input id="btn1"  class="gauche1" name="btn1" type="submit" value="Creer un compte"> -->
             </form>
            
        </div>
        <div id="formright">
            <form action="" id="formright1" method="post">
                <h2  style="text-decoration: underline; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;" ><box-icon name='user'></box-icon> Se Connecter</h2>
                
                <input type="mail" name="mail2" id="mail2" placeholder="exemplemaill@gmail.com" class="droite"><box-icon name='user'></box-icon></input>
                <input type="password" name="mdp2" id="mdp2" placeholder="Veuillez saisir votre mot de passe" required  class="droite">
                <button id="btn2" class="droite1" name="btn2" type="submit">Se Connecter</button>
             </form>
        </div>
    </div>
    <div id="invi">
        <h4><a href="page.php">Accedez en tant qu'invite</a></h4>
    </div>
</body>
<script src="formulaire.js"></script>
</html>
<?php
//Creation dun compte pour un president de bureau de vote

if (isset($_POST['btn1'])){

    $nom=$_POST['nompr'];
    $prenom=$_POST['prenompr'];
    $mail=$_POST['mail'];
    $mdp=$_POST['mdp'];
    $region=$_POST['region'];
    $departement=$_POST['depart'];
    $ville=$_POST['ville'];
    $idbr=$_POST['idbr'];
    $dsn='mysql:host=localhost;dbname=examen';
$username='root';
$password='';
try
{
    $connexion = new PDO($dsn,$username,$password);
      echo"Connexion reussi a mysql avec PDO";
    $connexion -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
    echo"erreur de connexion: ".$e->getMessage();
}

$requete=$connexion->prepare("INSERT INTO centre(nompr,prenompr,mail,idbr,mdp,region,departements,ville) VALUES(?,?,?,?,?,?,?,?)");
        $requete->execute(array($nom,$prenom,$mail,$idbr,$mdp,$region,$departement,$ville));
}

//Connexion a la page de saisie des score 
if(isset($_POST['btn2'])){
    $mail=$_POST['mail2'];
    $mdp=$_POST['mdp2'];
    

    $dsn='mysql:host=localhost;dbname=examen';
    $username='root';
    $password='';
    try
    {
        $connexion = new PDO($dsn,$username,$password);
          echo"Connexion reussi a mysql avec PDO";
        $connexion -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    }
    catch(PDOException $e) {
        echo"erreur de connexion: ".$e->getMessage();
    }

    foreach($connexion->query("SELECT * FROM centre WHERE mail='$mail' AND mdp='$mdp'" ) as $ligne) {

        if($ligne['mail']==$mail && $ligne['mdp']==$mdp){

            header('location:scorecand.php');
            exit();
           
          
        }
        else{
            header('location:index.php');
            exit();
        }
        
       
        
       

        
       
    
    
    }
}

?>