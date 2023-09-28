<?php
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUDGET</title>
</head>
<body>
    <h1>Liste des revenus</h1>
<?php
echo '<table  style="border-collapse: collapse;">';

$sql = "SELECT * FROM revenu";
    $rep=$conn->query($sql);

            echo '<tr  style="border-collapse: collapse;">';
            echo '<th style="border: 1px solid black; border-collapse: collapse;">Id</th>';
            echo '<th style="border: 1px solid black; border-collapse: collapse;">Titre</th>';
            echo '<th style="border: 1px solid black; border-collapse: collapse;">Montant</th>';
            echo '<th  colspan="2" style="border: 1px solid black; border-collapse: collapse;">Action</th>';
            echo '</tr>';
            while ($data = $rep->fetch())
            {
                    
            echo '<tr>';
            echo '<td style="border: 1px solid black; text-align:center; width:100px; border-collapse: collapse;">'.$data['id_r']. '</td>';
            echo '<td style="border: 1px solid black; text-align:center; width:100px; border-collapse: collapse;">'.$data['titre_r']. '</td>';
            echo '<td style="border: 1px solid black; width:120px; border-collapse: collapse;">'.$data['montant_r'].'</td>';
            
            echo "<td style='border: 1px solid black; width:120px; border-collapse: collapse;'><a style='color:red'; href='updaterev.php?id_r=".$data['id_r']."'>Modifier</a></td>";
            echo "<td style='border: 1px solid black; width:120px; border-collapse: collapse;'><a style='color:red'; href='deleterev.php?id_r=".$data['id_r']."'>Supprimer</a></td>";
            echo '</tr>';        
    
        }
        echo '</table>';
?>
    
</body>
</html>