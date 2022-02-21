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
                    <h1>Add New User</h1>
                    <br>
                    <form method="POST" action="userlist">
                        @csrf

                        <!-- User Name -->
                        <div>
                            <label>Username : </label><br>
                            <input type="text" name="name" placeholder="Username" />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <label>Email : </label><br>
                            <input type="email" name="email"  placeholder="Email"/>
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <label>Password : </label><br>
                            <input type="text" name="password"  placeholder="Password" />
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
