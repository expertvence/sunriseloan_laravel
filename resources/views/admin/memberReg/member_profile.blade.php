<style>
    :root {
        --primary: #4361ee;
        --secondary: #3f37c9;
        --success: #4cc9f0;
        --danger: #f72585;
        --warning: #f8961e;
        --info: #4895ef;
        --dark: #1b263b;
        --light: #f8f9fa;
        
        --gradient-1: linear-gradient(145deg, #667eea, #764ba2);
        --gradient-2: linear-gradient(145deg, #f093fb, #f5576c);
        --gradient-3: linear-gradient(145deg, #4facfe, #00f2fe);
        --gradient-4: linear-gradient(145deg, #43e97b, #38f9d7);
        --gradient-5: linear-gradient(145deg, #fa709a, #fee140);
        --gradient-6: linear-gradient(145deg, #a18cd1, #fbc2eb);
        --gradient-7: linear-gradient(145deg, #ff9a9e, #fad0c4);
        --gradient-8: linear-gradient(145deg, #a8edea, #fed6e3);
        
        --card-shadow: 0 20px 40px -14px rgba(0,0,0,0.25);
    }

    body {
        margin-top: 20px;
        background: linear-gradient(145deg, #667eea15 0%, #764ba215 100%);
        font-family: 'Inter', sans-serif;
    }

    .main-body {
        padding: 30px 15px;
    }

    /* Main Card */
    .main-card {
        background: white;
        border-radius: 32px;
        box-shadow: var(--card-shadow);
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.05);
    }

    /* Section Headers */
    .section-header {
        padding: 20px 25px;
        margin: 20px 0 10px 0;
    }

    .header-personal {
        background: linear-gradient(145deg, #667eea20, #764ba220);
        border-left: 8px solid #667eea;
    }

    .header-contact {
        background: linear-gradient(145deg, #4facfe20, #00f2fe20);
        border-left: 8px solid #4facfe;
    }

    .header-nominee {
        background: linear-gradient(145deg, #fa709a20, #fee14020);
        border-left: 8px solid #fa709a;
    }

    .section-header h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .header-personal h3 { color: #667eea; }
    .header-contact h3 { color: #4facfe; }
    .header-nominee h3 { color: #fa709a; }

    .section-header i {
        font-size: 1.8rem;
        opacity: 0.9;
    }

    /* Avatar Section */
    .avatar-section {
        background: linear-gradient(145deg, #f8fafd, #eef2f6);
        padding: 30px;
        border-bottom: 2px solid rgba(0,0,0,0.05);
    }

    .avatar-wrapper {
        display: flex;
        align-items: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    .avatar-container {
        position: relative;
        display: inline-block;
    }

    .avatar-ring {
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        border-radius: 50%;
        background: linear-gradient(145deg, #667eea, #764ba2, #f093fb, #f5576c);
        opacity: 0.7;
    }

    .profile-avatar {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        border: 5px solid white;
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        position: relative;
        z-index: 2;
        object-fit: cover;
    }

    .status-badge-custom {
        position: absolute;
        bottom: 5px;
        right: 5px;
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        z-index: 3;
        border: 2px solid white;
    }

    .status-badge-custom.active {
        background: linear-gradient(145deg, #43e97b, #38f9d7);
        color: #0a5c3a;
    }

    .status-badge-custom.inactive {
        background: linear-gradient(145deg, #f093fb, #f5576c);
        color: #7a1f3a;
    }

    .name-title h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 10px;
    }

    .id-badge {
        display: inline-block;
        background: linear-gradient(145deg, #667eea20, #764ba220);
        color: #667eea;
        padding: 8px 20px;
        border-radius: 50px;
        font-weight: 600;
        margin-right: 10px;
        border: 1px solid #667eea40;
    }

    .mobile-badge {
        display: inline-block;
        background: linear-gradient(145deg, #4facfe20, #00f2fe20);
        color: #4facfe;
        padding: 8px 20px;
        border-radius: 50px;
        font-weight: 600;
        border: 1px solid #4facfe40;
    }

    /* Action Buttons */
    .action-buttons-custom {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .btn-custom {
        padding: 14px 35px;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        color: white;
        border: 1px solid rgba(255,255,255,0.2);
    }

    .btn-custom.follow {
        background: linear-gradient(145deg, #667eea, #764ba2);
    }

    .btn-custom.message {
        background: linear-gradient(145deg, #4facfe, #00f2fe);
    }

    /* Info Grid */
    .info-grid-custom {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        padding: 20px;
    }

    .info-card-custom {
        padding: 20px;
        border-radius: 24px;
        background: white;
        border: 1px solid #eef2f6;
        box-shadow: 0 5px 15px rgba(0,0,0,0.03);
    }

    /* Different Colors for Each Info Card */
    .info-card-custom:nth-child(1) { border-top: 4px solid #667eea; }
    .info-card-custom:nth-child(2) { border-top: 4px solid #f5576c; }
    .info-card-custom:nth-child(3) { border-top: 4px solid #4facfe; }
    .info-card-custom:nth-child(4) { border-top: 4px solid #43e97b; }
    .info-card-custom:nth-child(5) { border-top: 4px solid #fa709a; }
    .info-card-custom:nth-child(6) { border-top: 4px solid #a18cd1; }

    .info-icon {
        width: 45px;
        height: 45px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        margin-bottom: 15px;
        color: white;
    }

    .info-icon-1 { background: linear-gradient(145deg, #667eea, #764ba2); }
    .info-icon-2 { background: linear-gradient(145deg, #f093fb, #f5576c); }
    .info-icon-3 { background: linear-gradient(145deg, #4facfe, #00f2fe); }
    .info-icon-4 { background: linear-gradient(145deg, #43e97b, #38f9d7); }
    .info-icon-5 { background: linear-gradient(145deg, #fa709a, #fee140); }
    .info-icon-6 { background: linear-gradient(145deg, #a18cd1, #fbc2eb); }

    .info-label {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #64748b;
        margin-bottom: 6px;
    }

    .info-value {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1e293b;
    }

    /* Contact Cards */
    .contact-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        padding: 20px;
    }

    .contact-card {
        background: white;
        padding: 20px;
        border-radius: 24px;
        display: flex;
        align-items: center;
        gap: 18px;
        border: 1px solid #eef2f6;
        box-shadow: 0 5px 15px rgba(0,0,0,0.03);
    }

    .contact-card.address { border-left: 6px solid #4facfe; }
    .contact-card.email { border-left: 6px solid #fa709a; }

    .contact-icon {
        width: 55px;
        height: 55px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
    }

    .contact-icon.address { background: linear-gradient(145deg, #4facfe, #00f2fe); }
    .contact-icon.email { background: linear-gradient(145deg, #fa709a, #fee140); }

    .contact-label {
        font-size: 0.85rem;
        color: #64748b;
        margin-bottom: 5px;
    }

    .contact-value {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1e293b;
    }

    /* Nominee Section */
    .nominee-wrapper {
        padding: 20px;
    }

    .nominee-card {
        background: linear-gradient(145deg, #f8fafd, #f1f5f9);
        border-radius: 24px;
        padding: 30px;
        border: 2px dashed #fa709a40;
    }

    .nominee-profile {
        display: flex;
        align-items: center;
        gap: 30px;
        margin-bottom: 30px;
        padding: 20px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    .nominee-avatar-wrapper {
        position: relative;
    }

    .nominee-ring {
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        border-radius: 50%;
        background: linear-gradient(145deg, #fa709a, #fee140);
        opacity: 0.5;
    }

    .nominee-avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        border: 4px solid white;
        position: relative;
        z-index: 2;
        object-fit: cover;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .nominee-name {
        font-size: 2rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 8px;
    }

    .relation-badge {
        background: linear-gradient(145deg, #fa709a, #fee140);
        color: white;
        padding: 8px 20px;
        border-radius: 50px;
        font-weight: 600;
        display: inline-block;
        border: 2px solid white;
    }

    /* Nominee Details */
    .nominee-details-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .detail-item {
        background: white;
        padding: 20px;
        border-radius: 18px;
        border: 1px solid #eef2f6;
    }

    .detail-item.age { border-bottom: 4px solid #4facfe; }
    .detail-item.id { border-bottom: 4px solid #fa709a; }
    .detail-item.address { 
        grid-column: span 2; 
        border-bottom: 4px solid #43e97b;
    }

    .detail-label {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .detail-label i.age { color: #4facfe; }
    .detail-label i.id { color: #fa709a; }
    .detail-label i.address { color: #43e97b; }

    .detail-value {
        font-size: 1.3rem;
        font-weight: 600;
        color: #1e293b;
    }

    .detail-value.address-value {
        font-size: 1.1rem;
    }

    /* Verification Badges */
    .badges-container {
        display: flex;
        gap: 15px;
        margin-top: 25px;
        flex-wrap: wrap;
    }

    .badge-custom {
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        color: white;
        border: 1px solid rgba(255,255,255,0.3);
    }

    .badge-custom.verified { background: linear-gradient(145deg, #43e97b, #38f9d7); }
    .badge-custom.primary { background: linear-gradient(145deg, #4facfe, #00f2fe); }
    .badge-custom.active { background: linear-gradient(145deg, #fa709a, #fee140); }

    /* Responsive */
    @media (max-width: 768px) {
        .avatar-wrapper {
            flex-direction: column;
            text-align: center;
        }
        
        .contact-grid,
        .nominee-details-grid {
            grid-template-columns: 1fr;
        }
        
        .detail-item.address {
            grid-column: span 1;
        }
        
        .nominee-profile {
            flex-direction: column;
            text-align: center;
        }
        
        .action-buttons-custom {
            justify-content: center;
        }
    }
</style>

<!-- Add Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="container">
    <div class="main-body">
        
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="#" style="color: #667eea; text-decoration: none;">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#" style="color: #764ba2; text-decoration: none;">Members</a></li>
                <li class="breadcrumb-item active" style="color: #f5576c; font-weight: 600;">Profile</li>
            </ol>
        </nav>

        <!-- Main Card -->
        <div class="main-card">
            
            <!-- Avatar Section -->
            <div class="avatar-section">
                <div class="avatar-wrapper">
                    <div class="avatar-container">
                        <div class="avatar-ring"></div>
                        @if(!empty($data) && $data['member_photo'] !="")
                            <img src="{{asset('images/member_images/'.$data['member_photo'])}}" alt="{{$data['name']}}" class="profile-avatar">
                        @else
                            <img src="{{asset('images/member_images/avater2.jpg')}}" alt="Default Avatar" class="profile-avatar">
                        @endif
                        
                        <span class="status-badge-custom {{$data['is_publish'] == 1 ? 'active' : 'inactive'}}">
                            <i class="fas {{$data['is_publish'] == 1 ? 'fa-check-circle' : 'fa-clock'}} me-1"></i>
                            {{$data['is_publish'] == 1 ? 'ACTIVE' : 'INACTIVE'}}
                        </span>
                    </div>
                    
                    <div style="flex: 1;">
                        <div class="name-title">
                            <h1>{{$data['name']}}</h1>
                        </div>
                        <div class="mb-3">
                            <span class="id-badge">
                                <i class="fas fa-id-card me-2"></i>{{$data['Uid']}}
                            </span>
                            <span class="mobile-badge">
                                <i class="fas fa-phone-alt me-2"></i>{{$data['mobile']}}
                            </span>
                        </div>
                        
                        <div class="action-buttons-custom">
                            <button class="btn-custom follow">
                                <i class="fas fa-user-plus"></i> Follow
                            </button>
                            <button class="btn-custom message">
                                <i class="fas fa-envelope"></i> Message
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Personal Information Section -->
            <div class="section-header header-personal">
                <h3>
                    <i class="fas fa-user-circle"></i>
                    Personal Information
                </h3>
            </div>

            <div class="info-grid-custom">
                <div class="info-card-custom">
                    <div class="info-icon info-icon-1"><i class="fas fa-user-tie"></i></div>
                    <div class="info-label">Father's Name</div>
                    <div class="info-value">{{$data['fathers_mane']}}</div>
                </div>

                <div class="info-card-custom">
                    <div class="info-icon info-icon-2"><i class="fas fa-user"></i></div>
                    <div class="info-label">Mother's Name</div>
                    <div class="info-value">{{$data['mothers_mane']}}</div>
                </div>

                <div class="info-card-custom">
                    <div class="info-icon info-icon-3"><i class="fas fa-calendar-alt"></i></div>
                    <div class="info-label">Age & Gender</div>
                    <div class="info-value">{{$data['age']}} years, {{$data['gender']}}</div>
                </div>

                <div class="info-card-custom">
                    <div class="info-icon info-icon-4"><i class="fas fa-pray"></i></div>
                    <div class="info-label">Religion</div>
                    <div class="info-value">{{$data['religion']}}</div>
                </div>

                <div class="info-card-custom">
                    <div class="info-icon info-icon-5"><i class="fas fa-id-card"></i></div>
                    <div class="info-label">NID Number</div>
                    <div class="info-value">{{$data['nid']}}</div>
                </div>

                <div class="info-card-custom">
                    <div class="info-icon info-icon-6"><i class="fas fa-briefcase"></i></div>
                    <div class="info-label">Profession</div>
                    <div class="info-value">{{$data['member_profession']}}</div>
                </div>
            </div>

            <!-- Contact Information Section -->
            <div class="section-header header-contact">
                <h3>
                    <i class="fas fa-address-card"></i>
                    Contact Information
                </h3>
            </div>

            <div class="contact-grid">
                <div class="contact-card address">
                    <div class="contact-icon address">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <div class="contact-label">Address</div>
                        <div class="contact-value">{{$data['address']}}</div>
                    </div>
                </div>

                <div class="contact-card email">
                    <div class="contact-icon email">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <div class="contact-label">Email Address</div>
                        <div class="contact-value">{{$data['email']}}</div>
                    </div>
                </div>
            </div>

            <!-- Nominee Information Section -->
            <div class="section-header header-nominee">
                <h3>
                    <i class="fas fa-users"></i>
                    Nominee Information
                </h3>
            </div>

            <div class="nominee-wrapper">
                <div class="nominee-card">
                    <div class="nominee-profile">
                        <div class="nominee-avatar-wrapper">
                            <div class="nominee-ring"></div>
                            @if(!empty($data) && $data['nomini_photo'] !="")
                                <img src="{{asset('images/member_images/'.$data['nomini_photo'])}}" alt="Nominee" class="nominee-avatar">
                            @else
                                <img src="{{asset('images/member_images/avater2.jpg')}}" alt="Nominee" class="nominee-avatar">
                            @endif
                        </div>
                        
                        <div>
                            <div class="nominee-name">{{$data['nomini_name']}}</div>
                            <span class="relation-badge">
                                <i class="fas fa-heart me-2"></i>{{$data['nomini_relation']}}
                            </span>
                        </div>
                    </div>

                    <div class="nominee-details-grid">
                        <div class="detail-item age">
                            <div class="detail-label">
                                <i class="fas fa-calendar-alt age"></i> Age
                            </div>
                            <div class="detail-value">{{$data['nomini_age']}} Years</div>
                        </div>

                        <div class="detail-item id">
                            <div class="detail-label">
                                <i class="fas fa-id-card id"></i> ID / Certificate
                            </div>
                            <div class="detail-value">{{$data['nomini_barth_or_ind']}}</div>
                        </div>

                        <div class="detail-item address">
                            <div class="detail-label">
                                <i class="fas fa-map-marker-alt address"></i> Address
                            </div>
                            <div class="detail-value address-value">{{$data['nomini_address']}}</div>
                        </div>
                    </div>

                    <div class="badges-container">
                        <span class="badge-custom verified">
                            <i class="fas fa-check-circle"></i> Verified Nominee
                        </span>
                        <span class="badge-custom primary">
                            <i class="fas fa-shield-alt"></i> Primary Beneficiary
                        </span>
                        <span class="badge-custom active">
                            <i class="fas fa-clock"></i> Active Status
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Your existing JavaScript -->
<script>
    $(document).ready(function() {
        $(".data-table").DataTable({
            "ordering": true,
            "bAutoWidth": true,
        });
    });
</script>