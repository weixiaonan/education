<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'Common.php';
class Exam extends Common
{
    public function __construct()
    {
        parent::__construct();
        $this->table        = 'exam';
        $this->base_url     = 'index.php?d=admin&c=Exam';
        $this->list_view    = 'exam_list';
        $this->edit_view    = 'exam_edit';
        $this->datagrid     = 'exam';
    }
    public function index()
    {

      $this->load->view('admin/' . $this->list_view);
    }

    public function list_data()
    {
        $title        = $this->input->get_post('title');
        $type         = $this->input->get_post('type');

        $page_num     = $this->input->get_post('page');
        $page_size    = $this->input->get_post('rows') < 1 ? $this->PAGE_SIZE : $this->input->get_post('rows');
        $start_num    = (($page_num-1)*$page_size) < 0 ? 0 : ($page_num-1)*$page_size;

        $where_str = '1=1 ';
        $time_now = time();

        if($title != '')
        {
            $where_str .= "AND ( title like '%{$title}%'  OR content like '%{$title}%' ) ";
        }

        if($type == 1)
        {
            $where_str .= "AND start_time > {$time_now}  ";
        }elseif ($type == 2)
        {
            $where_str .= "AND start_time > {$time_now} AND end_time < {$time_now}  ";
        }elseif ($type == 3)
        {
            $where_str .= "AND end_time < {$time_now}  ";
        }elseif ($type == 4)
        {
            $where_str .= "AND id IN(SELECT exam_id FROM exam_book WHERE uid={$this->userInfo['id']})  ";
        }


        $sql       = "SELECT * FROM {$this->table} WHERE {$where_str} ORDER BY id DESC limit {$start_num},{$page_size}";
        $count_sql = "SELECT COUNT(*) as num FROM {$this->table} WHERE {$where_str} ";

        $row_num   = $this->loop_model->row_query($count_sql);
        $list      = $this->loop_model->list_query($sql);

        foreach ($list as &$val)
        {
            $val['add_time'] = times($val['add_time'], 1);
            $val['ques_num'] = $this->loop_model->get_list_num('exam_ques', array('where'=>array('exam_id'=>$val['id']) ) );
            $start_time      = times($val['start_time'], 1);
            $end_time        = times($val['end_time'], 1);
            $val['exam_time']= $val['exam_time'] . '分钟 (' . $start_time . '——' . $end_time . ')';

            //考试状态
            if($val['start_time'] > $time_now)
            {
                $val['exam_status'] = 1;
                $val['exam_status_txt'] = '<b class="font-blue">未开考</b>';
            }
            if($val['end_time'] > $time_now && intval($val['start_time']) < $time_now)
            {
                $val['exam_status'] = 2;
                $val['exam_status_txt'] = '<b class="font-green">进行中</b>';
            }
            if($val['end_time'] < $time_now)
            {
                $val['exam_status'] = 3;
                $val['exam_status_txt'] = '<b class="font-red">已结束</b>';
            }



            if($val['used_book'] == 1){
                //查询预约情况
                $where = array('exam_id'=>$val['id'], 'uid'=>$this->userInfo['id']);
                $book_row = $this->loop_model->get_where('exam_book', $where);
                $val['book_status'] = -1;//-1没预约，0已预约，1取消预约
                if($book_row)
                {
                    $val['book_status'] = $book_row['status'];
                }
            }


            $val['used_book']= $val['used_book'] == 1 ? '是' : '否';

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
            $data['value']['start_time'] = times($data['value']['start_time'], 1);
            $data['value']['end_time'] = times($data['value']['end_time'], 1);
        }
        $data['form_id'] = $this->datagrid . '_form';
        $this->load->view('admin/' . $this->edit_view, $data);
    }

