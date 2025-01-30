<?php

namespace App\Services;

use App\Models\StaffDocument;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class StaffDocumentService extends UserService
{
    public function __construct(protected StaffDocument $staffDocument) {}
    public function getStaffDocuments($id)
    {
        return $this->staffDocument->where('user_id', $id)->latest()->paginate(15);
    }
    public function getStaffDocument($id)
    {
        if (!$this->staffDocument->whereId($id)->exists()) {
            throw new ModelNotFoundException("Next of kin not found.");
        }
        return $this->staffDocument->find($id);
    }
    public function store($data)
    {
        return $this->staffDocument->create($data);
    }
    public function update($data)
    {
        $id = $data['id'];
        unset($data['id']);

        return $this->staffDocument->whereId($id)->update($data);
    }
    public function destroy($id)
    {
        if (!$this->staffDocument->whereId($id)->exists()) {
            throw new ModelNotFoundException("Next of kin not found.");
        }
        $this->staffDocument->whereId($id)->delete();
    }
}
