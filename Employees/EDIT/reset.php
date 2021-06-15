<?php
session_start();
if($_POST["proper"]!="yes"){
$mes = "Access to webpage denied.....page not found";
        header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
        exit();
}
ob_start();
?>
<html>
<body>
<?php
    $conn = mysqli_connect( "127.0.0.1","root", "shreya@02","The Chariot" );
    if (!$conn){
        $mes = "Not able to connect to server";
        header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
        exit();

        
    }
  
    else if($conn)
    {
        $query = "UPDATE employee SET salesno = salesno + daysalesno";
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                exit();
            }
            
        $query = "UPDATE employee SET daysalesno = 0";  
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                exit();
            }
            header("Location: http://localhost/chariot.com/Employees/EDIT/Success1.html");
    }
?>
</body>
</html>
