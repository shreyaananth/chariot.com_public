<?php
    session_start();
    ob_start();
        if ($_POST["proper4"]!="yes"){
        $mes = "Invalid Acccess to webpage...Page not found";
        header("Location: http://localhost/chariot.com/Inventory/INSERT/error.php?mes=".$mes);
        exit();
    }
      $pid = $_POST["pid"];
      $a = $_POST["atleast"];
?>
<html>
<body>
<form id="one" action="http://localhost/chariot.com/Inventory/INSERT/platinum.php" method="post">
<input type="hidden" value="yes" name="proper5"/>
<input type="hidden" value= <?php echo $pid;?> name = "pid"/>
<input type="hidden" value= <?php echo $a ?> name="atleast"/>
</form>
<?php
        echo '<script>document.getElementById("one").submit();</script>';
   
?>
</body>
</html>
