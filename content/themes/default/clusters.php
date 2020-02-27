<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    {* 提示您：调用js_languages.lbi.php *}{include file='library/js_languages.lbi.php'}
</head>
<body>

{* 提示您：调用page_header.lbi.php *}{include file='library/page_header.lbi.php'}

<div class="content">
    <div class="alert alert-danger" role="alert">
        服务器IP地址请输入<span class="alert-link">公网地址</span>，端口请输入<span class="alert-link">数字</span>，否则保存服务器设置会忽略不符合规则的服务器。
    </div>
    <div class="float-right">
            <!-- {if $ur_here}{$ur_here}{/if} -->
            {if $clusters_url}
            <button class="btn  btn-outline-dark plus_or_reply data-pjax"
                    href="#addCluster" data-toggle="modal"  data-target="#addClusterModal" data-type="add" id="sticky_a">
                <i class="fontello-icon-plus"></i>{$clusters_url.text}
            </button>
            {/if}
    </div>
    <div class="clearfix"></div>
    <div class="row-fluid edit-page">
        <ul class="nav nav-tabs">
            {foreach $clusterlists as $value}
            <li class="nav-item">
                {if $value eq $cluster}
                <a class="nav-link data-pjax active" >{$value}</a>
                {else}
                <a class="nav-link data-pjax" href='{RC_Uri::url("memadmin/clusters/init/")}&cluster={$value}'>{$value}</a>
                {/if}
            </li>
            {/foreach}
        </ul>
        <div class="span12">
            <div class="step"></div>
            <form class="form-horizontal" method="post" action="{$save_servers}" name="theForm">
                <fieldset>
                <div>
                    <div class="float-left">
                        <h3>{lang key='memadmin::memadmin.servers_list'}</h3>
                        <h3>{lang key='memadmin::memadmin.default_hostname_port'}</h3>
                    </div>
                    <div class="float-right my-1"
                            <!-- {if $cluster neq $defaultcluster} -->
                            <button type="button" class="btn btn-danger"
                                    data-toggle="modal" data-target="#delete_clusterModal"
                                    title="{lang key='system::system.drop'}">
                                {lang key='memadmin::memadmin.cluster_delete_cluster'}</button>
                            <!-- {/if} -->
                    </div>
                    <div class="clearfix"></div>
                    <div class="heading"></div>
                    <div id="server_form" class="container">
                        <div id="cluster" class="form-group">
                            <div class="form-inline" >
                                <div class="col-sm-3 my-1">{lang key='memadmin::memadmin.cluster_name'}</div>
                                <div class="col-sm-3 my-1">{lang key='memadmin::memadmin.cluster_ip_hostname'}</div>
                                <div class="col-sm-3 my-1">{lang key='memadmin::memadmin.cluster_port'}</div>
                            </div>
                            <!-- {$server_id=0} -->
                            <!-- {foreach $servers as $name => $server} -->
                            <!-- {$server_id=$server_id+1} -->
                            <div id="server_{$server_id}" >
                                <div class="form-inline" >
                                    <div class="col-3">
                                        <input class="form-control " type="text"  name="server[{$server_id}][name]"
                                               value="{$name}"
                                               id="name_{$server_id}"
                                               onchange="nameOnChange({$server_id})"/>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control " type="text" name="server[{$server_id}][hostname]"
                                               value="{$server.hostname}"
                                               id="host_{$server_id}"
                                               {if ($name eq {$server.hostname|cat:"---"|cat:$server.port}) }
                                        onchange="hostOrPortOnChange({$server_id})"
                                        onKeyUp="hostOrPortOnChange({$server_id})"
                                        {/if}
                                        onfocus="hostOnFocus(this)"
                                        onblur="hostOnBlur(this)"/>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text"  name="server[{$server_id}][port]"
                                               value="{$server.port}"
                                               id="port_{$server_id}"
                                               {if ($name eq {$server.hostname|cat:"---"|cat:$server.port}) }
                                        onchange="hostOrPortOnChange({$server_id})"
                                        onKeyUp="hostOrPortOnChange({$server_id})"
                                        {/if}
                                        onfocus="portOnFocus(this)"
                                        onblur="portOnBlur(this)"/>
                                    </div>
                                    <div class="col-3">
                                        <a role="button" class="btn btn-danger btn-sm" href="#" onclick="deleteServerOrCluster('server_{$server_id}')">
                                            {lang key='memadmin::memadmin.cluster_delete'}
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <!-- {foreachelse} -->
                            <div id="server_{$server_id}">
                                <div class="form-inline" >
                                    <div class="col-3">
                                        <input class="form-control" type="text"  name="server[{$server_id}][name]"
                                               placeholder="主机名：端口"
                                               id="name_{$server_id}"
                                               onchange="nameOnChange({$server_id})"/>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="server[{$server_id}][hostname]"
                                               placeholder="主机名"
                                               id="host_{$server_id}"
                                               {if ($name neq {$server.hostname|cat:"---"|cat:$server.port}) }
                                        onchange="hostOrPortOnChange({$server_id})"
                                        onKeyUp="hostOrPortOnChange({$server_id})"
                                        {/if}
                                        onfocus="hostOnFocus(this)"
                                        onblur="hostOnBlur(this)"/>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text"  name="server[{$server_id}][port]"
                                               placeholder="端口"
                                               id="port_{$server_id}"
                                               {if ($name neq {$server.hostname|cat:"---"|cat:$server.port}) }
                                        onchange="hostOrPortOnChange({$server_id})"
                                        onKeyUp="hostOrPortOnChange({$server_id})"
                                        {/if}
                                        onfocus="portOnFocus(this)"
                                        onblur="portOnBlur(this)"/>
                                    </div>
                                    <a role="button" class="btn btn-danger btn-sm"  href="#" onclick="deleteServerOrCluster('server_{$server_id}')">{lang key='memadmin::memadmin.cluster_delete'}</a>
                                </div>
                            </div>
                            <!-- {/foreach} -->
                            <div id="cluster_commands" class="form-group my-3">
                                <a role="button" class="btn btn-warning" href="javascript:addServer()">{lang key='memadmin::memadmin.cluster_add_server_cluster'}</a>
                                <button class="btn btn-primary" type="submit">{lang key='memadmin::memadmin.save_server_configure'}</button>
                                <input type="hidden" name="cluster" value="{$cluster}" />
                            </div>
                        </div>
                        <script type="text/javascript">var server_id = {$server_id};</script>

                    </div>
                </fieldset>
            </form>
        </div>
    </div>


    <!-- 新建集群模拟态 -->
    <div class="modal fade" id="addClusterModal" tabindex="-1" role="dialog" aria-labelledby="addClusterLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="form-horizontal" method="post" action="{$add_cluster}" name="addCluster">
                <fieldset>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addClusterModalLabel">新增集群</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">新增集群名：</label>
                                <div class="col-sm-8 form-inline">
                                    <input class="form-control" type="text" name="newcluster" value="" >
                                    <span class="input-must">*</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                            <button type="button" class="btn btn-primary">确定</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <!-- 删除集群模拟态 -->
    <div class="modal fade" id="delete_clusterModal" tabindex="-1" role="dialog" aria-labelledby="delete_clusterModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="form-horizontal" method="post" action="{$remove_cluster}" name="delete_cluster">
                <fieldset>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="delete_clusterLabel">删除集群</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            该操作将删除该集群下的所有服务器，是否继续操作？
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                            <button type="button" class="btn btn-danger">确定</button>
                        </div>
                    </div>
                    <fieldset>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        ecjia.admin.admin_clusters.init();
        ecjia.admin.admin_clusters.addCluster();
        ecjia.admin.admin_clusters.delete_cluster();
    </script>
</div>

{* 提示您：调用page_footer.lbi.php *}{include file='library/page_footer.lbi.php'}

</body>
</html>