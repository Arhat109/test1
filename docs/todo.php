<?php
/**
 * File for any to do:
 *
 * @TODO 1. find/make base class and replace any ->sendEmail() with this for real SMTP transport
public function contact($email)
{
  if ($this->validate()) {
    Yii::$app->mailer->compose()
      ->setTo($email)
      ->setFrom(['oc.mcdir@yandex.ru' => $this->name]) // real mail for real transport!
      ->setSubject($this->subject)
      ->setTextBody($this->body)
      ->send()
    ;
  return true;
  }
  return false;
}
 *
 */
