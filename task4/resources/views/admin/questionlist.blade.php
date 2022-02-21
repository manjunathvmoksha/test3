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
                    <h2><a href="../addquestion/{{$sub}}"  >Add New Question for {{$sub}}</a></h2></br>
                    <h1>All Question list</h1>
                    <!-- <x-nav-link :href="route('admin.userlist')" :active="request()->routeIs('admin.userlist')">
                        {{ __('User List') }}
                    </x-nav-link> -->
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td class="p-6">Subject</td>
                                <td class="p-6">Question</td>
                                <td class="p-6">Time</td>
                                <td class="p-6">Update</td>
                                <td class="p-6">Delete</td>
                                <!-- <td>Password</td> -->
                            </tr>
                            @foreach($data as $i)
                            <tr>
                                <td class="p-6">{{$i->subject}}</td>
                                <td class="p-6">{{$i->question}}</td>
                                <td class="p-6">{{$i->time}}</td>
                                <td class="p-6"><a href="../updatequestion/{{$i->subject}}/{{$i->id}}" >Edit</a></td>
                                <td class="p-6"><a href="../delete/{{$i->subject}}/{{$i->id}}" >Delete</a></td>
                                <!-- <td>{{$i->name}}</td> -->
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
