# Loan commitment updates

## Pages

- resources/views/admin/loan_commit/loan_commit_form.blade.php: shared admin form included by the manager loan commit page. The weekly selector now offers 1-5, and the client side limit permits five. Last payment month and count use the summary endpoint.
- Manager loan commitment page: it includes the shared admin loan commitment form, so the admin form behavior applies to manager submissions too.
- resources/views/employee/loancommit/loancommitform.blade.php: added optional Week 1-5 multi-select, submits all selected months in one request, uses backend errors, calculates installment from category percentage, and shows remaining balance and last payment month/count.

## Functions

- App\LoanCommitSchedule::committedWeeks($loanId, $year, $month): reads existing weeks for that exact loan month.
- App\LoanCommitSchedule::nextWeeks($loanId, $year, $month, $selectedWeeks): no selection requests one installment; selected week count requests that many. It skips occupied slots, assigns the next open sequence 1-5, and caps each month at five commits.
- App\LoanCommitSchedule::nextCommitId(): allocates an unused LCN identifier.
- App\LoanCommitSchedule::summary($loan): calculates total paid, remaining total with category interest, latest payment month, and commit count for that month.
- LoanCommitController::insertLoanCommit() and Employee\LoanCommitController::insertLoanCommit(): accept optional week values, apply sequential assignment, reject duplicate monthly commits, and save transactionally.
- Both controllers' getTotalPaid() functions return the common remaining balance and latest month count.
- Employee\LoanCommitController::getLoanDetails() returns category percentage for the employee installment calculation.
- LoanCommitController::getRepaymentType() reports five week slots.

## Verification

Source changes were inspected. Automated tests were not run.