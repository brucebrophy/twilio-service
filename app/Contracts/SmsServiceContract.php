<?php

namespace App\Contracts;

interface SmsServiceContract
{
	public function send($to, $message);
}