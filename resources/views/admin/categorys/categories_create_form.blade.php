@php
    $id = isset($data) && !empty($data) ? $data->id : '';
    $loan_category = isset($data) && !empty($data) ? $data->loan_category : '';
    $percentage = isset($data) && !empty($data) ? $data->percentage : '';
@endphp

<form action="{{ route('save-category') }}" method="POST" id="categories_create">
    @csrf

    <!-- Hidden ID for Edit -->
    <input type="hidden" name="categories_id" id="categories_id" value="{{ $id }}">

    <div style="border:1px solid gray; padding:10px">
        <p class="text-center" style="font-size: 30px; font-weight: bold; background-color:darkcyan; color:white">
            <span style="border-bottom: 1px dotted white;">
                Loan Category Entry
            </span>
        </p>

        <div class="form-row" style="padding: 20px;">

            <!-- Category Name -->
            <div class="col-md-6">
                <label><strong> Category Name <span class="text-danger">*</span></strong></label>
                <input type="text" class="form-control" id="loan_category" name="loan_category"
                    placeholder="Enter category name" value="{{ $loan_category }}" required>
            </div>

            <!-- Percentage -->
            <div class="col-md-6">
                <label><strong> Percentage (%) <span class="text-danger">*</span></strong></label>
                <input type="number" step="0.01" class="form-control" id="percentage" name="percentage"
                    value="{{ $percentage }}" placeholder="Enter percentage" required>
            </div>

            <!-- Agreement Checkbox -->
            <div class="col-md-12 mt-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="infoAgreement" required
                        {{ $id ? 'checked' : '' }}>
                    <label class="form-check-label" for="infoAgreement">
                        I agree that the information provided is true and accurate.
                    </label>
                </div>
            </div>

        </div>
    </div>

    <!-- Submit Button -->
    <div class="mt-4">
        <button type="button" onclick="saveFile(this)" class="btn-premium-submit"
            redirect="">
            <i class="fas fa-save me-2"></i> Save

        </button>
    </div>
</form>
