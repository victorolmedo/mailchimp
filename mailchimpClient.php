<?php

require('Mailchimp.php');    // You may have to modify the path based on your own configuration.

$api_key = "09a8ds09a8sd09a8sd0a98sd09a8sd-us19";
$list_id = "123234";
$mail=$_POST['mail'];
$Mailchimp = new Mailchimp( $api_key );
$Mailchimp_Lists = new Mailchimp_Lists( $Mailchimp );

try 
{
    $subscriber = $Mailchimp_Lists->subscribe(
        $list_id,
        array('email' => $mail),      // Specify the e-mail address you want to add to the list.
        '', //array('FNAME' => 'Victor', 'Olmedo' => 'Vic'),   // Set the first name and last name for the new subscriber.
        'text',    // Specify the e-mail message type: 'html' or 'text'
        FALSE,     // Set double opt-in: If this is set to TRUE, the user receives a message to confirm they want to be added to the list.
        TRUE       // Set update_existing: If this is set to TRUE, existing subscribers are updated in the list. If this is set to FALSE, trying to add an existing subscriber causes an error.
    );
} 
catch (Exception $e) 
{
    echo "Caught exception: " . $e;
}

if ( ! empty($subscriber['leid']) )
{
    echo "Subscriber added successfully.";
}
else
{
    echo "Subscriber add attempt failed.";
}

?>