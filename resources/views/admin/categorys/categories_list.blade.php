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
                        <th>Persentage</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!empty($data))
                    @foreach ($data as $value)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value->loan_category}}</td>
                        <td>{{$value->percentage}}</td>
                        

                        <!-- Status Update -->
                        

                        <td>
                            <form action="{{ route('delete', $value->id) }}" method="POST">
                                @csrf
                                @method('POST') <!-- Use DELETE method here -->
                                <span class="btn btn-sm open-modal btnView" data-action="{{ route('edit-category', $value->id) }}" data-modal="common-modal-md" data-title="Categories Edit" title="Edit" data-id="{{ $value->id }}">
                                <i class="fas fa-edit"></i>
                            </span>
                                <button type="submit" style="border: none; background: none; padding: 0; outline: none;">
                                    <i class="fas fa-trash" style="color: red;"></i>
                                </button>
                            
                                
                            </form>

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
