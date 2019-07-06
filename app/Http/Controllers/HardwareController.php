<?php

namespace App\Http\Controllers;
use App\Hardware; 

use Illuminate\Http\Request;

class HardwareController extends Controller
{
    public function __construct(){
        /*$this->middleware(['permission:link.update'])->only(['update', 'edit']);
        $this->middleware(['permission:link.create'])->only(['create', 'store']);
        $this->middleware(['permission:link.list'])->only(['index']);
        $this->middleware(['permission:link.destroy'])->only(['destroy']);*/
        $this->middleware('auth');
    }
    
        public function index() {
            $hardwares = Hardware::paginate(20);
            return view('hardware-all', compact('hardwares'));
        }
    
    
        public function create(){
            return view('hardware-create');
        }
    
        public function store(Request $request) {
            $make = $request->all();
            Hardware::create($make);
            Session::flash('snackbar-success', 'Link creado correctamente');
            return Redirect::to('/backend/menu');
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Entities\Links  $hardware
         * @return \Illuminate\Http\Response
         */
        public function edit($id){
           return  $hardware = Hardware::findOrFail($id);
            $allHardware = Hardware::all();
            //return view('backend.links.update', compact('hardware', 'allHardware'));
        }
    
        public function update(Request $request, $id)    {
        $make = $request->all();
        Hardware::findOrFail($id)->update([
            'url' => $make['url'],
            'name' => $make['name'],
            'icon' => $make['icon'],
            'target' => $make['target'],
            'description' => $make['description'],
            'visible' => $make['visible'],
            'location' => $make['location'],
            'notes' => $make['notes'],
            'parent_id' => $make['parent_id'],
        ]);
    
        Session::flash('snackbar-success', 'Link Actualizado correctamente');
        return Redirect::to('/backend/menu');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Entities\Links  $hardware
         * @return \Illuminate\Http\Response
         */
        public function destroy($id, Request $request) {
        $force = $request->input('force');
            $options = Hardware::findOrFail($id);
            if($force == 1){
            $options->forceDelete();
                Session::flash('snackbar-warning', 'El usuario se ha Eliminado totalmente');
                return Redirect::to('/backend/menu');
            }
            $options->delete();
            Session::flash('snackbar-warning', 'El usuario se ha envíado a la papelera');
            return Redirect::to('/backend/menu');
        }
    
      
}
