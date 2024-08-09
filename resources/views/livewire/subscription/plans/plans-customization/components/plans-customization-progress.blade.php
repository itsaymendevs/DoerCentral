{{-- progressBar --}}
<div class="progress progress--floating">
    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
        aria-valuenow="{{ $progressValue }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progressValue }}%">
    </div>
</div>