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
                                <td class="p-6">Subject</td>
                                <td class="p-6">Path</td>
                                <td class="p-6">videos </td>
                            </tr>
                            @foreach($data as $i)
                            <tr>
                                <td class="p-6">{{$i->question}}</td>
                                <td class="p-6">
                                    @php $video_name = $i->file_name 
                                    // {{Storage::url("app/converted_videos/".$video_name.".mp4")}}
                                    @endphp
                                    {{Storage::url("app/public/".$video_name.".mp4")}}
                                </td>                           
                                <td class="p-6">
                                    

                                    <video width="320" height="240" controls autoplay>
                                        @php $video_name = $i->file_name 
                                        @endphp
                                        {{-- <source src="{{URL::asset("storage/app/converted_videos/kEDs0lGHIrVApLVSrY5T5ikE0qMkqz1LM6ZQ1vsW.mp4")}}" type="video/mp4"> --}}
                                        <source src="{{Storage::url("app/public/".$video_name.".mp4")}}" type="video/mp4">
                                        {{-- <source src="{{Storage::url("app/public/".$video_name.".ogg")}}" type="video/ogg"> --}}
                                        Your browser does not support the video tag.
                                    </video>
                                    
                                </td>     
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
