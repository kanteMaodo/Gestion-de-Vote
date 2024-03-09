


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Veuillez saisir les scores obtenue par candidats dans le Bureau</h3>
<div style="background-color:beige; display:flex;justify-content:center;align-items:center ;padding:10px; flex-direction:column;justify-content:space-around;height:50vh;margin-top:100px;margin-left:510px;margin-right:510px;border-radius:30px;">
    <form action="" method="post" style="padding: 10px;" >      <!-- <input type="text" name="id" placeholder="Veuillez saisir votre ID"> -->
        <input  style="display: flex;padding:10px;border-radius:10px;" type="text" value=""name="nom"placeholder="Veuillez saisir le nom du candidat " ><br>
        <input  style="display: flex;padding:10px;border-radius:10px" type="text" value=""name="prenom"placeholder="Veuillez saisir le prenom du candidat "><br>
        <input  style="display: flex;padding:10px;border-radius:10px" type="text" value=""name="parti"placeholder="Veuillez saisir le parti du candidat "><br>
        <input  style="display: flex;padding:10px;border-radius:10px" type="number" value=""name="nin"placeholder="Veuillez saisir le Numero d'identification national du candidat "><br>
        <input  style="display: flex;padding:10px;border-radius:10px" type="number" value=""name="score"placeholder="Veuillez saisir le score du candidat "><br>
       
        <input type="submit" value="Soumettre" name="btn3"syle="border-radius:10px;display: flex;padding:10px">
        <input type="submit" value="Consulter les resultats" name="btn4" style="border-radius:10px;display: flex;padding:10px;margin-top:10px ">




    </form>

    <form ></form>
    </div>
    
</body>
</html>

<?php 
$dsn='mysql:host=localhost;dbname=examen';
$username='root';
$password='';
try
{
    $connexion = new PDO($dsn,$username,$password);
    //  echo"Connexion reussi a mysql avec PDO";
    $connexion -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
    echo"erreur de connexion: ".$e->getMessage();
}
if(isset($_POST['btn3'])){



    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $parti=$_POST['parti'];
    $nin=$_POST['nin'];
    $score=$_POST['score'];

  
    $totalscore=0;
    foreach($connexion->query('SELECT * FROM candidats') as $ligne) {

        if($ligne['NIN']=$nin){
            $newscore=0;
            $newscore=($ligne['score']+$score);
            //mis a jours du nouveau NIN (numero d'identification national)
            $requete=$connexion->prepare("UPDATE candidats SET score=$newscore WHERE NIN=$nin");

 
           $requete->execute(array($newscore));
          
        }
        
       
         $totalscore=$totalscore+$ligne['score'];
    
    
    }
    echo($totalscore ."<br>");

    foreach($connexion->query('SELECT * FROM candidats') as $ligne){
        $pourcentage=0;
        $pourcentage=($ligne['score']*100)/$totalscore;
        $dej=$connexion->prepare("UPDATE candidats SET Pourcentage=$pourcentage WHERE NIN=$ligne[NIN]");
        $dej->execute();

        echo($pourcentage."%");

    }
   
}
   
            if(isset($_POST['btn4'])){

                header('location:afficher.php');
                exit();
            }
            
          
      
    


?>