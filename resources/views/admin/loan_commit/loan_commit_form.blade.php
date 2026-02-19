<meta name="csrf-token" content="your-csrf-token-here">

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css"
        integrity="sha512-jG7NmK8Pm8iKEjw8aIWc+GVFBM33O/Ow4U0Xw34D5yyST0fgmlcV6shsghOXexDsAqtE2TCM6WwNy35qX8E6ng=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="card-body">
<meta name="csrf-token" content="{{ csrf_token() }}">

    <h1 class="text-center">Loan Commit Form</h1>
 <form action="{{url('loan-commit')}}" method="POST" id="loan-commit-form">
    @csrf

    <div class="row">
        <!-- User Name Field -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="user_name">User Name</label>
                <input type="text" class="form-control" id="member_name" name="member_name" required>
                <input type="hidden" id="member_id" name="member_id">
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
     <div class="col-md-6">
        <td style="vertical-align: text-top">
        <label for="from_month"><strong>Month</strong></label>
        </td>
        <td>
            <select name="from_month[]" id="from_month" class="form-control" onclick="monthSelect(this)" multiple required="required">
                <!-- Months will be populated here dynamically -->
            </select>
        </td>

        </div>
        <!-- Payment Schedule Field -->
      
        <!-- Year Dropdown -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="loan_year">Year</label>
                <select class="form-control" id="loan_year" name="loan_year" required>
                    <option value="">Select Year</option>
                    <!-- Year options will be added dynamically here -->
                </select>
            </div>
        </div>
 </div>
 <div class="row">
    <div class="col-md-6">
      <td style="vertical-align: text-top"> <label for="no_of_month"> <strong> No Of Month</strong></label>
             </td>
             <td><input type="text" class="form-control" name="no_of_month" id="no_of_month"
                                                value="" readonly></td>
    </div>
    <div class="col-md-6">
        <td style="vertical-align: text-top"> <label for="payable_amt"> <strong> Payable
                                                Amount</strong></label></td>
        <td><input type="text" class="form-control" name="payable_amt" id="payable_amt"
                                              value="" readonly></td>
     </div>  
 </div>
 <div class="row">
        <!-- Payment Amount Field -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="payment_amount">Payment Amount</label>
                <input type="number" class="form-control" id="payment_amount" name="payment_amount" required min="1" step="0.01" readonly>
            </div>
        </div>
  <!-- Payment Amount Field -->
  <div class="col-md-3">
        <div class="form-group">
            <label for="successfull_payment">Successfully Paid</label>
            <input type="number" class="form-control" id="successfull_payment" name="successfull_payment"   readonly>

        </div>

    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="successfull_payment">Last Payment Month</label>
            <input type="date" class="form-control" id="last_payment_month" name="last_payment_month"   readonly>

        </div>

    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label for="remaining_amount">Remaining Amount</label>
            <input type="number" class="form-control" id="remaining_amount" name="remaining_amount"   readonly>

        </div>

    </div>

</div>
      

    
  
<!-- <button type="submit" onclick="save(this)" class="btn btn-primary btn-block" redirect="#">Payment</button> -->
<button type="submit" class="btn btn-primary" id="createLoanButton">Create Loan</button>
<div id="message" style="display: none; color:red;"></div> 
</form>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"
        integrity="sha512-lEb9Vp/rkl9g2E/LdHIMFTqz21+LA79f84gqP75fbimHqVTu6483JG1AwJlWLLQ8ezTehty78fObKupq3HSHPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    // Clear the loan_id dropdown before making a new request
    $('#loan_id').empty();
    $('#loan_id').append('<option value="">Loading...</option>'); // Optional: display loading message

    // AJAX request to fetch loans for the selected user
    $.ajax({
        url: `/get-loans-for-user/${userId}`,  // Make sure this URL matches the route in your backend
        method: 'GET',  // Use GET to fetch data
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // CSRF token for security
        },
        success: function(response) {
            console.log("Loans fetched:", response);  // Debug: Log the response to check the data structure

            // Clear the loan dropdown first
            $('#loan_id').empty();

            if (response.length > 0) {
                // Populate the dropdown with loan_ide values
                $('#loan_id').append('<option value="">Select Loan</option>');  // Default option
                response.forEach(function(loan_ide) {
                    // Ensure that loan_ide is a number and not undefined
                    if (loan_ide !== undefined && loan_ide !== null) {
                        $('#loan_id').append(`
                            <option value="${loan_ide}">${loan_ide}</option>
                        `);
                    }
                });
            } else {
                // If no loans are found, display a message in the dropdown
                $('#loan_id').append('<option>No loans found for this user</option>');
            }
        },
        error: function(xhr, status, error) {
            console.error("Error fetching loans:", error);  // Debug: Log error
            alert("Error fetching loans. Please try again.");
        }
    });
}



