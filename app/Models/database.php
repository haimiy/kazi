<?php
// used to connect to the database
$host = "localhost";
$db_name = "kazi1";
$username = "root";
$password = "";
 
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
 
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>//start table
echo "<table class='table table-hover table-responsive table-bordered'>";
 
    //creating our table heading
    echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Action</th>
    </tr>";
 
    // table body will be here
 
// end table
echo "</table>";
// retrieve our table contents
// fetch() is faster than fetchAll()
// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
 
    // creating new table row per record
    echo "<tr>
        <td>{$id}</td>
        <td>{$name}</td>
        <td>{$description}</td>
        <td>${$price}</td>
        <td>";
            // read one record
            echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";
 
            // we will use this links on next part of this post
            echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";
 
            // we will use this links on next part of this post
            echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
        echo "</td>";
    echo "</tr>";
}
