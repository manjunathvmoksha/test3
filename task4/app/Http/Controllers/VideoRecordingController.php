<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use ProtoneMidea\laravelFFMpeg\support\FFMpeg;
use FFMpeg;
use App\Models\Attended;

class VideoRecordingController extends Controller
{
    //
    public function index(){
        // $submitText = NULL;
        return view('./');

        // return view('video');
    }

    public function store(Request $request){
        // dd($request);
        $file = tap($request->file('video'))->store('videos');
        $filename = pathinfo($file->hashName(), PATHINFO_FILENAME);
        $q_id = $request->question_id;
        $q_sub = $request->question_subject;
        
        // dd($q_id);
        // dd($filename);
        FFMpeg::fromDisk("local")
        ->open("videos/".$file->hashName())
        ->export()
        ->toDisk('local')
        ->inFormat(new \FFMpeg\Format\Video\x264('libmp3lame', 'libx264'))
        ->save('converted_videos/'.$filename.'.mp4');
        
        $user_id = auth()->id();
        $file_path = 'converted_videos/'.$filename.'.mp4';
                
        \DB::table('Attendeds')->insert([
            'user_id' => $user_id, 
            'question_id'=> $q_id,
            'q_subject'=>$q_sub,
            'video_path' => $file_path, 
        ]);

        return response()->json([
            'status'=> 'success'
        ]);
    }

    public function __invoke(Request $request)
    {
        FFMpeg::open($request->file('video'));
    }
}
