<?php namespace App\Http\Controllers;

use App\Repositories\PermissionRepo;
use Illuminate\Http\Request;
use Validator;
use View;

class PermissionController extends Controller
{

    private $view_path;
    private $ctrl_url;
    protected $PermissionRepo;

    public function __construct(PermissionRepo $PermissionRepo)
    {
        $this->view_path = 'users.permission';
        $this->ctrl_url = 'permission';
        $this->PermissionRepo = $PermissionRepo;
        View::share('module_name', 'Permission');
        View::share('view_path',$this->view_path);
        View::share('ctrl_url',$this->ctrl_url);
    }

    public function index(Request $request)
    {
    	$param['filter'] = $request->input("filter", array());
        $param['sort'] = $request->input("sort", array());
        $param['paginate'] = TRUE;

        if($request->input('filter.name.value')){
            $param['filter']['name']['value'] = '%'.$request->input('filter.name.value').'%';
        }

        $items = $this->PermissionRepo->getBy($param);

        //serial number
        $srno = ($request->input('page', 1) - 1) * config("setup.par_page", 10)  + 1;

        $compact = compact('items','srno');

        return view($this->view_path . '.index',$compact)->with('title','list');
    }

    public function create()
    {
        return view($this->view_path . '.create')->with('title','create');
    }

    public function store(Request $request)
    {
        $inputs = $request->except('_token');
        $data   = array_except($inputs, 'save', 'save_exit');

        $rules = [
            'name'     => 'required|max:20|alpha_dash|unique:roles',
            'display_name' => 'required|max:255',
        ];

        // Create a new validator instance from our validation rules
        $validator = Validator::make($inputs, $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            return redirect($this->ctrl_url.'/create')
                ->withErrors($validator)
                ->withInput();
        }

        if($this->PermissionRepo->create($data)){
    		return redirect($this->ctrl_url)
            ->with('success', 'Record added sucessfully');
        }

        return redirect($this->ctrl_url)->with('error', 'Can not be created');
    }

    public function edit($id)
    {
    	$item = $this->PermissionRepo->find($id)->toArray();
		//unset($item['password']);

		$compact = compact('item');
    	return view($this->view_path . '.update',$compact)->with('title','edit');
    }

    public function update(Request $request,$id)
    {
    	$inputs = $request->except('_token','_method');
        $data   = array_except($inputs,array('save','save_exit'));

        
        $rules = [
            'name'     => "required|max:20|alpha_dash|unique:roles,name,".$id,
            'display_name' => 'required|max:255',
        ];
        
        // Create a new validator instance from our validation rules
        $validator = Validator::make($inputs, $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            return redirect($this->ctrl_url.'/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        if($this->PermissionRepo->update($data,$id)){
    		return redirect($this->ctrl_url)
            ->with('success', 'Record updated sucessfully');
        }

        return redirect($this->ctrl_url)->with('error', 'Can not be created');
    }

    public function destroy(Request $request,$id)
    {
    	return redirect($this->ctrl_url)->with('error', 'You can not delete any permission');
    }

}