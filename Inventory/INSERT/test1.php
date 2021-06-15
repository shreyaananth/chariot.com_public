<?php
    session_start();
    ob_start();
        if ($_POST["proper2"]!="yes"){
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
        $gp = $_POST["gpurity"];
        $gw =$_POST["gweight"];
        $c1 = $_POST["c1"];
        $c2 = $_POST["c2"];
        $c3 = $_POST["c3"];
        
        $ins = "INSERT INTO gold (pid,wt,purity,yellow,rose,white) values ($pid, $gw,$gp,'$c1','$c3','$c2')";
          ?>
          
    <form id="one" action="http://localhost/chariot.com/Inventory/INSERT/metal.php" method="post">
    <input type="hidden" value="yes" name="proper3"/>
    <input type="hidden" value=1 name="atleast"/>
    <input type="hidden" value= <?php echo $pid;?> name = "pid"/>
    </form>
    
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
