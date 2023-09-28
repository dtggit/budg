<?php include "conn.php";?>

<?php
if(isset($_GET['id_d']))
{
    $id = intval($_GET['id_d']);

    $sql = "DELETE FROM depense WHERE id_d=".$id;
    $conn ->exec($sql);
    header("Location: index.php");
}else{
    echo "pas de id";
}