<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'Common.php';
class Police extends Common
{
    public function __construct()
    {
        parent::__construct();
        $this->table        = 'police';
        $this->base_url     = 'index.php?d=admin&c=Police';
        $this->list_view    = 'police_list';
        $this->edit_view    = 'police_edit';
        $this->datagrid     = 'police';
    }     
    public function index()
    {
        $this->load->view('admin/' . $this->list_view);
    }

    public function list_data()
    {
        $title        = $this->input->get_post('title');
        $sex        = $this->input->get_post('sex');
        $mz        = $this->input->get_post('mz');

        $page_num     = $this->input->get_post('page');
        $page_size    = $this->input->get_post('rows') < 1 ? $this->PAGE_SIZE : $this->input->get_post('rows');
        $start_num    = (($page_num-1)*$page_size) < 0 ? 0 : ($page_num-1)*$page_size;

        $where_str = '1=1 ';


        if($title != '')
        {
            $where_str .= "AND ( name like '%{$title}%'  OR department like '%{$title}%' OR sfz like '%{$title}%' OR tel like '%{$title}%' ) ";
        }

        if($sex != '')
        {
            $where_str .= "AND sex={$sex} ";
        }

        if($mz != '')
        {
            $where_str .= "AND mz='{$mz}' ";
        }


        $sql       = "SELECT * FROM {$this->table} WHERE {$where_str} ORDER BY id DESC limit {$start_num},{$page_size}";
        $count_sql = "SELECT COUNT(*) as num FROM {$this->table} WHERE {$where_str} ";



        $row_num   = $this->loop_model->row_query($count_sql);
        $list      = $this->loop_model->list_query($sql);

        foreach ($list as &$val)
        {
            $val['create_time'] = times($val['create_time'], 1);
            $val['sex']         = $val['sex'] == 1 ? '男' : '女';
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
        }
        $data['form_id'] = $this->datagrid . '_form';
        $this->load->view('admin/' . $this->edit_view, $data);
    }

    public function save()
    {
        $value = $this->input->post('value');
        $id    = $this->input->post('id');

        if($id)
        {
            $query = $this->loop_model->update_id($this->table, $value, $id);
        }else{
            $value['create_time'] = time();
            $query = $this->loop_model->insert($this->table, $value);
        }
        if($query > 0)
        {
            json_msg(true, '操作成功！');
        }else{
            json_msg(false, '操作失败！');
        }
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

    public function get_mz()
    {
        $list = $this->loop_model->get_list('mz', array(), 0, 0, 'id');
        echo_en($list);
    }

    function show_sync_list()
    {
        $this->datagrid .= time();
        $this->load->view('admin/police_sync_list');
    }

    /**
     * 同步列表
     */
    function get_sync_list()
    {
        $url = "http://192.168.0.56/nanning_personnel/index.php?d=api&c=Training&m=person_list_data";
        $title        = $this->input->get_post('title');

        $page_num     = $this->input->get_post('page');
        $page_size    = $this->input->get_post('rows') < 1 ? $this->PAGE_SIZE : $this->input->get_post('rows');
        $data['key'] =  md5('hemao');
        $data['keywords'] =  $title;
        $data['page'] =  $page_num;
        $data['rows'] =  $page_size;

        $list = curlPost($url, $data);

        $list = json_decode($list, true);
        foreach ($list['rows'] as &$val)
        {
            $row = $this->loop_model->get_where($this->table, array('sfz'=>$val['sfz']), 'id');
            $val['checked'] = false;
            if($row){
                $val['checked'] = true;
            }

            if($val['checked'])
            {
                $val['status_txt'] = '<b class="font-green">已同步</b>';
            }
        }


        echo_en($list);
    }

    /**
     * 保存同步信息
     */
    function save_sync()
    {
        $ids = trim($_REQUEST['id_str']);return;
        $url = "http://m.starbe.cn/zhzg/nanning_personnel/index.php?d=api&c=Training&m=person_show";
        $post_data['key'] =  md5('hemao');
        if($ids)
        {
            $ids = explode(',', $ids);
            $num = 0;
            foreach ($ids as $id)
            {
                $post_data['id'] =  $id;
                $row = curlPost($url, $post_data);
                $row = json_decode($row, true);
                $row = $row['basic'];
                $data['department'] = $row['com_title'] ? $row['com_title'] : ''; //部门
                $data['name']       = $row['name'] ? $row['name'] : ''; //姓名
                $data['sex']        = $row['sex'] ? ($row['sex'] == '男' ? 1: 0) : ''; //性别
                $data['birth_time'] = $row['birth_time'] ? $row['birth_time'] : ''; //出生日期
                $data['jiguan']     = $row['jiguan'] ? $row['jiguan'] : ''; //籍贯
                $data['mz']         = $row['mz'] ? $row['mz'] : ''; //民族
                $data['political_status'] = $row['political_status'] ? $row['political_status'] : ''; //政治面貌
                $data['sfz']        = $row['sfz'] ? $row['sfz'] : ''; //身份证号
                $data['xueli']      = $row['xueli'] ? $row['xueli'] : ''; //学历
                $data['position']   = $row['org_job'] ? $row['org_job'] : ''; //职务
                $data['in_org']     = $row['in_org'] ? $row['in_org'] : ''; //所在单位
                $data['phone']      = $row['phone'] ? $row['phone'] : ''; //手机号
                $data['tel']        = $row['tel'] ? $row['tel'] : ''; //办公电话
                $data['family_address'] = $row['family_address'] ? $row['family_address'] : ''; //家庭地址
                $data['now_address']= $row['now_address'] ? $row['now_address'] : ''; //现在住址
                $data['job_num']    = $row['job_num'] ? $row['job_num'] : ''; //工号
                $data['bz']         = $row['bz'] ? $row['bz'] : ''; //备注
                $data['come_from']  =  '同步'; //
                $data['create_time']= time(); //
                $data['create_by']  = $this->userInfo['id']; //

                $row = $this->loop_model->get_where($this->table, array('sfz'=>$data['sfz']), 'id');
                if(!$row){
                    $query = $this->loop_model->insert($this->table, $data);
                    if($query>0) $num++;
                }
            }

            json_msg(true, '成功同步'.$num.'条数据！');
        }
    }


}