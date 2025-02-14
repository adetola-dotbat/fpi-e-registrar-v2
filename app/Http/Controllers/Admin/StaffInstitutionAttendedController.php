<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffInstitutionAttended\StoreRequest;
use App\Http\Requests\StaffInstitutionAttended\UpdateRequest;
use App\Models\StaffInstitutionAttended;
use App\Services\StaffInstitutionAttendedService;
use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffInstitutionAttendedController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffInstitutionAttendedService $staffInstitutionAttendedService) {}

    public function view($id)
    {

        $data = [
            'pageTitle' => 'Institution Attended',
            'user' => $this->staffService->getStaff($id),
            'institutions' => $this->staffInstitutionAttendedService->getStaffInstitutionAttends($id),
        ];
        // dd($data);
        return view('pages.staffs.institutionAttended.index', $data);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->all();

            if ($request->hasFile('certificate')) {
                $filePath = FileHelper::uploadsImage('certificate', $request, 'upload/school_certificates');
                $validatedData['certificate'] = $filePath;
            }

            $this->staffInstitutionAttendedService->store($validatedData);

            return redirect()->back()->with("success", "Institution attended saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful, " . $ex->getMessage());
        }
    }
    public function approve($id)
    {
        try {

            $this->staffInstitutionAttendedService->approve($id);

            return redirect()->back()->with("success", value: "Institution status updated to approved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
    public function decline($id)
    {
        try {

            $this->staffInstitutionAttendedService->decline($id);

            return redirect()->back()->with("success", value: "Institution status declined successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
    public function update(UpdateRequest $request)
    {
        try {
            $this->staffInstitutionAttendedService->update($request->validated());

            return redirect()->back()->with("success", value: "Institution attended updated successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
    public function destroy($id)
    {
        try {

            $this->staffInstitutionAttendedService->destroy($id);

            return redirect()->back()->with("success", value: "Institution attended deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
