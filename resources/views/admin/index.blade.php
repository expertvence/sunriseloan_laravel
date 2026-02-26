               <main>
          <style>
            .col-xl-3 {
  transition: all 0.4s ease; /* Smooth transition for all properties */
}

.col-xl-3:hover {
  transition: all 0.5s ease; /* Smooth transition for all properties */
  transform: scale(0.80); /* Shrink the card on hover */
}
          </style>

                   <div class="container">
                       <h1 class="mt-4">Dashboard</h1>

                       <div class="row">
                           <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                               <div class="card  text-white  text-center"  style="min-height: 150px; box-shadow: 9px 5px 10px rgba(20, 20, 20, 0.2); background-color:rgb(13, 105, 98);">
                                  
                                       <h3 class="mt-3"> Total Assets</h3>
                                  
                                       <div class="small text-white">
                                           <h1>{{$totalAssets}}</h1>
                                       </div>
                               </div>
                           </div>
                           <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                               <div class="card  text-white  text-center"   style="min-height: 150px; box-shadow: 9px 5px 10px rgba(14, 15, 15, 0.2); background-color:rgb(177, 206, 11);">
                                   
                                       <h3 class="mt-3"> Total Loan</h3>
                            
                                       <div class="small text-white mt-3">
                                       <h3>{{number_format($loan,2)}}</h3>
                                       </div>
                                   
                               </div>
                           </div>
                           <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                               <div class="card  text-white text-center"  style="min-height: 150px; box-shadow: 9px 5px 10px rgba(11, 11, 11, 0.2); background-color:rgb(205, 136, 227);">
                                   <h3 class="mt-3">Total Profit</h3>
                                   
                                       
                                       <div class="small text-white mt-3">
                                        {{-- <h3>{{number_format($totalProfit,2)}}</h3> --}}
                                       </div>
                                   
                               </div>
                           </div>
                           <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                               <div class="card  text-white text-center "  style="min-height: 150px; box-shadow: 9px 5px 10px rgba(19, 19, 19, 0.2); background-color:rgb(22, 130, 207);">
                               <h3 class="mt-3">Remaining Amount</h3>
                                   
                                      <!--  <a class="small text-white stretched-link" href="#">View Details</a> -->
                                       <div class="small text-white mt-3 ">
                                       @if($warningMessage)
                                        <div class="alert alert-warning">
                                           {{ $warningMessage}}
                                        </div>
                                      <!--   <span class="small text-white">{{ $warningMessage }}</span> -->
                                        
                                        @else
                                        <h3>{{number_format($remainingAmount,2)}}</h3>
                                    @endif
                                       </div>
                                  
                               </div>
                           </div>

                           <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                               <div class="card  text-white  text-center"  style="min-height: 150px; box-shadow: 9px 5px 10px rgba(14, 14, 14, 0.2); background-color:rgb(175, 192, 143);">
                                   
                                       <h3 class="mt-3"> Total User</h3>
              
                                       <div class="small text-white mt-3">
                                       <h3>{{number_format($totalUser)}}</h3>
                                       </div>
                                  
                               </div>
                           </div>
               


                           <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                               <div class="card  text-white text-center"  style="min-height: 150px; box-shadow: 9px 5px 10px rgba(17, 18, 17, 0.2); background-color:rgb(59, 189, 221);">
                               
                                   <h3 class="mt-3">Total Service Charge</h3>
                                  
                                       
                                       <div class="small text-white mt-3">
                                        <h3>{{number_format($totalServicesCharge,2)}}</h3>
                                       </div>
                                  
                               </div>
                           </div>



                           
                           <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                               <div class="card  text-white text-center "  style="min-height: 150px; box-shadow: 9px 5px 10px rgba(18, 19, 19, 0.2); background-color:rgb(230, 40, 26);">
                                   <h3 class="mt-3">Total Expence</h3>
                                  
                                       <div class="small text-white mt-3">
                                        <h3>{{number_format($totalExpence,2)}}</h3>
                                       </div>
                               </div>
                           </div>


                           <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                               <div class="card  text-white  text-center"  style="min-height: 150px; box-shadow: 9px 5px 10px rgba(13, 14, 13, 0.2); background-color:rgb(86, 110, 214);">
                                 
                                       <h3 class="mt-3"> Exact Cappital</h3>
                                   
                                  
                                       <!-- <a class="small text-white stretched-link" href="#">View Details</a> -->
                                       <div class="small text-white mt-3">
                                       <h3>{{number_format($exactAssetsWithprofitandwithoutloan)}}</h3>
                                       </div>
                                   
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