$hash = hash_init('sha256');

// This is what eBay sends you as a GET param, leave it alone.
$challengeCode=$_GET['challenge_code'];

// Make something up and use it as the Verification Token on the eBay form, 32-80 chars.
$verificationToken='c2edb7d327ca6ff20abe70751d655efffc4d4320923cadf';

// This is the same url you want to use as the endpoint on the form. (the url you're editing right now)
$endpoint='https://YOURWEBSITE.COM/verify_made.php'; 

// Don't modify anything below this line.

hash_update($hash, $challengeCode);
hash_update($hash, $verificationToken);
hash_update($hash, $endpoint);

$responseHash = hash_final($hash);


$obj = (object)[];
$obj->challengeResponse = $responseHash;
$objJSON = json_encode($obj);

echo $objJSON;

// Enjoy!
