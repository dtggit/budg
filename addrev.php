<?php
include("conn.php");
if(isset($_POST['valider'])){
    // $id=$_POST['id'];
    $titre=$_POST['titre_r'];
    $montant=$_POST['montant_r'];
    
    $sql = "INSERT INTO `revenu`(`titre_r`,`montant_r`) VALUES ('".$titre."', '".$montant."')";
    $conn->exec($sql);
    header("Location: index.php");    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>BUDGET</title>
</head>
<body>
<div class="container">
    <h1 class="h1"> <span>B</span>UDGET </h1>
    <h4> Gestion du Budget </h4>
    <form action="" method="POST">
        <h1 class="rev">Ajouter revenu</h1>
        <label for="titre">TITRE</label>
        <input style="font-size:25px; padding:10px;" id="titre" type="text" name="titre_r" placeholder="Titre">
        <label for="titre">MONTANT</label>
        <input style="font-size:25px; padding:10px;" id="montant"  type="text" name="montant_r" placeholder="Montant en F CFA">
        <input style="font-size:25px; padding:10px;" type="submit" value="Valider" name="valider">
    </form>
</div>
    
</body>
</html>