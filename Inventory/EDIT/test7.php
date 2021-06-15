<?php
    session_start();
    ob_start();
        if ($_POST["proper8"]!="yes"){
        $mes = "Invalid Acccess to webpage...Page not found";
        header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
        exit();
    }
?>
<html>
<body>
<?php
    $conn = mysqli_connect( "127.0.0.1","root", "shreya@02","The Chariot" );
    if (!$conn){
        $mes = "Not able to connect to server";
        header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
        exit();
    }
   
        $pid = $_POST["pid"];
        $sn = $_POST["stonename"];
        $sv = $_POST["svalue"];
        $cut =$_POST["cut"];
        $colour =$_POST["colour"];
        $cl =$_POST["clarity"];
        $wt =$_POST["weight"];
        $n =$_POST["num"];
        $done = $_POST["done"];
        $ins = "INSERT INTO Stone (pid,name,cut,clarity,colour,value,wt,no) values ($pid, '$sn','$cut','$cl','$colour',$sv,$wt,$n)";
    ?>
          
    <form id="one" action="http://localhost/chariot.com/Inventory/EDIT/stone.php" method="post"><input type="hidden" value="yes" name="proper7"/><input type="hidden" value= <?php echo $pid;?> name = "pid"/></form>
     
    
    <?php
   if(!mysqli_query($conn,$ins)){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
    }
    if($done=="yes"){
        header("Location: http://localhost/chariot.com/Inventory/EDIT/Success.php");
        exit();
    }
   else{
    $_SESSION["ip4"] = 1;
    echo '<script>document.getElementById("one").submit()</script>';
   }
   
?>
</body>
</html>
