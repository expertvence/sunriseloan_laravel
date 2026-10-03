@php
$data = isset($data) && !empty($data) ? $data : [];
$id=isset($data->id)  ? $data->id : "";
$Uid=isset($data->Uid)  ? $data->Uid : "";
$name=isset($data->name ) ? $data->name : "";
$gender=isset($data->gender)  ? $data->gender : "";
$age=isset($data->age)  ? $data->age : "";
$religion=isset($data->religion)  ? $data->religion : "";
 $fathers_name = isset($data->fathers_name) ? $data->fathers_name : '';
$mothers_name = isset($data->mothers_name) ? $data->mothers_name : '';
$mobile=isset($data->mobile)  ? $data->mobile : "";
$address=isset($data->address)  ? $data->address : "";
$email=isset($data->email)  ? $data->email : "";
$number_of_share=isset($data->no_of_share)  ? $data->no_of_share : "";
$share_amt=isset($data->share_amount)  ? $data->share_amount : "";

$nid=isset($data->nid)  ? $data->nid : "";
$member_photo=isset($data->member_photo)  ? $data->member_photo : "";
$member_profession=isset($data->member_profession)  ? $data->member_profession : "";
$nomini_name=isset($data->nomini_name)  ? $data->nomini_name : "";
$nomini_relation=isset($data->nomini_relation)  ? $data->nomini_relation : "";
$nomini_age=isset($data->nomini_age)  ? $data->nomini_age : "";
$nomini_barth_or_ind=isset($data->nomini_barth_or_ind)  ? $data->nomini_barth_or_ind : "";
$nomini_address=isset($data->nomini_address)  ? $data->nomini_address : "";
$nomini_photo=isset($data->nomini_photo)  ? $data->nomini_photo : "";

$is_publish=isset($data->is_publish)  ? $data->is_publish : "";
@endphp

