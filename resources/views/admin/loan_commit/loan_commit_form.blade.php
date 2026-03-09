

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css"
    integrity="sha512-jG7NmK8Pm8iKEjw8aIWc+GVFBM33O/Ow4U0Xw34D5yyST0fgmlcV6shsghOXexDsAqtE2TCM6WwNy35qX8E6ng=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="card-body">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h1 class="text-center">Loan Commit Form</h1>
    <form action="{{ route('loan-commit-submit') }}" method="POST" id="loan-commit-form">
        @csrf

        <div class="row">
            <!-- User Name Field -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" id="member_name" name="member_name" required>
                    <input type="hidden" id="member_id" name="member_id">
                    <input type="hidden" id="repayment_type" name="repayment_type">
                    <ul id="user-suggestions" class="list-group" style="display:none;"></ul>
                </div>
            </div>

            <!-- Loan Amount Field -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="loan_id">Loan Code</label>
                    <select class="form-select" name="loan_payment_id" id="loan_id">
                        <option value="">Select Loan</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Month Dropdown -->
            <div class="col-md-6">
                <label for="from_month"><strong>Month</strong></label>
                <select name="from_month[]" id="from_month" class="form-control" multiple required>
                    <!-- Populated dynamically -->
                </select>
            </div>

            <!-- Week Dropdown (Weekly Loans) -->
            <div class="col-md-6" id="week-container" style="display:none;">
                <label for="from_week"><strong>Week</strong></label>
                <select id="from_week" name="from_week[]" class="form-control" multiple>
                    <!-- Populated dynamically -->
                </select>
            </div>
        </div>

        <div class="row mt-2">
            <!-- Year Dropdown -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="loan_year">Year</label>
                    <select class="form-control" id="loan_year" name="loan_year" required>
                        <option value="">Select Year</option>
                    </select>
                </div>
            </div>

            <!-- No of Months -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="no_of_month"><strong>No Of Month</strong></label>
                    <input type="text" class="form-control" id="no_of_month" name="no_of_month" readonly>
                </div>
            </div>
            <!-- No of Months -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="no_of_month"><strong>Total Amount</strong></label>
                    <input type="text" class="form-control" id="total_amount" name="total_amount" readonly>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <!-- Payment Amount -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="payment_amount">Payment Amount</label>
                    <input type="number" class="form-control" id="payment_amount" name="payment_amount" required
                        min="1" step="0.01" readonly>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="successfull_payment">Successfully Paid</label>
                    <input type="number" class="form-control" id="successfull_payment" name="successfull_payment"
                        readonly>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="last_payment_month">Last Payment Month</label>
                    <input type="date" class="form-control" id="last_payment_month" name="last_payment_month"
                        readonly>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="remaining_amount">Remaining Amount</label>
                    <input type="number" class="form-control" id="remaining_amount" name="remaining_amount" readonly>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="d-grid">
                    <button type="button" onclick="saveFile(this)" class="btn btn-primary btn-block"
                    redirect="{{ route('comitted-list') }}">Submit</button>
                </div>
                <div id="message" style="display: none; color:red;"></div>
            </div>
        </div>

    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"
    integrity="sha512-lEb9Vp/rkl9g2E/LdHIMFTqz21+LA79f84gqP75fbimHqVTu6483JG1AwJlWLLQ8ezTehty78fObKupq3HSHPQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // Typeahead / Autocomplete for member_name
    openDoctorAutocomplete('#member_name', 'member_id', '', '', memberInfo);

    function memberInfo(item, obj) {
        $('#no_of_share').val(item.share_no);
        $('#share_amt').val(item.share_amt);
        fetchLoansForUser(item.user_id);

        // Fetch repayment type
        $.ajax({
            url: `/get-repayment-type/${item.user_id}`,
            method: 'GET',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                $('#repayment_type').val(response.repayment_type);

                if (response.repayment_type === 'weekly') {
    $('#week-container').show();
    populateWeekDropdown(response.remaining_weeks, response.committed_weeks); 
} else {
    $('#week-container').hide();
}

            },
            error: function() {
                $('#week-container').hide();
            }
        });
    }

    function fetchLoansForUser(userId) {
        $('#loan_id').empty().append('<option value="">Loading...</option>');

        $.ajax({
            url: `/get-loans-for-user/${userId}`,
            method: 'GET',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                $('#loan_id').empty();
                if (response.length > 0) {
                    $('#loan_id').append('<option value="">Select Loan</option>');
                    response.forEach(function(loan) {
                        $('#loan_id').append(`<option value="${loan.loan_ide}">${loan.l_uId}</option>`);
                    });
                } else {
                    $('#loan_id').append('<option>No loans found for this user</option>');
                }
            }
        });
    }

