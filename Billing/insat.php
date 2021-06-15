<?php
    session_start();
    ob_start();
        if ($_POST["proper7"]!="yes"){
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
        $cid = $_POST["cid"];
        $dob = $_POST["dob"];
        $address = $_POST["address"];
    
    $query = "INSERT INTO athreyam (cid, dob,address) values($cid, '$dob', '$address')";
   if(!mysqli_query($conn,$query)){
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Billing/error.php?mes=".$mes);
        exit();
    }
    
?>

<html>
<body>
<form id="one" action="http://localhost/chariot.com/Billing/price.php" method="POST"></form>
<input form="one" type="hidden" name="eid" value=<?php echo $eid; ?> />
<input form="one" type="hidden" name="cid" value=<?php echo $cid; ?> />
<input form="one" type="hidden" name="proper8" value="yes" />
</body>
</html>
<?php
        echo '<script>document.getElementById("one").submit();</script>';
?>
