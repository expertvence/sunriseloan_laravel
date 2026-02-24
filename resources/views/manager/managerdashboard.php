<main>
             <style>
            .col-xl-3 {
                  transition: all 0.4s ease; 
                }
                
                .col-xl-3:hover {
                  transition: all 0.5s ease; 
                  transform: scale(0.80); 
                }
          </style>
                   <div class="container">
                       <h1 class="mt-4">Dashboard</h1>

                       <div class="row">
                           <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                               <div class="card  text-white  text-center"  style="min-height: 150px; box-shadow: 9px 5px 10px rgba(20, 20, 20, 0.2); background-color:rgb(13, 105, 98);">
                                  
                                       <h5 class="mt-3"> Total Loan</h5>
                                   
                                   
                                       <!-- <a class="small text-white stretched-link" href="#">View Details</a> -->
                                       <div class="small text-white mt-3">
                                           <h3>400</h3>
                                       </div>
                                 
                               </div>
                           </div>
                           <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                               <div class="card  text-white  text-center"  style="min-height: 150px; box-shadow: 9px 5px 10px rgba(14, 15, 15, 0.2); background-color:rgb(177, 206, 11);">
                                 
                                       <h5 class="mt-3"> Total Rejected Loan</h5>
                                  
                                  
                                       <!-- <a class="small text-white stretched-link" href="#">View Details</a> -->
                                       <div class="small text-white mt-3">
                                           <h3>80</h3>
                                       </div>
                                  
                               </div>
                           </div>
                           <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                               <div class="card  text-white text-center"  style="min-height: 150px; box-shadow: 9px 5px 10px rgba(18, 19, 19, 0.2); background-color:rgb(230, 40, 26);">
                                   
                                  <h5 class="mt-3">Pending Loan</h5>
                               
                                   
                                      <!--  <a class="small text-white stretched-link" href="#">View Details</a> -->
                                       <div class="small text-white">
                                        <h3>90</h3>
                                    </div>
                                 
                               </div>
                           </div>
                           <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                               <div class="card  text-white "    style="min-height: 150px; box-shadow: 9px 5px 10px rgba(17, 18, 17, 0.2); background-color:rgb(59, 189, 221);">
                                   <h5 class="mt-3">##</h5>
                                  
                                       
                                       <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                   </div>
                            
                           </div>
                       </div>
                       
                   </div>
               </main>
               <script>
                   $(".data-table").DataTable({
                       "ordering": false,
                       "bAutoWidth": false,
                   });
               </script>