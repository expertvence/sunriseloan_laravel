
// function memberAutocomplete(){
//     var route = "{{ url('member-autocomplete-search') }}";
//     $('#member_name').typeahead({
//         source: function (query, process) {
//             return $.get(route, {
//                 query: query
//             }, function (data) {
//                 return process(data);
//             });
//         }
//     });

// }

// $( function() {
//     var availableTags = [
//       "ActionScript",
//       "AppleScript",
//       "Asp",
//       "BASIC",
//       "C",
//       "C++",
//       "Clojure",
//       "COBOL",
//       "ColdFusion",
//       "Erlang",
//       "Fortran",
//       "Groovy",
//       "Haskell",
//       "Java",
//       "JavaScript",
//       "Lisp",
//       "Perl",
//       "PHP",
//       "Python",
//       "Ruby",
//       "Scala",
//       "Scheme"
//     ];
//     $( "#member_name" ).autocomplete({
//       source: availableTags
//     });
//   } );

function openDoctorAutocomplete(element_id, hidden_id='', personnel_ind_name = '', personnel_ind = '',
        onclickCallback = '') {
        $(element_id).typeahead({
            hint: true,
            highlight: true,
            minLength: 3
        }, {
            limit: 'Infinity',
            async: true,
            source: function(query, processSync, processAsync) {
                return $.ajax({
                    // url: "https://localhost/abiram/public/member-autocomplete-search",
                    url: 'member-autocomplete-search',
                    type: 'POST',
                    data: {
                        search_data: query,
                        personnel_ind_name: personnel_ind_name,
                        personnel_ind: personnel_ind,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',

                    success: function(result) {
                        // console(result)
                        return processAsync(result);
                    }
                });
            },
            display: 'name',
            templates: {

                suggestion: function(item) {

                    // $("#" + hidden_id).val('');
                    // var img_path = "{{ asset('images/doctor.png') }}";
                    // var spec = item.specialization != null ? item.specialization + "," : "";
                    // var ghender = item.gender_txt != null ? item.gender_txt + "," : "";
                    // var phone = item.phone_mobile != null ? item.phone_mobile : "";
                    // return '<div id="user-selection" class="clearfix border-bottom">' +
                    //     '<div style="display:block"><img src="' + img_path +
                    //     '" alt="doctor image" class="rounded border mr-1 float-left mrv-2" width="35" ><strong>' +
                    //     item.person_code + ' : </strong>' + item.full_name + '<div><i>' + spec +
                    //     '</i> <small>G: ' + ghender + '</small> <small>Ph: ' + phone +
                    //     '</small></div></div></div>' +
                    //     '</div>';
                    return '<div id="user-selection" class="clearfix border-bottom">' +
                        '<div style="display:block"><strong>' +
                        item.member_code + ' : </strong>' + item.name + '<div><i> <strong> Share : </strong> ' + item.share_no +
                        ' </i> <strong> ,  Share Amt. : </strong> ' + item.share_amt + '<strong> , Ph : </strong>' + item.mobile +
                        ' </strong></div></div></div>' +
                        '</div>';
                }
            }

        }).bind("typeahead:selected", function(obj, item, name) {

    console.log("Selected Item:", item);   // ✅ ADD THIS

    if (hidden_id) {
        $("#" + hidden_id).val(item.id);   // member_id
    }

    $("#user_id").val(item.user_id);       // user_id

});

    }



    