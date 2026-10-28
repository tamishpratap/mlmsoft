@php
    $questionnaireItems = [
        [
            'id' => 'welcome_q_nav',
            'feature' => 'AI Navigation Assistant',
            'icon' => 'compass',
            'color' => 'blue',
            'question' => 'Would you like AI to navigate your MLM software using voice or text commands?',
        ],
        [
            'id' => 'welcome_q_form',
            'feature' => 'AI Form Filler',
            'icon' => 'edit',
            'color' => 'cyan',
            'question' => 'Would you like AI to help fill supported forms automatically?',
        ],
        [
            'id' => 'welcome_q_chat',
            'feature' => 'AI Chat Assistant',
            'icon' => 'message',
            'color' => 'violet',
            'question' => 'Would you like to ask questions about your authorized member and account information using AI chat?',
        ],
        [
            'id' => 'welcome_q_plan',
            'feature' => 'AI Plan Explainer',
            'icon' => 'sitemap',
            'color' => 'blue',
            'question' => 'Would you like AI to explain your MLM plan, levels, and configured rules?',
        ],
        [
            'id' => 'welcome_q_voice',
            'feature' => 'AI Voice Talk',
            'icon' => 'mic',
            'color' => 'cyan',
            'question' => 'Would you like to talk to an AI assistant using supported voice features?',
        ],
        [
            'id' => 'welcome_q_push',
            'feature' => 'Website Notification Message',
            'icon' => 'bell',
            'color' => 'violet',
            'question' => 'Would you like to send website notification messages to all eligible or selected members?',
        ],
    ];
@endphp

<div id="welcomeQuestionnaireModal" class="welcome-modal-overlay" aria-hidden="true">
    <div class="welcome-modal-backdrop" data-welcome-close tabindex="-1"></div>

    <div class="welcome-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="welcomeModalTitle" aria-describedby="welcomeModalSubtitle" tabindex="-1">
        <!-- Close Button (Top Header) -->
        <button type="button" class="welcome-modal-close" data-welcome-close aria-label="Close welcome questionnaire">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <!-- Header -->
        <div class="welcome-modal-header">
            <div class="welcome-header-brand">
                <img src="{{ asset('logo/logo.png') }}" alt="MLM Software Logo" class="welcome-brand-logo">
                <span class="welcome-header-badge">
                    @include('frontend.partials.icon', ['name' => 'spark'])
                    Welcome Discovery
                </span>
            </div>
            <h2 id="welcomeModalTitle" class="welcome-modal-title">Looking for Smarter MLM Software?</h2>
            <p id="welcomeModalSubtitle" class="welcome-modal-subtitle">
                Explore the AI and notification capabilities available for your MLM platform.
            </p>
        </div>

        <!-- Scrollable Body with 6 Question Rows -->
        <div class="welcome-modal-body">
            <form id="welcomeQuestionnaireForm" class="welcome-questions-list" onsubmit="return false;">
                @foreach ($questionnaireItems as $item)
                    <div class="welcome-q-row">
                        <div class="welcome-q-main">
                            <div class="welcome-q-meta">
                                <span class="welcome-q-badge badge-{{ $item['color'] }}">
                                    @include('frontend.partials.icon', ['name' => $item['icon']])
                                    {{ $item['feature'] }}
                                </span>
                            </div>
                            <p class="welcome-q-text">{{ $item['question'] }}</p>
                        </div>

                        <div class="welcome-q-control" role="radiogroup" aria-label="{{ $item['feature'] }} preference">
                            <label class="welcome-toggle-label">
                                <input type="radio" name="{{ $item['id'] }}" value="yes" class="welcome-toggle-input">
                                <span class="welcome-toggle-pill pill-yes">
                                    @include('frontend.partials.icon', ['name' => 'check'])
                                    Yes
                                </span>
                            </label>
                            <label class="welcome-toggle-label">
                                <input type="radio" name="{{ $item['id'] }}" value="no" class="welcome-toggle-input">
                                <span class="welcome-toggle-pill pill-no">
                                    No
                                </span>
                            </label>
                        </div>
                    </div>
                @endforeach
            </form>

            <!-- Informational Disclaimer -->
            <div class="welcome-modal-disclaimer">
                <span class="disclaimer-icon">@include('frontend.partials.icon', ['name' => 'shield'])</span>
                <p>
                    <strong>Note:</strong> This questionnaire introduces platform capabilities and records visitor preferences locally. Selections do not activate software modules, submit a demo request, or configure your software.
                </p>
            </div>
        </div>

        <!-- Footer Actions -->
        <div class="welcome-modal-footer">
            <button type="button" class="btn welcome-btn-secondary" data-welcome-close>
                Close
            </button>
            <button type="button" class="btn welcome-btn-primary" data-welcome-save>
                <span>Continue to Website</span>
                @include('frontend.partials.icon', ['name' => 'arrow-right'])
            </button>
        </div>
    </div>
</div>

<script>
    (function () {
        const STORAGE_KEY = 'mlm_welcome_questionnaire_dismissed';
        const PREF_KEY = 'mlm_welcome_preferences';

        const modal = document.getElementById('welcomeQuestionnaireModal');
        if (!modal) return;

        const dialog = modal.querySelector('.welcome-modal-dialog');
        const closeButtons = modal.querySelectorAll('[data-welcome-close]');
        const saveButton = modal.querySelector('[data-welcome-save]');
        const form = document.getElementById('welcomeQuestionnaireForm');
        const body = document.body;

        const isDismissed = () => {
            try {
                return localStorage.getItem(STORAGE_KEY) === 'true';
            } catch (e) {
                return false;
            }
        };

        const setDismissed = () => {
            try {
                localStorage.setItem(STORAGE_KEY, 'true');
            } catch (e) {
                // Ignore storage errors in restricted contexts
            }
        };

        const showModal = () => {
            modal.classList.add('show');
            modal.setAttribute('aria-hidden', 'false');
            body.classList.add('menu-open');
            dialog?.focus();
        };

        const hideModal = () => {
            modal.classList.remove('show');
            modal.setAttribute('aria-hidden', 'true');
            body.classList.remove('menu-open');
            setDismissed();
        };

        const handleSave = () => {
            if (form) {
                try {
                    const formData = new FormData(form);
                    const preferences = {};
                    for (const [key, val] of formData.entries()) {
                        preferences[key] = val;
                    }
                    if (Object.keys(preferences).length > 0) {
                        localStorage.setItem(PREF_KEY, JSON.stringify(preferences));
                    }
                } catch (e) {
                    // Ignore storage errors
                }
            }
            hideModal();
        };

        // First-visit check: open only if not dismissed yet
        if (!isDismissed()) {
            window.setTimeout(() => {
                if (!isDismissed()) {
                    showModal();
                }
            }, 600);
        }

        closeButtons.forEach((btn) => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                hideModal();
            });
        });

        saveButton?.addEventListener('click', (e) => {
            e.preventDefault();
            handleSave();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('show')) {
                hideModal();
            }
        });
    })();
</script>
