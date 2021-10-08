<?php 
 $conn = mysqli_connect('localhost', 'root', '', 'ecommerce');

    if (mysqli_connect_errno()) 
        echo 'Failed to connect to MySQL server: ' . mysqli_connect_error();      
    else {
		
        $adminID = generatePrimaryKey($conn);
        $Name = $_POST['name'];
        $Address = $_POST['address'];
        $Contact = $_POST['contact'];
        $Email = $_POST['email'];
        $Password = $_POST['password'];

        $query = "INSERT INTO admin VALUES('$adminID', '$Name', '$Address', '$Contact', '$Email', '$Password')";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        echo "Create Account Successful";
		header("Location: loginpage.html");
        
        if (mysqli_connect_errno()) {
            mysqli_close($conn);
            echo "Create Account Unsuccessful";
        }
    }

    function generatePrimaryKey($conn) {
        $primaryKey = "";
        while (checkPrimaryKey($primaryKey, $conn)) {
            $randomNumber = rand(1, 999999);
            if ($randomNumber >= 1 && $randomNumber <= 9) 
                $primaryKey = "00000" . $randomNumber;
            else if ($randomNumber >= 10 && $randomNumber <= 99) 
                $primaryKey = "0000" . $randomNumber;
            else if ($randomNumber >= 100 && $randomNumber <= 999) 
                $primaryKey = "000" . $randomNumber;
            else if ($randomNumber >= 1000 && $randomNumber <= 9999) 
                $primaryKey = "00" . $randomNumber;
            else if ($randomNumber >= 10000 && $randomNumber <= 99999) 
                $primaryKey = "0" . $randomNumber;
            else
                $primaryKey = (string) $randomNumber;
        }

        return ($primaryKey);
    }

    function checkPrimaryKey($primaryKey, $conn) {
        $exist = false;      
        if (strlen($primaryKey) == 0)
            $exist = true;
        else {
            $query = "SELECT AdminId FROM admin WHERE AdminId = '$primaryKey'";
            $result = mysqli_query($conn, $query); 
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result))
                    $exist = true;
            }
        }

        return $exist;
    }


?>