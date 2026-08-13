<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Salary Calculator</title>

    <style>
    body{
    font-family: Arial, Helvetica, sans-serif;
    background:#f4f6f9;
    margin:0;
    padding:30px;
}

.container{
    width:800px;
    margin:auto;
    background:#fff;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.2);
}

h2{
    text-align:center;
    color:#1565c0;
}

label{
    font-weight:bold;
}

input, select{
    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:5px;
    box-sizing:border-box;
}

button{
    width:100%;
    padding:12px;
    background:#1565c0;
    color:white;
    border:none;
    border-radius:5px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#0d47a1;
}

table{
    width:100%;
    margin-top:20px;
    border-collapse:collapse;
}

table, th, td{
    border:1px solid #ccc;
}

th{
    background:#1565c0;
    color:white;
    padding:10px;
}

td{
    padding:10px;
}
    </style>
</head>
<body>

<div class="container">

<h2>Tuition Fee Calcucalator</h2>

<form method="POST">

    <label>Student Name</label>
    <input type="text" name="name" required>

    <label>Total Tuition Fee</label>
    <input type="number" name="tuition" required>

    <label>Discount</label>
    <select name="discount" required>   
        <option value="">-- Select Discount --</option>
        <option value="0.10">10%</option>
        <option value="0.20">20%</option>
        <option value="0.50">50%</option>
        <option value="1.00">100%</option>
    </select>   

    <label>Months To Pay</label>
    <input type="number" name="months" min="1" required>

    <button type="submit" name="compute">
        Compute Tuition
    </button>

</form>

</div>

<?php 
if(isset($_POST["compute"])) {
  $name = $_POST["name"];
  $tuition = $_POST["tuition"];
  $discount = $_POST["discount"];
  $months = $_POST["months"];
  //COMPUTATION 
  $discountamount = $tuition * $discount;
  $balanceafterdiscount = $tuition - $discountamount;
  $monthlypayment = $balanceafterdiscount / $months;
  //COMPUTATION FOR BONUS
  if($monthlypayment >= 50000) {
    $status = "High MONTLY PAYMENT";
    }
  else if($monthlypayment >= 5000) {
    $status = "Moderate MONTHLY PAYMENT";
    }

  else {
    $status = "Affortable MONTHLY PAYMENT";
  }


?>
<table>

<tr>
    <th colspan="2">Salary Summary</th>
</tr>

<tr>
    <td>Student Name</td>
    <td><?php echo $name; ?></td>
</tr>

<tr>
    <td>Total Tuition Fee</td>
    <td>₱<?php echo number_format($tuition,2); ?></td>
</tr>

<tr>
    <td>discount rate</td>
    <td> <?php echo ($discount * 100)."%"; ?></td>
</tr>

<tr>
    <td>discount amount</td>
    <td style = "color:green">
        ₱<?php echo number_format($discountamount,2); ?></td>
</tr>

<tr>
    <td>balance after discount</td>
    <td>₱<?php echo number_format($balanceafterdiscount,2); ?></td>
</tr>

<tr>
    <td>moths to Pay</td>
    <td><?php echo $months; ?></td>
</tr>

<tr>
    <td>monthly payment</td>
    <td><strong><?php echo number_format($monthlypayment,2); ?></strong></td>
</tr>

<tr>
    <td><strong>payment status</strong></td>
    <td style="color:green;"><strong><?php echo $status; ?></strong></td>
</tr>

</table>

<?php 
}
?>

</div>

</body>
</html>
