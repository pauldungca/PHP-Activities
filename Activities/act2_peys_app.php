<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
</head>
<body>

<h2>Peys App</h2>
<form method="post">
    <label for="pictureSize">Select Photo Size:</label>
    <input type="range" name="pictureSize" id="pictureSize" min="10" max="100" step="9"><br>
    <label for="colorPicker">Select Border Color: </label>
    <input type="color" name="colorPicker" id="colorPicker" value="<?php echo isset($_POST['colorPicker']) ? htmlspecialchars($_POST['colorPicker']) : '#000000'; ?>"><br>
    <button type="submit" name="ProcessButton">Process</button><br><br><br><br><br>
</form>

<?php 
    $pictureSize = 50; 
    $borderColor = '#000000'; 
    if (isset($_POST['ProcessButton'])) {
        $pictureSize = intval($_POST['pictureSize']); 
        $borderColor = htmlspecialchars($_POST['colorPicker']);     
    }
?>

<img src="../images/samplePhoto.png" style="width: <?php echo ($pictureSize + 50); ?>px; height: <?php echo ($pictureSize + 50); ?>px; margin-left: 50px; border: 5px solid <?php echo $borderColor; ?>;">

</body>
</html>