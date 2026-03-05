@php
    $id = isset($data) && !empty($data) ? $data->id : '';
    $assets = isset($data) && !empty($data) ? (int)$data->assets : 0; // Cast to integer
    $date = isset($data) && !empty($data) ? $data->date : '';
@endphp

<div class="card-body">
    <h1 class="text-center">Assets</h1>
    <form method="POST" id="categories_create" action="{{ url('store-assets') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="assets_id" id="assets_id" value="{{ $id }}">

        <div class="row mb-3">
           <div div class="col-md-6">
            <label for="assets" class="me-2"><h4>Assets:</h4></label>
            <input type="number" name="assets" value="{{ $assets }}" id="assets" class="form-control me-2" placeholder="Add assets">
           </div>
     <div>
            <label for="date" class="me-2"><h4>Date:</h4></label>
            <input type="date" name="date" value="{{ $date }}" id="date" class="form-control me-2" placeholder="Add date">
        </div>
        </div>

        <div class="d-grid mt-2">
            <button type="submit" onclick="save(this)" class="btn btn-primary btn-block" redirect="{{ route('show-assets') }}">Save</button>
        </div>
    </form>
</div>
