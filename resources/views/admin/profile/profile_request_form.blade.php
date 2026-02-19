<div class="card-body">
    <h1 class="text-center">Loan Application Form</h1>
    <form id="passwordForm" enctype="multipart/form-data">
        @csrf
        <!-- Loan Amount -->
        <div class="mb-3">
            <label for="loanAmount" class="form-label">Old Password:</label>
            <input type="text" name="old_password" class="form-control" id="loanAmount" placeholder="Enter loan amount" required>
        </div>

        <!-- Loan Purpose -->
        <div class="mb-3">
            <label for="loanPurpose" class="form-label">New Password:</label>
            <input type="text" name="new_password" class="form-control" id="">
        </div>

         <div class="mb-3">
            <label for="loanPurpose" class="form-label">Confirm Password:</label>
            <input type="text" class="form-control" name="new_password_confirmation" id="">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Save</button> 
      <!--   <button type="submit" onclick="saveFile(this)" class="btn btn-primary btn-block" redirect="#">Save</button> -->
    </form>
</div>


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




