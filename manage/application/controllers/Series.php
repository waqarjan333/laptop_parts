<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Series extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Series_model');
    }

    /*
     * Listing of series
     */
    function index()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('brand_id', 'Brand', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'status' => ACTIVE,
                'brand_id' => $this->input->post('brand_id'),
                'name' => $this->input->post('name'),
                'created_by' => $this->session->userdata('id')
            );

            $series_id = $this->Series_model->add_series($params);
            redirect('series');
        } else {
            $data['brands'] = $this->db->get('brand')->result_array();
            $data['_view'] = 'series/index';
            $this->load->view('layouts/main', $data);
        }
    }

    function get_list()
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'brand_name',
            3 => 'date_created',
            4 => 'status',
            5 => 'actions',
        );

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->Series_model->get_all_series_count();

        $totalFiltered = $totalData;

        if (empty($this->input->post('search')['value'])) {
            $posts = $this->Series_model->get_all_series($limit, $start, $order, $dir);
        } else {
            $search = $this->input->post('search')['value'];

            $posts =  $this->Series_model->series_search($limit, $start, $search, $order, $dir);

            $totalFiltered = $this->Series_model->series_search_count($search);
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {

                $nestedData['id'] = $post->id;
                $nestedData['name'] =$post->name;
                $nestedData['brand_name'] =$post->brand_name;
                // $nestedData['brand_name'] ="<span  code=".$post->id."'>".$post->brand_name."</span>";
                $nestedData['date_created'] = date('j M Y', strtotime($post->date_created));
                $nestedData['status'] = ($post->status == 1) ? "<button class='btn btn-success btn-xs btn-status' name='status-active'  code='".$post->id."'>Active</button>" : "<button class='btn btn-danger btn-xs btn-status' name='status-suspend' code='".$post->id."'>Suspened</button>";
                $nestedData['actions'] = "<button class='btn btn-warning btn-xs btn-edit' brandcode='".$post->brand_id."' code='".$post->id."'>Edit</button>&nbsp;<button class='btn btn-danger btn-xs btn-delete' name='delete' code='".$post->id."'>Delete</button>";

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
     * Editing a series
     */
    function edit($id)
    {
        // check if the series exists before trying to edit it
        $data['series'] = $this->Series_model->get_series($id);

        if (isset($data['series']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('brand_id', 'Brand Id', 'required');
            $this->form_validation->set_rules('name', 'Name', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'status' => $this->input->post('status'),
                    'brand_id' => $this->input->post('brand_id'),
                    'name' => $this->input->post('name'),
                    'created_by' => $this->input->post('created_by'),
                    'date_created' => $this->input->post('date_created'),
                );

                $this->Series_model->update_series($id, $params);
                redirect('series/index');
            } else {
                $this->load->model('Series_model');
                $data['all_brand'] = $this->Series_model->get_all_brand();

                $data['_view'] = 'series/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The series you are trying to edit does not exist.');
    }

        public function update_series($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Series Name', 'required');
        
        if ($this->form_validation->run()) {
            $this->Series_model->update_series($id,[
                'name' => $this->input->post('name'),
                'brand_id' => $this->input->post('brand_id')
            ]);
            echo "1";
        } else {
            http_response_code(400);
            echo json_encode($this->form_validation->error_string(" "," "));
        }
        
        
    }

 /*
     * Update Status series
     */
      function updateStatus($id)
    {
      $status=$this->input->post('status');
      // ($status==1) ? 'ACTIVE':
       $this->Series_model->update_series($id,[
                'status' => $status
            ]);
      // echo $status;exit;  
    }   
    /*
     * Deleting series
     */
    function remove($id)
    {
        $series = $this->Series_model->get_series($id);

        // check if the series exists before trying to delete it
        if (isset($series['id'])) {
            $this->Series_model->delete_series($id);
            redirect('series/index');
        } else
            show_error('The series you are trying to delete does not exist.');
    }
}
