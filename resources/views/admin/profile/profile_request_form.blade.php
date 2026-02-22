<div class="card-body" style="background: white; border-radius: 24px; padding: 2rem; box-shadow: 0 20px 35px -8px rgba(0,20,40,0.15); max-width: 500px; margin: 0 auto;">
    
    <!-- Header with Image/Icon - showing user came for password reset -->
    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 28px; border-bottom: 1px solid #eef2f6; padding-bottom: 20px;">
        <div style="background: linear-gradient(145deg, #0a2540, #1f3a5f); width: 64px; height: 64px; border-radius: 18px; display: flex; align-items: center; justify-content: center; color: white; font-size: 30px;">
            <i class="fas fa-user-shield"></i> <!-- FontAwesome icon - user image representation -->
        </div>
        <div>
            <h1 style="font-size: 1.8rem; font-weight: 600; color: #0a2540; margin: 0; letter-spacing: -0.02em;">Password Reset</h1>
            <p style="margin: 4px 0 0; color: #5d6f85; font-size: 0.95rem;">
                <i class="fas fa-arrow-right" style="margin-right: 6px; font-size: 0.8rem;"></i>Secure your account
            </p>
        </div>
    </div>

    <!-- Original Form - unchanged logic, only styling improved -->
    <form id="passwordForm" enctype="multipart/form-data">
        @csrf

        <!-- Old Password -->
        <div style="margin-bottom: 22px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #1e3349; font-size: 0.95rem;">Old Password</label>
            <div style="position: relative;">
                <i class="fas fa-lock" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #8a9bb5;"></i>
                <input type="password" name="old_password" class="form-control" 
                       style="width: 100%; padding: 14px 16px 14px 48px; border: 1.8px solid #e2e8f0; border-radius: 16px; font-size: 1rem; background: #f8fafd; transition: all 0.2s;"
                       placeholder="Enter current password" required>
            </div>
        </div>

        <!-- New Password -->
        <div style="margin-bottom: 22px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #1e3349; font-size: 0.95rem;">New Password</label>
            <div style="position: relative;">
                <i class="fas fa-key" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #8a9bb5;"></i>
                <input type="password" name="new_password" class="form-control" 
                       style="width: 100%; padding: 14px 16px 14px 48px; border: 1.8px solid #e2e8f0; border-radius: 16px; font-size: 1rem; background: #f8fafd;"
                       placeholder="Create new password">
            </div>
        </div>

        <!-- Confirm Password -->
        <div style="margin-bottom: 28px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #1e3349; font-size: 0.95rem;">Confirm Password</label>
            <div style="position: relative;">
                <i class="fas fa-check-circle" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #8a9bb5;"></i>
                <input type="password" name="new_password_confirmation" class="form-control" 
                       style="width: 100%; padding: 14px 16px 14px 48px; border: 1.8px solid #e2e8f0; border-radius: 16px; font-size: 1rem; background: #f8fafd;"
                       placeholder="Re-enter new password">
            </div>
        </div>

        <!-- Save Button (professional corporate style) -->
        <button type="submit" 
                style="width: 100%; background: #0a2540; color: white; border: none; padding: 16px 28px; border-radius: 40px; font-weight: 600; font-size: 1.1rem; letter-spacing: 0.3px; box-shadow: 0 8px 18px -6px rgba(10,37,64,0.3); cursor: pointer; transition: 0.2s; display: flex; align-items: center; justify-content: center; gap: 10px;">
            <i class="fas fa-save"></i> Update Password
        </button>
    </form>

    <!-- Response message placeholder (exactly as in your JS) -->
    <div id="responseMsg" style="margin-top: 20px; padding: 12px; border-radius: 40px; background: #f0f5ff; text-align: center; font-weight: 500; color: #0a2540;"></div>
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