// --- Sequential Week Dropdown Logic ---
function populateWeekDropdown(totalWeeks = 4, committedWeeks = []) {
    const weekSelect = $('#from_week');
    weekSelect.empty();

    // Sort committed weeks
    committedWeeks.sort((a, b) => a - b);

    // Determine next available week
    let nextWeek = 1;
    for (let i = 1; i <= totalWeeks; i++) {
        if (!committedWeeks.includes(i)) {
            nextWeek = i;
            break;
        }
    }

    // Only allow selection of the next week
    if (nextWeek <= totalWeeks) {
        weekSelect.append(`<option value="${nextWeek}">Week ${nextWeek}</option>`);
    }
}



    // Populate months
    function populateMonthDropdown() {
        const months = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];
        const monthSelect = document.getElementById('from_month');
        monthSelect.innerHTML = '';
        months.forEach(m => monthSelect.append(new Option(m, m)));
    }

    function populateYearDropdown() {
        const yearSelect = document.getElementById('loan_year');
        const currentYear = new Date().getFullYear();
        for (let y = currentYear - 5; y <= currentYear; y++) {
            yearSelect.append(new Option(y, y));
        }
    }

    window.onload = function() {
        populateMonthDropdown();
        populateYearDropdown();
    };

    // Update number of months and payable amount
    $('#from_month').on('change', function() {
        const selectedMonths = $(this).val() || [];
        $('#no_of_month').val(selectedMonths.length);

        const perMonthAmount = parseFloat($('#payment_amount').val()) || 0;
        
        $('#total_amount').val((perMonthAmount * selectedMonths.length).toFixed(2));
        const totalAmount = parseFloat($('#total_amount').val()) || 0;
    });

    // Validate weekly selection before submit
    $('#loan-commit-form').on('submit', function(e) {
        const repaymentType = $('#repayment_type').val();
        const selectedWeeks = $('#from_week').val() || [];

        if (repaymentType === 'weekly' && selectedWeeks.length > 4) {
            e.preventDefault();
            alert('You cannot select more than 4 weeks per month!');
        }
    });


     // Fetch the loan details when a loan_ide is selected
    $('#loan_id').on('change', function() {
        let loanIde = $(this).val(); // Get the selected loan_ide

        // If a loan_ide is selected
        if (loanIde) {
            // Fetch loan details for the selected loan_ide
            $.ajax({
                url: `/get-loan-details/${loanIde}`, // The route to get loan details
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Ensure CSRF token is included
                },
                success: function(response) {
                    console.log('Loan details:',
                    response); // Debug: Check the loan details returned

                    let loanAmount = parseFloat(response.loan_amount); // Loan amount as a float
                    let percentage = parseFloat(response
                    .loan_category_percentage); // Loan category as a percentage (float)
                    let loanTerm = parseInt(response.loan_term); // Loan term as an integer
                    // let deposit = parseFloat(response.deposit);
                    // console.log("Deposit:", deposit);
                    // Check if response has loan details
                    if (response && response.loan_amount && response.loan_term && response
                        .loan_category_percentage) {
                        // Populate the form fields with the loan details
                        $('#loan_amount').val(response.loan_amount); // Populate loan amount
                        $('#loan_term').val(response.loan_term); // Populate loan term

                        // $('#deposit').val(response.deposit);
                        // Calculate the payment amount (loan_amount / loan_term)
                        // Calculate the interest as a percentage of the loan amount
                        let interest = (loanAmount * percentage) / 100; // Interest = loan_amount * (loan_category_id / 100)

                        // Calculate the amount with interest
                        let amountWithInterest = loanAmount + interest;
                        
                            // consol.log(amountWithInterest);
                        // Calculate the payment amount (amount with interest divided by loan term)
                        let paymentAmount = amountWithInterest / loanTerm ;
                        
                        let withDeposit = paymentAmount;
                        // Set the calculated payment amount in the input field, formatted to two decimal places
                        $('#payment_amount').val(withDeposit.toFixed(
                        2)); // Set payment amount with two decimal places

                    } else {
                        // If no loan details found for the selected loan_ide
                        alert('No loan details found for this loan_ide');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching loan details:", error);
                    alert("Error fetching loan details. Please try again.");
                }
            });
        }
    });

