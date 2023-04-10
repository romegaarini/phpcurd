<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $Productname = isset($_POST['Product name']) ? $_POST['Product name'] : '';
    $Productprice = isset($_POST['Product price']) ? $_POST['Product price'] : '';
    $Qity= isset($_POST['Qity']) ? $_POST['Qity'] : '';
    $Total = isset($_POST['Total']) ? $_POST['Total'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO kontak VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $Productname, $Productprice, $Qity, $Total]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>New</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="Product name">Product name</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="Product name" id="Product name">
        <label for="Product price">Product price</label>
        <label for="Qity">Qity</label>
        <input type="text" name="Product price" id="Product price">
        <input type="text" name="Qity" id="Qity">
        <label for="Total">Total</label>
        <input type="text" name="Total" id="Total">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>