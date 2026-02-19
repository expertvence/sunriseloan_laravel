
@php

$id=isset($data) && !empty($data) ? $data->id:'';
$assets=isset($data) && !empty($data) ? $data->assets:'';

@endphp
<div class="card-body">
    <h1 class="text-center">Assets</h1>
    <form method="POST" id="categories_create" action="{{url('store-assets')}}" enctype="multipart/form-data">
        @csrf
        <input type="text" hidden name="assets_id" id="assets_id" value="{{$id}}">
        <div class="d-flex align-items-center mb-3 col-md-5">
            <label for="assets" class="me-2"><h4>Assets:</h4></label>
            <input type="number" name="assets" value="{{$assets}}" id="assets" class="form-control me-2" placeholder="Add assets">
        </div>
       <!--  <button type="submit" onclick="save(this)" class="btn btn-primary btn-block" redirect="#">Save</button> -->

       <!-- <div class="mt-4 mb-0">
            <div class="d-grid"><button type="button" onclick="save(this)"
                    class="btn btn-primary btn-block" redirect= "#">Create Account</button></div>
                    {{-- {{route('show-assets')}} --}}
        </div> -->
        <div class="d-grid mt-2">
        <button type="submit" onclick="save(this)" class="btn btn-primary btn-block" redirect="{{route('show-assets')}}">Save</button>
    </div>
    </form>
</div>
