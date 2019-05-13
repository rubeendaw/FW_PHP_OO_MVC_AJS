<?php
class controller_contact {
    function __construct() {
        $_SESSION['module'] = "contact";
    }

    function send_contact(){
        $arrArgument = array(
            'type' => 'contact',
            'token' => '',
            'inputName' => $_POST['name'],
            'inputEmail' => $_POST['email'],
            'inputSubject' => $_POST['matter'],
            'inputMessage' => $_POST['message']
        );
        try{
            $json = enviar_email($arrArgument);
            echo "true";
        } catch (Exception $e) {
            echo "false";
        }

        $arrArgument = array(
            'type' => 'admin',
            'token' => '',
            'inputName' => $_POST['name'],
            'inputEmail' => $_POST['email'],
            'inputSubject' => $_POST['matter'],
            'inputMessage' => $_POST['message']
        );
        try{
            $json = enviar_email($arrArgument);
        } catch (Exception $e) {
            // echo "<div class='alert alert-error'>Server error. Try later...</div>";
        }
    }

}