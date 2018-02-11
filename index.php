<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OcoMon</title>
        <?php
            $page = $_SERVER['PHP_SELF'];
            $sec = "300";
        ?>
        <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />   
        <!-- Theme style -->
        <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />        
        <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!--Material Icons-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            td{
                font-size: 18px;

            }
        </style>
    </head>
    <body class="skin-green">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index.php" class="logo"><b>Ocomon</b> v3.0</a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only"></span>
                    </a>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <ul class="sidebar-menu">

                        <li class="treeview">
                            <a href="index.php" id="inicio">
                                <i class="fa fa-tasks"></i>
                                <span>Chamados</span>
                            </a>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-plus"></i>
                                <span>Cadastros</span>
                                <i class="fa fa-angle-down pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="#" id="atendimento">
                                        <i class="fa fa-user"></i>
                                        <span>Cadastrar Usuário</span>
                                    </a> 
                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#modal-add">
                                        <i class="fa fa-plus"></i>
                                        <span>Abrir Chamado</span>
                                    </a> 
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="finishtask.php">
                                <i class="fa fa-list"></i>
                                <span>Chamados Finalizados</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-success">
                                <div class="box-header">
                                    <button class="btn btn-primary" onclick="atualizar()"><i class="fa fa-refresh"></i> Atualizar</button>&nbsp;&nbsp;
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Abrir Chamado</button>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped tabl-hover">
                                        <thead class="bg-green">
                                            <tr>
                                                <th style="width: 100px">id</th>
                                                <!--<th>Status</th>-->
                                                <th style="width: 200px">Tipo de Ocorrência</th>
                                                <th style="width: 350px; text-align: justify">Descrição</th>
                                                <th>Responsável</th>
                                                <th>Local</th>                                                
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            include './connection/conexao.php';

                                            $db = mysql_select_db("$database");
                                            $sql = mysql_query("SELECT *FROM ocorrencia");

                                            while ($aux = mysql_fetch_assoc($sql)) {
                                                echo "<tr><td>" . $aux["id"] . "</td>";
                                                echo "<td>" . $aux["problema"] . "</td>";
                                                echo "<td>" . $aux["descricao"] . "</td>";
                                                echo "<td>" . $aux["responsavel"] . "</td>";
                                                echo "<td>" . $aux["localidade"] . "</td>";
                                                echo "<td>" . "<a href='#' data-toggle='modal' data-target='#modal-alter'>"
                                                . "<button class='btn btn-success'><i class='material-icons'>edit</i>"
                                                . "</button></a>&nbsp;&nbsp;<a href='#' data-toggle='modal' data-target='#modal-excluir'>"
                                                . "<button class='btn btn-danger'><i class='material-icons'>delete</i></button></a>"
                                                . "</td></tr>";

                                                echo"<div class='modal fade cart-modal' id='modal-excluir' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                                        <div class='modal-dialog' role='document'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                    <button type='button' class='close' data-dismiss='modal' aria-label='close'>
                                                                        <span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span>
                                                                    </button>
                                                                    <h3 class='modal-title'>Remover Ocorrência</h3>
                                                                </div>
                                                                <div class='modal-body'>                        
                                                                    <form action='controller/excluir.php' method='POST'>
                                                                        <input type='text' name='chave' value='" . $aux["id"] . "' style='display:none'/>
                                                                        <p class='lead'>Deseja realmente excluir esse movimento?</p>
                                                                        <div class='modal-footer'>
                                                                            <div class='col-md-12 col-xs-12 pull-left'>
                                                                                <button type='submit' class='btn btn-danger'>Remover</button>
                                                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>";

                                                echo "<div class='modal fade cart-modal' id='modal-alter' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                                        <div class='modal-dialog' role='document'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                    <button type='button' class='close' data-dismiss='modal' aria-label='close'>
                                                                        <span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span>
                                                                    </button>
                                                                    <h3 class='modal-title'>Alteração de Ocorrência</h3>
                                                                </div>
                                                                <div class='modal-body'>                        
                                                                    <form action='controller/alterar.php' method='POST'>
                                                                        <input type='text' name='alteracao' value='" . $aux["id"] . "' style='display:none'/>
                                                                        <div class='form-group col-md-6 col-xs-12'>
                                                                            <label class='control-label'>Contato Responsável:</label>
                                                                            <input class='form-control' type='text' value='" . $aux["responsavel"] . "' name='responsavel'/>
                                                                        </div>
                                                                        <div class='form-group col-md-6 col-xs-12'>
                                                                            <label for='selection'>Local:</label>
                                                                            <input class='form-control' value='" . $aux["localidade"] . "' type='text' name='local'/>
                                                                        </div>
                                                                        <div class='form-group col-md-6 col-xs-12'>
                                                                            <label class='control-label'>Problema:</label>
                                                                            <input class='form-control' value='" . $aux["problema"] . "' name='tipo' type='text'/>
                                                                        </div>
                                                                        <div class='form-group col-md-12 col-xs-12'>
                                                                            <label class='control-label'>Descrição:</label>
                                                                            <textarea class='form-control' name='descricao'>" . $aux["descricao"] . "</textarea>
                                                                        </div>

                                                                        <div class='modal-footer'>
                                                                            <div class='col-md-12 col-xs-12 pull-left'>
                                                                                <button type='submit' class='btn btn-success'>Alterar</button>
                                                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>";
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div><!-- content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Versão</b> 3.1.1
                </div>
                <strong>Copyright &copy; 2018 <a href="mailto:luksandrades18@gmail.com">Lucas Andrade</a></strong>. Todos os Direitos Reservados.
            </footer>            
        </div>

        <!--Modal Cadastro-->
        <div class="modal fade cart-modal" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></span>
                        </button>
                        <h3 class="modal-title">Cadastro de Ocorrência</h3>
                    </div>
                    <div class="modal-body">
                        <form action="controller/cadastro.php" method="POST">
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Contato Responsável:</label>
                                <input class="form-control" type="text" name="responsavel"/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label for="selection">Local:</label>
                                <input class="form-control" type="text" name="local"/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Problema:</label>
                                <input class="form-control" name="tipo" type="text"/>
                            </div>
                            <div class="form-group col-md-12 col-xs-12">
                                <label class="control-label">Descrição:</label>
                                <textarea class="form-control" name="descricao"></textarea>
                            </div>

                            <div class="modal-footer">
                                <div class="col-md-12 col-xs-12 pull-left">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery 2.1.3 -->
        <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- jQuery UI 1.11.2 -->
        <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js" type="text/javascript"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>
        <script type="text/javascript">
            function atualizar(){location.reload();}
        </script>
    </body>
</html>
