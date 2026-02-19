@php

$id=isset($datas) && !empty($datas) ? $datas->id:'';
$categories=isset($datas) && !empty($datas) ? $datas->loan_category:'';
$persntage=isset($datas) && !empty($datas) ? $datas->percentage:'';

@endphp
<div class="card-body">
        <h1 class="text-center">Loan Categories</h1>
        <form method="Post" id="categories_create" action="{{url('insert-category')}}" enctype="multipart/form-data" >
            <!-- Loan Details -->
             @csrf
             <input type="text" hidden name="categories_id" id="categories_id" value="{{$id}}">
             
            <div class="mb-3">
                <label for="loanAmount" class="form-label">Categories:</label>
                <input type="text" name="loan_category" class="form-control" id="loan_category" placeholder="Enter categories name" required  value="{{$categories}}">
            </div>

            <div class="mb-3">
                <label for="loanAmount" class="form-label">Persantage :</label>
                <input type="number" name="percentage" class="form-control" id="percentage" placeholder="Enter categories amount" required value="{{$persntage}}">
            </div>
            
            <!-- Terms and Conditions -->
            <div class="mb-3 form-check">
            <input 
        type="checkbox" 
        class="form-check-input" 
        id="infoAgreement" 
        required 
        {{ $persntage !== '' ? 'checked' : '' }}
    >
                <label  class="form-check-label" for="infoAgreement">I agree that the information provided is true and accurate.</label>
              
            </div>
            <!-- <div class="mb-3 form-check">
    <input 
        type="checkbox" 
        class="form-check-input" 
        id="infoAgreement" 
        required 
        {{ $persntage !== '' ? 'checked' : '' }}
    >
    <label class="form-check-label" for="infoAgreement">I agree to the terms and conditions</label>
</div> -->

          

          <!--   <button type="submit" class="btn btn-success w-100">Submit Application</button> -->
            <!-- <button type="submit" onclick="save(this)" class="btn btn-primary btn-block" redirect="#">Save</button> -->
            <button type="submit" onclick="save(this)" class="btn btn-primary btn-block" redirect="#">Save</button>
        </form>
    </div>
   

