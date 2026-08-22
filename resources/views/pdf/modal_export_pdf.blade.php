<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title ?? 'Sunrise Loan Report' }}</title>
    <style>
        @page {
            margin: 25px 30px;
            size: a4 landscape;
        }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #1e293b;
            font-size: 11px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
        }

        /* Header Styling */
        .header-container {
            text-align: center;
            padding-bottom: 12px;
            border-bottom: 3px double #667eea;
            margin-bottom: 15px;
        }
        .logo-title {
            font-size: 24px;
            font-weight: bold;
            color: #4c51bf;
            letter-spacing: 1.5px;
            margin: 0;
            text-transform: uppercase;
        }
        .company-subtitle {
            font-size: 12px;
            color: #4a5568;
            margin: 3px 0 2px 0;
            font-weight: 600;
        }
        .company-address {
            font-size: 10px;
            color: #718096;
            margin: 0;
        }

        /* Document Details Banner */
        .doc-banner {
            background-color: #f7fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 8px 12px;
            margin-bottom: 15px;
            width: 100%;
        }
        .doc-banner table {
            width: 100%;
            border-collapse: collapse;
        }
        .doc-banner td {
            font-size: 11px;
            padding: 2px 0;
        }
        .doc-title {
            font-size: 14px;
            font-weight: bold;
            color: #2b6cb0;
            text-transform: uppercase;
        }
        .doc-date {
            text-align: right;
            color: #4a5568;
            font-size: 10px;
        }

        /* Content Table Styling */
        .content-box {
            width: 100%;
            margin-bottom: 30px;
        }
        .content-box table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 5px;
        }
        .content-box th {
            background-color: #667eea !important;
            color: #ffffff !important;
            font-weight: bold !important;
            font-size: 11px !important;
            padding: 7px 8px !important;
            border: 1px solid #4c51bf !important;
            text-align: left;
        }
        .content-box td {
            padding: 6px 8px !important;
            border: 1px solid #cbd5e1 !important;
            font-size: 10px !important;
            color: #2d3748 !important;
        }
        .content-box tr:nth-child(even) td {
            background-color: #f8fafc !important;
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 2px 6px;
            font-size: 9px;
            font-weight: bold;
            border-radius: 4px;
        }
        .badge-approved { background-color: #c6f6d5; color: #22543d; }
        .badge-pending { background-color: #feebc8; color: #744210; }
        .badge-rejected { background-color: #fed7d7; color: #742a2a; }

        /* Footer & Signatures */
        .footer {
            position: fixed;
            bottom: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
        }
        .signature-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        .signature-table td {
            width: 33.33%;
            text-align: center;
            vertical-align: bottom;
        }
        .signature-line {
            border-top: 1px dashed #718096;
            width: 140px;
            margin: 0 auto;
            padding-top: 4px;
            font-size: 10px;
            color: #4a5568;
            font-weight: 600;
        }

        .page-number {
            text-align: right;
            font-size: 9px;
            color: #a0aec0;
            border-top: 1px solid #edf2f7;
            padding-top: 4px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header-container">
        <div class="logo-title">SUNRISE LOAN</div>
        <div class="company-subtitle">Sunrise Loan & Savings Co-operative Society Ltd.</div>
        <div class="company-address">Trusted Financial Management System</div>
    </div>

    <!-- Document Info Banner -->
    <div class="doc-banner">
        <table>
            <tr>
                <td class="doc-title">{{ $title ?? 'Report Details' }}</td>
                <td class="doc-date">Generated: {{ date('d M, Y h:i A') }}</td>
            </tr>
        </table>
    </div>

    <!-- Main Content Box -->
    <div class="content-box">
        {!! $html_content !!}
    </div>

    <!-- Signatures -->
    <table class="signature-table">
        <tr>
            <td>
                <div class="signature-line">Prepared By</div>
            </td>
            <td>
                <div class="signature-line">Verified By</div>
            </td>
            <td>
                <div class="signature-line">Authorized Officer</div>
            </td>
        </tr>
    </table>

    <div class="page-number">
        SUNRISE LOAN Management System &copy; {{ date('Y') }} | Confidential Report
    </div>

</body>
</html>
