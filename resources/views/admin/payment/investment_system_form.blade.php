@php
$id=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->id:'';
$uid=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->uid:'';
$investment_to=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->investment_to:'';
$fathers_mane=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->fathers_mane:'';
$mothers_mane=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->mothers_mane:'';
$mobile=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->mobile:'';
$age=isset($invenstment_data) && !empty($invenstment_data) ? date('d-m-Y',strtotime($invenstment_data->age)):'';
$religion=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->religion:'';
$gender=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->gender:'';
$email=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->email:'';
$nid_birth_certificate=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->nid_birth_certificate:'';
$gurdian_phone=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->gurdian_phone:'';
$Present_address=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->Present_address:'';
$permanent_address=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->permanent_address:'';
$invest_amount=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->invest_amount:'';
$profit_amount=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->profit_amount:'';
$start_date=isset($invenstment_data) && !empty($invenstment_data) ? date('d-m-Y',strtotime($invenstment_data->start_date)):'';
$return_date=isset($invenstment_data) && !empty($invenstment_data) ? date('d-m-Y',strtotime($invenstment_data->return_date)):'';
$profit_polocy=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->profit_polocy:'';
$reference_name=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->reference_name:'';
$reference_address=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->reference_address:'';
$reference_phone=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->reference_phone:'';
$relation=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->relation:'';
$note=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->note:'';
$is_publish=isset($invenstment_data) && !empty($invenstment_data) ? $invenstment_data->is_publish:'';

    @endphp
