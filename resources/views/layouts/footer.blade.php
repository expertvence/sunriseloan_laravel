 <!-- <script src="{{ asset('js/app_v2.js') }}"></script> -->
 <script src="{{ asset('js/scripts.js') }}"></script>
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> --}}
 {{-- <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script> --}}
 {{-- <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script> --}}
 <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
 <!-- <script src="{{ asset('js/datatables-simple-demo.js') }}"></script> -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
 {{-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script> --}}

 {{-- <script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.ui/1.8.10/jquery-ui.min.js"></script> --}}
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js"
     integrity="sha512-8Y8eGK92dzouwpROIppwr+0kPauu0qqtnzZZNEF8Pat5tuRNJxJXCkbQfJ0HlUG3y1HB3z18CSKmUo7i2zcPpg=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>



 <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->

 {{-- <script type="text/javascript" src="http://malsup.github.io/jquery.blockUI.js"> </script> --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js" integrity="sha512-eYSzo+20ajZMRsjxB6L7eyqo5kuXuS2+wEbbOkpaur+sA2shQameiJiWEzCIDwJqaB0a4a6tCuEvCOBHUg3Skg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="{{ asset('js/autocomplete.js') }}"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('js/custom.js') }}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"
        integrity="sha512-lEb9Vp/rkl9g2E/LdHIMFTqz21+LA79f84gqP75fbimHqVTu6483JG1AwJlWLLQ8ezTehty78fObKupq3HSHPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
 @if (auth()->check() && auth()->user()->user_type === 'admin')
 <script>
 (function ($) {
   function initAdminTables() {
     if (!$.fn.DataTable) return;
     $.fn.dataTable.ext.errMode = 'none';
     $('#page-content table:has(thead)').each(function () {
       var table = this, $table = $(table);
       if ($table.closest('form, .pdf-content, .print-only').length || $.fn.DataTable.isDataTable(table)) return;
       if (!$table.find('tbody tr').length || $table.find('tbody input, tbody select, tbody textarea').length) return;
       $table.DataTable({pageLength:10,lengthMenu:[10,25,50,100],ordering:true,autoWidth:false,scrollX:true,language:{search:'',searchPlaceholder:'Search...',lengthMenu:'Show _MENU_',emptyTable:'No records available'}});
     });
   }
   $(function () {
     initAdminTables();
     var content = document.getElementById('page-content');
     if (content && window.MutationObserver) new MutationObserver(function (records) {
       if (records.some(function (record) { return record.addedNodes.length; })) initAdminTables();
     }).observe(content,{childList:true,subtree:true});
   });
 })(jQuery);
 </script>
 @endif
 @stack('js')
 <script>
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
     $(document).ready(function() {
        var loginUrl = $('meta[name="login-url"]').attr('content');

        function isLoginPage(data, responseUrl) {
            if (responseUrl && new URL(responseUrl, window.location.href).pathname.replace(/\/$/, '') === new URL(loginUrl, window.location.href).pathname.replace(/\/$/, '')) {
                return true;
            }

            return /<form[^>]+(?:action=["'][^"']*login|id=["']login-form)/i.test(data || '') ||
                /<title>[^<]*login/i.test(data || '');
        }

        function updateActiveSidebar(url) {
            var targetPath;
            try {
                targetPath = new URL(url, window.location.href).pathname.replace(/\/$/, '');
            } catch (e) {
                return;
            }

            var $links = $('.sb-sidenav-menu .ajax_link');
            $links.removeClass('active');
            $('.sb-sidenav-menu .collapse').removeClass('show');
            $('.sb-sidenav-menu .nav-link[data-bs-toggle="collapse"]')
                .addClass('collapsed')
                .attr('aria-expanded', 'false');

            $links.each(function() {
                var linkUrl = $(this).data('url');
                if (!linkUrl) return;

                try {
                    var linkPath = new URL(linkUrl, window.location.href).pathname.replace(/\/$/, '');
                    if (linkPath === targetPath) {
                        var $link = $(this).addClass('active');
                        var $collapse = $link.closest('.collapse');
                        if ($collapse.length) {
                            $collapse.addClass('show');
                            $('[data-bs-target="#' + $collapse.attr('id') + '"]')
                                .removeClass('collapsed')
                                .attr('aria-expanded', 'true');
                        }
                    }
                } catch (e) {}
            });
        }

        function loadPage(url, updateHistory) {
            $.ajax({
                type: 'GET',
                url: url,
                cache: false,
                headers: { 'Accept': 'text/html, application/json' },
                beforeSend: function() {
                    if ($.blockUI) blockUI();
                },
                success: function(data, status, xhr) {
                    $.unblockUI();

                    if (isLoginPage(data, xhr.responseURL)) {
                        window.location.assign(xhr.responseURL || loginUrl);
                        return;
                    }

                    $('#page-content').html(data);
                    updateActiveSidebar(url);
                    if (updateHistory) {
                        window.history.pushState({ path: url }, '', url);
                    }
                },
                error: function(xhr) {
                    $.unblockUI();

                    if (xhr.status === 401 || xhr.status === 419 || isLoginPage(xhr.responseText, xhr.responseURL)) {
                        window.location.assign(loginUrl);
                        return;
                    }

                    $('#page-content').html('<div class="alert alert-danger m-3" role="alert">This page could not be loaded. Please try again.</div>');
                }
            });
        }

        $(document).on('click', '.ajax_link', function(e) {
            e.preventDefault();
            var url = $(this).data('url');
            if (url) loadPage(url, true);
        });

        window.addEventListener('popstate', function() {
            updateActiveSidebar(window.location.href);
            loadPage(window.location.href, false);
        });

        updateActiveSidebar(window.location.href);
        var pageurl = window.location.href;
        if (pageurl && $('#page-content').children().length === 0) {
            loadPage(pageurl, false);
        }
     });
 </script>
