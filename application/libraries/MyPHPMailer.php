<?php
class MyPHPMailer
{
    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function MyPHPMailer()
    {
        require_once(APPPATH.'third_party/phpmailer/class.PHPMailer.php');
        require_once(APPPATH.'third_party/phpmailer/class.SMTP.php');
    }
}