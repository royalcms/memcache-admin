// JavaScript Document
;(function (app, $) {
    app.admin_command = {

        execute_command: function () {
            $('[data-toggle="toggle-command"]').off('click').on('click', function () {
                var $this = $(this);
                $this.parents('.nav-tabs').find('a').removeClass('active');
                $this.parent().find('a').addClass('active');
                var command = $this.attr('data-val');
                get_command(command);
            });
            get_command();

            $('#execute_command').on('click', function () {
                $("html,body").animate({scrollTop:120}, 500);
                var value = $('#execute_command').val();
                var url = $(this).attr('data-url');
                if (value != '') {
                    var postdata = {
                        request_command: $('form ul li  .active').attr('data-val'),
                        request_key: $('#request_key').val(),
                        request_duration: $('#request_duration').val(),
                        request_value: $('#request_value').val(),
                        request_data: $('#request_data').val(),
                        request_delay: $('#request_delay').val(),
                        request_server: $('#request_server').val(),
                        request_api: $('#request_api').val()
                    };
                    $.post(url, postdata, function (data) {
                        var scrollHeight = $('#container').prop("scrollHeight");
                        $("#container").append(data);
                        $("#container").animate({scrollTop: scrollHeight}, 400);

                    });
                }
            });


        },
        execute_telnet: function () {
            $('#execute_telnet').on('click', function () {
                $("html,body").animate({scrollTop:120}, 500);
                var value = $('#execute_telnet').val();
                var url = $(this).attr('data-url');
                if (value != '') {
                    var postdata = {
                        request_telnet: $('#request_telnet').val(),
                        request_server: $('#request_telnet_server').val()
                    };
                    $.post(url, postdata, function (data) {
                        var scrollHeight = $('#container').prop("scrollHeight");
                        $("#container").append(data);
                        $("#container").animate({scrollTop: scrollHeight}, 400);
                    });
                }
            });
        },
        execute_search: function () {
            $('#execute_search').on('click', function () {
                $("html,body").animate({scrollTop:120}, 500);
                var value = $('#execute_search').val();
                var url = $(this).attr('data-url');
                if (value != '') {
                    var postdata = {
                        request_key: $('#search_key').val(),
                        request_level: $('#search_level').val(),
                        request_more: $('#search_more').val(),
                        request_server: $('#search_server').val()
                    };
                    $.post(url, postdata, function (data) {
                        var scrollHeight = $('#container').prop("scrollHeight");
                        $("#container").append(data);
                        $("#container").animate({scrollTop: scrollHeight}, 400);
                    });
                }
            });

        }
    };

    function get_command(command = 'get') {
        document.getElementById('request_key').value = '';
        document.getElementById('request_duration').value = '';
        document.getElementById('request_data').value = '';
        document.getElementById('request_delay').value = '';
        document.getElementById('request_value').value = '';

        $('#request_key').val('');
        $('#request_duration').val('');
        $('#request_data').val('');
        $('#request_delay').val('');
        $('#request_value').val('');

        var div_key = $('#div_key');
        var div_duration = $('#div_duration');
        var div_data = $('#div_data');
        var div_delay = $('#div_delay');
        var div_value = $('#div_value');

        if (command == 'get' || command == 'delete') {
            div_key.css('display', '');
            div_duration.css('display', 'none');
            div_data.css('display', 'none');
            div_delay.css('display', 'none');
            div_value.css('display', 'none');
        } else if (command == 'set') {
            div_key.css('display', '');
            div_duration.css('display', '');
            div_data.css('display', '');
            div_delay.css('display', 'none');
            div_value.css('display', 'none');
        } else if (command == 'flush_all') {
            div_key.css('display', 'none');
            div_duration.css('display', 'none');
            div_data.css('display', 'none');
            div_delay.css('display', '');
            div_value.css('display', 'none');
        } else if (command == 'increment' || command == 'decrement') {
            div_key.css('display', '');
            div_duration.css('display', 'none');
            div_data.css('display', 'none');
            div_delay.css('display', 'none');
            div_value.css('display', '');
        } else {
            div_key.css('display', 'none');
            div_duration.css('display', 'none');
            div_data.css('display', 'none');
            div_delay.css('display', 'none');
            div_value.css('display', 'none');
        }
    }
})(ecjia.admin, jQuery);

