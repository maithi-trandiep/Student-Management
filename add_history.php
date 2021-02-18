<?php
header('Content-Type: application/json');

$aResult = array();

$user = 'root'; 
$pass = 'maithi';  
$dsn = 'mysql:host=localhost;dbname=Etudiants'; 
try{
    $connexion= new PDO($dsn, $user, $pass); 
} catch (PDOException $e){ 
    print "Erreur ! :" . $e->getMessage() . "<br/>"; 
    die(); 
}

if( !isset($aResult['error']) ) {
    $nomEtab=str_replace("'", "''", $_POST["nomEntreprise_actuel"]);
    $statut=str_replace("'","''", $_POST["statut_actuel"]);
    $idEtab=str_replace("'","''", $_POST["idE"]);
    $req="insert into data_history(idEtab, nomEtab, statut) values ('$idEtab', '$statut', '$nomEtab')";
    $connexion->exec($req);
    $connexion = null;
    $aResult['result'] = $statut;
}

echo json_encode($aResult);
    // function connect() { 
    //     $user = 'root'; 
    //     $pass = 'maithi';  
    //     $dsn = 'mysql:host=localhost;dbname=etudiant'; 
    //     try{
    //         $dbh= new PDO($dsn, $user, $pass); 
    //         return $dbh;
    //     } catch (PDOException $e){ 
    //         print "Erreur ! :" . $e->getMessage() . "<br/>"; 
    //         die(); 
    //     }
    //     return null;
    // }
    // function selectBase($connexion)
    // {
    //     $ok = $connexion->query("use etudiant");
    //     return $ok;
    // }
    // function creerHistory($connexion, $idEtab, $nomEtab, $statut)
    // { 
    //     $nomEtab=str_replace("'", "''", $nomEtab);
    //     $statut=str_replace("'","''", $statut);
    //     $idEtab=str_replace("'","''", $idEtab);

    //     $req="insert into data_history values ('$idEtab', '$statut', '$nomEtab')";

    //     $connexion->exec($req);
    // }
    
    // $connexion=connect();
    // if (!$connexion)
    // {
    //     // TODO
    //     exit();
    // }
    // if (!selectBase($connexion))
    // {
    //     // TODO
    //     exit();
    // }

    // // header('Content-Type: application/json');

    // $aResult = array();

    // if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    // if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    // // echo $_POST;
    // if( !isset($aResult['error']) ) {
    //     switch($_POST['functionname']) {
    //         case 'add':
    //         if( !is_array($_POST['arguments']) || (count($_POST['arguments']) == 0) ) {
    //             $aResult['error'] = 'Error in arguments!';
    //         }
    //         else {
    //             $aResult['result'] = 'OK'; //add(floatval($_POST['arguments'][0]), floatval($_POST['arguments'][1]));
    //         }
    //         break;

    //         default:
    //         $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
    //         break;
    //     }
    // }
    // echo json_encode($aResult);
?>