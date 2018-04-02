<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\EmailSubscribeRepository;
use Excel;

class EmailSubscribeController extends Controller
{
    protected $email;

    public function __construct(EmailSubscribeRepository $email)
    {
        $this->email = $email;
    }

    public function getIndex()
    {
        $email = $this->email->paginate(10);
        return view('Admin::pages.email.index', compact('email'));
    }

    public function download(Request $request)
    {
        $filename = 'eyluxlashes_'.time();
        $data = $this->email->all(['id', 'email', 'created_at']);
        Excel::create($filename, function($excel) use ($data){
            $excel->sheet('Subscribe List', function($sheet) use ($data){
                $sheet->fromModel($data,null,'A1',false, false);

                $sheet->prependRow(1, array(
                    'ID', 'EMAIL', 'CREATE DATE'
                ));
                $sheet->setHeight(1, 25);
                $sheet->row(1, function ($row){
                    $row->setBackground('#6fcef7');
                    $row->setFontWeight('bold');
                    $row->setFontColor('#FFFFFF');
                    $row->setAlignment('center');
                    $row->setValignment('center');
                });

                $sheet->freezeFirstRow();

            });
        })->download('xls');

        return back()->with('success', 'Download Successful');
    }
}
