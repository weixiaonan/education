<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'Common.php';
class Flow_path extends Common
{
    public function __construct()
    {
        parent::__construct();
        $this->table        = 'lc_flow';
        $this->base_url     = 'index.php?d=admin&c=Flow_path';
        $this->list_view    = 'flow_path_list';
        $this->edit_view    = 'flow_path_edit';
        $this->datagrid     = 'flow_path';
    }
    public function index()
    {

      $this->load->view('admin/' . $this->list_view);
    }

    public function list_data()
    {
        $title        = $this->input->get_post('title');

        $page_num     = $this->input->get_post('page');
        $page_size    = $this->input->get_post('rows') < 1 ? $this->PAGE_SIZE : $this->input->get_post('rows');
        $start_num    = (($page_num-1)*$page_size) < 0 ? 0 : ($page_num-1)*$page_size;

        $where_str = '1=1 ';


        if($title != '')
        {
            $where_str .= "AND ( name like '%{$title}%'   ) ";
        }

        $sql       = "SELECT * FROM {$this->table} WHERE {$where_str} ORDER BY id DESC limit {$start_num},{$page_size}";
        $count_sql = "SELECT COUNT(*) as num FROM {$this->table} WHERE {$where_str} ";

        $row_num   = $this->loop_model->row_query($count_sql);
        $list      = $this->loop_model->list_query($sql);

        foreach ($list as &$val)
        {
            $val['add_time'] = times($val['add_time'], 1);
            $get_flow_path = "SELECT l.`uid`,GROUP_CONCAT(r.`nickname` ORDER BY orders) as flow_path FROM lc_flowpath l,user r WHERE l.`uid`=r.`id` AND l.`flow_id`={$val['id']}";
            $row = $this->loop_model->row_query($get_flow_path);
            $val['flow_path'] = str_replace(',', '→', $row['flow_path']);

            //查询有多少条申请记录
            $user_flow_sql = "SELECT COUNT(*) as num FROM lc_userflow WHERE flow_id={$val['id']} ";
            $user_flow_row = $this->loop_model->row_query($user_flow_sql);
            $val['user_flow_num'] = $user_flow_row['num'];

        }
        $data = array("total"=>$row_num['num'],"rows"=>$list);
        echo_en($data);
    }

    public function add(){
        $data['form_id'] = $this->datagrid . '_form';
        $this->load->view('admin/' . $this->edit_view, $data);
    }

    public function edit()
    {
        $id    = $this->input->get('id');
        if($id){
            $data['value'] = $this->loop_model->get_id($this->table, $id);
            $get_flow_path = "SELECT l.`uid`,GROUP_CONCAT(l.`uid` ORDER BY orders) as flow_path FROM lc_flowpath l WHERE  l.`flow_id`={$id}";
            $row = $this->loop_model->row_query($get_flow_path);
            $data['flow_path'] = $row['flow_path'];
        }
        $data['form_id'] = $this->datagrid . '_form';
        $this->load->view('admin/' . $this->edit_view, $data);
    }

    public function save()
    {
        $value = $this->input->post('value');
        $id    = $this->input->post('id');
        $time  = time();

        if($id)
        {
            $query = $this->loop_model->update_id($this->table, array('name' => $value['title']), $id);
        }else{
            $id = $this->loop_model->insert($this->table, array('name' => $value['title'], 'add_time' => $time));
        }

        if (!empty($value['path'])) {
            $this->loop_model->delete_where('lc_flowpath', array('flow_id' => $id));
            foreach ($value['path'] as $k=>$v) {
                $data = array();
                $data['uid']      = $v;
                $data['orders']   = $k;
                $data['flow_id']  = $id;
                $data['add_uid']  = $this->userInfo['id'];
                $data['add_time'] = $time;
                $this->loop_model->insert('lc_flowpath', $data);
            }
        }
        json_msg(true, '操作成功！');

    }

    public function del()
    {
        $ids = trim($_REQUEST['id_str']);

        if($ids)
        {
            $ids = explode(',', $ids);
            $query = $this->loop_model->delete_id($this->table, $ids);
            if($query > 0)
            {
                json_msg(true, '操作成功！');
            }else{
                json_msg(false, '操作失败！');
            }
        }
    }

    /*
     * 获取角色列表
     */
    function get_role_list()
    {
        $list = $this->loop_model->list_query("select * from ci_role ");
        echo_en($list);
    }

    /*
    * 获取系统用户列表
    */
    function get_user_list()
    {
        $list = $this->loop_model->list_query("select * from user ");
        echo_en($list);
    }

    /*
     * 获取申请流程列表
     */
    function get_flow()
    {
        $list = $this->loop_model->list_query("select * from lc_flow ORDER BY id DESC ");
        echo_en($list);
    }

    /*
     *在线申请
     */
    function online_apply()
    {
        $data = array();
        $this->datagrid = 'online_apply';
        $this->base_url = 'index.php?d=admin&c=Flow_path';
        $this->load->view('admin/online_apply_list', $data);
    }

