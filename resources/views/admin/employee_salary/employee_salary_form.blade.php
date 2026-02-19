<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css"
        integrity="sha512-jG7NmK8Pm8iKEjw8aIWc+GVFBM33O/Ow4U0Xw34D5yyST0fgmlcV6shsghOXexDsAqtE2TCM6WwNy35qX8E6ng=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
    <style>
        td {
            padding: 5px;
        }

        /* #datatablesSimple td ,th{
                            border: 1px solid rgb(97, 93, 93);
                            padding: 5px;
                        } */
    </style>
   
    <main>
        <div class="container">
            <div class="form-row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg ">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light "> <strong> Employee Salary Form</strong></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('installment_payment_store') }}" method="POST" id="payment">
                                @csrf
                                <input type="hidden" name="id" id="pay_id" value="#">
                                <table style="width: 100%">
                                    <tr>
                                        <td> <label for="member_name"> <strong> Employee Name</strong></label></td>
                                        <td colspan="3">

                                            <input type="text" class="form-control" name="member_name" id="member_name"
                                                placeholder="Write....." required="required" autocomplete="off">
                                            <input type="hidden" name="member_id" id="member_id"
                                                value="#">


                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <label for="no_of_share"> <strong> Designation</strong></label></td>
                                        <td><input type="text" class="form-control" name="no_of_share" id="no_of_share"
                                                placeholder="0" value="#" readonly></td>
                                        <td> <label for="share_amt"> <strong>Salary</strong></label></td>
                                        <td><input type="text" class="form-control" name="share_amt" id="share_amt"
                                                placeholder="0.00" value="#" readonly=""></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: text-top"> <label for="from_month"><strong> Month</strong></label></td>
                                      

                                        <td style="vertical-align: text-top"> <label for="year"> <strong> Year</strong></label></td>
                                        <td style="vertical-align: text-top">
                                           
                                            <select name="year" id="year" class="form-control" required="required">
                                                <option value="">select</option>
                                                
                                            </select>

                                        </td>

                                    </tr>
                                   
                                    
                                    <tr>
                                        <td colspan="4">
                                            {{-- {{route('installment_payment')}} --}}
                                            <div class="d-grid"><button type="submit" onclick="save(this)"
                                                    class="btn btn-primary btn-block" redirect="{{route('installment_payment_list')}}">Paid Amount</button>
                                            </div>
                                        </td>
                                    </tr>

                                </table>
                            </form>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"
        integrity="sha512-lEb9Vp/rkl9g2E/LdHIMFTqz21+LA79f84gqP75fbimHqVTu6483JG1AwJlWLLQ8ezTehty78fObKupq3HSHPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>


        openDoctorAutocomplete('#member_name', 'member_id', '', '', memberInfo);

        function memberInfo(item, obj) {
            $('#no_of_share').val(item.share_no);
            $('#share_amt').val(item.share_amt);
            // var conceptName = $('#from_month').find(":selected").val();

        }

        Years();
        function Years()
        {
            let Year=document.getElementById('year');
            let Currentyear= new Date().getFullYear();
            const option=document.createElement('option');
            option.value=Currentyear;
            option.textContent=Currentyear;
            Year.appendChild(option);
            
           /*  if(Currentyear)
            {
                const option=document.createElement('option');
                option.value= Currentyear;
                option.textContent= Currentyear;
                Year.appendChild(option);
            } */
        }
        
    </script>
