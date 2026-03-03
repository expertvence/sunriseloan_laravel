@php
    $data = isset($data) && !empty($data) ? $data : [];
    $id = isset($data->id) ? $data->id : '';
    $Uid = isset($data->Uid) ? $data->Uid : '';
    $name = isset($data->name) ? $data->name : '';
    $gender = isset($data->gender) ? $data->gender : '';
    $age = isset($data->age) ? $data->age : '';
    $religion = isset($data->religion) ? $data->religion : '';
    $fathers_name = isset($data->fathers_name) ? $data->fathers_name : '';
    $mothers_name = isset($data->mothers_name) ? $data->mothers_name : '';
    $mobile = isset($data->mobile) ? $data->mobile : '';
    $address = isset($data->address) ? $data->address : '';
    $email = isset($data->email) ? $data->email : '';
    $number_of_share = isset($data->no_of_share) ? $data->no_of_share : '';
    $share_amt = isset($data->share_amount) ? $data->share_amount : '';

    $nid = isset($data->nid) ? $data->nid : '';
    $member_photo = isset($data->member_photo) ? $data->member_photo : '';
    $member_profession = isset($data->member_profession) ? $data->member_profession : '';
    $nomini_name = isset($data->nomini_name) ? $data->nomini_name : '';
    $nomini_relation = isset($data->nomini_relation) ? $data->nomini_relation : '';
    $nomini_age = isset($data->nomini_age) ? $data->nomini_age : '';
    $nomini_barth_or_ind = isset($data->nomini_barth_or_ind) ? $data->nomini_barth_or_ind : '';
    $nomini_address = isset($data->nomini_address) ? $data->nomini_address : '';
    $nomini_photo = isset($data->nomini_photo) ? $data->nomini_photo : '';

    $is_publish = isset($data->is_publish) ? $data->is_publish : '';
@endphp

<style>
:root {
    /* Light mode variables - now using theme-manager variables */
    --primary-color: #4361ee;
    --primary-hover: #3730a3;
    --secondary-color: #64748b;
    --success-color: #10b981;
    --danger-color: #ef4444;
    --warning-color: #f59e0b;
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
    --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Light mode styles (default) - using theme variables */
.premium-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 2px;
    border-radius: 24px;
    box-shadow: var(--shadow-xl);
    transition: var(--transition);
}

.card-inner {
    background: var(--card-bg, #ffffff);
    border-radius: 22px;
    padding: 2rem;
    transition: var(--transition);
}

.form-section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary, #0f172a);
    margin-bottom: 2rem;
    padding-bottom: 0.75rem;
    border-bottom: 3px solid var(--border-color, #e2e8f0);
    position: relative;
    letter-spacing: 0.5px;
}

.form-section-title::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 80px;
    height: 3px;
    background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
}

.premium-input-group {
    margin-bottom: 1.5rem;
    position: relative;
}

.premium-input-group .form-floating {
    transition: var(--transition);
    position: relative;
}

.premium-input-group .form-floating:hover {
    transform: translateY(-2px);
}

