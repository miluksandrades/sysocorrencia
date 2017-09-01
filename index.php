<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sysocorrência</title>
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
                <a href="index.php" class="logo"><b>Sys</b>Ocorrência</a>
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
                                <i class="fa fa-home"></i> <span>Início</span> <i class="fa fa-angle-right pull-right"></i>
                            </a>
                        </li>
                                                
                        <li class="treeview">
                            <a href="#" data-toggle="modal" data-target="#modal-add">
                                <i class="fa fa-plus"></i> <span>Abrir Chamado</span> <i class="fa fa-angle-right pull-right"></i>
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
                                    <i class="fa fa-book"></i>
                                    <h2 class="box-title">Lista de Ocorrência</h2>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped tabl-hover">
                                        <thead class="bg-green">
                                            <tr>
                                                <th style="width: 100px">id</th>
                                                <th style="width: 200px">Tipo de Ocorrência</th>
                                                <th style="width: 450px; text-align: justify">Descrição</th>
                                                <th>Responsável</th>
                                                <th>Local</th>                                                
                                                <th>Ação</th>
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
                                                echo "<td>" . "<a href='#' data-toggle='modal' data-target='#delete-modal'" 
                                                        . "style='font-size: 18px; color: #D50000; text-align: center'>" 
                                                        . "<i class='material-icons'>delete</i></a>" . "</td></tr>";
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
                    <b>Versão</b> 1.0.0
                </div>
                <strong>Copyright &copy; 2017 <a href="mailto:suporte@devnull.com.br">DevNULL</a></strong>. Todos os Direitos Reservados.
            </footer>            
        </div>
        
        <!--Modal Exclusão-->
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                        <h4 class="modal-title" id="modalLabel">Excluir</h4>
                    </div>
                    <div class="modal-body">
                        Deseja realmente excluir esta Ocorrência?
                    </div>
                    <div class="modal-footer">
                        <form action="controller/excluir.php">
                            <button type="submit" class="btn btn-primary">Sim</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                        </form>
                    </div>
                </div>
            </div>
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
    </body>
</html>
