function switchSettingsTab(btn, tab) {
    document.querySelectorAll('.settings-tab').forEach(function(t) { t.classList.remove('active'); });
    btn.classList.add('active');
    document.querySelectorAll('[id^="settings-tab-"]').forEach(function(p) { p.style.display = 'none'; });
    document.getElementById('settings-tab-' + tab).style.display = 'block';
}

// Auto-switch to security tab if flagged
if (window.settingsAutoSwitchSecurity) {
    document.addEventListener('DOMContentLoaded', function() {
        var secTab = document.querySelector('.settings-tab:nth-child(2)');
        if (secTab) secTab.click();
    });
}
