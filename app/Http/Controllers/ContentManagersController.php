<?php

namespace App\Http\Controllers;

use App\Models\ContentManager;
use Illuminate\Http\Request;

class ContentManagersController extends Controller
{

    public function CompanyProfile(Request $request, $lang = "eng")
    {

        $company_profile = ContentManager::where('lang', $lang)->where('page','company-profile')->first();

        return view('manage.company_profile.index',compact('company_profile'));

    }

    public function Updated(Request $request, $id)
    {
//        company-profile updating
        if($request->page === "company-profile" )
        {
            $temp_content = [
                'title' => $request->input('title'),
                'content' =>  $request->input('content'),
            ];

            $data = [
                'lang' =>  $request->lang,
                'data' =>   json_encode($temp_content),
                'page' => 'company-profile'
            ];

            $company_profile = ContentManager::find($id);

            $company_profile->update($data);

            return redirect()->back()->with('success','company profile has been updated successfully');


        }




    }






}
