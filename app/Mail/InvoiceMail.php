<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Carbon\Carbon;

class InvoiceMail extends Mailable
{
    use Queueable;

    public $pdfPath;
    public $filename;
    public $startDate;
    public $endDate;

    /**
     * Create a new message instance.
     */
    public function __construct(string $pdfPath, string $filename, Carbon $startDate, Carbon $endDate)
    {
        $this->pdfPath = $pdfPath;
        $this->filename = $filename;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice from Continental Fashion Merchandising - ' .
                $this->startDate->format('d/m/Y') . ' to ' . $this->endDate->format('d/m/Y')
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.invoice',
            with: [
                'startDate' => $this->startDate->format('d/m/Y'),
                'endDate' => $this->endDate->format('d/m/Y')
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->pdfPath)
                ->as($this->filename)
                ->withMime('application/pdf')
        ];
    }
}
