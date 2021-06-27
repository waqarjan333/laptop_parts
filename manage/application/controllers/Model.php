<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Model extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_model');
    }

    /*
     * Listing of model
     */
    function index()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('series_id', 'Series', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'series_id' => $this->input->post('series_id'),
                'name' => $this->input->post('name'),
                'status' => ACTIVE,
                'created_by' => $this->session->userdata('id')
            );

            $model_id = $this->Model_model->add_model($params);
            redirect('model');
        } else {
            $data['brands'] = $this->db->get('brand')->result_array();
            $data['_view'] = 'model/index';
            $this->load->view('layouts/main', $data);
        }
    }

    function get_series_by_brand($brand_id)
    {
        $data = $this->db->get_where('series', array('brand_id' => $brand_id))->result_array();
        echo "<option value=''>Select Series</option>";

        foreach ($data as $key => $value) {
            echo "<option value='".$value['id']."'>".$value['name']."</option>";
        }
    }

    function get_list()
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'series_name',
            3 => 'brand_name',
            4 => 'date_created',
            5 => 'status',
            6 => 'actions',
        );

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->Model_model->get_all_model_count();

        $totalFiltered = $totalData;

        if (empty($this->input->post('search')['value'])) {
            $posts = $this->Model_model->get_all_model($limit, $start, $order, $dir);
        } else {
            $search = $this->input->post('search')['value'];

            $posts =  $this->Model_model->model_search($limit, $start, $search, $order, $dir);

            $totalFiltered = $this->Model_model->model_search_count($search);
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {

                $nestedData['id'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['brand_name'] = $post->brand_name;
                $nestedData['series_name'] = $post->series_name;
                $nestedData['date_created'] = date('j M Y', strtotime($post->date_created));
                $nestedData['status'] = ($post->status == 1) ? "<button class='btn btn-success btn-xs btn-status' name='status-active'  code='".$post->id."'>Active</button>" : "<button class='btn btn-danger btn-xs btn-status' name='status-suspend' code='".$post->id."'>Suspened</button>";
                $nestedData['actions'] = "<button class='btn btn-warning btn-xs'>Edit</button>&nbsp;<button class='btn btn-danger btn-xs'>Delete</button>";
 $nestedData['actions'] = "<button class='btn btn-warning btn-xs btn-edit'  code='".$post->id."'>Edit</button>&nbsp;<button class='btn btn-danger btn-xs btn-delete' name='delete' code='".$post->id."'>Delete</button>";
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }
    /*
     * Adding a new model
     */
    function add()
    {
    }

    /*
     * Update Status series
     */
      function updateStatus($id)
    {
      $status=$this->input->post('status');
      // ($status==1) ? 'ACTIVE':
       $this->Model_model->update_model($id,[
                'status' => $status
            ]);
      // echo $status;exit;  
    }   
    /*
     * Editing a model
     */
    function edit($id)
    {
        // check if the model exists before trying to edit it
        $data['model'] = $this->Model_model->get_model($id);

        if (isset($data['model']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('series_id', 'Series Id', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'series_id' => $this->input->post('series_id'),
                    'name' => $this->input->post('name'),
                    'status' => $this->input->post('status'),
                    'created_by' => $this->input->post('created_by'),
                    'date_created' => $this->input->post('date_created'),
                );

                $this->Model_model->update_model($id, $params);
                redirect('model/index');
            } else {
                $this->load->model('Model_model');
                $data['all_series'] = $this->Model_model->get_all_series();

                $data['_view'] = 'model/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The model you are trying to edit does not exist.');
    }

    /*
     * Deleting model
     */
    function remove($id)
    {
        $model = $this->Model_model->get_model($id);

        // check if the model exists before trying to delete it
        if (isset($model['id'])) {
            $this->Model_model->delete_model($id);
            redirect('model/index');
        } else
            show_error('The model you are trying to delete does not exist.');
    }
}
