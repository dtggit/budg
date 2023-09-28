<?php include "conn.php";?>
<?php

if(isset($_GET['id_r']))
{

    if(isset($_POST['modifier']))
    {
        $id=intval($_GET['id_r']);
        $titre = $_POST['titre_r'];
        $montant = $_POST['montant_r'];
        
        $sql = "UPDATE revenu SET titre_r='".$titre."',montant_r='".$montant."' WHERE id_r=".$id;      
        
        $conn->exec($sql);
        header("Location: index.php");     
    }
}else{
    echo "Pas d'id";
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <h1 class="h1"> <span>B</span>UDGET </h1>
        <h4> Gestion du Budget </h4>
        <form action="" method="post">
        <h1 class="uprev">Modifier revenu</h1>
        <?php
            if(isset($_GET['id_r']))
            {
                $id = intval($_GET['id_r']);
                $rep = $conn->query("SELECT * FROM revenu WHERE id_r=".$id);
                $ligne = $rep->fetch();
            }
        ?>
        <label for="titre">TITRE</label>
        <input style="font-size:25px; padding:10px;" id="titre" type="text" name="titre_r" value="<?php echo $ligne['titre_r'];?>">
        <label for="montant">MONTANT</label>
        <input style="font-size:25px; padding:10px;" id="montant" type="text" name="montant_r" value="<?php echo $ligne['montant_r'];?>">
        <input style="font-size:25px; padding:10px;" type="submit" value="Modifier" name="modifier">    
        </form>
</div>
</body>
</html>
