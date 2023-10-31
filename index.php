<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #1BE4D3 ; /* Change the background color */
        margin: 0;
        padding: 10px;
        text-align: center;
    }

    h1 {
        color: black; /* Change the title color */
        font-size: 24px; /* Increase the title font size */
        margin-bottom: 20px; /* Add margin to title */
    }

    h2 {
       text-align: center;
       line-height: 1.5px;
    }

    table {
        width: 80%; /* Reduce table width */
        margin: 20px auto; /* Center-align the table */

    }

    th, td {
        padding: 12px;
        border: 1px solid #ccc;
        background-color: #f9f9f9; /* Light gray background color */
        color: #333;
    }

    th {
        background-color: #0077b6; /* Change header background color */
        color: #fff;
    }

    img {
        max-width: 100%; /* Make images responsive */
        display: block;
        margin: 20px auto;
    }

    .about-me {
        margin: 20px;
        text-align: center;
    }

    .image-row {
        margin: auto;   
         /* height: 50px;  */
    } 
    #row-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px;
    }

    .table-container {
        flex: 2;
        margin: 0 10px;
    }

     /* Media Query for Tablets and Smaller Screens */
     @media (max-width: 768px) {
        table {
            width: 100%; 
        }
    }

    /* Media Query for Mobile Phones */
    @media (max-width: 576px) {
        body{
            text-align: center;
            width: 100%;
        }
        h1 {
            font-size: 20px; 
        }
        table {
            display: block;
            width: 100%;
            margin: 20px auto auto;
        }
        .image-table {
            margin: 20px auto; 
        }
    }
</style>
</head>
<body>
    <h1>My Biography</h1>

    <?php
        // Connection parameters
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'profil';

        // Create connection
        $conn = new mysqli($host, $user, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    
        $sql = "SELECT * FROM user_profiles";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                
                if ($row["profile_image"]) {
                    $imageData = base64_encode($row["profile_image"]);
                    echo "<div class='image-row'>";
                    echo "<table>";
                    echo "<tr><th>Image</th></tr>";
                    echo "<tr><td><img src='data:image/jpeg;base64,$imageData' alt='Image'></td></tr>";
                    echo "</table>";
                    echo "</div>";
                    } 
                echo "<table>";
                echo "<tr><th>Name</th><th>Age</th><th>Gender</th><th>Date of Birth</th><th>Hobby</th><th>Contact Number</th><th>Email</th></tr>";
                echo "<tr>";
                echo "<td>" . $row["name"]. "</td>";
                echo "<td>" . $row["age"]. "</td>";
                echo "<td>" . $row["gender"]. "</td>";
                echo "<td>" . $row["date_of_birth"]. "</td>";
                echo "<td>" . $row["hobby"]. "</td>";
                echo "<td>" . $row["contact_number"]. "</td>";
                echo "<td>" . $row["email"]. "</td>";
                echo "</tr>";
                echo "</table>";


                echo "<table>";
                echo "<tr><th>About Myself</th></tr>";
                echo "<tr>";
                echo "<td><p>" . ($row["about_me"] ?? 'No information available') . "</p></td>";
                echo "</tr>";
                echo "</table>";
            }
        } else {
            echo "0 results";
        }

        
        $conn->close();
        ?>
    </body>
</html>