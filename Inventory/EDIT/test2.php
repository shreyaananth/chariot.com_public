<?php
    session_start();
    ob_start();
        if ($_POST["proper5"]!="yes"){
        $mes = "Invalid Acccess to webpage...Page not found";
        header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
        exit();
    }
    
    $conn = mysqli_connect( "127.0.0.1","root", "shreya@02","The Chariot" );
    if (!$conn){
        $mes = "Not able to connect to server";
        header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
        exit();
    }
    
    
    $del = $_POST["del"];
    $view = $_POST["view"];
    $pid = $_POST["sel"];
    
    if($del=="yes"){
        $q0 = "UPDATE Inventory set qty=-1 where pid = $pid";
        if(!mysqli_query($conn,$q0)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                exit();
            }
        header("Location: http://localhost/chariot.com/Inventory/EDIT/Success.php");
        exit();
    }
    
    if($view=="no"){
    $p = $_POST["pid"];
    $pname = $_POST["pname"];
    $mc = $_POST["mc"];
    $wastage =$_POST["wastage"];
    $qty = $_POST["qty"];
    $category = $_POST["category"];
    $i = 0;
    $n = sizeof($pname);
        while($i<$n){
            if($p[$i]==$pid){
                 $q1 = "UPDATE Inventory SET pname = '$pname[$i]' WHERE pid = $pid ";
                 
                 if(!mysqli_query($conn,$q1)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                exit();

            }
                 $q2 = "UPDATE Inventory SET mc = $mc[$i] WHERE pid = $pid ";
                 
                 if(!mysqli_query($conn,$q2)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                exit();

            }
                 $q3 = "UPDATE Inventory SET wastage = $wastage[$i] WHERE pid = $pid ";
                 
                 if(!mysqli_query($conn,$q3)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                exit();

            }
                 $q4 = "UPDATE Inventory SET type = '$category[$i]' WHERE pid = $pid ";
                 
                 if(!mysqli_query($conn,$q4)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                exit();

            }
                 if($qty>=0){
                    $q5 = "UPDATE Inventory SET qty = $qty[$i] WHERE pid = $pid ";
                    
                    if(!mysqli_query($conn,$q5)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Inventory/EDIT/error.php?mes=".$mes);
                exit();

            }
                }
                 break;
            }
            $i = $i +1;
        }
    }
?>



<html>
<body>
    <form id="one"action="http://localhost/chariot.com/Inventory/EDIT/detailview.php" method="POST" >
        <input type="hidden" name="proper6" value="yes" />
        <input type="hidden" name="pid" value=<?php echo $pid; ?> />
    </form>
<?php
        echo '<script>document.getElementById("one").submit()</script>';
?>
</body>
</html>

