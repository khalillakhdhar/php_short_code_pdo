<?php
class User
{
//Create code
    function adduser($email, $mdp, $nom, $telephone, $adresse, $grade)
    {
        try {
            include('../config/connect.php');
            $sql = "INSERT INTO `user`( `email`, `mdp`, `nom`, `telephone`, `adresse`, `grade`) VALUES ('" . $email . "','" . $mdp . "', '" . $nom . "', '" . $telephone . "', '" . $adresse . "', '" . $grade . "')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    //READ code
        function list_users()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web_mp";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
        return $result;
    }
    function deleteuser($id)
    {
        try {
            include('../config/connect.php');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM user WHERE id='" . $id . "'";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

//get current user
    function current()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web_mp";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM user WHERE id= '" . $_SESSION['id'] . "' ";
        $result = $conn->query($sql);
        return $result;
    }
    //count users
    function count()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web_mp";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(id) FROM user";
        $result = $conn->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }
    //authentification
      function connect( $email,$mdp )
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web_mp";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM user WHERE email= '" . $email . "' AND mdp='" . $mdp . "' ";
        $result = $conn->query($sql);
        
    if($result->num_rows > 0)
    return "ok";
    else {
return "no";
    }
    }
}
