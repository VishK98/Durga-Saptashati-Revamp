<?php
require_once '../app/config/config.php';
$pageTitle = "Career Opportunities | Saptashati Foundation";
$pageDescription = "Explore career opportunities at Saptashati Foundation. Work with purpose and make a real difference in communities.";
$pageKeywords = "NGO jobs Delhi, career at NGO, social work jobs, Saptashati Foundation careers, work with purpose";

// Fetch active openings
$openings = $pdo->query("SELECT * FROM careers WHERE status = 'active' ORDER BY created_at DESC")->fetchAll();
$hasOpenings = !empty($openings);

include '../app/views/layout/header.php';
?>

<!-- Page Header -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Career Opportunities</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="#">Careers</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-uppercase mb-2" style="color:#f26522;letter-spacing:3px;font-weight:600;">Join Our Team</h6>
            <h2 style="color:#1a1b2e;font-weight:700;">Work With Purpose</h2>
            <p style="color:#888;max-width:600px;margin:10px auto 0;">We're always looking for passionate individuals who want to make a real difference in society. Explore our current openings or send us your profile.</p>
        </div>

        <?php if ($hasOpenings): ?>
        <!-- Openings + Sidebar -->
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                <?php foreach ($openings as $job): ?>
                <div class="col-md-6 mb-4">
                <div style="background:#fff;border-radius:12px;padding:28px;box-shadow:0 4px 20px rgba(0,0,0,0.06);border-left:4px solid #f26522;transition:all 0.3s;height:100%;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                    <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:12px;">
                        <h5 style="color:#1a1b2e;font-weight:700;margin:0;font-size:1.1rem;"><?= htmlspecialchars($job['title']) ?></h5>
                        <span style="background:rgba(16,185,129,0.1);color:#059669;padding:4px 12px;border-radius:20px;font-size:0.72rem;font-weight:600;white-space:nowrap;"><?= ucfirst(str_replace('-', ' ', $job['type'])) ?></span>
                    </div>
                    <div style="display:flex;flex-wrap:wrap;gap:18px;margin-bottom:14px;">
                        <?php if ($job['department']): ?>
                        <span style="color:#888;font-size:0.82rem;"><i class="fas fa-building" style="color:#f26522;margin-right:4px;"></i><?= htmlspecialchars($job['department']) ?></span>
                        <?php endif; ?>
                        <span style="color:#888;font-size:0.82rem;"><i class="fas fa-map-marker-alt" style="color:#f26522;margin-right:4px;"></i><?= htmlspecialchars($job['location'] ?? 'Dwarka, New Delhi') ?></span>
                        <span style="color:#888;font-size:0.82rem;"><i class="far fa-calendar-alt" style="color:#f26522;margin-right:4px;"></i><?= date('M d, Y', strtotime($job['created_at'])) ?></span>
                    </div>
                    <?php if ($job['description']): ?>
                    <p style="color:#666;font-size:0.88rem;line-height:1.65;margin-bottom:14px;"><?= htmlspecialchars(mb_strimwidth(strip_tags($job['description']), 0, 200, '...')) ?></p>
                    <?php endif; ?>
                    <button onclick="openApplyModal(<?= $job['id'] ?>, '<?= addslashes(htmlspecialchars($job['title'])) ?>')" style="background:#f26522;color:#fff;border:none;padding:9px 22px;border-radius:8px;font-size:0.85rem;font-weight:600;cursor:pointer;font-family:inherit;transition:background 0.2s;" onmouseover="this.style.background='#d4541a'" onmouseout="this.style.background='#f26522'">
                        Apply Now <i class="fas fa-arrow-right ml-1"></i>
                    </button>
                </div>
                </div>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div style="background:#fff;border-radius:14px;padding:25px;box-shadow:0 4px 20px rgba(0,0,0,0.06);margin-bottom:20px;">
                    <h5 style="color:#1a1b2e;font-weight:700;margin-bottom:15px;padding-bottom:12px;border-bottom:2px solid #f26522;display:inline-block;">Why Work With Us?</h5>
                    <div style="margin-bottom:14px;display:flex;gap:12px;align-items:start;">
                        <div style="width:36px;height:36px;border-radius:8px;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-heart" style="color:#f26522;font-size:0.8rem;"></i></div>
                        <div><strong style="color:#1a1b2e;font-size:0.85rem;">Meaningful Impact</strong><p style="color:#888;font-size:0.8rem;margin:3px 0 0;">Make a real difference in the lives of women, children, and communities.</p></div>
                    </div>
                    <div style="margin-bottom:14px;display:flex;gap:12px;align-items:start;">
                        <div style="width:36px;height:36px;border-radius:8px;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-users" style="color:#f26522;font-size:0.8rem;"></i></div>
                        <div><strong style="color:#1a1b2e;font-size:0.85rem;">Great Team</strong><p style="color:#888;font-size:0.8rem;margin:3px 0 0;">Work with passionate individuals committed to social change.</p></div>
                    </div>
                    <div style="margin-bottom:14px;display:flex;gap:12px;align-items:start;">
                        <div style="width:36px;height:36px;border-radius:8px;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-chart-line" style="color:#f26522;font-size:0.8rem;"></i></div>
                        <div><strong style="color:#1a1b2e;font-size:0.85rem;">Growth & Learning</strong><p style="color:#888;font-size:0.8rem;margin:3px 0 0;">Develop new skills through hands-on community work.</p></div>
                    </div>
                </div>
                <div style="background:#1a1b2e;border-radius:14px;padding:25px;color:#fff;">
                    <h5 style="font-weight:700;margin-bottom:12px;">Have Questions?</h5>
                    <p style="color:rgba(255,255,255,0.7);font-size:0.85rem;margin-bottom:15px;">Feel free to reach out to us for any career-related inquiries.</p>
                    <a href="mailto:support@saptashati.org" style="color:#f26522;font-size:0.88rem;font-weight:600;text-decoration:none;"><i class="fas fa-envelope mr-2"></i>support@saptashati.org</a>
                </div>
            </div>
        </div>

        <!-- Apply Modal -->
        <div id="applyModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(4px);">
            <div style="background:#fff;border-radius:16px;width:95%;max-width:620px;max-height:90vh;overflow-y:auto;padding:0;position:relative;box-shadow:0 25px 60px rgba(0,0,0,0.3);animation:modalSlideIn 0.3s ease;">
                <!-- Modal Header -->
                <div style="padding:24px 30px 18px;border-bottom:1px solid #f0f0f0;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;background:#fff;border-radius:16px 16px 0 0;z-index:1;">
                    <div>
                        <h4 style="color:#1a1b2e;font-weight:700;margin:0;font-size:1.15rem;" id="modalTitle">Apply for Position</h4>
                        <p style="color:#999;font-size:0.82rem;margin:4px 0 0;" id="modalSubtitle">Fill in the details below to submit your application.</p>
                    </div>
                    <button onclick="closeApplyModal()" style="background:#f3f4f6;border:none;width:36px;height:36px;border-radius:50%;cursor:pointer;font-size:1.2rem;color:#666;display:flex;align-items:center;justify-content:center;transition:all 0.2s;flex-shrink:0;" onmouseover="this.style.background='#fee2e2';this.style.color='#ef4444'" onmouseout="this.style.background='#f3f4f6';this.style.color='#666'">&times;</button>
                </div>
                <!-- Modal Body -->
                <div style="padding:24px 30px 30px;">
                    <form id="careerForm" onsubmit="return false;" enctype="multipart/form-data">
                        <input type="hidden" name="career_id" id="careerId" value="">
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                            <div>
                                <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Full Name *</label>
                                <input type="text" name="name" required placeholder="Your full name" style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;transition:all 0.3s;background:#f9fafb;" onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'" onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
                            </div>
                            <div>
                                <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Email *</label>
                                <input type="email" name="email" required placeholder="you@email.com" style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;transition:all 0.3s;background:#f9fafb;" onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'" onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
                            </div>
                        </div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                            <div>
                                <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Phone</label>
                                <input type="text" name="phone" placeholder="+91 XXXXXXXXXX" style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;transition:all 0.3s;background:#f9fafb;" onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'" onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
                            </div>
                            <div>
                                <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Area of Interest</label>
                                <select name="area_of_interest" style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;background:#f9fafb;">
                                    <option value="">Select area</option>
                                    <option value="Education">Education</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Women Empowerment">Women Empowerment</option>
                                    <option value="Community Development">Community Development</option>
                                    <option value="Administration">Administration</option>
                                    <option value="Marketing">Marketing & Communications</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div style="margin-bottom:15px;">
                            <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Resume (PDF, DOC, DOCX - Max 5MB)</label>
                            <input type="file" name="resume" accept=".pdf,.doc,.docx" style="width:100%;padding:10px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.85rem;font-family:inherit;background:#f9fafb;">
                        </div>
                        <div style="margin-bottom:20px;">
                            <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Cover Letter / Message *</label>
                            <textarea name="message" required rows="4" placeholder="Tell us about yourself, your experience, and why you'd like to work with us..." style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;resize:vertical;transition:all 0.3s;background:#f9fafb;" onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'" onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'"></textarea>
                        </div>
                        <div style="display:flex;gap:12px;justify-content:flex-end;">
                            <button type="button" onclick="closeApplyModal()" style="background:#f3f4f6;color:#666;border:none;padding:12px 28px;border-radius:10px;font-size:0.9rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.2s;" onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">Cancel</button>
                            <button type="button" id="careerSubmitBtn" onclick="submitCareer()" style="background:#f26522;color:#fff;border:none;padding:12px 28px;border-radius:10px;font-size:0.9rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.3s;min-width:160px;" onmouseover="this.style.background='#d4541a'" onmouseout="this.style.background='#f26522'">
                                Submit Application
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php else: ?>
        <!-- No Openings -->
        <div style="background:#fff;border-radius:14px;padding:50px 30px;box-shadow:0 4px 20px rgba(0,0,0,0.06);text-align:center;margin-bottom:40px;">
            <div style="width:80px;height:80px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
                <i class="fas fa-briefcase" style="font-size:2rem;color:#f26522;"></i>
            </div>
            <h4 style="color:#1a1b2e;font-weight:700;margin-bottom:10px;">No Current Openings</h4>
            <p style="color:#888;max-width:500px;margin:0 auto;font-size:0.92rem;">We don't have any open positions right now. Please check back later for new opportunities!</p>
        </div>
        <?php endif; ?>
    </div>
