<link rel="stylesheet" href="../admin/assets/css/settings.css">

<?php
$adminData = null;
if (isset($_SESSION['admin_id'])) {
    $stmt = $pdo->prepare("SELECT name, email, phone, address FROM admin_users WHERE id = ?");
    $stmt->execute([$_SESSION['admin_id']]);
    $adminData = $stmt->fetch();
}
?>

<div class="settings-page">
    <h2>Settings</h2>
    <p class="subtitle">Manage your account and application settings</p>

    <!-- Tabs -->
    <div class="data-panel st-data-panel-wrapper">
        <div class="settings-tabs">
            <button class="settings-tab active" onclick="switchSettingsTab(this, 'profile')">
                <i class="fas fa-user"></i> Profile
            </button>
            <button class="settings-tab" onclick="switchSettingsTab(this, 'security')">
                <i class="fas fa-lock"></i> Security
            </button>
        </div>

        <!-- Profile Tab -->
        <div id="settings-tab-profile" class="settings-panel st-panel-inner">

            <?php if (!empty($_SESSION['settings_success'])): ?>
                <div class="alert-success">
                    <i class="fas fa-check-circle"></i> <?= htmlspecialchars($_SESSION['settings_success']) ?>
                </div>
                <?php unset($_SESSION['settings_success']); ?>
            <?php endif; ?>

            <h4>Profile Information</h4>
            <p class="panel-desc">Update your account profile information</p>

            <form method="POST" action="admin/settings&action=update_profile">
                <div class="s-field">
                    <label>Full Name</label>
                    <input type="text" name="name" value="<?= htmlspecialchars($adminData['name'] ?? '') ?>" required>
                </div>
                <div class="s-field">
                    <label>Email Address</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($adminData['email'] ?? '') ?>" required>
                </div>
                <div class="s-field">
                    <label>Phone Number</label>
                    <input type="text" name="phone" value="<?= htmlspecialchars($adminData['phone'] ?? '') ?>" placeholder="e.g. +91 9876543210">
                </div>
                <div class="s-field">
                    <label>Address</label>
                    <input type="text" name="address" value="<?= htmlspecialchars($adminData['address'] ?? '') ?>" placeholder="e.g. Dwarka, New Delhi">
                </div>
                <button type="submit" class="btn-admin btn-primary st-btn-save">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </form>
        </div>

        <!-- Security Tab -->
        <div id="settings-tab-security" class="settings-panel st-panel-hidden">

            <?php if (!empty($_SESSION['settings_error'])): ?>
                <div class="alert-error">
                    <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($_SESSION['settings_error']) ?>
                </div>
                <?php unset($_SESSION['settings_error']); ?>
            <?php endif; ?>

            <h4>Change Password</h4>
            <p class="panel-desc">Ensure your account is using a strong password for security</p>

            <form method="POST" action="admin/settings&action=change_password">
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
                <button type="submit" class="btn-admin btn-primary st-btn-save">
                    <i class="fas fa-lock"></i> Update Password
                </button>
            </form>
        </div>
    </div>
</div>

<?php if (!empty($_GET['action']) && $_GET['action'] === 'change_password'): ?>
<script>window.settingsAutoSwitchSecurity = true;</script>
<?php endif; ?>
<script src="../admin/assets/js/settings.js"></script>
