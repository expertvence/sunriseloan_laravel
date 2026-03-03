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

<style>
/* Premium Form Styling - Theme Aware with Full Dark Mode */
.premium-form-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 4px;
    border-radius: 24px;
    box-shadow: var(--shadow-xl, 0 20px 25px -5px rgba(0,0,0,0.1));
    margin-bottom: 2rem;
    transition: all 0.3s ease;
    margin-top: 1.2rem;
}

.form-inner {
    background: var(--card-bg, #ffffff);
    border-radius: 22px;
    padding: 2rem;
    transition: all 0.3s ease;
}

/* Page Header */
.page-header-custom {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid var(--border-color, #e2e8f0);
}

.page-header-custom h1 {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary, #0f172a);
    margin: 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.page-header-custom i {
    font-size: 2.5rem;
    color: var(--primary-color, #4361ee);
    background: rgba(67, 97, 238, 0.1);
    padding: 12px;
    border-radius: 15px;
}

/* Premium Input Groups - Fixed Text Visibility */
.premium-input-group {
    margin-bottom: 1.5rem;
    position: relative;
}

.premium-input-group .form-floating {
    transition: all 0.3s ease;
}

.premium-input-group .form-floating:hover {
    transform: translateY(-2px);
}

.premium-input-group .form-control,
.premium-input-group .form-select {
    border: 2px solid var(--border-color, #e2e8f0);
    border-radius: 16px;
    padding: 0.75rem 1rem;
    height: auto;
    min-height: 60px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: var(--input-bg, #ffffff);
    color: var(--text-primary, #0f172a) !important; /* Force text color */
    box-shadow: var(--shadow-sm, 0 1px 2px 0 rgba(0,0,0,0.05));
}

/* Fix for input text visibility while typing */
.premium-input-group .form-control:focus,
.premium-input-group .form-control:active,
.premium-input-group .form-control:not(:placeholder-shown) {
    color: var(--text-primary, #0f172a) !important;
    background: var(--input-bg, #ffffff);
}

.premium-input-group .form-select {
    color: var(--text-primary, #0f172a) !important;
}

.premium-input-group .form-control::placeholder {
    color: transparent;
}

.premium-input-group .form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    outline: none;
}

/* Label styles */
.premium-input-group .form-floating > label {
    padding: 1rem 1rem;
    color: var(--text-secondary, #64748b);
    font-weight: 500;
    font-size: 0.95rem;
    transition: all 0.2s ease;
    background: transparent;
    z-index: 1;
}

.premium-input-group .form-floating > .form-control:focus ~ label,
.premium-input-group .form-floating > .form-control:not(:placeholder-shown) ~ label,
.premium-input-group .form-floating > .form-select ~ label {
    color: #667eea;
    transform: scale(0.85) translateY(-0.75rem) translateX(0.15rem);
    background: var(--card-bg, #ffffff);
    padding: 0 0.5rem;
    font-weight: 600;
    z-index: 2;
}

/* File Input Styling */
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
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 1rem;
    gap: 10px;
    transition: all 0.3s ease;
    pointer-events: none;
    z-index: 1;
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.file-input-wrapper:hover .file-input-button {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
}

/* Submit Button */
.btn-premium-submit {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 16px;
    padding: 1rem 2rem;
    font-weight: 700;
    font-size: 1.1rem;
    color: white;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    width: 100%;
    box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.btn-premium-submit:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-xl, 0 20px 25px -5px rgba(0,0,0,0.1));
}

.btn-premium-submit i {
    font-size: 1.2rem;
    transition: transform 0.3s ease;
}

.btn-premium-submit:hover i {
    transform: translateX(5px);
}

/* ===== DARK MODE FIXES - Full Page Dark ===== */
body.dark-mode {
    background-color: var(--dark-bg-primary, #0f172a) !important;
}

body.dark-mode .mainContant,
body.dark-mode #layoutSidenav,
body.dark-mode #layoutSidenav_content,
body.dark-mode .content-wrapper {
    background-color: var(--dark-bg-primary, #0f172a) !important;
}

/* Dark mode input fixes */
body.dark-mode .premium-input-group .form-control,
body.dark-mode .premium-input-group .form-select {
    background: var(--dark-input-bg, #0f172a) !important;
    border-color: var(--dark-border, #334155) !important;
    color: var(--dark-text-primary, #f1f5f9) !important;
}

/* Fix for text visibility while typing in dark mode */
body.dark-mode .premium-input-group .form-control:focus,
body.dark-mode .premium-input-group .form-control:active,
body.dark-mode .premium-input-group .form-control:not(:placeholder-shown) {
    color: var(--dark-text-primary, #f1f5f9) !important;
    background: var(--dark-input-bg, #0f172a) !important;
}

body.dark-mode .premium-input-group .form-select {
    color: var(--dark-text-primary, #f1f5f9) !important;
    background: var(--dark-input-bg, #0f172a) !important;
}

/* Select options in dark mode */
body.dark-mode select option {
    background-color: var(--dark-bg-secondary, #1e293b) !important;
    color: var(--dark-text-primary, #f1f5f9) !important;
}

/* Dark mode labels */
body.dark-mode .premium-input-group .form-floating > label {
    color: var(--dark-text-secondary, #cbd5e1) !important;
}

body.dark-mode .premium-input-group .form-floating > .form-control:focus ~ label,
body.dark-mode .premium-input-group .form-floating > .form-control:not(:placeholder-shown) ~ label,
body.dark-mode .premium-input-group .form-floating > .form-select ~ label {
    background: var(--dark-card-bg, #1e293b) !important;
    color: #a5b4fc !important;
}

/* Dark mode icons */
body.dark-mode .premium-input-group i {
    color: var(--dark-text-secondary, #cbd5e1) !important;
}

/* Dark mode card inner */
body.dark-mode .form-inner {
    background: var(--dark-card-bg, #1e293b) !important;
}

/* Dark mode page header */
body.dark-mode .page-header-custom {
    border-bottom-color: var(--dark-border, #334155) !important;
}

body.dark-mode .page-header-custom h1 {
    background: linear-gradient(135deg, #a5b4fc 0%, #c084fc 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Responsive Design */
@media (max-width: 768px) {
    .form-inner {
        padding: 1.5rem;
    }
    
    .page-header-custom {
        flex-direction: column;
        text-align: center;
        gap: 10px;
    }
    
    .page-header-custom h1 {
        font-size: 1.8rem;
    }
    
    .page-header-custom i {
        font-size: 2rem;
        padding: 10px;
    }
    
    .premium-input-group .form-control,
    .premium-input-group .form-select {
        min-height: 55px;
        font-size: 0.95rem;
    }
    
    .btn-premium-submit {
        padding: 0.875rem 1.5rem;
        font-size: 1rem;
    }
}

@media (max-width: 576px) {
    .form-inner {
        padding: 1rem;
    }
    
    .page-header-custom h1 {
        font-size: 1.5rem;
    }
    
    .page-header-custom i {
        font-size: 1.8rem;
        padding: 8px;
    }
    
    .premium-input-group .form-floating > label {
        font-size: 0.9rem;
    }
    
    .file-input-button {
        font-size: 0.9rem;
        padding: 0 10px;
    }
    
    .file-input-button i {
        font-size: 1rem;
    }
}

/* Animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.premium-form-card {
    animation: slideIn 0.5s ease-out;
}

/* Icons positioning */
.premium-input-group {
    position: relative;
}

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
</style>

<div class="premium-form-card">
    <div class="form-inner">
        <!-- Page Header -->
        <div class="page-header-custom">
            <i class="fas fa-user-tie"></i>
            <h1>Create Manager</h1>
        </div>

        <form action="{{ route('manager-create') }}" method="POST" id="regForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="status" value="inactive">
            
            <!-- Row 1: Name, Email, Photo -->
            <div class="row g-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter manager's full name" value="{{ $name }}" required />
                            <label for="name"><i class="fas fa-user me-2"></i>Full Name</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" value="{{ $email }}" required />
                            <label for="inputEmail"><i class="fas fa-envelope me-2"></i>Email Address</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-12">
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

            <!-- Row 2: Gender, Age, Religion -->
            <div class="row g-3">
                <div class="col-lg-4 col-md-4 col-sm-12">
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
                
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="age" name="age" type="number" placeholder="Enter age" value="{{ $age }}" />
                            <label for="age"><i class="fas fa-birthday-cake me-2"></i>Age</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-12">
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
            </div>

            <!-- Row 3: Father's Name, Mother's Name, Mobile, Address -->
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

            <!-- Row 4: NID, Profession -->
            <div class="row g-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="nid" name="nid" type="text" placeholder="Enter NID number" value="{{ $nid }}" />
                            <label for="nid"><i class="fas fa-id-card me-2"></i>NID Number</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="premium-input-group">
                        <div class="form-floating">
                            <input class="form-control" id="profession" name="profession" type="text" placeholder="Enter profession" value="{{ $profession }}" />
                            <label for="profession"><i class="fas fa-briefcase me-2"></i>Profession</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <button type="button" onclick="saveFile(this)" class="btn-premium-submit" redirect="{{ route('manager-list') }}">
                    <i class="fas fa-save me-2"></i> Create Manager Account
                    <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">