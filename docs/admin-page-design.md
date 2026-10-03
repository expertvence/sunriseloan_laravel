# Admin list and form design

Admin pages now use a shared presentation layer intended to align their lists and forms with the employee member list/form design.

## Files changed

- public/css/admin-ui.css
  - Central shared styling for admin form controls, cards, list tables, DataTables search/length controls, and pagination.
  - Includes responsive adjustments and a dark-mode variant.
- resources/views/layouts/master.blade.php
  - Adds the admin-ui body class only for authenticated admin users.
- resources/views/layouts/head.blade.php
  - Loads the shared admin stylesheet.
- resources/views/layouts/footer.blade.php
  - Adds an admin-only initializer for list tables injected into page-content.
  - Skips tables already initialized by their page scripts and tables with editable controls in their body.
  - Uses a default page size of 10 and page-size choices 10, 25, 50, and 100.

## Pagination behavior

Existing page-specific DataTables configurations remain in place. The shared initializer covers eligible tables that do not have a page-specific initializer, including content loaded later through the application's AJAX navigation. Form-entry tables and print/PDF layouts are excluded.

## Scope

The stylesheet and pagination initializer are gated by user_type === admin. Manager and employee pages are not given the admin class or initializer.