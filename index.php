<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <br/>
        <br/>
        <a href="index.php">Inicio</a> < | >
        <a href="pages/lista.php">Lista de ocorrencias</a>
        <br/>
        <br/>
        <br/>
        
        <form action="controller/cadastro.php" method="POST">
            Contato Responsavel: <input type="text" size="30" name="responsavel"/><br/><br/>
            Problema: <input type="text" size="40" name="tipo"/><br/><br/>
            Descrição: <input type="text" size="40" name="descricao"/><br/><br/>
            Local: <input type="text" size="30" name="local"/><br/><br/>            
            <input type="submit" value="Salvar"/>
            <input type="reset" value="Limpar"/>
        </form>
    </body>
</html>
