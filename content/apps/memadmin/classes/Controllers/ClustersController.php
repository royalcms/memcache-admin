<?php

define('APP_NAME', 'MEMADMIN');
define('APP_VERSION', '2.0');

RC_Session::start();

class clustersController extends Royalcms\Component\Routing\Controller
{

    protected $view;

    function __construct()
    {
        header('content-type: text/html; charset=' . RC_CHARSET);
        header('Expires: Fri, 14 Mar 1980 20:53:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-cache, must-revalidate');
        header('Pragma: no-cache');

        define('API_DEBUG', false);

        $this->view = royalcms('view')->getSmarty();
        // 模板目录
        $this->view->setTemplateDir(SITE_THEME_PATH . RC_Theme::get_template() . DIRECTORY_SEPARATOR);
        $this->view->addPluginsDir(SITE_THEME_PATH . RC_Theme::get_template() . DIRECTORY_SEPARATOR . 'smarty' . DIRECTORY_SEPARATOR);
        $this->view->assign('theme_url', RC_Theme::get_template_directory_uri() . '/');

        $memadmingroup = config('app-memadmin::memadmingroup');
        $this->view->assign('memadmingroup',    $memadmingroup);
        $this->view->assign('service',          'clusters');
    }

    public function init()
    {
        $this->view->assign('clusters_url', array('text' => RC_Lang::get('memadmin::memadmin.cluster_add_server'), 'href' => RC_Uri::url('memadmin/clusters/init')));

        $this->view->assign('add_cluster', RC_Uri::url('memadmin/clusters/add_cluster'));

        $clusterlists   = Ecjia\App\Memadmin\MemcacheServer::singleton()->getAllClusters();

        $cluster        =  royalcms('request')->input('cluster', Ecjia\App\Memadmin\MemcacheServer::DEFAULT_CLUSTER);

        $servers        = Ecjia\App\Memadmin\MemcacheServer::singleton()->getAllServers($cluster);
//dd($clusterlists);
        $this->view->assign('clusterlists',       $clusterlists);
        $this->view->assign('cluster',            $cluster);
        $this->view->assign('servers',            $servers);
        $this->view->assign('defaultcluster',     Ecjia\App\Memadmin\MemcacheServer::DEFAULT_CLUSTER);

        $this->view->assign('remove_cluster',     RC_Uri::url('memadmin/clusters/remove_cluster', ['cluster' => $cluster]));
        $this->view->assign('save_servers',       RC_Uri::url('memadmin/clusters/save_servers', ['cluster' => $cluster]));

        $this->view->display('clusters.php');
    }

    /**
     * 添加集群处理
     */
    public function add_cluster()
    {
        $newcluster     = royalcms('request')->input('newcluster');

        if( !empty($newcluster))
        {
            Ecjia\App\Memadmin\MemcacheServer::singleton()->addCluster($newcluster);

//        return Ecjia\App\Memadmin\EcjiaController::showmessage('添加集群成功', 0x20 | 0x01, array('pjaxurl' => RC_Uri::url('memadmin/clusters/init', ['cluster' => $newcluster])));
            $data =  array(
                'msg'   => '添加集群成功',
                'url'   =>  RC_Uri::url('memadmin/clusters/init', ['cluster' => $newcluster]),
            );
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }

    }

    /**
     * 删除集群处理
     */
    public function remove_cluster()
    {
        $cluster    = royalcms('request')->input('cluster');

        if ($cluster == Ecjia\App\Memadmin\MemcacheServer::DEFAULT_CLUSTER) {
//            return Ecjia\App\Memadmin\EcjiaController::showmessage('出错啦，默认集群不可以删除！', 0x20 | 0x00, array('pjaxurl' => RC_Uri::url('memadmin/clusters/init')));
            $data = array(
                'msg'   => '默认集群不可以删除',
                'url'   =>  RC_Uri::url('memadmin/clusters/init'),
            );
            echo json_encode($data,JSON_UNESCAPED_UNICODE);

        }

        Ecjia\App\Memadmin\MemcacheServer::singleton()->removeCluster($cluster);

//        return Ecjia\App\Memadmin\EcjiaController::showmessage('删除集群成功', 0x20 | 0x01, array('pjaxurl' => RC_Uri::url('memadmin/clusters/init')));
        $data =  array(
            'msg'   => '删除集群成功',
            'url'   =>  RC_Uri::url('memadmin/clusters/init'),
        );
        echo json_encode($data,JSON_UNESCAPED_UNICODE);

    }

    /**
     * 保存集群服务器
     */
    public function save_servers()
    {
        $cluster    = royalcms('request')->input('cluster');
        $servers    = royalcms('request')->input('server');

//        if ($cluster == Ecjia\App\Memadmin\MemcacheServer::DEFAULT_CLUSTER) {
//            return Ecjia\App\Memadmin\EcjiaController::showmessage('出错啦，默认集群不可以修改！', 0x20 | 0x00, array('pjaxurl' => RC_Uri::url('memadmin/clusters/init', ['cluster' => $cluster])));
//        }
        $exp = "/^(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$/";
        $nexp = "/^(127\.0\.0\.1)|(localhost)|(10\.\d{1,3}\.\d{1,3}\.\d{1,3})|(172\.((1[6-9])|(2\d)|(3[01]))\.\d{1,3}\.\d{1,3})|(192\.168\.\d{1,3}\.\d{1,3})$/";
        $array      = array();
        foreach ($servers as $data) {
            $reg = preg_match($exp, $data['hostname']);
            $regn = preg_match($nexp, $data['hostname']);
            if(empty($reg) || ! empty($regn) || ! is_numeric( $data['port']))
            {
                continue;
            }
            $array[$data['name']]['hostname'] = $data['hostname'];
            $array[$data['name']]['port'] = $data['port'];
        }

        Ecjia\App\Memadmin\MemcacheServer::singleton()->saveMultiServer($array, $cluster);

        return rc_redirect(RC_Uri::url('memadmin/clusters/init', ['cluster' => $cluster]));
    }

}