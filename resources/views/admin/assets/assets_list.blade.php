
<style>
    td {
        padding: 5px;
    }
</style>
<div class="card mb-4">
    <div class="card-header">
    <!-- <h1>Total Assets: {{ $total_assets }}</h1>
    <h1>Total Loan:{{$totalCommite}}</h1>
    <h2>Remaining amount:{{$remainingAmount}}</h2> -->
        <i class="fas fa-table me-1"></i>
  Assets List
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatablesSimple" class="data-table table table-bordered " width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th>SL#</th>
                        <th>Name</th>
                        
                        
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!empty($data))
                    @foreach ($data as $value)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value->assets}}</td>
                        
                        <td>
                          <form action="{{ route('destroy-assets', $value->id) }}" method="POST">
                          <form action="{{ route('destroy-assets', $value->id) }}" method="POST">
                                @csrf
                                @method('POST') <!-- Use DELETE method here -->
                                <span class="btn btn-sm  open-modal btnView" data-action="{{route('edit-assets', $value->id)}}" data-modal="common-modal-md" data-title=" Assets Edit" title="Edit" data-id="{{$value->id}}"><i class="fas fa-edit"></i></span>
                                <button type="submit" style="border: none; background: none; padding: 0; outline: none;">
                                    <i class="fas fa-trash" style="color: red;"></i>
                                </button>
                            
                                
                            </form>
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
</script>