    public function save()
    {
        $value = $this->input->post('value');
        $id    = $this->input->post('id');

        $value['start_time'] = strtotime($value['start_time']);
        $value['end_time'] = strtotime($value['end_time']);

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

    public function choose_ques(){
        $data['exam_id'] = $exam_id = $this->input->get('exam_id');
        //查询选了几题
        $data['selected_num'] = $this->loop_model->get_list_num('exam_ques', array('where'=>array('exam_id'=>$exam_id) ) );
        $this->load->view('admin/choose_ques_view', $data);
    }

    /**
     * 预约考试
     */

    function book_exam()
    {
        $exam_id = $this->input->post('id');
        if($exam_id)
        {
            $where = array('exam_id'=>$exam_id, 'uid'=>$this->userInfo['id']);
            //查询是否预约，并且预约有效
            $book_row = $this->loop_model->get_where('exam_book', $where);
            if(!$book_row)
            {
                $data['exam_id']  = $exam_id;
                $data['uid']      = $this->userInfo['id'];
                $data['add_time'] = time();
                $query = $this->loop_model->insert('exam_book', $data);
                if($query > 0)
                {
                    json_msg(true, '预约成功！');
                }else{
                    json_msg(false, '预约失败！');
                }
            }else
            {
                $data['update_time'] = time();
                if($book_row['status'] == 1)
                {
                    $data['status'] = 0;
                }else{
                    $data['status'] = 1;
                }
                $query = $this->loop_model->update_id('exam_book', $data, $book_row['id']);
                if($query > 0)
                {
                    json_msg(true, '操作成功！');
                }else{
                    json_msg(false, '操作失败！');
                }

            }
        }else{
            json_msg(false, '数据异常！');
        }

    }

    /**
     * 开始考试
     */

    public function start_exam()
    {
        $exam_id = $this->input->get('exam_id');
        if($exam_id)
        {

            $where = array('where'=>array('exam_id'=>$exam_id, 'uid'=>$this->userInfo['id']) ) ;
            //查询是否参加过该考试
            $exam_num = $this->loop_model->get_list_num('exam_log', $where);
            if($exam_num>0)
            {
                echo '<script>$.messager.alert(\'操作提示\',"您已经参加过该考试！",\'error\',function () {bClose = true;$("#com_edit").dialog("close");});</script>';
                exit;
            }

            //查询是否用预约和开始时间
            $row = $this->loop_model->get_id($this->table, $exam_id);
            if($row){

                //不要预约就查询开考时间
                if($row['end_time'] < time())
                {
                    echo '<script>$.messager.alert(\'操作提示\',"考试时间结束！",\'error\',function () {bClose = true;$("#com_edit").dialog("close");});</script>';
                    exit;
                }
                if($row['start_time'] > time())
                {
                    echo '<script>$.messager.alert(\'操作提示\',"未到考试时间！",\'error\',function () {bClose = true;$("#com_edit").dialog("close");});</script>';
                    exit;
                }

                //如果要预约
                if($row['used_book'] == 1)
                {
                    $where = array('where'=>array('exam_id'=>$exam_id, 'uid'=>$this->userInfo['id'], 'status'=>0) ) ;
                    //查询是否预约，并且预约有效
                    $book_num = $this->loop_model->get_list_num('exam_book', $where);
                    if($book_num < 1)
                    {
                       echo '<script>$.messager.alert(\'操作提示\',"您未预约或者已取消预约！",\'error\',function () {bClose = true;$("#com_edit").dialog("close");});</script>';
                       exit;
                    }
                }

                $sql = "SELECT * FROM question_bank WHERE id IN(SELECT ques_id FROM exam_ques WHERE exam_id={$exam_id})";
                $list = $this->loop_model->list_query( $sql );
                foreach ($list as $k=>$row) {
                    $answers = explode('###',$row['answer']);
                    $arr[] = array(
                        'question' => ($k+1).'、'.$row['question'],
                        'answers' => $answers
                    );
                }

                $data['ques_num'] = $this->loop_model->get_list_num('exam_ques', array('where'=>array('exam_id'=>$exam_id) ) );
                $data['row']      = $this->loop_model->get_id('exam', $exam_id);
                $data['json']     = json_encode($arr);
                $data['exam_id']  = json_encode($exam_id);
                $this->load->view('admin/exam_view', $data);
            }

        }
    }

    /**
     * 提交考试
     */
    public function get_exam_data(){
        $data        = $_REQUEST['an'];
        $exam_id     = $this->input->get('exam_id');
        $exam_log_id = $_REQUEST['exam_log_id'];
        $end_time    = time();

        if($exam_id == '')
        {
            $arr['score'] = '考试ID为空！';
            echo json_encode($arr);
            exit;
        }



        $answers = explode('|',$data);
        $an_len = count($answers)-1; //题目数

        $sql = "select correct,id from question_bank WHERE id IN (SELECT ques_id FROM exam_ques WHERE exam_id={$exam_id}) order by id asc";

        $query = $this->loop_model->list_query($sql);
        $i = 0;
        $score = 0; //初始得分
        $q_right = 0; //答对的题数
        foreach($query as $row){
            if($answers[$i]==$row['correct']){
                $arr['res'][] = 1;
                $q_right += 1;
            }else{
                $arr['res'][] = 0;
            }

            $data_log = array();
            $data_log['exam_log_id'] = $exam_log_id;
            $data_log['ques_id']     = $row['id'];
            $data_log['select_id']   = $answers[$i];
            $data_log['correct']     = $row['correct'];
            $data_log['add_time']    = $end_time;
            $this->loop_model->insert('exam_ques_log', $data_log);

            $i++;
        }
        $arr['score'] = round(($q_right/$an_len)*100); //总得分

        //更新数据
        $this->loop_model->update_id('exam_log', array('end_time'=>$end_time, 'score'=>$arr['score']), $exam_log_id);

        echo json_encode($arr);
    }

    /**
     * 开始考试，倒计时
     */
    function go_start()
    {
        $exam_id = trim( $this->input->post('exam_id'), '"');
        if($exam_id != '')
        {
            $data['exam_id'] = intval($exam_id);
            $data['uid']     = $this->userInfo['id'];
            $data['start_time'] = time();
            $query = $this->loop_model->insert('exam_log', $data);
            json_msg(true, $query);
        }else{
            json_msg(false, '考试数据异常！');
        }
    }

    /**
     * 考试记录
     */

    function exam_log()
    {

        $this->load->view('admin/exam_log_view');
    }

    function exam_log_list_data()
    {
        $title        = $this->input->get_post('title');

        $page_num     = $this->input->get_post('page');
        $page_size    = $this->input->get_post('rows') < 1 ? $this->PAGE_SIZE : $this->input->get_post('rows');
        $start_num    = (($page_num-1)*$page_size) < 0 ? 0 : ($page_num-1)*$page_size;

        $table     = 'exam_log';
        $act_type = $this->userInfo['act_type'];
        if ($act_type == 1) {
            $where_str = '1=1 ';
        } else {
            $where_str = " uid={$this->userInfo['id']} ";
        }


        if($title != '')
        {
            $where_str .= "AND exam_id IN( SELECT id FROM exam WHERE title like '%{$title}%'  OR content like '%{$title}%' ) ";
        }



        $sql       = "SELECT * FROM {$table} WHERE {$where_str} ORDER BY id DESC limit {$start_num},{$page_size}";
        $count_sql = "SELECT COUNT(*) as num FROM {$table} WHERE {$where_str} ";

        $row_num   = $this->loop_model->row_query($count_sql);
        $list      = $this->loop_model->list_query($sql);

        foreach ($list as &$val)
        {
            $val['start_time'] = times($val['start_time'], 1);
            $val['end_time']   = times($val['end_time'], 1);
            $row = $this->loop_model->get_id('exam', $val['exam_id']);
            $val['name'] = $row['title'];
        }
        $data = array("total"=>$row_num['num'],"rows"=>$list);
        echo_en($data);
    }
}