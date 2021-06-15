<?php
    session_start();
    ob_start();
        if ($_POST["proper1"]!="yes"){
        $mes = "Invalid Acccess to webpage...Page not found";
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    $conn = mysqli_connect( "127.0.0.1","root", "shreya@02","The Chariot" );
    if (!$conn){
        $mes = "Not able to connect to server";
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
  
        $eid = $_POST["eid"];
        $cphno = $_POST["cphno"];
   
    $query = "SELECT * from employee where eid = $eid and desg='Sales person'";
    $res = mysqli_query($conn,$query);
   if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    
    $row = mysqli_fetch_row($res);
    if(!$row){
        $mes = "Invalid Employee Identity number...Try Again";
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    
    $query = "SELECT * from customer where phno = $cphno";
    $res = mysqli_query($conn,$query);
   if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    
     $row = mysqli_fetch_row($res);
?>

<html>
<body>
<form id="one" action="http://localhost/chariot.com/Billing/checkat.php" method="POST"></form>
<form id="two" action="http://localhost/chariot.com/Billing/newcus.php" method="POST"></form>

<input form="one" type="hidden" name="eid" value=<?php echo $eid; ?> />
<input form="one" type="hidden" name="proper4" value="yes" />

<input form="two" type="hidden" name="eid" value=<?php echo $eid; ?> />
<input form="two" type="hidden" name="cphno" value=<?php echo $cphno; ?> />
<input form="two" type="hidden" name="proper2" value="yes" />
<?php
    if(!$row){
        echo '<script>document.getElementById("two").submit();</script>';
    }
    
    $query = "select cid from customer where phno = $cphno";
     $res = mysqli_query($conn,$query);
     if(!$res){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    $row = mysqli_fetch_row($res);
    $cid = $row[0];
?>
<input form="one" type="hidden" name="cid" value=<?php echo $cid; ?> />
<?php
    echo '<script>document.getElementById("one").submit();</script>';
?>
</body>
</html>
