<div>
    <div class="row mb-3">
        <div class="col-md-6">
            <h5>Frequency</h5>
            <div class="btn-group w-100">
                @foreach ($frequencies as $frequency)
                    <input type="radio" class="btn-check" name="frequency" id="{{ $frequency->description }}" autocomplete="off" wire:model="selectedFrequency" value="{{ $frequency->id }}" />
                    <label class="btn btn-outline-primary" for="{{ $frequency->description }}">{{ $frequency->description }}</label>
                @endforeach
            </div>
            @if($errors->has('selectedFrequency'))
            <span class="text-danger">{{ $errors->first('selectedFrequency') }}</span>
            @endif
        </div>
        <div class="col-md-6">
            <h5>Start Date</h5>
            <input type="date" id="startDate" wire:model="startDate" class="form-control border-primary" min="{{ date('Y-m-d') }}">
            @if($errors->has('startDate'))
            <span class="text-danger">{{ $errors->first('startDate') }}</span>
            @endif
        </div>
    </div>
    <div class="mb-3">
        <h5>Days</h5>
        <div class="btn-group w-100">
            @foreach ($days as $day)
                <input type="checkbox" class="btn-check" name="days[]" id="{{ $day->description }}" autocomplete="off" wire:model="selectedDays" value="{{ $day->id }}" />
                <label class="btn btn-outline-primary w-100" for="{{ $day->description }}">{{ $day->description }}</label>
            @endforeach
        </div>
        @if($errors->has('selectedDays'))
        <span class="text-danger">{{ $errors->first('selectedDays') }}</span>
        @endif
    </div>
    <div class="mb-3">
        <h5>Times</h5>
        <div class="btn-group w-100">
            @foreach ($times as $time)
                <input type="radio" class="btn-check" name="selectedTime" id="{{ $time->description }}" autocomplete="off" wire:model="selectedTime" value="{{ $time->id }}" />
                <label class="btn btn-outline-primary w-100" for="{{ $time->description }}">{{ $time->description }}</label>
            @endforeach
        </div>
        @if($errors->has('selectedTime'))
        <span class="text-danger">{{ $errors->first('selectedTime') }}</span>
        @endif
    </div>
    <div class="mb-5">
        <h5>Notes for your sitter</h5>
        <textarea class="form-control border-primary " id="notes" rows="5" wire:model="notes"></textarea>
        @if($errors->has('notes'))
        <span class="text-danger">{{ $errors->first('notes') }}</span>
        @endif
    </div>
    <div class="center d-flex justify-content-center">
        <button class="schedule-button-black" wire:click="save">Schedule Service</button>
    </div>
    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Service Scheduled Successfully</h5>
                    <button type="button" class="close" style="font-size: 18px;font-weight: bold;border: none;" data-dismiss="modal" aria-label="Close" onclick="hideSuccessModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Thank you
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="hideSuccessModal()">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    window.addEventListener('showSuccessModal', (e) => {
        $('#successModal').modal('show');
    });

    function showSuccessModal() {
        $('#successModal').modal('show');
    }
    function hideSuccessModal() {
        $('#successModal').modal('hide');
    }
</script>
