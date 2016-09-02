<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-08-29
 * Time: 20:09
 */
interface EmailServices
{
    public function sendEmail($mailSend, $nameSend, $subject, $messageSend);
    public function sendEmailMassive();
    public function sendEmailAttached();
    public function sendEmailMassiveAttached();
}