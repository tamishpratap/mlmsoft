<div class="ai-suite-wrapper">
    <!-- SECTION 1: IMPROVE THE EXISTING INTRODUCTION -->
    <div class="ai-panel reveal" id="aiIntroPanel">
        <div class="content-copy">
            <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'ai']) AI Integration Built Into Your MLM Software</span>
            <h2>AI Integration Built for Your MLM Software</h2>
            <p>
                Explore AI-powered assistance for platform navigation, form completion, member information, MLM plan
                explanations, and voice-based interaction. Each module is designed around the workflows available in your
                MLM platform.
            </p>
            <ul class="ai-list two">
                <li>@include('frontend.partials.icon', ['name' => 'check']) Natural voice & text platform navigation</li>
                <li>@include('frontend.partials.icon', ['name' => 'check']) Assisted form filling with user confirmation</li>
                <li>@include('frontend.partials.icon', ['name' => 'check']) Role-scoped member & wallet chat assistant</li>
                <li>@include('frontend.partials.icon', ['name' => 'check']) Binary, Matrix & Unilevel plan explainer</li>
                <li>@include('frontend.partials.icon', ['name' => 'check']) Conversational voice talk for hands-free queries</li>
                <li>@include('frontend.partials.icon', ['name' => 'check']) Strict session authorization & data security</li>
            </ul>
            <div class="ai-panel-actions">
                <a href="#demoModal" class="btn btn-primary" data-demo-open>
                    @include('frontend.partials.icon', ['name' => 'calendar'])
                    Request AI Modules Demo
                </a>
                <a href="https://wa.me/+919058521613" target="_blank" rel="noopener noreferrer" class="btn btn-secondary btn-whatsapp">
                    @include('frontend.partials.icon', ['name' => 'whatsapp'])
                    Discuss AI on WhatsApp
                </a>
            </div>
        </div>

        <div class="ai-orbit" aria-label="AI module ecosystem preview">
            <div class="ai-core">
                @include('frontend.partials.icon', ['name' => 'chip'])
                <strong>AI Suite</strong>
                <span>Navigation, Form, Chat, Plan & Voice assistance.</span>
            </div>
            <div class="ai-floating-card ai-float-nav">
                <span class="float-badge">@include('frontend.partials.icon', ['name' => 'compass']) Module 01</span>
                <strong>AI Navigation</strong>
                <span>Voice & text shortcuts</span>
            </div>
            <div class="ai-floating-card ai-float-form">
                <span class="float-badge">@include('frontend.partials.icon', ['name' => 'edit']) Module 02</span>
                <strong>AI Form Filler</strong>
                <span>Assisted data entry</span>
            </div>
            <div class="ai-floating-card ai-float-chat">
                <span class="float-badge">@include('frontend.partials.icon', ['name' => 'message']) Module 03</span>
                <strong>AI Chat Assistant</strong>
                <span>Authorized member Q&A</span>
            </div>
            <div class="ai-floating-card ai-float-plan">
                <span class="float-badge">@include('frontend.partials.icon', ['name' => 'sitemap']) Module 04</span>
                <strong>AI Plan Explainer</strong>
                <span>Compensation rules</span>
            </div>
            <div class="ai-floating-card ai-float-voice">
                <span class="float-badge">@include('frontend.partials.icon', ['name' => 'mic']) Module 05</span>
                <strong>AI Voice Talk</strong>
                <span>Conversational speech</span>
            </div>
            <div class="ai-floating-card ai-float-push">
                <span class="float-badge">@include('frontend.partials.icon', ['name' => 'bell']) Platform Push</span>
                <strong>Website Notification Message</strong>
                <span>Android notifications</span>
            </div>
        </div>
    </div>

    <!-- SECTION 2 & 3: CREATE A SEPARATE AI MODULES AREA -->
    <div class="ai-modules-section reveal" id="aiModulesSection">
        <div class="section-heading text-center">
            <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'puzzle']) Platform Modules & Capabilities</span>
            <h2 id="aiModulesTitle">Explore Our AI & Communication Modules</h2>
            <p class="section-lead">
                Choose the capability that matches your workflow. Each module has a specific role within the MLM platform.
            </p>
        </div>

        <!-- Interactive Module Tabs Filter -->
        <div class="ai-tabs-container" role="tablist" aria-label="AI Modules Tabs" data-tabs="aiModules">
            <button type="button" class="ai-tab-btn is-active" data-tab="all" role="tab" aria-selected="true">
                <span class="tab-indicator"></span>
                @include('frontend.partials.icon', ['name' => 'grid'])
                All Modules (6)
            </button>
            <button type="button" class="ai-tab-btn" data-tab="nav" role="tab" aria-selected="false">
                <span class="tab-indicator"></span>
                @include('frontend.partials.icon', ['name' => 'compass'])
                AI Navigation
            </button>
            <button type="button" class="ai-tab-btn" data-tab="form" role="tab" aria-selected="false">
                <span class="tab-indicator"></span>
                @include('frontend.partials.icon', ['name' => 'edit'])
                AI Form Filler
            </button>
            <button type="button" class="ai-tab-btn" data-tab="chat" role="tab" aria-selected="false">
                <span class="tab-indicator"></span>
                @include('frontend.partials.icon', ['name' => 'message'])
                AI Chat Assistant
            </button>
            <button type="button" class="ai-tab-btn" data-tab="plan" role="tab" aria-selected="false">
                <span class="tab-indicator"></span>
                @include('frontend.partials.icon', ['name' => 'sitemap'])
                AI Plan Explainer
            </button>
            <button type="button" class="ai-tab-btn" data-tab="voice" role="tab" aria-selected="false">
                <span class="tab-indicator"></span>
                @include('frontend.partials.icon', ['name' => 'mic'])
                AI Voice Talk
            </button>
            <button type="button" class="ai-tab-btn" data-tab="push" role="tab" aria-selected="false">
                <span class="tab-indicator"></span>
                @include('frontend.partials.icon', ['name' => 'bell'])
                Website Notification Message
            </button>
        </div>

        <!-- 5 Dedicated Module Cards Grid -->
        <div class="ai-modules-grid">
            <!-- MODULE 1: AI NAVIGATION ASSISTANT -->
            <article class="ai-module-card reveal" data-module-card="nav">
                <div class="module-card-header">
                    <span class="module-icon-box icon-nav">
                        @include('frontend.partials.icon', ['name' => 'compass'])
                    </span>
                    <div class="module-badge-wrap">
                        <span class="module-index">Module 01</span>
                        <span class="module-status-pill pill-cyan">Platform Navigation</span>
                    </div>
                </div>

                <div class="module-card-body">
                    <h3 class="module-title">AI Navigation Assistant</h3>
                    <p class="module-desc">
                        Navigate the MLM platform using natural-language or supported voice commands. The assistant helps
                        users locate the pages, dashboards, sections, and workflows available to them.
                    </p>

                    <div class="module-feature-block">
                        <strong class="feature-block-title">Key Capabilities</strong>
                        <ul class="module-features-list">
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Navigate to available pages using text or voice commands.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Identify relevant sections and forms across the interface.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Keep navigation within the current admin or member panel.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Help users find platform features without manually searching every menu.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="module-example-box">
                        <span class="example-label">
                            @include('frontend.partials.icon', ['name' => 'spark'])
                            Realistic Usage Example
                        </span>
                        <p class="example-quote">“Open my team dashboard” or “Take me to the wallet page.”</p>
                    </div>

                    <div class="module-guardrail">
                        <span class="guardrail-icon">@include('frontend.partials.icon', ['name' => 'shield'])</span>
                        <span>Role-Scoped: Routes only to screens permitted by current user authentication.</span>
                    </div>
                </div>

                <div class="module-card-footer">
                    <button type="button" class="btn btn-outline-cyan btn-block" data-demo-open data-module-target="AI Navigation Assistant">
                        @include('frontend.partials.icon', ['name' => 'play'])
                        Explore Navigation Module
                    </button>
                </div>
            </article>

            <!-- MODULE 2: AI FORM FILLER -->
            <article class="ai-module-card reveal" data-module-card="form">
                <div class="module-card-header">
                    <span class="module-icon-box icon-form">
                        @include('frontend.partials.icon', ['name' => 'edit'])
                    </span>
                    <div class="module-badge-wrap">
                        <span class="module-index">Module 02</span>
                        <span class="module-status-pill pill-blue">Data Entry Assistance</span>
                    </div>
                </div>

                <div class="module-card-body">
                    <h3 class="module-title">AI Form Filler</h3>
                    <p class="module-desc">
                        Reduce repetitive data entry by letting the AI assist with filling supported form fields from
                        user instructions.
                    </p>

                    <div class="module-feature-block">
                        <strong class="feature-block-title">Key Capabilities</strong>
                        <ul class="module-features-list">
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Fill supported text fields using user-provided information.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Assist with profile, member, and other available forms.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Interpret supported voice or text instructions accurately.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Allow users to review entered information before submission.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="module-example-box">
                        <span class="example-label">
                            @include('frontend.partials.icon', ['name' => 'spark'])
                            Realistic Usage Example
                        </span>
                        <p class="example-quote">“Fill in my profile details” or “Enter this member ID in the search form.”</p>
                    </div>

                    <div class="module-guardrail">
                        <span class="guardrail-icon">@include('frontend.partials.icon', ['name' => 'shield'])</span>
                        <span>Review Before Submit: Does not bypass validation, permissions, or user confirmation.</span>
                    </div>
                </div>

                <div class="module-card-footer">
                    <button type="button" class="btn btn-outline-blue btn-block" data-demo-open data-module-target="AI Form Filler">
                        @include('frontend.partials.icon', ['name' => 'play'])
                        Explore Form Filler Module
                    </button>
                </div>
            </article>

            <!-- MODULE 3: AI CHAT ASSISTANT -->
            <article class="ai-module-card reveal" data-module-card="chat">
                <div class="module-card-header">
                    <span class="module-icon-box icon-chat">
                        @include('frontend.partials.icon', ['name' => 'message'])
                    </span>
                    <div class="module-badge-wrap">
                        <span class="module-index">Module 03</span>
                        <span class="module-status-pill pill-violet">Authorized Q&A</span>
                    </div>
                </div>

                <div class="module-card-body">
                    <h3 class="module-title">AI Chat Assistant</h3>
                    <p class="module-desc">
                        Ask questions about your MLM platform and receive helpful answers using information the current
                        user is authorized to access.
                    </p>

                    <div class="module-feature-block">
                        <strong class="feature-block-title">Key Capabilities</strong>
                        <ul class="module-features-list">
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Answer questions about the user's available profile information.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Explain accessible wallet, income, team, or account information where supported.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Help users understand platform features and available records.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Provide conversational guidance for common platform questions.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="module-example-box">
                        <span class="example-label">
                            @include('frontend.partials.icon', ['name' => 'spark'])
                            Realistic Usage Example
                        </span>
                        <p class="example-quote">“Show my member ID” or “Explain my wallet balance.”</p>
                    </div>

                    <div class="module-guardrail">
                        <span class="guardrail-icon">@include('frontend.partials.icon', ['name' => 'shield'])</span>
                        <span>Strict Privacy: Private data remains behind auth controls. No unrestricted DB access.</span>
                    </div>
                </div>

                <div class="module-card-footer">
                    <button type="button" class="btn btn-outline-violet btn-block" data-demo-open data-module-target="AI Chat Assistant">
                        @include('frontend.partials.icon', ['name' => 'play'])
                        Explore Chat Assistant
                    </button>
                </div>
            </article>

            <!-- MODULE 4: AI PLAN EXPLAINER -->
            <article class="ai-module-card reveal" data-module-card="plan">
                <div class="module-card-header">
                    <span class="module-icon-box icon-plan">
                        @include('frontend.partials.icon', ['name' => 'sitemap'])
                    </span>
                    <div class="module-badge-wrap">
                        <span class="module-index">Module 04</span>
                        <span class="module-status-pill pill-indigo">Compensation Logic</span>
                    </div>
                </div>

                <div class="module-card-body">
                    <h3 class="module-title">AI Plan Explainer</h3>
                    <p class="module-desc">
                        Understand the MLM compensation plan configured for your platform through clear, easy-to-follow
                        explanations.
                    </p>

                    <div class="module-feature-block">
                        <strong class="feature-block-title">Key Capabilities</strong>
                        <ul class="module-features-list">
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Explain supported Binary, Matrix, Unilevel, and other configured plan models.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Describe levels, ranks, eligibility conditions, and commission rules where configured.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Clarify plan terminology and relevant payout conditions.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Help users understand the rules applicable to their own platform.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="module-example-box">
                        <span class="example-label">
                            @include('frontend.partials.icon', ['name' => 'spark'])
                            Realistic Usage Example
                        </span>
                        <p class="example-quote">“Explain how my configured Binary plan works” or “What are the eligibility conditions for this level?”</p>
                    </div>

                    <div class="module-guardrail">
                        <span class="guardrail-icon">@include('frontend.partials.icon', ['name' => 'shield'])</span>
                        <span>Configured Rules Only: No invented rates, payout guarantees, or financial hype.</span>
                    </div>
                </div>

                <div class="module-card-footer">
                    <button type="button" class="btn btn-outline-indigo btn-block" data-demo-open data-module-target="AI Plan Explainer">
                        @include('frontend.partials.icon', ['name' => 'play'])
                        Explore Plan Explainer
                    </button>
                </div>
            </article>

            <!-- MODULE 5: AI VOICE TALK -->
            <article class="ai-module-card reveal" data-module-card="voice">
                <div class="module-card-header">
                    <span class="module-icon-box icon-voice">
                        @include('frontend.partials.icon', ['name' => 'mic'])
                    </span>
                    <div class="module-badge-wrap">
                        <span class="module-index">Module 05</span>
                        <span class="module-status-pill pill-cyan">Hands-Free Speech</span>
                    </div>
                </div>

                <div class="module-card-body">
                    <h3 class="module-title">AI Voice Talk</h3>
                    <p class="module-desc">
                        Interact with the AI through supported voice conversations to ask questions and understand
                        platform features in a more natural way.
                    </p>

                    <div class="module-feature-block">
                        <strong class="feature-block-title">Key Capabilities</strong>
                        <ul class="module-features-list">
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Ask questions through supported voice input.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Receive spoken responses if voice output is implemented.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Discuss available MLM plan and platform information.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Offer a conversational alternative to typing questions.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="module-example-box">
                        <span class="example-label">
                            @include('frontend.partials.icon', ['name' => 'spark'])
                            Realistic Usage Example
                        </span>
                        <p class="example-quote">“Explain my MLM plan to me” or “How do I find my team details?”</p>
                    </div>

                    <div class="module-guardrail">
                        <span class="guardrail-icon">@include('frontend.partials.icon', ['name' => 'shield'])</span>
                        <span>Verified Voice Support: Operational via supported web speech standards & audio hardware.</span>
                    </div>
                </div>

                <div class="module-card-footer">
                    <button type="button" class="btn btn-outline-cyan btn-block" data-demo-open data-module-target="AI Voice Talk">
                        @include('frontend.partials.icon', ['name' => 'play'])
                        Explore Voice Module
                    </button>
                </div>
            </article>

            <!-- MODULE 6 / INTEGRATION MODULE: WEBSITE PUSH NOTIFICATIONS -->
            <article class="ai-module-card reveal" data-module-card="push">
                <div class="module-card-header">
                    <span class="module-icon-box icon-push">
                        @include('frontend.partials.icon', ['name' => 'bell'])
                    </span>
                    <div class="module-badge-wrap">
                        <span class="module-index">Integration Module</span>
                        <span class="module-status-pill pill-cyan">Android Device Push</span>
                    </div>
                </div>

                <div class="module-card-body">
                    <h3 class="module-title">Website Notification Message</h3>
                    <p class="module-desc">
                        Keep your MLM members informed with website push notifications delivered to supported devices.
                        Share announcements with all eligible members or target specific members where supported by your
                        notification system.
                    </p>

                    <div class="module-feature-block">
                        <strong class="feature-block-title">Key Capabilities</strong>
                        <ul class="module-features-list">
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Website announcements delivered to supported Android devices.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Notifications for all eligible members.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Targeted notifications for selected members, where implemented.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Multiple notifications with native Android grouping behavior where supported.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Timely communication for announcements, updates, and important member information.</span>
                            </li>
                            <li>
                                @include('frontend.partials.icon', ['name' => 'check'])
                                <span>Notification permissions and device compatibility handled according to the existing implementation.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="module-example-box">
                        <span class="example-label">
                            @include('frontend.partials.icon', ['name' => 'broadcast'])
                            Example Use Cases
                        </span>
                        <p class="example-quote">“Announce a new platform update” or “Send a relevant message to a selected member group.”</p>
                    </div>

                    <div class="module-guardrail">
                        <span class="guardrail-icon">@include('frontend.partials.icon', ['name' => 'shield'])</span>
                        <span>Delivery Depends on Device & Permissions: Requires member opt-in, supported Android browsers, and network connectivity.</span>
                    </div>
                </div>

                <div class="module-card-footer">
                    <button type="button" class="btn btn-outline-cyan btn-block" data-demo-open data-module-target="Website Notification Message">
                        @include('frontend.partials.icon', ['name' => 'play'])
                        Explore Push Notifications
                    </button>
                </div>
            </article>
        </div>

        <!-- Interactive Module Simulation Showcase -->
        <div class="ai-simulation-panel reveal" data-tab-panel="aiModules">
            <div class="simulation-header">
                <div class="simulation-badge">
                    <span class="status-dot"></span>
                    Interactive Workflow Simulator
                </div>
                <h4>Select a module below to preview realistic platform interactions</h4>
            </div>

            <!-- Tab Panels for Module Simulation Previews -->
            <div class="simulation-body">
                <!-- NAV SIMULATION -->
                <div class="sim-panel is-active" data-sim-panel="nav">
                    <div class="sim-terminal">
                        <div class="sim-term-bar">
                            <span class="term-dot dot-red"></span>
                            <span class="term-dot dot-yellow"></span>
                            <span class="term-dot dot-green"></span>
                            <span class="term-title">AI Navigation Assistant &mdash; Session: Member Portal</span>
                        </div>
                        <div class="sim-dialog">
                            <div class="sim-msg user">
                                <span class="sim-avatar">User</span>
                                <div class="sim-bubble">“Open my team dashboard and show downline genealogy”</div>
                            </div>
                            <div class="sim-msg assistant">
                                <span class="sim-avatar ai">AI</span>
                                <div class="sim-bubble">
                                    <p>Navigating to your authorized downline structure...</p>
                                    <div class="sim-action-card">
                                        <span class="action-icon">@include('frontend.partials.icon', ['name' => 'compass'])</span>
                                        <div>
                                            <strong>Route Executed:</strong>
                                            <code>/portal/genealogy/tree-view</code>
                                            <span>Displaying: Left Leg (142 Active) | Right Leg (98 Active)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FORM SIMULATION -->
                <div class="sim-panel" data-sim-panel="form" hidden>
                    <div class="sim-terminal">
                        <div class="sim-term-bar">
                            <span class="term-dot dot-red"></span>
                            <span class="term-dot dot-yellow"></span>
                            <span class="term-dot dot-green"></span>
                            <span class="term-title">AI Form Filler &mdash; Supported Form Fields</span>
                        </div>
                        <div class="sim-dialog">
                            <div class="sim-msg user">
                                <span class="sim-avatar">User</span>
                                <div class="sim-bubble">“Fill in member search with ID MLM-9042 and filter by active status”</div>
                            </div>
                            <div class="sim-msg assistant">
                                <span class="sim-avatar ai">AI</span>
                                <div class="sim-bubble">
                                    <p>Populated matching fields for your review:</p>
                                    <div class="sim-fields-preview">
                                        <div class="sim-field-row">
                                            <span class="field-label">Member ID:</span>
                                            <span class="field-val">MLM-9042</span>
                                            <span class="field-status">Populated ✓</span>
                                        </div>
                                        <div class="sim-field-row">
                                            <span class="field-label">Account Status:</span>
                                            <span class="field-val">Active Members Only</span>
                                            <span class="field-status">Populated ✓</span>
                                        </div>
                                    </div>
                                    <small class="text-muted">User confirmation required before search executes. Validation active.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CHAT SIMULATION -->
                <div class="sim-panel" data-sim-panel="chat" hidden>
                    <div class="sim-terminal">
                        <div class="sim-term-bar">
                            <span class="term-dot dot-red"></span>
                            <span class="term-dot dot-yellow"></span>
                            <span class="term-dot dot-green"></span>
                            <span class="term-title">AI Chat Assistant &mdash; Role-Scoped Inquiries</span>
                        </div>
                        <div class="sim-dialog">
                            <div class="sim-msg user">
                                <span class="sim-avatar">User</span>
                                <div class="sim-bubble">“Explain my wallet balance and pending withdrawal approvals”</div>
                            </div>
                            <div class="sim-msg assistant">
                                <span class="sim-avatar ai">AI</span>
                                <div class="sim-bubble">
                                    <p>Here is your authorized account summary for User ID #2048:</p>
                                    <div class="sim-stats-preview">
                                        <div class="sim-stat-box">
                                            <span class="lbl">Available Balance</span>
                                            <strong class="val text-cyan">$2,450.00</strong>
                                        </div>
                                        <div class="sim-stat-box">
                                            <span class="lbl">Pending Payout Approval</span>
                                            <strong class="val text-blue">$480.00</strong>
                                        </div>
                                        <div class="sim-stat-box">
                                            <span class="lbl">Last Cycle Date</span>
                                            <strong class="val">25 Oct 2026</strong>
                                        </div>
                                    </div>
                                    <small class="text-muted">Information retrieved under strict session credentials. Other member records remain sealed.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PLAN SIMULATION -->
                <div class="sim-panel" data-sim-panel="plan" hidden>
                    <div class="sim-terminal">
                        <div class="sim-term-bar">
                            <span class="term-dot dot-red"></span>
                            <span class="term-dot dot-yellow"></span>
                            <span class="term-dot dot-green"></span>
                            <span class="term-title">AI Plan Explainer &mdash; Configured Compensation Rules</span>
                        </div>
                        <div class="sim-dialog">
                            <div class="sim-msg user">
                                <span class="sim-avatar">User</span>
                                <div class="sim-bubble">“What are the eligibility conditions for Gold Rank in our configured plan?”</div>
                            </div>
                            <div class="sim-msg assistant">
                                <span class="sim-avatar ai">AI</span>
                                <div class="sim-bubble">
                                    <p>Based on your platform's configured Hybrid Binary-Unilevel plan rules:</p>
                                    <ul class="sim-check-list">
                                        <li><strong>Direct Active Sponsors:</strong> Minimum 3 active personally sponsored members.</li>
                                        <li><strong>Weaker Leg Volume:</strong> 10,000 Group Business Volume (BV) in the current monthly cycle.</li>
                                        <li><strong>Pair Matching:</strong> 1:1 ratio with configured daily capping applied.</li>
                                    </ul>
                                    <small class="text-muted">Strictly sourced from verified platform configuration. No speculative claims or income guarantees.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- VOICE SIMULATION -->
                <div class="sim-panel" data-sim-panel="voice" hidden>
                    <div class="sim-terminal">
                        <div class="sim-term-bar">
                            <span class="term-dot dot-red"></span>
                            <span class="term-dot dot-yellow"></span>
                            <span class="term-dot dot-green"></span>
                            <span class="term-title">AI Voice Talk &mdash; Hands-Free Conversational Query</span>
                        </div>
                        <div class="sim-dialog">
                            <div class="sim-msg user">
                                <span class="sim-avatar voice">@include('frontend.partials.icon', ['name' => 'mic'])</span>
                                <div class="sim-bubble voice-bubble">
                                    <div class="voice-wave-anim">
                                        <span></span><span></span><span></span><span></span><span></span>
                                    </div>
                                    “Explain my direct referral link and where to share it”
                                </div>
                            </div>
                            <div class="sim-msg assistant">
                                <span class="sim-avatar ai">AI</span>
                                <div class="sim-bubble">
                                    <p><strong>Spoken Response:</strong> “Your replicated referral link is active. You can find it on your member dashboard header or under Profile Settings. Would you like me to navigate there now?”</p>
                                    <small class="text-muted">Speech input interpreted via supported browser voice APIs; text/speech output generated accordingly.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PUSH NOTIFICATION SIMULATION -->
                <div class="sim-panel" data-sim-panel="push" hidden>
                    <div class="sim-android-shade">
                        <div class="shade-status-bar">
                            <span class="shade-time">10:45 AM</span>
                            <div class="shade-icons">
                                <span>5G</span>
                                <span class="battery-icon">100%</span>
                            </div>
                        </div>

                        <div class="shade-notification-group">
                            <div class="shade-group-header">
                                <div class="shade-site-identity">
                                    <span class="site-icon">@include('frontend.partials.icon', ['name' => 'bell'])</span>
                                    <strong>MLM Software Portal</strong>
                                    <span class="shade-dot">•</span>
                                    <span class="shade-time-ago">just now</span>
                                </div>
                                <span class="shade-expand-pill">Grouped (2) ▼</span>
                            </div>

                            <div class="shade-notification-item">
                                <h5 class="notif-title">Important Platform Update</h5>
                                <p class="notif-body">New compensation rules and updated reward cycles are now active. Tap to view your dashboard.</p>
                                <span class="notif-action-tag">Open Website &rarr;</span>
                            </div>

                            <div class="shade-notification-item nested">
                                <h5 class="notif-title">Payout Cycle Approved</h5>
                                <p class="notif-body">Weekly withdrawal ledger has been confirmed by administration.</p>
                                <span class="notif-action-tag">View Wallet &rarr;</span>
                            </div>
                        </div>

                        <div class="shade-footer-note">
                            <small class="text-muted">Displays under site identity in Android notification drawer with expand/collapse grouping without requiring the website tab to be active.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- How Website Push Notifications Work (4-Step Flow) -->
        <div class="ai-push-flow-container">
            @include('frontend.partials.push-notifications-flow')
        </div>
    </div>

    <!-- SECTION 4: HOW THE AI MODULES WORK TOGETHER -->
    <div class="ai-workflow-section reveal" id="aiWorkflowSection">
        <div class="section-heading text-center">
            <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'sliders']) Integrated Workflow</span>
            <h2>How the AI Modules Work Together</h2>
            <p class="section-lead">
                Each module has a dedicated role. Together, they create a cohesive, frictionless journey through your MLM platform while maintaining strict access boundaries.
            </p>
        </div>

        <div class="workflow-steps-track">
            <!-- Step 1 -->
            <div class="workflow-step-card reveal">
                <div class="step-badge-circle">
                    <span class="step-num">01</span>
                </div>
                <div class="step-icon-wrap">
                    @include('frontend.partials.icon', ['name' => 'compass'])
                </div>
                <h4 class="step-title">1. Navigate Platform</h4>
                <p class="step-desc">
                    Locate the exact dashboard, tree view, or report using natural text or supported voice navigation.
                </p>
                <span class="step-module-tag">AI Navigation Assistant</span>
            </div>

            <!-- Step 2 -->
            <div class="workflow-step-card reveal">
                <div class="step-badge-circle">
                    <span class="step-num">02</span>
                </div>
                <div class="step-icon-wrap">
                    @include('frontend.partials.icon', ['name' => 'edit'])
                </div>
                <h4 class="step-title">2. Complete Forms</h4>
                <p class="step-desc">
                    Fill supported member registration or profile fields swiftly, then review data before final submission.
                </p>
                <span class="step-module-tag">AI Form Filler</span>
            </div>

            <!-- Step 3 -->
            <div class="workflow-step-card reveal">
                <div class="step-badge-circle">
                    <span class="step-num">03</span>
                </div>
                <div class="step-icon-wrap">
                    @include('frontend.partials.icon', ['name' => 'message'])
                </div>
                <h4 class="step-title">3. Ask Member Questions</h4>
                <p class="step-desc">
                    Retrieve authorized answers about personal wallet balances, team counts, or accessible account records.
                </p>
                <span class="step-module-tag">AI Chat Assistant</span>
            </div>

            <!-- Step 4 -->
            <div class="workflow-step-card reveal">
                <div class="step-badge-circle">
                    <span class="step-num">04</span>
                </div>
                <div class="step-icon-wrap">
                    @include('frontend.partials.icon', ['name' => 'sitemap'])
                </div>
                <h4 class="step-title">4. Understand Plan Rules</h4>
                <p class="step-desc">
                    Get crystal-clear explanations of configured Binary, Matrix, or Unilevel compensation calculations and ranks.
                </p>
                <span class="step-module-tag">AI Plan Explainer</span>
            </div>

            <!-- Step 5 -->
            <div class="workflow-step-card reveal">
                <div class="step-badge-circle">
                    <span class="step-num">05</span>
                </div>
                <div class="step-icon-wrap">
                    @include('frontend.partials.icon', ['name' => 'mic'])
                </div>
                <h4 class="step-title">5. Conversational Voice</h4>
                <p class="step-desc">
                    Use supported voice interaction for hands-free queries on mobile and desktop devices.
                </p>
                <span class="step-module-tag">AI Voice Talk</span>
            </div>
        </div>

        <div class="workflow-security-banner reveal">
            <div class="security-banner-icon">
                @include('frontend.partials.icon', ['name' => 'shield'])
            </div>
            <div class="security-banner-text">
                <strong>Modular Architecture & Strict Data Boundaries</strong>
                <p>
                    These modules operate as separate capabilities with distinct responsibilities. Modules do not bypass
                    authentication, execute unauthorized database changes, or expose confidential cross-account information.
                    Every interaction adheres to platform authorization controls.
                </p>
            </div>
        </div>
    </div>

    <!-- SECTION 5: FINAL CALL TO ACTION -->
    <div class="ai-closing-cta reveal" id="aiClosingCta">
        <div class="cta-inner-grid">
            <div class="cta-content">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'spark']) Ready to Upgrade Your Platform?</span>
                <h2>Experience the Five AI Modules in a Live Demo</h2>
                <p>
                    See how our AI Navigation, Form Filler, Chat Assistant, Plan Explainer, and Voice Talk integrate directly
                    into your MLM software architecture. Let our engineering team walk you through real workflows.
                </p>

                <div class="cta-action-row">
                    <a href="#demoModal" class="btn btn-primary btn-lg" data-demo-open>
                        @include('frontend.partials.icon', ['name' => 'calendar'])
                        Book Your Free AI Demo
                    </a>
                    <a href="https://wa.me/+919058521613" target="_blank" rel="noopener noreferrer" class="btn btn-secondary btn-lg btn-whatsapp">
                        @include('frontend.partials.icon', ['name' => 'whatsapp'])
                        Talk to AI Specialist on WhatsApp
                    </a>
                    <a href="{{ route('frontend.contact') }}#consultation" class="btn btn-outline-white btn-lg">
                        Schedule Consultation
                    </a>
                </div>

                <div class="trust-pills-row">
                    <span class="trust-pill">
                        @include('frontend.partials.icon', ['name' => 'check'])
                        Role-Based Session Security
                    </span>
                    <span class="trust-pill">
                        @include('frontend.partials.icon', ['name' => 'check'])
                        Configured Plan Rules Only
                    </span>
                    <span class="trust-pill">
                        @include('frontend.partials.icon', ['name' => 'check'])
                        User Confirmation on Forms
                    </span>
                    <span class="trust-pill">
                        @include('frontend.partials.icon', ['name' => 'check'])
                        Web & Mobile App Ready
                    </span>
                </div>
            </div>

            <div class="cta-visual-preview">
                <div class="cta-card-stack">
                    <div class="cta-glass-card">
                        <div class="glass-header">
                            <span class="glass-icon">@include('frontend.partials.icon', ['name' => 'ai'])</span>
                            <div>
                                <strong>MLM AI Suite</strong>
                                <small>Production-Ready Modules</small>
                            </div>
                        </div>
                        <ul class="glass-list">
                            <li><span class="chk">&#10003;</span> AI Navigation Assistant</li>
                            <li><span class="chk">&#10003;</span> AI Form Filler</li>
                            <li><span class="chk">&#10003;</span> AI Chat Assistant</li>
                            <li><span class="chk">&#10003;</span> AI Plan Explainer</li>
                            <li><span class="chk">&#10003;</span> AI Voice Talk</li>
                        </ul>
                        <div class="glass-footer">
                            <span class="status-live">● Ready for Custom Deployment</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
