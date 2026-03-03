<style>
    td {
        padding: 5px;
    }
</style>
<div class="card mb-4">
    <div class="card-header">
        <!-- <h1>Total Assets: {{ $total_assets }}</h1>
    <h1>Total Loan:{{ $totalCommite }}</h1>
    <h2>Remaining amount:{{ $remainingAmount }}</h2> -->
        <i class="fas fa-table me-1"></i>
        Assets List
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatablesSimple" class="data-table table table-bordered " width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th>SL#</th>
                        <th>Asset</th>
                        <th>Date</th>

                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!empty($data))
                        @foreach ($data as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->assets }}</td>
                                <td>{{ \Carbon\Carbon::parse($value->date)->format('d F Y') }}</td>


                                <td>


                                    <div class="action-buttons">
                                        <span class="btn btn-sm  open-modal btnView"
                                            data-action="{{ route('edit-assets', $value->id) }}"
                                            data-modal="common-modal-md" data-title=" Assets Edit" title="Edit"
                                            data-id="{{ $value->id }}"><i class="fas fa-edit"></i></span>


                                        <span class="action-btn delete-btn" data-id="{{ $value->id }}"
                                            data-url="{{ route('delete-asset', $value->id) }}" title="Delete Assets">
                                            <i class="fas fa-trash"></i>
                                        </span>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".data-table").DataTable({
            "ordering": false,
            "bAutoWidth": false,
        });
    });




    function confirmDelete(title = "Are you sure?", text = "You won't be able to revert this!") {
        return Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#10b981',
            cancelButtonColor: '#ef4444',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        });
    }

    function deleteItem(url, rowElement) {
        $.ajax({
            url: url,
            type: 'DELETE',
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                // Remove the row if provided
                if (rowElement) {
                    rowElement.closest('tr').remove();
                }

                // Show success Swal
                Swal.fire(
                    'Deleted!',
                    response.msg ?? 'Item deleted successfully.',
                    'success'
                );
            },
            error: function(xhr) {
                Swal.fire(
                    'Error!',
                    xhr.responseJSON?.message || 'Something went wrong. Please try again.',
                    'error'
                );
            }
        });
    }

    $(document).on('click', '.delete-btn', function() {
        let $this = $(this);
        let url = $this.data('url');

        confirmDelete().then((result) => {
            if (result.isConfirmed) {
                deleteItem(url, $this);
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>