<pre>
  <?php
           $conn = mysqli_connect("localhost", "root", "");
          foreach($parsedQuery as $key => $value)
          {
            $itemId = $value["itemId"];
            $query1 = "SELECT itemName,imageUrl,priceperkg FROM organicfarming.iteams WHERE itemId = '$itemId';";
            $result1 = mysqli_query($conn, $query1);
            $parsedQuery1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
            foreach($parsedQuery1 as key1 => $value1)
            {
              $image = $value1["imageUrl"];
              $iteamName = $value1["itemName"];
              $description = $value1["description"];
              $price = $value1['priceperkg'];
            }
        }
            
          ?>  
</pre>
