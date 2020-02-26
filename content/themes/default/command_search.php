<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    {* 提示您：调用js_languages.lbi.php *}{include file='statics/library/js_languages.lbi.php'}
    <script type="text/javascript">

    </script>
    <script src="{$theme_url}statics/script/Highcharts/highcharts.js"></script>
</head>

<body>
{* 提示您：调用page_header.lbi.php *}{include file='statics/library/page_header.lbi.php'}

<div class="content">
    <div class="row-fluid edit-page">
        <div class="span12 memcache">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link data-pjax" href='{RC_Uri::url("memadmin/command/init/")}'>{lang key='memadmin::memadmin.Execute_pre'}</a></li>
                <li class="nav-item"><a class="nav-link data-pjax" href='{RC_Uri::url("memadmin/command/telnet/")}'>{lang key='memadmin::memadmin.execute_telnet'}</a></li>
                <li class="nav-item"><a class="nav-link active data-pjax" href='{RC_Uri::url("memadmin/command/search/")}'>{lang key='memadmin::memadmin.execute_search'}</a></li>
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


                <div class="sub-header corner full-size padding">{lang key='memadmin::memadmin.search'} <span class="green">Key</span></div>
                <div class="container corner full-size padding">
                    <table>
                        <tr valign="top">
                            <td class="size-1 padding" >
                                <div class="line text-center">
                                    <h6>{lang key='memadmin::memadmin.search_ser'}</h6>
                                    <hr/>
                                </div>
                                <div class="jumbotron " style="background: #ffffff">

                                    <div class="line form-group">
                                        <span class="left">Key</span>
                                        <span class="right">
                                            <input class="form-control" id="search_key" name="search_key"/>
                                        </span>
                                    </div>
                                    <div class="line form-group">
                                        <span class="left">{lang key='memadmin::memadmin.scon_conser'}</span>
                                        <span class="right">
                                            {$search_server}
                                        </span>
                                    </div>
                                    <div class="line form-group">
                                        <span class="left">{lang key='memadmin::memadmin.detail_lev'}</span>
                                        <span class="right">
                                            <select class="form-control" id="search_level">
                                                <option value="full">{lang key='memadmin::memadmin.show_keys_expiration_Size'}</option>
                                                <option value="keys">{lang key='memadmin::memadmin.show_keys'}</option>
                                            </select>
                                        </span>
                                    </div>
                                    <div class="line form-group">
                                        <span class="left">{lang key='memadmin::memadmin.action'}</span>
                                        <span class="right">
                                            <select class="form-control" id="search_more">
                                                <option value="show">{lang key='memadmin::memadmin.search_show_keys'}</option>
                                                <option value="delete">{lang key='memadmin::memadmin.search_delete_keys'}</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class=" text-center">
                                    <input role="button" class="btn btn-danger" type="submit" id="execute_search" value="{lang key='memadmin::memadmin.execute_search'}" data-url="{$search_url}"/>
                                </div>
                            </td>
                            <td class="padding border-left border-white">
                                <h3><span class="red" >{lang key='memadmin::memadmin.warning'} !</span></h3><br/>{lang key='memadmin::memadmin.search_ser2'}
                                <br/>{lang key='memadmin::memadmin.search_ser3'}
                                <br/>
                                <br/>{lang key='memadmin::memadmin.search_ser4'}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        ecjia.admin.admin_command.execute_search();
    </script>
</div>

{* 提示您：调用page_footer.lbi.php *}{include file='statics/library/page_footer.lbi.php'}
</body>