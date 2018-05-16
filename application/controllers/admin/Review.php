<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'Common.php';
class Review extends Common
{
    public function __construct()
    {
        parent::__construct();
        $this->table        = 'review';
        $this->base_url     = 'index.php?d=admin&c=Review';
        $this->list_view    = 'review_list';
        $this->edit_view    = 'decom_bin_edit';
        $this->datagrid     = 'review';
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

        $uid = $this->userInfo["id"];//存储的用户名

        if($title != '')
        {
            $where_str .= "AND ( a.title like '%{$title}%'  OR a.content like '%{$title}%' ) ";
        }

        $where_str .= " AND flow_id in(select flow_id from lc_flowpath where uid='{$uid}') and ";
        $where_str .= " towhere >=(select orders from lc_flowpath b where b.flow_id=a.flow_id and b.uid='{$uid}' ) ";

        $sql       = "select * from lc_userflow a where {$where_str}  ORDER BY id DESC limit {$start_num},{$page_size}";
        $count_sql = "SELECT COUNT(*) as num FROM lc_userflow a WHERE {$where_str} ";

        $row_num   = $this->loop_model->row_query($count_sql);
        $list      = $this->loop_model->list_query($sql);

        foreach ($list as &$val)
        {
            $val['add_time'] = times($val['add_time'], 1);
            $flow = $this->loop_model->row_query("select * from lc_flow WHERE id={$val['flow_id']}");
            $val['title'] = $flow['name'];

            //查找申请人姓名
            $user_sql = " select * from user WHERE id={$val['uid']}";
            $user = $this->loop_model->row_query($user_sql);
            if ($user) $val['apply_name'] = $user['nickname'];


            $status = 0; //是否通过，0否
            $sql = "select orders from lc_flowpath where flow_id='{$val[flow_id]}' and uid='{$uid}'";//通过用户名和代号找出顺序
            $wz = $this->loop_model->row_query($sql);
            if($val['towhere'] > $wz['orders'])
            {
                $status = 1;
            }
            $val['status'] = $status;

        }
        $data = array("total"=>$row_num['num'],"rows"=>$list);
        echo_en($data);
    }



    public function review_apply()
    {

        $id    = $this->input->post('id');
        if($id)
        {
            $sql   = "update lc_userflow set towhere = towhere+1 where id='{$id}'";//审核通过后顺序加一，给到下一个人
            $query = $this->db->query($sql);

            //判断流程是否结束
            $sql   = "select max(orders) as orders from lc_flowpath where flow_id = ( select flow_id from lc_userflow where id='{$id}')";//找出顺序中最大的数
            $max_orders = $this->loop_model->row_query($sql);

            $sql   = "select towhere from lc_userflow where id='{$id}'";
            $towhere    = $this->loop_model->row_query($sql);

            //添加审批时间
            $review_data['userflow_id'] = $id;
            $review_data['review_time'] = time();
            $review_data['review_uid']  = $this->userInfo['id'];
            $review_data['orders']  = intval($towhere['towhere']) - 1;
            $this->loop_model->insert('lc_userflow_review', $review_data);

            if($towhere['towhere'] > $max_orders['orders'])
            {
                //如果结束了，修改状态
                $sql = "update lc_userflow set isok = 1 where id='{$id}'";
                $this->db->query($sql);
            }



        }

        if($query > 0)
        {
            json_msg(true, '操作成功！');
        }else{
            json_msg(false, '操作失败！');
        }
    }


}