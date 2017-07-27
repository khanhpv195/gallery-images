<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UploadRepository;

class UploadController extends Controller
{

    private $uploadRepository;

    public function __construct(UploadRepository $uploadRepository)
    {
        $this->middleware('auth');
        $this->uploadRepository = $uploadRepository;
    }

    public function index()
    {
        $result = $this->uploadRepository->all();
        if ($result) {
            return view('admin.index')->with('uploads', $result);
        }
        return false;
    }

    public function create(Request $request)
    {
        return view('admin.upload');
    }

    public function upload(Request $request)
    {
        $image = $request->file('file');
        $result = $this->uploadRepository->upload($image);
        if ($result) {
            $image->move(public_path('images'), $image->getClientOriginalName());
            return redirect('uploads');
        }
        return "Upload fail";
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {
    }
}
