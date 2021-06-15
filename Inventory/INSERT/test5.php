<?php
    session_start();
    ob_start();
        if ($_POST["proper6"]!="yes"){
        $mes = "Invalid Acccess to webpage...Page not found";
        header("Location: http://localhost/chariot.com/Inventory/INSERT/error.php?mes=".$mes);
        exit();
    }
?>
<html>
<body>
<?php
    $conn = mysqli_connect( "127.0.0.1","root", "shreya@02","The Chariot" );
    if (!$conn){
        $mes = "Not able to connect to server";
        header("Location: http://localhost/chariot.com/Inventory/INSERT/error.php?mes=".$mes);
        exit();
    }
  
        $pid = $_POST["pid"];
        $pp = $_POST["pp"];
        $pw =$_POST["pw"];
        $ins = "INSERT INTO Metal (pid,name,purity,wt) values ($pid, 'platinum',$pp,$pw)";
    ?>
          
    <form id="one" action="http://localhost/chariot.com/Inventory/INSERT/stone.php" method="post"><input type="hidden" value="yes" name="proper7"/><input type="hidden" value= <?php echo $pid;?> name = "pid"/></form>
    
    <?php
   if(mysqli_query($conn,$ins))
        echo '<script>document.getElementById("one").submit();</script>';
     else{
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Inventory/INSERT/error.php?mes=".$mes);
    }
   
?>
</body>
</html>
