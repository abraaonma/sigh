<?php
    require_once("conect.php");

    $sqlc = $conn->prepare("SELECT * FROM reltab WHERE FK_ID_COOR = 10");
    $sqlc->execute();

    $coord = $sqlc->fetch(PDO::FETCH_ASSOC);

    echo "<b>CURSO: " . $coord['FK_NOM_COOR']."</b><br>";

    $sql = $conn->prepare("SELECT * FROM reltab WHERE FK_ID_COOR = 10");
    $sql->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Document</title>
</head>
<body>

<!-------------------INÍCIO DA TABELA------------------>

<table >
    <tr>
        <th>ID</th>
        <th>PROFESSOR</th>
        <th>SIAPE</th>
        <th>DISCIPLINA</th>
        <th>CURSO</th>
        <th>TURMA</th>
    </tr>
<?php


    while ($result = $sql->fetch(PDO::FETCH_ASSOC)){

        echo "<tr>
                <td style='text-align: center;'>".$result['ID_REL'] ."</td> 
                <td>".$result['FK_NOM_PROF'] ."</td>
                <td style='text-align: center;'>". $result['FK_SIAPE'] . "</td>
                <td style='text-align: center;'>". $result['FK_SIGL_DISC'] . "</td>
                <td style='text-align: center;'>" .$result['FK_SIGL_COOR']. "</td>
                <td style='text-align: center;'>" . $result['FK_NUM_TURM'] . "</td>
              </tr>";
    }

?>

</table>

<!--FIM DA TABELA -->

<?php
    
    $sql_aut = $conn->prepare("SELECT COUNT(ID_REL) as count FROM reltab WHERE FK_ID_COOR = 10");
    $sql_aut->execute();
    $result_aut = $sql_aut->fetch();
    echo "<h5 style='padding-top:10px;'>Total de disciplinas: ". $result_aut['count'] ."</h5>";

?>

</body>
</html>
