<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\SocialMedia;
use App\Models\WhyChooseUs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {

        $data["company"] = Company::where('id', 1)->first();

        $data["socials"] = SocialMedia::where('active', 1)->orderBy('sort_order')->get();

        $data["why_choose_us"] = WhyChooseUs::where('active', 1)->where('content_id', 3)->orderBy('sort_order')->get();

        view()->share($data);
    }
}
