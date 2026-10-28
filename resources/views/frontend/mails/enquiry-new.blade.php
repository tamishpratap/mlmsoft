<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('detailsApp.name')}} Enquiry Received</title>
    <style>
        :root {
            --leaf: #1f7a4d;
            --leaf-dark: #115535;
            --gold: #d79b32;
            --ink: #17231d;
            --muted: #65736d;
            --mist: #f4f8f1;
            --paper: #ffffff;
            --line: #dfe8dc;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at 18% 8%, rgba(215, 155, 50, .18), transparent 30%),
                radial-gradient(circle at 85% 0%, rgba(31, 122, 77, .16), transparent 30%),
                linear-gradient(135deg, #f8fbf6 0%, #eef6eb 48%, #fff8ec 100%);
            padding: 38px 16px;
        }

        .email-shell {
            width: 100%;
            max-width: 720px;
            margin: 0 auto;
            background: var(--paper);
            border: 1px solid rgba(31, 122, 77, .14);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 28px 70px rgba(23, 35, 29, .14);
            animation: riseIn .45s ease both;
        }

        @keyframes riseIn {
            from {
                opacity: 0;
                transform: translateY(14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .topbar {
            padding: 16px 28px;
            background: #12291d;
            color: #dfeee5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            font-size: 13px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            letter-spacing: .4px;
        }

        .brand-mark {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: linear-gradient(145deg, var(--gold), #ffe0a1);
            color: #14311f;
            display: grid;
            place-items: center;
            font-size: 20px;
            font-weight: 800;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, .35);
        }

        .pill {
            padding: 8px 13px;
            border: 1px solid rgba(255, 255, 255, .2);
            border-radius: 999px;
            white-space: nowrap;
        }

        .hero {
            position: relative;
            padding: 48px 44px 36px;
            background:
                linear-gradient(135deg, rgba(31, 122, 77, .08), rgba(215, 155, 50, .1)),
                var(--paper);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 9px 14px;
            border-radius: 999px;
            background: rgba(31, 122, 77, .1);
            color: var(--leaf-dark);
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .pulse {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: var(--leaf);
            box-shadow: 0 0 0 0 rgba(31, 122, 77, .45);
            animation: pulse 1.7s infinite;
        }

        @keyframes pulse {
            70% {
                box-shadow: 0 0 0 12px rgba(31, 122, 77, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(31, 122, 77, 0);
            }
        }

        h1 {
            margin: 0 0 16px;
            font-size: clamp(30px, 6vw, 48px);
            line-height: 1.05;
            letter-spacing: 0;
            color: #13271c;
        }

        .hero-text {
            margin: 0;
            max-width: 590px;
            color: var(--muted);
            font-size: 17px;
            line-height: 1.75;
        }

        .content {
            padding: 34px 44px 44px;
        }

        .message-card {
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 24px;
            background: linear-gradient(180deg, #ffffff 0%, #fbfdf9 100%);
            margin-bottom: 28px;
        }

        .message-card p {
            margin: 0 0 14px;
            color: #405149;
            font-size: 15px;
            line-height: 1.75;
        }

        .message-card p:last-child {
            margin-bottom: 0;
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin: 26px 0 30px;
        }

        .step {
            padding: 18px;
            min-height: 150px;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: var(--mist);
        }

        .step-number {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            margin-bottom: 13px;
            background: var(--leaf);
            color: #fff;
            font-weight: 800;
            font-size: 14px;
        }

        .step h3 {
            margin: 0 0 8px;
            font-size: 15px;
            color: #15291e;
        }

        .step p {
            margin: 0;
            font-size: 13px;
            line-height: 1.55;
            color: var(--muted);
        }

        .info-strip {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 30px;
        }

        .info-item {
            border-radius: 16px;
            padding: 18px;
            border: 1px solid rgba(215, 155, 50, .28);
            background: #fffaf0;
        }

        .label {
            display: block;
            margin-bottom: 7px;
            color: #8a6827;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .8px;
            text-transform: uppercase;
        }

        .value {
            color: #26342d;
            font-weight: 700;
            word-break: break-word;
        }

        .cta-box {
            border-radius: 20px;
            padding: 26px;
            background: linear-gradient(135deg, #143421, #1f7a4d);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .cta-box h2 {
            margin: 0 0 6px;
            font-size: 22px;
        }

        .cta-box p {
            margin: 0;
            color: rgba(255, 255, 255, .78);
            line-height: 1.55;
        }

        .cta-button {
            display: inline-block;
            padding: 13px 18px;
            border-radius: 12px;
            background: var(--gold);
            color: #182319;
            text-decoration: none;
            font-weight: 800;
            white-space: nowrap;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, .18);
        }

        .footer {
            padding: 28px 44px 34px;
            text-align: center;
            border-top: 1px solid var(--line);
            background: #f7faf5;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .footer strong {
            display: block;
            color: var(--ink);
            font-size: 16px;
            margin-bottom: 6px;
        }

        .footer a {
            color: var(--leaf-dark);
            font-weight: 700;
            text-decoration: none;
        }

        @media (max-width: 640px) {
            body {
                padding: 18px 10px;
            }

            .email-shell {
                border-radius: 18px;
            }

            .topbar,
            .hero,
            .content,
            .footer {
                padding-left: 20px;
                padding-right: 20px;
            }

            .topbar,
            .cta-box {
                align-items: flex-start;
                flex-direction: column;
            }

            .steps,
            .info-strip {
                grid-template-columns: 1fr;
            }

            .cta-button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <main class="email-shell" id="emailCard">
        <header class="topbar">
            <div class="brand">
                <div class="brand-mark">{{ str_split(config('detailsApp.name'), 1)[0] }}</div>
                <span>{{config('detailsApp.name')}} Pvt. Ltd.</span>
            </div>
            <div class="pill">Official enquiry acknowledgement</div>
        </header>

        <section class="hero">
            <div class="status-badge"><span class="pulse"></span> Enquiry received successfully</div>
            <h1>Thank you for contacting {{config('detailsApp.name')}}.</h1>
            <p class="hero-text">
                We have received your enquiry instantly. Our team will review your message and discuss the right
                solution with you as soon as possible.
            </p>
        </section>

        <section class="content">
            <div class="message-card">
                {{-- <p>Dear {{$name}},</p> --}}
                <p>Dear User,</p>
                <p>
                    Thank you for showing interest in {{config('detailsApp.name')}}. Your enquiry is important to us, and it has been
                    shared with our support team for review.
                </p>
                <p>
                    One of our representatives will connect with you shortly to understand your requirement and guide
                    you with complete information.
                </p>
            </div>

            <div class="steps" aria-label="Next steps">
                <article class="step">
                    <div class="step-number">1</div>
                    <h3>Enquiry Review</h3>
                    <p>Our team checks your submitted details and understands your requirement.</p>
                </article>
                <article class="step">
                    <div class="step-number">2</div>
                    <h3>Team Discussion</h3>
                    <p>The right department discusses your enquiry and prepares the best response.</p>
                </article>
                <article class="step">
                    <div class="step-number">3</div>
                    <h3>Quick Response</h3>
                    <p>We contact you as soon as possible with clear next steps and support.</p>
                </article>
            </div>

            <div class="info-strip">
                <div class="info-item">
                    <span class="label">Support Mobile No.</span>
                    <span class="value" id="">{{config('detailsApp.mobile')}}</span>
                </div>
                <div class="info-item">
                    <span class="label">Support Email</span>
                    <span class="value">{{config('detailsApp.email')}}</span>
                </div>
            </div>

            <div class="cta-box">
                <div>
                    <h2>Need urgent support?</h2>
                    <p>You can reply to this email or contact our team directly for faster assistance.</p>
                </div>
                <a class="cta-button" href="https://mail.google.com/mail/?view=cm&fs=1&to={{config('detailsApp.email')}}" target="_blank">Contact Team</a>
            </div>
        </section>

        <footer class="footer">
            <strong>{{config('detailsApp.name')}} Pvt. Ltd.</strong>
            This is an official confirmation that your enquiry has been received.<br>
            Email: <a href="mailto:{{config('detailsApp.email')}}">{{config('detailsApp.email')}}</a><br>
            &copy; <span id="currentYear">{{date('Y')}}</span> {{config('detailsApp.name')}}. All rights reserved.
        </footer>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const reference = document.getElementById('enquiryReference');
            const year = document.getElementById('currentYear');
            const now = new Date();

            if (reference) {
                const datePart = now.toISOString().slice(0, 10).replace(/-/g, '');
                const shortCode = Math.floor(1000 + Math.random() * 9000);
                reference.textContent = 'AV-ENQ-' + datePart + '-' + shortCode;
            }

            if (year) {
                year.textContent = now.getFullYear();
            }
        });
    </script>
</body>

</html>