<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Facades\App\Services\Geocoder;
use Illuminate\Http\Request;

class CheckPurchasingPower extends Controller
{
    public function __invoke(Request $request)
    {
        // ...

        $country = Geocoder::countryForIp($resolved_ip_address);
        if (is_null($country)) {
            abort(424);
        }

        $coupon = Coupon::findByCountry($country);
        if (is_null($coupon)) {
            return response()->noContent(200);
        }

        // ...
    }
}
