<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'Common.php';
class Drillmaster extends Common
{
    public function __construct()
    {
        parent::__construct();
        $this->table        = 'drillmaster';
        $this->base_url     = 'index.php?d=admin&c=Drillmaster';
        $this->list_view    = 'drillmaster_list';
        $this->edit_view    = 'drillmaster_edit';
        $this->datagrid     = 'drillmaster';
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
            $where_str .= "AND ( name like '%{$title}%'  OR speciality like '%{$title}%'   OR experience like '%{$title}%') ";
        }

        if($c_id != '')
        {
            $where_str .= " AND FIND_IN_SET({$c_id},curriculum_id) ";
        }


        $sql       = "SELECT * FROM {$this->table} WHERE {$where_str} ORDER BY id DESC limit {$start_num},{$page_size}";
        $count_sql = "SELECT COUNT(*) as num FROM {$this->table} WHERE {$where_str} ";

        $row_num   = $this->loop_model->row_query($count_sql);
        $list      = $this->loop_model->list_query($sql);

        foreach ($list as &$val)
        {
            $val['add_time']    = times($val['add_time'], 1);
            $val['sex']    = $val['sex'] == 1 ? '男' : '女';
            if(! empty($val['curriculum_id']))
            {
                $row = $this->loop_model->row_query("SELECT GROUP_CONCAT(training_name) as titles FROM curriculum WHERE id IN({$val['curriculum_id']})");
                $val['curriculum'] = $row['titles'];
            }

            //评价数
            $num = $this->loop_model->get_list_num('mark', array('where'=>array('data_id'=>$val['id'], 'type'=>1) ) );
            $val['mark_num'] = $num;
            if( role_check(25) )
            {
                $val['mark_num'] = "<a href='javascript:' onclick='look_mark({$val['id']}, 1, \"{$val['name']}\")' title='查看评论'>{$num}(查看)</a>";
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
        }
        $data['form_id'] = $this->datagrid . '_form';
        $this->load->view('admin/' . $this->edit_view, $data);
    }

    public function save()
    {
        $value = $this->input->post('value');
        $id    = $this->input->post('id');
        $curriculum_ids = $this->input->post('curriculum_id');

        $value['curriculum_id'] = implode(',', $curriculum_ids);

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