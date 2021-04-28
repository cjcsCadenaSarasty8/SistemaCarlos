<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <input type="checkbox" id="vehicle1" name="vehicle[]" value="Bike">
        <label for="vehicle1"> I have a bike</label><br>
        <input type="checkbox" id="vehicle2" name="vehicle[]" value="Car">
        <label for="vehicle2"> I have a car</label><br>
        <input type="checkbox" id="vehicle3" name="vehicle[]" value="Boat">
        <label for="vehicle3"> I have a boat</label><br><br>
        <input type="submit" name="btn" value="Submit">
      </form>
</body>
</html>

<?php
if(isset($_REQUEST['btn'])){
$prueba=$_REQUEST['vehicle'];
foreach($prueba as $vehicle){
echo $vehicle;
}
// echo $prueba;
$fff="";
}
?>