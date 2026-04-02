// Dashboard Charts - requires chartData global variable

// Donation Area Chart
new ApexCharts(document.getElementById('donationChart'), {
    chart: {
        type: 'area',
        height: 260,
        toolbar: { show: false },
        fontFamily: 'Inter, sans-serif',
        animations: {
            enabled: true,
            easing: 'easeinout',
            speed: 600,
            animateGradually: { enabled: false }
        }
    },
    series: [{ name: 'Revenue', data: chartData.donationAmounts }],
    labels: chartData.donationLabels,
    colors: ['#f26522'],
    fill: {
        type: 'gradient',
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.35,
            opacityTo: 0.05,
            stops: [0, 90, 100]
        }
    },
    stroke: { curve: 'smooth', width: 3 },
    markers: {
        size: 5,
        colors: ['#fff'],
        strokeColors: '#f26522',
        strokeWidth: 2,
        hover: { size: 7 }
    },
    dataLabels: { enabled: false },
    grid: {
        borderColor: '#f0f0f0',
        strokeDashArray: 4,
        xaxis: { lines: { show: false } }
    },
    xaxis: {
        labels: { style: { colors: '#9ca3af', fontSize: '11px' } },
        axisBorder: { show: false },
        axisTicks: { show: false }
    },
    yaxis: {
        labels: {
            style: { colors: '#9ca3af', fontSize: '11px' },
            formatter: function(v) {
                return '\u20B9' + (v >= 1000 ? (v / 1000) + 'k' : v);
            }
        }
    },
    tooltip: {
        theme: 'dark',
        y: {
            formatter: function(v) {
                return '\u20B9' + v.toLocaleString('en-IN');
            }
        }
    }
}).render();

// Member Donut
new ApexCharts(document.getElementById('memberDonut'), {
    chart: {
        type: 'donut',
        height: 280,
        fontFamily: 'Inter, sans-serif',
        animations: { enabled: true, speed: 500 }
    },
    series: [chartData.approvedMembers, chartData.pendingMembers],
    labels: ['Approved', 'Pending'],
    colors: ['#10b981', '#f59e0b'],
    plotOptions: {
        pie: {
            donut: {
                size: '72%',
                labels: {
                    show: true,
                    name: { fontSize: '14px', fontWeight: 600 },
                    value: { fontSize: '22px', fontWeight: 700, color: '#1a1b2e' },
                    total: {
                        show: true,
                        label: 'Total',
                        fontSize: '13px',
                        color: '#9ca3af',
                        formatter: function(w) {
                            return w.globals.seriesTotals.reduce(function(a, b) { return a + b; }, 0);
                        }
                    }
                }
            }
        }
    },
    dataLabels: { enabled: false },
    legend: {
        position: 'bottom',
        fontSize: '12px',
        fontWeight: 500,
        markers: { width: 10, height: 10, radius: 3 },
        itemMargin: { horizontal: 12 }
    },
    stroke: { width: 0 },
    tooltip: { theme: 'dark' }
}).render();

// Members Bar Chart
new ApexCharts(document.getElementById('membersBarChart'), {
    chart: {
        type: 'bar',
        height: 240,
        toolbar: { show: false },
        fontFamily: 'Inter, sans-serif',
        animations: { enabled: true, speed: 500 }
    },
    series: [{ name: 'New Members', data: chartData.memberCounts }],
    labels: chartData.memberLabels,
    colors: ['#8b5cf6'],
    plotOptions: {
        bar: { borderRadius: 8, columnWidth: '45%', distributed: false }
    },
    dataLabels: { enabled: false },
    grid: {
        borderColor: '#f0f0f0',
        strokeDashArray: 4,
        xaxis: { lines: { show: false } }
    },
    xaxis: {
        labels: { style: { colors: '#9ca3af', fontSize: '11px' } },
        axisBorder: { show: false },
        axisTicks: { show: false }
    },
    yaxis: {
        labels: { style: { colors: '#9ca3af', fontSize: '11px' } },
        tickAmount: 4
    },
    tooltip: { theme: 'dark' }
}).render();

// Content Donut
new ApexCharts(document.getElementById('contentPie'), {
    chart: {
        type: 'donut',
        height: 280,
        fontFamily: 'Inter, sans-serif',
        animations: { enabled: true, speed: 500 }
    },
    series: [chartData.blogCount, chartData.newsCount, chartData.galleryCount, chartData.eventCount],
    labels: ['Blogs', 'News', 'Gallery', 'Events'],
    colors: ['#f26522', '#3b82f6', '#8b5cf6', '#10b981'],
    plotOptions: {
        pie: { donut: { size: '65%' } }
    },
    dataLabels: { enabled: false },
    legend: {
        position: 'bottom',
        fontSize: '12px',
        fontWeight: 500,
        markers: { width: 10, height: 10, radius: 3 },
        itemMargin: { horizontal: 10 }
    },
    stroke: { width: 0 },
    tooltip: { theme: 'dark' }
}).render();
