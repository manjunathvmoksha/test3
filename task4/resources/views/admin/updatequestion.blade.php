<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User List') }}
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
                    <h2><a href="./addquestion" :active="request()->routeIs('/addquestion/'" >Add New Question</a></h2></br>
                    <h1>All Question list</h1>
                    <!-- <x-nav-link :href="route('admin.userlist')" :active="request()->routeIs('admin.userlist')">
                        {{ __('User List') }}
                    </x-nav-link> -->
                    <br>
                    <!-- <form method="POST" action="./{{$data_q['id']}}">
                        @csrf
                        <input type="hidden" value="{{$data_q['id']}}" name="id" />
                        <div>
                            <label>Subject : </label><br>
                            <input type="text" name="subject" value="{{$data_q['subject']}}" placeholder="Subject" />
                        </div>
                        <div>
                            <label>Question : </label><br>
                            <input type="text" name="question" value="{{$data_q['question']}}" placeholder="Question" />
                        </div>
                        <div>
                            <label>Time : </label><br>
                            <input type="text" name="time" value="{{$data_q['time']}}" placeholder="Time" />
                        </div>

                        <div class="flex items-center mt-4">
                            <x-button class="ml-3" >
                                Update
                            </x-button>
                        </div>
                    </form> -->
                     <form action="../../updatequestion" method="post">
                         @csrf
                         {{method_field('PUT')}}
                        <input type="hidden" value="{{$data_q['id']}}" name="id" />
                        <input type="text" value="{{$data_q['subject']}}" name="subject" /><br><br>
                        <input type="text" value="{{$data_q['question']}}" name="question" /><br><br>
                        <input type="text" value="{{$data_q['time']}}" name="time" /><br><br>
                        <input type="submit" value="Update" name="Update" class="btn btn-primary" /><br><br>
                    </form> 
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
