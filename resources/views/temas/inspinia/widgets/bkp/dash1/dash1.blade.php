@extends('temas.inspinia.layout')
@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        @include('widgets.dash2.1',[
        'data' => $data1
        ])    
    </div>
    <div class="row">
        @include('widgets.dash2.4',[
        'data' => $data2['item']
        ]) 
        @include('widgets.dash4.4',[
        'data' => $data3['item']
        ])
    </div>
    <div class="row">
        @include('widgets.dash4.2',[
        'data' => $data4['item']
        ])
        @include('widgets.dash4.3',[
        'data' => $data5['item']
        ])
    </div>
</div>
@endsection