</div>


<script>
function openApplyModal(id, title) {
    document.getElementById('careerId').value = id;
    document.getElementById('modalTitle').textContent = 'Apply for: ' + title;
    document.getElementById('modalSubtitle').textContent = 'Fill in the details below to submit your application.';
    document.getElementById('applyModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}
function closeApplyModal() {
    document.getElementById('applyModal').style.display = 'none';
    document.body.style.overflow = '';
}
document.getElementById('applyModal') && document.getElementById('applyModal').addEventListener('click', function(e) {
    if (e.target === this) closeApplyModal();
});
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeApplyModal();
});
function submitCareer() {
    var form = document.getElementById('careerForm');
    var btn = document.getElementById('careerSubmitBtn');
    var name = form.querySelector('[name="name"]').value.trim();
    var email = form.querySelector('[name="email"]').value.trim();
    var message = form.querySelector('[name="message"]').value.trim();
    if (!name || !email || !message) { showToast('Please fill in all required fields.','error'); return; }

    var orig = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '<span style="display:inline-block;width:18px;height:18px;border:3px solid rgba(255,255,255,0.3);border-top-color:#fff;border-radius:50%;animation:careerSpin 0.6s linear infinite;vertical-align:middle;"></span>';

    var fd = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '<?= url("api/career.php") ?>');
    xhr.onload = function() {
        btn.disabled = false; btn.innerHTML = orig;
        try {
            var r = JSON.parse(xhr.responseText);
            showToast(r.message, r.success ? 'success' : 'error');
            if (r.success) { form.reset(); closeApplyModal(); window.scrollTo({top:0,behavior:'smooth'}); }
        } catch(e) { showToast('Something went wrong.','error'); }
    };
    xhr.onerror = function() { btn.disabled = false; btn.innerHTML = orig; showToast('Network error.','error'); };
    xhr.send(fd);
}
</script>

<?php include '../app/views/layout/footer.php'; ?>
