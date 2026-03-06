<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header text-center">
                    <h3 class="font-weight-light my-3">Payment List</h3>
                </div>
                <div class="card-body">
                    <!-- Loan Selection Form -->
                    <form id="search" target="_blank" class="row g-3 align-items-center">
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="loan_id" class="form-label">Select Loan:</label>
                            <select class="form-select" name="loan_id" id="loan_id">
                                @if($loans->isEmpty())
                                    <option value="">No loans available</option>
                                @else
                                    <option value="" selected>--Select--</option>
                                    @foreach($loans as $loan)
                                        <option value="{{ $loan->loan_ide }}">{{ $loan->l_uId }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <strong>Remaining Amount: </strong>
                            <span id="remaining_amount" class="text-danger">0.0</span>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <strong>Loan Amount: </strong>
                            <span id="total_loan" class="text-danger">0.0</span>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <strong>Loan With Interest: </strong>
                            <span id="total_loan_withinterest" class="text-danger">0.0</span>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <strong>Loan Term: </strong>
                            <span id="total_term" class="text-danger">0.0</span>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <strong>Interest: </strong>
                            <span id="interest" class="text-danger">0.0</span>%
                        </div>
                    </form>

                    <!-- Loan Commitments Table -->
                    <div class="table-responsive mt-4">
                        <table id="loan_commitments_table" class="table table-bordered data-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">SL#</th>
                                    <th class="text-center">Payment Date & Time</th>
                                    <th class="text-center">Invoice Id</th>
                                    <th class="text-center">Payment Amount</th>
                                    <th class="text-center">From Month</th>
                                    <th class="text-center">Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be inserted here dynamically via AJAX -->
                                <tr>
                                    <td colspan="6" class="text-center">Please select a loan to view commitments.</td>
                                </tr>
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
    $('#loan_id').on('change', function() {
        let loanId = $(this).val();
        if (loanId) {
            $.ajax({
                url: '{{ url("getLoanCommitments") }}',
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { loan_ide: loanId },
                success: function(response) {
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
                                </tr>`;
                        });
                        $('#loan_commitments_table tbody').html(dataHtml);
                        $('#remaining_amount').text(parseFloat(response.remaining_amount).toFixed(2));
                        $('#total_loan').text(parseFloat(response.loanamount).toFixed(2));
                        $('#total_term').text(response.loanterm);
                        $('#total_loan_withinterest').text(parseFloat(response.interestwithloan).toFixed(2));
                        $('#interest').text(response.interestRateValue);
                    } else {
                        $('#loan_commitments_table tbody').html('<tr><td colspan="6" class="text-center">No commitments found for this loan.</td></tr>');
                        $('#remaining_amount').text('N/A');
                    }
                },
                error: function() {
                    alert("Error fetching loan commitments.");
                }
            });
        } else {
            $('#loan_commitments_table tbody').html('<tr><td colspan="6" class="text-center">Please select a loan.</td></tr>');
            $('#remaining_amount').text('N/A');
        }
    });
});
</script>
