<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MLM Software</title>

    <style>
        body {
            margin: 0;
            padding: 24px;
            background: #f6f8f4;
            color: #263244;
            font-family: Arial, Helvetica, sans-serif;
        }

        .email-wrapper {
            width: 100%;
        }

        .email-card {
            width: 100%;
            max-width: 680px;
            overflow: hidden;
            border: 1px solid #ddebdc;
            border-radius: 16px;
            background: #ffffff;
            box-shadow: 0 12px 34px rgba(64, 91, 72, 0.12);
        }

        .email-header {
            padding: 28px 30px;
            color: #ffffff;
            background:
                radial-gradient(circle at 12% 20%, rgba(255,255,255,0.25) 0 8px, transparent 9px),
                radial-gradient(circle at 88% 28%, rgba(255,255,255,0.18) 0 12px, transparent 13px),
                linear-gradient(135deg, #2f7d5c, #2b6cb0);
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
            line-height: 1.35;
            letter-spacing: 0;
        }

        .email-header p {
            margin: 8px 0 0;
            color: #eaf7ef;
            font-size: 14px;
            line-height: 1.6;
        }

        .email-body {
            padding: 28px 30px;
            background:
                radial-gradient(circle at top left, rgba(255, 223, 230, 0.42), transparent 190px),
                radial-gradient(circle at bottom right, rgba(219, 243, 224, 0.65), transparent 210px),
                #ffffff;
        }

        .greeting {
            margin: 0 0 16px;
            font-size: 16px;
            line-height: 1.7;
            color: #263244;
        }

        .intro {
            margin: 0 0 20px;
            color: #526175;
            font-size: 15px;
            line-height: 1.8;
        }

        .section {
            margin: 22px 0 0;
            padding: 18px 18px;
            border: 1px solid #e4efdf;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.86);
        }

        .section-title {
            margin: 0 0 12px;
            color: #236044;
            font-size: 18px;
            line-height: 1.45;
        }

        .content-text {
            margin: 0 0 14px;
            color: #39465a;
            font-size: 15px;
            line-height: 1.85;
        }

        .feature-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .feature-list li {
            margin: 0 0 10px;
            padding: 0;
            color: #39465a;
            font-size: 15px;
            line-height: 1.7;
        }

        .highlight-box {
            margin: 22px 0 0;
            padding: 18px;
            border-radius: 12px;
            background: #f0f8f1;
            border: 1px solid #d7ead8;
        }

        .contact-box {
            margin: 24px 0 0;
            padding: 20px;
            border-radius: 14px;
            background: linear-gradient(135deg, #f7fbff, #f3fbf2);
            border: 1px solid #d9eadf;
            text-align: center;
        }

        .brand-name {
            margin: 0 0 12px;
            color: #1f5f46;
            font-size: 20px;
            line-height: 1.4;
            font-weight: bold;
        }

        .contact-line {
            margin: 6px 0;
            color: #354255;
            font-size: 15px;
            line-height: 1.6;
        }

        .cta {
            display: inline-block;
            margin-top: 16px;
            padding: 12px 22px;
            border-radius: 28px;
            background: #2f7d5c;
            color: #ffffff;
            font-size: 15px;
            font-weight: bold;
            text-decoration: none;
        }

        .footer {
            padding: 22px 30px;
            background: #f4faf3;
            color: #516070;
            font-size: 14px;
            line-height: 1.7;
            border-top: 1px solid #ddebdc;
        }

        @media only screen and (max-width: 600px) {
            body {
                padding: 12px;
            }

            .email-header,
            .email-body,
            .footer {
                padding: 22px 18px;
            }

            .email-header h1 {
                font-size: 21px;
            }

            .section {
                padding: 16px;
            }
        }
    </style>
</head>

<body>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation">
        <tr>
            <td align="center">
                <table class="email-card" width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation">

                    <tr>
                        <td class="email-header" style="text-align:center;">
                            <div style="margin-bottom:12px;">
                                <img src="https://mlmsoftwares.org/logo/logo.png" alt="Company Logo" style="max-height:100px; width:auto; display:inline-block;">
                            </div>
                            <h1>Welcome to AI MLM Software</h1>
                            <p>Smart Automation, AI Support & Digital Growth for your MLM Business</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="email-body">
                            <p class="greeting">
                                Hello {{ $name ?: 'User' }},
                            </p>

                            <p class="intro">
                                Thank you for connecting with us. Our team will contact you shortly with more information about MLM Software.
                            </p>

                            <p class="content-text">
                                प्रिय महोदय/महोदया,<br>
                                सादर नमस्कार!
                            </p>

                            <div class="highlight-box">
                                <p class="content-text">
                                    🚀 हमारे उन्नत AI-Powered MLM Software के साथ अपने नेटवर्क मार्केटिंग बिजनेस को नई ऊँचाइयों पर ले जाएँ।
                                </p>
                                <p class="content-text">
                                    आज के प्रतिस्पर्धी MLM उद्योग में ऑटोमेशन, आर्टिफिशियल इंटेलिजेंस (AI) और डिजिटल मार्केटिंग सपोर्ट ही सतत विकास की कुंजी हैं। हमारा AI MLM Software आपके बिजनेस को सरल, तेज़ और अधिक प्रभावी बनाने के लिए डिज़ाइन किया गया है।
                                </p>
                            </div>

                            <div class="section">
                                <h2 class="section-title">🌟 हमारे AI MLM Software की शक्तिशाली विशेषताएँ</h2>
                                <ul class="feature-list">
                                    <li>🤖 सदस्यों की सहायता के लिए AI Chatbot Support</li>
                                    <li>🤖 Smart Automation एवं Workflow Management</li>
                                    <li>💰 Automated Commission Distribution</li>
                                    <li>🌳 Advanced Genealogy एवं Downline Management</li>
                                    <li>👛 Secure E-Wallet System</li>
                                    <li>📊 AI-Based Business Analytics एवं Reports</li>
                                    <!--<li>📱 Android एवं iOS Mobile Applications</li>-->
                                    <li>🌐 Integrated E-Commerce System</li>
                                    <li>🔒 Secure Payment Gateway Integration</li>
                                    <li>📈 Lead Management एवं Business Tracking</li>
                                </ul>
                            </div>

                            <div class="section">
                                <h2 class="section-title">🎁 बिजनेस ग्रोथ के लिए विशेष सुविधाएँ</h2>
                                <ul class="feature-list">
                                    <li>🎬 आपके बिजनेस को बढ़ावा देने के लिए 02 FREE Professional Promotional Videos</li>
                                    <li>🎨 Website एवं Social Media Marketing के लिए 10 FREE Advertisement Templates</li>
                                    <li>🤖 Customer Support एवं Lead Generation के लिए AI Chatbot Setup</li>
                                    <li>📱 Social Media Platforms Activation एवं Setup Assistance</li>
                                    <li>📢 Business Growth के लिए Digital Marketing Guidance</li>
                                    <li>🎯 Lead Generation Support एवं Branding Resources</li>
                                    <li>📈 Business Promotion Strategies</li>
                                    <li>💡 MLM Business Expansion के लिए Expert Consultation</li>
                                </ul>
                            </div>

                            <div class="section">
                                <h2 class="section-title">🎯 हमारा AI MLM Software क्यों चुनें?</h2>
                                <ul class="feature-list">
                                    <li>✅ AI Automation द्वारा Manual Work में कमी</li>
                                    <li>✅ Distributor Productivity एवं Engagement में वृद्धि</li>
                                    <li>✅ Real-Time Business Insights एवं Reports</li>
                                    <li>✅ Fast, Secure एवं Scalable Platform</li>
                                    <li>✅ User-Friendly Dashboard <li>
                                    <li>✅ Customizable Compensation Plans</li>
                                    <li>✅ Powerful Marketing Support Tools</li>
                                    <li>✅ Dedicated Technical Support</li>
                                </ul>
                            </div>

                            <div class="highlight-box">
                                <p class="content-text">
                                    चाहे आप एक नई MLM कंपनी शुरू कर रहे हों या अपने वर्तमान सिस्टम को अपग्रेड करना चाहते हों, हमारा AI MLM Software आपके नेटवर्क मार्केटिंग बिजनेस को मैनेज, ऑटोमेट, प्रमोट और ग्रो करने के लिए एक सम्पूर्ण समाधान प्रदान करता है।
                                </p>
                                <p class="content-text">
                                    🎁 आज ही FREE Demo प्राप्त करें और जानें कि Artificial Intelligence आपके MLM बिजनेस को कैसे बदल सकता है।
                                </p>
                            </div>

                            <div class="contact-box">
                                <p class="brand-name">📞 हमसे संपर्क करें<br>AI MLM SOFTWARES</p>
                                <p class="contact-line">📱 +91 9058521613</p>
                                <p class="contact-line">📱 +91 8979703005</p>
                                <p class="contact-line">🌐 mlmsoftwares.org</p>
                                <p class="contact-line">📧 FREE Consultation एवं Live Demo प्राप्त करें</p>

                                <a class="cta" href="https://mlmsoftwares.org">Get Free Demo</a>
                            </div>

                            <p class="content-text" style="margin-top: 24px;">
                                AI को अपने बिजनेस संचालन की जिम्मेदारी सौंपें और स्वयं अपने नेटवर्क एवं बिजनेस ग्रोथ पर ध्यान केंद्रित करें।
                            </p>

                            <p class="content-text">
                                हम आपके MLM बिजनेस को अधिक स्मार्ट, तेज़ और सफल बनाने के लिए तत्पर हैं।
                            </p>

                            <p class="content-text">
                                सादर,<br>
                                <strong>Team AI MLM SOFTWARES</strong>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td class="footer">
                            This email was sent by AI MLM SOFTWARES. For demo and consultation, contact us at +91 9058521613 or visit mlmsoftwares.org.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>