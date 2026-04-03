/* ===== Index Page Scripts ===== */

/* --- Counter Animation --- */
(function() {
    var countersStarted = false;

    function animateCounters() {
        if (countersStarted) return;
        countersStarted = true;
        document.querySelectorAll('.counter-num').forEach(function(el) {
            var target = parseInt(el.getAttribute('data-target'));
            var duration = 2000;
            var start = 0;
            var startTime = null;

            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                var progress = Math.min((timestamp - startTime) / duration, 1);
                var eased = 1 - Math.pow(1 - progress, 3);
                el.textContent = Math.floor(eased * target) + '+';
                if (progress < 1) {
                    requestAnimationFrame(step);
                } else {
                    el.textContent = target + '+';
                }
            }
            requestAnimationFrame(step);
        });
    }
    var counterSection = document.querySelector('.counter-num');
    if (counterSection) {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.disconnect();
                }
            });
        }, {
            threshold: 0.3
        });
        observer.observe(counterSection.closest('.container-fluid'));
    }
})();

/* --- Razorpay Donation --- */
(function() {
    var btn = document.getElementById('homeDonateBtn');
    if (!btn) return;

    var form = document.getElementById('homeDonateForm');
    var paymentUrl = form.getAttribute('data-payment-url');

    btn.addEventListener('click', function() {
        var name = form.querySelector('[name="name"]').value.trim();
        var email = form.querySelector('[name="email"]').value.trim();
        var phone = form.querySelector('[name="phone"]').value.trim();
        var amount = parseInt(form.querySelector('[name="amount"]').value);
        if (!name || !email || !amount || amount <= 0) {
            showToast('Please fill in all required fields.', 'error');
            return;
        }

        var originalHTML = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

        var fd = new FormData();
        fd.append('action', 'create_order');
        fd.append('amount', amount);
        fd.append('type', 'donation');
        fd.append('name', name);
        fd.append('email', email);
        fd.append('phone', phone);

        fetch(paymentUrl, {
                method: 'POST',
                body: fd
            })
            .then(function(r) {
                return r.json();
            })
            .then(function(data) {
                if (!data.success) {
                    btn.disabled = false;
                    btn.innerHTML = originalHTML;
                    showToast(data.message || 'Could not initiate payment.', 'error');
                    return;
                }
                var options = {
                    key: data.key,
                    amount: data.amount * 100,
                    currency: 'INR',
                    name: 'Durga Saptashati Foundation',
                    description: 'Donation',
                    order_id: data.order_id,
                    prefill: {
                        name: name,
                        email: email,
                        contact: phone
                    },
                    theme: {
                        color: '#f26522'
                    },
                    handler: function(response) {
                        var vfd = new FormData();
                        vfd.append('action', 'verify_payment');
                        vfd.append('type', 'donation');
                        vfd.append('razorpay_payment_id', response.razorpay_payment_id);
                        vfd.append('razorpay_order_id', response.razorpay_order_id);
                        vfd.append('razorpay_signature', response.razorpay_signature);
                        vfd.append('name', name);
                        vfd.append('email', email);
                        vfd.append('phone', phone);
                        vfd.append('amount', amount);
                        vfd.append('message', '');

                        fetch(paymentUrl, {
                                method: 'POST',
                                body: vfd
                            })
                            .then(function(r) {
                                return r.json();
                            })
                            .then(function(vdata) {
                                btn.disabled = false;
                                btn.innerHTML = originalHTML;
                                if (vdata.success) {
                                    showToast(vdata.message, 'success');
                                    form.reset();
                                } else {
                                    showToast(vdata.message, 'error');
                                }
                            });
                    },
                    modal: {
                        ondismiss: function() {
                            btn.disabled = false;
                            btn.innerHTML = originalHTML;
                        }
                    }
                };
                var rzp = new Razorpay(options);
                rzp.open();
            })
            .catch(function() {
                btn.disabled = false;
                btn.innerHTML = originalHTML;
                showToast('Network error. Please try again.', 'error');
            });
    });

    /* --- Quick amount buttons --- */
    document.querySelectorAll('.donate-quick').forEach(function(el) {
        el.addEventListener('click', function() {
            var val = this.getAttribute('data-amount');
            form.querySelector('[name=amount]').value = val;
        });
    });
})();
