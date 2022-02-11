
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/500ed99714.js" crossorigin="anonymous"></script>
<script src="../js/bootbox.js"></script>
<script src="../js/bootbox.min.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
</style>
<link rel="stylesheet" href="css/common.css">
<?php 
    $cssPage = str_replace('.php', '.css', basename($_SERVER['PHP_SELF']));
    $jsPage = str_replace('.php', '.js', basename($_SERVER['PHP_SELF']));
 ?>
<link rel="stylesheet" href="css/<?php echo $cssPage; ?>">
<script src="js/<?php echo $jsPage; ?>"></script>
<?php 
    session_start();
    
    if (!$_SESSION
        && basename($_SERVER['PHP_SELF'])!= 'qeydol.php' 
        && basename($_SERVER['PHP_SELF'])!= 'index.php') 
    {
        header('Location: index.php');
        //header("refresh: 0.001; url=index.php");
    }
    elseif ($_SESSION
        && basename($_SERVER['PHP_SELF']) == 'index.php') 
    {
        header('Location: mehsul.php');
    }


    function br(){
        echo "<br/>";
    }

?>