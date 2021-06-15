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
        $sp = $_POST["silverp"];
        $sw =$_POST["silverw"];
        $ins = "INSERT INTO Metal (pid,name,purity,wt) values ($pid, 'silver',$sp,$sw)";
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
