<?php



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Sanitize the input to prevent SQL injection
    $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);

    // Prepare the SQL statement with a placeholder
    $sql = "SELECT * FROM tasks WHERE id = :id";

    
        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind the parameter
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute the statement
        $stmt->execute();

        // Fetch the result as an associative array
        $task = $stmt->fetch(PDO::FETCH_ASSOC);   
       
    
}