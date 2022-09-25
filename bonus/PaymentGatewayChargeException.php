<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;

class PaymentGatewayChargeException extends \Exception
{
    /**
     * @var array
     */
    private $data;

    /**
     * PaymentGatewayChargeException constructor.
     * @param string $message
     * @param array $data
     */
    public function __construct(string $message, array $data)
    {
        $this->data = $data;

        parent::__construct($message);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function report()
    {
        Log::error('Card failed: ', $this->getData());
    }

    public function render($request)
    {
        return view('errors.generic', [
            'data' => $this->getData()['error'],
            'template' => 'partials.errors.charge_failed',
        ]);
    }
}
