<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    {* 提示您：调用js_languages.lbi.php *}{include file='statics/library/js_languages.lbi.php'}
    <script type="text/javascript">

    </script>
</head>

<body>
{* 提示您：调用page_header.lbi.php *}{include file='statics/library/page_header.lbi.php'}

<div class="content">
<div class="row-fluid edit-page">
    <div class="span12 memcache">
        <div class="step"></div>
        <div class="float-left">
            {$cluster_list}
        </div>
        <div class="float-right">
            <a class="btn plus_or_reply list data-pjax memcache"
               href='{RC_Uri::url("memadmin/server/init/")}&cluster={$cluster}&server={$server}'>
                <i></i>看这个服务器 Stats 统计</a>
        </div>
        <div class="full-size" style="float:left;">
            <div class="sub-header corner padding">Slabs <span class="green">统计</span></div>
            <div class="container corner padding">
                <div class="line">
                    <span class="left">Slabs 使用</span>
                    {$active_slabs}
                </div>
                <div class="line">
                    <span class="left">内存 使用</span>
                    {$total_malloced}
                </div>
                <div class="line">
                    <span class="left">废弃</span>
                    {$total_wasted}
                </div>
            </div>
        </div>

        <div class="full-size" style="float:left;">
            <div class="container corner" style="padding:9px;">
                有关Memcached统计信息的更多信息，请参考Memcached协议。
                <a href="http://github.com/memcached/memcached/blob/master/doc/protocol.txt#L470" target="_blank">
                    <span class="green">here</span>
                </a>
            </div>
        </div>
        <div style="margin-left: auto;margin-right: auto ">
            <table class="full-size" cellspacing="0" cellpadding="0" style="table-layout:fixed">
                <tr>

                    {$actualSlab = 0}

                    <!-- {foreach $slabs as $id => $slab} -->

                   {if is_numeric($id)}

                    {if $actualSlab ge 4}
                </tr>
                <tr>
                    {$actualSlab = 0}
                    {/if}
                    <td {if $actualSlab gt 0} style="padding-left:9px;{/if} valign="top">
                    <div class="sub-header corner padding size-3">Slab {$id} <span class="green">Stats</span>
                        <span style="float:right;">
                            <a href='{RC_Uri::url("memadmin/server/items/")}&server={$server}&amp;show=items&amp;slab={$id}'> Slab Items</a></span>
                    </div>
                    <div class="container corner padding size-3">
                        <div class="line">
                            <span class="left slabs">块大小</span>
                            {$slab.chunk_size}
                        </div>
                        <div class="line">
                            <span class="left slabs">块使用率</span>
                            {$slab.used_chunks}
                            <span class="right">[{$slab.used_chunks_total_chunks}]</span>
                        </div>
                        <div class="line">
                            <span class="left slabs">快总量</span>
                            {$slab.total_chunks}
                        </div>
                        <div class="line">
                            <span class="left slabs">总页数</span>
                            {$slab.total_pages}
                        </div>
                        <div class="line">
                            <span class="left slabs">废弃</span>
                            {$slab.mem_wasted}
                        </div>
                        <div class="line">
                            <span class="left slabs">命中</span>
                            {$slab.request_rate}
                        </div>

                        {if $slab.used_chunks gt 0}
                        <div class="line">
                            <span class="left slabs">已释放</span>
                            {$slab.items_evicted}
                        </div>

                        <!-- <div class="line">
                            <span class="left slabs">Evicted Last</span>

                        </div>
                        <div class="line">
                            <span class="left slabs">Out of Memory</span>

                        </div>
                        <div class="line">
                            <span class="left slabs">Tail Repairs</span>

                        </div> -->

                        {else}

                        <div class="line">
                            <span class="left slabs">Slab 被分配但是是空的</span>
                        </div>
                        {/if}
                    </div>
                    </td>

                    {$actualSlab=$actualSlab+1}
                    {/if}
                    <!-- {/foreach} -->
                    <!-- {for $var=true to $actualSlab lt 4 step $actualSlab} -->
                    <td></td>
                    {$actualSlab=$actualSlab+1}
                    <!-- {/for} -->
                </tr>
            </table>
        </div>
    </div>
</div>
</div>

{* 提示您：调用page_footer.lbi.php *}{include file='statics/library/page_footer.lbi.php'}
</body>