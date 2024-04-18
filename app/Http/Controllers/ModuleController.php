<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\History;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        return view('home', compact('modules'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('image'), $imageName);
            Module::create([
                'module_name' => $request->name,
                'module_description' => $request->description,
                'image'=>$imageName
            ]);
            // dd($request->all());
            return Redirect::route('history.create_detail')->with('message', 'Successfully create module.Now add some detail');
        }
        else{
            return back()->withErrors(['picture' => 'Une erreur est survenue lors du téléchargement de l\'image.'])->withInput();
        }
    }

    public function create_detail(){
        $module = Module::all();
        $random_measurement_value = mt_rand(-999999, 999999) / 100;
        $random_data_send = mt_rand(0, 999);
        return view('add_detail',compact('module','random_measurement_value','random_data_send'));
    }

    public function store_history(Request $request){

        
        $request->validate([
            'module_id'=>'required|int',
            'measurement_value' => 'required|numeric|between:-999999.99,999999.99', 
            'state' => 'required|max:200', 
            'data_sent' => 'required|max:255',
        ]);
        History::create([
            'module_id'=>$request->module_id,
            'history_measurement_date'=>date('Y-m-d'),
            'history_measurement_value'=>$request->measurement_value,
            'history_state'=>$request->state,
            'data_sent'=>$request->data_sent,
        ]);
        return Redirect::route('home')->with('message', 'Successfully adding module detail');
    }
}
    