/* Input field styles - using theme variables */
.premium-input-group .form-control,
.premium-input-group .form-select {
    border: 2px solid var(--border-color, #e2e8f0);
    border-radius: 12px;
    padding: 0.75rem 1rem;
    height: auto;
    min-height: 58px;
    font-size: 0.95rem;
    transition: var(--transition);
    background: var(--input-bg, #ffffff);
    color: var(--text-primary, #0f172a);
}

.premium-input-group .form-control:focus,
.premium-input-group .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
    outline: none;
    background: var(--input-bg, #ffffff);
    color: var(--text-primary, #0f172a);
}

/* Label styles */
.premium-input-group .form-floating > label {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding: 1rem 1rem;
    color: var(--text-secondary, #64748b);
    font-weight: 500;
    font-size: 1rem;
    pointer-events: none;
    border: 1px solid transparent;
    transform-origin: 0 0;
    transition: all 0.2s ease-in-out;
    z-index: 1;
    background: transparent;
}

/* When input is focused or has content - label moves up */
.premium-input-group .form-floating > .form-control:focus ~ label,
.premium-input-group .form-floating > .form-control:not(:placeholder-shown) ~ label,
.premium-input-group .form-floating > .form-select ~ label {
    transform: scale(0.85) translateY(-0.75rem) translateX(0.15rem);
    color: var(--primary-color);
    font-weight: 600;
    z-index: 2;
    height: auto;
    width: auto;
    padding: 0 0.5rem;
    left: 0.5rem;
    top: -0.5rem;
    background: var(--card-bg, #ffffff);
}

/* Icons positioning */
.premium-input-group i {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-secondary, #64748b);
    z-index: 3;
    pointer-events: none;
    font-size: 1.2rem;
}

/* Placeholder style */
.premium-input-group .form-control::placeholder,
.premium-input-group .textarea::placeholder {
    color: transparent;
}

/* Input padding */
.premium-input-group .form-floating > .form-control,
.premium-input-group .form-floating > .form-select {
    padding-top: 1.625rem;
    padding-bottom: 0.625rem;
    height: calc(3.75rem + 2px);
    line-height: 1.5;
    z-index: 0;
    position: relative;
}

/* File input wrapper */
.file-input-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
    width: 100%;
}

.file-input-wrapper input[type=file] {
    position: relative;
    z-index: 2;
    opacity: 0;
    height: 60px;
    cursor: pointer;
}

.file-input-button {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 1rem;
    gap: 8px;
    transition: var(--transition);
    pointer-events: none;
    z-index: 1;
}

.file-input-wrapper:hover .file-input-button {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

/* Nominee section */
.nominee-section {
    background: var(--bg-secondary, #f8fafc);
    border-radius: 20px;
    padding: 2rem;
    margin: 2rem 0;
    border: 1px solid var(--border-color, #e2e8f0);
    box-shadow: var(--shadow-md);
    position: relative;
    overflow: hidden;
    transition: var(--transition);
}

.nominee-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
}

.nominee-title {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 2rem;
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--text-primary, #0f172a);
}

.nominee-title i {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size: 2.25rem;
}

/* Button */
.btn-premium {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 14px;
    padding: 1.25rem 2rem;
    font-weight: 700;
    font-size: 1.2rem;
    color: white;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
    z-index: 1;
    width: 100%;
    box-shadow: var(--shadow-lg);
    cursor: pointer;
    letter-spacing: 0.5px;
}

.btn-premium::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s ease;
    z-index: -1;
}

.btn-premium:hover::before {
    left: 100%;
}

.btn-premium:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-xl);
}

/* Dark mode styles - automatically handled by theme-manager variables */
body.dark-mode .card-inner {
    background: var(--card-bg, #1e293b);
}

body.dark-mode .form-section-title {
    color: var(--text-primary, #f1f5f9);
    border-bottom-color: var(--border-color, #334155);
}

body.dark-mode .premium-input-group .form-control,
body.dark-mode .premium-input-group .form-select {
    background: var(--input-bg, #0f172a);
    border-color: var(--border-color, #334155);
    color: var(--text-primary, #f1f5f9);
}

body.dark-mode .premium-input-group .form-control:focus,
body.dark-mode .premium-input-group .form-select:focus {
    border-color: var(--primary-color);
    background: var(--input-bg, #0f172a);
    color: var(--text-primary, #f1f5f9);
}

body.dark-mode .premium-input-group .form-floating > label {
    color: var(--text-secondary, #cbd5e1);
}

body.dark-mode .premium-input-group .form-floating > .form-control:focus ~ label,
body.dark-mode .premium-input-group .form-floating > .form-control:not(:placeholder-shown) ~ label,
body.dark-mode .premium-input-group .form-floating > .form-select ~ label {
    background: var(--card-bg, #1e293b);
    color: #a5b4fc;
}

body.dark-mode .premium-input-group i {
    color: var(--text-secondary, #cbd5e1);
}

body.dark-mode .nominee-section {
    background: var(--bg-secondary, #1e293b);
    border-color: var(--border-color, #334155);
}

body.dark-mode .nominee-title {
    color: var(--text-primary, #f1f5f9);
}

body.dark-mode select option {
    background-color: var(--bg-secondary, #1e293b);
    color: var(--text-primary, #f1f5f9);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card-inner {
        padding: 1rem;
    }
    
    .premium-input-group .form-floating {
        margin-bottom: 1rem;
    }
    
    .nominee-section {
        padding: 1rem;
    }
    
    .nominee-title {
        font-size: 1.5rem;
    }
    
    .nominee-title i {
        font-size: 2rem;
    }
    
    .btn-premium {
        padding: 1rem 1.5rem;
        font-size: 1.1rem;
    }
    
    .form-section-title {
        font-size: 1.3rem;
    }
}

@media (max-width: 576px) {
    .form-section-title {
        font-size: 1.2rem;
    }
    
    .nominee-title {
        font-size: 1.3rem;
    }
    
    .premium-input-group .form-control,
    .premium-input-group .form-select {
        font-size: 0.95rem;
        min-height: 55px;
    }
    
    .premium-input-group .form-floating > label {
        font-size: 0.95rem;
    }
}

/* Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.premium-card {
    animation: fadeInUp 0.6s ease-out;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: var(--bg-secondary, #f8fafc);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 10px;
}

body.dark-mode ::-webkit-scrollbar-track {
    background: var(--bg-secondary, #1e293b);
}

/* Smooth transitions */
body, 
.card-inner,
.premium-input-group .form-control,
.premium-input-group .form-select,
.premium-input-group .form-floating > label,
.nominee-section {
    transition: all 0.3s ease;
}
</style>

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
<div class="premium-card">
    <div class="card-inner">
        <form action="{{ route('merber-save') }}" method="POST" id="regForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="status" value="inactive">
            
            <h3 class="form-section-title">Personal Information</h3>
            
            <div class="row g-3">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="uid" name="uid" type="text" placeholder="UID" value="{{ $Uid }}" />
                            <label for="uid"><i class="fas fa-id-card me-2"></i>UID</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter your full name" value="{{ $name }}" />
                            <label for="name"><i class="fas fa-user me-2"></i>Full Name</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="premium-input-group">
                        <div class="file-input-wrapper">
                            <input class="form-control" id="member_image" name="member_image" type="file" accept="image/*" />
                            <div class="file-input-button">
                                <i class="fas fa-camera me-2"></i> Upload Photo
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <select class="form-select" name="gender" id="gender">
                                <option value="">Select Gender</option>
                                <option value="Male" @if ($gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if ($gender == 'Female') selected @endif>Female</option>
                                <option value="Others" @if ($gender == 'Others') selected @endif>Others</option>
                            </select>
                            <label for="gender"><i class="fas fa-venus-mars me-2"></i>Gender</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="age" name="age" type="number" placeholder="Enter your age" value="{{ $age }}" />
                            <label for="age"><i class="fas fa-birthday-cake me-2"></i>Age</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <select class="form-select" name="religion" id="religion">
                                <option value="">Select Religion</option>
                                <option value="Islam" @if ($religion == 'Islam') selected @endif>Islam</option>
                                <option value="Hindu" @if ($religion == 'Hindu') selected @endif>Hindu</option>
                                <option value="Buddis" @if ($religion == 'Buddis') selected @endif>Buddis</option>
                                <option value="Kristan" @if ($religion == 'Kristan') selected @endif>Kristan</option>
                            </select>
                            <label for="religion"><i class="fas fa-pray me-2"></i>Religion</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" value="{{ $email }}" />
                            <label for="inputEmail"><i class="fas fa-envelope me-2"></i>Email</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="fathers_name" name="fathers_name" type="text" placeholder="Enter father's name" value="{{ $fathers_name }}" />
                            <label for="fathers_name"><i class="fas fa-male me-2"></i>Father's Name</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="mothers_name" name="mothers_name" type="text" placeholder="Enter mother's name" value="{{ $mothers_name }}" />
                            <label for="mothers_name"><i class="fas fa-female me-2"></i>Mother's Name</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="mobile" name="mobile" type="tel" placeholder="Enter mobile number" value="{{ $mobile }}" />
                            <label for="mobile"><i class="fas fa-phone me-2"></i>Mobile Number</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="address" name="address" type="text" placeholder="Enter address" value="{{ $address }}" />
                            <label for="address"><i class="fas fa-map-marker-alt me-2"></i>Address</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="nid" name="nid" type="text" placeholder="Enter NID number" value="{{ $nid }}" />
                            <label for="nid"><i class="fas fa-id-card me-2"></i>NID</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="profession" name="member_profession" type="text" placeholder="Enter profession" value="{{ $member_profession }}" />
                            <label for="profession"><i class="fas fa-briefcase me-2"></i>Profession</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nominee-section">
                <div class="nominee-title">
                    <i class="fas fa-users"></i>
                    <span>Nominee Information</span>
                </div>
                
                <div class="row g-3">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="premium-input-group">
                            <div class="form-floating">
                                <input class="form-control" id="nomini_name" name="nomini_name" type="text" placeholder="Enter nominee name" value="{{ $nomini_name }}" />
                                <label for="nomini_name"><i class="fas fa-user me-2"></i>Nominee Name</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="premium-input-group">
                            <div class="form-floating">
                                <input class="form-control" id="nomini_relation" name="nomini_relation" type="text" placeholder="Enter relation" value="{{ $nomini_relation }}" />
                                <label for="nomini_relation"><i class="fas fa-heart me-2"></i>Relation</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="premium-input-group">
                            <div class="form-floating">
                                <input class="form-control" id="nomini_age" name="nomini_age" type="number" placeholder="Enter age" value="{{ $nomini_age }}" />
                                <label for="nomini_age"><i class="fas fa-birthday-cake me-2"></i>Age</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="premium-input-group">
                            <div class="form-floating">
                                <input class="form-control" id="nomini_birth_nid" name="nomini_birth_nid" type="text" placeholder="Birth certificate / NID" value="{{ $nomini_barth_or_ind }}" />
                                <label for="nomini_birth_nid"><i class="fas fa-id-card me-2"></i>Birth / NID</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row g-3 mt-2">
                    <div class="col-12">
                        <div class="premium-input-group">
                            <div class="form-floating">
                                <textarea class="form-control" id="nomini_adress" name="nomini_adress" placeholder="Enter nominee address" style="height: 120px">{{ old('nomini_adress', $nomini_address) }}</textarea>
                                <label for="nomini_adress"><i class="fas fa-map-marker-alt me-2"></i>Nominee Address</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="button" onclick="saveFile(this)" class="btn-premium" redirect="{{ route('member-list') }}">
                    <i class="fas fa-user-plus me-2"></i> Create Account
                    <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">