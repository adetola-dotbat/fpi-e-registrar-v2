<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffInstitutionAttended\StoreRequest;
use App\Http\Requests\StaffInstitutionAttended\UpdateRequest;
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
        return view('pages.staffs.institutionAttended.index', $data);
    }

    public function store(StoreRequest $request)
    {
        try {
            $validatedData = $request->all();

            if ($request->hasFile('certificate')) {
                $filePath = FileHelper::uploadsImage('certificate', $request, 'school_certificate');
                $validatedData['certificate'] = $filePath;
            }

            $this->staffInstitutionAttendedService->store($validatedData);

            return redirect()->back()->with("success", "Institution attended saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful, " . $ex->getMessage());
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
