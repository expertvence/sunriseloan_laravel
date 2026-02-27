@php
    $data = isset($data) && !empty($data) ? $data : [];
    $id = isset($data->id) ? $data->id : '';
   
    $name = isset($data->name) ? $data->name : '';
    $gender = isset($data->gender) ? $data->gender : '';
    $age = isset($data->age) ? $data->age : '';
    $religion = isset($data->religion) ? $data->religion : '';
    $fathers_name = isset($data->fathers_name) ? $data->fathers_name : '';
    $mothers_name = isset($data->mothers_name) ? $data->mothers_name : '';
    $mobile = isset($data->mobile) ? $data->mobile : '';
    $address = isset($data->address) ? $data->address : '';
    $email = isset($data->email) ? $data->email : '';
 

    $nid = isset($data->nid) ? $data->nid : '';
    $member_photo = isset($data->member_photo) ? $data->member_photo : '';
    $profession = isset($data->profession) ? $data->profession : '';
   
@endphp

<div class="card-body">
    <div> <h1> Create Manager</h1></div>
    <form action="{{ route('manager-create') }}" method="POST" id="regForm" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="status" value="inactive">
        <div class="row mb-3">
            
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="name" name="name" type="text"
                        placeholder="Enter your name" value="{{ $name }}" />
                    <label for="name">Name</label>
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputEmail" type="text" name="email"
                        placeholder="name@example.com" value="{{ $email }}" />
                    <label for="inputEmail">Email </label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input class="form-control" id="member_image" name="member_image" type="file" accept="image/*" />
                    <!-- <label for="member_image">Upload Image</label> -->
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <select class="form-control" name="gender" id="gender">
                        <option value="">Gender</option>
                        <option value="Male" @if ($gender == 'Male') selected @endif>Male</option>
                        <option value="Female" @if ($gender == 'Female') selected @endif>Female</option>
                        <option value="Others" @if ($gender == 'Others') selected @endif>Others</option>

                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="age" name="age" type="number"
                        placeholder="Enter your age" value="{{ $age }}" />
                    <label for="age">Age</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <select class="form-control" name="religion" id="religion">
                        <option value="">Religion</option>
                        <option value="Islam" @if ($religion == 'Islam') selected @endif>Islam</option>
                        <option value="Hindu" @if ($religion == 'Hindu') selected @endif>Hindu</option>
                        <option value="Buddis" @if ($religion == 'Buddis') selected @endif>Buddis</option>
                        <option value="Kristan" @if ($religion == 'Kristan') selected @endif>Kristan</option>
                    </select>
                </div>
            </div>
           
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="fathers_mane" name="fathers_name" type="text"
                        placeholder="Enter your father's name" value="{{ $fathers_name }}" />
                    <label for="fathers_mane">Father's Name</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="mothers_name" name="mothers_name" type="text"
                        placeholder="Enter your mother's name" value="{{ $mothers_name }}" />
                    <label for="mothers_name">Mothers Name</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="mobile" name="mobile" type="text"
                        placeholder="Enter your mobile number" value="{{ $mobile }}" />
                    <label for="mobile">Mobile Number</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="address" name="address" type="text"
                        placeholder="Enter your address" value="{{ $address }}" />
                    <label for="address">Adderss</label>
                </div>
            </div>


        </div>

        <div class="row mb-3">


            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="nid" name="nid" type="text"
                        placeholder="Enter your Share Amount" value="{{ $nid }}" />
                    <label for="nid">Nid</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="profession" name="profession" type="text"
                        placeholder="Enter your Share Amount" value="{{ $profession }}" />
                    <label for="profession">Profession</label>
                </div>
            </div>

            {{-- <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <select class="form-control" name="user_type" id="gender">
                        <option value="">User Type</option>
                        <option value="user" @if ($gender == 'user') selected @endif>User</option>
                        <option value="employee" @if ($gender == 'employee') selected @endif>Admin</option>

                    </select>
                </div>
            </div> --}}

        </div>


        {{-- <div style="border:1px dotted black; padding:5px">
            <div style="text-align:center"><strong> Nomini Information </strong></div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="nomini_name" name="nomini_name" type="text"
                            placeholder="Enter your number of share number" value="{{ $nomini_name }}" />
                        <label for="nomini_name">Name</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="nomini_relation" name="nomini_relation" type="text"
                            placeholder="Enter your Share Amount" value="{{ $nomini_relation }}" />
                        <label for="nomini_relation">Relation</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="nomini_age" name="nomini_age" type="text"
                            placeholder="Enter your Share Amount" value="{{ $nomini_age }}" />
                        <label for="nomini_age">Age</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="nomini_birth_nid" name="nomini_birth_nid" type="text"
                            placeholder="Enter your Share Amount" value="{{ $nomini_barth_or_ind }}" />
                        <label for="nomini_birth_nid">Birth / Nid</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-floating mb-3 mb-md-0">
                        <textarea class="form-control" id="nomini_adress" name="nomini_adress" placeholder="Enter nominee address">{{ old('nomini_adress') }}</textarea>
                        <label for="nomini_adress">Nominee Address</label>
                    </div>
                </div>

                <!-- <div class="col-md-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="nomini_relation" name="nomini_relation" type="text"
                            placeholder="Enter your Share Amount"  value="{{ $share_amt }}" />
                        <label for="nomini_relation">Relation</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="nomini_age" name="nomini_age" type="text"
                            placeholder="Enter your Share Amount"  value="{{ $share_amt }}" />
                        <label for="nomini_age">Age</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="nomini_birth_nid" name="nomini_birth_nid" type="text"
                            placeholder="Enter your Share Amount"  value="{{ $share_amt }}" />
                        <label for="nomini_birth_nid">Birth / Nid</label>
                    </div>
                </div> -->
            </div>
        </div> --}}
        {{-- <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-control" name="status" id="status">
                        <option value="active" @if ($is_publish == 'active') selected @endif>Active</option>
                        <option value="inactive" @if ($is_publish == 'inactive') selected @endif>Inactive</option>
                        <option value="rejected" @if ($is_publish == 'rejected') selected @endif>Rejected</option>
                    </select>
                    <label for="status">Status</label>
                </div>
            </div>

        </div> --}}

        <div class="mt-4 mb-0">
            <div class="d-grid"><button type="button" onclick="saveFile(this)" class="btn btn-primary btn-block"
                    redirect="{{ route('manager-list') }}">Create Account</button></div>
            {{-- {{route('member-list')}} --}}
        </div>
    </form>
</div>