// Fetch the loan details when a loan_ide is selected
$('#loan_id').on('change', function() {
    let loanIde = $(this).val();  // Get the selected loan_ide

    // If a loan_ide is selected
    if (loanIde) {
        // Fetch loan details for the selected loan_ide
        $.ajax({
            url: `/get-loan-details/${loanIde}`,  // The route to get loan details
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Ensure CSRF token is included
            },
            success: function(response) {
                console.log('Loan details:', response); // Debug: Check the loan details returned

                let loanAmount = parseFloat(response.loan_amount); // Loan amount as a float
                let loanCategoryId = parseFloat(response.loan_category_id); // Loan category as a percentage (float)
                let loanTerm = parseInt(response.loan_term); // Loan term as an integer
                // Check if response has loan details
                if (response && response.loan_amount && response.loan_term && response.	loan_category_id) {
                    // Populate the form fields with the loan details
                    $('#loan_amount').val(response.loan_amount);  // Populate loan amount
                    $('#loan_term').val(response.loan_term);  // Populate loan term
                   

                    // Calculate the payment amount (loan_amount / loan_term)
                    // Calculate the interest as a percentage of the loan amount
                        let interest = (loanAmount * loanCategoryId) / 100;  // Interest = loan_amount * (loan_category_id / 100)

                        // Calculate the amount with interest
                        let amountWithInterest = loanAmount + interest;

                        // Calculate the payment amount (amount with interest divided by loan term)
                        let paymentAmount = amountWithInterest / loanTerm;

                        // Set the calculated payment amount in the input field, formatted to two decimal places
                        $('#payment_amount').val(paymentAmount.toFixed(2)); // Set payment amount with two decimal places

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
        option.value = month;  // The value of the option (you can use the month name or number)
        option.textContent = month;  // The text displayed in the dropdown
        monthSelect.appendChild(option);  // Add the option to the select element
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
        const currentYear = new Date().getFullYear();  // Get the current year
        const startYear = currentYear - 5;  // Start from 5 years ago

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
        populateMonthDropdown();  // Populate months dropdown
        populateYearDropdown();   // Populate years dropdown
    };
    //end


    $(document).ready(function () {
    $('#loan-commit-form').on('submit', async function (event) {
        event.preventDefault();  // Prevent default form submission

        // Get form data
        let selectedMonths = $('#from_month').val();  // Get selected months as an array
        let loanIde = $('#loan_id').val();  // Get the loan ID
        let paymentAmount = $('#payment_amount').val();  // Get the payment amount
        let loanYear = $('#loan_year').val();  // Get the loan year

        let duplicateMonths = [];  // Array to collect duplicate months
        let successfulRequests = 0;

        // Loop through selected months and check for duplicates
        for (let month of selectedMonths) {
            let formData = {
                loan_payment_id: loanIde,
                payment_amount: paymentAmount,
                loan_year: loanYear,
                from_month: [month],  // Send each month as an array with one element
            };

            try {
                // Send AJAX request to check for duplicates
                await $.ajax({
                    url: '/loan-commit',  // Backend URL to check duplicate
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // CSRF token for security
                    },
                    success: function (response) {
                        // If no duplicate found, proceed with the submission
                        successfulRequests++;
                        
                    },
                    error: function (xhr, status, error) {
                        // If duplicate found, add the month to the duplicateMonths array
                        if (xhr.status === 400) {
                            let duplicateMonth = xhr.responseJSON.duplicate_month;  // Get duplicate month from response
                            duplicateMonths.push(duplicateMonth);  // Add duplicate month to the array
                        } else {
                            console.error('Error submitting for month:', month, error);
                        }
                    }
                });
            } catch (error) {
                console.error('Error during AJAX request:', error);
            }
        }

        // After all AJAX requests, check if there are any duplicates
        if (duplicateMonths.length > 0) {
            // Show all duplicate months in one alert
            alert('Duplicate entry for the following months: ' + duplicateMonths.join(', ') + ' in year ' + loanYear);
            return;  // Stop further processing if duplicates are found
        }

        // If all requests are successful, submit the form
        if (successfulRequests === selectedMonths.length) {
            // Show success message if all months were processed successfully
            alert('Loan Commit(s) created successfully!');

            // Optionally, reset the form
            $('#loan-commit-form')[0].reset();  // Reset all form fields

            // Enable the submit button (if it was disabled)
            $('#loan-commit-form button').prop('disabled', false);
        }
    });
});



$('#loan_id').on('change', function() {
    let loanIde = $(this).val();  // Get the selected loan ID
    console.log("Selected Loan ID:", loanIde);  // Debugging statement to check the loan ID

    // If a loan is selected
    if (loanIde) {
        console.log("Making AJAX request to fetch total paid for loan ID:", loanIde);
        $('#createLoanButton').prop('disabled', false);  // Enable the button every time a new loan ID is selected
    $('#createLoanButton').css('background-color', '');  // Reset button color to default
    $('#createLoanButton').css('border-color', '');  // Reset border color

    // Hide the message in case it's shown from a previous selection
    $('#message').hide();

        // AJAX request to fetch the total paid for the selected loan
        $.ajax({
            url: `/get-total-paid/${loanIde}`,  // Ensure this URL is correct
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // CSRF token for security
            },
            success: function(response) {
                console.log('Response from server:', response);  // Debug: Log the full response data

                // Check if response contains totalPaid
                if (response && response.totalPaid &&response.remainingAmount!== undefined) {
                    console.log([
                        'Total Paid:', response.totalPaid,
                        'Remaining Amount:', response.remainingAmount
                    ]);  // Log totalPaid value

                    // Set the value in the field
                    const totalPaid = parseFloat(Math.round(response.totalPaid));  // Ensure it's a float number
                    const remainingAmount = parseFloat(Math.round(response.remainingAmount));  // Ensure it's a float number
                    $('#successfull_payment').val(Math.round(totalPaid).toFixed(2));  // Set the value in the field

                   



                    if (!isNaN(totalPaid&&remainingAmount)) {  // Check if it's a valid number
                        console.log('Setting totalPaid in field:', totalPaid.toFixed(2));

                        $('#successfull_payment').val(Math.round(totalPaid).toFixed(2));  // Set the value in the field
                        $('#successfull_payment').trigger('change');  // Force the UI update
                        $('#remaining_amount').val(Math.round(response.remainingAmount).toFixed(2));  // Set the value in the field
                        $('#remaining_amount').trigger('change');  // Force the UI update
                       // $('#last_payment_month').val(response.lastPaymentData);
                    } else {
                        console.log('Error: totalPaid is not a valid number:', response.totalPaid);
                        $('#successfull_payment').val('0.00');  // Default to 0 if totalPaid is invalid
                    }



                    if (remainingAmount === 0) {
                        // Disable the "Create Loan" button
                        $('#createLoanButton').prop('disabled', true);
                        $('#createLoanButton').css('background-color', 'red');
                        $('#createLoanButton').css('border-color', 'red');
                        
                        // Show the message
                        $('#message').text('Your loan commitment is completed. Create a new commitment.').show();
                    } else {
                        // Enable the "Create Loan" button if there is a remaining amount
                        $('#createLoanButton').prop('disabled', false);
                        $('#message').hide();  // Hide the message if the loan is not completed
                    }



                } else {
                    console.log('No totalPaid found in the response.');
                    $('#successfull_payment').val('0.00');  // Default to 0 if no total paid value
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching total payments:", error);  // Log the error
                alert("Error fetching total payments. Please try again.");
            }
        });
    } else {
        console.log("No loan ID selected.");
    }
});



</script>


<!-- 
<script>
    // Get the CSRF token from the meta tag
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

// When the user inputs their loan IDE, fetch user name suggestions
$('#loan_ide').on('input', function() {
    let loanIde = $(this).val();

    if (loanIde.length >= 2) {
        $.ajax({
            url: '/search-user',
            method: 'GET',
            data: { loan_ide: loanIde },
            headers: { 'X-CSRF-TOKEN': csrfToken },
            success: function(response) {
                let suggestions = $('#user-suggestions');
                suggestions.empty();
                if (response.length > 0) {
                    response.forEach(function(user) {
                        suggestions.append(`<li class="list-group-item user-item" data-user-id="${user.id}" data-loan-ide="${loanIde}">${user.name}</li>`);
                    });
                    suggestions.show();
                } else {
                     // Display a custom message when no users are found
                     alert('This id has no approved Loan!');
                     suggestions.hide();  // Show the suggestion list with the error message
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching user data:", error);
                alert("Error fetching user data. Please try again.");
            }
        });
    } else {
        $('#user-suggestions').hide();
    }
});
// When a user is selected, fetch the loans and update the input field with the user name
$('#user-suggestions').on('click', '.user-item', function() {
    let userId = $(this).data('user-id');
    let loanIde = $(this).data('loan-ide');  // This is the loan ID, we can ignore it here
    let userName = $(this).text();  // The text content is the user's name
    
    // Set the loan_ide (User Name) input value to the selected user's name
    $('#loan_ide').val(userName);  // Populate the User Name input field

    $.ajax({
        url: `/get-user-loans/${userId}`,
        method: 'GET',
        data: { loan_ide: loanIde },  // The loan ID (you can use it for further filtering if needed)
        success: function(response) {
            console.log('Response:', response); // Debug: Check the response structure

            if (response.length > 0) {
                response.forEach(function(loan) {
                    // Check if the loan matches the selected loan IDE (optional)
                    if (loan.loan_ide === loanIde) {
                        console.log('Loan Data:', loan); // Debug: Check the loan data

                        // Populate the form fields with the loan data
                        $('#loan_amount').val(parseFloat(loan.loan_amount).toFixed(2));  // Populate loan amount as a number
                        $('#loan_schedule').val(loan.payment_schedule);  // Populate payment schedule (make sure this exists in your response)
                        
                        // Show the full loan term (e.g., "6 months")
                        $('#loan_term').val(loan.loan_term);  // Display the full loan term (e.g., "6 months")

                        // Recalculate payment amount (assuming the payment amount is not part of the response)
                        let term = parseInt(loan.loan_term);  // Assuming the term is like "6 months"
                        calculatePaymentAmount(parseFloat(loan.loan_amount), term);  // Use parsed term for calculation
                    }
                });
            } else {
                alert("No loans found for the selected user and loan IDE.");
            }
        },
        error: function(xhr, status, error) {
            console.error("Error fetching loans:", error);
            alert("Error fetching loans. Please try again.");
        }
    });

    // Hide the suggestion list after a user is selected
    $('#user-suggestions').hide();
});

// Function to calculate payment amount based on loan amount and term
function calculatePaymentAmount(amount, term) {
    if (term && amount) {
        let monthlyPayment = amount / term;  // Simple calculation (you can modify this as needed)
        console.log('Calculated Monthly Payment:', monthlyPayment); // Debug: Log calculated monthly payment
        $('#payment_amount').val(monthlyPayment.toFixed(2));
        
        let number_of_commit= amount/monthlyPayment;
        console.log('Number of commits:',number_of_commit);
        $('#total_commit').val(number_of_commit.toFixed(2));
       
    }

   
    
}



      // Dynamically generate the year options for the dropdown
      const yearSelect = document.getElementById('loan_year');
    const currentYear = new Date().getFullYear();  // Get current year

    // Generate year options for the next 5 years (you can modify this range)
    for (let i = 0; i < 5; i++) {
        let yearOption = document.createElement('option');
        yearOption.value = currentYear + i;  // Set year value
        yearOption.textContent = currentYear + i;  // Display year text
        yearSelect.appendChild(yearOption);  // Add option to the dropdown
    }
</script>
 -->