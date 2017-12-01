<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'Common.php';
class Mark extends Common
{
    public function __construct()
    {
        parent::__construct();
        $this->table        = 'mark';
        $this->base_url     = 'index.php?d=admin&c=Mark';
        $this->list_view    = 'mark_list';
        $this->edit_view    = 'mark_edit';
        $this->datagrid     = 'mark';
    }
    public function index()
    {
        $mark_type       = $this->input->get_post('mark_type');
        $data_id         = $this->input->get_post('data_id');
        $data['type']    = $mark_type;
        $data['data_id'] = $data_id;

        if($data['data_id'] != '')
        {
            $this->datagrid     = 'mark' . time();
        }

        $this->load->view('admin/' . $this->list_view, $data);
    }

    public function list_data()
    {
        $title        = $this->input->get_post('title');
        $mark_type    = $this->input->get_post('mark_type');
        $data_id      = $this->input->get_post('data_id');

        $page_num     = $this->input->get_post('page');
        $page_size    = $this->input->get_post('rows') < 1 ? $this->PAGE_SIZE : $this->input->get_post('rows');
        $start_num    = (($page_num-1)*$page_size) < 0 ? 0 : ($page_num-1)*$page_size;

        $where_str = '1=1 ';


        if($title != '')
        {
            $where_str .= "AND ( title like '%{$title}%'  OR name like '%{$title}%' ) ";
        }

        if($mark_type != '')
        {
            $where_str .= "AND type={$mark_type} ";
        }

        if($data_id != '')
        {
            $where_str .= "AND data_id={$data_id} ";
        }

        $sql       = "SELECT * FROM {$this->table} WHERE {$where_str} ORDER BY id DESC limit {$start_num},{$page_size}";
        $count_sql = "SELECT COUNT(*) as num FROM {$this->table} WHERE {$where_str} ";

        $row_num   = $this->loop_model->row_query($count_sql);
        $list      = $this->loop_model->list_query($sql);

        foreach ($list as &$val)
        {
            $val['add_time']    = times($val['add_time'], 1);
            //1是教官的评分，2是课程的评分
            if($val['type'] == 1)
            {
                $row = $this->loop_model->get_id('drillmaster', $val['data_id']);
                $val['mark_object'] = '教官——'  . $row['name'] ;
            }
            else if($val['type'] == 2)
            {
                $row = $this->loop_model->get_id('curriculum', $val['data_id']);
                $val['mark_object'] = '课程——'  . $row['training_name'];
            }
        }
        $data = array("total"=>$row_num['num'],"rows"=>$list);
        echo_en($data);
    }

    public function add(){
        $data['id']   = $this->input->get('id');
        $data['type'] = $this->input->get('type');
        $data['form_id'] = 'mark_edit_tj';
        $this->load->view('admin/mark', $data);
    }

    public function edit()
    {
        $id    = $this->input->get('id');
        if($id){
            $data['value'] = $this->loop_model->get_id($this->table, $id);
        }
        $data['form_id'] = $this->datagrid . '_form';
        $this->load->view('admin/mark', $data);
    }

    /**
     *
     */
    public function mark_save()
    {
        $value = $this->input->post('value');
        $value['add_time'] = time();
        $value['uid'] = $this->userInfo['id'];
        if($value['data_id'] == '')
        {
            json_msg(false, '评价信息不全！');
        }
        $query = $this->loop_model->insert('mark', $value);

        if($query > 0)
        {
            json_msg(true, '评价成功！');
        }else{
            json_msg(false, '评价失败！');
        }
    }

    public function save()
    {
        $value = $this->input->post('value');
        $id    = $this->input->post('id');

        if($id)
        {
            $query = $this->loop_model->update_id($this->table, $value, $id);
        }else{
            $value['add_time'] = time();
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
}