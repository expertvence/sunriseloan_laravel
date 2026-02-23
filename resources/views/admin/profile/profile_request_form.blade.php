@php
    $authUser = Auth()->user();
@endphp

<div class="card-body" style="background: linear-gradient(135deg,#f8fbff,#eef3f9); border-radius: 28px; padding: 2.5rem; box-shadow: 0 25px 50px -12px rgba(0,20,40,0.18); width: 100%; margin: 0 auto; position: relative; overflow: hidden;">
    
    <!-- Decorative Background Glow -->
    <div style="position:absolute; top:-80px; right:-80px; width:200px; height:200px; background:radial-gradient(circle,#0a2540 0%,transparent 70%); opacity:0.08;"></div>

    <!-- USER PROFILE HEADER -->
    <div style="display:flex; align-items:center; gap:18px; margin-bottom:32px; border-bottom:1px solid #e6edf5; padding-bottom:22px;">
        
        <!-- USER IMAGE / ICON -->
        <div style="width:72px; height:72px; border-radius:20px; overflow:hidden; background:linear-gradient(145deg,#0a2540,#1f3a5f); display:flex; align-items:center; justify-content:center; color:white; font-size:32px; box-shadow:0 8px 20px rgba(0,0,0,0.15);">
            
            @if($authUser->image ?? false)
                <img src="{{ asset('images/user_images/'.$authUser->image) }}" 
                     style="width:100%; height:100%; object-fit:cover;">
            @else
                <i class="fas fa-user-shield"></i>
            @endif

        </div>

        <!-- USER INFO -->
        <div>
            <h2 style="margin:0; font-size:1.5rem; font-weight:600; color:#0a2540;">
                {{ $authUser->name }}
            </h2>
            <p style="margin:4px 0 0; color:#5d6f85; font-size:0.9rem;">
                <i class="fas fa-shield-alt" style="margin-right:6px;"></i>
                Secure your account password
            </p>
        </div>
    </div>


    <!-- PASSWORD RESET TITLE -->
    <div style="margin-bottom:28px;">
        <h1 style="font-size:1.6rem; font-weight:600; color:#0a2540; margin:0;">
            Password Reset
        </h1>
        <p style="margin-top:6px; color:#6b7c93;">
            Update your password to keep your account safe.
        </p>
    </div>


    <!-- FORM START -->
    <form id="passwordForm" enctype="multipart/form-data">
        @csrf

        <!-- Old Password -->
        <div style="margin-bottom:22px;">
            <label style="display:block; margin-bottom:8px; font-weight:500; color:#1e3349;">Old Password</label>
            <div style="position:relative;">
                <i class="fas fa-lock" style="position:absolute; left:16px; top:50%; transform:translateY(-50%); color:#8a9bb5;"></i>
                <input type="password" name="old_password"
                       style="width:100%; padding:14px 16px 14px 48px; border:1.8px solid #e2e8f0; border-radius:16px; font-size:1rem; background:#fff; transition:0.2s;"
                       placeholder="Enter current password" required>
            </div>
        </div>

        <!-- New Password -->
        <div style="margin-bottom:22px;">
            <label style="display:block; margin-bottom:8px; font-weight:500; color:#1e3349;">New Password</label>
            <div style="position:relative;">
                <i class="fas fa-key" style="position:absolute; left:16px; top:50%; transform:translateY(-50%); color:#8a9bb5;"></i>
                <input type="password" name="new_password"
                       style="width:100%; padding:14px 16px 14px 48px; border:1.8px solid #e2e8f0; border-radius:16px; font-size:1rem; background:#fff;">
            </div>
        </div>

        <!-- Confirm Password -->
        <div style="margin-bottom:28px;">
            <label style="display:block; margin-bottom:8px; font-weight:500; color:#1e3349;">Confirm Password</label>
            <div style="position:relative;">
                <i class="fas fa-check-circle" style="position:absolute; left:16px; top:50%; transform:translateY(-50%); color:#8a9bb5;"></i>
                <input type="password" name="new_password_confirmation"
                       style="width:100%; padding:14px 16px 14px 48px; border:1.8px solid #e2e8f0; border-radius:16px; font-size:1rem; background:#fff;">
            </div>
        </div>

        <!-- BUTTON -->
        <button type="submit"
                style="width:100%; background:linear-gradient(135deg,#0a2540,#163a63); color:white; border:none; padding:16px 28px; border-radius:40px; font-weight:600; font-size:1.05rem; letter-spacing:0.3px; box-shadow:0 10px 25px rgba(10,37,64,0.3); cursor:pointer; transition:0.3s;">
            <i class="fas fa-save"></i> Update Password
        </button>
    </form>

    <!-- Response -->
    <div id="responseMsg"
         style="margin-top:20px; padding:14px; border-radius:40px; background:#f0f5ff; text-align:center; font-weight:500; color:#0a2540;">
    </div>

</div>

<!-- Add FontAwesome for icons (minimal, just for the image) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Your original jQuery and script - unchanged -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#passwordForm').on('submit', function(e) {
        e.preventDefault();

        let formData = {
            old_password: $('input[name="old_password"]').val(),
            new_password: $('input[name="new_password"]').val(),
            new_password_confirmation: $('input[name="new_password_confirmation"]').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            type: "POST",
            url: "{{ route('reset.password') }}",
            data: formData,
            success: function(response) {
                if (response.success) {
                    $('#responseMsg').text(response.message).css('color', 'green');
                    $('#passwordForm')[0].reset();
                } else {
                    $('#responseMsg').text(response.message).css('color', 'red');
                }
            },
            error: function(xhr) {
                const errors = xhr.responseJSON.errors;
                let messages = '';
                for (let field in errors) {
                    messages += errors[field][0] + '\n';
                }
                alert(messages);
            }
        });
    });
</script>