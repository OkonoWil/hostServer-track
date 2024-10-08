@extends('auth.layouts.auth')
@section('title', 'Login')
@section('title-center', 'Se Connecter')

@section('content')
<form action="{{route('login')}}" method="post">
    @csrf
    <div class="mt-2 mb-4 ">
        <div class="flex flex-row justify-between text-xl min-w-[350px]">
            <label for="email" class="text-xl text-gray-600 block">Email :</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="border w-60 ml-2 h-9 px-3 py-2 @error('email') border-red-500 @enderror bg-white shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 rounded-md sm:text-sm focus:ring-1">
        </div>
        @error('email')
        <span class="text-red-500">{{$message}}</span>
        @enderror
    </div>
    <div>
        <div class="flex flex-row justify-between mt-4 mb-2">
            <label for="email" class="text-xl text-gray-600">Password :</label>
            <input type="password" name="password" id="password"
                class="border w-60 ml-2 h-9 px-3 py-2 bg-white shadow-sm @error('password') border-red-500 @enderror border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block  rounded-md sm:text-sm focus:ring-1">
        </div>
        @error('password')
        <span class="text-red-500">{{$message}}</span>
        @enderror
    </div>
    <div class="text-gray-600 flex justify-center my-3">
        {{-- <span>J'ai pas de compte <a class=" text-blue-400" href="{{route('getRegister')}}">créer un
                compte</a></span> --}}
    </div>
    <div class="flex justify-end">
        <input type="submit" value="Se connecter" class="text-white bg-green-400 text-xl font-bold p-2 rounded-lg ">
    </div>
</form>
@endsection