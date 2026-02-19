
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // function formValidation(formID) {
    //     $("#" + formID).validate({
    //         errorElement: "em",
    //         errorPlacement: function (error, element) {
    //             $(element).addClass("is-invalid");

    //         },
    //         success: function (label, element) {
    //             $(element).removeClass("is-invalid");
    //         }
    //     });

    //     if ($("#" + formID).valid()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    function afterSaveLoadPage(responseAction) {

        if (responseAction != "") {
            $.ajax({
                async: false,
                url: responseAction,
                type: "get",
                beforeSend: function() {

                    //blockUI();
                },
                success: function(data) {
                     $('#page-content').html(data);
                },
                complete: function(data) {
                    reset();
                    //$.unblockUI();
                }
            });
        }
    };

    function reset() {
        $('form').find("input[type=text], textarea, email, password ,select, input , checkbox, radio").val("");
        $('input:checkbox').removeAttr('checked');
        $('input:radio').removeAttr('checked');
    }

    function blockUI() {
        $.blockUI({
            message: '<h1><i class="fas fa-stroopwafel fa-spin" style="color: #38C172; font-size: 40px;" ></i></h1>',
            overlayCSS: {
                backgroundColor: '#1b2024',
                opacity: 0.8,
                zIndex: 999999,
                cursor: 'wait'
            },
            css: {
                border: 0,
                color: '#fff',
                padding: 0,
                zIndex: 9999999,
                backgroundColor: 'transparent'
            }
        });
    }
    $(document).on('click', '.open-modal', function() {
        var id = $(this).attr("data-id");
        var action = $(this).attr("data-action");
        var title = $(this).attr("data-title");
        var modal = $(this).attr("data-modal");

        $.ajax({
            async: true,
            url: action,
            data: {
                id: id
            },
            type: "get",
            beforeSend: function() {
                blockUI();
                $('.' + modal).modal('show');
                $('.' + modal + ' .modal-body').html("<i class='fas fa-stroopwafel fa-spin'></i>");
                $('.' + modal + ' .modal-title').html(title);
            },
            success: function(data) {
                $('.' + modal + ' .modal-body').html(data);
            },
            complete: function(data) {
                $.unblockUI();
            }

        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function isAModalOpen() {
        return $('.modal.in').length > 0;
    }

    function afterSaveModal(responseAction, modalClass, modalTitle) {
        if (responseAction != "") {
            $.ajax({
                async: false,
                url: responseAction,
                type: "get",
                beforeSend: function() {
                    blockUI();
                    if (isAModalOpen)
                        $('.modal').modal('hide');
                    $('.' + modalClass).modal('show');
                    console.log(modalClass + 'bellal_model');
                    if (modalClass != "")
                        $('.' + modalClass).addClass(modalClass);
                    $('.' + modalClass + ' .modal-title').html(modalTitle);
                    $('.' + modalClass + ' .modal-body').html("");
                },
                success: function(data) {

                    // $('.' + modalClass + ' .modal-body').html(data);
                    //  $('#page-content').html(data);
                },
                complete: function(data) {
                    $.unblockUI();
                }
            });
        }
    }

    function save(element) {
        var form = $(element).parents("form");
        if (form.valid()) {
            event.preventDefault();
            event.stopImmediatePropagation();

            var formId = $(element).parents("form").attr("id");
            var url = $(element).parents("form").attr("action");
            var method = $(element).parents("form").attr("method");
            var formData = $(element).parents("form").serialize();
            var redirect = $(element).attr('redirect');
            console.log(formData);
            //  if (formValidation(formId) == false) {
            //      return;
            //  }
            if (confirm("Are You Sure?")) {
                $.ajax({
                    async: true,
                    url: url,
                    type: 'POST',
                    data: formData,
                    cache: false,
                    beforeSend: function() {
                        blockUI();
                    },
                    success: function(response) {


                        if (response) {
                            console.log(response.title)

                            if (response.title == 'Success') {
                                $('.common-modal-notify').modal('show');
                                //  $('.common-modal-notify .modal-body').html("<i class='fas fa-stroopwafel fa-spin'></i>");
                                $('.common-modal-notify .modal-title').html(response.title);
                                $('.common-modal-notify .modal-body').html(response.msg);
                            } else {
                                $('.common-modal-notify-error').modal('show');
                                $('.common-modal-notify-error .modal-title').html(response.title);
                                $('.common-modal-notify-error .modal-body').html(response.msg);
                            }
                        }

                        // afterSaveModal(redirect , 'common-modal-notify' ,  response.title);
                    },

                    complete: function(response) {

                        // top.location.href = `${redirect}`;
                        // $.unblockUI();
                        // reset();
                    },
                    error: function(error) {
                        console.log(error)
                    },
                }).done(function() {
                    $.unblockUI();
                    afterSaveLoadPage(redirect);
                    //   top.location.href = `${redirect}`;
                });
            }
        }
        event.stopImmediatePropagation();

    }

    function saveFile(element) {
        event.preventDefault();
        event.stopImmediatePropagation();
        var formId = $(element).parents("form").attr("id");
        var url = $(element).parents("form").attr("action");
        var method = $(element).parents("form").attr("method");
        var formData = new FormData($(element).parents("form")[0]);
        var redirect = $(element).attr('redirect');

        if (confirm("Are You Sure?")) {
            $.ajax({
                async: true,
                url: url,
                type: method,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    blockUI();
                },
                success: function(response) {
                    if (response) {
                        console.log(response.title);

                        if (response.title == 'Success') {
                            $('.common-modal-notify').modal('show');
                            $('.common-modal-notify .modal-title').html(response.title);
                            $('.common-modal-notify .modal-body').html(response.msg);
                        } else {
                            $('.common-modal-notify-error').modal('show');
                            $('.common-modal-notify-error .modal-title').html(response.title);
                            $('.common-modal-notify-error .modal-body').html(response.msg);
                        }
                    }
                },
                complete: function(response) {
                    afterSaveLoadPage(redirect);
                },
                error: function(error) {
                    console.log(error);
                },
            }).done(function() {
                $.unblockUI();
            });
        }
        event.stopImmediatePropagation();
    }
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    // var pusher = new Pusher('ed3d38e6fe2ca09df608', {
    //   cluster: 'ap2'
    // });

    // var channel = pusher.subscribe('my-channel');
    // channel.bind('my-event', function(data) {
    //   alert(JSON.stringify(data));
    // });
