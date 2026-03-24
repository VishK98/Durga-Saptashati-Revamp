<style>
.settings-page h2 { font-size: 1.5rem; font-weight: 700; color: var(--text-primary); }
.settings-page .subtitle { color: var(--text-muted); font-size: 0.9rem; margin-top: 4px; }
.settings-tabs { display: flex; gap: 0; border-bottom: 2px solid var(--border); margin-top: 20px; }
.settings-tab {
    display: flex; align-items: center; gap: 8px; padding: 14px 28px; border: none; background: none;
    font-family: inherit; font-size: 0.92rem; font-weight: 600; color: var(--text-muted); cursor: pointer;
    position: relative; transition: all 0.3s;
}
.settings-tab::after {
    content: ''; position: absolute; bottom: -2px; left: 0; right: 0; height: 3px;
    background: transparent; border-radius: 3px 3px 0 0; transition: background 0.3s;
}
.settings-tab.active { color: var(--accent); }
.settings-tab.active::after { background: var(--accent); }
.settings-tab:hover { color: var(--accent); }
.settings-tab i { font-size: 0.9rem; }
.settings-panel {
    background: var(--card-bg); border: 1px solid var(--border); border-radius: 14px;
    margin-top: 25px; padding: 30px; max-width: 650px;
}
.settings-panel h4 { font-size: 1.1rem; font-weight: 700; color: var(--text-primary); margin-bottom: 4px; }
.settings-panel .panel-desc { color: var(--text-muted); font-size: 0.85rem; margin-bottom: 25px; }
.s-field { margin-bottom: 22px; }
.s-field label {
    display: block; font-weight: 600; font-size: 0.85rem; color: var(--text-secondary); margin-bottom: 8px;
}
.s-field input {
    width: 100%; padding: 12px 16px; border: 1.5px solid var(--border); border-radius: 10px;
    font-size: 0.9rem; font-family: inherit; transition: all 0.3s; background: #f9fafb;
}
.s-field input:focus {
    outline: none; border-color: var(--accent); box-shadow: 0 0 0 3px var(--accent-light); background: #fff;
}
.alert-success {
    background: #f0fdf4; color: #16a34a; padding: 12px 16px; border-radius: 10px; font-size: 0.85rem;
    margin-bottom: 22px; border-left: 4px solid #22c55e; display: flex; align-items: center; gap: 8px;
}
.alert-error {
    background: #fef2f2; color: #dc2626; padding: 12px 16px; border-radius: 10px; font-size: 0.85rem;
    margin-bottom: 22px; border-left: 4px solid #ef4444; display: flex; align-items: center; gap: 8px;
}
</style>

<?php
$adminData = null;
if (isset($_SESSION['admin_id'])) {
    $stmt = $pdo->prepare("SELECT name, email FROM admin_users WHERE id = ?");
    $stmt->execute([$_SESSION['admin_id']]);
    $adminData = $stmt->fetch();
}
?>

<div class="settings-page">
    <h2>Settings</h2>
    <p class="subtitle">Manage your account and application settings</p>

    <!-- Tabs -->
    <div class="data-panel" style="margin-top:20px;overflow:visible;">
        <div class="settings-tabs">
            <button class="settings-tab active" onclick="switchSettingsTab(this, 'profile')">
                <i class="fas fa-user"></i> Profile
            </button>
            <button class="settings-tab" onclick="switchSettingsTab(this, 'security')">
                <i class="fas fa-lock"></i> Security
            </button>
        </div>

        <!-- Profile Tab -->
        <div id="settings-tab-profile" class="settings-panel" style="border:none;border-radius:0;margin-top:0;">

            <?php if (!empty($_SESSION['settings_success'])): ?>
                <div class="alert-success">
                    <i class="fas fa-check-circle"></i> <?= htmlspecialchars($_SESSION['settings_success']) ?>
                </div>
                <?php unset($_SESSION['settings_success']); ?>
            <?php endif; ?>

            <h4>Profile Information</h4>
            <p class="panel-desc">Update your account profile information</p>

            <form method="POST" action="admin.php?page=settings&action=update_profile">
                <div class="s-field">
                    <label>Full Name</label>
                    <input type="text" name="name" value="<?= htmlspecialchars($adminData['name'] ?? 'Admin') ?>">
                </div>
                <div class="s-field">
                    <label>Email Address</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($adminData['email'] ?? '') ?>">
                </div>
                <div class="s-field">
                    <label>Phone Number</label>
                    <input type="text" name="phone" value="+91 9289088161">
                </div>
                <div class="s-field">
                    <label>Address</label>
                    <input type="text" name="address" value="Dwarka, New Delhi, India">
                </div>
                <button type="submit" class="btn-admin btn-primary" style="margin-top:5px;">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </form>
        </div>

        <!-- Security Tab -->
        <div id="settings-tab-security" class="settings-panel" style="display:none;border:none;border-radius:0;margin-top:0;">

            <?php if (!empty($_SESSION['settings_error'])): ?>
                <div class="alert-error">
                    <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($_SESSION['settings_error']) ?>
                </div>
                <?php unset($_SESSION['settings_error']); ?>
            <?php endif; ?>

            <h4>Change Password</h4>
            <p class="panel-desc">Ensure your account is using a strong password for security</p>

            <form method="POST" action="admin.php?page=settings&action=change_password">
                <div class="s-field">
                    <label>Current Password</label>
                    <input type="password" name="current_password" required placeholder="Enter current password">
                </div>
                <div class="s-field">
                    <label>New Password</label>
                    <input type="password" name="new_password" required minlength="6" placeholder="Enter new password">
                </div>
                <div class="s-field">
                    <label>Confirm New Password</label>
                    <input type="password" name="confirm_password" required minlength="6" placeholder="Confirm new password">
                </div>
                <button type="submit" class="btn-admin btn-primary" style="margin-top:5px;">
                    <i class="fas fa-lock"></i> Update Password
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function switchSettingsTab(btn, tab) {
    document.querySelectorAll('.settings-tab').forEach(function(t) { t.classList.remove('active'); });
    btn.classList.add('active');
    document.querySelectorAll('[id^="settings-tab-"]').forEach(function(p) { p.style.display = 'none'; });
    document.getElementById('settings-tab-' + tab).style.display = 'block';
}
<?php if (!empty($_GET['action']) && $_GET['action'] === 'change_password'): ?>
// Auto-switch to security tab if coming from password change
document.querySelector('.settings-tab:nth-child(2)').click();
<?php endif; ?>
</script>
