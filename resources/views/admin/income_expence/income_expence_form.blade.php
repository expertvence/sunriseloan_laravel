@php
$id=isset($income_expence_data) && !empty($income_expence_data) ? $income_expence_data->id:'';
$transection_date=isset($income_expence_data) && !empty($income_expence_data) ? date('d-m-Y',strtotime($income_expence_data->date)):'';
$income_expence_amt=isset($income_expence_data) && !empty($income_expence_data) ? $income_expence_data->income_expence:'';
$description=isset($income_expence_data) && !empty($income_expence_data) ? $income_expence_data->description:'';
$type=isset($income_expence_data) && !empty($income_expence_data) ? $income_expence_data->type:'';
@endphp
<form action="{{ route('income-expence-store') }}" method="POST" id="investment">
    @csrf
    <input type="hidden" name="id" id="pay_id" value="{{ $id }}">
    <div style="border:1px solid gray; padding:10px">
        <p class="text-center" style="font-size: 30px; padding:0px;font-weight: bold; background-color:darkcyan"> <span style="border-bottom: 1px dotted gray;"> Entry Income-Expense</span></p>
        <div class="form-row" style="padding: 10px;">
          
            <div class="col-md-2">
                <label class="" for="transection_date"> <strong> Txn Date <span class="text-danger">*</span></strong></label>
                <input type="date" class="form-control" name="transection_date" id="transection_date" value="{{$transection_date}}" placeholder="dd-mm-yyyy" autocomplete="off" required>
            </div>
            <div class="col-md-6">
                <label class="" for="description"> <strong>Description <span class="text-danger">*</span></strong></label>
                <input type="text" class="form-control" name="description" id="description" value="{{$description}}" placeholder="Write description" autocomplete="off" required>
            </div>
            <div class="col-md-2">
                <label class="" for="income_expence_amt"> <strong>Amount <span class="text-danger">*</span></strong></label>
                <input type="number" class="form-control" name="income_expence_amt" id="income_expence_amt" value="{{$income_expence_amt}}" placeholder="Entry amount" required>
            </div>            
            <div class="col-md-2">
                <label class="" for="type"> <strong> Type <span class="text-danger">*</span></strong></label>
                <select class="form-control" name="type" id="type" required>
                    <option value="">select</option>
                    <option value="Income" @if($type=='Income' ) selected @endif>Income</option>
                    <option value="Expense" @if($type=='Expense' ) selected @endif>Expense</option>
                </select>
            </div>
        </div>
    </div>    
    <div class="d-grid mt-2">
        <button type="submit" onclick="save(this)" class="btn btn-primary btn-block" redirect="{{route('income-expence-list')}}">Save</button>
    </div>
</form>
