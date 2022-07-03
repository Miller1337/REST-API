<?php
 session_start();
 include 'db.php';
 include 'api.php';
 if (!empty($_POST)){
    if ($_POST ['login'] !='' && $_POST ['pass'] !=''){
        $name = trim(strip_tags($_POST ['login'] ));
        $password = trim(strip_tags($_POST ['pass'] ));
        if ( User ($db, $name, $password)) {
            $_SESSION['login'] = $name;
            }else{
        echo "<h1> EROR </h1>";}
    }else{
        echo "<h1> EROR </h1>";
    }
 }

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

    <div id="content">

    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Автопрокат</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
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
    <div class ="container-fluid">
        <?php if (!isset($_SESSION['login'])) { ?>
            <form action="" method ="POST" role = "form">
                <div class="form-group">
                    <label for ="">Логин</label>
                    <input type="text" class = "form" id="login" name="login" style = "margin-left: 20px";>
                </div>
                 <div class="form-group">
                    <label for ="">Пароль</label>
                    <input type="password" class = "form" id="pass" name="pass" style = "margin-left: 10px">
                </div>
                <button type="submit" id="submit" class="btn btn-primary">Войти</button>
            </form>
        <?php  } else {?>
            <p><a href="models.php" class = "btn btn-primary" style = "margin: 20px ; 20px"> Перейти редактированию моделей </a></p>
             <p><a  href=".php" class = "btn btn-danger" style = "margin: 20px ; 20px" > Выбросить базу данных </a>  </p>
            <button id="addButton" class="btn btn-default">Добавить пользователя</button>
        <form action="" method="POST" role = "form" style="display: none; margin-top: 30px;">
        <div class = "form-group">
            <label for="">Имя пользователя</label>
            <input type="text" class= "form-control" id= "log" name="log" placeholder="Например root">
            <label for="">Пароль для пользователя</label>
            <input type="text" class= "form-control" id= "sword" name="sword" placeholder="Например root">
             <button style = "margin: 15px 0px"  type="submit" class="btn btn-success">Добавить</button>


        <?php } ?>
</div>
 <footer>
         <?php
            if(isset($_POST['log']) && $_POST['sword'] !=''){
            $user = $_POST['log'];
            $password=$_POST['sword'];
            addUser ($db,$user,$password);
        }
        ?>
    </footer>
<script>
    $("#addButton").click(function(){
        $("form").slideDown();
    });
</script>
</body>
</html>