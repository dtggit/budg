<?php include "conn.php";?>

<?php
if(isset($_GET['id_d']))
{
    if(isset($_POST['modifier']))
    {
        $id=intval($_GET['id_d']);
        $titre = $_POST['titre_d'];
        $montant = $_POST['montant_d'];
        
        $sql = "UPDATE depense SET titre_d='".$titre."',montant_d='".$montant."' WHERE id_d=".$id;      
        
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
        <h1 class="updep">Modifier dépense</h1>
        <?php
            if(isset($_GET['id_d']))
            {
                $id = intval($_GET['id_d']);
                $rep = $conn->query("SELECT * FROM depense WHERE id_d=".$id);
                $ligne = $rep->fetch();
            }
        ?>
            <label for="titre">TITRE</label>
            <input style="font-size:25px; padding:10px;" id="titre" type="text" name="titre_d" value="<?php echo $ligne['titre_d'];?>">
            <label for="montant">MONTANT</label>
            <input style="font-size:25px; padding:10px;" id="montant" type="text" name="montant_d" value="<?php echo $ligne['montant_d'];?>">
            <input style="font-size:25px; padding:10px;" type="submit" value="Modifier" name="modifier">  
        </form>
    </div>
</body>
</html>
