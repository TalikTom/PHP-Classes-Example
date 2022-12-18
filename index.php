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

        <?php if($account->getBalance() >= 0) { ?>

        <td class ="credit">

        <?php } else { ?>

        <td class ="overdrawn">

        <?php } ?>

        $<?= $account->getBalance() ?></td>
        j
    </tr>
    <?php } ?>
</table>
<br>
<table>
    <tr><th colspan="2">Data about broswer sent in HTTP headers</th></tr>
    <tr><th>Broswer IP address</th><td><?= $_SERVER['REMOTE_ADDR'] ?></td></tr>
    <tr><th>Type of browser</th><td><?= $_SERVER['HTTP_USER_AGENT'] ?></td></tr>
    <tr><th colspan="2">HTTP request</th></tr>
    <tr><th>Host name</th><td><?= $_SERVER['HTTP_HOST'] ?></td></tr>
    <tr><th>URI after host name</th><td><?= $_SERVER['REQUEST_URI'] ?></td></tr>
    <tr><th>Query string</th><td><?= $_SERVER['QUERY_STRING'] ?></td></tr>
    <tr><th>HTTP request method</th><td><?= $_SERVER['REQUEST_METHOD'] ?></td></tr>
    <tr><th colspan="2">Location of the file being executed</th></tr>
    <tr><th>Document root</th><td><?= $_SERVER['DOCUMENT_ROOT'] ?></td></tr>
    <tr><th>PATH from document root</th><td><?= $_SERVER['SCRIPT_NAME'] ?></td></tr>
    <tr><th>Absolute path</th><td><?= $_SERVER['SCRIPT_FILENAME'] ?></td></tr>

</table>

<?php include 'includes/footer.php'; ?>