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
            </div>
        </div>
    </nav>
</header>

<div id="content">
    <div class="container-fluid">
        <?php include "db.php";?>
        <?php include "api.php";?>
        <?php
             $id = $_GET['idmodels'];
                    if($id) {
                        $model = getModelById($db,$id);
                    }
                    else {
                        echo '<div class="alert alert-danger" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                  <span class="sr-only">Error:</span>
                                  Нет такой модели
                                </div>';
                    }
        ?>
        <form action = "safe.php" method="post">
            <input type = "hidden" name="id" value="<?php echo $model['idmodels'];?>">
            <div class = "form-group">
                <label for="name">Модель</label>
                <input type="text" class="form-control" id="model"  name = "model" value ="<?php echo $model['model']; ?>">
                </div>
                 <div class = "form-group">
                 <label for="name">Год выпуска</label>
                <input type="text" class="form-control" id="year"  name = "year" value ="<?php echo $model['year']; ?>">
                </div>
                <button type = "submit" class = "btn btn-default" >Сохранить</button>
            </form>
        </div>
    </div>
</div>

<footer>
</footer>
</body>
</html>