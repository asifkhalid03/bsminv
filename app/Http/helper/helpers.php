<?php


use App\Models\ContentManager;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Models\User;

    function CompanyProfile($lang)
    {
       $temp_data =  ContentManager::where('lang', $lang)->where('page','company-profile')->first();

        $data = json_decode($temp_data->data);

        return $data;

    }


    function BusinessOverview($lang)
    {
        $temp_data = ContentManager::where('lang', $lang)->where('page','business-overview')->first();

        $data = json_decode($temp_data->data);

        return $data;

    }


    function OurOperations($lang)
    {
        $temp_data = ContentManager::where('lang', $lang)->where('page','our-operations')->first();

        $data = json_decode($temp_data->data);

        return $data;

    }

    function OurProject()
    {
        return  Project::get()??[];

    }





?>
