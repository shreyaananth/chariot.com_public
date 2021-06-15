<?php
    session_start();
    ob_start();
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
       
        $name = $_POST["productname"];
        $quan =$_POST["quantity"];
        $mc = $_POST["makingcharge"];
        $waste = $_POST["wastage"];
        $jewel = $_POST["jewel"];
        $ins = "INSERT INTO Inventory (pname,qty,mc,wastage,type) values ('$name', $quan,$mc,$waste,'$jewel')";
     
      if(!mysqli_query($conn,$ins)){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Inventory/INSERT/error.php?mes=".$mes);
        exit();
    }
    
     
     
        $query = "SELECT pid FROM Inventory where pname = '$name'";
     $r = mysqli_query($conn,$query);
     if(!$r){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Inventory/INSERT/error.php?mes=".$mes);
     }
      $r1 = mysqli_fetch_row($r);
      ?>
      <form id="one" action="http://localhost/chariot.com/Inventory/INSERT/gold.php" method="post"><input type="hidden" value="yes" name="proper1"/><input type="hidden" value= <?php echo $r1[0]; ?> name = "pid"/></form>
<?php
echo '<script>document.getElementById("one").submit();</script>';
?>
</body>
</html>
