<?php
include "conexion.inc.php";
$sql = "select ci,nota from nota";
$resultado1 = mysqli_query($conn, $sql);


$sql = "select ci,recidencia from identificador";
$resultado2 = mysqli_query($conn, $sql);

$cont = 0;
$nota = mysqli_fetch_all($resultado1);
$iden = mysqli_fetch_all($resultado2);

$depar = array('01', '02', '03', '04', '05', '06', '07', '08', '09');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="padre">
        <div>
            <?php
            echo '
            <table border="1">
            <caption>Materias Aprobadas por Departamentos</caption>
            <tr>
                <th>Chiquisaca</th>
                <th>La Paz</th>
                <th>Cochabamba</th>
                <th>Oruro</th>
                <th>Potosi</th>
                <th>Tarija</th>
                <th>Santa Cruz</th>
                <th>Beni</th>
                <th>Pando</th>
            </tr>
            <tr>';
            foreach ($depar as $d) {
                $num=0;
                foreach ($iden as $i) {
                    if ($d == $i[1]) {
                        foreach ($nota as $n) {
                            if($i[0]==$n[0]&&$n[1]>50){
                                $num++;
                            }
                        }
                    }
                }
                echo '<td>' . $num . '</td>';
                
            }
            echo '</tr>
            </table>
            ';
            ?>
        </div class="hijo">
    </div>
</body>

</html>