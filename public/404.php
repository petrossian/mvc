<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body style="display: flex; width:100%; height:100vh; align-items: center; justify-content: center;box-sizing:border-box; border:0;padding:0;margin:0;background-color:black;">
    <div>
        <h1 style="color:#0f0;"><span style="color: red;">error text =</span> <?php echo $error_text ?></h1>
        <h4 style="color:#0f0;"><span style="color: red;">error line =</span> <?php echo $error_line ?></h4>
        <h4 style="color:#0f0;"><span style="color: red;">error file =</span> <?php echo $error_file ?></h4>
        <h4 style="color:#0f0;"><span style="color: red;">error code =</span><?php echo $error_code ?></h4>
    </div>
</body>
</html>