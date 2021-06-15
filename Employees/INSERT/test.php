<?php
    session_start();
    if($_POST["proper"]!="yes" || !$_POST["gender"]){
        $mes = "Access to webpage denied.....page not found";
        header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes=".$mes);
        exit();
    }
    ob_start();
?>
<html>
<body>
<?php
    error_reporting(E_ALL ^ E_WARNING);
    $conn = mysqli_connect( "127.0.0.1","root", "shreya@02","The Chariot" );
    if (!$conn){
        $mes = "Not able to connect to server";
        header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes=".$mes);
        exit();
        
    }
  
    else if($conn)
    {
       
        $name = $_POST["addyourname"];
        $an =$_POST["addyouraadharnumber"];
        $pn = $_POST["addyourphonenumber"];
        $desgn = $_POST["designation"];
        $gender = $_POST["gender"];
       
        $sel = "SELECT count(*) FROM employee where name like '$name' and  gender like '$gender' and  aadhar like '$an' and desg like '$desgn' and phone like '$pn' and Employed like 'No'"; 
        $r1 = mysqli_query($conn,$sel);
        $row = mysqli_fetch_row($r1);
    
       if($row[0]==1){
           
        $sel = "SELECT * FROM employee where name like '$name' and  gender like '$gender' and  aadhar like '$an' and desg like '$desgn' and phone like '$pn' and Employed like 'No'"; 
            $r1 = mysqli_query($conn,$sel);
            $row1 = mysqli_fetch_row($r1);

            $query = "UPDATE employee SET Employed = 'Yes' WHERE eid = $row1[0]";

            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes=".$mes);
                exit();

            }
            else{
                header("Location: http://localhost/chariot.com/Employees/INSERT/Success.php");
                exit();

            }
        }

        if($desgn == "Branch Mngr"){
        $sel = "SELECT count(*) FROM employee where desg like '$desgn' and Employed like 'Yes'"; 
        $r1 = mysqli_query($conn,$sel);
        $row = mysqli_fetch_row($r1);
                 if($row[0]==1){
                    header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                    exit();

                 }
        }
        
        else if($desgn == "Floor Mngr"){
            $sel = "SELECT count(*) FROM employee where desg like '$desgn' and Employed like 'Yes'"; 
            $r1 = mysqli_query($conn,$sel);
            $row = mysqli_fetch_row($r1);
                     if($row[0]==4){
                        header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                        exit();

                     }
        }

        else if ($desgn == "Cust Srvc Mngr"){
            $sel = "SELECT count(*) FROM employee where desg like '$desgn' and Employed like 'Yes'"; 
            $r1 = mysqli_query($conn,$sel);
            $row = mysqli_fetch_row($r1);
                     if($row[0]==1){
                        header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                        exit();
                     }
        }

        else if ($desgn == "Accountant"){
            $sel = "SELECT count(*) FROM employee where desg like '$desgn' and Employed like 'Yes'"; 
            $r1 = mysqli_query($conn,$sel);
            $row = mysqli_fetch_row($r1);
                     if($row[0]==2){
                        header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                        exit();
                     }
        }

       $ins = "INSERT INTO employee (name,gender,aadhar,desg,phone) values ('$name', '$gender',$an,'$desgn',$pn)";
      
   if(mysqli_query($conn,$ins)){
    header("Location: http://localhost/chariot.com/Employees/INSERT/Success.php");

}
else{
    $mes = mysqli_error($conn);
    header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes=".$mes);
    exit();

}
       $sel = "UPDATE employee SET salesno = 0 where phone = $pn and aadhar = $an"; 
       $r1 = mysqli_query($conn,$sel);
                if(!$r1){
                   $mes = mysqli_error($conn);
                   header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                   exit();
                }
                $sel = "UPDATE employee SET daysalesno = 0 where phone like $pn and aadhar like $an"; 
                $r1 = mysqli_query($conn,$sel);
                         if(!$r1){
                            $mes = mysqli_error($conn);
                            header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                            exit();
                         }
         

       
       if($desgn == "Branch Mngr"){
        $sel = "UPDATE employee SET salary = 100000 where phone = $pn and aadhar = $an"; 
        $r1 = mysqli_query($conn,$sel);
                 if(!$r1){
                    $mes = mysqli_error($conn);
                    header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                    exit();
                 }
        }

        else if($desgn == "Floor Mngr"){
            $sel = "UPDATE employee SET salary = 80000 where phone = $pn and aadhar = $an"; 
            $r1 = mysqli_query($conn,$sel);
                     if(!$r1){
                        $mes = mysqli_error($conn);
                        header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                        exit();
                     }
            }
        else if($desgn == "Cust Srvc Mngr"){
            $sel = "UPDATE employee SET salary = 75000 where phone = $pn and aadhar = $an"; 
            $r1 = mysqli_query($conn,$sel);
                     if(!$r1){
                        $mes = mysqli_error($conn);
                        header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                        exit();
                     }
            }

        else if($desgn == "Accountant"){
            $sel = "UPDATE employee SET salary = 100000 where phone = $pn and aadhar = $an"; 
            $r1 = mysqli_query($conn,$sel);
                     if(!$r1){
                        $mes = mysqli_error($conn);
                        header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                        exit();
                     }
            }
        else if($desgn == "Goldsmith"){
                $sel = "UPDATE employee SET salary = 70000 where phone = $pn and aadhar = $an"; 
                $r1 = mysqli_query($conn,$sel);
                         if(!$r1){
                            $mes = mysqli_error($conn);
                            header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                            exit();
                         }
                }
        else if($desgn == "Sales person"){
            $sel = "UPDATE employee SET salary = 50000 where phone = $pn and aadhar = $an"; 
            $r1 = mysqli_query($conn,$sel);
                     if(!$r1){
                        $mes = mysqli_error($conn);
                        header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                        exit();
                     }
            }
        else if($desgn == "Cashier"){
                $sel = "UPDATE employee SET salary = 50000 where phone = $pn and aadhar = $an"; 
                $r1 = mysqli_query($conn,$sel);
                         if(!$r1){
                            $mes = mysqli_error($conn);
                            header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                            exit();
                         }
                }
        else if($desgn == "Janitor"){
            $sel = "UPDATE employee SET salary = 20000 where phone = $pn and aadhar = $an"; 
            echo $sel;
            $r1 = mysqli_query($conn,$sel);

            if(!$r1){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                exit();
             }

            $sel = "SELECT * from employee where phone = $pn and aadhar = $an"; 
            echo $sel;
            $r1 = mysqli_query($conn,$sel);
            echo $r1;
            if(!$r1){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                exit();
             }
            $row = mysqli_fetch_row($r1);
            echo $row;
            }

            else if($desgn == "Refreshment Provider"){
                $sel = "UPDATE employee SET salary = 20000 where phone = $pn and aadhar = $an"; 
                $r1 = mysqli_query($conn,$sel);
                         if(!$r1){
                            $mes = mysqli_error($conn);
                            header("Location: http://localhost/chariot.com/Employees/INSERT/error.php?mes= ");
                            exit();
                         }
                }

        header("Location: http://localhost/chariot.com/Employees/INSERT/Success.php");
   
   }
?>
</body>
</html>
