<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>

body{
    font-family:'Inter',sans-serif;
    background:#f3f4f6;
}

.profile-wrapper{
    display:grid;
    grid-template-columns:280px 1fr;
    gap:20px;
    padding:20px;
}

/* LEFT PROFILE PANEL */
.left-panel{
    background:white;
    border-radius:18px;
    padding:25px;
    text-align:center;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
}

.profile-img{
    width:120px;
    height:120px;
    border-radius:50%;
    object-fit:cover;
    border:4px solid #1e3a8a;
}

.status-badge{
    display:inline-block;
    padding:6px 15px;
    border-radius:20px;
    font-size:13px;
    margin-top:10px;
}

.status-active{
    background:#10b981;
    color:white;
}

.status-inactive{
    background:#ef4444;
    color:white;
}

.info-list{
    margin-top:20px;
    text-align:left;
}

.info-list div{
    padding:10px;
    border-bottom:1px solid #eee;
    font-size:14px;
}

/* RIGHT PANEL */
.right-panel{
    background:white;
    border-radius:18px;
    padding:25px;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
}

.section-title{
    font-size:18px;
    font-weight:700;
    margin-bottom:15px;
    border-left:5px solid #1e3a8a;
    padding-left:10px;
}

/* INFO GRID */
.info-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:15px;
}

.info-card{
    background:#f9fafb;
    padding:15px;
    border-radius:12px;
    border:1px solid #e5e7eb;
    font-size:14px;
}

/* BUTTON */
.btn-blue{
    background:#1e3a8a;
    color:white;
    padding:10px 18px;
    border:none;
    border-radius:12px;
    width:100%;
    margin-top:15px;
}

.btn-green{
    background:#059669;
    color:white;
    padding:10px 18px;
    border:none;
    border-radius:12px;
    width:100%;
    margin-top:10px;
}

@media(max-width:900px){
    .profile-wrapper{
        grid-template-columns:1fr;
    }
}

</style>


<div class="profile-wrapper">

<!-- LEFT SIDE -->
<div class="left-panel">

    <img src="{{ $user->member_photo 
        ? asset('images/member_images/'.$user->member_photo) 
        : asset('images/member_images/avater2.jpg') }}"
        class="profile-img">

    <h4 class="mt-3">{{ $user->name }}</h4>

    <span class="status-badge 
        {{ $user->status=='active' ? 'status-active' : 'status-inactive' }}">
        {{ strtoupper($user->status) }}
    </span>

    <div class="info-list">
        <div><b>ID:</b> {{ $user->user_name }}</div>
        <div><b>Mobile:</b> {{ $user->mobile }}</div>
        <div><b>Email:</b> {{ $user->email }}</div>
    </div>

    <button onclick="window.location.href='{{ route('admin-change-password') }}'"
        class="btn-blue">
        <i class="fa fa-lock"></i> Change Password
    </button>

</div>


<!-- RIGHT SIDE -->
<div class="right-panel">

    <div class="section-title">
        <i class="fa fa-user"></i> Personal Information
    </div>

    <div class="info-grid">

        <div class="info-card">
            <b>Father Name</b><br>
            {{ $user->fathers_name }}
        </div>

        <div class="info-card">
            <b>Mother Name</b><br>
            {{ $user->mothers_name }}
        </div>

        <div class="info-card">
            <b>Gender</b><br>
            {{ $user->gender }}
        </div>

        <div class="info-card">
            <b>Age</b><br>
            {{ $user->age }}
        </div>

        <div class="info-card">
            <b>Religion</b><br>
            {{ $user->religion }}
        </div>

        <div class="info-card">
            <b>NID</b><br>
            {{ $user->nid }}
        </div>

        <div class="info-card">
            <b>Profession</b><br>
            {{ $user->profession }}
        </div>

        <div class="info-card">
            <b>Address</b><br>
            {{ $user->address }}
        </div>

    </div>

</div>

</div>