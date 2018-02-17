<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OcoMon</title>
        <?php
        include './connection/conexao.php';
        $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
        $db = mysql_select_db("$database");
        $sql = "SELECT *FROM  empresa";
        $resultado = mysql_query($sql);

        //Contagem de dados
        $total_contatos = mysql_num_rows($resultado);

        //Numero de itens por pagina
        $qtdpage = 5;

        //Calcular a pagina
        $num_pagina = ceil($total_contatos / $qtdpage);

        //Calcular o inicio da visualização
        $inicio = ($qtdpage * $pagina) - $qtdpage;

        //Selecionar os contatos a serem apresentados
        $result_contato = "SELECT *FROM empresa ORDER BY emp_desc LIMIT $inicio, $qtdpage";
        $result_contatos = mysql_query($result_contato);
        $total_contatos = mysql_num_rows($result_contatos);
        ?>

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
                                    <span class="hidden-xs" style="text-transform: uppercase"><?php echo $logado ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <p style="text-transform: uppercase">
                                            <?php echo $logado ?><br>
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
                            <a href="contatos.php">
                                <i class="fa fa-phone"></i>
                                <span>Contatos</span>
                            </a>
                        </li>
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
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#modal-contato">
                                        <i class="fa fa-plus"></i>
                                        <span>Cadastrar Contato</span>
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
                                    <button class="btn btn-primary" onclick="atualizar()"><i class="fa fa-refresh"></i> Atualizar</button>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped tabl-hover">
                                        <thead class="bg-green">
                                            <tr>
                                                <th>Descrição</th>
                                                <th>Telefone</th>                                                
                                                <th>Localidade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($aux = mysql_fetch_assoc($result_contatos)) { ?>
                                                <tr>
                                                    <td><?php echo $aux['emp_desc'] ?></td>
                                                    <td><?php echo $aux['emp_telefone'] ?></td>
                                                    <td><?php echo $aux['emp_muncipio'] . "/" . $aux['emp_estado'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    //Verificar pagina
                                    $anterior = $pagina - 1;
                                    $posterior = $pagina + 1;
                                    ?>
                                    <nav class="text-center">
                                        <ul class="pagination">

                                            <?php if ($anterior != 0) { ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="contatos.php?pagina=<?php echo $anterior ?>">
                                                        Anterior
                                                    </a>
                                                </li>
                                            <?php } ?>

                                            <?php
                                            //Apresentação
                                            for ($i = 1; $i < $num_pagina + 1; $i++) {
                                                ?>
                                                <li class="page-item"><a class="page-link" href="contatos.php?pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
                                            <?php } ?>
                                            <?php if ($posterior <= $num_pagina) { ?>
                                                <li class="page-item"><a class="page-link" href="contatos.php?pagina=<?php echo $posterior ?>">Próximo</a></li>
                                            <?php } ?>
                                        </ul>
                                    </nav>
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
                        <form action="controller/operacao.php" method="POST">
                            <input type="hidden" name="method" value="addTask"/>
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Contato Responsável:</label>
                                <input class="form-control" type="text" name="responsavel"/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Local:</label>
                                <select class="form-control" name="local" required>
                                    <option value="">Selecione...</option>
                                    <?php
                                    include './connection/conexao.php';

                                    mysql_select_db($database);
                                    $query = mysql_query("SELECT *FROM empresa");

                                    while ($row = mysql_fetch_assoc($query)) {
                                        echo "<option value='" . $row["emp_desc"] . "'>" . $row["emp_desc"] . "</option>";
                                    }
                                    ?>
                                </select>
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
                                    <option value="Módulo Comercial">Módulo Comercial</option>
                                    <option value="Módulo Cobrança">Módulo Cobrança</option>
                                    <option value="Módulo Financeiro">Módulo Financeiro</option>
                                    <option value="Módulo Serviços">Módulo Serviços</option>
                                    <option value="RealMed Clínica">RealMed Clínica</option>
                                    <option value="RealMed SUS">RealMed SUS</option>
                                    <option value="SmartCob">SmartCob</option>
                                    <option value="Palm">Palm</option>
                                    <option value="Orion Serviços Póstumos">Orion Serviços Póstumos</option>
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
                            <div class="form-group col-md-6 col-xs-12" style="display: none">
                                <label class="control-label">Usuário Responsável:</label>
                                <input class="form-control" type="text" name="usuario" value="<?php echo $logado ?>"/>
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
                        <form action="controller/operacao.php" method="POST">
                            <input type="hidden" name="method" value="addUser"/>
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Nome:</label>
                                <input class="form-control" type="text" name="usu_nome" required/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Username:</label>
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
        <!--Modal Agenda-->
        <div class="modal fade cart-modal" id="modal-contato" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></span>
                        </button>
                        <h3 class="modal-title">Cadastro de Empresa</h3>
                    </div>
                    <div class="modal-body">
                        <form action="controller/operacao.php" method="POST">
                            <input type="hidden" name="method" value="addContato">
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Nome Fantasia:</label>
                                <input class="form-control" type="text" name="emp_desc" required/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Município:</label>
                                <input class="form-control" type="text" name="emp_municipio" required/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Estado:</label>
                                <select class="form-control" name="emp_estado" required>
                                    <option value="">Selecione...</option>
                                    <option value="AC">AC</option>      <option value="AL">AL</option>      <option value="AM">AM</option>
                                    <option value="AP">AP</option>      <option value="BA">BA</option>      <option value="CE">CE</option>
                                    <option value="DF">DF</option>      <option value="ES">ES</option>      <option value="GO">GO</option>
                                    <option value="MA">MA</option>      <option value="MG">MG</option>      <option value="MS">MS</option>
                                    <option value="MT">MT</option>      <option value="PA">PA</option>      <option value="PB">PB</option>
                                    <option value="PE">PE</option>      <option value="PI">PI</option>      <option value="PR">PR</option>
                                    <option value="RN">RN</option>      <option value="RO">RO</option>      <option value="RR">RR</option>
                                    <option value="RS">RS</option>      <option value="SC">SC</option>      <option value="SE">SE</option>
                                    <option value="SP">SP</option>      <option value="TO">TO</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Telefone:</label>
                                <input class="form-control telefone" type="text" name="emp_telefone" required/>
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
        <script src="plugins/jQuery/jquery.mask.js"></script>
        <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('.telefone').mask('(00)0000-0000');
                                        });
        </script>
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


