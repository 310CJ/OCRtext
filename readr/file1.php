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
    $command = escapeshellcmd('python3 pytest.py');
    $output = shell_exec($command);
    echo $output;
?>
   
</body>
</html>