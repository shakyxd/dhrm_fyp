<?php
$dbname = "fyp";

// Create database connection
$conn = new mysqli('localhost', 'root', '', 'fyp');


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else

// check if form data was submitted
if (isset($_POST['submit'])) {
  // retrieve form data
  $date = $_POST['date'];
  $dentist = $_POST['dentist'];
  $summary = $_POST['summary'];
  $priority = $_POST['priority'];

  // insert appointment into database
  $sql = "INSERT INTO appointments (date, dentist, summary, priority)
          VALUES ('$date', '$dentist', '$summary', '$priority')";
  $conn->query($sql);
}

// retrieve appointments from database
$appointments = array();
$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  $appointments[] = $row;
}

// retrieve list of dentists from database
$dentists = array();
$sql = "SELECT name FROM dentists";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  $dentists[] = $row['name'];
}
?>

<!-- display appointment form -->
<form action="index.php" method="post">
  <label for="date">Date:</label>
  <input type="text" id="date" name="date"><br>
  <label for="dentist">Dentist:</label>
  <select id="dentist" name="dentist">
    <?php foreach ($dentists as $dentist) { ?>
      <option><?php echo $dentist; ?></option>
    <?php } ?>
  </select><br>
  <label for="summary">Summary:</label>
  <textarea id="summary" name="summary"></textarea><br>
  <label for="priority">Priority:</label>
  <input type="checkbox" id="priority" name="priority" value="yes"><br>
  <input type="submit" name="submit" value="Book Appointment">
</form>

<!-- display appointment list -->
<table>
  <tr>
    <th>Date</th>
    <th>Dentist</th>
    <th>Summary</th>
    <th>Priority</th>
  </tr>
  <?php foreach ($appointments as $appointment) { ?>
    <tr>
      <td><?php echo $appointment['date']; ?></td>
      <td><?php echo $appointment['dentist']; ?></td>
      <td><?php echo $appointment['summary']; ?></td>
      <td><?php echo $appointment['priority']; ?></td>
    </tr>
    <?php } ?>
</table>
