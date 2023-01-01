<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCR Text Recognizer</title>
    <header>OCR Image Text Recogniser<br><br><br></header>

</head>
<body>
    <form method="" action="">
        <label for="file_u">Choose the File(Format should be in jpg,png)</label>
        <input type="file" id="file_u" name="file_u"><br>
        <label for="image_u">Open Camera to Upload</label>
        <input type="file" id="image_u" name="image_u" accept="image/*" capture="environment"/><br>
    </form>
    <?php
    $file=$_POST(['file_u']);

    $servername = "localhost";
    $username = "username";
    $password = "password";
    
    $conn = new mysqli($servername, $username, $password);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $sql = "INSERT INTO ocr (Image)
VALUES (''$file')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

    $command = escapeshellcmd('python ./pytest.py');
    $output = shell_exec($command);
    echo $output;


?>
   
</body>
</html>