# Validation - Input Validation Engine

Validation claims to be the most awesome validation engine ever created for PHP. But can it deliver? See for yourself:

use Respect\Validation\Validator as v; 

// Simple Validation 

$number = 123;
v::numeric()->validate($number); //true 

// Chained Validation 

$usernameValidator = v::alnum()->noWhitespace()->length(1,15);
$usernameValidator->validate('alganet'); //true 

// Validating Object Attributes 

$user = new stdClass;
$user->name = 'Alexandre';
$user->birthdate = '1987-07-01'; 

// Validate its attributes in a single chain: 

$userValidator = v::attribute('name', v::string()->length(1,32))
                  ->attribute('birthdate', v::date()->minimumAge(18)); 

$userValidator->validate($user); //true

With this library you can validate your forms or other user-submitted data. In addition, it supports a wide number of existing checks, throwing exceptions and customizable error messages.
