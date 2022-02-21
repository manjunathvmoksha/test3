<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
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
                    <h1>Add New Question</h1>
                    <br>
                    <form method="POST" action="{{$sub}}">
                        @csrf

                        <!-- User Name -->
                        <!-- <div>
                            <label>Subject : </label><br>
                            <select name="subject">
                                <option value="NodeJs">NodeJs</option>
                                <option value="ReactJs">ReactJs</option>
                            </select>
                        </div> -->
                        <div>
                            <!-- <label>Selected Subject : </label><br> -->
                            <input type="hidden" name="subject" value="{{$sub}}" placeholder="Question" />
                        </div>

                        <div>
                            <label>Question : </label><br>
                            <input type="text" name="question" placeholder="Question" />
                        </div>
                        <div>
                            <label>Time : </label><br>
                            <input type="text" name="time" placeholder="Time" />
                        </div>


                        <div class="flex items-center mt-4">
                            <x-button class="ml-3" >
                                <!-- {{ __('Log in') }} -->
                                Save
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-admin-layout>