<form action="{{ route('investment_store') }}" method="POST" id="investment">
                                @csrf
                                <input type="hidden" name="id" id="pay_id" value="{{ $id }}">
                                <div style="border:1px solid gray; padding:10px">
                                    <p class="text-center" style="font-size: 30px; padding:0px;font-weight: bold; background-color:darkcyan"> <span style="border-bottom: 1px dotted gray;"> Personal Info</span></p>
                                    <div class="form-row" style="padding: 10px;">
                                        <div class="col-md-4">
                                            <label class="" for="uid"> <strong> Uid</strong></label>
                                            <input type="text" class="form-control" name="uid" id="uid" value="{{$uid}}" placeholder="Write uid" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="investment_to"> <strong> Investment To</strong></label>
                                            <input type="text" class="form-control" name="investment_to" id="investment_to" value="{{$investment_to}}" placeholder="Write Investment To">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="fathers_name"> <strong> Father's Name</strong></label>
                                            <input type="text" class="form-control" name="fathers_name" id="fathers_name" value="{{$fathers_mane}}" placeholder="Write Father's Name">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="mothers_name"> <strong> Mother's Name</strong></label>
                                            <input type="text" class="form-control" name="mothers_name" id="mothers_name" value="{{$mothers_mane}}" placeholder="Write Mother's Name">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="mobile_no"> <strong> Mobile</strong></label>
                                            <input type="text" class="form-control" name="mobile_no" id="mobile_no" value="{{$mobile}}" placeholder="Write Mobile">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="email"> <strong> Email</strong></label>
                                            <input type="text" class="form-control" name="email" id="email" value="{{$email}}" placeholder="Write email">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="age"> <strong> Date of Birth</strong></label>
                                            <input type="text" class="form-control date_picker" name="age" id="age" value="{{$age}}" placeholder="Write Age">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="nid_no"> <strong> NID No</strong></label>
                                            <input type="text" class="form-control" name="nid_no" id="nid_no" value="{{$nid_birth_certificate}}" placeholder="Write nid_no">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="gurdian_phone_no"> <strong> Gurdian Mobile No</strong></label>
                                            <input type="text" class="form-control" name="gurdian_phone_no" id="gurdian_phone_no" value="{{$gurdian_phone}}" placeholder="Write gurdian_phone_no">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="gender"> <strong> Gender</strong></label>

                                            <select class="form-control" name="gender" id="gender">
                                                <option value="">Select gender</option>
                                                <option value="Male" @if($gender== 'Male') selected @endif>Male</option>
                                                <option value="Female" @if($gender== 'Female') selected @endif>Female</option>
                                                <option value="Others" @if($gender== 'Others') selected @endif>Others</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="religion"> <strong> Religion</strong></label>

                                            <select class="form-control" name="religion" id="religion">
                                                <option value="">Select religion</option>
                                                <option value="Islam" @if($religion == 'Islam') selected @endif>Islam</option>
                                                <option value="Hindus" @if($religion == 'Hindus') selected @endif>Hindus</option>
                                                <option value="Christians" @if($religion == 'Christians') selected @endif>Christians</option>
                                                <option value="Buddhists" @if($religion == 'Buddhists') selected @endif>Buddhists</option>
                                                <option value="Others" @if($religion == 'Others') selected @endif>Others</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="" for="present_addr"> <strong> Present Address</strong></label>
                                            <textarea class="form-control" name="present_addr" id="present_addr" rows="2">{{$Present_address}}</textarea>

                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="permanent_addr"> <strong> Permanent Address</strong></label>
                                            <textarea class="form-control" name="permanent_addr" id="permanent_addr" rows="2">{{$permanent_address}}</textarea>

                                        </div>

                                    </div>
                                </div>
                                <div style="border:1px solid gray; padding:10px">
                                    <p class="text-center" style="font-size: 30px; padding:0px;font-weight: bold; background-color:darkcyan"> <span style="border-bottom: 1px dotted gray;"> Financial Info</span></p>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <label class="" for="Investment_amount"> <strong> Investment Amount</strong></label>
                                            <input type="text" class="form-control" name="Investment_amount" id="Investment_amount" value="{{$invest_amount}}" placeholder="Write Investment_amount">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="profit_amount"> <strong> Profit Amount</strong></label>
                                            <input type="text" class="form-control" name="profit_amount" id="profit_amount" value="{{$profit_amount}}" placeholder="Write profit_amount">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="investment_start_date"> <strong> Investment Start Date</strong></label>
                                            <input type="text" class="form-control date_picker" name="investment_start_date" id="investment_start_date" value="{{$start_date}}" placeholder="Write investment_start_date">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="investment_return_date"> <strong> Investment Return Date</strong></label>
                                            <input type="text" class="form-control date_picker" name="investment_return_date" id="investment_return_date" value="{{$return_date}}" placeholder="Write investment_return_date">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="profit_polocy"> <strong> Profit Polocy</strong></label>
                                            <select class="form-control" name="profit_polocy" id="profit_polocy">
                                                <option value="">Select Polocy</option>
                                                <option value="weekly" @if($profit_polocy == 'weekly') selected @endif>weekly</option>
                                                <option value="monthly" @if($profit_polocy == 'monthly') selected @endif>monthly</option>
                                                <option value="helf yearly" @if($profit_polocy == 'helf yearly') selected @endif>helf yearly</option>
                                                <option value="yearly" @if($profit_polocy == 'yearly') selected @endif>yearly</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="note"> <strong>Note</strong></label>
                                            <textarea class="form-control" name="note" id="note" rows="2">{{$note}}</textarea>

                                        </div>
                                    </div>
                                </div>
                                <div style="border:1px solid gray; padding:10px">
                                    <p class="text-center" style="font-size: 30px; padding:0px;font-weight: bold; background-color:darkcyan"> <span> Referance Info</span></p>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <label class="" for="refer_name"> <strong> Refered Name</strong></label>
                                            <input type="text" class="form-control" name="refer_name" id="refer_name" value="{{$reference_name}}" placeholder="Write refer_name">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="refer_address"> <strong> Refered Address</strong></label>
                                            <input type="text" class="form-control" name="refer_address" id="refer_address" value="{{$reference_address}}" placeholder="Write refer_address">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="refered_mobile"> <strong> Refered Mobile No</strong></label>
                                            <input type="text" class="form-control" name="refered_mobile" id="refered_mobile" value="{{$reference_phone}}" placeholder="Write refered_mobile">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="" for="refer_relation"> <strong> Refered Relation</strong></label>
                                            <input type="text" class="form-control" name="refer_relation" id="refer_relation" value="{{$relation}}" placeholder="Write refer_relation">
                                        </div>

                                        <div class="col-md-4 mt-5">
                                            <label class="" for="active"> <strong>Active</strong></label>
                                            <input type="checkbox" name="active" id="active" value="1" @if($is_publish == 1 ) checked @endif>

                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid mt-2">
                                    <button type="submit" onclick="save(this)" class="btn btn-primary btn-block" redirect="{{route('investment_system_list')}}">Save</button>
                                </div>
                            </form>