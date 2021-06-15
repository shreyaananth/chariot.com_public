<?php
session_start();
if($_POST["proper2"]!="yes"){
$mes = "Access to webpage denied.....page not found";
        header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
        exit();
}
    ob_start();
?>
<html>
<body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    $conn = mysqli_connect("127.0.0.1","root", "shreya@02","The Chariot" );
    if (!$conn){
        $mes = "Not able to connect to server";
        header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
        exit();
    }
  
    else if($conn)
    {
       $k = $_POST["eid"];
        $b = $_POST["ename"];
        $c = $_POST["phone"];
        $d = $_POST["aadhar"];
        $e = $_POST["designation"];
        $f = $_POST['gender'];
        $g = $_POST['salary'];
        $h = $_POST['todaysales'];
        $j = $_POST['totalsales'];
        $l = $_POST['Employed'];
       
        $i = 0;
        $n = sizeof($b);
        while($i<$n){
            if($l[$i]=='Yes'){
            $query = "UPDATE employee SET name = '$b[$i]' WHERE eid = $k[$i] ";  
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                exit();

            }
        }
            $i = $i + 1;
        }

        $i = 0;
        while($i<$n){
            if($l[$i]=='Yes'){
            $query = "UPDATE employee SET phone = $c[$i] WHERE eid = $k[$i] ";  
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                exit();

            }
        }
            $i = $i + 1;
        }

        $i = 0;
        while($i<$n){
            if($l[$i]=='Yes'){
            $query = "UPDATE employee SET aadhar = $d[$i] WHERE eid = $k[$i] ";  
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                exit();

            }
        }
            $i = $i + 1;
        }
      

        $i = 0;
        while($i<$n){
            if($l[$i]=='Yes'){
            $query = "UPDATE employee SET gender = '$f[$i]' WHERE eid = $k[$i] ";  
           
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                exit();

            }
        }
            $i = $i + 1;
        }

        
        $i = 0;

       while($i<$n){
            if($l[$i]=='Yes' && $g[$i]!=0){
            $query = "UPDATE employee SET salary = $g[$i] WHERE eid = $k[$i] ";  
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                exit();

            }
        }
            $i = $i + 1;

        }

        $i = 0;
        
        while($i<$n){
            if($l[$i]=='Yes' && $g[$i]==0){
                if($e[$i] == "Branch Mngr"){
                
                   
                    $sel = "SELECT count(*) FROM employee where desg like '$e[$i]' and Employed like 'Yes'";
                    $r1 = mysqli_query($conn,$sel);
                     if(!$r1){
                            $mes = mysqli_error($conn);
                            header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes= ");
                            exit();
                         }
                     $row = mysqli_fetch_row($r1);
                             if($row[0]==1){
                             $i = $i +1;
                               continue;
                             }
                    }
                    
                    else if($e[$i] == "Floor Mngr"){
                    
                        $sel = "SELECT count(*) FROM employee where desg like '$e[$i]' and Employed like 'Yes'";
                        
                        $r1 = mysqli_query($conn,$sel);
                         if(!$r1){
                            $mes = mysqli_error($conn);
                            header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes= ");
                            exit();
                         }
                         
                        $row = mysqli_fetch_row($r1);
                                 if($row[0]==4){
                                 $i = $i +1;
                                    continue;
                                 }
                    }
            
                    else if ($e[$i] == "Cust Srvc Mngr"){
                        $sel = "SELECT count(*) FROM employee where desg like '$e[$i]' and Employed like 'Yes'";
                        $r1 = mysqli_query($conn,$sel);
                         if(!$r1){
                            $mes = mysqli_error($conn);
                            header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes= ");
                            exit();
                         }
                        $row = mysqli_fetch_row($r1);
                                 if($row[0]==1){
                                 $i = $i +1;
                                    continue;
                                 }
                    }
            
                    else if ($e[$i] == "Accountant"){
                        $sel = "SELECT count(*) FROM employee where desg like '$e[$i]' and Employed like 'Yes'";
                        $r1 = mysqli_query($conn,$sel);
                         if(!$r1){
                            $mes = mysqli_error($conn);
                            header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes= ");
                            exit();
                         }
                        $row = mysqli_fetch_row($r1);
                                 if($row[0]==2){
                                 $i = $i +1;
                                    continue;
                                 }
                    }
            
            
            
            
                $query = "UPDATE employee SET desg = '$e[$i]' WHERE eid = $k[$i]";

            
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                exit();

            }

            if($g[$i]==0 && $l[$i]=='Yes'){
            if($e[$i] == "Branch Mngr"){
                $sel = "UPDATE employee SET salary = 100000 where phone = $c[$i] and aadhar = $d[$i]"; 
                $r1 = mysqli_query($conn,$sel);
                         if(!$r1){
                            $mes = mysqli_error($conn);
                            header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes= ");
                            exit();
                         }
                }
        
                else if($e[$i] == "Floor Mngr"){
                    $sel = "UPDATE employee SET salary = 80000 where phone = $c[$i] and aadhar = $d[$i]"; 
                    $r1 = mysqli_query($conn,$sel);
                             if(!$r1){
                                $mes = mysqli_error($conn);
                                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes= ");
                                exit();
                             }
                    }
                else if($e[$i] == "Cust Srvc Mngr"){
                    $sel = "UPDATE employee SET salary = 75000 where phone = $c[$i] and aadhar = $d[$i]"; 
                    $r1 = mysqli_query($conn,$sel);
                             if(!$r1){
                                $mes = mysqli_error($conn);
                                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes= ");
                                exit();
                             }
                    }
        
                else if($e[$i] == "Accountant"){
                    $sel = "UPDATE employee SET salary = 100000 where phone = $c[$i] and aadhar = $d[$i]"; 
                    $r1 = mysqli_query($conn,$sel);
                             if(!$r1){
                                $mes = mysqli_error($conn);
                                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes= ");
                                exit();
                             }
                    }
                else if($e[$i] == "Goldsmith"){
                        $sel = "UPDATE employee SET salary = 70000 where phone = $c[$i] and aadhar = $d[$i]"; 
                        $r1 = mysqli_query($conn,$sel);
                                 if(!$r1){
                                    $mes = mysqli_error($conn);
                                    header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes= ");
                                    exit();
                                 }
                        }
                else if($e[$i] == "Sales person"){
                    $sel = "UPDATE employee SET salary = 50000 where phone = $c[$i] and aadhar = $d[$i]"; 
                    $r1 = mysqli_query($conn,$sel);
                             if(!$r1){
                                $mes = mysqli_error($conn);
                                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes= ");
                                exit();
                             }
                    }
                else if($e[$i] == "Cashier"){
                        $sel = "UPDATE employee SET salary = 50000 where phone = $c[$i] and aadhar = $d[$i]"; 
                        $r1 = mysqli_query($conn,$sel);
                                 if(!$r1){
                                    $mes = mysqli_error($conn);
                                    header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes= ");
                                    exit();
                                 }
                        }
                else if($e[$i] == "Janitor"){
                    $sel = "UPDATE employee SET salary = 20000 where phone = $c[$i] and aadhar = $c[$i]"; 
                    $r1 = mysqli_query($conn,$sel);
        
                    if(!$r1){
                        $mes = mysqli_error($conn);
                        header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes= ");
                        exit();
                     }
                    }
        
                    else if($e[$i] == "Refreshment Provider"){
                        $sel = "UPDATE employee SET salary = 20000 where phone = $c[$i] and aadhar = $d[$i]"; 
                        $r1 = mysqli_query($conn,$sel);
                                 if(!$r1){
                                    $mes = mysqli_error($conn);
                                    header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes= ");
                                    exit();
                                 }
                        }
                    }
                }
            $i = $i + 1;
        }

        $i = 0;
        while($i<$n){
            if($l[$i]=='Yes' && $e[$i] == "Sales person"){
            $query = "UPDATE employee SET daysalesno = $h[$i] WHERE eid = $k[$i] ";  
            if($l[$i]=='Yes'){
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                exit();

            }
        }
    }
            $i = $i + 1;
        }

        $i = 0;
        while($i<$n){
            if($l[$i]=='Yes'  && $e[$i] == "Sales person"){
            $query = "UPDATE employee SET salesno = $j[$i] WHERE eid = $k[$i] ";  
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                exit();
            }
        }
            $i = $i + 1;
        }

        $i = 0;
        
       while($i<$n){
        $query = "SELECT Employed from employee WHERE eid = $k[$i] ";
        $res11 = mysqli_query($conn,$query);
            if(!$res11){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                exit();

            }
            $row11 = mysqli_fetch_row($res11);
            $y = $row11[0];
            $x = $l[$i];
            
            $query = "UPDATE employee SET Employed = '$l[$i]' WHERE eid = $k[$i] ";
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                exit();

            }
            
            if($x=="Yes" && $y=="No"){
             $query = "UPDATE employee SET desg = 'Yet to be Assigned' WHERE eid = $k[$i] ";
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                exit();

            }
    
            $query = "UPDATE employee SET salary = 0 WHERE eid = $k[$i] ";
            if(!mysqli_query($conn,$query)){
                $mes = mysqli_error($conn);
                header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                exit();
    
            }
            }
    
            $i = $i + 1;
        }

   
        $a = $_POST['del'];
       echo $a;
        foreach($a as $i){
            $query = "UPDATE employee SET employed = 'No' WHERE eid = $i ";       
            if(!mysqli_query($conn,$query)){
                  $mes = mysqli_error($conn);
                  header("Location: http://localhost/chariot.com/Employees/EDIT/error1.php?mes=".$mes);
                  exit();

              }
        
        }


    
    header("Location: http://localhost/chariot.com/Employees/EDIT/Success1.html");

    }
?>
</body>
</html>
