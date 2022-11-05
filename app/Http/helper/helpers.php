<?php


use App\Models\ContentManager;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Models\User;

    function CompanyProfile($lang)
    {
       $temp_data =  ContentManager::where('lang', $lang)->where('page','company-profile')->first();

        $data = [];
        if(!empty($temp_data->data))
        {
            $data = json_decode($temp_data->data);
        }

        return $data;

    }

    function ContactUS($lang)
    {
        $temp_data =  ContentManager::where('lang', $lang)->where('page','contact-us')->first();

        $data = [];
        if(!empty($temp_data->data))
        {
            $data = json_decode($temp_data->data);
        }


        return $data;

    }


    function BusinessOverview($lang)
    {
        $temp_data = ContentManager::where('lang', $lang)->where('page','business-overview')->first();


        $data = [];
        if(!empty($temp_data->data))
        {
            $data = json_decode($temp_data->data);
        }


        return $data;

    }


    function OurOperations($lang)
    {
        $temp_data = ContentManager::where('lang', $lang)->where('page','our-operations')->first();


        $data = [];
        if(!empty($temp_data->data))
        {
            $data = json_decode($temp_data->data);
        }


        return $data;

    }

    function OurProject($lang = "eng")
    {
        $eng_title = DB::table('content_managers')->where('page','our-project')->where('lang','eng')->select('data')->value('data');
        $chi_title = DB::table('content_managers')->where('page','our-project')->where('lang','chi')->select('data')->value('data');

        $data = [
            'eng_title'=>$eng_title,
            'chi_title'=>$chi_title
        ];

        $data[] =  Project::where('lang', $lang)->get()??[];

        return $data;

    }





?>
