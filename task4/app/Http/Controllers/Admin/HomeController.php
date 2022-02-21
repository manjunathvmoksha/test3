<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use App\Models\React;
use App\Models\Node;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Attended;


class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }

    public function newuser()
    {
        return view('admin.adduser');
    }

    public function subj()
    {
        return view('admin.sel_subject');
    }

    public function newquestion()
    {   
        return view('admin.addquestion');
    }

    public function addnewquestion($sub)
    {
        // dd($sub);
        // return $sub;
        return view('admin.addquestion',['sub'=>$sub]);
    }

    public function list()
    {
        $data = User::all();
        $users_id = Attended::select('user_id')->distinct()->get();
        $user_id = $users_id;
        // dd($user_id);
        return view('admin.userlist',['data'=>$data, 'user_id'=>$user_id]);
    }

    public function adduser(Request $req )
    {
        $member = new User;

        $member->name = $req->name;
        $member->email = $req->email;
        $member->password = Hash::make($req->password);
        $member->save();

        return redirect('admin/dashboard');

    }

    public function addquestion(Request $req )
    {
        // dd($req);
        $sub =  $req->subject;
        if($sub == 'ReactJs')
        {
            $question = new React;
            $question->subject = $req->subject;
            $question->question = $req->question;
            $question->time = $req->time;
            $question->save();
        }elseif($sub == 'NodeJs')
        {
            $question = new Node;
            $question->subject = $req->subject;
            $question->question = $req->question;
            $question->time = $req->time;
            $question->save();
        }

        return redirect('admin/questionlist/'.$sub);

    }
    public function questionlist($sub)
    {
        if($sub == 'ReactJs')
        {
            $data = React::all();
        }
        else
        {
            $data = Node::all();
        }
        // dd($data);
        return view('admin.questionlist',['data'=>$data], ['sub'=>$sub]);
    }

    public function q_update($sub, $id)
    {
        if($sub== 'ReactJs')
        {
            $data_q = React::find($id);
        }elseif($sub== 'NodeJs')
        {
            $data_q = Node::find($id);
        }
        // dd($data_q);
        // return view('admin.updatequestion', compact('data_q','id'));
        return view('admin.updatequestion',['data_q'=>$data_q], ['sub'=>$sub]);
        // return response()->json($data_q);
    }

    public function updatequestion(Request $req )
    {
        // return $req;
        // dd($req);
        $sub = $req->subject;
        // dd($sub);   
        if($sub == 'ReactJs')
        {
            $question = React::find($req->id);
            // dd($question);
            $question->subject = $req->subject;
            $question->question = $req->question;
            $question->time = $req->time;
            $question->save();
        }elseif($sub == 'NodeJs')
        {
            $question = Node::find($req->id);
            $question->subject = $req->subject;
            $question->question = $req->question;
            $question->time = $req->time;
            $question->save();
        }
        
        // dd($question);

        return redirect('admin/questionlist/'.$sub);

    }

    public function deletequestion($sub, $id)
    {   
        if($sub== 'ReactJs')
        {
            $question = React::where('id',$id)->first();

            // $question = React::find($id);
            $question->delete();
            return redirect('admin/questionlist/'.$sub);
        }elseif($sub == 'NodeJs')
        {
            $question = Node::where('id',$id)->first();
            // $question = Node::find($id);
            $question->delete();
            return redirect('admin/questionlist/'.$sub);
        }
        // dd($question);
    }

    public function attended_sub($u_id){
        return view('admin.attend_sub',['u_id'=>$u_id]);
    }

    public function attended_question($sub, $u_id){
        // dd($sub);
        $uid = $u_id;
        if($sub == 'ReactJs')
        {
            // dd($uid);
            $data = React::join('attendeds', 'question_id', '=', 'reacts.id')->where('q_subject', $sub)
            ->get(['file_name', 'question']);

            // $question
            return view('admin.attend_question',['data'=>$data]);
        }elseif($sub == 'NodeJs')
        {
            $data = Node::join('attendeds', 'question_id', '=', 'nodes.id')->where('q_subject', $sub)
            ->get(['file_name', 'question']);
            // $question_id = Attended::select('user_id')->distinct()->get();
    
            return view('admin.attend_question',['data'=>$data]);
        }
       

    }

}
