<?php

namespace App\Http\Livewire;

use App\Models\Day;
use App\Models\Frequency;
use App\Models\Time;
use App\Models\Appointment;
use Livewire\Component;

class ScheduleService extends Component
{
    public $selectedFrequency;
    public $startDate;
    public $selectedDays=[];
    public $selectedTime;
    public $notes;
    protected $rules = [
        'selectedFrequency' => 'required',
        'startDate' => 'required',
        'selectedDays' => 'required',
        'selectedTime' => 'required',
        'notes' => 'max:200',
    ];

    protected $messages = [
        'selectedFrequency.required' => 'Please select frequency of visit',
        'startDate.required' => 'Please select start date',
        'selectedDays.required' => 'Please select atleast one',
        'selectedTime.required' => 'Please select time of visit',
    ];


    public function render()
    {
        return view('livewire.schedule-service')
            ->with([
                'times' => Time::where('active', '1')->orderBy('id', 'ASC')->get(),
                'frequencies' => Frequency::where('active', '1')->orderBy('description', 'ASC')->get(),
                'days' => Day::where('active', '1')->orderBy('id', 'ASC')->get(),
            ]);
    }

    public function save(){
        $this->validate();

        $appointment= Appointment::create([
            'frequency_id'=>$this->selectedFrequency,
            'start_date'=>$this->startDate,
            'time_id'=>$this->selectedTime,
            'notes'=>$this->notes
        ]);
        $appointment->days()->attach($this->selectedDays);
        // Clear fields and set success message
        $this->selectedFrequency = null;
        $this->startDate = null;
        $this->selectedDays = [];
        $this->selectedTime = null;
        $this->notes = '';

        $this->dispatchBrowserEvent('showSuccessModal');

    }
}
