<div class="push-flow-wrapper reveal" id="howPushWorks">
    <div class="section-heading text-center">
        <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'broadcast']) Android Device Delivery</span>
        <h2>How Website Push Notifications Work</h2>
        <p class="section-lead">
            A reliable communication flow connecting website announcements directly to members' Android notification panels.
        </p>
    </div>

    <div class="push-flow-grid">
        <!-- Step 1 -->
        <div class="push-flow-card">
            <div class="push-step-badge">1</div>
            <div class="push-step-icon">
                @include('frontend.partials.icon', ['name' => 'edit'])
            </div>
            <h4>Create Notification</h4>
            <p>Admin creates an announcement with title, summary message, and optional click-through action in the website.</p>
        </div>

        <!-- Step 2 -->
        <div class="push-flow-card">
            <div class="push-step-badge">2</div>
            <div class="push-step-icon">
                @include('frontend.partials.icon', ['name' => 'users'])
            </div>
            <h4>Select Audience</h4>
            <p>The admin chooses all eligible members or a supported target audience according to configured rules.</p>
        </div>

        <!-- Step 3 -->
        <div class="push-flow-card">
            <div class="push-step-badge">3</div>
            <div class="push-step-icon">
                @include('frontend.partials.icon', ['name' => 'broadcast'])
            </div>
            <h4>Dispatch to Devices</h4>
            <p>The existing notification system dispatches the notification to eligible, supported Android devices.</p>
        </div>

        <!-- Step 4 -->
        <div class="push-flow-card">
            <div class="push-step-badge">4</div>
            <div class="push-step-icon">
                @include('frontend.partials.icon', ['name' => 'bell'])
            </div>
            <h4>Android Panel & Grouping</h4>
            <p>Members view notifications in their Android shade with native grouping and tap to open the website.</p>
        </div>
    </div>

    <div class="push-notice-box">
        <span class="notice-icon">@include('frontend.partials.icon', ['name' => 'shield'])</span>
        <div class="notice-text">
            <strong>Delivery & Compatibility Notice:</strong>
            <span>
                Notifications appear in the Android notification panel under the site identity without requiring members to keep the website open. Actual delivery and multi-notification grouping depend on active user notification permissions, device settings, supported Android browsers, and connectivity.
            </span>
        </div>
    </div>
</div>
