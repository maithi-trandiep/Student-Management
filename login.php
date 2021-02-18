<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
require_once "config/connection.php";

$username = $password = "";
$username_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Veuillez saisir votre nom d'utilisateur.";
    } else{
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["pwd"]))){
        $password_err = "Veuillez saisir votre mot de passe.";
    } else{
        $password = trim($_POST["pwd"]);
    }
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, pwd FROM users WHERE username = :username"; 
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $stored_password = $row["pwd"];
                        if($password == $stored_password){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            header("location: index.php");
                        } else{
                            $password_err = "Mot de passe invalid.";
                        }
                    }
                } else{
                    $username_err = "Nom d'utilisateur invalid.";
                }
            } else{
                echo "Erreur.";
            }
            unset($stmt);
        }
    }
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>S'identifier</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/fontawesome-free/css/all.min.css">
    <style type="text/css">
    body{ font: 14px sans-serif; }
    .container {
        display: flex;
        justify-content: center;
        align-items: center; height: 700px; }
    .wrapper {
        background-color: #f0f2f5;
    }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="form-section">
            <h2>S'identifier</h2>
            <p>Veuillez remplir vos identifiants pour vous connecter.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Nom d'utilisateur</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    </div>
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Mot de passe</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" name="pwd" class="form-control">
                    </div>
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Valider">
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>