<?php
require_once("libs/Db.php");
$objDb = new Db();
$db = $objDb->database;

$query = $db->prepare("SELECT * FROM member");
$query->execute();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="insert-form.php">เพิ่มข้อมูล</a>
    <table border="1">
      <thead>
        <tr>
          <th>ID</th>
          <th>Firstname</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $query->fetch(PDO::FETCH_OBJ)){ ?>
        <tr>
          <td><?php echo $row->id ?></td>
          <td><?php echo $row->firstname ?></td>
          <td><?php echo $row->status ?></td>
          <td> <a href="view.php?id=<?php echo $row->id ?>">view</a> | edit | delete </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </body>
</html>
