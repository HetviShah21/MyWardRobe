<h3 class = "text-center text-success">All payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

    <?php
$get_payments="Select * from user_payments";
$result=mysqli_query($con,$get_payments);
$row_count=mysqli_num_rows($result);

if($row_count==0){
    echo "<h2 class='text-danger text center mt-5'> No payments received yet </h2>";
}else{
    echo"<tr> 
<th>S1 no</th>
<th>Invoice number</th>
<th>Amount</th>
<th>Payment mode</th>
<th>Order Date</th>
<th>Delete</th>
</tr>
</thead>
<tbody  class='bg-secondary text-light'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
    $order_id=$row_data['order_id'];   
    $payment_id=$row_data['payment_id'];
    $amount=$row_data['amount'];    
    $invoice_number=$row_data['invoice_number'];   
    $payment_mode=$row_data['payment_mode'];  
    $date=$row_data['date'];   
    $number++;
    echo "<tr> 
    <td>$number</td>
    <td>$invoice_number</td>
    <td>$amount</td>
    <td>$payment_mode</td>
    <td>$date</td>
    <td>
    <a href=''class='text-light'>
    <svg xmlns='http://www.w3.org/2000/svg' width='23' height='23' fill='white' viewBox='0 0 448 512'>
    <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
    <path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/>
  </svg>
    </a>
    </td>
</tr>";
    }
}


?>

        
    </thead>
    </tbody>
</table>