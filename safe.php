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
            if (!empty($_POST['model']) && !empty($_POST ['year'])&& !empty($_POST ['id']))
            {
                $model = $_POST ['model'];
                $id = $_POST ['id'];
                $year =$_POST['year'];
                saveModel ($db,$model,$id,$year);
            }
            else {
                echo "<h1>Ошибка</h1>";
            }

        ?>


</div>

<footer>
</footer>
</body>
</html>