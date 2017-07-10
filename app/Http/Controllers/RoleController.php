<?php namespace App\Http\Controllers;

use App\Repositories\RoleRepo;
use App\Repositories\PermissionRepo;
use Illuminate\Http\Request;
use Validator;
use View;

class RoleController extends Controller
{

    private $view_path;
    private $ctrl_url;
    protected $RoleRepo;
    protected $PermissionRepo;

    public function __construct(RoleRepo $RoleRepo,PermissionRepo $PermissionRepo)
    {
        $this->view_path = 'users.role';
        $this->ctrl_url = 'role';
        $this->RoleRepo = $RoleRepo;
        $this->PermissionRepo = $PermissionRepo;
        View::share('module_name', 'Roles');
        View::share('view_path',$this->view_path);
        View::share('ctrl_url',$this->ctrl_url);
    }

    public function index(Request $request)
    {
    	$param['filter'] = $request->input("filter", array());
        $param['sort'] = $request->input("sort", array());
        $param['paginate'] = TRUE;

        if($request->input('filter.email.value')){
            $param['filter']['email']['value'] = '%'.$request->input('filter.email.value').'%';
        }

        $items = $this->RoleRepo->getBy($param);

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
        if($this->RoleRepo->create($data)){
    		return redirect($this->ctrl_url)
            ->with('success', 'Record added sucessfully');
        }
        return redirect($this->ctrl_url)->with('error', 'Can not be created');
    }

    public function edit($id)
    {
    	$item = $this->RoleRepo->find($id)->toArray();
		//unset($item['password']);

		$compact = compact('item');
    	return view($this->view_path . '.update',$compact)->with('title','Edit');
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

        if($this->RoleRepo->update($data,$id)){
    		return redirect($this->ctrl_url)
            ->with('success', 'Record updated sucessfully');
        }

        return redirect($this->ctrl_url)->with('error', 'Can not be created');
    }

    public function permissions($id)
    {
        //get role by id
        $roleObj = $this->RoleRepo->find($id);
        $selected_perm = $roleObj->perms()->pluck('id')->all();
        $role = $roleObj->toArray();

        //get all permissions
        $param['sort']['name']='ASC';
        $param['paginate'] = FALSE;
        $items = $this->PermissionRepo->getBy($param);

        $compact = compact('role','items','selected_perm');
        return view($this->view_path . '.permissions',$compact)->with('title','permissions');
    }


    public function permissionsStore(Request $request,$id)
    {
        $inputs = $request->except('_token');
        $data   = array_except($inputs, 'save');

        $this->PermissionRepo->addPermissionsToRole(isset($data['permissions'])?$data['permissions']:array(),$id);
        
        return redirect($this->ctrl_url.'/'.$id.'/permission')
                ->with('success', 'Permissions Updated');
    }

    public function destroy(Request $request,$id)
    {
        return redirect($this->ctrl_url)->with('error', 'You can not delete any role');
    }

}