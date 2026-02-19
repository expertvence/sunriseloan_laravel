<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
   Loan Request
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatablesSimple" class="data-table table table-bordered " width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th>SL#</th>
                        <th>Name</th>
                        <th>Id</th>
                        <th>Loan amount</th>
                        <th>Monthly Income</th>
                        <th>Loan Purpose</th>
                        <th>Loan Terms</th>
                        <th>Payment Schedule</th>
                        <th>Documents</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!empty($data))
                    @foreach ($data as $value)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value->user? $value->user->name: 'no user'}}</td>
                        <td>{{$value->loan_ide}}</td>
                        <td>{{$value->loan_amount}}</td>
                        <td>{{$value->monthly_income}}</td>
                        <td>{{$value->loan_purpose}}</td>
                        <td>{{$value->loan_term}}</td>
                        <td>{{$value->payment_schedule}}</td>
                        <td><!-- {{$value->other_documents}} --></td>
                        <td>{{$value->user?$value->user->email: 'no email'}}</td>
                        <td>{{ $value->created_at->format('Y-m-d H:i:s') }}</td>

                        <!-- Status Update -->
                        <td class="text-center">
                            <!-- The current status displayed, will be replaced by dropdown on click -->
                            <!-- The dropdown menu, hidden by default -->
                            <select id="statusDropdown{{$value->loan_ide}}" onchange="updateStatus({{$value->loan_ide}})" class="form-control @if($value->status == 'pending') text-danger @elseif($value->status == 'complete') text-success @elseif($value->status == 'rejected') text-danger @endif">
                                <option value="pending" {{ $value->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="complete" {{ $value->status == 'complete' ? 'selected' : '' }}>Accepted</option>
                                <option value="rejected" {{ $value->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </td>

                        <td>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="fas fa-user"></i></a>
                            <span class="btn btn-sm open-modal btnView" data-action="{{url('show-edit',$value->loan_ide)}}" data-modal="common-modal-md" data-title=" Member Edit" title="Edit" data-id="{{$value->loan_ide}}">
                                <i class="fas fa-edit"></i>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>


<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $(".data-table").DataTable({
            "ordering": true,
            "bAutoWidth": true,
        });
    });

   
  function updateStatus(loan_ide)
   {
    let statuschange=$("#statusDropdown" +loan_ide).val();

    $.ajax({
        url:"{{route('update-status')}}",
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token for security
            loan_ide: loan_ide,         // The ID of the loan
            status: statuschange,       // The new status selected
        },

        success: function(response) {
            // On success, you could show a message, update the UI, etc.
            if(response.success)  {
                if (statuschange === 'pending') {
                    $("#statusDropdown" + loan_ide).removeClass('text-success text-danger').addClass('text-danger');
                } else if (statuschange === 'complete') {
                    $("#statusDropdown" + loan_ide).removeClass('text-danger text-success').addClass('text-success');
                } else if (statuschange === 'rejected') {
                    $("#statusDropdown" +loan_ide).removeClass('text-success text-danger').addClass('text-danger');
                }
            } else {
                 alert(response.message || 'Error updating status');
            }
        },
        error: function() {
            // Handle any AJAX errors
            alert('An error occurred while updating the status');
        }
    });

   }
</script>
