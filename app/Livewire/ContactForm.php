<?php

namespace App\Livewire;

use App\Models\Inquiry;
use App\Models\Service;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $service_id = '';
    public $message;
    public $honeypot;
    public $successMessage = false;

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|max:50',
        'service_id' => 'nullable|exists:services,id',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        if (!empty($this->honeypot)) {
            return; // Spam protection
        }

        $this->validate();

        Inquiry::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'service_id' => $this->service_id ?: null,
            'subject' => 'Website Contact',
            'message' => $this->message,
            'status' => 'new'
        ]);

        $this->reset(['name', 'email', 'phone', 'service_id', 'message']);
        $this->successMessage = true;
    }

    public function render()
    {
        return view('livewire.contact-form', [
            'services' => Service::where('is_active', true)->orderBy('sort_order')->get()
        ]);
    }
}
