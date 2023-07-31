@extends('layouts.base')

@section('tilte', 'Admin')
@section('content')
<div class="m-5 w-full flex flex-col items-center max-w-4xl">
    <div class="text-gray-500 font-bold text-xl w-full">
        Server : {{$server->name}}
    </div>

    <div class="w-full m-3 bg-gray-50">
        <div class=" text-lg mx-4 my-2 font-semibold flex flex-row justify-between">
            <span>IP Address : <span class="text-green-400">{{$server->ip_address}}</span></span>
            <span>DataCenter Name : <span class="text-green-400">{{$server->datacenter_name}}</span></span>
            <span>Availablity : <span class="text-green-400">{{$server->availablity? 'Online' :
                    'Offline'}}</span></span>
        </div>
        <div>
            <div class="p-6 bg-white">
                <canvas id="chartOne" width="900" height="200"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<form action="" id="etaform" class="hidden">
    @foreach ($server->pings as $ping)
    <input type="text" name="created_ats[]" value="{{$ping->created_at}}">
    <input type="text" name="results[]" value="{{$ping->result }}">
    @endforeach
</form>
<script>
    const created_ats = document.getElementsByName('created_ats[]');
            let tabCreated = new Array();
            created_ats.forEach(element => {
                tabCreated.push(element.value);   
            });
            const results = document.getElementsByName('results[]');
            let tabResult = new Array();
            results.forEach(element => {
                tabResult.push(element.value);   
            });
    const dataSet = {
        labels: tabCreated,
        datasets: [
            {
                label: 'availablity',
                data: tabResult,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: false
            }
        ]
    };

    var chartOne = document.getElementById('chartOne');
    const myChart = new Chart(chartOne, {
        type: 'line',
        data: dataSet,
        options: {
            plugins: {
                filler: {
                    propagate: false,
                },
                title: {
                    display: true,
                    text: 'oh'
                }
            },
            interaction: {
                intersect: false,
            }
        },
    });
</script>
@endsection