<style>
.employee-member-form{background:#fff;border:1px solid #e2e8f0;border-radius:20px;box-shadow:0 14px 36px rgba(15,23,42,.07);margin:1rem auto;max-width:1180px;overflow:hidden}.employee-member-form .member-form-heading{align-items:center;background:linear-gradient(115deg,#0f2544,#1d4d7d 65%,#2877a5);color:#fff;display:flex;gap:1rem;padding:1.35rem 1.6rem}.employee-member-form .member-form-heading-icon{align-items:center;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.2);border-radius:14px;display:inline-flex;flex:0 0 48px;height:48px;justify-content:center}.employee-member-form .member-form-heading h2{color:#fff;font-size:1.15rem;font-weight:750;margin:0}.employee-member-form .member-form-heading p{color:rgba(255,255,255,.75);font-size:.82rem;margin:.25rem 0 0}.employee-member-form .member-form-content{padding:clamp(1rem,3vw,1.75rem)}.employee-member-form .form-control{background:#fff;border:1px solid #d9e1ec;border-radius:10px;color:#17283e;min-height:48px}.employee-member-form .form-control:focus{border-color:#367db0;box-shadow:0 0 0 .2rem rgba(54,125,176,.14)}.employee-member-form .form-floating>label{color:#64748b}.employee-member-form .form-floating textarea.form-control{min-height:90px}.employee-member-form .premium-input-group{margin-bottom:.75rem}.employee-member-form .member-nominee-section{background:#f5f8fc;border:1px solid #e2e8f0!important;border-radius:14px;margin-top:.5rem;padding:1rem!important}.employee-member-form .member-nominee-section>div:first-child{color:#163d63;font-size:.88rem;letter-spacing:.04em;margin-bottom:1rem;text-transform:uppercase}.employee-member-form .member-submit{background:linear-gradient(110deg,#164a78,#2679a6);border:0;border-radius:10px;font-weight:700;min-height:48px;padding:.7rem 1.5rem}.employee-member-form .member-submit:hover{background:linear-gradient(110deg,#103b63,#1c638c)}@media(max-width:575px){.employee-member-form{border-radius:14px;margin:.5rem}.employee-member-form .member-form-heading{padding:1rem}}
</style>
<section class="employee-member-form">
<header class="member-form-heading"><span class="member-form-heading-icon"><i class="fas fa-user-plus" aria-hidden="true"></i></span><span><h2>{{ !empty($id) ? 'Edit member details' : 'Add a new member' }}</h2><p>Required: full name, UID, gender, mobile and address. Other profile details are optional.</p></span></header><div class="member-form-content">
    <form action="{{ route('employee-member-save') }}" method="POST" id="regForm" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$id}}">
        <input type="hidden" name="status" value="inactive">
        <div class="row mb-3">
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" style="" id="uid" name="uid" type="text" required
                        placeholder="uid" value="{{$Uid}}" />
                    <label for="uid"> UID <span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="name" name="name" type="text" required
                        placeholder="Enter your name"  value="{{$name}}"/>
                    <label for="name">Full name <span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input class="form-control" id="member_image" name="member_image" type="file" accept="image/*"/>
                    <label for="member_image">Profile photo (optional)</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <select class="form-control" name="gender" id="gender" required>
                        <option value="">Select gender *</option>
                        <option value="Male" @if ($gender == "Male") selected @endif>Male</option>
                        <option value="Female" @if ($gender == "Female") selected @endif>Female</option>
                        <option value="Others" @if ($gender == "Others") selected @endif>Others</option>

                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="age" name="age" type="text"
                        placeholder="Enter your age"  value="{{$age}}"/>
                    <label for="age">Age (optional)</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <select class="form-control" name="religion" id="religion" >
                        <option value="">Religion (optional)</option>
                        <option value="Islam" @if ($religion == "Islam") selected @endif>Islam</option>
                        <option value="Hindu" @if ($religion == "Hindu") selected @endif>Hindu</option>
                        <option value="Buddis" @if ($religion == "Buddis") selected @endif>Buddis</option>
                        <option value="Kristan" @if ($religion == "Kristan") selected @endif>Kristan</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputEmail" type="email" name="email"
                        placeholder="name@example.com"  value="{{$email}}"/>
                    <label for="inputEmail">Email (optional)</label>
                </div>
            </div>
        </div>

        <div class="row mb-3">
           <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="fathers_mane" name="fathers_name" type="text" placeholder="Enter father's name" value="{{ $fathers_name }}" />
                            <label for="fathers_name"><i class="fas fa-male me-2"></i>Father's name (optional)</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="mothers_name" name="mothers_name" type="text" placeholder="Enter mother's name" value="{{ $mothers_name }}" />
                            <label for="mothers_name"><i class="fas fa-female me-2"></i>Mother's name (optional)</label>
                        </div>
                    </div>
                </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="mobile" name="mobile" type="text" required
                        placeholder="Enter your mobile number"  value="{{$mobile}}" />
                    <label for="mobile">Mobile number <span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="address" name="address" type="text" required
                        placeholder="Enter your address"  value="{{$address}}" />
                    <label for="address">Address <span class="text-danger">*</span></label>
                </div>
            </div>

            
        </div>
      
        <div class="row mb-3">
           
            
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="nid" name="nid" type="text"
                        placeholder="Enter your Share Amount"  value="{{$nid}}" />
                    <label for="nid">NID (optional)</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="profession" name="member_profession" type="text"
                        placeholder="Enter your Share Amount"  value="{{$member_profession}}" />
                    <label for="profession">Profession (optional)</label>
                </div>
            </div>
            
             <!-- <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <select class="form-control" name="user_type" id="gender"  >
                        <option value="">User Type</option>
                        <option value="user" @if ($gender == "user") selected @endif>User</option>
                        <option value="employee" @if ($gender == "employee") selected @endif>Employe</option>
                        
                    </select>
                </div>
            </div> -->
            
        </div>
       
        
        <div class="member-nominee-section">
            <div style="text-align:center"><strong> Nomini Information </strong></div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="nomini_name" name="nomini_name" type="text"
                            placeholder="Enter your number of share number"  value="{{$nomini_name}}" />
                        <label for="nomini_name">Name (optional)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="nomini_relation" name="nomini_relation" type="text"
                            placeholder="Enter your Share Amount"  value="{{$nomini_relation}}" />
                        <label for="nomini_relation">Relation (optional)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="nomini_age" name="nomini_age" type="text"
                            placeholder="Enter your Share Amount"  value="{{$nomini_age}}" />
                        <label for="nomini_age">Age (optional)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="nomini_birth_nid" name="nomini_birth_nid" type="text"
                            placeholder="Enter your Share Amount"  value="{{$nomini_barth_or_ind}}" />
                        <label for="nomini_birth_nid">Birth / NID (optional)</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                 <div class="col-md-12">
                    <div class="form-floating mb-3 mb-md-0">
                        <textarea class="form-control" id="nomini_adress" name="nomini_adress" placeholder="Enter nominee address">{{ old('nomini_adress') }}</textarea>
                        <label for="nomini_adress">Nominee address (optional)</label>
                    </div>
                </div>
                <!-- <div class="col-md-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="nomini_relation" name="nomini_relation" type="text"
                            placeholder="Enter your Share Amount"  value="{{$share_amt}}" />
                        <label for="nomini_relation">Relation (optional)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="nomini_age" name="nomini_age" type="text"
                            placeholder="Enter your Share Amount"  value="{{$share_amt}}" />
                        <label for="nomini_age">Age (optional)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="nomini_birth_nid" name="nomini_birth_nid" type="text"
                            placeholder="Enter your Share Amount"  value="{{$share_amt}}" />
                        <label for="nomini_birth_nid">Birth / NID (optional)</label>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="mt-4 mb-0">
            <div class="d-grid"><button type="button" onclick="saveEmployeeMember(event, this)"
                    class="btn btn-primary btn-block member-submit" redirect= "{{route('employee-member-list')}}">{{ !empty($id) ? 'Save member changes' : 'Create member account' }}</button></div>
                    {{-- {{route('member-list')}} --}}
        </div>
    </form>
