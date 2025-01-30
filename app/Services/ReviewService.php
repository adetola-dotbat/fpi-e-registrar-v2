<?php

namespace App\Services;

use App\Models\Review;
use App\Models\StaffDocument;
use App\Models\User;
use App\Notifications\ReviewNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;

class ReviewService extends UserService
{
    public function __construct(protected Review $review) {}

    public function all()
    {
        return $this->review->latest()->paginate(10);
    }
    public function getStaffReviews($id)
    {
        return $this->review->where('user_id', $id)->get();
    }

    public function getStaffReview($id)
    {
        if (!$this->review->whereId($id)->exists()) {
            throw new ModelNotFoundException("Next of kin not found.");
        }
        return $this->review->find($id);
    }
    public function store($data)
    {
        $staff = User::whereEmail($data['email'])->first();

        $data = Arr::only($data, ['message']);
        $data['user_id'] = $staff->id;
        $staff->notify(new ReviewNotification($data['message']));
        return $this->review->create($data);
    }
    public function update($data)
    {
        $id = $data['id'];
        unset($data['id']);

        return $this->review->whereId($id)->update($data);
    }
    public function destroy($id)
    {
        if (!$this->review->whereId($id)->exists()) {
            throw new ModelNotFoundException("Next of kin not found.");
        }
        $this->review->whereId($id)->delete();
    }
}
