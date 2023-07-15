@extends('dashbord')

@section('dashbord')
<style>
  .notification{
    width: 100%
  }
  .content{
    margin: auto;
    max-width: 700px;
    background: #010227;
    margin-top: 30px;
    padding-bottom: 5px;
    border-radius: 10px;
  }
  
</style>
<div class="notification">
    <div class="content">
        <div class="header">
            <h4 style="color: white;text-align:center;padding:25px">Notification</h4>
        </div>

        @foreach ($notification as $item)
        <div class="content">
          <p style="margin-left: 25px;color:white">{{$item->titre}} <span> <i style="font-size:smaller;background:#0306637c;border-radius:10px;padding:9px"> {{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</i></span></p>
          <p style="margin-left: 29px;color:rgb(160, 152, 152);background:#030763;border-radius:15px;padding:10px">{{$item->content}}</p>
      </div>
        @endforeach

    </div>
<div>



@endsection