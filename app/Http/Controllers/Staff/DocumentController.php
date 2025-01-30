<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\StaffDocumentService;
use App\Services\StaffService;
use Illuminate\Http\Request;
use App\Services\StaffProfessionalDetailsService;

class DocumentController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffDocumentService $staffDocumentService) {}

    public function index()
    {
        $data = [
            'pageTitle' => 'Documents',
            'user' => $this->staffService->getStaff(auth()->id()),
            'documents' => $this->staffDocumentService->getStaffDocuments(auth()->id()),
        ];
        return view('pages.staffs.document.documents', $data);
    }
}
