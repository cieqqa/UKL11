<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\BusinessRequest;

class BusinessRequestApplicantNotified extends Mailable
{
    use Queueable, SerializesModels;

    public $requestModel;
    public $isExistingAccount;
    public $status;

    public function __construct(BusinessRequest $requestModel, bool $isExistingAccount = false, string $status = 'approved')
    {
        $this->requestModel = $requestModel;
        $this->isExistingAccount = $isExistingAccount;
        $this->status = $status;
    }

    public function build()
    {
        $subject = $this->status === 'approved' ? 'Status Permintaan Pendaftaran PT/CV Anda - Disetujui' : 'Status Permintaan Pendaftaran PT/CV Anda - Ditolak';
        return $this->subject($subject)
                    ->view('emails.business-request-applicant')
                    ->with([
                        'req' => $this->requestModel,
                        'isExistingAccount' => $this->isExistingAccount,
                        'status' => $this->status,
                    ]);
    }
}
