<?php

namespace Database\Seeders;

use App\Models\ContentManager;
use Illuminate\Database\Seeder;

class Company_Profile_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $temp_content = [
            'title' => "BSM Investments"  ,
            'content' =>  "Since 1986, BSM Investments, Inc. has been engaged in venture capital, early and mid-term technology companies, and venture capital and private equity investments in the global real estate industry. BSM has more than 30 years of management and investment experience, as well as direct operating experience in emerging companies and start-up companies. BSM Investments has provided funding and consulting support to many successful companies and large global real estate projects. Details of the long-term care facility project we plan to build in Utah in 2021. This investment is an EB5 project located in the United States. Chinese investors can live in the United States during the EB5 waiting period without levying U.S. taxes and investors who do not seek EB5 status, The minimum investment is USD 100,000 and the project has an annual return rate of 11%.",
        ];

        $data = [
           'lang' => 'eng',
           'data' =>   json_encode($temp_content),
           'page' => 'company-profile'
        ];



        ContentManager::create($data);

    }
}
