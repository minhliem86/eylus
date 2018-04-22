<?php

namespace App\Modules\Client\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Session;
use App\Repositories\CompanyRepository;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{
    protected $contact;

    public function __construct(ContactRepository $contact)
    {
        $this->contact = $contact;
    }

    private function _rules(){
        return [
          'fullname' => 'required',
          'phone' => 'required',
            'email' => 'required|email'
        ];
    }

    private function _message(){
        return [
          'fullname.required' => 'Vui lòng nhập tên',
          'phone.required' => 'Vui lòng nhập số điện thoại',
            'email.required' => 'Vui lòng nhập địa chỉ email',
            'email.email' => 'Vui lòng nhập định dạng email abc@...'

        ];
    }

    public function getIndex(CompanyRepository $company)
    {
        $companies = $company->find(1);
        return view('Client::pages.contact.index', compact('companies'));
    }

    public function postIndex(Request $request)
    {
        $valid = Validator::make($request->all(), $this->_rules(), $this->_message());
        if($valid->fails()){
            return redirect()->back()->withInput()->withErrors($valid->errors());
        }
        $data = [
            'fullname' => $request->input('fullname'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'messages' => $request->input('messages')
        ];

        $this->contact->create($data);
        return redirect()->route('client.contact.thankyou')->with('status',true);
    }

    public function getThankyou()
    {
        if(Session::has('status')){
            return view('Client::pages.contact.thankyou');
        }else{
            return redirect()->route('client.contact');
        }
    }
}
