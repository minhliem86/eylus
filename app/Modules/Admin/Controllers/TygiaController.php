<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TygiaRepository;

class TygiaController extends Controller
{

    public function getInformation(Request $request, TygiaRepository $tygia)
    {
        if($request->isMethod('put')){
            $inst = $tygia->query(['name', 'value'])->first();
            $inst->name = $request->input('name');
            $inst->value = floatval(str_replace(',','',$request->value));
            $inst->save();

            return redirect()->back()->with('success', 'Saved !');
        }
        if($request->isMethod('post')){
            $data = [
                'name' => $request->input('name'),
                'value' => floatval(str_replace(',','',$request->value)),
            ];
            $rs = $tygia->create($data);
            if(!$rs){
                return redirect()->back()->with('error', 'Fail to save !');
            }
            return redirect()->back()->with('success', 'Saved !');
        }
        $inst = $tygia->query(['name', 'value'])->first();
//         dd($inst);
        return view('Admin::pages.tygia.index', compact('inst'));
    }
}
