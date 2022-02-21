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
                    <h2><a href="./adduser" :active="request()->routeIs('/adduser/')" >Click here add new User</a></h2><br>
                    <h1>All User list</h1>
                    <!-- <x-nav-link :href="route('admin.userlist')" :active="request()->routeIs('admin.userlist')">
                        {{ __('User List') }}
                    </x-nav-link> -->
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td class="p-6">Id</td>
                                <td class="p-6">Username</td>
                                <td class="p-6">Email</td>
                                <td class="p-6">Action</td>
                                <!-- <td>Password</td> -->
                            </tr>
                            @foreach($data as $i)
                            <tr>
                                <td class="p-6">{{$i->id}}</td>
                                <td class="p-6">{{$i->name}}</td>
                                <td class="p-6">{{$i->email}}</td>
                                @foreach($user_id as $u_id)
                                @php
                                $id1 = $i->id;
                                $id2 = $u_id->user_id;
                                @endphp
                                    @if($id1 == $id2)
                                        <td class="p-6"><a href="attend_sub/{{$id2}}">Attended</a></td>
                                    @else
                                        <td class="p-6">Not Attended</td>
                                    @endif
                                @endforeach
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
