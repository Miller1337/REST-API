<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Автопрокат</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<header>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Модельный ряд</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!--<li><a href="models.php">Модельный ряд</a></li>-->

                </ul>
                <div class="pull-right">
                    <?php if (isset($_SESSION)) { ?>
                        <p>Пользователь <?php echo $_SESSION['login']; ?></p>
                        <p><a href="logout.php">Выйти</a></p>
                        <?php } ?>
                </div>
            </div>

        </div>
    </nav>
</header>

<div id="content">
    <div class="container-fluid">
        <?php include "db.php";?>
        <?php include "api.php";?>
        <?php
            $models = getAllModels($db);

        ?>
        <table class = "table table-bordered">
            <tr>
                <th>Модели</th>
                <th>Год</th>
                <th>Категория прав</th>
                <th>Удалить</th>
            </tr>

            <?php foreach ($models as $model) {?>
            <tr>
                <td><a href="edit.php?idmodels=<?php echo $model['idmodels'];?>"><?php echo $model['model'];?> </a></td>
                <td> <?php  echo $model ['year'];?>  </td>
                <td><?php  echo $model ['kategory'];?></td>
                <td> <a class ="btn btn-danger" href="delete.php? idmodels=<?php echo $model['idmodels'];?>">Удалить</a></td>
            </tr>
            <?php }?>

        </table>
        <button id="addButton" class="btn btn-default">Добавить модель</button>
        <form action="" method="POST" role = "form" style="display: none; margin-top: 30px;">
        <div class = "form-group">
            <label for="">Введите название модели</label>
            <input type="text" class= "form-control" id= "model" name="model" placeholder="Введите название модели">
            <label for="">Введите год выпуска</label>
            <input type="text" class= "form-control" id= "year" name="year" placeholder="Введите год выпуска">

             <div class="form-group" style = "margin: 10px 0px" ;>

                <select name = "lic" id="lic" class= "form-control" >
                    <?php

                    $license = getLicense($db);
                    foreach ($license as $key => $value) {
                        echo "<option value=".$value[idlicenseKategory].">".$value['kategory']."</option>";
                    }
                    ?>
                </select>

           <button style = "margin: 15px 0px"  type="submit" class="btn btn-success">Добавить</button>
        </form>
    </div>
    <?php
        if(isset($_POST['model']) !='' && $_POST['year'] !=''){
        $model = $_POST['model'];
        $year=$_POST['year'];
        $drivelicense=$_POST['lic'];
           }
            addModels ($db, $model,$year,$drivelicense);
    ?>
</div>
<footer>
</footer>
<script>
    $("#addButton").click(function(){
        $("form").slideDown();
    });
</script>
</body>
</html>