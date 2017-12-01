<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'Common.php';
class Question_bank extends Common
{
    public function __construct()
    {
        parent::__construct();
        $this->table        = 'question_bank';
        $this->base_url     = 'index.php?d=admin&c=Question_bank';
        $this->list_view    = 'question_bank_list';
        $this->edit_view    = 'question_bank_edit';
        $this->datagrid     = 'question_bank';
    }
    public function index()
    {
      $data['exam_id'] = $exam_id = $this->input->get('exam_id');

      $this->load->view('admin/' . $this->list_view, $data);
    }

    public function list_data()
    {
        $title        = $this->input->get_post('title');

        $exam_id   = $this->input->get('exam_id');

        $page_num     = $this->input->get_post('page');
        $page_size    = $this->input->get_post('rows') < 1 ? $this->PAGE_SIZE : $this->input->get_post('rows');
        $start_num    = (($page_num-1)*$page_size) < 0 ? 0 : ($page_num-1)*$page_size;

        $where_str = '1=1 ';
        $order_by_str = ' ORDER BY id DESC ';

        if($title != '')
        {
            $where_str .= "AND ( question like '%{$title}%'  OR answer like '%{$title}%' ) ";
        }

        if($exam_id != '')
        {
            $order_by_str = " ORDER BY id IN(SELECT ques_id FROM exam_ques WHERE exam_id={$exam_id}) DESC,add_time DESC ";
        }

        $sql       = "SELECT * FROM {$this->table} WHERE {$where_str} {$order_by_str}  limit {$start_num},{$page_size}";
        $count_sql = "SELECT COUNT(*) as num FROM {$this->table} WHERE {$where_str} ";

        $row_num   = $this->loop_model->row_query($count_sql);
        $list      = $this->loop_model->list_query($sql);

        foreach ($list as &$val)
        {

            //判断是否选为题目
            $num = $this->loop_model->get_list_num('exam_ques', array('where'=>array('exam_id'=>$exam_id, 'ques_id'=>$val['id']) ) );
            if($num>0) $val['checked']  = true;

            $val['add_time'] = times($val['add_time'], 1);
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
            $data['value']['answer'] = explode('###', $data['value']['answer']);
        }
        $data['form_id'] = $this->datagrid . '_form';
        $this->load->view('admin/' . $this->edit_view, $data);
    }

    public function save()
    {
        $value = $this->input->post('value');
        $id    = $this->input->post('id');
        $arr = array('A.', 'B.', 'C.', 'D.');
        foreach ($arr as $k=>$v)
        {
            $value['answer'][$k] =  $value['answer'][$k];
        }
        $value['answer'] = implode('###', $value['answer']);
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

    /**
     * 设为题目
     */

    public function set_exam(){
        $ids     = $this->input->post('id_str');
        $exam_id = $this->input->post('exam_id');
        $query   = 0;
        if($exam_id != '')
        {
            $ids = explode(',', $ids);
            foreach ($ids as $id)
            {
                //判断是否存在题目
                $num = $this->loop_model->get_list_num('exam_ques', array('where'=>array('exam_id'=>$exam_id, 'ques_id'=>$id) ) );
                if($num<1)
                {
                    $data['exam_id'] = $exam_id;
                    $data['ques_id'] = $id;
                    $data['add_time'] = time();
                    $query = $this->loop_model->insert('exam_ques', $data);
                }
            }
        }
        if($query > 0)
        {
            json_msg(true, '操作成功！');
        }else{
            json_msg(false, '未有任何改变操作失败！');
        }
    }

    /**
     * 取消或添加题目
     */

    public function add_ques()
    {
        $id     = $this->input->post('id');
        $exam_id = $this->input->post('exam_id');
        $type    = $this->input->post('type');

        $query   = 0;
        if($exam_id != '' && $id != '')
        {
            $data['exam_id'] = $exam_id;
            $data['ques_id'] = $id;


            //判断是否存在题目
            $num = $this->loop_model->get_list_num('exam_ques', array('where'=>array('exam_id'=>$exam_id, 'ques_id'=>$id) ) );
            if($num<1) {
                $type = 'add';
                $data['add_time'] = time();
                $query = $this->loop_model->insert('exam_ques', $data);
            }else{
                $query = $this->loop_model->delete_where('exam_ques', array('where'=>$data));
                $type = 'del';
            }
            $type_txt = $type == 'add' ? '添加题目成功！' : '取消题目成功！';


            if($query > 0)
            {
                json_msg(true, $type_txt, $type);
            }else{
                json_msg(false, '未有任何改变操作失败！');
            }

        }else
        {
            json_msg(false, '操作失败！');
        }
    }

}