<style>
:root {
    --primary: #1e3a8a; /* Soft Blue */
    --secondary: #059669; /* Soft Green */
    --neutral-light: #f3f4f6;
    --neutral-dark: #374151;
    --accent: #fbbf24; /* Yellow for badges */
}

/* BODY & CONTAINER */
body {
    margin-top: 10px;
    background: var(--neutral-light);
    font-family: 'Inter', sans-serif;
    color: var(--neutral-dark);
}

.main-body {
    padding: 15px 10px;
}

/* MAIN CARD */
.main-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    border: 1px solid #e5e7eb;
}

/* AVATAR SECTION */
.avatar-section {
    background: #f9fafb;
    padding: 15px 20px;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    align-items: center;
    gap: 15px;
}

.profile-avatar {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    border: 3px solid white;
    object-fit: cover;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
}

.status-badge-custom {
    padding: 6px 12px;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 600;
}

.status-badge-custom.active {
    background: var(--secondary);
    color: white;
}

.status-badge-custom.inactive {
    background: #ef4444;
    color: white;
}

/* NAME & ID INFO */
.name-title h1 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 5px;
}

.id-badge, .mobile-badge {
    font-size: 0.85rem;
    padding: 5px 12px;
    border-radius: 12px;
    margin-right: 6px;
    border: 1px solid #d1d5db;
    color: var(--neutral-dark);
    background: #f3f4f6;
}

/* ACTION BUTTONS */
.action-buttons-custom {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.btn-custom {
    padding: 8px 16px;
    border-radius: 12px;
    font-weight: 500;
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 6px;
    border: none;
    cursor: pointer;
}

.btn-custom.follow {
    background: var(--primary);
    color: white;
}

.btn-custom.message {
    background: var(--secondary);
    color: white;
}

/* SECTION HEADER */
.section-header {
    padding: 10px 15px;
    margin: 15px 0 8px 0;
    font-weight: 600;
    font-size: 1rem;
    border-left: 4px solid var(--primary);
    background: #f9fafb;
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--neutral-dark);
}

/* INFO GRID */
.info-grid-custom {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 12px;
    padding: 10px 15px;
}

.info-card-custom {
    padding: 10px 12px;
    border-radius: 12px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

.info-label {
    font-size: 0.75rem;
    color: #6b7280;
    margin-bottom: 4px;
}

.info-value {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--neutral-dark);
}

.info-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    margin-bottom: 6px;
    color: white;
}

.info-icon-1 { background: var(--primary); }
.info-icon-2 { background: var(--secondary); }
.info-icon-3 { background: #3b82f6; }
.info-icon-4 { background: #10b981; }
.info-icon-5 { background: #f59e0b; }
.info-icon-6 { background: #8b5cf6; }

/* CONTACT GRID */
.contact-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 10px;
    padding: 10px 15px;
}

.contact-card {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #ffffff;
    border-radius: 12px;
    padding: 10px 12px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

.contact-icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.9rem;
}

.contact-icon.address { background: #3b82f6; }
.contact-icon.email { background: #f59e0b; }

/* NOMINEE SECTION */
.nominee-wrapper {
    padding: 10px 15px;
}

.nominee-card {
    background: #ffffff;
    padding: 15px 12px;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

.nominee-profile {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
}

.nominee-avatar {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    border: 2px solid white;
    object-fit: cover;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

.nominee-name {
    font-size: 1.2rem;
    font-weight: 600;
}

.relation-badge {
    background: var(--accent);
    color: white;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 0.75rem;
}

/* NOMINEE DETAILS GRID */
.nominee-details-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 10px;
}

.detail-item {
    background: #f9fafb;
    padding: 8px 10px;
    border-radius: 8px;
    font-size: 0.85rem;
}

/* BADGES */
.badges-container {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
    margin-top: 10px;
}

.badge-custom {
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 4px;
}

.badge-custom.verified { background: #10b981; color: white; }
.badge-custom.primary { background: #3b82f6; color: white; }
.badge-custom.active { background: #f59e0b; color: white; }

/* RESPONSIVE */
@media (max-width: 768px) {
    .avatar-section, .nominee-profile {
        flex-direction: column;
        text-align: center;
    }
    
    .info-grid-custom, .contact-grid, .nominee-details-grid {
        grid-template-columns: 1fr;
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