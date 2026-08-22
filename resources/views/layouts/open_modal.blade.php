<style>
	/* Shift modal top position down so header and close button are always visible */
	.modal-dialog {
		margin-top: 65px !important;
		margin-bottom: 30px !important;
	}

	@media (max-width: 576px) {
		.modal-dialog {
			margin-top: 55px !important;
			margin-bottom: 20px !important;
		}
	}

	.common-modal-xl .modal-dialog {
		margin-top: 65px !important;
		margin-bottom: 30px !important;
	}

	/* Modal header action container styling */
	.modal-header-actions {
		display: flex;
		align-items: center;
		gap: 10px;
		margin-left: auto;
	}

	.btn-modal-pdf {
		background: #ffffff !important;
		color: #dc3545 !important;
		border: 1px solid #dc3545 !important;
		border-radius: 8px !important;
		padding: 5px 14px !important;
		font-size: 0.85rem !important;
		font-weight: 600 !important;
		display: inline-flex !important;
		align-items: center !important;
		gap: 6px !important;
		cursor: pointer !important;
		transition: all 0.2s ease !important;
		box-shadow: 0 2px 5px rgba(0,0,0,0.1) !important;
		text-decoration: none !important;
	}

	.btn-modal-pdf:hover {
		background: #dc3545 !important;
		color: #ffffff !important;
		transform: translateY(-1px);
		box-shadow: 0 4px 8px rgba(220,53,69,0.3) !important;
	}
</style>

<!-- html2pdf Library for client-side PDF export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<!-- Modal -->
<div class="common-modal modal exampleModal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary d-flex align-items-center justify-content-between">
				<h5 class="modal-title text-white m-0" id="exampleModalLabel">Modal title</h5>
				<div class="modal-header-actions">
					<button type="button" class="btn-modal-pdf" onclick="downloadModalPDF(this)" title="Download PDF">
						<i class="fas fa-file-pdf"></i> PDF Download
					</button>
					<button type="button" class="close text-white" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" style="color: white !important; opacity: 0.9; font-size: 1.2rem; border: none; background: transparent; cursor: pointer; margin-left: 10px;">
						<i class="fas fa-times"></i>
					</button>
				</div>
			</div>
			<div class="modal-body">
				...
			</div>
		</div>
	</div>
</div>

<div class="common-modal-xl modal fade" id="commonModalXl" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document" style="max-width: 880px !important; width: 92%; margin: 65px auto 30px auto !important;">
		<div class="modal-content" style="border-radius: 20px; overflow: hidden; border: none; box-shadow: 0 25px 60px rgba(0,0,0,0.35);">
			<div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 1rem 1.5rem; border: none; display: flex; align-items: center; justify-content: space-between;">
				<h5 class="modal-title text-white font-weight-bold" style="color: white !important; margin: 0; font-size: 1.15rem;">Modal title</h5>
				<div class="modal-header-actions">
					<button type="button" class="btn-modal-pdf" onclick="downloadModalPDF(this)" title="Download PDF">
						<i class="fas fa-file-pdf"></i> PDF Download
					</button>
					<button type="button" class="close text-white btn-close-custom" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" onclick="$('#commonModalXl').modal('hide');$('.modal').modal('hide');" style="color: white !important; opacity: 0.95; font-size: 1.2rem; border: none; background: rgba(255,255,255,0.2); width: 34px; height: 34px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s ease; outline: none; margin-left: 10px;">
						<i class="fas fa-times"></i>
					</button>
				</div>
			</div>
			<div class="modal-body p-0" style="background: var(--bg-body, #f8fafc); min-height: 300px;">
				...
			</div>
		</div>
	</div>
</div>

