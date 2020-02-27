<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    {* 提示您：调用js_languages.lbi.php *}{include file='library/js_languages.lbi.php'}

</head>

<body>

{* 提示您：调用page_header.lbi.php *}{include file='library/page_header.lbi.php'}

<div class="content">
    <div class="row-fluid edit-page">
        <div class="span12 memcache">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active data-pjax" href='{RC_Uri::url("memadmin/command/init/")}'>{lang key='memadmin::memadmin.Execute_pre'}</a></li>
                <li class="nav-item"><a class="nav-link data-pjax" href='{RC_Uri::url("memadmin/command/telnet/")}'>{lang key='memadmin::memadmin.execute_telnet'}</a></li>
                <li class="nav-item"><a class="nav-link data-pjax" href='{RC_Uri::url("memadmin/command/search/")}'>{lang key='memadmin::memadmin.execute_search'}</a></li>
            </ul>
            <div class="justify-content-center">
                <div class="sub-header corner full-size padding">{lang key='memadmin::memadmin.console'}</div>
                <div class="container corner full-size padding" id="console" style="visibility:visible;display:block;">
                    <pre id="container" style="font-size:11px;overflow:auto;min-height:180px;max-height:500px;" class="full-size live"></pre>
                </div>
                <div class="container corner full-size padding" style="text-align:right;">
                <span style="float:left;">
                    <input class="header loading" type="submit" id="loading" value="Waiting for server response ..."/>
                </span>
                    <input class="header" type="submit" onclick="javascript:executeClear('container')" value="{lang key='memadmin::memadmin.clear'}"/>
                    <input class="header" id="hide" type="submit" onclick="javascript:executeHideShow('console', 'hide');javascript:this.blur();" value="{lang key='memadmin::memadmin.hide'}">
                </div>

                <div class="sub-header corner full-size padding">{lang key='memadmin::memadmin.Execute_pre'} <span class="green">Command</span></div>
                <div class="container corner full-size padding">
                    <table>
                        <tr valign="top">
                            <td class="size-1 padding" >
                                <div class="line text-center">
                                    <h6>{lang key='memadmin::memadmin.Execute_ser'}</h6>
                                    <hr/>
                                </div>
                                <form class="form-horizontal" onsubmit="return false" action="">
                                    <div class="jumbotron " style="background: #ffffff">
                                        <ul class="nav nav-tabs" >
                                            <li class="nav-item"><a class="nav-link active data-pjax"  data-toggle="toggle-command" href='javascript:;' data-val="get">Get</a></li>
                                            <li class="nav-item"><a class="nav-link data-pjax"  data-toggle="toggle-command" href='javascript:;' data-val="set">Set</a></li>
                                            <li class="nav-item"><a class="nav-link data-pjax"  data-toggle="toggle-command" href='javascript:;' data-val="delete">Delete</a></li>
                                            <li class="nav-item"><a class="nav-link data-pjax"  data-toggle="toggle-command" href='javascript:;' data-val="increment">Increment</a></li>
                                            <li class="nav-item"><a class="nav-link data-pjax"  data-toggle="toggle-command" href='javascript:;' data-val="decrement">Decrement</a></li>
                                            <li class="nav-item"><a class="nav-link data-pjax"  data-toggle="toggle-command" href='javascript:;' data-val="flush_all">Flush All</a></li>
                                        </ul>
                                        <div id="div_key" class="line form-group " style="display:none;">
                                            <span class="left">Key</span>
                                            <span class="right">
                                                 <input class="form-control" id="request_key"/>
                                            </span>
                                        </div>
                                        <div id="div_duration" class="line form-group" style="display:none;">
                                            <span class="left">有效期</span>
                                            <span class="right">
                                            <input class="form-control" id="request_duration"/>
                                            </span>
                                        </div>
                                        <div id="div_value" class="line form-group " style="display:none;">
                                            <span class="left">Value</span>
                                            <span class="right">
                                                <input class="form-control" id="request_value"/>
                                             </span>
                                        </div>
                                        <div id="div_data" class="line form-group " style="display:none;">
                                            <span class="left">数据</span>
                                            <span class="right">
                                                <textarea class="form-control" id="request_data" rows="2"></textarea>
                                            </span>
                                        </div>
                                        <div id="div_delay" class="line form-group" style="display:none;">
                                            <span class="left">Delay</span>
                                            <span class="right">
                                                <input class="form-control" id="request_delay"/>
                                            </span>
                                        </div>
                                        <div class="line">
                                            <span class="left">{lang key='memadmin::memadmin.scon_conser'}</span>
                                            <span class="right">
                                                {$request_server}
                                            </span>
                                        </div>
                                        <div class="line">
                                            <span class="left">API</span>
                                            <span class="right">
                                                {$request_api}
                                            </span>
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <input role="button" class="btn btn-danger" type="submit" id="execute_command"
                                               value="{lang key='memadmin::memadmin.execute_cmd'}"
                                               data-url="{$command_url}"/>
                                </form>
                            </td>
                            <td class="padding border-left border-white">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline">
                                        <h3> {lang key='memadmin::memadmin.Available_com'} :</h3>
                                    </li>
                                        <ul>
                                            <li class="list-inline">Get : {lang key='memadmin::memadmin.get_info'}</li>
                                            <li class="list-inline">Set : {lang key='memadmin::memadmin.set_info'}</li>
                                            <li class="list-inline">Delete : {lang key='memadmin::memadmin.del_info'}</li>
                                            <li class="list-inline">Increment : {lang key='memadmin::memadmin.inc_info'}</li>
                                            <li class="list-inline">Decrement : {lang key='memadmin::memadmin.dec_info'}</li>
                                            <li class="list-inline">Flush All : {lang key='memadmin::memadmin.flush_info'}</li>
                                        </ul>
                                    </ul>
                                <br/>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        ecjia.admin.admin_command.execute_command();
    </script>
</div>

{* 提示您：调用page_footer.lbi.php *}{include file='library/page_footer.lbi.php'}

</body>
</html>