<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
body{
    font-family: 'Inter', sans-serif;
    background:#f3f4f6;
}

.profile-card{
    background:white;
    border-radius:18px;
    box-shadow:0 4px 15px rgba(0,0,0,0.06);
    padding:20px;
}

.profile-avatar{
    width:120px;
    height:120px;
    border-radius:50%;
    object-fit:cover;
    border:4px solid #1e3a8a;
}

.badge-custom{
    padding:6px 14px;
    border-radius:14px;
    font-size:13px;
}

.active-badge{
    background:#10b981;
    color:white;
}

.inactive-badge{
    background:#ef4444;
    color:white;
}

.info-box{
    background:#f9fafb;
    padding:12px;
    border-radius:12px;
    border:1px solid #e5e7eb;
    font-size:14px;
}
</style>

<div class="container mt-4">

<div class="profile-card">

    <!-- Header Section -->
    <div class="d-flex align-items-center gap-4 flex-wrap">

        <!-- Avatar -->
        <div>
            <img class="profile-avatar"
            src="{{ $user->member_photo 
                ? asset('images/member_images/'.$user->member_photo) 
                : asset('images/member_images/avater2.jpg') }}">
        </div>

        <!-- User Info -->
        <div>
            <h3 class="mb-2">
                {{ optional($user)->name }}
            </h3>

            <div class="mb-2">

                <span class="badge-custom {{ $user->status=='active' ? 'active-badge':'inactive-badge' }}">
                    <i class="fa fa-check-circle"></i>
                    {{ strtoupper($user->status) }}
                </span>

            </div>

            <div>
                <span class="badge bg-light text-dark me-2">
                    <i class="fa fa-id-card"></i>
                    {{ optional($user)->user_name }}
                </span>

                <span class="badge bg-light text-dark">
                    <i class="fa fa-phone"></i>
                    {{ optional($user)->mobile }}
                </span>
            </div>
        </div>

    </div>

    <hr>

    <!-- Personal Info -->
    <h5 class="mb-3">
        <i class="fa fa-user-circle"></i> Personal Information
    </h5>

    <div class="row g-3">

        <div class="col-md-4">
            <div class="info-box">
                <b>Father Name</b><br>
                {{ optional($user)->fathers_name }}
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <b>Mother Name</b><br>
                {{ optional($user)->mothers_name }}
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <b>Gender</b><br>
                {{ optional($user)->gender }}
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <b>Age</b><br>
                {{ optional($user)->age }}
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <b>Religion</b><br>
                {{ optional($user)->religion }}
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <b>NID</b><br>
                {{ optional($user)->nid }}
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <b>Profession</b><br>
                {{ optional($user)->profession }}
            </div>
        </div>

    </div>

    <hr>

    <!-- Contact -->
    <h5 class="mb-3">
        <i class="fa fa-address-card"></i> Contact Information
    </h5>

    <div class="row g-3">

        <div class="col-md-6">
            <div class="info-box">
                <b>Email</b><br>
                {{ optional($user)->email }}
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-box">
                <b>Address</b><br>
                {{ optional($user)->address }}
            </div>
        </div>

    </div>

</div>
</div>