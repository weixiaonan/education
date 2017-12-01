<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'Common.php';
class Attachment extends Common
{
    public function __construct()
    {
        parent::__construct();
        $this->table        = 'attachment';
        $this->base_url     = 'index.php?d=admin&c=Attachment';
        $this->list_view    = 'attachment_list';
        $this->edit_view    = 'attachment_edit';
        $this->datagrid     = 'attachment';
    }
    public function index()
    {
        $data['type'] = 1;
        $this->load->view('admin/' . $this->list_view, $data);
    }

    public function list_data()
    {
        $title        = $this->input->get_post('title');
        $type         = $this->input->get_post('type');
        $data_id      = $this->input->get_post('data_id');

        $page_num     = $this->input->get_post('page');
        $page_size    = $this->input->get_post('rows') < 1 ? $this->PAGE_SIZE : $this->input->get_post('rows');
        $start_num    = (($page_num-1)*$page_size) < 0 ? 0 : ($page_num-1)*$page_size;

        $where_str = '1=1 ';


        if($title != '')
        {
            $where_str .= "AND ( file_name like '%{$title}%'  OR filepath like '%{$title}%' ) ";
        }

        if($type != '')
        {
            $where_str .= " AND type={$type} ";
        }

        if($data_id != '')
        {
            $where_str .= " AND data_id={$data_id} ";
        }



        $sql       = "SELECT * FROM {$this->table} WHERE {$where_str} ORDER BY id DESC limit {$start_num},{$page_size}";
        $count_sql = "SELECT COUNT(*) as num FROM {$this->table} WHERE {$where_str} ";

        $row_num   = $this->loop_model->row_query($count_sql);
        $list      = $this->loop_model->list_query($sql);

        foreach ($list as &$val)
        {
            $val['add_time'] = times($val['add_time'], 1);
            $val['name']     = '未知';
            if($val['uid']>0){
                $row = $this->loop_model->get_id('user', $val['uid']);
                $val['name'] = $row['nickname'];
            }

            if (is_file($val['filepath']) == false) {
                $val['is_exits'] = 0;
            } else {
                $val['is_exits'] = 1;
            }

            $file_ext_arr    = explode('.', $val['file_name']);
            $val['file_ext'] = $file_ext_arr[1];
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
            foreach ($ids as $id){
                $row = $this->loop_model->get_id($this->table, $id, 'filepath');
                $query = $this->loop_model->delete_id($this->table, $id);
                @unlink($row['filepath']);
            }

            if($query > 0)
            {
                json_msg(true, '操作成功！');
            }else{
                json_msg(false, '操作失败！');
            }
        }
    }

    function upload()
    {
        $file_name = $_FILES ['upload_file'] ['name'];
        $type      = $this->input->post('type');
        $data_id   = $this->input->post('data_id');
        $allowed_types_arr = array(
            'gif',
            'jpg',
            'jpeg',
            'png',
            'bmp',
            'doc',
            'docx',
            'xls',
            'xlsx',
            'ppt',
            'pptx',
            'txt',
            'zip',
            'rar',
            'gz','acc','amr','wmv','mp3','wma','bz2','3gp','plist','rmvb','mp4','flv','avi','pdf'
        );

        $x = explode('.', $file_name);

        if (count($x) === 1)
        {
            $ext = '';
        }

        $ext =  strtolower(end($x));

        if(!in_array($ext, $allowed_types_arr))
        {
            json_msg(false, '上传的文件类型不对！');
        }

        if($file_name) {
            $allowed_types = '*';//jpg|gif|bmp|jpeg|png
            $file_size = $_FILES['upload_file']['size'];

            $data_upload = $this->file_upload('attachment/', 'upload_file', $allowed_types);
            if (!empty($data_upload['error'])) {
                json_msg(false, strip_tags($data_upload['error']));
            } else if (!empty($data_upload['upload_data'])) {
                $file_path = $data_upload['upload_path'] . $data_upload['upload_data']['file_name'];

                $data['file_name'] = $file_name;
                $data['file_size'] = formatBytes($file_size);
                $data['filepath']  = $file_path;
                $data['uid']       = $this->userInfo['id'];
                $data['ip']        = ip();
                $data['type']      = $type;
                $data['data_id']   = $data_id ? $data_id : 0;
                $data['add_time']  = time();
                $this->loop_model->insert($this->table, $data);

                json_msg(true, '上传成功！');
            }

        }

    }


    function download()
    {
        $id = $this->input->get('id');
        if($id){
            $row = $this->loop_model->get_id($this->table, $id);
            Header ( "Content-type: application/octet-stream" );
            $ua = $_SERVER ["HTTP_USER_AGENT"];
            $file = $row['filepath'];
            $filename = $row['file_name'];
            $encoded_filename = rawurlencode ( $filename );
            if (preg_match ( "/MSIE/", $ua )) {
                header ( 'Content-Disposition: attachment; filename="' . $encoded_filename . '"' );
            } else if (preg_match ( "/Firefox/", $ua )) {
                header ( "Content-Disposition: attachment; filename*=\"utf8''" . $filename . '"' );
            } else {
                header ( 'Content-Disposition: attachment; filename="' . $filename . '"' );
            }
            header ( "Content-Length: " . filesize ( $file ) );
            readfile ( $file );

            $sql = "UPDATE {$this->table} SET download_num=download_num+1 WHERE id={$id}";
            $this->db->query($sql);
        }

    }

    /**
     * 教学视频
     */
    function video()
    {
        $data['type'] = 2;
        $data['upload_access'] = 74;
        $data['download_access'] = 75;
        $data['del_access'] = 76;
        $data['btn_text'] = '教学视频';
        $this->datagrid .= time();
        $this->load->view('admin/attachment_list', $data);
    }

    /**
     * 教学课件
     */
    function courseware()
    {
        $data['type'] = 1;
        $data['upload_access'] = 79;
        $data['download_access'] = 80;
        $data['del_access'] = 81;
        $data['btn_text'] = '教学课件';
        $this->datagrid .= time();
        $this->load->view('admin/attachment_list', $data);
    }


}