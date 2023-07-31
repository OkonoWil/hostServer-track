@extends('layouts.base')

@section('tilte', 'Admin')
@section('content')
<div class="m-5 w-full flex flex-col items-center max-w-4xl">
    <div class="text-gray-500 font-bold text-xl w-full">
        Listes des servers
    </div>
    <div class="w-full flex flex-row justify-end">
        <a href="{{route('servers.create')}}"
            class="border border-green-300 rounded-md text-white font-bold my-3 p-2 bg-green-400 hover:bg-green-600">Ajouter
            un
            server</a>
    </div>
    <div class="w-full m-3 bg-gray-50">
        <div class=" text-lg mx-4 my-2 font-semibold">
            <table class="w-full">
                <thead class="min-w-full border-b-2 border-gray-500">
                    <tr class="w-full text-gray-500 ">
                        <th class="text-center py-3 px-4">Name</th>
                        <th class="text-center py-3 px-4">IP address</th>
                        <th class="text-center py-3 px-4">DataCenter Name</th>
                        <th colspan="3" class="text-center py-3 px-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 0; @endphp
                    @forelse ($servers as $server)
                    @php
                    $i++;
                    @endphp
                    <tr class="text-gray-500">
                        <td class="text-center py-3 px-4">{{$server->name}}</td>
                        <td class="text-center py-3 px-4">{{$server->ip_address}}</td>
                        <td class="text-center py-3 px-4">{{$server->datacenter_name}}</td>
                        <td colspan="3" class="text-center py-3 px-4">
                            <a class="bg-blue-500 text-white rounded-lg p-2 m-2"
                                href="{{route('servers.show', ['server' => $server])}}">Show</a>
                            <a class="bg-green-500 text-white rounded-lg p-2 m-2"
                                href="{{route('servers.edit', ['server' => $server])}}">Edit</a>
                            <form class=" inline" action="{{route('servers.destroy', ['server' => $server])}}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <input class=" bg-red-500 cursor-pointer  text-white rounded-lg p-2 m-2" type="submit"
                                    value="Delete">
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr class="text-gray-500">
                        <td colspan="6" class="text-center py-3 px-4">No Server</td>

                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        <div>
            {{$servers->links()}}
        </div>
    </div>
</div>
@endsection