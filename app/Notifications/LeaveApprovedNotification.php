<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeaveApprovedNotification extends Notification
{
    use Queueable;

    protected $leave;

    /**
     * Create a new notification instance.
     */
    public function __construct($leave)
    {
        $this->leave = $leave;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database']; // Use 'database' for in-app notifications
    }

    /**
     * Get the array representation of the notification.
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Your leave request has been approved.',
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
