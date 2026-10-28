document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;
    const header = document.querySelector('.topbar');
    const menuButton = document.querySelector('[data-menu-button]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const closeMobileMenu = () => {
        if (!menuButton || !mobileMenu) {
            return;
        }

        mobileMenu.classList.remove('is-open');
        menuButton.classList.remove('is-open');
        menuButton.setAttribute('aria-expanded', 'false');
        body.classList.remove('menu-open');
    };

    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', () => {
            const isOpen = mobileMenu.classList.toggle('is-open');
            menuButton.classList.toggle('is-open', isOpen);
            menuButton.setAttribute('aria-expanded', String(isOpen));
            body.classList.toggle('menu-open', isOpen);
        });

        mobileMenu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', closeMobileMenu);
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeMobileMenu();
            }
        });
    }

    const syncHeaderState = () => {
        if (!header) {
            return;
        }

        header.classList.toggle('is-scrolled', window.scrollY > 12);
    };

    syncHeaderState();
    window.addEventListener('scroll', syncHeaderState, { passive: true });

    const currentPath = window.location.pathname.replace(/\/$/, '') || '/';
    document.querySelectorAll('[data-nav-link]').forEach((link) => {
        try {
            const href = new URL(link.getAttribute('href'), window.location.origin);
            const linkPath = href.pathname.replace(/\/$/, '') || '/';

            if (linkPath === currentPath && !href.hash) {
                link.classList.add('active');
            }
        } catch (error) {
            // Ignore malformed or non-navigation links.
        }
    });

    const revealItems = Array.from(document.querySelectorAll('.reveal'));
    revealItems.forEach((element, index) => {
        if (!element.style.getPropertyValue('--reveal-delay')) {
            element.style.setProperty('--reveal-delay', `${Math.min(index % 8, 7) * 70}ms`);
        }
    });

    if ('IntersectionObserver' in window && !reduceMotion) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        revealItems.forEach((element) => revealObserver.observe(element));
    } else {
        revealItems.forEach((element) => element.classList.add('in-view'));
    }

    const numberFormatter = new Intl.NumberFormat('en-US');
    const moneyFormatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        maximumFractionDigits: 0
    });

    const animateCount = (element) => {
        if (element.dataset.countAnimated === 'true') {
            return;
        }

        element.dataset.countAnimated = 'true';
        const target = Number(element.dataset.countTo || 0);
        const suffix = element.dataset.countSuffix || '';
        const prefix = element.dataset.countPrefix || '';
        const duration = 1200;
        const startTime = performance.now();

        const tick = (now) => {
            const progress = Math.min((now - startTime) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            const value = Math.round(target * eased);
            element.textContent = `${prefix}${numberFormatter.format(value)}${suffix}`;

            if (progress < 1) {
                requestAnimationFrame(tick);
            }
        };

        requestAnimationFrame(tick);
    };

    const counters = document.querySelectorAll('[data-count-to]');
    if ('IntersectionObserver' in window && !reduceMotion) {
        const countObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCount(entry.target);
                    countObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.45 });

        counters.forEach((element) => countObserver.observe(element));
    } else {
        counters.forEach((element) => animateCount(element));
    }

    document.querySelectorAll('[data-filter-group]').forEach((group) => {
        const targetName = group.dataset.filterGroup;
        const cards = document.querySelectorAll(`[data-filter-target="${targetName}"]`);

        group.querySelectorAll('[data-filter]').forEach((button) => {
            button.addEventListener('click', () => {
                const filter = button.dataset.filter;
                group.querySelectorAll('[data-filter]').forEach((item) => {
                    item.classList.toggle('is-active', item === button);
                    item.setAttribute('aria-pressed', String(item === button));
                });

                cards.forEach((card) => {
                    const categories = (card.dataset.category || '').split(/\s+/);
                    const visible = filter === 'all' || categories.includes(filter);
                    card.hidden = !visible;
                });
            });
        });
    });

    document.querySelectorAll('[data-billing]').forEach((button) => {
        button.addEventListener('click', () => {
            const billing = button.dataset.billing;
            document.querySelectorAll('[data-billing]').forEach((item) => {
                item.classList.toggle('is-active', item === button);
                item.setAttribute('aria-pressed', String(item === button));
            });

            document.querySelectorAll('[data-price]').forEach((price) => {
                price.textContent = price.dataset[billing] || price.textContent;
            });

            document.querySelectorAll('[data-timeline]').forEach((timeline) => {
                timeline.textContent = timeline.dataset[billing] || timeline.textContent;
            });
        });
    });

    document.querySelectorAll('[data-tabs]').forEach((tabs) => {
        const tabName = tabs.dataset.tabs;
        const buttons = tabs.querySelectorAll('[data-tab]');
        const panels = document.querySelectorAll(`[data-tab-panel="${tabName}"]`);

        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                const active = button.dataset.tab;
                buttons.forEach((item) => {
                    const isActive = item === button;
                    item.classList.toggle('is-active', isActive);
                    item.setAttribute('aria-selected', String(isActive));
                });

                panels.forEach((panel) => {
                    const isActive = panel.dataset.panel === active;
                    panel.classList.toggle('is-active', isActive);
                    panel.hidden = !isActive;
                });
            });
        });
    });

    document.querySelectorAll('[data-faq]').forEach((button) => {
        button.addEventListener('click', () => {
            const item = button.closest('.faq-item');
            if (!item) {
                return;
            }

            const wasOpen = item.classList.contains('is-open');
            const scope = item.closest('[data-faq-list]');

            if (scope) {
                scope.querySelectorAll('.faq-item').forEach((faq) => faq.classList.remove('is-open'));
            }

            item.classList.toggle('is-open', !wasOpen);
            button.setAttribute('aria-expanded', String(!wasOpen));
        });
    });

    document.querySelectorAll('[data-range]').forEach((range) => {
        const output = document.querySelector(`[data-range-output="${range.dataset.range}"]`);
        const update = () => {
            if (output) {
                output.textContent = numberFormatter.format(Number(range.value));
            }
        };
        range.addEventListener('input', update);
        update();
    });

    const updateEstimator = () => {
        const members = Number(document.querySelector('[data-estimator="members"]')?.value || 25000);
        const order = Number(document.querySelector('[data-estimator="order"]')?.value || 85);
        const conversion = Number(document.querySelector('[data-estimator="conversion"]')?.value || 18);
        const volume = members * order * (conversion / 100);
        const payouts = volume * 0.32;
        const retained = volume - payouts;

        const fields = {
            members: numberFormatter.format(members),
            order: moneyFormatter.format(order),
            conversion: `${conversion}%`,
            volume: moneyFormatter.format(volume),
            payouts: moneyFormatter.format(payouts),
            retained: moneyFormatter.format(retained)
        };

        Object.entries(fields).forEach(([key, value]) => {
            document.querySelectorAll(`[data-estimator-output="${key}"]`).forEach((element) => {
                element.textContent = value;
            });
        });
    };

    if (document.querySelector('[data-estimator]')) {
        document.querySelectorAll('[data-estimator]').forEach((input) => {
            input.addEventListener('input', updateEstimator);
        });
        updateEstimator();
    }

    document.querySelectorAll('[data-home-carousel]').forEach((carousel) => {
        const slides = Array.from(carousel.querySelectorAll('[data-carousel-slide]'));
        const dots = Array.from(carousel.querySelectorAll('[data-carousel-dot]'));
        const previous = carousel.querySelector('[data-carousel-prev]');
        const next = carousel.querySelector('[data-carousel-next]');
        const track = carousel.querySelector('[data-carousel-track]');
        const autoplayDelay = Number(carousel.dataset.carouselAutoplay || 6000);
        let activeIndex = slides.findIndex((slide) => slide.classList.contains('is-active'));
        let timer = null;

        if (!slides.length) {
            return;
        }

        if (activeIndex < 0) {
            activeIndex = 0;
        }

        const render = () => {
            slides.forEach((slide, index) => {
                const isActive = index === activeIndex;
                slide.classList.toggle('is-active', isActive);
                slide.setAttribute('aria-hidden', String(!isActive));
            });

            dots.forEach((dot, index) => {
                const isActive = index === activeIndex;
                dot.classList.toggle('is-active', isActive);
                dot.setAttribute('aria-current', isActive ? 'true' : 'false');
            });

            if (track) {
                track.style.transform = `translateX(-${activeIndex * 100}%)`;
            }
        };

        const goTo = (index) => {
            activeIndex = (index + slides.length) % slides.length;
            render();
        };

        const stop = () => {
            if (timer) {
                window.clearInterval(timer);
                timer = null;
            }
        };

        const start = () => {
            if (reduceMotion || slides.length < 2 || timer) {
                return;
            }

            timer = window.setInterval(() => goTo(activeIndex + 1), autoplayDelay);
        };

        previous?.addEventListener('click', () => {
            stop();
            goTo(activeIndex - 1);
            start();
        });

        next?.addEventListener('click', () => {
            stop();
            goTo(activeIndex + 1);
            start();
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                stop();
                goTo(index);
                start();
            });
        });

        carousel.addEventListener('mouseenter', stop);
        carousel.addEventListener('mouseleave', start);
        carousel.addEventListener('focusin', stop);
        carousel.addEventListener('focusout', start);

        render();
        start();
    });

    document.querySelectorAll('[data-download-checklist]').forEach((button) => {
        button.addEventListener('click', () => {
            const checklist = [
                'MLM Software Launch Checklist',
                '',
                '1. Define compensation plan, rank rules, payout caps, and wallet policy.',
                '2. Confirm genealogy, KYC, tax, withdrawal, and approval workflows.',
                '3. Select e-commerce, mobile app, crypto, language, and AI modules.',
                '4. Prepare brand assets, products, onboarding content, and support scripts.',
                '5. Schedule staging review, payout testing, security checks, and launch support.'
            ].join('\n');
            const blob = new Blob([checklist], { type: 'text/plain' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'mlm-software-launch-checklist.txt';
            link.click();
            URL.revokeObjectURL(link.href);
        });
    });

    document.querySelectorAll('[data-form]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            const success = form.querySelector('[data-success]');
            const button = form.querySelector('button[type="submit"]');
            const originalText = button ? button.innerHTML : '';

            success?.classList.add('is-visible');

            if (button) {
                button.disabled = true;
                button.innerHTML = '<span aria-hidden="true">&#10003;</span> Sent Successfully';
                window.setTimeout(() => {
                    button.disabled = false;
                    button.innerHTML = originalText;
                }, 2200);
            }
        });
    });

    const successMessage = document.getElementById('successMessage');
    if (successMessage) {
        successMessage.scrollIntoView({
            behavior: reduceMotion ? 'auto' : 'smooth',
            block: 'start'
        });
    }

    const demoModal = document.getElementById('demoModal');
    if (demoModal) {
        const closeButton = demoModal.querySelector('.modal-close');
        const demoForm = demoModal.querySelector('form');

        const openModal = () => {
            demoModal.classList.add('show');
            demoModal.setAttribute('aria-hidden', 'false');
            body.classList.add('menu-open');
            closeButton?.focus({ preventScroll: true });
        };

        const closeModal = () => {
            demoModal.classList.remove('show');
            demoModal.setAttribute('aria-hidden', 'true');
            body.classList.remove('menu-open');
        };

        document.querySelectorAll('[data-demo-open]').forEach((trigger) => {
            trigger.addEventListener('click', (event) => {
                event.preventDefault();
                openModal();
            });
        });

        closeButton?.addEventListener('click', closeModal);

        // Auto open on every refresh/reload (suppressed if first-visit welcome questionnaire is active on homepage)
        const delay = Number(demoModal.dataset.autoOpen || 1200);
        window.setTimeout(() => {
            const welcomeModal = document.getElementById('welcomeQuestionnaireModal');
            if (welcomeModal && welcomeModal.classList.contains('show')) {
                return;
            }
            openModal();
        }, delay);

        demoForm?.addEventListener('submit', () => {
            const submitButton = demoForm.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = 'Sending...';
            }
        });
    }

    // AI Modules Interactive Tab & Simulator Controller
    const aiTabs = document.querySelector('[data-tabs="aiModules"]');
    if (aiTabs) {
        const tabButtons = aiTabs.querySelectorAll('.ai-tab-btn');
        const moduleCards = document.querySelectorAll('[data-module-card]');
        const simPanels = document.querySelectorAll('[data-sim-panel]');

        const activateAiTab = (tabKey) => {
            tabButtons.forEach((btn) => {
                const isActive = btn.dataset.tab === tabKey;
                btn.classList.toggle('is-active', isActive);
                btn.setAttribute('aria-selected', String(isActive));
            });

            // Filter cards: 'all' shows all 5 cards; otherwise show only targeted card
            moduleCards.forEach((card) => {
                if (tabKey === 'all') {
                    card.hidden = false;
                    card.style.display = '';
                } else {
                    const matches = card.dataset.moduleCard === tabKey;
                    card.hidden = !matches;
                    card.style.display = matches ? 'flex' : 'none';
                }
            });

            // Activate simulation panel
            const activeSimKey = tabKey === 'all' ? 'nav' : tabKey;
            simPanels.forEach((panel) => {
                const isMatch = panel.dataset.simPanel === activeSimKey;
                panel.classList.toggle('is-active', isMatch);
                panel.hidden = !isMatch;
            });
        };

        tabButtons.forEach((btn) => {
            btn.addEventListener('click', () => {
                activateAiTab(btn.dataset.tab);
            });
        });
    }
});
