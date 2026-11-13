<h3 class = "text-center text-success">All orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

<?php
$get_orders="Select * from user_orders";
$result=mysqli_query($con,$get_orders);
$row_count=mysqli_num_rows($result);
echo "<tr> 
<th>Sl no</th>
<th>Due Amount</th>
<th>Invoice number</th>
<th>Total products</th>
<th>Order Date</th>
<th>Status</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='bg-secondary text-center text-light'>";

if($row_count==0){
    echo "<h2 class='bg-danger text-center mt-5'> No orders yet </h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result))
    {
    $order_id=$row_data['order_id'];   
    $user_id=$row_data['user_id'];
    $amount_due=$row_data['amount_due'];    
    $invoice_number=$row_data['invoice_number'];   
    $total_products=$row_data['total_products'];   
    $order_date=$row_data['order_date'];   
    $order_status=$row_data['order_status'];  
    $number++;
    echo "<tr> 
    <td>$number</td>
    <td>$amount_due</td>
    <td>$invoice_number</td>
    <td>$total_products</td>
    <td>$order_date</td>
    <td>$order_status</td>
    <td><a href=''class='text-light'>
    <svg xmlns='http://www.w3.org/2000/svg' width='23' height='23' fill='white' viewBox='0 0 448 512'>
      <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
      <path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/>
    </svg>
    </a></td>  
    
</tr>";
    }
}


?>

        
    </thead>
    </tbody>
</table>