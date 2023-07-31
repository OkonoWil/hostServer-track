@extends('layouts.base')

@section('tilte', 'Admin')

@section('content')
<div class="m-5 w-full flex flex-col items-center max-w-3xl">
    <div class="text-gray-500 font-bold text-xl w-full">
        Créer une nouveau server
    </div>
    <div class="w-full m-3 bg-gray-50">
        <div class=" text-lg mx-4 my-2 font-semibold flex flex-row justify-between">
            <form action="{{route('servers.update', ['server' => $server])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="my-3">
                    <div class=" flex flex-row justify-between">
                        <label for="libelle">Name</label>
                        <input class="border border-gray-200 @error('name') border-red-500 @enderror" type="text"
                            name="name" id="name" value="{{$server->name}}">
                    </div>
                    @error('name')
                    <span class=" text-sm text-red-500">{{$message}}</span>
                    @enderror

                </div>
                <div class="my-3">
                    <div class=" flex flex-row justify-between">
                        <label for="libelle">IP address</label>
                        <input class="border border-gray-200 @error('ip_address') border-red-500 @enderror" type="text"
                            name="ip_address" id="ip_address" value="{{$server->ip_address}}">
                    </div>
                    @error('ip_address')
                    <span class=" text-sm text-red-500">{{$message}}</span>
                    @enderror

                </div>
                <div class="my-3 ">
                    <div class="flex flex-row justify-between">
                        <label for="libelle">Datacenter name</label>
                        <input class="border border-gray-200 @error('datacenter_name') border-red-500 @enderror"
                            type="text" name="datacenter_name" id="datacenter_name"
                            value="{{$server->datacenter_name}}">
                    </div>
                    @error('datacenter_name')
                    <span class=" text-sm text-red-500">{{$message}}</span>
                    @enderror

                </div>
                <div class="my-3 ">
                    <div class="flex flex-row justify-between">
                        <label for="libelle">Datacenter name</label>
                        <input class="border border-gray-200 @error('datacenter_name') border-red-500 @enderror"
                            type="text" name="datacenter_name" id="datacenter_name"
                            value="{{$server->datacenter_name}}">
                    </div>
                    @error('datacenter_name')
                    <span class=" text-sm text-red-500">{{$message}}</span>
                    @enderror

                </div>
                <div class="my-3 ">
                    <div class="flex flex-col">
                        <label>Availablity</label>
                        <div class="flex flex-row my-2">
                            <div class="flex flex-row mx-2">
                                <label for="active">On</label>
                                <input type="radio" name="availablity" value="1" id="active"
                                    @if(old('availablity',$server->availablity)===1) checked @endif >
                            </div>
                            <div class="flex flex-row">
                                <label for="active">Off</label>
                                <input type="radio" name="availablity" value="0" id="desactive"
                                    @if(old('availablity',$server->availablity)===0) checked @endif >

                            </div>
                        </div>
                    </div>
                    @error('datacenter_name')
                    <span class=" text-sm text-red-500">{{$message}}</span>
                    @enderror

                </div>
                <div class="my-3 flex flex-row justify-between">
                    <input
                        class="border border-green-300 rounded-md text-white font-bold my-3 p-2 bg-green-400 hover:bg-green-600"
                        type="submit" value="Enregistrer">
                </div>
            </form>
        </div>

    </div>
</div>

@endsection