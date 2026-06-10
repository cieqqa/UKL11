<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\BusinessRequest;

class BusinessRequestStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    public $requestModel;
    public $status;
    public $password;
    public $needsPasswordReset;

    public function __construct(BusinessRequest $requestModel, string $status, string $password = null, bool $needsPasswordReset = false)
    {
        $this->requestModel = $requestModel;
        $this->status = $status;
        $this->password = $password;
        $this->needsPasswordReset = $needsPasswordReset;
    }

    public function build()
    {
        $subject = $this->status === 'approved' ? 'Pendaftaran PT/CV Disetujui' : 'Pendaftaran PT/CV Ditolak';
        return $this->subject($subject)
                    ->view('emails.business-request-status')
                    ->with([
                        'req' => $this->requestModel,
                        'status' => $this->status,
                        'password' => $this->password,
                        'needsPasswordReset' => $this->needsPasswordReset,
                    ]);
    }
}
