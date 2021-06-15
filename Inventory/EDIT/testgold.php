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
        $gp = $_POST["gpurity"];
        $gw =$_POST["gweight"];
        $c1 = $_POST["c1"];
        $c2 = $_POST["c2"];
        $c3 = $_POST["c3"];
        
        $ins = "INSERT INTO gold (pid,wt,purity,yellow,rose,white) values ($pid, $gw,$gp,'$c1','$c3','$c2')";
   if(mysqli_query($conn,$ins)){
        header("Location: http://localhost/chariot.com/Inventory/EDIT/Success.php?mes=".$mes);
        exit();
        }
     else{
        $mes = mysqli_error($conn);
        header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
    }
   
?>
</body>
</html>
