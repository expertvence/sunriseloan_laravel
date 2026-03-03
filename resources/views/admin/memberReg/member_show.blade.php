<!DOCTYPE html>
<html>

<head>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary: #1e3a8a;
            --secondary: #059669;
            --light: #f3f4f6;
            --dark: #374151;
        }

        body {
            background: var(--light);
            font-family: Inter;
        }

        .main-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .section-header {
            border-left: 5px solid var(--primary);
            padding-left: 10px;
            margin-top: 25px;
            font-weight: 600;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 12px;
        }

        .info-card {
            padding: 12px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        .badge-custom {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-active {
            background: var(--secondary);
            color: white;
        }

        .badge-inactive {
            background: red;
            color: white;
        }
    </style>

</head>

<body>

    <div class="container mt-4">

        <div class="main-card">

            <!-- PROFILE HEADER -->
            <div style="display:flex;gap:20px;align-items:center;flex-wrap:wrap">

                <div>
                    @if (!empty($user) && $user->member_photo != '')
                        <img src="{{ asset('images/member_images/' . $user->member_photo) }}" class="profile-avatar">
                    @else
                        <img src="{{ asset('images/member_images/avater2.jpg') }}" class="profile-avatar">
                    @endif
                </div>

                <div>
                    <h2>{{ $user->name ?? '' }}</h2>

                    {{-- <p>
<span class="badge-custom {{ $user->is_publish ? 'badge-active' : 'badge-inactive' }}">
    {{ $user->is_publish ? 'ACTIVE' : 'INACTIVE' }}
</span>
</p> --}}
                    <p>
                        <i class="fa fa-id-card"></i> {{ $user->Uid ?? '' }} <br>
                        <i class="fa fa-phone"></i> {{ $user->mobile ?? '' }}
                    </p>

                </div>

            </div>

            <!-- PERSONAL INFO -->
            <div class="section-header">
                <i class="fa fa-user"></i> Personal Information
            </div>

            <div class="info-grid">

                <div class="info-card">
                    <b>Name</b>
                    <h1>{{ $user->name }}</h1>
                </div>

                <div class="info-card">
                    <b>Father Name</b>
                    <p>{{ $user->fathers_name ?? '' }}</p>
                </div>

                <div class="info-card">
                    <b>Mother Name</b>
                    <p>{{ $user->mothers_name ?? '' }}</p>
                </div>

                <div class="info-card">
                    <b>Age</b>
                    <p>{{ $user->age ?? '' }}</p>
                </div>

                <div class="info-card">
                    <b>Gender</b>
                    <p>{{ $user->gender ?? '' }}</p>
                </div>

                <div class="info-card">
                    <b>Religion</b>
                    <p>{{ $user->religion ?? '' }}</p>
                </div>

                <div class="info-card">
                    <b>NID</b>
                    <p>{{ $user->nid ?? '' }}</p>
                </div>

                <div class="info-card">
                    <b>Profession</b>
                    <p>{{ $user->profession ?? ($user->member_profession ?? '') }}</p>
                </div>

            </div>

            <div class="section-header">
                <i class="fa fa-users"></i> Nominee Information
            </div>

            <div class="info-grid">

                <div class="info-card">
                    <b>Nominee Name</b>
                    <p>{{ $user->nomini_name ?? '' }}</p>
                </div>

                <div class="info-card">
                    <b>Nominee Relation</b>
                    <p>{{ $user->nomini_relation ?? '' }}</p>
                </div>

                <div class="info-card">
                    <b>Nominee Age</b>
                    <p>{{ $user->nomini_age ?? '' }}</p>
                </div>

                <div class="info-card">
                    <b>Nominee ID / Birth</b>
                    <p>{{ $user->nomini_barth_or_ind ?? '' }}</p>
                </div>

                <div class="info-card">
                    <b>Nominee Address</b>
                    <p>{{ $user->nomini_address ?? '' }}</p>
                </div>

            </div>


            <!-- CONTACT -->
            <div class="section-header">
                <i class="fa fa-address-card"></i> Contact Info
            </div>

            <div class="info-grid">

                <div class="info-card">
                    <b>Address</b>
                    <p>{{ $user->address ?? '' }}</p>
                </div>

                <div class="info-card">
                    <b>Email</b>
                    <p>{{ $user->email ?? '' }}</p>
                </div>

            </div>


            <!-- NOMINEE -->
            <div class="section-header">
                <i class="fa fa-users"></i> Nominee Info
            </div>

            <div class="info-grid">

                <div class="info-card">
                    <b>Nominee Name</b>
                    <p>{{ $user->nomini_name ?? '' }}</p>
                </div>

                <div class="info-card">
                    <b>Relation</b>
                    <p>{{ $user->nomini_relation ?? '' }}</p>
                </div>

                <div class="info-card">
                    <b>Nominee Age</b>
                    <p>{{ $user->nomini_age ?? '' }}</p>
                </div>

                <div class="info-card">
                    <b>Nominee Address</b>
                    <p>{{ $user->nomini_address ?? '' }}</p>
                </div>

            </div>

        </div>
    </div>

</body>

</html>
