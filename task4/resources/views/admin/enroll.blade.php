<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Please select the subject : </h1>
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            
                            @foreach($data as $i)
                            <tr>
                                <td class="p-6"><a class="link-btn" href="">{{$i->subject_name}}</a></td>                                
                            </tr>
                            @endforeach
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
