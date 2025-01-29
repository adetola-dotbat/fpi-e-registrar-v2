<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Services\StaffProfessionalDetailsService;
use App\Http\Requests\ProfessionalDetails\StoreRequest;
use App\Models\StaffProfessionalDetails;
use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffProfessionalDetailsController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffProfessionalDetailsService $staffProfessionalDetailsService) {}

    public function view($id)
    {
        $data = [
            'pageTitle' => 'Professional Body',
            'user' => $this->staffService->getStaff($id),
            'professionals' => $this->staffProfessionalDetailsService->getStaffProfessionalDetails($id),
        ];
        return view('pages.staffs.professionalDetails.index', $data);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->all();

            if ($request->hasFile('certificate')) {
                $filePath = FileHelper::uploadsImage('certificate', $request, 'upload/profession_body');
                $validatedData['certificate'] = $filePath;
            }

            $this->staffProfessionalDetailsService->store($validatedData);

            return redirect()->back()->with("success", "Professional details saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful, " . $ex->getMessage());
        }
    }
    public function approve($id)
    {
        try {

            $this->staffProfessionalDetailsService->approve($id);

            return redirect()->back()->with("success", value: "Record status updated to approved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
    public function decline($id)
    {
        try {

            $this->staffProfessionalDetailsService->decline($id);

            return redirect()->back()->with("success", value: "Record declined successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $this->staffProfessionalDetailsService->destroy($id);

            return redirect()->back()->with("success", value: "Professional details deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
