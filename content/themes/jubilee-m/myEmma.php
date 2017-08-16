<?php
  /*
  * myEmma
  *
  * handles submitting form data to MyEmma. 
  * API information can be found under config.php
  * 
  */
  include 'config.php';
  
  $response = array();
  // Sanitize form fields, add response if empty.
  if ( !empty( $_POST['jub17_email'] ) ){
    $email = filter_var( $_POST['jub17_email'], FILTER_SANITIZE_EMAIL);
  } else {
    $response[] = "Please enter a valid email.";
  }
  if ( !empty( $_POST['jub17_name'] ) ){
    $name = filter_var( $_POST['jub17_name'], FILTER_SANITIZE_STRING); 
  } else {
    $response[] = "Please enter your name.";
  }

  // Curl function, see myEmma documentation for more details
  if ( !empty( $name ) && !empty( $email ) ) {
    
    $member_data = array(
      "email" => $email,
      "fields" => array(
        "name" => $name,
      ),
    );
    
    // Set URL
    $url = "https://api.e2ma.net/".$account_id."/members/add";
    // setup and execute the cURL command
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERPWD, $public_api_key . ":" . $private_api_key);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($member_data));
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($member_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $head = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if($http_code > 200){
      $response[] = "Error sending request, please try again.";
    }else{
      $response[] = "Thank you for signing up!";
    }
  }
  
  echo json_encode($response);
?>