</script>
<script>
    openDoctorAutocomplete('#member_name', 'member_id', '', '', memberInfo);

    function memberInfo(item, obj) {
        $('#no_of_share').val(item.share_no);
        $('#share_amt').val(item.share_amt);
        // var conceptName = $('#from_month').find(":selected").val();

        fetchLoansForUser(item.user_id);
    }

    // This function fetches the loans for the selected user and populates the loan dropdown
    function fetchLoansForUser(userId) {
        $('#loan_id').empty();
        $('#loan_id').append('<option value="">Loading...</option>');

        $.ajax({
            url: `/get-loans-for-user/${userId}`,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#loan_id').empty();

                if (response.length > 0) {
                    $('#loan_id').append('<option value="">Select Loan</option>');
                    response.forEach(function(loan) {
                        // Use loan_ide as value, l_uId as displayed text
                        $('#loan_id').append(`
                        <option value="${loan.loan_ide}">${loan.l_uId}</option>
                    `);
                    });
                } else {
                    $('#loan_id').append('<option>No loans found for this user</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching loans:", error);
                alert("Error fetching loans. Please try again.");
            }
        });
    }



   



    populateMonthDropdown();
    // Function to dynamically populate the months dropdown
    // Function to populate the months dropdown
    function populateMonthDropdown() {
        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        let monthSelect = document.getElementById('from_month'); // Get the select element

        // Clear any existing options in the dropdown
        monthSelect.innerHTML = '';

        // Loop through the months array and add each month as an option
        months.forEach(function(month) {
            let option = document.createElement('option');
            option.value = month; // The value of the option (you can use the month name or number)
            option.textContent = month; // The text displayed in the dropdown
            monthSelect.appendChild(option); // Add the option to the select element
        });
    }

    // Function to handle selected months and update the payable amount
    function monthSelect() {
        const fromMonthSelect = document.getElementById('from_month');

        // Get the number of selected months
        const selectedMonths = fromMonthSelect.selectedOptions.length;

        // Update the "No of Months" field
        document.getElementById('no_of_month').value = selectedMonths;

        // Log the selected months count for debugging
        console.log("Selected months: ", selectedMonths);

        // Update the payable amount based on selected months
        updatePayableAmount(selectedMonths);
    }

    // Function to update the payable amount based on the selected months
    function updatePayableAmount(selectedMonths) {
        // Get the per month amount (assuming it's in an input field with id 'payment_amount')
        const perMonthAmount = parseFloat(document.getElementById('payment_amount').value) || 0;

        const deposit    = parseFloat(document.getElementById('deposit').value) || 0;

        // Log the per month amount for debugging
        console.log("Per Month Amount: ", perMonthAmount);

        // If perMonthAmount or selectedMonths is invalid, set payable amount to 0
        if (isNaN(perMonthAmount) || selectedMonths === 0) {
            console.log("Invalid input detected. Setting payable amount to 0.00");
            document.getElementById('payable_amt').value = "0.00"; // Default to 0 if any value is invalid
        } else {
            // Calculate the payable amount
            const payableAmount = selectedMonths * perMonthAmount;

            // Log the calculated payable amount for debugging
            console.log("Calculated payable amount: ", payableAmount);

            // Update the input field with the calculated amount
            document.getElementById('payable_amt').value = payableAmount.toFixed(2);
        }
    }

    // Populate months dropdown when the page loads
    populateMonthDropdown();
    populateYearDropdown();
    // Function to populate the year dropdown dynamically
    function populateYearDropdown() {
        const yearSelect = document.getElementById('loan_year');
        const currentYear = new Date().getFullYear(); // Get the current year
        const startYear = currentYear - 5; // Start from 5 years ago

        // Populate the year options dynamically
        for (let year = startYear; year <= currentYear; year++) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelect.appendChild(option);
        }
    }

    // Call the functions to populate the dropdowns when the page loads
    window.onload = function() {
        populateMonthDropdown(); // Populate months dropdown
        populateYearDropdown(); // Populate years dropdown
    };
    //end


    // $(document).ready(function() {
    //     $('#loan-commit-form').on('submit', async function(event) {
    //         event.preventDefault(); // Prevent default form submission

    //         // Get form data
    //         let selectedMonths = $('#from_month').val(); // Get selected months as an array
    //         let loanIde = $('#loan_id').val(); // Get the loan ID
    //         let paymentAmount = $('#payment_amount').val(); // Get the payment amount
    //         let loanYear = $('#loan_year').val(); // Get the loan year

    //         let duplicateMonths = []; // Array to collect duplicate months
    //         let successfulRequests = 0;

    //         // Loop through selected months and check for duplicates
    //         for (let month of selectedMonths) {
    //             let formData = {
    //                 loan_payment_id: loanIde,
    //                 payment_amount: paymentAmount,
    //                 loan_year: loanYear,
    //                 from_month: [month], // Send each month as an array with one element
    //             };

    //             try {
    //                 // Send AJAX request to check for duplicates
    //                 await $.ajax({
    //                     url: '/loan-commit-submit', // Backend URL to check duplicate
    //                     method: 'POST',
    //                     data: formData,
    //                     headers: {
    //                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
    //                             'content') // CSRF token for security
    //                     },
    //                     success: function(response) {
    //                         // If no duplicate found, proceed with the submission
    //                         successfulRequests++;

    //                     },
    //                     error: function(xhr, status, error) {
    //                         // If duplicate found, add the month to the duplicateMonths array
    //                         if (xhr.status === 400) {
    //                             let duplicateMonth = xhr.responseJSON
    //                             .duplicate_month; // Get duplicate month from response
    //                             duplicateMonths.push(
    //                             duplicateMonth); // Add duplicate month to the array
    //                         } else {
    //                             console.error('Error submitting for month:', month,
    //                                 error);
    //                         }
    //                     }
    //                 });
    //             } catch (error) {
    //                 console.error('Error during AJAX request:', error);
    //             }
    //         }

    //         // After all AJAX requests, check if there are any duplicates
    //         if (duplicateMonths.length > 0) {
    //             // Show all duplicate months in one alert
    //             alert('Duplicate entry for the following months: ' + duplicateMonths.join(', ') +
    //                 ' in year ' + loanYear);
    //             return; // Stop further processing if duplicates are found
    //         }

    //         // If all requests are successful, submit the form
    //         if (successfulRequests === selectedMonths.length) {
    //             // Show success message if all months were processed successfully
    //             alert('Loan Commit(s) created successfully!');

    //             // Optionally, reset the form
    //             $('#loan-commit-form')[0].reset(); // Reset all form fields

    //             // Enable the submit button (if it was disabled)
    //             $('#loan-commit-form button').prop('disabled', false);
    //         }
    //     });
    // });



    $('#loan_id').on('change', function() {
        let loanIde = $(this).val(); // Get the selected loan ID
        console.log("Selected Loan ID:", loanIde); // Debugging statement to check the loan ID

        // If a loan is selected
        if (loanIde) {
            console.log("Making AJAX request to fetch total paid for loan ID:", loanIde);
            $('#createLoanButton').prop('disabled',
            false); // Enable the button every time a new loan ID is selected
            $('#createLoanButton').css('background-color', ''); // Reset button color to default
            $('#createLoanButton').css('border-color', ''); // Reset border color

            // Hide the message in case it's shown from a previous selection
            $('#message').hide();

            // AJAX request to fetch the total paid for the selected loan
            $.ajax({
                url: `/get-total-paid/${loanIde}`, // Ensure this URL is correct
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // CSRF token for security
                },
                success: function(response) {
                    let totalPaid = parseFloat(response.totalPaid) || 0;
                    let remainingAmount = parseFloat(response.remainingAmount) || 0;

                    $('#successfull_payment').val(totalPaid.toFixed(2));
                    $('#remaining_amount').val(remainingAmount.toFixed(2));

                    $('#last_payment_month').val(response.lastPaymentData || '');

                    if (remainingAmount === 0) {
                        $('#createLoanButton').prop('disabled', true).css({
                            'background-color': 'red',
                            'border-color': 'red'
                        });
                        $('#message').text(
                            'Your loan commitment is completed. Create a new commitment.')
                        .show();
                    } else {
                        $('#createLoanButton').prop('disabled', false);
                        $('#message').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching total payments:", xhr
                    .responseText); // Log server error
                    alert("Error fetching total payments. Please try again.");
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching total payments:", error); // Log the error
                    alert("Error fetching total payments. Please try again.");
                }
            });
        } else {
            console.log("No loan ID selected.");
        }
    });
</script>


