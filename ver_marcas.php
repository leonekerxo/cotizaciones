<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        include'inc/incluye_bootstrap.php';
        include 'inc/conexion.php';
        include 'inc/incluye_datatable_head.php';
        ?>
    </head>
    <body>
        <!--inicion del codigo que incluye el menú responsivo-->
        <?php include'inc/incluye_menu.php' ?>
        <!--Fin del código que incluye el menú responsivo-->
        <div class="container">
            <div class="jumbotron">
                <?php
                //Esta Consulta es sin parámetros
                $sel = $con->prepare("SELECT *from marca");
                $sel->execute();
                $res = $sel->get_result();
                $row = mysqli_num_rows($res);
                ?>
                Elementos devueltos por la consulta:<?php echo $row ?>

                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <th>ID MARCA</th>
                    <th>NOMBRE MARCA</th>
                    </thead>
                    <tfoot>
                        <th>ID MARCA</th>
                        <TH>NOMBRE MARCA</TH>
                    </tfoot>
                    <body>
                    <?php while ($f = $res->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $f['marca_id'] ?></td>
                                <td><?php echo $f['marca_nombre'] ?></td>
                            </tr>
                            <?php
                        }
                        $sel->close();
                        $con->close();
                        ?>
                    </body>
                 </table>
            </div>
        </div>
        <?php include 'inc/incluye_datatable_pie.php' ?>
    </body>
</html>

