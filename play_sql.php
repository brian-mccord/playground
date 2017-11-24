 <?php
    $servername = "localhost";
    $username = "testuser";
    $password = "test";
    $dbname = "localDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully to $dbname <br>";

    // SQL function to perform
    $sql = "UPDATE MyGuests SET lastname='Smith' WHERE id=2";
    
    // Execute and verify SQL
    if ($conn->multi_query($sql)) {
        echo "Records created successfully<br>";
        $last_id = $conn->insert_id;
        echo "Last inserted ID is: $last_id";
    } else {
        echo "Error: " . $conn->error;
    } echo "<br>";

    // Close connection
    //mysqli_close();
    $conn->close();
    echo "Connection closed";

    /*  To create a table in a database
    
    $sql = "CREATE TABLE MyGuests(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP 
    )";

    */

    /* To insert a single record into a database

    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";
    
    */

    /* To insert multiple records into a database simultaneously

    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com');";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('Mary', 'Moe', 'mary@example.com');";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('Julie', 'Dooley', 'julie@example.com')";

    // And remember to change the $conn->query($sql) to multi_query
    
    */

    /* To use binding statements (quicker for multiple executions)

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $firstname, $lastname, $email);

    // Set parameters and execute
    $firstname = "J";
    $lastname = "D";
    $email = "johndoe@example.com";
    $stmt->execute();

    $firstname = "Julia";
    $lastname = "Doolia";
    $email = "jmoney@example.com";
    $stmt->execute();

    $stmt->close();

    */

    /* To select data from a table

    $sql = "SELECT id, firstname, lastname FROM MyGuests";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        } 
    } else {
        echo "0 results";
    }

    */

    /* To delete a record

    $sql = "DELETE FROM MyGuests WHERE id=3";

    */

    /* Limit number of records returned

    $sql = "SELECT * FROM Orders LIMIT 30"; 
    $sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";
    
    */
?> 