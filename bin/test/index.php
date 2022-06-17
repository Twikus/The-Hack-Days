<?php
require '../inc/head.php';
require '../inc/lib_crud.inc.php';
?>

<h1 id="chrono"></h1>
<a href="chrono.php">Restart</a>

<script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">

setInterval(() => {
        $.post('response.php', function(data){
            toString(data)
            console.log(data);
            $('#response').text(data);
    });
}, 1000);
</script>

<?php
require '../inc/end.php';
?>