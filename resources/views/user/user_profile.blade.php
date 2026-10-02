<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    .member-profile-page {
        --profile-ink: #183d39;
        --profile-muted: #66807a;
        --profile-line: #d3e4dd;
        --profile-card: #ffffff;
        --profile-tile: #f4f9f6;
        --profile-accent: #147b69;
        width: min(1480px, calc(100% - 40px));
        margin: 1.5rem auto;
        color: var(--profile-ink);
        font-family: 'Inter', sans-serif;
    }

    .member-profile-page .profile-card {
        padding: 1.5rem;
        border: 1px solid var(--profile-line);
        border-radius: 12px;
        background: var(--profile-card);
        box-shadow: 0 10px 30px rgba(26, 72, 58, 0.08);
    }

    .member-profile-page .profile-card h3,
    .member-profile-page .profile-card h5 { color: var(--profile-ink); }

    .member-profile-page .profile-card hr { border-color: var(--profile-line); opacity: 1; }

    .member-profile-page .profile-avatar {
        width: 120px;
        height: 120px;
        border: 4px solid var(--profile-line);
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 5px 18px rgba(25, 91, 72, 0.12);
    }

    .member-profile-page .badge-custom {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 6px 12px;
        border-radius: 14px;
        font-size: 12px;
        font-weight: 700;
    }

    .member-profile-page .active-badge { background: #d8f3e6; color: #176b4b; }
    .member-profile-page .inactive-badge { background: #fde8e7; color: #a63b3b; }

    .member-profile-page .profile-meta-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.38rem 0.65rem;
        border: 1px solid var(--profile-line);
        border-radius: 7px;
        background: var(--profile-tile);
        color: var(--profile-ink);
        font-size: 0.72rem;
    }

    .member-profile-page .profile-meta-badge i { color: var(--profile-accent); }

    .member-profile-page .info-box {
        min-height: 72px;
        padding: 0.8rem;
        border: 1px solid var(--profile-line);
        border-radius: 8px;
        background: var(--profile-tile);
        color: var(--profile-ink);
        font-size: 0.8rem;
        overflow-wrap: anywhere;
    }

    .member-profile-page .info-box b {
        display: inline-block;
        margin-bottom: 0.28rem;
        color: var(--profile-muted);
        font-size: 0.68rem;
    }

    .member-profile-page .profile-section-title {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.9rem !important;
        font-size: 0.95rem;
        font-weight: 700;
    }

    .member-profile-page .profile-section-title i { color: var(--profile-accent); }

    body.dark-mode .member-profile-page {
        --profile-ink: #e5f2ee;
        --profile-muted: #a4beb7;
        --profile-line: #315651;
        --profile-card: #102e32;
        --profile-tile: #14383a;
        --profile-accent: #72d2b2;
    }

    body.dark-mode .member-profile-page .profile-card { box-shadow: 0 12px 32px rgba(0, 0, 0, 0.2); }
    body.dark-mode .member-profile-page .active-badge { background: #194936; color: #9be3bc; }
    body.dark-mode .member-profile-page .inactive-badge { background: #4a292c; color: #f0a5a5; }

    @media (max-width: 600px) {
        .member-profile-page { width: calc(100% - 20px); margin: 0.75rem auto; }
        .member-profile-page .profile-card { padding: 1rem; }
        .member-profile-page .profile-avatar { width: 96px; height: 96px; }
    }
</style>

<div class="member-profile-page">
    <div class="profile-card">
        <div class="d-flex align-items-center gap-4 flex-wrap">
            <div>
                <img class="profile-avatar"
                    src="{{ $user->member_photo ? asset('images/member_images/' . $user->member_photo) : asset('assets/img/avatar.png') }}"
                    alt="{{ optional($user)->name }}">
            </div>

            <div>
                <h3 class="mb-2">{{ optional($user)->name }}</h3>
                <div class="mb-2">
                    <span class="badge-custom {{ $user->status == 'active' ? 'active-badge' : 'inactive-badge' }}">
                        <i class="fa fa-check-circle"></i>{{ strtoupper($user->status) }}
                    </span>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <span class="profile-meta-badge"><i class="fa fa-id-card"></i>{{ optional($user)->user_name }}</span>
                    <span class="profile-meta-badge"><i class="fa fa-phone"></i>{{ optional($user)->mobile }}</span>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <h5 class="profile-section-title"><i class="fa fa-user-circle"></i>Personal Information</h5>
        <div class="row g-3">
            <div class="col-md-4"><div class="info-box"><b>Father Name</b><br>{{ optional($user)->fathers_name }}</div></div>
            <div class="col-md-4"><div class="info-box"><b>Mother Name</b><br>{{ optional($user)->mothers_name }}</div></div>
            <div class="col-md-4"><div class="info-box"><b>Gender</b><br>{{ optional($user)->gender }}</div></div>
            <div class="col-md-4"><div class="info-box"><b>Age</b><br>{{ optional($user)->age }}</div></div>
            <div class="col-md-4"><div class="info-box"><b>Religion</b><br>{{ optional($user)->religion }}</div></div>
            <div class="col-md-4"><div class="info-box"><b>NID</b><br>{{ optional($user)->nid }}</div></div>
            <div class="col-md-4"><div class="info-box"><b>Profession</b><br>{{ optional($user)->profession }}</div></div>
        </div>

        <hr class="my-4">

        <h5 class="profile-section-title"><i class="fa fa-address-card"></i>Contact Information</h5>
        <div class="row g-3">
            <div class="col-md-6"><div class="info-box"><b>Email</b><br>{{ optional($user)->email }}</div></div>
            <div class="col-md-6"><div class="info-box"><b>Address</b><br>{{ optional($user)->address }}</div></div>
        </div>
    </div>
</div>
