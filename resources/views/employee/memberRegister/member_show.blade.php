<!DOCTYPE html>
<html>

<head>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary: #0a2540;
            --secondary: #1f6feb;
            --light: #f3f6fb;
        }

        body {
            background: linear-gradient(135deg, #eef3f9, #f8fbff);
            font-family: Inter;
            margin: 0;
        }

        /* MAIN WRAPPER */
        .profile-wrapper {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 25px;
            padding: 30px;
        }

        /* LEFT PROFILE PANEL */
        .left-card {
            background: white;
            padding: 25px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--primary);
        }

        .status-badge {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            margin-top: 10px;
        }

        .active {
            background: #10b981;
            color: white;
        }

        .inactive {
            background: #ef4444;
            color: white;
        }

        /* RIGHT PANEL */
        .right-card {
            background: white;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        }

        /* SECTION TITLE */
        .section-title {
            font-size: 18px;
            font-weight: 700;
            border-left: 5px solid var(--primary);
            padding-left: 12px;
            margin: 25px 0 15px;
        }

        /* GRID */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 15px;
        }

        .info-card {
            background: #f8fbff;
            padding: 15px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            transition: .3s;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        }

        /* HEADER */
        .header {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        @media(max-width:900px) {
            .profile-wrapper {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>

<body>

    <div class="profile-wrapper">

        <!-- LEFT PROFILE -->
        <div class="left-card">

            <img src="{{ !empty($user->member_photo)
                ? asset('images/member_images/' . $user->member_photo)
                : asset('images/member_images/avater2.jpg') }}"
                class="profile-avatar">

            <h3>{{ $user->name ?? '' }}</h3>

            <div class="status-badge {{ $user->status == 'active' ? 'active' : 'inactive' }}">
                {{ $user->status ? 'ACTIVE' : 'INACTIVE' }}
            </div>

            <p style="margin-top:15px;font-size:14px">
                <i class="fa fa-id-card"></i> {{ $user->Uid ?? '' }} <br>
                <i class="fa fa-phone"></i> {{ $user->mobile ?? '' }}
            </p>

        </div>


        <!-- RIGHT DETAILS -->
        <div class="right-card">

            <h3>
                <i class="fa fa-user"></i> Profile Information
            </h3>

            <div class="section-title">Personal Information</div>

            <div class="info-grid">

                <div class="info-card">
                    <b>Name</b>
                    <p>{{ $user->name }}</p>
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
                    <p>{{ $user->profession ?? '' }}</p>
                </div>

            </div>


            <div class="section-title">Contact Information</div>

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


            <div class="section-title">Nominee Information</div>

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
