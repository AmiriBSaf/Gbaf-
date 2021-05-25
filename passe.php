<?php

session_start();



try{
    $bdd = new PDO('mysql:host=localhost;dbname=id16887953_gbaf;charset=utf8', 'id16887953_safia', 'qIV~Y^_8i_7_/+4L');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
        //connexion myAdmin
        
}
if (isset($_POST['forgetpw'])) {
    $nomuser = htmlspecialchars($_POST['nomuser']);
    $question = htmlspecialchars($_POST['question']);
    $reponse = htmlspecialchars($_POST['reponse']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);
        if(!empty($_POST['nomuser'])&& !empty($_POST['question']) &&!empty($_POST['reponse'])) {
            $selectuser = $bdd->prepare ("SELECT * FROM inscription WHERE nomuser= ? ");
            $selectuser->execute(array($nomuser));
            $user=$selectuser->fetch();
            if($question == $user['question'] && $reponse ==$user['reponse']) {
                if($_POST['mdp'] == $_POST['mdp2']) {
                    $insertmdp = $bdd->prepare("UPDATE inscription Set motdepasse= ? WHERE nomuser = ?");
                    $insertmdp->execute(array($mdp, $nomuser)); 
                    $insertmdp = $bdd->prepare("UPDATE inscription Set motdepasse2= ? WHERE nomuser = ?");
                    $insertmdp->execute(array($mdp2, $nomuser));
                } else {
                    echo"Votre Question de securité ne corresponde pas !!!";
                }
            }
        } 
}
header('Location:connexion.php');

?>


