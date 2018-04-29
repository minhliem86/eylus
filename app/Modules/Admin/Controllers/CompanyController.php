<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{
    public function getInformation(CompanyRepository $companyRepo, Request $request)
    {
        if($request->isMethod('put')){
            $inst = $companyRepo->query(['email', 'address', 'phone', 'id'])->first();
            $inst->email = $request->input('email');
            $inst->address = $request->input('address');
            $inst->phone = $request->input('phone');
            $inst->save();

            return redirect()->back()->with('success', 'Saved !');
        }
        if($request->isMethod('post')){
            $data = [
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
            ];
            $rs = $companyRepo->create($data);
            if(!$rs){
                return redirect()->back()->with('error', 'Fail to save !');
            }
            return redirect()->back()->with('success', 'Saved !');
        }
        $inst = $companyRepo->query(['email', 'address', 'phone', 'id'])->first();
        // dd($inst);
        return view('Admin::pages.company.index', compact('inst'));
    }
}
