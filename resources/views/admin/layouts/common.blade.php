
@push('scripts')
    <script type="text/javascript">
        function init_tooltip(){
            $('[data-toggle="tooltip"]').tooltip('dispose');
            $('[data-toggle="tooltip"]').tooltip({
                  delay: {
                      show: 500,
                      hide: 0
                  }
            });
        }

        $("form input textarea").on("keypress", function(e) {
            return e.keyCode != 13;
        });

        function searchByThis(table) {

            var doneTypingInterval = 800;

            //extraTextMsgCharges();
            clearTimeout(typingTimer);
            typingTimer = setTimeout(function(){  table.draw()}, doneTypingInterval);


        }

        function swalS($msg){
            // swal('Success!', $msg , 'success');
            toastr.success($msg,"Success!")
        }
        function swalI($msg){
            // swal('Info!', $msg , 'info');
            toastr.info($msg,"Info!")
        }
        function swalE($msg){
            // swal('Error!', $msg , 'error');
            toastr.error($msg,"Error!")
        }

        function formSubmit(form,btn_id,card_id,blob,callback){

            // formData = new FormData($('#'+form_id));
            // var form = document.getElementById(form_id); // Find the <form> element
            // var formData = new FormData(form); // Wrap form contents

            // form_id.reportValidity();
            let formData;
            let action;
            if(typeof(form) == 'string') {
                formData = new FormData($('#' + form).get(0));
                action=$('#'+form).attr('action');
            }else{
                formData=form;
                action=formData.get('action');
            }
            // var formDataArray = $('#'+form_id).serializeArray();
            // for(var i = 0; i < formDataArray.length; i++){
            //     var formDataItem = formDataArray[i];
            //     formData.append(formDataItem.name, formDataItem.value);
            // }

            if(blob !== '') {
                for (var key in blob) {
                    let type = 'png';
                    if (blob[key] != null) {
                        if (blob[key].type == 'image/png') {
                            type = 'png';
                        } else if (blob[key].type == 'image/jpeg') {
                            type = 'jpeg';
                        } else if (blob[key].type == 'image/jpg') {
                            type = 'jpg';
                        } else if (blob[key].type == 'image/gif') {
                            type = 'gif';
                        } else if (blob[key].type == 'image/svg') {
                            type = 'svg';
                        }
                        formData.append(key, blob[key], 'image.' + type);
                    }
                }
            }
            // if(blob && blob !== 'undefined'){
            //     formData.append('avatar', blob, 'profile.png');
            // }
            // console.log(blob);
            if(btn_id !== '') {
                $btn = $('#' + btn_id);
                $btn_txt = $btn.html();
                $btn.html($btn.data('loading'));
            }
            if(card_id !== '')
                $('#'+card_id).attr('disabled',true);
            console.log(formData);
            $.ajax({

                method: 'POST',
                url     :action,
                data    :formData,
                processData: false,
                contentType: false,
                success : function(data){
                    console.log(data);

                    if(btn_id !== '')
                        $btn.html($btn_txt);
                    if(card_id !== '')
                        $('#'+card_id).attr('disabled',false);

                    if(data) {
                        if(callback && typeof callback === "function") {
                            callback(data);
                        }else{
                            if(data.error){
                                swalE(data.error);
                            }else{
                                swalS(data);
                            }
                        }
                    }
                    else {
                        swalE('Something went wrong! please try again.');
                    }
                },
                error: function(data){
                    console.log(data);
                    if(data.responseJSON.flag == true){
                        window.location.replace("");
                    }else {
                        if (btn_id !== '')
                            $btn.html($btn_txt);
                            $btn[0].disabled=false;
                        if(data.responseJSON.exception){
                            printErrorMsg([data.responseJSON.message,"Please take a screen shot and send to Technical Support"]);
                            console.log(data.responseJSON);
                        }else{
                            console.log(data.responseJSON.errors);
                            printErrorMsg(data.responseJSON.errors);
                        }
                        $(window).scrollTop(0);
                    }
                }
            })
        }

        function updateData(form_id,btn_id,params){

            $.each(params, function( index, val ) {
                $('#'+ index).val(val);
            });
            $('#'+ btn_id).text('Update');
            if(modal_id !== '')
                $('#'+modal_id).modal('show');
        }

        function deleteData(url,token,table_id) {

            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this!",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
            }).then(function (isConfirm) {
                if (isConfirm) {
                    $.ajax({

                        type: "DELETE",
                        url: url,
                        data: {
                            '_token': token
                        },
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);

                            if (table_id !== '')
                                table_id.draw();

                            if (data)
                                swalS(data);
                            else
                                swalE('Something went wrong!')
                        },
                        error: function (data) {

                        }
                    })
                }
            });
        }

        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }

        function resetForm(form_id) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this!",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
            }).then(function (isConfirm) {
                if (isConfirm) {
                    var block_ele = $('#' + form_id).closest('.card');

                    // Block Element
                    block_ele.block({
                        message: '<div class="ft-refresh-cw icon-spin font-medium-2"></div>',
                        // timeout: 2000, //unblock after 2 seconds
                        overlayCSS: {
                            backgroundColor: '#FFF',
                            cursor: 'wait',
                        },
                        css: {
                            border: 0,
                            padding: 0,
                            backgroundColor: 'none'
                        }
                    });
                    if ($('#' + form_id).trigger("reset")) {
                        $('.select2-reset').val('').trigger('change');
                        let form_elements=document.getElementById(form_id).elements;
                        $('#' + form_id+' img').attr('src','');

                        for(let i=0;i<document.getElementById(form_id).elements.length;i++){
                            console.log(form_elements[i].id);
                            if(form_elements[i].id != ''){
                                $('#'+form_elements[i].id).removeClass('is-invalid');
                                $('#'+form_elements[i].id).removeClass('is-valid');
                            }
                            $('.select2').removeClass('invalid-select');
                        }
                        block_ele.unblock();
                    }
                }
            });
        }
        //-----------------------------------Assign Data To Modal-----------------------------------//
        function updateModalData(form_id,url = null,method = null,modal_id,params = []){

            if(url){
                $('#'+form_id).attr('action',url)
            }
            if(method){
                $('#'+form_id).attr('method',method)
            }
            $.each(params, function( index, val ) {
                var res = val.split(",");
                $('#'+ index ).val(res).trigger('change');
            });

            if(modal_id !== '')
                $('#'+modal_id).modal('show');
        }

        //-----------------------------------Help To Re-Draw Datatables----------------------------------//
        function searchByThis(table) {
            setTimeout( function(){  table.draw()}, 1000);
        }

        //-------------------------------------Form Validation Array-------------------------------------//
        var validate = {
            email: function (input,status) {
                pattern = /^\w+([\+.-]?\w+)*@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z0-9]{2,})(\]?)$/;
                if(!pattern.test(input.val())){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name')+' must be valid.':' must be valid.');
                    status = false;
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
            phone: function (input,status) {
                pattern = /^[+]*[0-9]{2,14}$/i;
                if(!pattern.test(input.val())){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    var letters = /^[A-Za-z]+$/;
                    if(letters.test(input.val())){
                        input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined') ? input.data('field-name') + ' must be only Numbers.' : ' must be only Numbers.');
                    }else {
                        input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined') ? input.data('field-name') + ' must be under 14 digits.' : ' must be under 14 digits.');
                    }
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
            name: function (input,status) {
                pattern = /^[a-zA-Z]{1,50}$/i;
                if(!pattern.test(input.val())){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name')+' must contain alphabets.':' must contain alphabets.');
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
            name_with_space: function (input,status) {
                pattern = /^[a-zA-Z\_\ ]{1,200}$/i;
                if(!pattern.test(input.val())){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name')+' must contain alphabets.':' must contain alphabets.');
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
            name_with_space_numbers: function (input,status) {
                pattern = /^[a-zA-Z0-9\_\ ]{1,200}$/i;
                if(!pattern.test(input.val())){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name')+' Should only Contain Alphabets, Number and Space.':' Should only Contain Alphabets, Number and Space.');
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
            stripe_key: function (input,status) {
                pattern = /^[a-zA-Z0-9\_]{1,500}$/i;
                if(!pattern.test(input.val())){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name')+' Should only Contain Alphabets, Number and Underscore Sign.':' Should only Contain Alphabets, Number and Underscore Sign.');
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
            social_id: function (input,status) {
                pattern = /^\S*$/;
                if(!pattern.test(input.val())){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name')+' Should Not Contain Spaces.':' Should Not Contain Spaces.');
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
            zip_code: function (input,status) {
                pattern = /^[a-zA-Z0-9\_\-]{1,200}$/i;
                if(!pattern.test(input.val())){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name')+' must be less than 10 characters.':' must be less than 10 characters.');
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
            link: function (input,status) {
                pattern = /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;
                if(!pattern.test(input.val())){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name')+' is not a valid link.':' is not a valid link.');
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
            digits: function (input,status) {
                pattern = /^[1-9]\d{0,10}$/i;
                if(!pattern.test(input.val())){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name') +' must be digits.':' must be digits.');

                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
            amount: function (input,status) {
                pattern = /[+-]?([0-9]*[.])?[0-9]+/g;
                if(!pattern.test(input.val())){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name')+' must be a valid amount.':' must be a valid amount.');
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
            date: function (input,status) {
                pattern = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/i;
                if(!pattern.test(input.val())){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name')+' must be according to format.':' must be according to format.');
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
            /*time: function (input,status) {
                alert(input.val());
                pattern = /^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/i;
                if(!pattern.test(input.val())){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name')+' must be according to format.':' must be according to format.');
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            }, */
            starttime: function (input,status,endtime) {
                start=moment(input.val(),'hh:mm A').format('HH:mm');
                end=moment(endtime,'hh:mm A').format('HH:mm');
                if(start > end){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name')+' must be less/equal to End Time.':' must be less/equal to End Time.');
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
            fromdate: function (input,status,todate) {
                start=moment(todate);
                end=moment(input.val());
                if(end >= start){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name')+' must be less / equal to "To Date".':' must be less / equal to "To Date".');
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
            password: function (input,status) {
                pattern = /^([A-z0-9!@#$%^&*().,<>{}[\]<>?_=+\-|;:\'\"\/])*[^\s]\1*$/i;
                if(!pattern.test(input.val())){
                    input.addClass('is-invalid');
                    input.children('span').addClass("invalid-select");
                    status = false;
                    input.siblings('div.invalid-feedback').html((input.data('field-name') !== 'undefined')? input.data('field-name')+' must not contain spaces.':' must not contain spaces.');
                }else{
                    input.removeClass('is-invalid');
                    input.addClass('is-valid');
                    // status = true;
                }
                return status;
            },
        };
        masking();
        function masking(){
            $('.money').mask('z', {translation: {
                    'z': {pattern: /^\d*([.\d]+)?$/, recursive: true}
                }}).attr('maxlength', 8);
            $('.date-mask').mask('00/00/0000');
            $('.phone_us').mask('(000) 000-0000');
            $('.time-mask').mask('00:00:00');
            $('.cc_number').mask('0000000000000000');
            $('.cc_cvv').mask('0000');
            $('.cc_expire').mask('00/00');
            $('.phone_with_ddd').mask('0000000000');
            $('.zip-code').mask('00000');
            $('.amount_mask').mask("000000.00", {reverse: true});
            $('.unit').mask('Z',{translation: {'Z': {pattern: /[a-zA-Z0-9']/, recursive: true}}}).attr('maxlength', 10);
            $('.name').mask('Z',{translation: {'Z': {pattern: /[a-zA-Z\'\.\-\ ]/, recursive: true}}}).attr('maxlength', 56).addClass('capital');
        }
        function textinputcounter() {
            $('.textcount').maxlength({
                alwaysShow: true,
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger",
            });
        }
        textinputcounter();
        function clearDaterange(object, date_range_id) {

            date_range = $('#'+ date_range_id);
            clear_ele = $(object);

            date_range.val('');
            clear_ele.addClass('d-none');
            if (document.getElementById(date_range_id).hasAttribute("required")) {
                date_range.addClass('is-invalid');
            }

        }
        function clearDateFromAndTo() {
            from = null;
            to = null;
        }
        function showClearDaterangeBtn(object ,date_range_id) {

            date_range = $(object);
            clear_ele = $('#'+ date_range_id);

            if(date_range.val()) {
                clear_ele.removeClass('d-none');
            }else{
                clear_ele.addClass('d-none');
            }
        }

        function initializeTinyMacyEditor(id, callback) {
            // Classic TinyMCE
            tinymce.init({
                selector: 'textarea#'+ id,
                height: 200,
                forced_root_block: false,
                plugins: [
                    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
                ],
                toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
                toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
                toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
                menubar: false,
                toolbar_items_size: 'small',
                style_formats: [{
                    title: 'Bold text',
                    inline: 'b'
                }, {
                    title: 'Red text',
                    inline: 'span',
                    styles: {
                        color: '#ff0000'
                    }
                }, {
                    title: 'Red header',
                    block: 'h1',
                    styles: {
                        color: '#ff0000'
                    }
                }, {
                    title: 'Example 1',
                    inline: 'span',
                    classes: 'example1'
                }, {
                    title: 'Example 2',
                    inline: 'span',
                    classes: 'example2'
                }, {
                    title: 'Table styles'
                }, {
                    title: 'Table row 1',
                    selector: 'tr',
                    classes: 'tablerow1'
                }],
                templates: [{
                    title: 'Test template 1',
                    content: 'Test 1'
                }, {
                    title: 'Test template 2',
                    content: 'Test 2'
                }],
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    // '//www.tinymce.com/css/codepen.min.css'
                ],
                setup: callback,
                image_title: true,
                automatic_uploads: true,
                file_picker_types: 'image',
                file_picker_callback: function (cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function () {
                        var file = this.files[0];

                        var reader = new FileReader();
                        reader.onload = function () {
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);
                            cb(blobInfo.blobUri(), { title: file.name });
                        };
                        reader.readAsDataURL(file);
                    };

                    input.click();
                },
            });
        }
    </script>
@endpush
