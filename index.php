<?php
include 'classes/Account.php';
include 'classes/Customer.php';

$accounts =
    [
        new Account(123456789, 'Checking', -100),
        new Account(987654321, 'Savings', 3000),
    ];

$customer = new Customer('Luka', 'Agic', 'luka@gmail.com', 'hunter2', $accounts);

$text = 'Testing built-in functions';

$image = "/xampp/htdocs/PHP-Classes-Example/img/";

$greetings = ['Hello ', 'Hi ', 'Vozdra ', 'Hidy ho '];

$greeting_key = array_rand($greetings);

$greeting = $greetings[$greeting_key];

$bestsellers = ['notebook', 'pencil', 'ink'];

$bestsellers_count = count($bestsellers);

$bestellers_text = implode(', ', $bestsellers);
$buyer =
    [
        'firstname' => 'Luka',
        'lastname' => 'Agic',
        'email' => 'luka@gmail.com'
    ];

if (array_key_exists('firstname', $buyer)) {
    $greeting .= $buyer['firstname'];
}

$cities =
    [
        'Zagreb' => 'Vukovarska 452, 10000',
        'Osijek' => 'Zagrebacka 12, 31000',
        'Vukovar' => 'Osjecka 10, 32000'
    ];

$city = $_GET['city'] ?? '';
$address = $cities[$city];
$valid = array_key_exists($city, $cities);
if ($valid) {

    $address = $cities[$city];

} else {
    $address = 'Please select a city';
}



$message = $_GET['msg'] ?? 'Click link on the bottom of the page';

function html_escape(string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTf-8', true);
}



?>

<?php include 'includes/header.php'; ?>

<h2><?= $greeting ?></h2>

<p><a href="phpinfo.php">PHP Info</a></p>

<?php
echo "The time is " . date("h:i:sa");
?>

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
        
    </tr>
    <?php } ?>
</table>

<table>
    <tr><th colspan="2" class="title">Data about broswer sent in HTTP headers</th></tr>
    <tr><th>Broswer IP address</th><td><?= $_SERVER['REMOTE_ADDR'] ?></td></tr>
    <tr><th>Type of browser</th><td><?= $_SERVER['HTTP_USER_AGENT'] ?></td></tr>
    <tr><th colspan="2" class="title">HTTP request</th></tr>
    <tr><th>Host name</th><td><?= $_SERVER['HTTP_HOST'] ?></td></tr>
    <tr><th>URI after host name</th><td><?= $_SERVER['REQUEST_URI'] ?></td></tr>
    <tr><th>Query string</th><td><?= $_SERVER['QUERY_STRING'] ?></td></tr>
    <tr><th>HTTP request method</th><td><?= $_SERVER['REQUEST_METHOD'] ?></td></tr>
    <tr><th colspan="2" class="title">Location of the file being executed</th></tr>
    <tr><th>Document root</th><td><?= $_SERVER['DOCUMENT_ROOT'] ?></td></tr>
    <tr><th>PATH from document root</th><td><?= $_SERVER['SCRIPT_NAME'] ?></td></tr>
    <tr><th>Absolute path</th><td><?= $_SERVER['SCRIPT_FILENAME'] ?></td></tr>

</table>

<table>
    <tr>
        <th>Lowercase:</th>
        <td><?= strtolower($text) ?></td>
    </tr>
    <tr>
        <th>Uppercase:</th>
        <td><?= strtoupper($text) ?></td>
    </tr>
    <tr>
        <th>Uppercase first letter:</th>
        <td><?= ucwords($text) ?></td>
    </tr>
    <tr>
        <th>Character count:</th>
        <td><?= strlen($text) ?></td>
    </tr>
    <tr>
        <th>Word count:</th>
        <td><?= str_word_count($text) ?></td>
    </tr>
</table>

<table>
    <tr>
        <th>First match (case-sensitive):</th>
        <td>"T" - <?=strpos($text, 'T'); ?></td>
        <td>"t"- <?=strpos($text, 't'); ?></td>
    </tr>
    <tr>
        <th>First match (case-insensitive)</th>
        <td>"T" - <?=stripos($text, 'T'); ?></td>
        <td>"t" - <?=stripos($text, 't'); ?></td>
    </tr>
    <tr>
        <th>Last match (case-sensitive):</th>
        <td>"T" - <?=strrpos($text, 'T'); ?></td>
        <td>"t"- <?=strrpos($text, 't'); ?></td>
    </tr>
    <tr>
        <th>Last match (case-insensitive)</th>
        <td>"T" - <?=strripos($text, 'T'); ?></td>
        <td>"t" - <?=strripos($text, 't'); ?></td>
    </tr>
    <tr>
        <th>Text after first match (case-sensitive)</th>
        <td>"B" - <?=strstr($text, 'B'); ?></td>
    </tr>
    <tr>
        <th>Text after first match (case-insensitive)</th>
        <td>"B" - <?=stristr($text, 'B'); ?></td>
    </tr>
</table>

<section>
    <p>Remove '/' from both ends:</p><br>
    <?= trim($image, '/'); ?> <br>
    <p>Remove '/' from left side:</p><br>
    <?= ltrim($image, '/'); ?> <br>
    <p>Remove '/' from right side:</p><br>
    <?= rtrim($image, '/'); ?> <br>
    <p>Replace 'xampp' with 'mamp':</p><br>
    <?= str_replace('xampp', 'mamp', $image); ?> <br>
    <p>String repeat:</p><br>
    <?= str_repeat($image, 3); ?> <br>
</section>

<p>
    Our top <?= $bestsellers_count ?> items today are:
    <b><?= $bestellers_text ?></b>
</p>

<?php foreach($cities as $key => $values) { ?>
    <a href="?city=<?= $key ?>"><?= $key ?></a>
<?php } ?>
<p><?= $city ?></p>
<p><?= $address ?></p>

<h4>XSS attack example</h4>
<a href="?msg=<script src=js/bad.js></script>" class="badlink">Link to demo xss attack</a>
<p><?= htmlspecialchars($message) ?></p>

<form action="index.php" method="POST">
  <p>Name:     <input type="text" name="name"></p>
  <p>Age:      <input type="text" name="age"></p>
  <p>Email:    <input type="text" name="email"></p>
  <p>Password: <input type="password" name="pwd"></p>
  <p>Bio:      <textarea name="bio"></textarea></p>
  <p>Contact preference:
    <select name="preferences">
      <option value="email">Email</option>
      <option value="phone">Phone</option>
    </select></p>
  <p>Rating: 
    1 <input type="radio" name="rating" value="1">
    2 <input type="radio" name="rating" value="2">
    3 <input type="radio" name="rating" value="3"></p>
  <p><input type="checkbox" name="terms" value="true"> 
  I agree to the terms and conditions.</p>
  <p><input type="submit" value="Save"></p>
</form>
<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $term = $_POST['term'];
    echo 'You searched for ' . htmlspecialchars($term);

} else { ?>
    <form action="index.php" method="POST">
        Search for: <input type="text" name="term">
        <input type="submit" value="search">
    </form>
<?php } ?>

<?php
$submitted = $_GET['sent'] ?? '';
if ($submitted === 'search') {

    $term = $_GET['term'] ?? '';
    echo 'You searched for ' . htmlspecialchars($term);

} else { ?>
    <form action="index.php" method="GET">
        Search for: <input type="text" name="term">
        <input type="submit" name="sent" value="search">
    </form>
<?php } ?>

<?php include 'includes/footer.php'; ?>