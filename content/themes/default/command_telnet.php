<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    {* 提示您：调用js_languages.lbi.php *}{include file='library/js_languages.lbi.php'}
    <script type="text/javascript">

    </script>
    <script src="{$theme_url}statics/script/Highcharts/highcharts.js"></script>
</head>

<body>
{* 提示您：调用page_header.lbi.php *}{include file='library/page_header.lbi.php'}

<div class="content">
    <div class="row-fluid edit-page">
        <div class="span12 memcache">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link data-pjax" href='{RC_Uri::url("memadmin/command/init/")}'>{lang key='memadmin::memadmin.Execute_pre'}</a></li>
                <li class="nav-item"><a class="nav-link active data-pjax" href='{RC_Uri::url("memadmin/command/telnet/")}'>{lang key='memadmin::memadmin.execute_telnet'}</a></li>
                <li class="nav-item"><a class="nav-link data-pjax" href='{RC_Uri::url("memadmin/command/search/")}'>{lang key='memadmin::memadmin.execute_search'}</a></li>
            </ul>
            <div class="justify-content-center">
                <div class="sub-header corner full-size padding">{lang key='memadmin::memadmin.console'}</div>
                <div class="container corner full-size padding" id="console" style="visibility:visible;display:block;">
                    <pre id="container" style="font-size:11px;overflow:auto;min-height:180px;max-height:500px;" class="full-size live"></pre>
                </div>
                <div class="container corner full-size padding" style="text-align:right;">
                <span class="float-left">
                    <input class="header loading" type="submit" id="loading" value="Waiting for server response ..."/>
                </span>
                    <input class="header" type="submit" onclick="javascript:executeClear('container')" value="{lang key='memadmin::memadmin.clear'}"/>
                    <input class="header" id="hide" type="submit" onclick="javascript:executeHideShow('console', 'hide');javascript:this.blur();" value="{lang key='memadmin::memadmin.hide'}">
                </div>

                <div class="sub-header corner full-size padding">{lang key='memadmin::memadmin.Execute_tel'} <span class="green">Commands</span></div>
                <div class="container corner full-size padding">
                    <table>
                        <tr valign="top">
                            <td class="size-1 padding" >
                                <div class="line text-center">
                                    <h6>{lang key='memadmin::memadmin.telnet_ser'}</h6>
                                    <hr/>
                                </div>
                                <form class="form-horizontal" onsubmit="return false">
                                    <div class="jumbotron " style="background: #ffffff">
                                        <div class="line form-group">
                                            <span class="left">内容</span>
                                            <span class="right">
                                            <textarea class="form-control" id="request_telnet" rows="3"></textarea>
                                            </span>
                                        </div>
                                        <div class="line form-group">
                                            <span class="left">{lang key='memadmin::memadmin.scon_conser'}</span>
                                            <span class="right">
                                                {$request_telnet_server}
                                            </span>
                                        </div>
                                    </div>
                                    <div class=" text-center">
                                        <input role="button" class="btn btn-danger" type="submit" id="execute_telnet" value="{lang key='memadmin::memadmin.execute_telnet'}" data-url="{$telnet_url}"/>
                                    </div>
                                </form>
                            </td>
                            <td class="padding border-left border-white">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline my-auto">{lang key='memadmin::memadmin.telnet_ser2'}</li>
                                    <li class="list-inline my-auto">{lang key='memadmin::memadmin.telnet_ser3'}</li>
                                    <li class="list-inline my-lg-5">{lang key='memadmin::memadmin.telnet_ser4'}<a href="http://github.com/memcached/memcached/blob/master/doc/protocol.txt" target="_blank"><span class="green">here</span></a></li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        ecjia.admin.admin_command.execute_telnet();
    </script>
</div>

{* 提示您：调用page_footer.lbi.php *}{include file='library/page_footer.lbi.php'}

</body>
</html>