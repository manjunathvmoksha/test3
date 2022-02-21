
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Questions') }}
        </h2>
    </x-slot>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div> -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>All {{$sub}} Question list</h1>
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <!-- <td class="p-6">Question</td> -->
                                <!-- <td class="p-6">Time</td> -->
                            </tr>
                            
                            @foreach($data as $i)
                            <tr>
                                <td class="p-6 label-font">{{$i->question}}</td>
                                <!-- <td class="p-6">{{$i->time}}</td> -->
                                <form>
                                    <input type="hidden" value="{{$i->subject}}" id="q_sub" name="q_sub"/>
                                    <input type="hidden" value="{{$i->id}}" id="q_id" name="q_id"/>
                                    <input type="hidden" value="{{$i->time}}" id="timer" name="timer"/>
                                </form>
                                <script>
                                    let timer_x = document.getElementById('timer').value;
                                    let qid = document.getElementById('q_id').value;
                                    let q_sub = document.getElementById('q_sub').value;
                                    // console.log(qid);
                                    // let new_qid = document.getElementById('question_id');
                                    // new_qid.value = qid;
                                </script>
                                    
                            </tr>
                          
                            @endforeach

                        </table>
                        <p>You have {{$i->time}} seconds to record your video</p>
                        <form>
                            <input type="hidden" name="v_name" id="v_name"/>
                        </form>
                        <a href="../../userquestions/{{$i->subject}}/{{$next_id}}" id="next_btn" style="display: block"> Skip Question</a>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- <div id="timer_display"></div> --}}
                    <div id="app">
                        <example-component></example-component>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

