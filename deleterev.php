<?php include "conn.php";?>

<?php
if(isset($_GET['id_r']))
{
    $id = intval($_GET['id_r']);

    $sql = "DELETE FROM revenu WHERE id_r=".$id;
    $conn ->exec($sql);
    header("Location: index.php");
}else{
    echo "pas de id";
}