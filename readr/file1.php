<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCR Text Recognizer</title>
    <style>
        html{
            background-color: #252525;
        }
        h1{
            color: rgb(201, 191, 11);
            text-decoration: underline;
            text-align: center ;
        }
        form{
            color: blanchedalmond;
            font-size: 28px;
        }
        input[type=file]
        {
            color: aqua;
            align-content: center;
            width: 100%;
        }

        input[type=submit]
        {
            color: rgb(10, 15, 6);
            background-color: rgba(231, 218, 25, 0.866) ;
            padding: 10px;
            font-size: 18px;
            margin: 10px;
            border-radius: 14px;
        }
        input[type=submit]:hover{
            background-color:  rgba(163, 153, 11, 0.866) ;
        }

    </style>
</head>
<h1>OCR Text Recognizer</h1>
<body>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="file_u">Choose the File(Format should be in jpg,png)</label><br>
        <input type="file" id="file_u" name="file" autocomplete="off" required><br>
        <input type="submit"/>
    </form>
 
    <?php
    $file=$_POST['file_u'];
     if(isset($_POST['submit'])) {
        
    $command = escapeshellcmd('python G:\xampp\htdocs\readr\pytest.py');
    
    $output = shell_exec($command);
    echo $output;
     }
?>
   describeMe@364
</body
</html>