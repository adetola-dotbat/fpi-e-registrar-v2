<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\Csv\Reader;
use Illuminate\Http\Request;


class UploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload_csv');
    }
    public function importUsersFromCsv($filePath)
    {
        // Load the CSV file
        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0); // Assuming the first row contains headers

        // Read records
        $records = $csv->getRecords();

        foreach ($records as $record) {
            // Map data to the database columns
            $userData = [
                'id' => Str::uuid(),
                'title' => $record['title'] ?? null,
                'surname' => $record['surname'] ?? null,
                'first_name' => $record['firstname'] ?? null,
                'other_name' => $record['othername'] ?? null,
                'email' => $record['email'] ?? null,
                'gender' => $record['gender'] ?? null,
                'dob' => $record['dob'] ?? null,
                'marital_status' => $record['marital_status'] == 1 ? 'Single' : ($record['marital_status'] == 2 ? 'Married' : null),
                'nationality' => $record['nationality'] ?? null,
                'gpz' => $record['gpz'] ?? null,
                'state_of_origin' => $record['state_of_origin'] ?? null,
                'local_government' => $record['local_government'] ?? null,
                'home_address' => $record['home_address'] ?? null,
                'postal_address' => $record['postal_address'] ?? null,
                'phone_no' => $record['phone_no'] ?? null,
                'employment_status' => $record['employment_status'] ?? null,
                'status' => $record['status'] ?? null,
                'passport' => $record['passport'] ?? null,
                'password' => Hash::make($record['password'] ?? 'default_password'), // Hash the password
                'email_verified_at' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Insert or update user in the database
            DB::table('users')->updateOrInsert(
                ['email' => $userData['email']], // Unique identifier for updating
                $userData
            );
        }
    }

    // public function uploadCsv(Request $request)
    // {
    //     $request->validate([
    //         'csv_file' => 'required|mimes:csv,txt|max:2048',
    //     ]);

    //     try {
    //         $filePath = $request->file('csv_file')->store('uploads');

    //         $this->importUsersFromCsv(storage_path('app/' . $filePath));

    //         return back()->with('success', 'CSV file uploaded and data imported successfully.');
    //     } catch (\Exception $e) {
    //         return back()->with('error', 'Error importing data: ' . $e->getMessage());
    //     }
    // }

    public function uploadCsv(Request $request)
    {

        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);
        try {
            $file = $request->file('csv_file');
            $path = $file->getRealPath();

            $data = array_map('str_getcsv', file($path));
            $header = array_shift($data);
            foreach ($data as $row) {
                $userData = array_combine($header, $row);

                \App\Models\User::create([
                    'id' => $userData['id'] ?? null,
                    'title' => $userData['title'] ?? null,
                    'surname' => $userData['surname'] ?? null,
                    'first_name' => $userData['firstname'] ?? null,
                    'other_name' => $userData['othername'] ?? null,
                    'email' => $userData['email'] ?? null,
                    'gender' => $userData['gender'] ?? null,
                    'dob' => $userData['dob'] ?? null,
                    'marital_status' => $userData['marital_status'] ?? null,
                    'nationality' => $userData['nationality'] ?? null,
                    'gpz' => $userData['gpz'] ?? null,
                    'state_of_origin' => $userData['state_of_origin'] ?? null,
                    'local_government' => $userData['local_government'] ?? null,
                    'home_address' => $userData['home_address'] ?? null,
                    'postal_address' => $userData['postal_address'] ?? null,
                    'phone_no' => $userData['phone_no'] ?? null,
                    'employment_status' => $userData['employment_status'] ?? null,
                    'status' => $userData['status'] ?? null,
                    'employee_file_no' => $userData['employee_file_no'] ?? null,
                    'reg_on_complete' => $userData['reg_on_complete'] ?? null,
                    'shortlist' => $userData['shortlist'] ?? null,
                    'passport' => $userData['passport'] ?? null,
                    'password' =>  $userData['password'] ?? null,
                    'email_verified_at' => null,
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return back()->with('success', 'CSV file uploaded and data imported successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error importing data: ' . $e->getMessage());
        }
    }

    public function uploadStaffCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        try {
            $file = $request->file('csv_file');
            $path = $file->getRealPath();

            $data = array_map('str_getcsv', file($path));
            $header = array_shift($data);

            foreach ($data as $row) {
                $staffData = array_combine($header, $row);

                \App\Models\StaffDetail::create([
                    'user_id' => $staffData['user_id'] ?? null,
                    'staff_file_no' => $staffData['staff_file_no'] ?? null,
                    'date_of_assumption' => $staffData['date_of_assumption'] === 'NULL' ? null : $staffData['date_of_assumption'],
                    'date_of_presence' => $staffData['date_of_presence'] === 'NULL' ? null : $staffData['date_of_presence'],
                    'staff_type' => $staffData['staff_type'] ?? null,
                    'post_offered' => $staffData['post_offered'] ?? null,
                    'post_applied' => $staffData['post_applied'] ?? null,
                    'department' => $staffData['department'] ?? null,
                    'current_post' => $staffData['current_post'] ?? null,
                    'current_department' => $staffData['current_department'] ?? null,
                    'salary' => $staffData['salary'] ?? null,
                    'current_salary' => $staffData['current_salary'] ?? null,
                    'grade_level' => $staffData['grade_level'] ?? null,
                    'onleave_return' => $staffData['onleave_return'] === 'NULL' ? null : $staffData['onleave_return'],
                    'appointment_type' => $staffData['appointment_type'] ?? null,
                    'staff_step_id' => $staffData['staff_step_id'] === 'NULL' ? null : $staffData['staff_step_id'],
                    'staff_cadre_id' => $staffData['staff_cadre_id'] === 'NULL' ? null : $staffData['staff_cadre_id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return back()->with('success', 'CSV file uploaded and staff details imported successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error importing data: ' . $e->getMessage());
        }
    }

    public function uploadSchoolAttendedCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        try {
            $file = $request->file('csv_file');
            $path = $file->getRealPath();

            $data = array_map('str_getcsv', file($path));
            $header = array_shift($data);

            foreach ($data as $row) {
                $schoolData = array_combine($header, $row);

                \App\Models\StaffInstitutionAttended::create([
                    'user_id' => $schoolData['user_id'] ?? null,
                    'school_name' => $schoolData['school_name'] ?? null,
                    'course_study' => $schoolData['course_study'] ?? null,
                    'qualification' => $schoolData['qualification'] ?? null,
                    'certificate' => $schoolData['certificate'] ?? null,
                    'date_obtained' => $schoolData['date_obtained'] === 'NULL' ? null : $schoolData['date_obtained'],
                    'count' => $schoolData['count'] ?? 0,
                    'approved_status' => $schoolData['approved_status'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return back()->with('success', 'CSV file uploaded and school attendance details imported successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error importing data: ' . $e->getMessage());
        }
    }

    public function uploadProfessionalDetails(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        try {
            $file = $request->file('csv_file');
            $path = $file->getRealPath();

            $data = array_map('str_getcsv', file($path));
            $header = array_shift($data);

            foreach ($data as $row) {
                $schoolData = array_combine($header, $row);

                \App\Models\StaffProfessionalDetails::create([
                    'user_id' => $schoolData['user_id'] ?? null,
                    'professional_name' => $schoolData['professional_name'] ?? null,
                    'employee_id' => $schoolData['employee_id'] ?? null,
                    'certificate' => $schoolData['certificate'] ?? null,
                    'year' => $schoolData['year'] ?? null,

                    'status' => $schoolData['approval_status'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return back()->with('success', 'CSV file uploaded and school attendance details imported successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error importing data: ' . $e->getMessage());
        }
    }
}
