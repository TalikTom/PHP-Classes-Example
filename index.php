<?php
include 'classes/Account.php';
include 'classes/Customer.php';

$accounts =
    [
        new Account(123456789, 'Checking', -100),
        new Account(987654321, 'Savings', 3000),
    ];

$customer = new Customer('Luka', 'Agic', 'luka@gmail.com', 'hunter2', $accounts)
?>

<?php include 'includes/header.php'; ?>

<h2>Name: <?= $customer->getFullName(); ?></h2>

<table>
    <tr>
        <th>Account Number</th>
        <th>Account Type</th>
        <th>Balance</th>
    </tr>
    <?php foreach($customer->accounts as $account) { ?>
    <tr>
        <td><?= $account->number ?></td>
        <td><?= $account->type ?></td>
        <td><?= $account->getBalance() ?></td>
    </tr>
    <?php } ?>
</table>

<?php include 'includes/footer.php'; ?>