</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
window.saveEmployeeMember = function (event, button) {
    event.preventDefault();
    var form = button.closest('form');
    if (!form || !form.reportValidity()) return;
    if (typeof Swal === 'undefined') {
        window.alert('Save confirmation is unavailable. Please refresh and try again.');
        return;
    }

    var isEdit = Boolean(new FormData(form).get('id'));
    Swal.fire({
        title: isEdit ? 'Save member changes?' : 'Create this member?',
        text: 'Please review the member information before continuing.',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: isEdit ? 'Save changes' : 'Create member',
        cancelButtonText: 'Review details',
        confirmButtonColor: '#147c6b',
        cancelButtonColor: '#64748b',
        reverseButtons: true
    }).then(function (result) {
        if (!result.isConfirmed) return;
        button.disabled = true;
        $.ajax({
            url: form.action,
            type: form.method,
            data: new FormData(form),
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'Accept': 'application/json' },
            success: function (response) {
                if (!response || response.title !== 'Success') {
                    button.disabled = false;
                    Swal.fire({ title: (response && response.title) || 'Could not save member', text: (response && response.msg) || 'Please review the information and try again.', icon: 'error', confirmButtonColor: '#147c6b' });
                    return;
                }
                Swal.fire({ title: isEdit ? 'Member updated' : 'Member created', text: response.msg || 'Member information saved successfully.', icon: 'success', confirmButtonText: 'Go to member list', confirmButtonColor: '#147c6b', allowOutsideClick: false }).then(function () {
                    window.location.assign(button.getAttribute('redirect'));
                });
            },
            error: function (xhr) {
                button.disabled = false;
                var payload = xhr.responseJSON || {};
                var message = payload.msg || payload.message;
                if (!message && payload.errors) message = Object.keys(payload.errors).map(function (key) { return payload.errors[key].join(' '); }).join('\n');
                Swal.fire({ title: xhr.status === 422 ? 'Check the member information' : 'Save failed', text: message || 'The member could not be saved. Please try again.', icon: 'error', confirmButtonColor: '#147c6b' });
            }
        });
    });
};
</script>
