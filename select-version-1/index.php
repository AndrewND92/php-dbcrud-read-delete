<?php
// database comunication
$servername = "localhost:3306";
$user = "root";
$password = "root";
$db_name = "dbhotel";

// database check db situation
$connection = new mysqli($servername, $user, "root", $db_name);

if( $connection && $connection->connect_error ) {
  echo 'error?' . $connection->connect_error;
  print_r( $connection );

  return;
} else {
  echo 'ok<BR><BR>';
}

// write query sql
$sql =
    "
      SELECT *
        FROM pagamenti
    ";


// while on result
$result = $connection->query($sql);

if( $result && $result->num_rows > 0 ) {
  // while
  echo '<ul>';

  while( $row = $result->fetch_assoc() ) {
    if($row['id'] == 7) {
      echo '<li style="font-weight: bold;">';
    } else {
      echo '<li>';
    }

    echo $row['id'] ." - " .$row['status'] ." - " .$row['price'];
    echo '</li>';
  }

  echo '</ul>';
} else {
  print_r($result);
}


// close
$connection->close();

?>
