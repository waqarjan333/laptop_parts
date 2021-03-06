<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Brand extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Brand_model');
        $this->load->model('Categories_model');
    }

    /*
     * Listing of brand
     */
    function index()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('parent_cat_id', 'Parent Category', 'required');
        $this->form_validation->set_rules('sub_cat_id', 'Sub Category', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'status' => ACTIVE,
                'name' => $this->input->post('name'),
                'category_id' => $this->input->post('parent_cat_id'),
                'sub_category_id' => $this->input->post('sub_cat_id'),
                'created_by' => $this->session->userdata('id')
            );

            $brand_id = $this->Brand_model->add_brand($params);
            redirect('brands');
        } else {
            $this->db->select('*');
            $this->db->where('parent_id=','');
            $this->db->where('parent_id=',0);
            $data['categories'] = $this->db->get('categories')->result_array();
            $data['_view'] = 'brand/index';
            $this->load->view('layouts/main', $data);
        }
    }

    function get_list()
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'category',
            3 => 'sub_category',
            4 => 'status',
            5 => 'actions',
        );

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->Brand_model->get_all_brand_count();

        $totalFiltered = $totalData;

        if (empty($this->input->post('search')['value'])) {
            $posts = $this->Brand_model->get_all_brand($limit, $start, $order, $dir);
        } else {
            $search = $this->input->post('search')['value'];

            $posts =  $this->Brand_model->brand_search($limit, $start, $search, $order, $dir);

            $totalFiltered = $this->Brand_model->brand_search_count($search);
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {

                // $parentCatName = $this->Categories_model->get_parent_cat_name($post->category_id);
                // $subCatName = $this->Categories_model->get_sub_cat_name($post->category_id);
                $nestedData['id'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['category'] = $post->categoryName;
                $nestedData['sub_category'] = $post->subCatName;
                $nestedData['status'] = ($post->status == 1) ? "<button class='btn btn-success btn-xs btn-status' name='status-active'  code='".$post->id."'>Active</button>" : "<button class='btn btn-danger btn-xs btn-status' name='status-suspend' code='".$post->id."'>Suspened</button>";
                $nestedData['actions'] = "<button class='btn btn-warning btn-xs btn-edit' sub_categoryID='".$post->subCatID."' categoryID='".$post->categoryID."' code='".$post->id."'>Edit</button>&nbsp;<button class='btn btn-danger btn-xs btn-delete' name='delete' code='".$post->id."'>Delete</button>";
                //$nestedData['actions'] = "<button class='btn btn-warning btn-xs'>Edit</button>&nbsp;<button class='btn btn-danger btn-xs'>Delete</button>";

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
     * Adding a new brand
     */
    function add()
    {
    }

    function updateStatus($id)
    {
      $status=$this->input->post('status');
      // ($status==1) ? 'ACTIVE':
       $this->Brand_model->update_brand($id,[
                'status' => $status
            ]);
      // echo $status;exit;  
    }
    /*
     * Editing a brand
     */
    public function update_brand($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Brand Name', 'required');
        
        if ($this->form_validation->run()) {
            $this->Brand_model->update_brand($id,[
                'status' => ACTIVE,
                'name' => $this->input->post('name'),
                'created_by' => $this->session->userdata('id')
            ]);
            echo "1";
        } else {
            http_response_code(400);
            echo json_encode($this->form_validation->error_string(" "," "));
        }
        
        
    }

      function get_SubcategoriesByCat($categoryID)
    {
        $data = $this->db->get_where('categories', array('parent_id' => $categoryID))->result_array();
        echo "<option value='' disabled=''>Select Sub Category</option>";

        foreach ($data as $key => $value) {
            echo "<option value='".$value['id']."'>".$value['name']."</option>";
        }
    }

    function getBrand()
    {
      $this->Brand_model->getBrand();   
    }
    /*
     * Deleting brand
     */
    function remove($id)
    {
        $brand = $this->Brand_model->get_brand($id);

        // check if the brand exists before trying to delete it
        if (isset($brand['id'])) {
            $this->Brand_model->delete_brand($id);
            redirect('brand/index');
        } else
            show_error('The brand you are trying to delete does not exist.');
    }

    function get_sub_categories($parent_cat_id)
    {
        $data = $this->db->get_where('categories', array('parent_id' => $parent_cat_id))->result_array();
        echo "<option value='' disabled=''>Select Sub Category</option>";

        foreach ($data as $key => $value) {
            echo "<option value='".$value['id']."'>".$value['name']."</option>";
        }
    }

      function update_brandModel($id)
    {
      $status=$this->input->post('status');
      // ($status==1) ? 'ACTIVE':
       $this->Brand_model->update_brand($id,[
                'category_id' => $this->input->post('category_id'),
                'sub_category_id' => $this->input->post('sub_category_id'),
                    'name' => $this->input->post('name')
            ]);
      // echo $status;exit;  
    }   
    
}
