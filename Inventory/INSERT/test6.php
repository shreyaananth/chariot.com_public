<?php
    session_start();
    ob_start();
        if ($_POST["proper6"]!="yes"){
        $mes = "Invalid Acccess to webpage...Page not found";
        header("Location: http://localhost/chariot.com/Inventory/INSERT/error.php?mes=".$mes);
        exit();
    }
      $pid = $_POST["pid"];
?>
<html>
<body>
<form id="one" action="http://localhost/chariot.com/Inventory/INSERT/stone.php" method="post">
<input type="hidden" value="yes" name="proper7"/>
<input type="hidden" value= <?php echo $pid;?> name = "pid"/>
</form>
<?php
        echo '<script>document.getElementById("one").submit();</script>';
   
?>
</body>
</html>
