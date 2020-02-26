// JavaScript Document
;(function (app, $) {
    const toast = Swal.mixin({
        type: 'success',
        allowEscapeKey: false,
        allowOutsideClick: false,
        confirmButtonText: '确定'
    });

    app.admin_monitor = {
        init: function () {
            var $form = $("form[name='live_stats']");
            $form.find("button:last").off('click').on('click',function(){
                url = $form.attr('action');
                postdata = {
                    refresh_rate: $("input[name='refresh_rate']").val(),
                    memory_alert: $("input[name='memory_alert']").val(),
                    hit_rate_alert: $("input[name='hit_rate_alert']").val(),
                    eviction_alert: $("input[name='eviction_alert']").val(),
                };
                $.post(url, postdata, function (data) {
                    newdata = JSON.parse(data);
                    toast({
                        text: newdata.msg,
                    }).then((result) => {
                        if (result.value) {
                            window.location = newdata.url;
                        }
                    })
                });
            });
        },
        api: function () {
            var $form = $("form[name='miscellaneous']");
            $form.find("button:last").off('click').on('click',function(){
                url = $form.attr('action');
                postdata = {
                    connection_timeout: $("input[name='connection_timeout']").val(),
                    max_item_dump: $("input[name='max_item_dump']").val(),
                };
                $.post(url, postdata, function (data) {
                    newdata = JSON.parse(data);
                    toast({
                        text: newdata.msg,
                    }).then((result) => {
                        if (result.value) {
                            window.location = newdata.url;
                        }
                    })
                });
            });
        }
    };

})(ecjia.admin, jQuery);

function ajax(url, target) {
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            ajaxDone(target);
        };
        req.open("POST", url, true);
        req.send(null);
    } else if (window.ActiveXObject) {
        req = new ActiveXObject('Microsoft.XMLHTTP');
        if (req) {
            req.onreadystatechange = function() {
                ajaxDone(target);
            };
            req.open("POST", url, true);
            req.send();
        }
    }
    setTimeout("ajax(page, 'stats')", timeout);
}
function ajaxDone(target) {
    if (req.readyState == 4) {
        if (req.status == 200 || req.status == 304) {
            results = req.responseText;
            document.getElementById(target).innerHTML = results;
        } else {
            document.getElementById(target).innerHTML = "Loading stats error : "
                + req.statusText;
        }
    }
}