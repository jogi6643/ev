<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use DB;
use App\Labelmodule;
use App\Module;
use App\Http\Controllers\Controller;
use App\Label;
use App\Coadmin;
class LabelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
	}
	
	public function index(){
		try{
		$label=new Label();
		$label=$label->orderBy('name','asc')->get();
	
		foreach($label as $key=>$lables){
			$data=Labelmodule::select('module_id')->where('label_id',$lables->id)->get()->toArray();
			$data=Module::select('name')->whereIn('id',$data)->get()->toArray();
			$label[$key]['label']=implode(',',array_column($data,'name'));
		}
    
		return view('admin.label.index', compact('label'));
		}
		catch (\Exception $e) {
		$errormessage = $e->getMessage();
		return view('errormessage', compact('errormessage'));
		return $e->getMessage();
		}

	}
	public function create(){

		try{
			
			return view('admin.label.create');
		}
			catch (\Exception $e) 
		{
			$errormessage = $e->getMessage();
			return view('errormessage', compact('errormessage'));
			return $e->getMessage();
		}


	}

	public function store(Request $req){		
		
		  $label=new Label();
          $label->name=$req->name;
	      $label->save();
		  return back()->with('message','Role created successfully..');
	
	}
	
    public function edit($id){	 
        $xmldata = simplexml_load_file("module.xml") or die("Failed to load");
		$id=$id;
		$module['module']=$xmldata;
		$module['status']=DB::select(DB::raw("select  status  from labels where id={$id}"))[0]->status;
		
		$module['selected']=DB::select(DB::raw("select  *  from  labe_module where label_id={$id}"));
		foreach($module['selected'] as $key=>$selected){
			$arr[$key]=$selected->module_id;
		
			$arr1[$selected->module_id]['functions']=$selected->functions;
		}
		 if(isset($arr)>0){
		$module['selected']=$arr;
		 }
		 if(isset($arr1)>0){
		$module['sel']=$arr1;
		 }
		
		$module['id']=$id;

		return view('admin.label.edit',compact('module'));
          
	}
	
	public function update(Request $request, $id){
		$module['module']=DB::select(DB::raw("select  *  from  labe_module"));
		Labelmodule::where('label_id',$_POST['id'])->delete();
        if(isset($_POST['module_id'])){
		foreach($_POST['module_id'] as $module){
			$label=new Labelmodule();
			$label->label_id=$_POST['id'];
			$label->module_id=$module;
			$label->functions=isset($_POST[$module.'_function'])?$_POST[$module.'_function']:0;
			$label->save();
		}
		 $new=Label::find($_POST['id']);
		 $new->status=$_POST['status'];
		 $new->save();

		 
		  
		//return redirect('label_define_module/'.$_POST['id']);
        return redirect('admin/role/'.$_POST['id'].'/edit');
	      }
	}

 public function labeldetail($id)
 {
       if(Auth::user()->role==1){
	 $label=Label::where('id',$id)->first();
	 return $label;
       }
 }
	

	public function notification_role()
	{
		 try{
		$notification_details = Labelmodule::
		                         // where('notification_status',0)
		                         groupby('label_id')
		                         ->orderby('created_at','desc')
		                        ->get();
		foreach ($notification_details as $key => $value) {
			$notification_details[$key]->rolename = Label::where('id',$value->label_id)
			                                        ->first()->name;
			if($value->functions==0)
			{
             $p = 'View';
			}
			else
		    {
            $p = 'Modify';
		    }
			$notification_details[$key]->permision = $p;
			$notification_details[$key]->module_name = "Module Name";
			$notification_details[$key]->countnots = Labelmodule::
			                               where('label_id',$value->label_id)->count();

		}
		$notification = Labelmodule::select('label_id')
		                     ->where('notification_status',0)
		                     ->groupby('label_id')
		                     ->get();
		$countnotification = count($notification);
		return view('admin.Label/notificationRole',compact('countnotification','notification_details'));
	     
		       }
catch(\Exception $e)
        {
           return $e->getMessage();
        }

	

	}
	
public function permision_access($id)
{ 

	$id = base64_decode($id);
	
			 try{
		$notification_details = Labelmodule::

		                         // where('notification_status',0)
		                         where('label_id',$id)
		                         // ->groupby('label_id')
		                         ->orderby('created_at','desc')
		                        ->get();
		  $rolename = Label::where('id',$id)->first()->name;
		foreach ($notification_details as $key => $value) {
			$notification_details[$key]->rolename = Label::where('id',$value->label_id)
			                                        ->first()->name;
			if($value->functions==0)
			{
             $p = 'View';
			}
			else
		    {
            $p = 'Modify';
		    }
			$notification_details[$key]->permision = $p;
			$notification_details[$key]->module_name = Module::where('moduleid',$value->module_id)
			                                           ->first()->name;

		}
		$notification = Labelmodule::select('label_id')
		                     ->where('notification_status',0)
		                     ->groupby('label_id')
		                     ->get();
		$countnotification = count($notification);

		              Labelmodule::where('label_id',$id)
		                     ->update(['notification_status'=>1]);
		                     
		return view('admin.Label/permision',compact('countnotification','notification_details','rolename'));
	     
		       }
catch(\Exception $e)
        {
           return $e->getMessage();
        }



}

}