    /*
     *
     */
    function online_apply_data()
    {
        $title        = $this->input->get_post('title');

        $page_num     = $this->input->get_post('page');
        $page_size    = $this->input->get_post('rows') < 1 ? $this->PAGE_SIZE : $this->input->get_post('rows');
        $start_num    = (($page_num-1)*$page_size) < 0 ? 0 : ($page_num-1)*$page_size;


        if ($this->userInfo['id'] != 1){
            $where_str = " uid={$this->userInfo['id']} ";
        } else {
            $where_str = " 1=1 ";
        }

        if($title != '')
        {

            if ($this->userInfo['id'] != 1){
                $where_str .= "AND   content like '%{$title}%'  OR ( flow_id IN(select id FROM lc_flow where name like '%{$title}%'  ) ) ";
            } else {
                $where_str .= "AND   content like '%{$title}%'  OR ( flow_id IN(select id FROM lc_flow where name like '%{$title}%'  ) AND uid={$this->userInfo['id']} ) ";
            }
        }

        $sql       = "SELECT * FROM lc_userflow WHERE {$where_str} ORDER BY id DESC limit {$start_num},{$page_size}";
        $count_sql = "SELECT COUNT(*) as num FROM lc_userflow WHERE {$where_str} ";

        $row_num   = $this->loop_model->row_query($count_sql);
        $list      = $this->loop_model->list_query($sql);

        foreach ($list as &$val)
        {
            $val['add_time'] = times($val['add_time'], 1);
            $flow = $this->loop_model->row_query("select * from lc_flow WHERE id={$val['flow_id']}");
            $val['title'] = $flow['name'];
            $get_flow_path = "SELECT l.`uid`,GROUP_CONCAT(r.`name` ORDER BY orders) as flow_path FROM lc_flowpath l,ci_role r WHERE l.`uid`=r.`id` AND l.`flow_id`={$val['id']}";
         //   $row = $this->loop_model->row_query($get_flow_path);
           // $val['flow_path'] = str_replace(',', '→', $row['flow_path']);
            //查找申请人姓名
            $user_sql = " select * from user WHERE id={$val['uid']}";
            $user = $this->loop_model->row_query($user_sql);
            if ($user) $val['apply_name'] = $user['nickname'];

            //审批记录
            $flowpath_txt  = '';
            $flowpath_sql  = " SELECT f.*,u.* FROM lc_flowpath f, `user` u WHERE f.flow_id={$val['flow_id']} AND f.`uid`=u.`id`  ORDER BY orders";
            $flowpath_list = $this->loop_model->list_query($flowpath_sql);
            foreach ($flowpath_list as &$v)
            {
                //判断是否审批了的
                $is_pass_sql = "SELECT ur.*,u.nickname FROM lc_userflow_review ur, `user` u WHERE ur.`userflow_id`={$val['id']} AND orders={$v['orders']} AND ur.`review_uid`=u.`id`";
                $is_pass = $this->loop_model->row_query($is_pass_sql);
                if ($is_pass) {
                    $flowpath_txt .= $v['nickname'] . '(<span style=\'color:green\'>审批通过：'. $is_pass['nickname'] . ' ' . times($is_pass['review_time'], 1) .'</span>) → ' ;
                } else {
                    $flowpath_txt .= $v['nickname'] . '(等待审批) → ' ;
                }

            }

            $val['flowpath_txt'] = trim($flowpath_txt, '→ ');

            $status = '等待审批';
            if ($val['towhere'] > 0){
                $status = "<span style='color:blue'>审批中</span>";
            }
            if ($val['isok'] > 0)    $status = "<span style='color:green'>审批通过</span>";
            $val['status'] = $status;

        }
        $data = array("total"=>$row_num['num'],"rows"=>$list);
        echo_en($data);
    }

    function add_apply()
    {
        $data['form_id'] = 'online_apply_form';
        $this->load->view('admin/apply_edit', $data);
    }

    function edit_apply()
    {
        $id = $this->input->post_get('id');
        if ($id) {
            $row = $this->loop_model->get_id('lc_userflow', $id);
            //判断是否进入审批流程
            if ($row['towhere'] > 0 ) {
                json_msg(false, '已经进入审批流程，无法修改！');
            }
            $data['value'] = $row;
            $this->load->view('admin/apply_edit', $data);
        }
    }

    function save_apply()
    {
        $value = $this->input->post('value');
        $id    = $this->input->post('id');
        $time  = time();

        if($id)
        {
            $query = $this->loop_model->update_id('lc_userflow', array('name' => $value['title']), $id);
        }else{
            $value['uid']      = $this->userInfo['id'];
            $value['isok']     = 0;
            $value['towhere']  = 0;
            $value['add_time'] = $time;
            $query = $this->loop_model->insert('lc_userflow', $value);
        }


        if($query > 0)
        {
            json_msg(true, '操作成功！');
        }else{
            json_msg(false, '操作失败！');
        }
    }

    public function del_apply()
    {
        $ids = trim($_REQUEST['id_str']);

        if($ids)
        {
            $ids = explode(',', $ids);
            $query = $this->loop_model->delete_id('lc_userflow', $ids);
            if($query > 0)
            {
                json_msg(true, '操作成功！');
            }else{
                json_msg(false, '操作失败！');
            }
        }
    }




}