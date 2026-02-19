<div class="card-body">
    <h1 class="text-center">Loan Application Form</h1>
    <form id="loan_request" enctype="multipart/form-data">
        @csrf
        <!-- Loan Amount -->
        <div class="mb-3">
            <label for="loanAmount" class="form-label">Loan Amount Requested:</label>
            <input type="number" name="loan_amount" class="form-control" id="loanAmount" placeholder="Enter loan amount" required>
        </div>

        <!-- Loan Purpose -->
        <div class="mb-3">
            <label for="loanPurpose" class="form-label">Loan Purpose:</label>
            <textarea class="form-control" name="loan_purpose" id="loanPurpose" rows="3" placeholder="Describe the purpose of the loan" required></textarea>
        </div>

        <!-- Loan Categories -->
        <div class="mb-3">
            <label for="loanCategory" class="form-label">Loan Categories</label>
            <select id="loanCategory" class="form-select col-md-6" name="loan_category_id" required>
                <option value="">Loading loan categories...</option>
            </select>
        </div>

        <!-- Loan Term -->
        <div class="mb-3">
            <label for="loanTerm" class="form-label">Loan Term (Months):</label>
            <select class="form-select" id="loanTerm" name="loan_term" required>
                <option value="">---select---</option>
                @for($i=1; $i<=60; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <!-- Payment Schedule -->
        <div class="mb-3">
            <label for="paymentSchedule" class="form-label">Preferred Payment Schedule:</label>
            <input type="text" name="payment_schedule" id="paymentSchedule" value="Monthly" class="form-control" readonly>
        </div>

        <!-- Monthly Income -->
        <div class="mb-3">
            <label for="monthlyIncome" class="form-label">Monthly Income:</label>
            <input type="number" name="monthly_income" class="form-control" id="monthlyIncome" placeholder="Enter monthly income" required>
        </div>

        <!-- Other Documents -->
        <div class="mb-3">
            <label for="otherDocuments" class="form-label">Other Documents (Optional):</label>
            <input type="file" name="other_documents" class="form-control" id="otherDocuments">
        </div>

        <!-- Terms and Conditions -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="infoAgreement" required>
            <label for="infoAgreement" class="form-check-label">I agree that the information provided is true and accurate.</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary btn-block">Save</button> 
      <!--   <button type="submit" onclick="saveFile(this)" class="btn btn-primary btn-block" redirect="#">Save</button> -->
    </form>
</div>

<script>
    // Fetch loan categories and populate the dropdown
    fetch('/for-get')
        .then(response => response.json())
        .then(data => {
            const loanCategorySelect = document.getElementById('loanCategory');
            
            if (Array.isArray(data) && data.length > 0) {
                loanCategorySelect.innerHTML = ''; // Clear "Loading..." message
                loanCategorySelect.appendChild(new Option('Select Loan Category', '')); // Default option

                data.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.percentage;
                    option.textContent = category.loan_category; // Adjust based on your API response
                    loanCategorySelect.appendChild(option);
                });
            } else {
                loanCategorySelect.innerHTML = '<option value="">No categories available</option>';
            }
        })
        .catch(error => {
            console.error('Error fetching loan categories:', error);
            document.getElementById('loanCategory').innerHTML = '<option value="">Failed to load categories</option>';
        });

    // Handle the form submission via JavaScript (AJAX)
    document.getElementById('loan_request').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(this); // Prepare form data

        // Send form data via AJAX
        fetch('{{ url("loan/insert") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.msg) {
                alert(data.msg); // Success message
                document.getElementById('loan_request').reset(); // Clear the form
            } else if (data.errors) {
                // Handle validation errors
                let errorMessages = '';
                for (let field in data.errors) {
                    errorMessages += `${field}: ${data.errors[field].join(', ')}\n`;
                }
                alert('Validation errors:\n' + errorMessages); // Show validation errors
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while saving your loan application.');
        });
    });
</script>
