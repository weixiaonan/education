<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'Common.php';
class Training_files extends Common
{
    public function __construct()
    {
        parent::__construct();
        $this->table        = 'training_files';
        $this->base_url     = 'index.php?d=admin&c=Training_files';
        $this->list_view    = 'training_files_list';
        $this->edit_view    = 'training_files_edit';
        $this->datagrid     = 'training_files';
    }
    public function index()
    {

        $this->load->view('admin/' . $this->list_view);
    }

    public function list_data()
    {
        $title        = $this->input->get_post('title');
        $c_id         = $this->input->get_post('c_id');

        $page_num     = $this->input->get_post('page');
        $page_size    = $this->input->get_post('rows') < 1 ? $this->PAGE_SIZE : $this->input->get_post('rows');
        $start_num    = (($page_num-1)*$page_size) < 0 ? 0 : ($page_num-1)*$page_size;

        $where_str = '1=1 ';


        if($title != '')
        {
            $where_str .= " AND police_id IN( SELECT id FROM police WHERE name like '%{$title}%' ) ";
        }

        if($c_id != '')
        {
            $where_str .= " AND curriculum_id={$c_id} ";
        }



        $sql       = "SELECT * FROM {$this->table} WHERE {$where_str} ORDER BY id DESC limit {$start_num},{$page_size}";
        $count_sql = "SELECT COUNT(*) as num FROM {$this->table} WHERE {$where_str} ";

        $row_num   = $this->loop_model->row_query($count_sql);
        $list      = $this->loop_model->list_query($sql);

        foreach ($list as &$val)
        {

            $val['add_time']    = times($val['add_time'], 1);
            $val['is_overtime'] = $val['is_overtime'] == 1 ? '是' : '否';

            $val['name']        = '';
            $val['curriculum_name'] = '';
            if($val['police_id'] != '')
            {
                $sql  = " SELECT id, concat(name,'(身份证：',sfz,')') as name FROM police WHERE id={$val['police_id']} ";
                $row = $this->loop_model->row_query($sql);
                if($row) $val['name'] = $row['name'];
            }

            if($val['curriculum_id'] != '')
            {
                $sql  = " SELECT training_name as name FROM curriculum WHERE id={$val['curriculum_id']} ";
                $row = $this->loop_model->row_query($sql);
                if($row) $val['curriculum_name'] = $row['name'];
            }



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
            if($data['value']['police_id'] != '')
            {
                $row = $this->loop_model->get_id('police', $data['value']['police_id']);
                $data['value']['name'] = $row['name'] . '(身份证：' . $row['sfz'] . ')';
            }
        }
        $data['form_id'] = $this->datagrid . '_form';
        $this->load->view('admin/' . $this->edit_view, $data);
    }

    public function save()
    {
        $value = $this->input->post('value');
        $id    = $this->input->post('id');

        //判断是否在下拉选中民警
        if(! is_numeric($value['police_id']) )
        {
            json_msg(false, '姓名不是在下拉选择中选中！');
        }

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

    public function get_police()
    {
        $title = $this->input->post_get('title');

        $where_str = '1=1 ';
        if($title != '')
        {
            $where_str .= " AND name like '%{$title}%' ";
        }

        $sql  = " SELECT id, concat(name,'(身份证：',sfz,')') as name FROM police WHERE {$where_str} ";
        $list = $this->loop_model->list_query($sql);
        echo_en($list);

    }
}