<nav class="navbar navbar-dark navbar-expand-md navbar-light " id="header" style="background-color: #3498db">
    <div class="container">
        <a class="navbar-brand" href='{RC_Uri::url("memadmin/server/init/")}'>
            <img src='{$theme_url}statics/images/logo.png' width="auto" height="30" class="d-inline-block align-top" alt="">
            Memcache Admin
        </a>
        <span class="navbar-text">Memcache的管理工具</span>

        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>


        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav form-inline" >
                {foreach $memadmingroup as $group}
                <li class="nav-item mr-1">
                    <a  role="button" class="btn btn-outline-light {if $group.name eq $service}active{/if}" href='{$group.url}'>
                        {$group.title}
                    </a>
                </li>
                {/foreach}
                <li class="nav-item">
                    <a  class="btn btn-sm btn-danger" role="button" href='{RC_Uri::url("memadmin/index/logout/")}'>
                        <img src='{$theme_url}statics/images/computer.png' width="30px" height="30px" alt="">
                        |&nbsp&nbsp退出登陆
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="clearfix"></div>