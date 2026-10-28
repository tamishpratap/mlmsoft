<div id="demoModal" class="modal-overlay" data-auto-open="1400" aria-hidden="true">
    <div class="modal-content" role="dialog" aria-modal="true" aria-labelledby="demoModalTitle">
        <button class="modal-close" type="button" aria-label="Close demo form">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <div class="modal-header">
            <img src="{{ asset('logo/logo.png') }}" alt="MLM Software company logo" class="modal-logo">
        </div>

        <div class="modal-body">
            <h2 id="demoModalTitle">Book Your Free MLM Software Demo</h2>
            <p>
                Share your plan type and we will show how wallet automation, genealogy, payout flows, and custom AI
                modules can fit your platform.
            </p>

            @if (session()->has('successMsg'))
                <div class="alert alert-success mb-4">
                    {{ session()->get('successMsg') }}
                </div>
            @endif
            @if (session()->has('failedMsg'))
                <div class="alert alert-danger mb-4">
                    {{ session()->get('failedMsg') }}
                </div>
            @endif
        </div>

        <form id="demoForm" action="{{ route('frontend.get-demo') }}" method="POST" class="modal-form">
            @csrf

            <label class="form-group">
                <input class="form-input" type="text" name="name" placeholder="Full Name" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>

            <label class="form-group">
                <input class="form-input" type="email" name="email" placeholder="Email" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>

            <label class="form-group">
                <input class="form-input" type="text" name="mobile" placeholder="Mobile" required
                    onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                @error('mobile')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>

            <label class="form-group">
                <select class="form-input" name="plan" required>
                    <option value="">Select Plan</option>
                    <option value="Binary Plan">Binary Plan</option>
                    <option value="Generation Plan">Generation Plan</option>
                    <option value="Matrix Plan">Matrix Plan</option>
                    <option value="Unilevel Plan">Unilevel Plan</option>
                    <option value="Board Plan">Board Plan</option>
                    <option value="Crypto Plan">Crypto MLM</option>
                    <option value="Single Leg Plan">Single Leg MLM</option>
                    <option value="Investment Plan">Investment MLM</option>
                    <option value="Repurchase Plan">Repurchase MLM</option>
                    <option value="AI Integration Module">AI Integration Module</option>
                    <option value="Mobile App Add-On">Mobile App Add-On</option>
                </select>
                @error('plan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>

            <button class="form-submit" type="submit">
                @include('frontend.partials.icon', ['name' => 'calendar'])
                Send Demo Request
            </button>
            <p class="modal-secure-note">Your details are used only for consultation and demo coordination.</p>
        </form>
    </div>
</div>
