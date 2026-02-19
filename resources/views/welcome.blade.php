<style>
    html,
    body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }



    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    @media (max-width: 767px) {
    .title{
        font-size: 40px;
    }
}

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
@extends('layouts.app')
@include('layouts.head')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card flex-center position-ref full-height" style="background-image:url('{{url("images/bg_image/bg.jpg")}}'); ">
              
                <div class="card-body">
                    <div class="title m-b-md" style="color:white;">
                      <div style="color: blue;text-align:center">  Welcome  </div>
                      <div style="text-align:center">To</div>
                        <strong style="color: blue;text-align:center"> Microloan </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection