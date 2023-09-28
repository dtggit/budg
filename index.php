<?php include("conn.php");?>
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
    <div class="h">
        <h1 class="h1"> <span>B</span>UDGET </h1>
        <h4> Gestion du Budget </h4>
        <div class="ecart">

            <div class="d"> 
                <div class="lib">
                    <h5> Budget </h5>
                </div>
                <div class="mt">
                    <?php
                        $sqls="SELECT SUM(montant_r) As Budget FROM revenu";
                        $sumrev=$conn->query($sqls);
                        while($row=$sumrev->fetch())
                        {
                            $budget = $row['Budget'];   
                            echo $budget = number_format($budget,0, ',', '.')." F CFA";   
                        }
                    ?>
                </div>
            </div>

            <div class="d"> 
                <div class="lib">
                    <h5> Dépenses </h5>
                </div>
                <div class="mt">
                    <?php
                        $sqls="SELECT SUM(montant_d) As Depenses FROM depense" ;
                        $sumdep=$conn->query($sqls);
                        $aff=$sumdep->fetch();
                        $depense = $aff['Depenses'];
                        echo $depense = number_format($depense,0, ',', '.')." F CFA";
                    ?>
                </div>
            </div>

            <div class="d"> 
            <div class="lib">
            <h5> Solde </h5>
            </div>
                <div class="mt">
                    <?php
                    //Calculer le solde
                        $sqls="SELECT SUM(montant_r) As Budget FROM revenu";
                        $sumrev=$conn->query($sqls);
                        $aff1=$sumrev->fetch();
                        
                        $sqls="SELECT SUM(montant_d) As Depenses FROM depense" ;
                        $sumdep=$conn->query($sqls);
                        $aff=$sumdep->fetch();
                        
                        $solde=$aff1['Budget']-$aff['Depenses'];
                        echo $solde = number_format($solde,0, ',', '.')." F CFA";
                        ?>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="list">
                <h1 class="dep">Liste des dépenses</h1>
                <table>
                    <?php
                        $sql = "SELECT * FROM depense";
                        $rep=$conn->query($sql);
                        echo '<tr class="ligne">';
                        echo '<th class="e">TITRE</th>';
                        echo '<th class="e">MONTANT</th>';
                        echo '<th  colspan="2" class="f">ACTIONS</th>';
                        echo '</tr>';
                        while ($data = $rep->fetch())
                        {         
                            echo '<tr>';
                            echo '<td class="f">'.$data['titre_d']. '</td>';
                            echo '<td class="f">'.number_format($data['montant_d'],0,',','.')." F CFA".'</td>';
                            
                            echo "<td class='f'><a class='a' href='updatedep.php?id_d=".$data['id_d']."'>Modifier</a></td>";
                            echo "<td class='f'><a class='a' href='deletedep.php?id_d=".$data['id_d']."'>Supprimer</a></td>";
                            echo '</tr>';                    
                        }
                        echo '<tr>';
                        echo '<th id="bt" class="e"> <a class="aj" href="adddep.php"> <div class="add"><div> Ajouter dépense </div> <div class="cl">+</div></div> </a> </th>';
                        echo '<th class="e"> </th>';
                        echo '<th class="e"> </th>';
                        echo '<th class="e"> </th>';
                        echo '</tr>';
                        ?>  
                </table>
            </div>
            <div class="list">
                <h1 class="rev">Liste des revenus</h1>
                <table>
                    <?php
                        $sql = "SELECT * FROM revenu";
                        $rep=$conn->query($sql);
                        echo '<tr class="ligne">';
                        echo '<th class="e">TITRE</th>';
                        echo '<th class="e">MONTANT</th>';
                        echo '<th  colspan="2" class="e">ACTIONS</th>';
                        echo '</tr>';
                        while ($data = $rep->fetch())
                        {         
                            echo '<tr>';
                            echo '<td class="f">'.$data['titre_r']. '</td>';
                            echo '<td class="f">'.number_format($data['montant_r'],0,',','.')." F CFA".'</td>';
                            
                            echo "<td class='f'><a class='a'; href='updaterev.php?id_r=".$data['id_r']."'>Modifier</a></td>";
                            echo "<td class='f'><a class='a'; href='deleterev.php?id_r=".$data['id_r']."'>Supprimer</a></td>";
                            echo '</tr>';                    
                        }
                        echo '<tr>';
                        echo '<th class="e"><a class="aj" href="addrev.php"><div class="add"> <div> Ajouter Revenu </div> <div class="cl">+</div></div> </a> </th>';
                        echo '<th class="e"> </th>';
                        echo '<th class="e"> </th>';
                        echo '<th class="e"> </th>';
                        echo '</tr>';
                        ?>  
                </table>
            </div>
        </div>
    </div>
</body>
</html>