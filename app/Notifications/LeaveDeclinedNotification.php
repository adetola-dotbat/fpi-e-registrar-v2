<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeaveDeclinedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $leave;

    public function __construct($leave)
    {
        $this->leave = $leave;
    }

    public function via($notifiable)
    {
        return ['database']; // In-app notification
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Your leave request has been declined.',
            'leave_id' => $this->leave->id,
            'start_date' => $this->leave->date_leave_requested,
            'end_date' => $this->leave->date_resume_duty,
            'status' => $this->leave->status,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
