<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffDocument\StoreRequest;
use App\Services\StaffDocumentService;
use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffDocumentController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffDocumentService $staffDocumentService) {}

    public function view($id)
    {
        $data = [
            'pageTitle' => 'Documents',
            'user' => $this->staffService->getStaff($id),
            'documents' => $this->staffDocumentService->getStaffDocuments($id),
        ];
        return view('pages.staffs.document.index', $data);
    }

    public function store(StoreRequest $request)
    {
        try {
            $validatedData = $request->all();

            if ($request->hasFile('file')) {
                $filePath = FileHelper::uploadsImage('file', $request, 'documents');
                $validatedData['file'] = $filePath;
            }

            $this->staffDocumentService->store($validatedData);

            return redirect()->back()->with("success", "Document saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful, " . $ex->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $this->staffDocumentService->destroy($id);

            return redirect()->back()->with("success", value: "Document deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
