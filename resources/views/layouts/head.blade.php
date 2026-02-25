 <head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   <title>Sunrise loan</title>
   {{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}

  
   
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->

   <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

   <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
   <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
   {{-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"> --}}
   @stack('styles')
   <style>
     .chat {
       list-style: none;
       margin: 0;
       padding: 0;
     }

     .chat li {
       margin-bottom: 10px;
       padding-bottom: 5px;
       border-bottom: 1px dotted #B3A9A9;
     }

     .chat li .chat-body p {
       margin: 0;
       color: #777777;
     }

     .panel-body {
       overflow-y: scroll;
       height: 350px;
     }

     ::-webkit-scrollbar-track {
       -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
       background-color: #F5F5F5;
     }

     ::-webkit-scrollbar {
       width: 12px;
       background-color: #F5F5F5;
     }

     ::-webkit-scrollbar-thumb {
       -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
       background-color: #555;
     }

     /* #layoutSidenav_content{
      padding-left:200px !important;
  } */
     input[type="text"],
     textarea {

       background-color: #d1d1d1;

     }
   </style>
  
 </head>