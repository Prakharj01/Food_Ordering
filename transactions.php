<?php
if(isset($_POST['delete']) AND $_POST['delete']=='true')
{
    $user = $_COOKIE["username"];
    $itemId = $_POST['itemId'];
    $quantity = $_POST['itemQty'];
    echo $user;
    echo $itemId;
    $conn = mysqli_connect("localhost", "root", "");
    $query = "DELETE FROM organicfarming.transactions WHERE user='$user' AND itemId = '$itemId';";
    $query1 = "UPDATE organicfarming.iteams SET quantity = quantity + '$quantity' WHERE itemId = '$itemId';";
    $result = mysqli_query($conn, $query);
    $result1 = mysqli_query($conn, $query1);
    if($result)
    {
        header("Location:cart.php?error=1");
    }
}
if(isset($_POST['transaction']) AND $_POST['transaction'] == 'true')
{
    $itemtype = $_POST['fruitsorvegs'];
    $user = $_COOKIE["username"];
    $quantity = $_POST["quantity"];
    $item = $_POST["itemId"];
    $conn = mysqli_connect("localhost", "root", "");
    $query = "INSERT INTO organicfarming.transactions VALUES ('$user','$item','$quantity');";
    $query1 = "UPDATE organicfarming.iteams SET quantity = quantity - '$quantity' WHERE itemId = '$item';";
    $result = mysqli_query($conn, $query);
    $result1 = mysqli_query($conn, $query1);
    if($result)
    {
        if($itemtype == "fruits")
        {
            header("Location:fruits.php");
        }
        if($itemtype == "vegetable")
        {
            header("Location:vegetable.php");
        }
        
    }
}

?>