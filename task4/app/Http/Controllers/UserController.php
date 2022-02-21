<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\React;
use App\Models\Node;
use App\Models\Enrollsubject;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
// use DataTables;

class UserController extends Controller
{
    //

    public function sub($sub, $id)
    {
        if($sub == 'ReactJs')
        {
            $last2 = React::orderBy('id', 'DESC')->first();
            $last_id = $last2->id;
            if($id > $last_id)
            {
                return redirect('complete');
            }else{
                $data = React::where('id', $id)->get();
                // dd($data);
                if( $data->count())
                {
                    $next_id = (int)$id+1;
                    // dd($next_id);
                    return view('userquestions',['data'=>$data], ['next_id'=>$next_id, 'sub'=>$sub]);   
                }else
                {
                    $id = (int)$id+1; 
                    // dd($sub);
                    return redirect('userquestions/'.$sub.'/'.$id);
                }
    
            }

        }elseif($sub == 'NodeJs')
        {
            // $main = Node::all();
            // $data = Node::where('id', $id)->get();
            // dd($data);
            $last2 = Node::orderBy('id', 'DESC')->first();
            $last_id = $last2->id;
            if($id > $last_id)
            {
                return redirect('complete');
            }else{
                $data = Node::where('id', $id)->get();
                // dd($data);
                if( $data->count())
                {
                    $next_id = (int)$id+1;
                    // dd($next_id);
                    return view('userquestions',['data'=>$data], ['next_id'=>$next_id, 'sub'=>$sub]);   
                }else
                {
                    $id = (int)$id+1; 
                    // dd($sub);
                    return redirect('userquestions/'.$sub.'/'.$id);
                }
    
            }
        }
        
        // return view('userquestions',['data'=>$data], ['sub'=>$sub]);   
    }

    public function complete()
    {
        return view('complete');
    }

    public function enroll($id)
    {
        // return $id;
        $user_id = auth()->id();
        $data = Enrollsubject::where('subject', $id)->where('user_id', $user_id)->get();
        if($data)
        {
            return view('course',['data'=>$data]);
        }else
        {
            $question = new Enrollsubject;
            $question->user_id = $user_id;
            $question->subject = $id;
            $question->save();    
            return redirect('dashboard');
        }
    }

    public function courses()
    {
        $user_id = auth()->id();
        $data = Enrollsubject::where('user_id', $user_id)->get();
        // dd($data_2);
        if($data)
        {
            return view('course',['data'=>$data]);
        }else
        {
            return redirect('dashboard');
        }

    }



}
