<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Enrollsubject;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        // return view('dashboard');
        $user_id = auth()->id();
        $data = Subject::all();
        $data_2 = Enrollsubject::where('user_id',$user_id)->get();
        
        return view('dashboard',['data'=>$data], ['data_2'=>$data_2]);
        // dd($data_2);

    }

    public function subjects()
    {
        $data = Question::all();
        return view('userquestions',['data'=>$data]);     
    }

    public function singlesub()
    {
        return "Hello from Controller";
    }
}
