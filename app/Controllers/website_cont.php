<?php

// namespace App\Controllers;
namespace App\Controllers;
 use App\models\user_model;
 use App\models\login_model;
 use App\models\website_model;


class website_cont extends BaseController
{
    public function blogs()
    {
        $model = new website_model();
        // die;
       $data =  $model->get_blog_data();
       $newsdata =  $model->get_news_data();
       $newsdata=json_decode(json_encode($newsdata),true);
        $data=json_decode(json_encode($data),true);
        return view('website/ui',['data'=>$data , 'newsdata'=> $newsdata]);
    }

    public function contactus(){
        $data = $this->request->getPost();
        // print_r($data);
        // die;
        $model = new website_model();
        $data =  $model->contact_us( $data);
        return view('success'); 

       
    }

}
