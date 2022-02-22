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
                            <td class="p-6">
                                {{-- <label class="label-font">Reactjs</label><br><br> --}}
                                <a class="link-btn" href="../attend_question/ReactJs/{{$u_id}}">
                                    Reactjs
                                </a>
                            </td>
                            <td class="p-6">
                                {{-- <label class="label-font">Nodejs</label><br><br> --}}
                                <a class="link-btn" href="../attend_question/NodeJs/{{$u_id}}">
                                    Nodejs
                                </a>
                            </td>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
