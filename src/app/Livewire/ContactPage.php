<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactPage extends Component
{
    public string $name    = '';
    public string $email   = '';
    public string $phone   = '';
    public string $location = '';
    public string $subject = '';
    public string $message = '';

    protected array $rules = [
        'name'     => 'required|min:2|max:100',
        'email'    => 'required|email',
        'phone'    => 'required|min:10|max:15',
        'location' => 'required|min:2|max:100',
        'subject'  => 'required|min:3|max:200',
        'message'  => 'required|min:10',
    ];

    public function submit(): void
    {
        $this->validate();

        Contact::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'phone'    => $this->phone,
            'location' => $this->location,
            'subject'  => $this->subject,
            'message'  => $this->message,
            'status'   => 'unread',
        ]);

        $this->reset();
        session()->flash('success', 'Pesan berhasil dikirim! Kami akan merespons dalam 24 jam.');
    }

    public function render()
    {
        return view('livewire.contact-page')
            ->layout('layouts.app');
    }
}