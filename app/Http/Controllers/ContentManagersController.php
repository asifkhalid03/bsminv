<?php

namespace App\Http\Controllers;

use App\Models\ContentManager;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class ContentManagersController extends Controller
{

    public function CompanyProfile(Request $request, $lang = "eng")
    {

        $company_profile = ContentManager::where('lang', $lang)->where('page','company-profile')->first();



        return view('manage.company_profile.index',compact('company_profile'));

    }


    public function BusinessOverview(Request $request, $lang = "eng")
    {

        $business_overview = ContentManager::where('lang', $lang)->where('page','business-overview')->first();

        return view('manage.business_overview.index',compact('business_overview'));

    }

    public function OurOperations(Request $request, $lang = "eng")
    {

        $our_operations = ContentManager::where('lang', $lang)->where('page','our-operations')->first();

        return view('manage.our_operations.index',compact('our_operations'));

    }

    public function OurProjectDeleted($id)
    {
        $our_project =  Project::find($id);

        $name = $our_project['id']."_project_image".".jpg";
        $filePath = '/public/images/projects/'.$name;

        if (Storage::exists($filePath))
        {
            Storage::delete($filePath);
        }



        Project::destroy($id);




        return redirect()->back()->with('success','Project has been deleted successfully');

    }

    public function OurProject(Request $request, $lang = "eng",$id = null)
    {
        $edit_project = null;


        if($id!==null)
        {

            $edit_project = Project::find($id);


        }

        $our_projects = Project::get();

        $page = "our-project";

        return view('manage.our_project.index',compact('our_projects','page','lang','edit_project'));

    }



    public function Updated(Request $request, $id)
    {






//        company-profile updating
        if($request->page === "company-profile" )
        {
            if ($request->hasFile('image'))
            {

                $name = "company_profile.jpg";

                $filePath = '/public/images/'.$name;

                Storage::put($filePath, file_get_contents($request->file('image')));

            }

            $temp_content = [
                'title' => $request->input('title'),
                'content' =>  $request->input('content'),
                'image' => $name??$request->input('default_image'),
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
        elseif($request->page === "business-overview" )
        {
            if ($request->hasFile('image_1'))
            {


                $name_1 = "business_overview_1.jpg";

                $filePath = '/public/images/'.$name_1;

                Storage::put($filePath, file_get_contents($request->file('image_1')));

            }

            $temp_content = [
                'title' => $request->input('title'),
                'content' =>  $request->input('content'),
                'image_1' => $name_1??$request->input('default_image_1'),

            ];




            $data = [
                'lang' =>  $request->lang,
                'data' =>   json_encode($temp_content),
                'page' => 'business-overview'
            ];

            $company_profile = ContentManager::find($id);

            $company_profile->update($data);


            return redirect()->back()->with('success','Business Overview has been updated successfully');

        }
        elseif($request->page === "our-operations" )
        {


            if ($request->hasFile('image_1'))
            {


                $name_1 = "our_operations_1.jpg";

                $filePath = '/public/images/'.$name_1;

                Storage::put($filePath, file_get_contents($request->file('image_1')));

            }

            $temp_content = [
                'title' => $request->input('title'),
                'content' =>  $request->input('content'),
                'image_1' => $name_1??$request->input('default_image_1'),

            ];


            $data = [
                'lang' =>  $request->lang,
                'data' =>   json_encode($temp_content),
                'page' => 'our-operations'
            ];

            $company_profile = ContentManager::find($id);

            $company_profile->update($data);


            return redirect()->back()->with('success','Our Operations has been updated successfully');



        }
        elseif($request->page === "our-project" )
        {



            if($id==="0")
            {



                $data = [
                    'lang' =>  $request->lang,
                    'title' => $request->input('title'),
                    'title_2' => $request->input('title_2'),
                    'data' =>  $request->input('content')
                ];


                $our_projects = Project::create($data);



            }else
            {
                $data = [
                    'lang' =>  $request->lang,
                    'title' => $request->input('title'),
                    'title_2' => $request->input('title_2'),
                    'data' =>  $request->input('content')
                ];



                $our_projects = Project::find($id);

                $our_projects->update($data);

            }




            if ($request->hasFile('image') &&  !empty($our_projects['id']) )
            {

                $name = $our_projects['id']."_project_image".".jpg";

                $filePath = '/public/images/projects/'.$name;

                Storage::put($filePath, file_get_contents($request->file('image')));

                DB::table('projects')->where('id', $our_projects['id'])->update(['image'=>$name]);

            }




            return redirect()->back()->with('success','Our Projects has been updated successfully');

        }



        return false;



    }








}
