<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UploadRepository;
use App\Http\Requests\UploadRequest;

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
            $image->move('./images', $image->getClientOriginalName());
            return redirect('uploads');
        }
        return false;
    }

    public function edit($id)
    {
        $result = $this->uploadRepository->edit($id);
        if (empty($result)) {
            abort(404);
        }
        return view('admin.edit')->with('uploads', $result);
    }

    public function update(Request $request, $id)
    {
        $image = $request->file('file');
        $result = $this->uploadRepository->update($image, $id);
        if ($result) {
            $image->move('./images', $image->getClientOriginalName());
            return redirect('uploads');
        }
        return false;
    }

    public function destroy(Request $request)
    {
      $selectedIds = $request->input('selectedIds');
        $selectedIds = explode(',', $selectedIds);
        $numDeleted = $this->uploadRepository->destroy($selectedIds);
        if ($numDeleted > 0) {
            return redirect('/uploads');
        }
        return false;
    }

}