<div class="common-modal-md modal fade patient_entry exampleModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary d-flex align-items-center justify-content-between">
				<h5 class="modal-title text-white m-0" id="exampleModalLabel">Modal title</h5>
				<div class="modal-header-actions">
					<button type="button" class="btn-modal-pdf" onclick="downloadModalPDF(this)" title="Download PDF">
						<i class="fas fa-file-pdf"></i> PDF Download
					</button>
					<button type="button" class="close text-white" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" style="color: white !important; opacity: 0.9; font-size: 1.2rem; border: none; background: transparent; cursor: pointer; margin-left: 10px;">
						<i class="fas fa-times"></i>
					</button>
				</div>
			</div>
			<div class="modal-body">
				...
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="common-modal-sm modal exampleModal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary d-flex align-items-center justify-content-between">
				<h5 class="modal-title text-white m-0" id="exampleModalLabel">Modal title</h5>
				<div class="modal-header-actions">
					<button type="button" class="btn-modal-pdf" onclick="downloadModalPDF(this)" title="Download PDF">
						<i class="fas fa-file-pdf"></i> PDF Download
					</button>
					<button type="button" class="close text-white" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" style="color: white !important; opacity: 0.9; font-size: 1.2rem; border: none; background: transparent; cursor: pointer; margin-left: 10px;">
						<i class="fas fa-times"></i>
					</button>
				</div>
			</div>
			<div class="modal-body">
				...
			</div>
		</div>
	</div>
</div>


<!-- Modal for success notifications -->
<div class="common-modal-notify modal exampleModal fade bd-example-modal-sm p-3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="row">
				<div class="col-sm-12 col-lg-12 col-xl-12">
					<div class="success_icon text-center p-3">
						<i class="fa fa-check"></i>
						<h2 class="modal-title mb-2"></h2>
						<span class="modal-body"></span>
						<div class="text-center mt-2">
							<button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal">Ok</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal for notifications -->
<div class="common-modal-alert modal exampleModal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
			</div>
		</div>
	</div>
</div>



<!-- Modal for notifications -->
<div class="common-modal-notify-error exampleModal modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bg-danger d-flex align-items-center justify-content-between">
				<h5 class="modal-title modal-error text-white m-0" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close" style="color: white !important; border: none; background: transparent; cursor: pointer;">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"></div>
		</div>
	</div>
</div>

<script>
function downloadModalPDF(btn) {
	var $ = jQuery;
	var modal = $(btn).closest('.modal');
	var title = modal.find('.modal-title').text().trim() || 'SUNRISE_LOAN_REPORT';
	var modalBody = modal.find('.modal-body');
	
	if (!modalBody.length) return;

	var originalHtml = $(btn).html();
	$(btn).html('<i class="fas fa-spinner fa-spin"></i> DomPDF Generating...').prop('disabled', true);

	// Expand DataTables if any table is paginated inside modal
	var dataTables = [];
	modalBody.find('table').each(function() {
		if ($.fn.DataTable && $.fn.DataTable.isDataTable(this)) {
			var dt = $(this).DataTable();
			var origLen = dt.page.len();
			dataTables.push({ dt: dt, origLen: origLen });
			dt.page.len(-1).draw();
		}
	});

	setTimeout(function() {
		var bodyClone = modalBody.clone();
		
		// Remove non-printable elements from clone
		bodyClone.find('.back-btn, .btn-close, script, .dataTables_length, .dataTables_filter, .dataTables_paginate, .dataTables_info, .btn').remove();

		var htmlContent = bodyClone.html();

		// Submit POST request to DomPDF backend route
		var csrfToken = $('meta[name="csrf-token"]').attr('content') || '{{ csrf_token() }}';
		var form = $('<form action="{{ route('export-modal-dompdf') }}" method="POST" target="_blank" style="display:none;"></form>');
		form.append($('<input>', { type: 'hidden', name: '_token', value: csrfToken }));
		form.append($('<input>', { type: 'hidden', name: 'title', value: title }));
		form.append($('<input>', { type: 'hidden', name: 'html_content', value: htmlContent }));

		$('body').append(form);
		form.submit();
		form.remove();

		// Restore DataTables state
		setTimeout(function() {
			dataTables.forEach(function(item) {
				item.dt.page.len(item.origLen).draw();
			});
			$(btn).html(originalHtml).prop('disabled', false);
		}, 600);
	}, 300);
}
</script>
