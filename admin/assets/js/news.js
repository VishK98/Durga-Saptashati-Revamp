/* News Page JavaScript */

// Generic form dropdown handler (reusable for category/status dropdowns)
function selectFormDropdown(prefix, el) {
    var val = el.dataset.value;
    var wrap = el.closest('.custom-select-wrap');
    document.getElementById(prefix + 'Val').value = val;
    document.getElementById(prefix + 'Text').textContent = el.querySelector('.cs-opt-text').textContent;
    wrap.querySelectorAll('.custom-select-option').forEach(function(o) { o.classList.remove('selected'); });
    el.classList.add('selected');
    wrap.classList.remove('open');
}

// Set form dropdown to a value programmatically
function setFormDropdown(prefix, val) {
    document.getElementById(prefix + 'Val').value = val;
    var wrap = document.getElementById(prefix + 'Wrap');
    var textEl = document.getElementById(prefix + 'Text');
    wrap.querySelectorAll('.custom-select-option').forEach(function(o) {
        o.classList.remove('selected');
        if (o.dataset.value === val) {
            o.classList.add('selected');
            textEl.textContent = o.querySelector('.cs-opt-text').textContent;
        }
    });
}

// Filter dropdown handler
function selectNewsFilter(el) {
    var val = el.dataset.value;
    var wrap = el.closest('.custom-select-wrap');
    var textEl = document.getElementById('filterNewsStatusText');
    document.getElementById('filterNewsStatus').value = val;
    textEl.textContent = el.querySelector('.cs-opt-text').textContent;
    textEl.className = val ? '' : 'cs-placeholder';
    wrap.querySelectorAll('.custom-select-option').forEach(function(o) { o.classList.remove('selected'); });
    el.classList.add('selected');
    wrap.classList.remove('open');
    filterNews();
}

document.addEventListener('click', function(e) {
    document.querySelectorAll('.custom-select-wrap.open').forEach(function(wrap) {
        if (!wrap.contains(e.target)) wrap.classList.remove('open');
    });
});

function updateNewsClearBtn() {
    var search = document.getElementById('newsSearch').value;
    var status = document.getElementById('filterNewsStatus').value;
    var btn = document.getElementById('newsClearBtn');
    if (btn) {
        if (search || status) {
            btn.classList.add('visible');
        } else {
            btn.classList.remove('visible');
        }
    }
}

function openAddNews() {
    document.getElementById('addNewsForm').reset();
    setFormDropdown('addNewsCategory', 'General');
    setFormDropdown('addNewsStatus', 'published');
    document.getElementById('addNewsModal').style.display = 'flex';
}

function editNews(news) {
    document.getElementById('editNewsId').value = news.id;
    document.getElementById('editNewsTitle').value = news.title;
    setFormDropdown('editNewsCategory', news.category || 'General');
    document.getElementById('editNewsContent').value = news.content || '';
    document.getElementById('editNewsSource').value = news.source || '';
    document.getElementById('editNewsUrl').value = news.source_url || '';
    setFormDropdown('editNewsStatus', news.status || 'published');
    document.getElementById('editNewsModal').style.display = 'flex';
}

function ajaxNewsAction(action, newsId) {
    var fd = new FormData();
    fd.append('action', action);
    fd.append('news_id', newsId);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'admin?page=news');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        try {
            var res = JSON.parse(xhr.responseText);
            if (res.success) {
                showToast(res.message, 'success');
                setTimeout(function(){ location.reload(); }, 800);
            } else {
                showToast(res.message || 'Something went wrong.', 'error');
            }
        } catch(e) { showToast('Server error.', 'error'); }
    };
    xhr.onerror = function() { showToast('Network error.', 'error'); };
    xhr.send(fd);
}

var _newsConfirmCb = null;
function showNewsConfirm(message, onConfirm) {
    _newsConfirmCb = onConfirm;
    document.getElementById('newsConfirmMessage').textContent = message;
    document.getElementById('newsConfirmModal').style.display = 'flex';
}

document.getElementById('newsConfirmBtn').addEventListener('click', function() {
    document.getElementById('newsConfirmModal').style.display = 'none';
    if (_newsConfirmCb) _newsConfirmCb();
    _newsConfirmCb = null;
});

function filterNews() {
    var search = document.getElementById('newsSearch').value.toLowerCase();
    var status = document.getElementById('filterNewsStatus').value;
    var table = document.getElementById('newsTable');
    if (!table) return;
    var rows = table.querySelector('tbody').querySelectorAll('tr');
    var count = 0;
    rows.forEach(function(row) {
        var cells = row.querySelectorAll('td');
        if (cells.length <= 1) return;
        var title = (cells[1] ? cells[1].textContent : '').toLowerCase();
        var category = (cells[2] ? cells[2].textContent : '').toLowerCase();
        var source = (cells[3] ? cells[3].textContent : '').toLowerCase();
        var rowStatus = row.getAttribute('data-status') || '';
        var matchSearch = !search || title.indexOf(search) > -1 || category.indexOf(search) > -1 || source.indexOf(search) > -1;
        var matchStatus = !status || rowStatus === status;
        if (matchSearch && matchStatus) {
            row.style.display = '';
            count++;
            cells[0].textContent = count;
        } else {
            row.style.display = 'none';
        }
    });
    updateNewsClearBtn();
}

function clearNewsFilters() {
    document.getElementById('newsSearch').value = '';
    document.getElementById('filterNewsStatus').value = '';
    var textEl = document.getElementById('filterNewsStatusText');
    textEl.textContent = 'All Status';
    textEl.className = 'cs-placeholder';
    var wrap = document.getElementById('filterNewsStatusWrap');
    wrap.querySelectorAll('.custom-select-option').forEach(function(o) { o.classList.remove('selected'); });
    wrap.querySelector('.custom-select-option[data-value=""]').classList.add('selected');
    filterNews();
}

// Close modals on backdrop click
['addNewsModal','editNewsModal','newsConfirmModal'].forEach(function(id) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', function(e) { if (e.target === this) this.style.display = 'none'; });
});
