// JavaScript Document
;(function (app, $) {
    const toast = Swal.mixin({
        type: 'success',
        allowEscapeKey: false,
        allowOutsideClick: false,
        confirmButtonText: '确定'
    });

    app.admin_clusters = {
        init: function () {
            var $form = $("form[name='theForm']");
            $form.find('#cluster_commands').find('button').off('click').on('click',function(e){
                e.preventDefault();
                toast({
                    text: '保存成功',
                }).then((result) => {
                    if (result.value) {
                        $form.submit();
                    }
                })
            });
        },
        addCluster: function () {
            var $form = $("form[name='addCluster']");
            $form.find("button:last").off('click').on('click',function(){
                url = $form.attr('action');
                content = $("input[name='newcluster']").val();
                if(content != ""){
                    postdata = {
                        newcluster: content
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
                }else {
                    Swal({
                        type: 'error',
                        text: '请输入新集群名称',
                        confirmButtonText: '知道了'
                    });
                }
            });
        },

        delete_cluster: function () {
            var $form = $("form[name='delete_cluster']");
            $form.find("button:last").off('click').on('click',function(){
                url = $form.attr('action');
                postdata = {
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

function addServer() {
    var serverDiv = document.createElement('div');
    server_id++;
    serverDiv.innerHTML = '<div class="form-inline my-1">'
        + '<div class="col-3">'
        + '<input class="form-control" type="text"  name="server[' + server_id + '][name]"'
        + '		  placeholder="" id="name_' + server_id + '" onchange="nameOnChange(' + server_id + ') onKeyUp="hostOrPortOnChange(' + server_id + ')""/> '
        + '</div>'
        + '<div class="col-3">'
        + '<input class="form-control" type="text"  name="server[' + server_id + '][hostname]"'
        + '       placeholder="主机名" id="host_' + server_id + '" onfocus="hostOnFocus(this)" onblur="hostOnBlur(this)" '
        + '       onchange="hostOrPortOnChange(' + server_id + ')" onKeyUp="hostOrPortOnChange(' + server_id + ')" /> '
        + '</div>'
        + '<div class="col-3">'
        + '<input class="form-control" type="text"  name="server[' + server_id + '][port]"'
        + '       placeholder="端口" id="port_' + server_id + '" onfocus="portOnFocus(this)" onblur="portOnBlur(this)" '
        + '       onchange="hostOrPortOnChange(' + server_id + ')" onKeyUp="hostOrPortOnChange(' + server_id + ')" /> '
        + '</div>'
        + '<div class="col-3">'
        + '<a class="btn btn-danger btn-sm" href="#" onclick="deleteServerOrCluster(\'server_' + server_id + '\')">删除</a>' + '</div>'
        + '</div>';
    serverDiv.setAttribute('id', 'server_' + server_id);

    document.getElementById('cluster').insertBefore(serverDiv, document.getElementById('cluster_commands'));

}

function deleteServerOrCluster(divID) {
    var div = document.getElementById(divID);
    div.parentNode.removeChild(div);
}

function nameOnChange(target) {
    portObject = document.getElementById('port_' + target);
    portObject.setAttribute("onchange", "return false;");
    hostObject = document.getElementById('host_' + target);
    hostObject.setAttribute("onchange", "return false;");
}

function hostOnFocus(object) {
    if (object.value == 'hostname') {
        object.value = '';
    }
}

function hostOnBlur(object) {
    if (object.value == '') {
        object.value = 'hostname';
    }
}

function hostOnChange(target) {
    document.getElementById(target);
    if (object.value == '') {
        object.value = 'port';
    }
}

function portOnFocus(object) {
    if (object.value == 'port') {
        object.value = '';
    }
}

function portOnBlur(object) {
    if (object.value == '') {
        object.value = 'port';
    }
}

function hostOrPortOnChange(target) {
    nameObject = document.getElementById('name_' + target);
    hostObject = document.getElementById('host_' + target);
    portObject = document.getElementById('port_' + target);
    if ((nameObject.value == '') || ((nameObject.value != hostObject.value + ':' + portObject.value))) {
        nameObject.value = hostObject.value + ':' + portObject.value;
    }
}


