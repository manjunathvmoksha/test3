
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
                    <h1> {{$sub}} Questions</h1>
                    <br>
                    <div class="table-responsive" onload="timerone();">
                        <input type="hidden" value="{{$sum}}" id="tot_time" name="tot_time"/>
                        <script>
                            let total_time = document.getElementById('tot_time').value;
                        </script>

                        <table class="table">
                            <tr>
                                <!-- <td class="p-6">Question</td> -->
                                <!-- <td class="p-6">Time</td> -->
                            </tr>
                            
                            @foreach($data as $i)
                            <tr>@php
                                $new_question = $i->question;
                                $nqid = $i->id;
                                $nxtqid = $nqid+1;
                                @endphp
                                <div id="appnew">
                                    <example-componentnew></example-componentnew>
                                    {{-- <componentnew> </componentnew> --}}
                                </div>
                                {{-- <td class="p-6 label-font">{{$i->question}}</td> --}}
                                {{-- <td class="p-6">{{$i->time}}</td> --}}

                                <form>
                                    <input type="hidden" value="{{$new_question}}" id="new_question" name="new_question"/>
                                    <input type="hidden" value="{{$i->subject}}" id="q_subject" name="q_subject"/>
                                    <input type="hidden" value="{{$i->id}}" id="q_id" name="q_id"/>
                                    <input type="hidden" value="{{$nxtqid}}" id="n_q_id" name="n_q_id"/>
                                    <input type="hidden" value="{{$i->time}}" id="timer" name="timer"/>
                                    <input type="hidden" value="{{auth()->id()}}" id="u_id" />
                                </form>
                                {{-- <p></p> --}}
                                <script>
                                    let n_question = document.getElementById('new_question').value;
                                    let timer_x = document.getElementById('timer').value;
                                    let qid = document.getElementById('q_id').value;
                                    let n_qid = document.getElementById('n_q_id').value;
                                    let q_sub = document.getElementById('q_subject').value;
                                    let user_id = document.getElementById('u_id').value;
                                </script>
                                    
                            </tr>
                          
                            @endforeach

                        </table>
                        {{-- <p>You have <span id='ntime'>{{$i->time}}</span> seconds to record your video</p> --}}
                        <input type="hidden" id="timer" class="timer" value="{{$i->time}}" />
                            <script>
                                let x = document.getElementById('timer').value;
                            </script>
                        <form>
                            {{-- <input type="hidden" name="v_name" id="v_name"/> --}}
                        </form>
                        <div ></div>
                        <div id="timer_display"></div>
                        {{-- <a href="../../userquestions/{{$i->subject}}/{{$next_id}}" id="next_btn" style="display: block"> Skip Question</a> --}}
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div id="app">
                        <example-component></example-component>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>

</script>

