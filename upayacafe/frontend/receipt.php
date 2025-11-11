<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['order'])) {
  header('Location: pos.php');
  exit;
}

$order = $_POST['order'];
$total = 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Receipt - Upâyâ Café</title>
  <link rel="stylesheet" href="pos.css" />
  <script src="pos.js"></script>
</head>
<body>
<div class="receipt-container" style="max-width: 600px; margin: 50px auto; background:#f7efe6; border-radius:15px; padding:20px; font-family: 'Poppins', sans-serif; color:#3e2f22;">
  <h2 style="text-align:center; font-style:italic;">Upâyâ Café Receipt</h2>
  <hr>
  <table style="width:100%; border-collapse: collapse; margin-top: 15px;">
    <thead>
      <tr style="border-bottom: 2px solid #a8855a; font-weight: 700;">
        <td>Item</td>
        <td style="text-align:center;">Qty</td>
        <td style="text-align:right;">Price</td>
        <td style="text-align:right;">Subtotal</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($order as $item): 
          $name = htmlspecialchars($item['name']);
          $price = (float)$item['price'];
          $qty = (int)$item['qty'];
          $subtotal = $price * $qty;
          $total += $subtotal;
      ?>
      <tr style="border-bottom:1px solid #ddd;">
        <td><?= $name ?></td>
        <td style="text-align:center;"><?= $qty ?></td>
        <td style="text-align:right;">₱<?= number_format($price, 2) ?></td>
        <td style="text-align:right;">₱<?= number_format($subtotal, 2) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr style="font-weight:bold; font-size:1.1em;">
        <td colspan="3" style="text-align:right; padding-top: 15px;">TOTAL</td>
        <td style="text-align:right; padding-top: 15px;">₱<?= number_format($total, 2) ?></td>
      </tr>
    </tfoot>
  </table>
  <p style="margin-top: 30px; text-align:center; font-style: italic;">Thank you for dining with us!</p>
  <a href="pos.php" style="display:block; width:100%; text-align:center; background:#896a4b; color:#efe4db; padding: 10px; border-radius: 12px; text-decoration:none; font-weight:600;">Back to POS</a>
</div>
</body>
</html>
