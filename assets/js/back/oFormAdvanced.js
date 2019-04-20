var oFormAdvanced = {
    cropper:{
        data: null,
        fileReader: null,
        files: null,
        file: null
    },
    init: function () {

        $(document).ready(function () {

            if ($(".image-crop > img").html() != undefined) {

                var $image = $(".image-crop > img");

                $($image).cropper({
                    aspectRatio: 1.618,
                    preview: ".img-preview",
                    done: function (data) {
                        oFormAdvanced.cropper.data = data;
                        // Output the result data for cropping image.
                    }
                });

                var $inputImage = $('[type="file"]');

                if (window.FileReader) {
                    $inputImage.change(function () {
                        var fileReader = new FileReader(),
                            files = this.files,
                            file;


                        if (files !== undefined) {
                            if (!files.length) {
                                return;
                            }
                        } else {
                            return;
                        }

                        file = files[0];


                        if (/^image\/\w+$/.test(file.type)) {
                            console.log(file);

                            oFormAdvanced.cropper.fileReader = fileReader;
                            oFormAdvanced.cropper.files = files;
                            oFormAdvanced.cropper.file = file;
                            oFormAdvanced.cropper.file.x = oFormAdvanced.cropper.data.x;
                            oFormAdvanced.cropper.file.y = oFormAdvanced.cropper.data.y;
                            oFormAdvanced.cropper.file.fix_height = oFormAdvanced.cropper.data.height;
                            oFormAdvanced.cropper.file.fix_width = oFormAdvanced.cropper.data.width;

                            fileReader.readAsDataURL(file);
                            fileReader.onload = function () {
                                $inputImage.val("");
                                $image.cropper("reset", true).cropper("replace", this.result);
                            };
                        } else {
                            showMessage("Please choose an image file.");
                        }
                    });
                } else {
                    $inputImage.addClass("hide");
                }

                $("#download").click(function () {
                    window.open($image.cropper("getDataURL"));
                });

                $("#zoomIn").click(function () {
                    $image.cropper("zoom", 0.1);
                });

                $("#zoomOut").click(function () {
                    $image.cropper("zoom", -0.1);
                });

                $("#rotateLeft").click(function () {
                    $image.cropper("rotate", 45);
                });

                $("#rotateRight").click(function () {
                    $image.cropper("rotate", -45);
                });

                $("#setDrag").click(function () {
                    $image.cropper("setDragMode", "crop");
                });

                $('.datepicker').closest('div').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: true,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true,
                    format: "yyyy-mm-dd"
                });

                $('#data_1 .input-group.date').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });

                $('#data_2 .input-group.date').datepicker({
                    startView: 1,
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true,
                    format: "yyyy-mm-dd"
                });

                $('#data_3 .input-group.date').datepicker({
                    startView: 2,
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true
                });

                $('#data_4 .input-group.date').datepicker({
                    minViewMode: 1,
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true,
                    todayHighlight: true
                });

                $('#data_5 .input-daterange').datepicker({
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true
                });

                var elem = document.querySelector('.js-switch');
                var switchery = new Switchery(elem, {color: '#1AB394'});

                var elem_2 = document.querySelector('.js-switch_2');
                var switchery_2 = new Switchery(elem_2, {color: '#ED5565'});

                var elem_3 = document.querySelector('.js-switch_3');
                var switchery_3 = new Switchery(elem_3, {color: '#1AB394'});
            }

            if ($('.i-checks').html() != undefined) {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green'
                });
            }

            if ($('.demo1').html() != undefined) {
                $('.demo1').colorpicker();
            }

            if ($('.back-change').html() != undefined) {
                var divStyle = $('.back-change')[0].style;
                $('#demo_apidemo').colorpicker({
                    color: divStyle.backgroundColor
                }).on('changeColor', function (ev) {
                    divStyle.backgroundColor = ev.color.toHex();
                });
            }

            if ($('.clockpicker').html() != undefined) {
                $('.clockpicker').clockpicker();
            }

            if ($('input[name="daterange"]').html() != undefined) {
                $('input[name="daterange"]').daterangepicker();
            }

            if ($('#reportrange').html() != undefined) {
                $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

                $('#reportrange').daterangepicker({
                    format: 'MM/DD/YYYY',
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '2012-01-01',
                    maxDate: '2015-12-01',
                    dateLimit: {days: 60},
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'right',
                    drops: 'down',
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-primary',
                    cancelClass: 'btn-default',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Submit',
                        cancelLabel: 'Cancel',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        firstDay: 1
                    }
                }, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                });

            }
            oFormAdvanced.config();
        });
    },

    config: function () {
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "95%"}
        }
        for (var selector in config) {
            if (typeof $(selector).chosen == 'function') {
                $(selector).chosen(config[selector]);
            }
        }

        if ($("#ionrange_1").html() != undefined) {
            $("#ionrange_1").ionRangeSlider({
                min: 0,
                max: 5000,
                type: 'double',
                prefix: "$",
                maxPostfix: "+",
                prettify: false,
                hasGrid: true
            });
        }

        if ($("#ionrange_2").html() != undefined) {
            $("#ionrange_2").ionRangeSlider({
                min: 0,
                max: 10,
                type: 'single',
                step: 0.1,
                postfix: " carats",
                prettify: false,
                hasGrid: true
            });
        }

        if ($("#ionrange_3").html() != undefined) {
            $("#ionrange_3").ionRangeSlider({
                min: -50,
                max: 50,
                from: 0,
                postfix: "°",
                prettify: false,
                hasGrid: true
            });
        }

        if ($("#ionrange_4").html() != undefined) {
            $("#ionrange_4").ionRangeSlider({
                values: [
                    "January", "February", "March",
                    "April", "May", "June",
                    "July", "August", "September",
                    "October", "November", "December"
                ],
                type: 'single',
                hasGrid: true
            });
        }

        if ($("#ionrange_5").html() != undefined) {
            $("#ionrange_5").ionRangeSlider({
                min: 10000,
                max: 100000,
                step: 100,
                postfix: " km",
                from: 55000,
                hideMinMax: true,
                hideFromTo: false
            });
        }

        if ($(".dial").html() != undefined) {
            $(".dial").knob();
        }

        if ($("#basic_slider").html() != undefined) {
            $("#basic_slider").noUiSlider({
                start: 40,
                behaviour: 'tap',
                connect: 'upper',
                range: {
                    'min': 20,
                    'max': 80
                }
            });
        }

        if ($("#range_slider").html() != undefined) {
            $("#range_slider").noUiSlider({
                start: [40, 60],
                behaviour: 'drag',
                connect: true,
                range: {
                    'min': 20,
                    'max': 80
                }
            });
        }

        if ($("#drag-fixed").html() != undefined) {
            $("#drag-fixed").noUiSlider({
                start: [40, 60],
                behaviour: 'drag-fixed',
                connect: true,
                range: {
                    'min': 20,
                    'max': 80
                }
            });
        }
    }
};