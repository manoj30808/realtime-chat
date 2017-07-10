<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepo;
use App\Repositories\SettingRepo;
use Illuminate\Support\Facades\Validator;
use App\User;
use View;

class SettingController extends Controller
{
	private $view_path;
    protected $SettingRepo;
    private $ctrl_url;

    public function __construct(SettingRepo $SettingRepo)
    {
    	$this->middleware('auth');
        $this->SettingRepo = $SettingRepo;
        $this->ctrl_url = 'setting';

        $this->view_path = 'admin.setting';
        View::share(['ctrl_url'=>$this->ctrl_url,'view_path'=>$this->view_path,'module_name'=> 'Setting','title'=>'Setting']);
    }

    public function index()
    {
        $param = ['single'=>true];
        
        $item = (array) $this->SettingRepo->getBy($param);
        $compact = compact('item');
        return view($this->view_path.'.'.(!empty($item)?'update':'create'),$compact);
    }

    public function store(Request $request)
    {
        $inputs = $request->except('_token','_method');
        $data   = array_except($inputs,array('save','save_exit'));

        if($this->SettingRepo->create($data)){
            return redirect('setting')
            ->with('success', 'Record created sucessfully');
        }

        return redirect('setting')->with('error', 'Can not be created');
    }

    public function update(Request $request,$id)
    {
    	$inputs = $request->except('_token','_method');
        $data   = array_except($inputs,array('save','save_exit'));

        if($this->SettingRepo->update($data,$id)){
    		return redirect('setting')
            ->with('success', 'Record updated sucessfully');
        }

        return redirect('setting')->with('error', 'Can not be created');
    }
    public function logs(Request $request)
    {
        $param['paginate'] = TRUE;
        $items = $this->SettingRepo->getAllLog($param);

        $srno = ($request->input('page', 1) - 1) * config("setup.par_page", 10)  + 1;
        $users = User::pluck('name','id');

        $compact = compact('items','srno','users');
        return view($this->view_path.'.logs',$compact)
                ->with('module_name','Activity Log')
                ->with('title','Logs');
    }
}
