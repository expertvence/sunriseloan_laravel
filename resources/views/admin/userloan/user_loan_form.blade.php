


<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="form-row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Payment list</h3>
                    <form action="#" method="get" id="search" target="_blank">
                        <table width="100%">
                            <tr>
                                <td>
                                    <select name="loan_id" id="loan_id">
                                        @if($loans->isEmpty())
                                            <option value="">No loans available</option>
                                        @else
                                        <option value="" selected>--Select--</option>
                                            @foreach($loans as $loan)
                                                <option value="{{ $loan->loan_ide }}">{{ $loan->loan_ide }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    <!-- <input type="text" class="form-control" name="member_name" id="member_name" placeholder="Write....." required="required" autocomplete="off">
                                    <input type="hidden" name="member_id" id="member_id" value=""> -->
                                    <div>
                                    <strong >Remaining Amount: </strong><span id="remaining_amount" style="color:red;">0.0</span>
                                    </div>
                                </td>
                                <td>
                                <div>
                                    <strong >Loan Amount: </strong><span id="total_loan" style="color:red;">0.0</span>
                                    </div>
                                </td>
                                <td>
                                <div>
                                    <strong >Loan With Interest: </strong><span id="total_loan_withinterest" style="color:red;">0.0</span>
                                    </div>
                                </td>
                                <td>
                                <div>
                                    <strong >Loan Term: </strong><span id="total_term" style="color:red;">0.0</span>
                                    </div>
                                </td>

                                <td>
                                <div>
                                    <strong >Interest : </strong><span id="interest" style="color:red;">0.0</span>%
                                    </div>
                                </td>
                               <!--  <td>
                                    <button type="submit">PDF</button>
                                </td> -->
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="card-body">
                    
    <div class="table-responsive">
        <table id="loan_commitments_table" class="table table-bordered data-table" style="width: 100%">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">SL#</th>
                    <th class="text-center">Payment Date & Time</th>
                    <th class="text-center">Invoice Id</th>
                    <th class="text-center">Payment Aomunt</th>
                    <th>From Month</th>
                    
                    <th>Year</th>
                    <!-- <th class="text-center">Number Of Share</th>
                    <th class="text-right">Share Amt.</th> -->
                </tr>
            </thead>
            <tbody>
                <!-- Data will be inserted here dynamically via AJAX -->
            </tbody>
        </table>
    </div>
</div>

            </div>
        </div>
    </div>
</div>


<script>
 $(document).ready(function() {
    // Listen for loan selection change
    $('#loan_id').on('change', function() {
        let loanId = $(this).val();  // Get the selected loan ID (loan_ide)

        // Ensure that loanId is not empty
        if (loanId) {
            // Trigger AJAX request to fetch loan commitments for the selected loan
            $.ajax({
                url: '{{ url("getLoanCommitments") }}', // Define the route to fetch commitments
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // CSRF token for security
                },
                data: { loan_ide: loanId }, // Pass the selected loan ID as loan_ide
                success: function(response) {
                    // If data is returned, dynamically display the loan commitments
                    if (response.success) {
                        let dataHtml = '';
                        response.data.forEach(function(commit, index) {
                            dataHtml += `
                                <tr>
                                    <td class="text-center">${index + 1}</td>
                                    <td class="text-center">${commit.created_at ? new Date(commit.created_at).toLocaleString() : ''}</td>
                                    <td class="text-center">${commit.loan_commit_id}</td>
                                    <td class="text-center">${commit.payment_amount}</td>
                                    <td class="text-center">${commit.payment_month}</td>
                                    <td class="text-center">${commit.loan_year}</td>
                                </tr>
                            `;
                        });
                        $('#loan_commitments_table tbody').html(dataHtml);  // Populate the table with commitments

                        // Display the remaining amount
                        $('#remaining_amount').text(Math.round(response.remaining_amount).toFixed(2));  // Show the remaining amount
                        $('#total_loan').text(Math.round(response.loanamount).toFixed(2));
                        $('#total_term').text(response.loanterm);
                        $('#total_loan_withinterest').text(response.interestwithloan.toFixed(2));
                        $('#interest').text(response.interestrate);

                    } else {
                        // If no data found, show a message in the table
                        $('#loan_commitments_table tbody').html('<tr><td colspan="6" class="text-center">No commitments found for this loan.</td></tr>');

                        // Hide the remaining amount if no data is found
                        $('#remaining_amount').text('N/A');
                    }
                },
                error: function() {
                    alert("Error fetching loan commitments.");
                }
            });
        } else {
            // If no loan is selected, clear the table container and remaining amount
            $('#loan_commitments_table tbody').html('<tr><td colspan="6" class="text-center">Please select a loan.</td></tr>');
            $('#remaining_amount').text('N/A');  // Hide the remaining amount
        }
    });
});


</script>


