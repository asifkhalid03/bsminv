<?php


use App\Models\ContentManager;
use Illuminate\Support\Facades\DB;
use App\Models\User;

    function CompanyProfile($lang)
    {
       $temp_data =  ContentManager::where('lang', $lang)->where('page','company-profile')->first();


        $data = json_decode($temp_data->data);



        return $data;

    }





?>
