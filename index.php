<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OcoMon</title>
        <?php
            $page = $_SERVER['PHP_SELF'];
            $sec = "300";
        ?>
        <meta http-equiv="refresh" content="<?php echo $sec ?>;URL='<?php echo $page ?>'">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            body{
                background: #325555;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%;
            }
            .card-header{
                background: -webkit-linear-gradient(45deg, #72e8a9, #49a5bf);
            }
        </style>

    </head>
    <body>
        <div class="container-fluid col-sm-12 col-lg-3 col-md-6" style="margin-top: 50px">
            <div class="card bg-white" style=" border: none">
                <div class="card-header" style="text-align: center; color: #fff;">
                    <p class="lead" style="font-size: 30px"><b>Ocomon v3.0</b></p>
                </div>
                <div class="card-body justify-content-center">
                    <form action="controller/login.php" method="POST">
                        <div class="form-group col-12">
                            <input type="text" class="form-control" placeholder="Usuário" name="usuario" autofocus>
                        </div>
                        <div class="form-group col-12">
                            <input type="password" class="form-control" placeholder="Senha" name="senha">
                        </div>
                        <div class="form-group col-12">
                            <button class="btn btn-outline-success col-12" type="submit">Entrar</button>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
