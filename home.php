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
    <?php
    session_start();
    if ((!isset($_SESSION['usuario']) == true) and ( !isset($_SESSION['senha']) == true)) {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('location:index.php');
    }
    $logado = $_SESSION['usuario'];
    ?>
    <body class="skin-green">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="home.php" class="logo"><b>Ocomon</b> v3.0</a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">                            
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs" style="text-transform: uppercase"><?php echo $logado?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <p style="text-transform: uppercase">
                                            <?php echo $logado?><br>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="index.php" class="btn btn-default btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <a href="home.php" id="inicio">
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
                                    <a href="#" data-toggle="modal" data-target="#modal-usuario">
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
                                                <th style="width: 100px">Status</th>
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
                                            $sql = mysql_query("SELECT *FROM ocorrencia WHERE status = 'A' OR status = 'E'");

                                            while ($aux = mysql_fetch_assoc($sql)) {

                                                if ($aux["status"] == 'A') {
                                                    $saida = "<td style='text-align: center'><i class='fa fa-circle' style='color: green'></i></td>";
                                                } else if ($aux["status"] == 'E') {
                                                    $saida = "<td style='text-align: center'><i class='fa fa-circle' style='color: blue'></i></td>";
                                                } else if ($aux["status"] == 'F') {
                                                    $saida = "<td style='text-align: center'><i class='fa fa-circle' style='color: red'></i></td>";
                                                }

                                                echo"<tr>";
                                                echo "" . $saida;
                                                echo "<td>" . $aux["problema"] . "</td>";
                                                echo "<td>" . $aux["descricao"] . "</td>";
                                                echo "<td>" . $aux["responsavel"] . "</td>";
                                                echo "<td>" . $aux["localidade"] . "</td>";
                                                echo "<td>" . "<a href='#' data-toggle='modal' data-target='#modal-alter". $aux["id"]."'>"
                                                . "<button class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Alterar"
                                                . "</button></a>&nbsp;&nbsp;<a href='#' data-toggle='modal' data-target='#modal-excluir". $aux["id"]."'>"
                                                . "<button class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Remover</button></a>"
                                                . "</td></tr>";

                                                echo"<div class='modal fade cart-modal' id='modal-excluir". $aux["id"]."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
                                                echo"<div class='modal-dialog' role='document'>";
                                                echo"<div class='modal-content'>";
                                                echo"<div class='modal-header'>";
                                                echo"<button type='button' class='close' data-dismiss='modal' aria-label='close'>";
                                                echo"<span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span>";
                                                echo"</button>";
                                                echo"<h3 class='modal-title'>Remover Ocorrência</h3>";
                                                echo"</div>";
                                                echo"<div class='modal-body'>";
                                                echo"<form action='controller/excluir.php' method='POST'>";
                                                echo"<input type='text' name='chave' value='" . $aux["id"] . "' style='display: none'/>";
                                                echo"<p class='lead'>Deseja realmente excluir esse movimento?</p>";
                                                echo"<div class='modal-footer'>";
                                                echo"<div class='col-md-12 col-xs-12 pull-left'>";
                                                echo"<button type='submit' class='btn btn-danger'>Remover</button>";
                                                echo"<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
                                                echo"</div></div></form></div></div></div></div>";

                                                echo "<div class='modal fade cart-modal' id='modal-alter". $aux["id"]."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
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
                                                                        <input type='text' name='alteracao' value='" . $aux["id"] . "' style='display: none'/>
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
                                                                        <div class='form-group col-md-6 col-xs-12'>
                                                                            <label class='control-label'>Status:</label>
                                                                            <select class='form-control' name='status' required>
                                                                                <option value='A'>Aberto</option>
                                                                                <option value='E'>Em Atendimento</option>
                                                                                <option value='F'>Finalizado</option>
                                                                            </select>
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
                                <select class="form-control" name="tipo" required>
                                    <option value="">Selecione...</option>
                                    <optgroup label="Suporte">
                                        <option value="Retornar Ligação">Retornar Ligação</option>
                                        <option value="Instalação">Instalação</option>
                                        <option value="Suporte In Loco">Suporte em Loco</option>
                                        <option value="Suporte Remoto">Suporte Remoto</option>
                                        <option value="Atualização">Atualização</option>
                                    </optgroup>
                                    <optgroup label="Desenvolvimento">
                                        <option value="Bug">Bug</option>
                                        <option value="Correção">Correção</option>
                                        <option value="Implementação">Implementação</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Unidade:</label>
                                <select class="form-control" name="unidade" required>
                                    <option value="">Selecione...</option>
                                    <option value="A">Módulo Comercial</option>
                                    <option value="E">Módulo Cobrança</option>
                                    <option value="F">Módulo Financeiro</option>
                                    <option value="F">Módulo Serviços</option>
                                    <option value="F">RealMed Clinica</option>
                                    <option value="F">RealMed SUS</option>
                                    <option value="F">SmartCob</option>
                                    <option value="F">Palm</option>
                                    <option value="F">Orion Serviços Póstumos</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Status:</label>
                                <select class="form-control" name="status" required>
                                    <option value="A">Aberto</option>
                                    <option value="E">Em Atendimento</option>
                                    <option value="F">Finalizado</option>
                                </select>
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
        <!--Modal Usuario-->
        <div class="modal fade cart-modal" id="modal-usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></span>
                        </button>
                        <h3 class="modal-title">Cadastro de Usuário</h3>
                    </div>
                    <div class="modal-body">
                        <form action="controller/adduser.php" method="POST">
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Nome:</label>
                                <input class="form-control" type="text" name="usu_nome" required/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label for="selection">Username:</label>
                                <input class="form-control" type="text" name="usu_username" required/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Senha:</label>
                                <input class="form-control" type="password" name="usu_senha" required/>
                            </div>
                            <div class="form-group col-md-12 col-xs-12">
                                <label class="control-label">Departamento:</label>
                                <select class="form-control" name="usu_depart" required>
                                    <option value="">Selecione...</option>
                                    <option value="Desenvolvimento">Desenvolvimento</option>
                                    <option value="Financeiro">Financeiro</option>                                    
                                    <option value="Suporte">Suporte</option>
                                </select>
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
                                        function atualizar() {
                                            location.reload();
                                        }
        </script>
    </body>
</html>
