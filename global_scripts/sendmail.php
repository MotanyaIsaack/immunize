<?php
require '../../vendor/autoload.php';
function send_mail($fullname,$to,$subject,$contents){
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("fredah.kioko@strathmore.edu", "Immunize");
    $email->setSubject($subject);
    $email->addTo($to, $fullname);
    $email->addContent(
        "text/html", $contents
    );
    // $email->addContent(
    //     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
    // );
    $sendgrid = new \SendGrid('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');
    try {
        $response = $sendgrid->send($email);
        return true;
        // print $response->statusCode() . "\n";
        // print_r($response->headers());
        // print $response->body() . "\n";
    } catch (Exception $e) {
        return false;
        // echo '<script>alert("Email Failed");</script>';
        // echo 'Caught exception: '. $e->getMessage() ."\n";
}
}
