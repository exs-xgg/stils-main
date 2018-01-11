
<?php

$ch = curl_init();
$parameters = array(
    'apikey' => '200f074fcdcf72ad77770834757aacd2', //Your API KEY
    'number' => '09391626887',
    'message' => 'SMS from Semaphore',
    'sendername' => 'SEMAPHORE'
);
curl_setopt( $ch, CURLOPT_URL,'http://api.semaphore.co/api/v4/messages' );
curl_setopt( $ch, CURLOPT_POST, 1 );

//Send the parameters set above with the request
curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

// Receive response from server
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );
curl_close ($ch);

//Show the server response
echo $output;

?>