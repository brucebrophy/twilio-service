<?php

namespace App\Services;

use Twilio\Rest\Client;
use App\Contracts\SmsServiceContract;

class TwilioService implements SmsServiceContract
{
	protected $client;
	protected $number;

	public function __construct($number, Client $client)
	{
		$this->number = $number;
		$this->client = $client;
	}

	public function send($to, $message)
	{
		$this->client->messages->create(
			$to,
			[
				'from' => $this->number,
				'body' => $message,
			]
		);
	}
}