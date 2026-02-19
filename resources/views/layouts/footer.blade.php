 <!-- <script src="{{ asset('js/app_v2.js') }}"></script> -->
 <script src="{{ asset('js/scripts.js') }}"></script>
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> --}}
 {{-- <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script> --}}
 {{-- <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script> --}}
 <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
 <!-- <script src="{{ asset('js/datatables-simple-demo.js') }}"></script> -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
 {{-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script> --}}

 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
 @stack('js')
 <script>
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
     $(document).ready(function() {
        $('.ajax_link').click(function(e) {
             e.preventDefault(); // Prevent default behavior of anchor tag
             var url = $(this).data('url'); // Get the URL from data attribute
             blockUI();
            console.log(url+'________-url');
             // Send AJAX request to the Laravel route
             $.ajax({
                 async: false,
                 type: 'get',
                 url: url,
                 beforeSend: function() {
                     blockUI();

                 },
                 success: function(data) {
                     $.unblockUI();
                     window.history.pushState({path: url}, '', url);
                     $('#page-content').html(data);
                 }
             });
         });

         var pageurl = '{{ url()->full() }}';
         var img_path = 'images/loader.gif';
         var current_page_route_name = '{{ Route::currentRouteName() }}';
         var page_without_block = [];

         if (pageurl != "") {
             console.log(pageurl + 'bellal')
             blockUI();
             $.ajax({
                 async: false,
                 type: 'get',
                 url: pageurl,
                 beforeSend: function() {
                     blockUI();

                 },
                 success: function(data) {
                     $.unblockUI();
                     $('#page-content').html(data);
                 }
             });
         }

       

     });
 </script>