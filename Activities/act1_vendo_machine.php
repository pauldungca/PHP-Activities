<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
</head>
<body>

    <?php 
        $softdrinks = 
            [
                'Coke' => 15,
                'Sprite' => 20,
                'Royal' => 20,
                'Pepsi' => 15,
                'Mountain Dew' => 20
            ];  
    ?>
    
    <h2>Vendo Machine</h2>
    <form method="post">
        <fieldset style="width: 35%;">
            <legend>Products:</legend> 
            <input type="checkbox" name="CheckDrinks[]" id="CheckCoke" value="Coke"> 
            <label for="CheckCoke">Coke - ₱ 15</label><br>
            <input type="checkbox" name="CheckDrinks[]" id="CheckSprite" value="Sprite"> 
            <label for="CheckSprite">Sprite - ₱ 20</label><br>
            <input type="checkbox" name="CheckDrinks[]" id="CheckRoyal" value="Royal"> 
            <label for="CheckRoyal">Royal - ₱ 20</label><br>
            <input type="checkbox" name="CheckDrinks[]" id="CheckPepsi" value="Pepsi"> 
            <label for="CheckPepsi">Pepsi - ₱ 15</label><br>
            <input type="checkbox" name="CheckDrinks[]" id="CheckMountainDew" value="Mountain Dew"> 
            <label for="CheckMountainDew">Mountain Dew - ₱ 20</label><br>
        </fieldset>
        <fieldset style="width: 35%;">
            <legend>Options:</legend> 
            <label for="Size">Size: </label>
            <select name="Size">
                <option value="Regular" selected>Regular</option>
                <option value="UpSize">Up-Size (add ₱ 5)</option>
                <option value="Jumbo">Jumbo (add ₱ 10)</option>
            </select>
            <label for="Quantity">Size: </label>
            <input type="number" name="Quantity" id="Quantity" min="0" value="0">
            <button type="submit" name="CheckOutButton">Check Out</button>      
        </fieldset>
    </form>

    <?php 
        if (isset($_POST['CheckOutButton'])) {
            echo '<hr>';
            if (isset($_POST['CheckDrinks']) && $_POST['Quantity'] > 0) {
                $drinks = $_POST['CheckDrinks'];
                $size = $_POST['Size'];
                $quantity = $_POST['Quantity'];
                $additional = 0;
                $totalAmount = 0;
                $totalQuantity = 0;
                if ($size == 'UpSize') {
                    $additional = 5; 
                } 
                elseif ($size == 'Jumbo') {
                    $additional = 10;
                } 
                echo 'Purchase Summary:';          
    ?>           

    <ul>
        <?php 
            foreach ($drinks as $drink) {              
                $price = $softdrinks[$drink];
                $total = ($price + $additional) * $quantity;   
                $totalQuantity += $quantity;  
                $totalAmount += $total;
                echo "<li>$quantity pieces of $size $drink amounting to ₱ $total.</li>";
            }
        ?>
    </ul>

    <p style="margin: 0;"><b>Total Numbers of Items: <?php echo $totalQuantity ?></b></p>
    <p style="margin: 0;"><b>Total Amount: <?php echo '₱ '.$totalAmount ?></b></p>

    <?php             
            } 
            else if (isset($_POST['CheckDrinks']) && $_POST['Quantity'] == 0) {
                echo "Please enter the quantity of the items.";
            }   
            else {
                echo "Please choose an item in the options.";
            }
        }
    ?>
    
</body>
</html>