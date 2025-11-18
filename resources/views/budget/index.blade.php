<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/keloang.png') }}" type="image/x-icon">
    <title>Keloang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        /* ===== COLOR VARIABLES - PROFESSIONAL PALETTE ===== */
        :root {
            --primary: #014AAD;
            --primary-dark: #003875;
            --primary-light: #4F8FD3;
            --primary-lighter: #E8F2FC;
            --bg-page: #F8FAFC;
            --bg-card: #FFFFFF;
            --bg-hover: #F0F7FF;
            --bg-subtle: #FAFBFC;
            --border: #E2E8F0;
            --border-light: #F1F5F9;
            --text-primary: #0F172A;
            --text-secondary: #475569;
            --text-tertiary: #64748B;
            --text-hint: #94A3B8;
            --shadow-sm: 0 1px 2px 0 rgba(1, 74, 173, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(1, 74, 173, 0.08), 0 2px 4px -1px rgba(1, 74, 173, 0.04);
            --shadow-lg: 0 10px 15px -3px rgba(1, 74, 173, 0.1), 0 4px 6px -2px rgba(1, 74, 173, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(1, 74, 173, 0.1), 0 10px 10px -5px rgba(1, 74, 173, 0.04);
            --category-primary: #014AAD;
            --category-savings: #10B981;
            --category-investment: #8B5CF6;
            --category-entertainment: #F59E0B;
            --category-other: #6B7280;
            --sidebar-width: 280px;
            --top-nav-height: 112px;
            --content-max: 1400px;
            --spacing-xl: clamp(32px, 4vw, 56px);
            --spacing-lg: clamp(24px, 3vw, 40px);
            --spacing-md: clamp(16px, 2vw, 28px);
            --spacing-sm: clamp(10px, 1.5vw, 16px);
            --radius-card: 18px;
            --radius-md: 14px;
            --radius-sm: 10px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Montserrat', sans-serif;
            background: var(--bg-page);
            color: var(--text-primary);
            margin: 0;
            padding: 0;
            line-height: 1.6;
            font-size: clamp(14px, 0.4vw + 13px, 16px);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            min-height: 100vh;
        }

        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--spacing-md) var(--spacing-xl);
            background: #ffffff;
            border-bottom: 1px solid var(--border-light);
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 900;
            min-height: var(--top-nav-height);
        }

        /* ===== LAYOUT ===== */
        .dashboard-layout {
            display: grid;
            grid-template-columns: var(--sidebar-width) minmax(0, 1fr);
            min-height: calc(100vh - var(--top-nav-height));
            background: var(--bg-page);
            width: 100%;
        }

        .sidebar {
            background: #ffffff;
            border-right: 1px solid var(--border-light);
            padding: clamp(20px, 2vw, 28px) clamp(20px, 2vw, 28px);
            padding-top: calc(var(--top-nav-height) + clamp(32px, 3vw, 48px) - 45px);
            display: flex;
            flex-direction: column;
            gap: clamp(16px, 1.5vw, 20px);
            position: sticky;
            top: 0;
            max-height: 100vh;
            min-height: 100vh;
            overflow-y: auto;
            box-shadow: var(--shadow-sm);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 0;
            margin-top: 0;
            padding-top: 0;
        }

        .brand img {
            height: 50px;
            width: auto;
        }

        .brand-text span {
            display: block;
            font-weight: 800;
            font-size: 18px;
            letter-spacing: -0.2px;
            color: var(--text-primary);
            line-height: 1.2;
        }

        .brand-text small {
            color: var(--text-tertiary);
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            line-height: 1.4;
        }


        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .nav-label {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-tertiary);
            letter-spacing: 0.6px;
            margin-bottom: 10px;
            padding: 0 4px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            color: var(--text-secondary);
            transition: all 0.2s ease;
        }

        .sidebar-link i {
            width: 20px;
            text-align: center;
            color: var(--primary);
        }

        .sidebar-link:hover,
        .sidebar-link.is-active {
            background: var(--bg-hover);
            color: var(--primary);
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: clamp(16px, 2vw, 24px);
            border-top: 1px solid var(--border-light);
        }

        .sidebar .btn-logout {
            width: 100%;
            justify-content: center;
            padding: 12px 20px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 10px;
        }

        .sidebar-utility {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            color: var(--text-secondary);
            border: 1px solid var(--border);
            transition: all 0.2s ease;
        }

        .sidebar-utility:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .main-content {
            padding: clamp(32px, 3vw, 48px) clamp(32px, 4vw, 64px) clamp(40px, 5vh, 80px);
            background: linear-gradient(180deg, var(--bg-page) 0%, #F2F6FC 50%, #F8FAFC 100%);
            min-height: calc(100vh - var(--top-nav-height));
            overflow-y: auto;
        }

        .section-wrapper {
            max-width: var(--content-max);
            margin: 0 auto;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: clamp(20px, 2vw + 8px, 32px);
        }

        .section-view {
            display: flex;
            flex-direction: column;
            gap: clamp(20px, 2vw + 10px, 32px);
            animation: fadeIn 0.25s ease;
        }

        body.tabs-enabled .section-view {
            display: none;
        }

        body.tabs-enabled .section-view.is-active {
            display: flex;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .btn-logout {
            background-color: var(--primary);
            color: #ffffff;
            padding: 10px 24px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 14px;
            box-shadow: var(--shadow-md);
            letter-spacing: 0.3px;
        }

        .btn-logout:hover {
            background-color: var(--primary-dark);
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }

        .btn-logout:active {
            transform: translateY(0);
        }

        .btn-logout i {
            margin-right: 6px;
        }

        /* ===== CONTAINER ===== */
        .container {
            max-width: var(--content-max);
            margin: 0 auto;
            padding: 0;
            width: 100%;
        }

        .mobile-nav {
            display: none;
            position: fixed;
            bottom: max(16px, env(safe-area-inset-bottom) + 12px);
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.97);
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-lg);
            border-radius: 24px;
            padding: 10px;
            z-index: 1200;
            width: min(520px, calc(100% - 32px));
            backdrop-filter: blur(8px);
            pointer-events: auto;
        }

        .mobile-nav-list {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .mobile-nav a,
        .mobile-nav button {
            flex: 1;
        }

        .mobile-nav a,
        .mobile-nav button {
            text-decoration: none;
            color: var(--text-secondary);
            font-size: 11px;
            font-weight: 600;
            border-radius: 16px;
            padding: 8px 6px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            transition: all 0.2s ease;
            letter-spacing: 0.2px;
            background: transparent;
            border: none;
            cursor: pointer;
            pointer-events: auto;
            z-index: 1;
            position: relative;
        }

        .mobile-nav a i,
        .mobile-nav button i {
            font-size: 18px;
            color: var(--primary);
        }

        .mobile-nav a.is-active,
        .mobile-nav a:hover,
        .mobile-nav button:hover {
            background: var(--bg-hover);
            color: var(--primary);
        }

        /* ===== SECTION CARDS ===== */
        .section-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-card);
            padding: clamp(18px, 2vw + 10px, 36px);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            width: 100%;
        }

        .hero-card {
            display: flex;
            flex-direction: column;
            gap: 20px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #fff;
            padding: clamp(20px, 3vw, 32px);
            border-radius: var(--radius-card);
            box-shadow: var(--shadow-lg);
        }

        .hero-text h2 {
            margin: 0;
            font-size: clamp(24px, 2vw + 14px, 30px);
            font-weight: 800;
            letter-spacing: -0.3px;
        }

        .remaining-budget-hero {
            margin-top: 8px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .remaining-budget-label {
            margin: 0 0 4px 0;
        }

        .remaining-budget-value {
            margin: 0 0 6px 0;
        }

        .remaining-budget-subtext {
            margin: 6px 0 0 0;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: clamp(16px, 2vw, 28px);
        }

        .summary-card {
            background: var(--bg-card);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-card);
            padding: clamp(20px, 3vw, 28px);
            box-shadow: var(--shadow-sm);
        }

        .summary-label {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-tertiary);
            margin: 0 0 6px;
            font-weight: 600;
        }

        .summary-value {
            margin: 0;
            font-size: clamp(26px, 2vw + 18px, 36px);
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -1px;
            display: flex;
            align-items: baseline;
            gap: 6px;
        }

        .summary-subtext {
            margin: 6px 0 0;
            font-size: 13px;
            color: var(--text-secondary);
        }

        .extra-budget-wrapper {
            flex-wrap: wrap;
        }

        /* ===== BUDGET HISTORY ===== */
        .budget-history-section {
            border-top: 2px solid var(--border-light);
            padding-top: clamp(20px, 2vw + 8px, 32px);
        }

        .budget-history-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .budget-history-item {
            background: var(--bg-subtle);
            border: 1px solid var(--border-light);
            border-radius: 12px;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.2s ease;
        }

        .budget-history-item:hover {
            background: var(--bg-hover);
            border-color: var(--primary-light);
        }

        .budget-history-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .budget-history-date {
            font-size: 13px;
            color: var(--text-tertiary);
            font-weight: 500;
        }

        .budget-history-amount {
            font-size: 16px;
            font-weight: 700;
            color: var(--primary);
        }

        .budget-history-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--primary-lighter);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .income-input.disabled-input {
            color: var(--text-secondary);
            cursor: not-allowed;
        }

        .section-card:hover {
            box-shadow: var(--shadow-md);
            border-color: var(--border);
        }

        .section-header {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: clamp(18px, 2vw + 8px, 32px);
            flex-wrap: wrap;
        }

        .icon-title {
            width: clamp(44px, 4vw, 56px);
            height: clamp(44px, 4vw, 56px);
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: clamp(18px, 3vw, 24px);
            flex-shrink: 0;
            box-shadow: var(--shadow-md);
        }

        .section-title {
            font-size: clamp(20px, 1.2vw + 18px, 26px);
            font-weight: 800;
            color: var(--text-primary);
            margin: 0 0 10px 0;
            letter-spacing: -0.5px;
        }

        .help-text {
            font-size: clamp(13px, 0.4vw + 12px, 14px);
            color: var(--text-tertiary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
            line-height: 1.5;
        }

        .help-text i {
            color: var(--primary);
            font-size: 16px;
        }

        /* ===== INCOME INPUT ===== */
        .income-input-wrapper {
            display: flex;
            align-items: center;
            gap: 20px;
            background: var(--bg-subtle);
            padding: clamp(20px, 2vw + 8px, 28px);
            border-radius: 16px;
            border: 2px solid var(--border);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            flex-wrap: wrap;
        }

        .income-input-wrapper:focus-within {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(1, 74, 173, 0.08);
            background: var(--bg-card);
        }

        .currency-label {
            font-size: 26px;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: -0.5px;
        }

        .income-input {
            flex: 1;
            font-size: clamp(28px, 3vw + 14px, 40px);
            font-weight: 800;
            border: none;
            background: transparent;
            color: var(--primary);
            outline: none;
            width: 100%;
            letter-spacing: -1px;
        }

        .income-input::placeholder {
            color: var(--text-hint);
            font-weight: 400;
            opacity: 0.6;
            font-size: clamp(18px, 2vw, 24px);
        }

        /* ===== BUTTONS ===== */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #fff;
            padding: 14px 32px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            box-shadow: var(--shadow-md);
            letter-spacing: 0.3px;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary i {
            color: white;
            font-size: 16px;
        }

        .btn-secondary {
            background-color: var(--bg-subtle);
            color: var(--text-secondary);
            padding: 14px 32px;
            border-radius: 10px;
            border: 1px solid var(--border);
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            letter-spacing: 0.3px;
        }

        .btn-secondary:hover {
            background-color: var(--bg-hover);
            border-color: var(--primary-light);
            color: var(--primary);
        }

        /* ===== OVERVIEW GRID ===== */
        .overview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: clamp(16px, 2vw, 24px);
            margin-top: clamp(16px, 2vw, 28px);
        }

        .overview-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 26px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
        }

        .overview-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-light) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .overview-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-light);
            background: var(--bg-hover);
        }

        .overview-card:hover::before {
            opacity: 1;
        }

        .overview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .overview-category {
            font-size: 14px;
            font-weight: 700;
            color: var(--text-secondary);
            letter-spacing: 0.2px;
        }

        .overview-percentage {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
            font-size: 13px;
            box-shadow: var(--shadow-sm);
        }

        .overview-amount {
            font-size: clamp(22px, 1.5vw + 16px, 30px);
            font-weight: 800;
            color: var(--primary);
            margin: 14px 0 10px 0;
            letter-spacing: -0.5px;
        }

        .overview-label {
            font-size: 12px;
            color: var(--text-tertiary);
            font-weight: 500;
        }

        /* ===== EXPENSE TABLE ===== */
        .expense-actions {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .table-responsive {
            width: 100%;
            border-radius: 16px;
            background: var(--bg-card);
            border: 1px solid var(--border-light);
            padding: 4px;
        }

        .table-responsive::-webkit-scrollbar {
            height: 6px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 999px;
        }

        .expense-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0;
        }

        .expense-table th {
            background: var(--bg-subtle);
            padding: 16px 18px;
            text-align: left;
            font-weight: 700;
            font-size: 12px;
            color: var(--text-secondary);
            border-bottom: 2px solid var(--border);
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .expense-table td {
            padding: 18px;
            border-bottom: 1px solid var(--border-light);
            color: var(--text-primary);
            font-size: 14px;
            vertical-align: middle;
        }

        .expense-table tr:hover {
            background: var(--bg-hover);
        }

        .expense-table tr.empty-row td {
            text-align: center;
            padding: 56px;
            color: var(--text-tertiary);
            font-size: 15px;
        }

        .badge-category {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: white;
            box-shadow: var(--shadow-sm);
            letter-spacing: 0.3px;
            white-space: nowrap;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .badge-category[data-category="Kebutuhan Pokok"] {
            background: var(--category-primary);
        }

        .badge-category[data-category="Tabungan"] {
            background: var(--category-savings);
        }

        .badge-category[data-category="Investasi"] {
            background: var(--category-investment);
        }

        .badge-category[data-category="Hiburan"] {
            background: var(--category-entertainment);
        }

        .badge-category[data-category="Lainnya"] {
            background: var(--category-other);
        }

        .btn-danger {
            background: #DC3545;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-danger:hover {
            background: #C82333;
            transform: scale(1.05);
        }

        /* ===== CHART SECTION ===== */

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: clamp(20px, 2vw + 8px, 32px);
            flex-wrap: wrap;
            gap: 16px;
        }

        .chart-title {
            font-size: clamp(20px, 1.2vw + 18px, 26px);
            font-weight: 800;
            color: var(--text-primary);
            margin: 0;
            letter-spacing: -0.5px;
        }

        .chart-filter-group {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .chart-filter-select {
            padding: 12px 24px;
            border: 2px solid var(--border);
            border-radius: 10px;
            background: var(--bg-card);
            color: var(--text-primary);
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            letter-spacing: 0.3px;
            min-width: 150px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23014AAD' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 45px;
        }

        .chart-filter-select:hover {
            border-color: var(--primary-light);
            background-color: var(--bg-hover);
        }

        .chart-filter-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(1, 74, 173, 0.08);
            background-color: var(--bg-hover);
        }

        .chart-container-wrapper {
            background: var(--bg-subtle);
            border: 2px solid var(--border);
            border-radius: 16px;
            padding-top: clamp(24px, 2.5vw, 32px);
            padding-bottom: clamp(24px, 2.5vw, 32px);
            padding-left: clamp(20px, 2.5vw, 32px);
            padding-right: clamp(20px, 2.5vw, 32px);
            position: relative;
            box-shadow: var(--shadow-sm);
            display: flex;
            flex-direction: column;
            min-height: 500px;
        }

        .chart-container {
            position: relative;
            height: 100%;
            width: 100%;
            flex: 1;
            min-height: 400px;
        }

        @media (max-width: 768px) {
            .chart-container-wrapper {
                border-width: 2px;
                padding-top: clamp(20px, 2.5vw, 28px);
                padding-bottom: clamp(20px, 2.5vw, 28px);
                padding-left: clamp(16px, 2vw, 24px);
                padding-right: clamp(16px, 2vw, 24px);
                overflow-x: hidden;
                min-height: 550px;
            }

            .chart-container {
                height: 100%;
                min-height: 450px;
                max-height: none;
                flex: 1;
            }

            .chart-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
                margin-bottom: 20px;
            }

            .chart-title {
                font-size: 18px;
                width: 100%;
            }

            .chart-filter-group {
                width: 100%;
                display: flex;
                justify-content: flex-end;
            }

            .chart-filter-select {
                width: 100%;
                max-width: 200px;
                font-size: 14px;
                padding: 12px 40px 12px 16px;
                border-width: 2.5px;
            }
        }

        @media (max-width: 480px) {
            .chart-container-wrapper {
                border-width: 2px;
                padding-top: clamp(18px, 2vw, 24px);
                padding-bottom: clamp(18px, 2vw, 24px);
                padding-left: clamp(14px, 2vw, 20px);
                padding-right: clamp(14px, 2vw, 20px);
                min-height: 400px;
            }

            .chart-container {
                height: 100%;
                min-height: 350px;
                max-height: none;
                flex: 1;
            }

            .chart-header {
                margin-bottom: 16px;
            }

            .chart-title {
                font-size: 16px;
            }

            .chart-filter-group {
                width: 100%;
            }

            .chart-filter-select {
                width: 100%;
                font-size: 13px;
                padding: 11px 20px 11px 20px;
                border-width: 3px;
            }
        }

        /* ===== BUDGET CARDS ===== */
        .budget-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: clamp(16px, 2vw, 28px);
            margin-bottom: clamp(20px, 2vw + 10px, 32px);
        }

        .budget-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 26px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-sm);
            position: relative;
        }

        .budget-card:focus-within {
            border-color: var(--primary);
            box-shadow: var(--shadow-md);
            background: var(--bg-hover);
        }

        .budget-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
            gap: 12px;
            flex-wrap: wrap;
        }

        .budget-category {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: 0.2px;
        }

        .budget-percentage-badge {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
            font-size: 15px;
            box-shadow: var(--shadow-md);
        }

        .progress-bar-wrapper {
            margin: 20px 0;
        }

        .progress-bar-bg {
            width: 100%;
            height: 12px;
            background: var(--bg-subtle);
            border-radius: 6px;
            overflow: hidden;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.06);
        }

        .progress-bar-fill {
            height: 100%;
            border-radius: 6px;
            transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .budget-input-group {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .budget-input-field {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .budget-input-label {
            font-size: 14px;
            color: var(--text-secondary);
            font-weight: 600;
            min-width: 100px;
        }

        .budget-input {
            width: 100px;
            padding: 12px 14px;
            border: 2px solid var(--border);
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            text-align: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            color: var(--text-primary);
            background: var(--bg-card);
        }

        .budget-input-suffix {
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 16px;
        }

        .budget-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(1, 74, 173, 0.08);
            background: var(--bg-hover);
        }

        /* ===== TOTAL SUMMARY ===== */
        .total-summary {
            background: linear-gradient(135deg, var(--bg-card) 0%, var(--bg-subtle) 100%);
            border: 2px solid var(--border);
            border-radius: 16px;
            padding: 32px;
            margin-bottom: 32px;
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
        }

        .total-summary::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-light) 100%);
        }

        .total-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .total-info h3 {
            font-size: 24px;
            font-weight: 800;
            color: var(--text-primary);
            margin: 0 0 8px 0;
            letter-spacing: -0.5px;
        }

        .total-info p {
            font-size: 14px;
            color: var(--text-tertiary);
            margin: 0;
            font-weight: 500;
        }

        .total-value {
            text-align: right;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .total-percentage {
            font-size: clamp(32px, 2.4vw + 16px, 48px);
            font-weight: 900;
            color: var(--primary);
            line-height: 1;
            letter-spacing: -2px;
            display: flex;
            align-items: baseline;
            gap: 6px;
        }

        .total-label {
            font-size: 14px;
            color: var(--text-tertiary);
            margin-top: 6px;
            font-weight: 500;
        }

        .total-progress {
            width: 100%;
            height: 16px;
            background: var(--bg-subtle);
            border-radius: 8px;
            overflow: hidden;
            margin: 24px 0;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.06);
        }

        .total-progress-fill {
            height: 100%;
            border-radius: 8px;
            transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-light) 100%);
            box-shadow: 0 2px 4px rgba(1, 74, 173, 0.2);
        }

        .status-message {
            padding: 14px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: var(--shadow-sm);
        }

        .status-success {
            background: linear-gradient(135deg, #D1FAE5 0%, #A7F3D0 100%);
            color: #065F46;
            border: 1px solid #6EE7B7;
        }

        .status-warning {
            background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
            color: #92400E;
            border: 1px solid #FCD34D;
        }

        .status-error {
            background: linear-gradient(135deg, #FEE2E2 0%, #FECACA 100%);
            color: #991B1B;
            border: 1px solid #FCA5A5;
        }

        .action-buttons {
            display: flex;
            gap: 16px;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        /* ===== MODAL ===== */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            padding: 20px;
            backdrop-filter: blur(4px);
        }

        .modal-content {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 40px;
            max-width: 540px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: var(--shadow-xl);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .modal-title {
            font-size: 26px;
            font-weight: 800;
            color: var(--text-primary);
            margin: 0;
        }

        .btn-close {
            background: none;
            border: none;
            font-size: 28px;
            color: var(--text-hint);
            cursor: pointer;
            padding: 0;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .btn-close:hover {
            background: var(--bg-hover);
            color: var(--primary);
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 10px;
        }

        .form-input, .form-select {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid var(--border);
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-primary);
            background: var(--bg-card);
        }

        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(1, 74, 173, 0.08);
            background: var(--bg-hover);
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .hidden {
            display: none !important;
        }

        /* ===== TOAST ===== */
        .success-toast {
            position: fixed;
            top: 100px;
            right: 24px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 18px 32px;
            border-radius: 12px;
            box-shadow: var(--shadow-xl);
            z-index: 3000;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1200px) {
            .dashboard-layout {
                grid-template-columns: 260px 1fr;
            }

            .main-content {
                padding: clamp(28px, 2.5vw, 40px) clamp(24px, 3vw, 48px) clamp(32px, 4vh, 60px);
            }
        }

        @media (max-width: 1024px) {
            .dashboard-layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .main-content {
                padding: 16px 16px calc(70px + env(safe-area-inset-bottom));
                min-height: auto;
            }

            .mobile-nav {
                display: block;
            }

            .section-view {
                min-height: auto;
            }
        }

        @media (max-width: 768px) {
            .top-navbar {
                padding: 16px 20px;
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            body {
                font-size: 13.5px;
                padding-bottom: calc(120px + env(safe-area-inset-bottom));
            }

            .welcome-heading {
                font-size: 24px;
            }

            .container {
                padding: 20px 16px;
            }

            .section-card {
                padding: 24px;
            }

            .income-input {
                font-size: 28px;
            }

            .budget-grid,
            .overview-grid {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 20px;
            }

            .income-input-wrapper {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .income-input {
                font-size: 24px;
            }

            .help-text {
                font-size: 13px;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
                justify-content: center;
            }

            .mobile-nav {
                display: block;
            }
        }

        @media (max-width: 640px) {
            .section-card {
                padding: 20px;
            }

            .budget-input-group {
                flex-direction: column;
                align-items: flex-start;
            }
            .budget-card-header {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }

            .budget-input {
                width: 100%;
                text-align: left;
            }

            .expense-actions {
                flex-direction: column;
            }

            .overview-card,
            .budget-card {
                padding: 20px;
            }

            .table-responsive {
                border: none;
                background: transparent;
                padding: 0;
            }

            .expense-table thead {
                display: none;
            }

            .expense-table tr:not(.empty-row) {
                display: block;
                background: var(--bg-card);
                border: 1px solid var(--border-light);
                border-radius: 14px;
                margin-bottom: 14px;
                padding: 14px 16px;
            }

            .expense-table tr:not(.empty-row) td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 0;
                border-bottom: none;
                font-size: 13px;
            }

            .expense-table tr:not(.empty-row) td::before {
                content: attr(data-label);
                font-weight: 600;
                color: var(--text-secondary);
                margin-right: 12px;
                flex: 0 0 40%;
                text-align: left;
            }

            .expense-table tr:not(.empty-row) td:not(:first-child):not(:last-child) {
                flex: 1;
                text-align: right;
            }

            .expense-table tr:not(.empty-row) td:first-child {
                font-weight: 600;
                color: var(--text-primary);
                border-bottom: 1px solid var(--border-light);
                padding-bottom: 12px;
                margin-bottom: 8px;
                justify-content: space-between;
                flex: 1;
                text-align: right;
            }

            .expense-table tr:not(.empty-row) td:first-child::before {
                content: attr(data-label);
                font-weight: 600;
                color: var(--text-secondary);
                margin-right: 12px;
                flex: 0 0 40%;
                text-align: left;
            }

            .expense-table tr:not(.empty-row) td:last-child {
                justify-content: center;
                padding-top: 12px;
                margin-top: 8px;
                border-top: 1px solid var(--border-light);
            }

            .expense-table tr:not(.empty-row) td:last-child::before {
                display: none;
            }

            .expense-table tr:not(.empty-row) td:last-child button {
                width: 100%;
                justify-content: center;
            }

            .expense-table tr.empty-row td {
                padding: 20px;
                font-size: 13px;
            }

            .badge-category {
                padding: 4px 10px;
                font-size: 11px;
                border-radius: 12px;
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            body {
                font-size: 13px;
            }

            .welcome-heading {
                font-size: 22px;
            }

            .welcome-subtext {
                font-size: 12px;
            }

            .help-text {
                font-size: 12px;
            }

            .section-title {
                font-size: 19px;
            }

            .overview-percentage,
            .budget-percentage-badge {
                transform: scale(0.9);
            }

            .badge-category {
                padding: 3px 8px;
                font-size: 10px;
                border-radius: 10px;
                max-width: 100%;
            }

            .currency-label {
                font-size: 22px;
            }

            .income-input {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-layout">
        <aside class="sidebar">
            <div class="brand">
                <img src="{{ asset('img/keloang.png') }}" alt="Keloang">
                <div class="brand-text">
                    <span>Keloang</span>
                    <small>Smart Budgeting</small>
                </div>
            </div>
            <div>
                <p class="nav-label">Fitur</p>
                <nav class="sidebar-nav">
                    <a href="#incomeSection" class="sidebar-link is-active" data-section-target="incomeSection"><i class="fas fa-wallet"></i>Penghasilan</a>
                    <a href="#overviewSection" class="sidebar-link" data-section-target="overviewSection"><i class="fas fa-chart-pie"></i>Ringkasan</a>
                    <a href="#expensesSection" class="sidebar-link" data-section-target="expensesSection"><i class="fas fa-receipt"></i>Pengeluaran</a>
                    <a href="#allocationSection" class="sidebar-link" data-section-target="allocationSection"><i class="fas fa-sliders-h"></i>Alokasi</a>
                </nav>
            </div>
            <div class="sidebar-footer">
                <button type="button" onclick="toggleLogoutModal(true)" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </button>
            </div>
        </aside>
        <main class="main-content" role="main">
            <div class="container section-wrapper">
                <section class="section-view is-active" id="incomeSection">
        <div class="hero-card">
            <div class="hero-text">
                <p class="eyebrow-title" style="color:rgba(255,255,255,0.8); margin-bottom:4px;">Selamat datang kembali</p>
                <h2>Halo, {{ Auth::user()->name }}</h2>
            </div>
            <div class="remaining-budget-hero">
                <p class="remaining-budget-label" style="color:rgba(255,255,255,0.8); margin-bottom:4px; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; font-weight: 600;">Sisa budget bulan ini</p>
                <h3 class="remaining-budget-value" id="remainingBudgetDisplay" style="color: #fff; font-size: clamp(26px, 2vw + 18px, 36px); font-weight: 800; margin: 0 0 6px 0; letter-spacing: -1px;">Rp 0</h3>
                <p class="remaining-budget-subtext" style="color:rgba(255,255,255,0.7); margin: 6px 0 0; font-size: 13px;">
                    Total pengeluaran: <strong id="totalExpenseDisplay" style="color: #fff; font-weight: 600;">Rp 0</strong>
                </p>
            </div>
        </div>
        <div class="section-card">
            <div class="section-header">
                {{-- <div class="icon-title"><i class="fas fa-wallet"></i></div> --}}
                <div>
                    <h2 class="section-title">Penghasilan Bulan Ini</h2>
                    <p class="help-text">
                        <i class="fas fa-info-circle"></i>
                        Masukkan total penghasilan bulanan Anda untuk menghitung alokasi budget
                    </p>
                </div>
            </div>
            <div class="income-input-wrapper">
                <span class="currency-label">Rp</span>
                <input 
                    type="number" 
                    id="monthlyIncome" 
                    placeholder="Masukkan penghasilan"
                    class="income-input"
                    value="{{ (!empty($budgetState['monthly_income']) && $budgetState['monthly_income'] > 0) ? $budgetState['monthly_income'] : '' }}"
                    min="0"
                    max="1000000000"
                    inputmode="decimal"
                >
                <button id="saveIncomeBtn" onclick="saveIncome()" class="btn-primary">
                    <i class="fas fa-save"></i> <span class="btn-text">Simpan</span>
                    <i class="fas fa-spinner fa-spin" style="display: none;"></i>
                </button>
            </div>
        </div>
        <div class="section-card">
            <div class="section-header">
                <div>
                    <h2 class="section-title">Tambah Budget Bulan Ini</h2>
                    <p class="help-text">
                        Tambahkan dana tambahan jika ada pemasukan baru di bulan ini.
                    </p>
                </div>
            </div>
            <div class="income-input-wrapper extra-budget-wrapper">
                <span class="currency-label">Rp</span>
                <input 
                    type="number"
                    id="extraBudgetInput"
                    placeholder="Masukkan dana tambahan"
                    class="income-input"
                    min="0"
                    max="1000000000"
                    inputmode="decimal"
                >
                <button onclick="addExtraBudget()" class="btn-primary">
                    <i class="fas fa-plus-circle"></i> Tambah Budget
                </button>
            </div>
            
            <!-- History Budget -->
            <div class="budget-history-section" id="budgetHistorySection" style="margin-top: clamp(20px, 2vw + 8px, 32px); display: none;">
                <div class="section-header" style="margin-bottom: clamp(16px, 2vw + 6px, 24px);">
                    <div>
                        <h3 class="section-title" style="font-size: clamp(18px, 1vw + 16px, 22px);">Riwayat Penambahan Budget</h3>
                        <p class="help-text">
                            <i class="fas fa-info-circle"></i>
                            Daftar penambahan budget yang telah dilakukan bulan ini
                        </p>
                    </div>
                </div>
                <div id="budgetHistoryList" class="budget-history-list">
                    <!-- History items will be inserted here -->
                </div>
            </div>
        </div>
                </section>

                <section class="section-view" id="overviewSection">
        <div class="section-card">
            <div class="section-header">
                <div>
                    <h2 class="section-title">Ringkasan Budget</h2>
                    <p class="help-text">
                        <i class="fas fa-info-circle"></i>
                        Alokasi uang per kategori berdasarkan persentase yang Anda atur
                    </p>
                </div>
            </div>
            <div class="overview-grid" id="overviewContainer">
                @foreach($defaultBudgets as $index => $budget)
                <div class="overview-card">
                    <div class="overview-header">
                        <span class="overview-category">{{ $budget['category'] }}</span>
                        <div class="overview-percentage" id="overview-badge-{{ $index }}" style="background: {{ $budget['color'] }}">
                            {{ $budget['percentage'] }}%
                        </div>
                    </div>
                    <div class="overview-amount" id="amount-{{ $index }}">Rp 0</div>
                    <div class="overview-label">Dari total penghasilan</div>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Chart Section - Moved from Expenses Section -->
        <div class="section-card">
            <div class="chart-header">
                <h3 class="chart-title">Grafik Pemasukan & Pengeluaran</h3>
                <div class="chart-filter-group">
                    <select id="chartFilterSelect" class="chart-filter-select" onchange="updateChartFilter(this.value)">
                        <option value="day">Hari</option>
                        <option value="week">Minggu</option>
                        <option value="month" selected>Bulan</option>
                        <option value="year">Tahun</option>
                        <option value="all">Semua</option>
                    </select>
                </div>
            </div>
            <div class="chart-container-wrapper">
                <canvas id="incomeExpenseChart"></canvas>
            </div>
        </div>
                </section>

                <section class="section-view" id="expensesSection">
        <div class="section-card">
            <div class="section-header">
                <div>
                    <h2 class="section-title">Pencatatan Pengeluaran</h2>
                    <p class="help-text">
                        <i class="fas fa-info-circle"></i>
                        Catat semua pengeluaran Anda untuk melacak penggunaan budget
                    </p>
                </div>
            </div>
            <div class="expense-actions">
                <button onclick="showAddExpenseModal()" class="btn-primary">
                    <i class="fas fa-plus"></i> Tambah Pengeluaran
                </button>
            </div>
            <div class="table-responsive">
                <table class="expense-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="expenseTableBody">
                        <tr class="empty-row">
                            <td colspan="5">Belum ada pengeluaran yang dicatat. Klik "Tambah Pengeluaran" untuk mulai mencatat.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
                </section>

                <section class="section-view" id="allocationSection">
        <div class="section-card">
            <div class="section-header">
                <div>
                    <h2 class="section-title">Atur Persentase Budget</h2>
                    <p class="help-text">
                        <i class="fas fa-info-circle"></i>
                        Sesuaikan persentase untuk setiap kategori. Total harus 100%
                    </p>
                </div>
            </div>
            
            <div class="budget-grid" id="budgetContainer">
                @foreach($defaultBudgets as $index => $budget)
                <div class="budget-card">
                    <div class="budget-card-header">
                        <span class="budget-category">{{ $budget['category'] }}</span>
                        <div class="budget-percentage-badge" id="percentage-badge-{{ $index }}" style="background: {{ $budget['color'] }}">
                            <span id="percentage-display-{{ $index }}">{{ $budget['percentage'] }}</span>%
                        </div>
                    </div>
                    <div class="progress-bar-wrapper">
                        <div class="progress-bar-bg">
                            <div class="progress-bar-fill" 
                                 id="progress-{{ $index }}"
                                 style="width: {{ $budget['percentage'] }}%; background: {{ $budget['color'] }}"></div>
                        </div>
                    </div>
                    <div class="budget-input-group">
                        <label class="budget-input-label">Persentase:</label>
                        <div class="budget-input-field">
                            <input 
                                type="number" 
                                min="0" 
                                max="100" 
                                value="{{ $budget['percentage'] }}"
                                class="budget-input"
                                data-category="{{ $budget['category'] }}"
                                data-index="{{ $index }}"
                            >
                            <span class="budget-input-suffix">%</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Total Summary -->
            <div class="total-summary">
                <div class="total-header">
                    <div class="total-info">
                        <h3>Total Persentase</h3>
                        <p>Pastikan total sama dengan 100% untuk menyimpan</p>
                    </div>
                    <div class="total-value">
                        <div class="total-percentage" id="totalPercentage">
                            <span id="totalPercentageValue">100</span>
                            <span class="total-label">%</span>
                        </div>
                    </div>
                </div>
                <div class="total-progress">
                    <div class="total-progress-fill" id="totalProgressBar" style="width: 100%"></div>
                </div>
                <div id="totalStatus" class="status-message status-success">
                    <i class="fas fa-check-circle"></i>
                    <span>Budget sudah seimbang</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button onclick="resetBudget()" class="btn-secondary">
                    <i class="fas fa-undo"></i> Reset ke Default
                </button>
                <button onclick="saveBudget()" class="btn-primary">
                    <i class="fas fa-save"></i> Simpan Budget
                </button>
            </div>
        </div>
                </section>
            </div>
        </main>
    </div>

    <nav class="mobile-nav">
        <div class="mobile-nav-list">
            <a href="#incomeSection" class="is-active" data-section-target="incomeSection" aria-label="Navigasi ke penghasilan" aria-current="page">
                <i class="fas fa-wallet"></i>
                <span>Income</span>
            </a>
            <a href="#overviewSection" data-section-target="overviewSection" aria-label="Navigasi ke ringkasan">
                <i class="fas fa-chart-pie"></i>
                <span>Ringkas</span>
            </a>
            <a href="#expensesSection" data-section-target="expensesSection" aria-label="Navigasi ke pengeluaran">
                <i class="fas fa-receipt"></i>
                <span>Expense</span>
            </a>
            <a href="#allocationSection" data-section-target="allocationSection" aria-label="Navigasi ke alokasi">
                <i class="fas fa-sliders-h"></i>
                <span>Alokasi</span>
            </a>
            <button type="button" class="mobile-nav-logout" aria-label="Keluar" onclick="toggleLogoutModal(true)">
                <i class="fas fa-power-off"></i>
                <span>Keluar</span>
            </button>
        </div>
    </nav>

    <!-- Modal Tambah Pengeluaran -->
    <div id="expenseModal" class="hidden modal-overlay" onclick="if(event.target === this) closeExpenseModal()">
        <div class="modal-content" onclick="event.stopPropagation()">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Pengeluaran</h3>
                <button onclick="closeExpenseModal()" class="btn-close">&times;</button>
            </div>
            <form id="expenseForm" onsubmit="addExpense(event)">
                <div class="form-group">
                    <label class="form-label">Tanggal</label>
                    <input 
                        type="date" 
                        id="expenseDate" 
                        required 
                        class="form-input"
                        max="{{ now()->endOfMonth()->format('Y-m-d') }}"
                    >
                </div>
                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <select id="expenseCategory" required class="form-select">
                        @foreach($defaultBudgets as $budget)
                        <option value="{{ $budget['category'] }}">{{ $budget['category'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Keterangan</label>
                    <input type="text" id="expenseDescription" required class="form-input" placeholder="Contoh: Beli makan siang, Transportasi, dll">
                </div>
                <div class="form-group">
                    <label class="form-label">Jumlah (Rp)</label>
                    <input type="number" id="expenseAmount" required min="0" step="100" class="form-input" placeholder="0">
                </div>
                <div class="form-actions">
                    <button type="button" onclick="closeExpenseModal()" class="btn-secondary" style="flex: 1;">Batal</button>
                    <button type="submit" class="btn-primary" style="flex: 1;">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div id="logoutModal" class="hidden modal-overlay" onclick="if(event.target === this) toggleLogoutModal(false)">
        <div class="modal-content" style="max-width:360px" onclick="event.stopPropagation()">
            <div class="modal-header">
                <h3 class="modal-title">Keluar dari akun?</h3>
                <button onclick="toggleLogoutModal(false)" class="btn-close">&times;</button>
            </div>
            <p style="color:var(--text-secondary); line-height:1.6; margin-bottom:24px;">
                Pastikan semua perubahan sudah disimpan sebelum keluar.
            </p>
            <div class="form-actions">
                <button type="button" class="btn-secondary" style="flex: 1;" onclick="toggleLogoutModal(false)">Batal</button>
                <form method="POST" action="{{ route('logout') }}" style="flex: 1;">
                    @csrf
                    <button type="submit" class="btn-primary" style="width: 100%;">
                        <i class="fas fa-power-off"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div id="confirmModal" class="hidden modal-overlay" onclick="if(event.target === this) closeConfirmModal()">
        <div class="modal-content" style="max-width:360px" onclick="event.stopPropagation()">
            <div class="modal-header">
                <h3 class="modal-title" id="confirmTitle">Konfirmasi</h3>
                <button onclick="closeConfirmModal()" class="btn-close">&times;</button>
            </div>
            <p id="confirmMessage" style="color:var(--text-secondary); line-height:1.6; margin-bottom:24px;"></p>
            <div class="form-actions">
                <button type="button" class="btn-secondary" style="flex: 1;" onclick="closeConfirmModal()">Batal</button>
                <button type="button" class="btn-primary" style="flex: 1;" id="confirmActionBtn">Lanjutkan</button>
            </div>
        </div>
    </div>

    <script>
        // Store data
        const originalBudgets = @json($defaultBudgets);
        const savedState = @json($budgetState);
        const MAX_ALLOWED_AMOUNT = 1000000000; // Rp 1.000.000.000
        let budgets = JSON.parse(JSON.stringify(savedState?.budgets ?? originalBudgets));
        let monthlyIncome = parseFloat(savedState?.monthly_income) || 0;
        let expenses = JSON.parse(JSON.stringify(savedState?.expenses ?? []));
        let extraBudget = parseFloat(savedState?.extra_budget) || 0;
        let extraBudgetHistory = JSON.parse(JSON.stringify(savedState?.extra_budget_history ?? []));
        let isNewMonth = {{ $budgetState['is_new_month'] ?? false ? 'true' : 'false' }};
        let incomeLocked = monthlyIncome > 0 && !isNewMonth;

        // Format currency
        function formatCurrency(amount) {
            return new Intl.NumberFormat('id-ID').format(amount);
        }

        function formatDateForInput(date) {
            const tzOffset = date.getTimezoneOffset() * 60000;
            return new Date(date.getTime() - tzOffset).toISOString().split('T')[0];
        }

        const today = new Date();
        const monthEndBoundary = new Date(today.getFullYear(), today.getMonth() + 1, 0, 23, 59, 59, 999);
        const expenseDateInput = document.getElementById('expenseDate');
        if (expenseDateInput) {
            expenseDateInput.setAttribute('max', formatDateForInput(monthEndBoundary));
        }

        function isDateBeyondCurrentMonth(dateString) {
            if (!dateString) return false;
            const selectedDate = new Date(dateString + 'T00:00:00');
            if (isNaN(selectedDate.getTime())) return true;
            return selectedDate > monthEndBoundary;
        }

        function getTotalExpenses() {
            return expenses.reduce((sum, expense) => sum + expense.amount, 0);
        }

        function updateRemainingBudget() {
            const totalExpenses = getTotalExpenses();
            const remaining = Math.max((monthlyIncome + extraBudget) - totalExpenses, 0);
            const remainingDisplay = document.getElementById('remainingBudgetDisplay');
            const totalExpenseDisplay = document.getElementById('totalExpenseDisplay');
            if (remainingDisplay) {
                remainingDisplay.textContent = `Rp ${formatCurrency(remaining)}`;
            }
            if (totalExpenseDisplay) {
                totalExpenseDisplay.textContent = `Rp ${formatCurrency(totalExpenses)}`;
            }
        }

        function getCategoryAllocation(category) {
            const budget = budgets.find(b => b.category === category);
            if (!budget) return 0;
            return Math.round(monthlyIncome * (budget.percentage / 100));
        }

        function getCategorySpent(category) {
            return expenses
                .filter(expense => expense.category === category)
                .reduce((sum, expense) => sum + expense.amount, 0);
        }

        const stateEndpoint = '{{ route("budget.state") }}';
        const csrfToken = '{{ csrf_token() }}';

        async function syncBudgetState() {
            try {
                const response = await fetch(stateEndpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify({
                        monthly_income: monthlyIncome || 0,
                        extra_budget: extraBudget || 0,
                        remaining_budget: Math.max((monthlyIncome || 0) - getTotalExpenses(), 0),
                        budgets: budgets || [],
                        expenses: expenses || [],
                        extra_budget_history: extraBudgetHistory || []
                    })
                });
                
                const data = await response.json();
                
                if (!response.ok) {
                    const errorMessage = data.message || data.errors || 'Failed to save budget state';
                    console.error('Save error:', errorMessage);
                    throw new Error(typeof errorMessage === 'string' ? errorMessage : JSON.stringify(errorMessage));
                }
                
                if (!data.success) {
                    throw new Error(data.message || 'Failed to save budget state');
                }
                
                return data;
            } catch (error) {
                console.error('Failed to sync budget state:', error);
                throw error;
            }
        }

        // Update total percentage
        function updateTotal() {
            const total = budgets.reduce((sum, budget) => sum + parseInt(budget.percentage), 0);
            const totalValueEl = document.getElementById('totalPercentageValue');
            if (totalValueEl) totalValueEl.textContent = total;
            document.getElementById('totalProgressBar').style.width = Math.min(total, 100) + '%';
            
            const statusEl = document.getElementById('totalStatus');
            if (total === 100) {
                statusEl.className = 'status-message status-success';
                statusEl.innerHTML = '<i class="fas fa-check-circle"></i><span>Budget sudah seimbang</span>';
            } else if (total < 100) {
                statusEl.className = 'status-message status-warning';
                statusEl.innerHTML = `<i class="fas fa-exclamation-triangle"></i><span>Kurang ${100 - total}% untuk mencapai 100%</span>`;
            } else {
                statusEl.className = 'status-message status-error';
                statusEl.innerHTML = `<i class="fas fa-times-circle"></i><span>Melebihi ${total - 100}% dari 100%</span>`;
            }
            updateOverview();
        }

        // Update overview amounts
        function updateOverview() {
            budgets.forEach((budget, index) => {
                const amount = Math.round(monthlyIncome * budget.percentage / 100);
                document.getElementById(`amount-${index}`).textContent = `Rp ${formatCurrency(amount)}`;
                document.getElementById(`overview-badge-${index}`).textContent = budget.percentage + '%';
            });
        }

        // Update budget display
        function updateBudgetDisplay(index) {
            const budget = budgets[index];
            const progressBar = document.getElementById(`progress-${index}`);
            const percentageDisplay = document.getElementById(`percentage-display-${index}`);
            const badge = document.getElementById(`percentage-badge-${index}`);
            
            if (progressBar) progressBar.style.width = budget.percentage + '%';
            if (percentageDisplay) percentageDisplay.textContent = budget.percentage;
            if (badge) badge.innerHTML = `<span>${budget.percentage}</span>%`;
            
            updateOverview();
        }

        // Budget input listeners
        document.querySelectorAll('.budget-input').forEach(input => {
            input.addEventListener('input', function() {
                const index = parseInt(this.dataset.index);
                let value = parseInt(this.value) || 0;
                
                if (value < 0) value = 0;
                if (value > 100) value = 100;
                
                budgets[index].percentage = value;
                this.value = value;
                
                updateBudgetDisplay(index);
                updateTotal();
            });
        });

        function hydrateInitialState() {
            document.querySelectorAll('.budget-input').forEach((input, index) => {
                if (budgets[index]) {
                    input.value = budgets[index].percentage;
                }
            });

            budgets.forEach((_, index) => updateBudgetDisplay(index));

            // Always update remaining budget first
            updateRemainingBudget();

            if (expenses.length > 0) {
                renderExpenses();
            }

            // Render budget history
            renderBudgetHistory();

            const incomeInput = document.getElementById('monthlyIncome');
            const saveButton = document.getElementById('saveIncomeBtn');
            if (incomeInput) {
                if (monthlyIncome > 0) {
                    incomeInput.value = monthlyIncome;
                }
                if (incomeLocked) {
                    incomeInput.disabled = true;
                    incomeInput.classList.add('disabled-input');
                    if (saveButton) {
                        saveButton.disabled = true;
                        const btnText = saveButton.querySelector('.btn-text');
                        if (btnText) btnText.textContent = 'Tersimpan';
                        saveButton.style.opacity = '0.7';
                        saveButton.style.cursor = 'not-allowed';
                    }
                }
            }
        }

        // Navigation highlight & view switching
        const sectionIds = ['incomeSection', 'overviewSection', 'expensesSection', 'allocationSection'];
        const sectionLinks = document.querySelectorAll('[data-section-target]');
        const sectionViews = Array.from(document.querySelectorAll('.section-view'));

        function setActiveLink(targetId) {
            sectionLinks.forEach(link => {
                const isActive = link.dataset.sectionTarget === targetId;
                link.classList.toggle('is-active', isActive);
                link.setAttribute('aria-current', isActive ? 'page' : 'false');
            });
        }

        function showSection(targetId) {
            if (!targetId || !sectionIds.includes(targetId)) return;
            
            sectionViews.forEach(section => {
                section.classList.remove('is-active');
                if (section.id === targetId) {
                    section.classList.add('is-active');
                }
            });
            setActiveLink(targetId);
            
            // Scroll to top of main content
            const mainContent = document.querySelector('.main-content');
            if (mainContent) {
                mainContent.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        // Make showSection globally accessible
        window.showSection = showSection;

        sectionLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                event.stopPropagation();
                const targetId = link.dataset.sectionTarget || link.getAttribute('href')?.replace('#', '');
                if (targetId) {
                    showSection(targetId);
                }
            });
        });

        // Prevent default anchor behavior for all section links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href && href.startsWith('#')) {
                    const targetId = href.replace('#', '');
                    if (sectionIds.includes(targetId)) {
                        e.preventDefault();
                        e.stopPropagation();
                        showSection(targetId);
                    }
                }
            });
        });

        // Initialize tabs
        document.body.classList.add('tabs-enabled');
        showSection(sectionIds[0]);
        hydrateInitialState();

        let pendingAction = null;

        // Make toggleLogoutModal globally accessible
        window.toggleLogoutModal = function toggleLogoutModal(show) {
            const modal = document.getElementById('logoutModal');
            if (!modal) return;
            modal.classList.toggle('hidden', !show);
        };

        function openConfirmModal(title, message, onConfirm) {
            pendingAction = onConfirm;
            const modal = document.getElementById('confirmModal');
            document.getElementById('confirmTitle').textContent = title;
            document.getElementById('confirmMessage').textContent = message;
            const btn = document.getElementById('confirmActionBtn');
            btn.onclick = () => {
                if (pendingAction) pendingAction();
                closeConfirmModal();
            };
            modal.classList.remove('hidden');
        }

        function closeConfirmModal() {
            const modal = document.getElementById('confirmModal');
            modal.classList.add('hidden');
            pendingAction = null;
        }

        // Save income - make globally accessible
        window.saveIncome = async function saveIncome() {
            const incomeInput = document.getElementById('monthlyIncome');
            const saveButton = document.getElementById('saveIncomeBtn');
            const income = parseFloat(incomeInput.value) || 0;
            
            if (income <= 0) {
                showToast('Masukkan jumlah penghasilan yang valid', 'error');
                return;
            }

            if (income > MAX_ALLOWED_AMOUNT) {
                showToast('Penghasilan maksimal Rp ' + formatCurrency(MAX_ALLOWED_AMOUNT), 'error');
                return;
            }
            
            // Disable input and button while saving
            if (incomeInput) incomeInput.disabled = true;
            if (saveButton) {
                saveButton.disabled = true;
                const btnText = saveButton.querySelector('.btn-text');
                const spinner = saveButton.querySelector('.fa-spinner');
                
                if (btnText) btnText.textContent = 'Menyimpan...';
                if (spinner) spinner.style.display = 'inline-block';
                
                try {
                    monthlyIncome = income;
                    updateOverview();
                    
                    // Update chart
                    if (window.updateExpenseChart) {
                        window.updateExpenseChart();
                    }
                    
                    // Save to server
                    await syncBudgetState();
                    
                    incomeLocked = true;
                    if (incomeInput) {
                        incomeInput.classList.add('disabled-input');
                        incomeInput.value = monthlyIncome;
                    }
                    
                    // Update button state after success
                    if (btnText) btnText.textContent = 'Tersimpan';
                    if (spinner) spinner.style.display = 'none';
                    saveButton.style.opacity = '0.7';
                    saveButton.style.cursor = 'not-allowed';
                    
                    // Update remaining budget after save
                    updateRemainingBudget();
                    
                    showToast('Penghasilan bulanan berhasil disimpan!', 'success');
                } catch (error) {
                    // Re-enable if save failed
                    if (incomeInput) incomeInput.disabled = false;
                    if (saveButton) {
                        saveButton.disabled = false;
                        if (btnText) btnText.textContent = 'Simpan';
                        if (spinner) spinner.style.display = 'none';
                        saveButton.style.opacity = '1';
                        saveButton.style.cursor = 'pointer';
                    }
                    const errorMsg = error.message || 'Gagal menyimpan penghasilan. Silakan coba lagi.';
                    console.error('Save income error:', error);
                    showToast(errorMsg, 'error');
                }
            }
        };

        // Expense management - make globally accessible
        window.showAddExpenseModal = function showAddExpenseModal() {
            document.getElementById('expenseModal').classList.remove('hidden');
            document.getElementById('expenseDate').valueAsDate = new Date();
            document.getElementById('expenseForm').reset();
            document.getElementById('expenseDate').valueAsDate = new Date();
        };

        window.closeExpenseModal = function closeExpenseModal() {
            document.getElementById('expenseModal').classList.add('hidden');
        };

        window.addExpense = function addExpense(event) {
            event.preventDefault();
            const expense = {
                id: Date.now(),
                date: document.getElementById('expenseDate').value,
                category: document.getElementById('expenseCategory').value,
                description: document.getElementById('expenseDescription').value,
                amount: parseFloat(document.getElementById('expenseAmount').value)
            };
            
            if (expense.amount <= 0) {
                showToast('Masukkan jumlah pengeluaran yang valid', 'error');
                return;
            }

            if (isDateBeyondCurrentMonth(expense.date)) {
                showToast('Tanggal pengeluaran tidak boleh melewati bulan berjalan', 'error');
                return;
            }

            if (monthlyIncome <= 0) {
                showToast('Tetapkan penghasilan terlebih dahulu', 'error');
                return;
            }

            const remainingBudget = monthlyIncome - getTotalExpenses();
            if (expense.amount > remainingBudget) {
                showToast('Sisa budget bulan ini tidak mencukupi', 'error');
                return;
            }

            const categoryAllocation = getCategoryAllocation(expense.category);
            const categorySpent = getCategorySpent(expense.category);
            const categoryRemaining = categoryAllocation - categorySpent;
            if (categoryAllocation > 0 && expense.amount > categoryRemaining) {
                openConfirmModal(
                    'Melampaui alokasi?',
                    `Jumlah ini melebihi alokasi kategori ${expense.category}. Anda yakin ingin melanjutkan?`,
                    () => finalizeExpense(expense)
                );
                return;
            }
            
            finalizeExpense(expense);
        };

        async function finalizeExpense(expense) {
            expenses.push(expense);
            expenses.sort((a, b) => new Date(b.date) - new Date(a.date));
            renderExpenses();
            closeExpenseModal();
            
            // Update chart
            if (window.updateExpenseChart) {
                window.updateExpenseChart();
            }
            
            try {
                await syncBudgetState();
                showToast('Pengeluaran berhasil ditambahkan dan disimpan!', 'success');
            } catch (error) {
                showToast('Pengeluaran ditambahkan, tetapi gagal menyimpan. Silakan refresh halaman.', 'error');
            }
        }

        window.deleteExpense = function deleteExpense(id) {
            pendingAction = { type: 'delete-expense', id };
            openConfirmModal('Hapus pengeluaran?', 'Pengeluaran akan dihapus permanen.', async () => {
                expenses = expenses.filter(e => e.id !== id);
                renderExpenses();
                updateRemainingBudget();
                
                // Update chart
                if (window.updateExpenseChart) {
                    window.updateExpenseChart();
                }
                
                try {
                    await syncBudgetState();
                    showToast('Pengeluaran berhasil dihapus dan disimpan!', 'success');
                } catch (error) {
                    showToast('Pengeluaran dihapus, tetapi gagal menyimpan. Silakan refresh halaman.', 'error');
                }
            });
        };

        function renderExpenses() {
            const tbody = document.getElementById('expenseTableBody');
            if (expenses.length === 0) {
                tbody.innerHTML = '<tr class="empty-row"><td colspan="5">Belum ada pengeluaran yang dicatat. Klik "Tambah Pengeluaran" untuk mulai mencatat.</td></tr>';
                updateRemainingBudget();
                return;
            }
            
            tbody.innerHTML = expenses.map(expense => `
                <tr>
                    <td data-label="Tanggal">${new Date(expense.date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</td>
                    <td data-label="Kategori"><span class="badge-category" data-category="${expense.category}">${expense.category}</span></td>
                    <td data-label="Keterangan">${expense.description}</td>
                    <td data-label="Jumlah" style="font-weight: 700; color: #DC3545;">Rp ${formatCurrency(expense.amount)}</td>
                    <td data-label="Aksi">
                        <button onclick="deleteExpense(${expense.id})" class="btn-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </td>
                </tr>
            `).join('');
            updateRemainingBudget();
        }

        // Reset budget - make globally accessible
        window.resetBudget = function resetBudget() {
            pendingAction = { type: 'reset-budget' };
            openConfirmModal('Reset ke default?', 'Perubahan persentase yang belum disimpan akan hilang.', async () => {
                budgets = JSON.parse(JSON.stringify(originalBudgets));
                document.querySelectorAll('.budget-input').forEach((input, index) => {
                    input.value = budgets[index].percentage;
                    updateBudgetDisplay(index);
                });
                updateTotal();
                updateRemainingBudget();
                
                try {
                    await syncBudgetState();
                    showToast('Budget berhasil direset ke default dan disimpan!', 'success');
                } catch (error) {
                    showToast('Budget direset, tetapi gagal menyimpan. Silakan refresh halaman.', 'error');
                }
            });
        };

        // Save budget - make globally accessible
        window.saveBudget = async function saveBudget() {
            const total = budgets.reduce((sum, budget) => sum + parseInt(budget.percentage), 0);
            
            if (total !== 100) {
                showToast(`Total persentase harus 100%. Saat ini: ${total}%`, 'error');
                return;
            }

            const saveButton = document.querySelector('button[onclick="saveBudget()"]');
            const originalHTML = saveButton?.innerHTML;
            
            if (saveButton) {
                saveButton.disabled = true;
                saveButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            }

            try {
                // Save budget percentages
                const updateResponse = await fetch('{{ route("budget.update") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify({ budgets: budgets })
                });

                if (!updateResponse.ok) {
                    throw new Error('Failed to update budget');
                }

                // Also sync the full state
                await syncBudgetState();
                
                showToast('Budget berhasil disimpan!', 'success');
            } catch (error) {
                console.error('Error:', error);
                showToast('Gagal menyimpan budget. Silakan coba lagi.', 'error');
            } finally {
                if (saveButton) {
                    saveButton.disabled = false;
                    if (originalHTML) saveButton.innerHTML = originalHTML;
                }
            }
        };

        // Make addExtraBudget globally accessible
        window.addExtraBudget = async function addExtraBudget() {
            const extraInput = document.getElementById('extraBudgetInput');
            if (!extraInput) {
                showToast('Input tidak ditemukan', 'error');
                return;
            }
            
            const value = parseFloat(extraInput.value) || 0;
            
            if (value <= 0) {
                showToast('Masukkan jumlah tambahan yang valid', 'error');
                return;
            }

            if (value > MAX_ALLOWED_AMOUNT) {
                showToast('Budget tambahan maksimal Rp ' + formatCurrency(MAX_ALLOWED_AMOUNT), 'error');
                return;
            }

            if ((extraBudget + value) > MAX_ALLOWED_AMOUNT) {
                showToast('Total budget tambahan tidak boleh melebihi Rp ' + formatCurrency(MAX_ALLOWED_AMOUNT), 'error');
                return;
            }
            
            // Find button by onclick attribute or by finding button next to input
            const addButton = document.querySelector('button[onclick*="addExtraBudget"]') || 
                             extraInput.parentElement?.querySelector('button');
            
            // Disable input and button while saving
            if (extraInput) extraInput.disabled = true;
            if (addButton) {
                addButton.disabled = true;
                const originalHTML = addButton.innerHTML;
                addButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                
                try {
                    extraBudget += value;
                    
                    // Add to history
                    const historyItem = {
                        id: Date.now(),
                        amount: value,
                        date: new Date().toISOString().split('T')[0],
                        timestamp: new Date().toISOString()
                    };
                    extraBudgetHistory.push(historyItem);
                    extraBudgetHistory.sort((a, b) => new Date(b.timestamp) - new Date(a.timestamp));
                    
                    updateOverview();
                    updateRemainingBudget();
                    renderBudgetHistory();
                    
                    // Update chart
                    if (window.updateExpenseChart) {
                        window.updateExpenseChart();
                    }
                    
                    // Save to server
                    await syncBudgetState();
                    
                    extraInput.value = '';
                    showToast('Budget tambahan berhasil ditambahkan dan disimpan!', 'success');
                } catch (error) {
                    // Revert changes if save failed
                    extraBudget -= value;
                    if (extraBudgetHistory.length > 0) {
                        extraBudgetHistory.pop();
                        renderBudgetHistory();
                    }
                    updateOverview();
                    updateRemainingBudget();
                    showToast('Gagal menyimpan budget tambahan. Silakan coba lagi.', 'error');
                } finally {
                    // Re-enable input and button
                    if (extraInput) extraInput.disabled = false;
                    if (addButton) {
                        addButton.disabled = false;
                        addButton.innerHTML = originalHTML;
                    }
                }
            } else {
                // Fallback if button not found
                try {
                    extraBudget += value;
                    
                    // Add to history
                    const historyItem = {
                        id: Date.now(),
                        amount: value,
                        date: new Date().toISOString().split('T')[0],
                        timestamp: new Date().toISOString()
                    };
                    extraBudgetHistory.push(historyItem);
                    extraBudgetHistory.sort((a, b) => new Date(b.timestamp) - new Date(a.timestamp));
                    
                    updateOverview();
                    updateRemainingBudget();
                    renderBudgetHistory();
                    
                    // Update chart
                    if (window.updateExpenseChart) {
                        window.updateExpenseChart();
                    }
                    
                    extraInput.value = '';
                    await syncBudgetState();
                    showToast('Budget tambahan berhasil ditambahkan dan disimpan!', 'success');
                } catch (error) {
                    extraBudget -= value;
                    if (extraBudgetHistory.length > 0) {
                        extraBudgetHistory.pop();
                        renderBudgetHistory();
                    }
                    updateOverview();
                    updateRemainingBudget();
                    showToast('Gagal menyimpan budget tambahan. Silakan coba lagi.', 'error');
                } finally {
                    if (extraInput) extraInput.disabled = false;
                }
            }
        };

        // Render budget history
        function renderBudgetHistory() {
            const historySection = document.getElementById('budgetHistorySection');
            const historyList = document.getElementById('budgetHistoryList');
            
            if (!historySection || !historyList) return;
            
            if (extraBudgetHistory.length === 0) {
                historySection.style.display = 'none';
                return;
            }
            
            historySection.style.display = 'block';
            
            historyList.innerHTML = extraBudgetHistory.map(item => {
                const date = new Date(item.date);
                const dateStr = date.toLocaleDateString('id-ID', { 
                    day: 'numeric', 
                    month: 'long', 
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
                
                return `
                    <div class="budget-history-item">
                        <div class="budget-history-info">
                            <div class="budget-history-date">${dateStr}</div>
                            <div class="budget-history-amount">+ Rp ${formatCurrency(item.amount)}</div>
                        </div>
                        <div class="budget-history-icon">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                    </div>
                `;
            }).join('');
        }

        // Toast notification
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = 'success-toast';
            toast.style.background = type === 'success' ? '#014AAD' : '#DC3545';
            toast.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                <span>${message}</span>
            `;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.style.animation = 'slideIn 0.3s ease reverse';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // Chart functionality
        let incomeExpenseChart = null;
        let currentChartFilter = 'month';

        function initializeChart() {
            const ctx = document.getElementById('incomeExpenseChart');
            if (!ctx) return;

            incomeExpenseChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: 'Pemasukan',
                            data: [],
                            borderColor: '#10B981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderWidth: window.innerWidth <= 768 ? 2.5 : 3,
                            fill: true,
                            tension: 0.4,
                            pointRadius: window.innerWidth <= 480 ? 4 : (window.innerWidth <= 768 ? 4.5 : 5),
                            pointHoverRadius: window.innerWidth <= 480 ? 6 : (window.innerWidth <= 768 ? 6.5 : 7),
                            pointBackgroundColor: '#10B981',
                            pointBorderColor: '#fff',
                            pointBorderWidth: window.innerWidth <= 768 ? 1.5 : 2
                        },
                        {
                            label: 'Pengeluaran',
                            data: [],
                            borderColor: '#DC3545',
                            backgroundColor: 'rgba(220, 53, 69, 0.1)',
                            borderWidth: window.innerWidth <= 768 ? 2.5 : 3,
                            fill: true,
                            tension: 0.4,
                            pointRadius: window.innerWidth <= 480 ? 4 : (window.innerWidth <= 768 ? 4.5 : 5),
                            pointHoverRadius: window.innerWidth <= 480 ? 6 : (window.innerWidth <= 768 ? 6.5 : 7),
                            pointBackgroundColor: '#DC3545',
                            pointBorderColor: '#fff',
                            pointBorderWidth: window.innerWidth <= 768 ? 1.5 : 2
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom',
                            align: 'center',
                            labels: {
                                usePointStyle: true,
                                padding: window.innerWidth <= 480 ? 8 : (window.innerWidth <= 768 ? 16 : 20),
                                font: {
                                    size: window.innerWidth <= 480 ? 10 : (window.innerWidth <= 768 ? 11 : 13),
                                    weight: '600',
                                    family: "'Plus Jakarta Sans', sans-serif"
                                },
                                color: '#0F172A',
                                boxWidth: window.innerWidth <= 480 ? 10 : (window.innerWidth <= 768 ? 11 : 13),
                                boxHeight: window.innerWidth <= 480 ? 10 : (window.innerWidth <= 768 ? 11 : 13)
                            },
                            padding: {
                                top: window.innerWidth <= 480 ? 5 : (window.innerWidth <= 768 ? 20 : 25),
                                bottom: window.innerWidth <= 480 ? 10 : (window.innerWidth <= 768 ? 15 : 20),
                                left: 0,
                                right: 0
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: window.innerWidth <= 768 ? 10 : 12,
                            titleFont: {
                                size: window.innerWidth <= 768 ? 12 : 14,
                                weight: '600',
                                family: "'Plus Jakarta Sans', sans-serif"
                            },
                            bodyFont: {
                                size: window.innerWidth <= 768 ? 11 : 13,
                                family: "'Plus Jakarta Sans', sans-serif"
                            },
                            callbacks: {
                                label: function(context) {
                                    return context.dataset.label + ': Rp ' + formatCurrency(context.parsed.y);
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    // Shorten format on mobile
                                    if (window.innerWidth <= 480) {
                                        if (value >= 1000000) {
                                            return 'Rp ' + (value / 1000000).toFixed(1) + 'Jt';
                                        } else if (value >= 1000) {
                                            return 'Rp ' + (value / 1000).toFixed(0) + 'Rb';
                                        }
                                    }
                                    return 'Rp ' + formatCurrency(value);
                                },
                                font: {
                                    size: window.innerWidth <= 768 ? 10 : 12,
                                    family: "'Plus Jakarta Sans', sans-serif"
                                },
                                color: '#475569',
                                maxTicksLimit: window.innerWidth <= 480 ? 5 : 8
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    size: window.innerWidth <= 768 ? 10 : 12,
                                    family: "'Plus Jakarta Sans', sans-serif"
                                },
                                color: '#475569',
                                maxRotation: window.innerWidth <= 480 ? 45 : 0,
                                minRotation: window.innerWidth <= 480 ? 45 : 0,
                                maxTicksLimit: window.innerWidth <= 480 ? 6 : undefined
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            updateChart();
        }

        function getFilteredData(filter) {
            const now = new Date();
            let filteredExpenses = [];
            let filteredIncome = [];

            if (filter === 'all') {
                // All time - group by month
                const incomeByMonth = {};
                const expenseByMonth = {};

                // Add current month if there's monthly income
                if (monthlyIncome > 0) {
                    const currentMonthKey = now.getFullYear() + '-' + String(now.getMonth() + 1).padStart(2, '0');
                    incomeByMonth[currentMonthKey] = monthlyIncome;
                }

                // Add monthly income for each month that has expenses
                if (monthlyIncome > 0 && expenses.length > 0) {
                    expenses.forEach(expense => {
                        const date = new Date(expense.date);
                        const monthKey = date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0');
                        if (!incomeByMonth[monthKey]) {
                            incomeByMonth[monthKey] = monthlyIncome;
                        }
                    });
                }

                // Add extra budget history to income by month
                extraBudgetHistory.forEach(historyItem => {
                    const date = new Date(historyItem.date);
                    const monthKey = date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0');
                    if (!incomeByMonth[monthKey]) {
                        incomeByMonth[monthKey] = 0;
                    }
                    incomeByMonth[monthKey] += historyItem.amount;
                });

                // Group expenses by month
                expenses.forEach(expense => {
                    const date = new Date(expense.date);
                    const monthKey = date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0');
                    if (!expenseByMonth[monthKey]) {
                        expenseByMonth[monthKey] = 0;
                    }
                    expenseByMonth[monthKey] += expense.amount;
                });

                // If no expenses but has income, show current month
                if (Object.keys(expenseByMonth).length === 0 && monthlyIncome > 0) {
                    const currentMonthKey = now.getFullYear() + '-' + String(now.getMonth() + 1).padStart(2, '0');
                    expenseByMonth[currentMonthKey] = 0;
                }

                const allMonths = [...new Set([...Object.keys(incomeByMonth), ...Object.keys(expenseByMonth)])].sort();
                
                // If still empty, show at least current month
                if (allMonths.length === 0) {
                    const currentMonthKey = now.getFullYear() + '-' + String(now.getMonth() + 1).padStart(2, '0');
                    allMonths.push(currentMonthKey);
                }
                
                return {
                    labels: allMonths.map(key => {
                        const [year, month] = key.split('-');
                        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                        return monthNames[parseInt(month) - 1] + ' ' + year;
                    }),
                    income: allMonths.map(key => incomeByMonth[key] || 0),
                    expense: allMonths.map(key => expenseByMonth[key] || 0)
                };
            } else if (filter === 'year') {
                // Last 12 months
                const incomeByMonth = {};
                const expenseByMonth = {};

                for (let i = 11; i >= 0; i--) {
                    const date = new Date(now.getFullYear(), now.getMonth() - i, 1);
                    const monthKey = date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0');
                    incomeByMonth[monthKey] = monthlyIncome;
                    expenseByMonth[monthKey] = 0;
                }

                // Add extra budget history to income by month
                extraBudgetHistory.forEach(historyItem => {
                    const date = new Date(historyItem.date);
                    const monthKey = date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0');
                    if (incomeByMonth[monthKey] !== undefined) {
                        incomeByMonth[monthKey] += historyItem.amount;
                    }
                });

                expenses.forEach(expense => {
                    const date = new Date(expense.date);
                    const monthKey = date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0');
                    if (expenseByMonth[monthKey] !== undefined) {
                        expenseByMonth[monthKey] += expense.amount;
                    }
                });

                const months = Object.keys(incomeByMonth).sort();
                return {
                    labels: months.map(key => {
                        const [year, month] = key.split('-');
                        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                        return monthNames[parseInt(month) - 1] + ' ' + year;
                    }),
                    income: months.map(key => incomeByMonth[key] || 0),
                    expense: months.map(key => expenseByMonth[key] || 0)
                };
            } else if (filter === 'month') {
                // Last 30 days
                const incomeByDay = {};
                const expenseByDay = {};

                for (let i = 29; i >= 0; i--) {
                    const date = new Date(now);
                    date.setDate(date.getDate() - i);
                    const dayKey = date.toISOString().split('T')[0];
                    incomeByDay[dayKey] = monthlyIncome / 30; // Daily average
                    expenseByDay[dayKey] = 0;
                }

                // Add extra budget history to income
                extraBudgetHistory.forEach(historyItem => {
                    const historyDate = new Date(historyItem.date).toISOString().split('T')[0];
                    if (incomeByDay[historyDate] !== undefined) {
                        incomeByDay[historyDate] += historyItem.amount;
                    }
                });

                expenses.forEach(expense => {
                    const expenseDate = new Date(expense.date).toISOString().split('T')[0];
                    if (expenseByDay[expenseDate] !== undefined) {
                        expenseByDay[expenseDate] += expense.amount;
                    }
                });

                const days = Object.keys(incomeByDay).sort();
                return {
                    labels: days.map(day => {
                        const date = new Date(day);
                        return date.getDate() + ' ' + ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'][date.getMonth()];
                    }),
                    income: days.map(key => incomeByDay[key] || 0),
                    expense: days.map(key => expenseByDay[key] || 0)
                };
            } else if (filter === 'week') {
                // Last 7 days
                const incomeByDay = {};
                const expenseByDay = {};

                for (let i = 6; i >= 0; i--) {
                    const date = new Date(now);
                    date.setDate(date.getDate() - i);
                    const dayKey = date.toISOString().split('T')[0];
                    incomeByDay[dayKey] = monthlyIncome / 30; // Daily average
                    expenseByDay[dayKey] = 0;
                }

                // Add extra budget history to income
                extraBudgetHistory.forEach(historyItem => {
                    const historyDate = new Date(historyItem.date).toISOString().split('T')[0];
                    if (incomeByDay[historyDate] !== undefined) {
                        incomeByDay[historyDate] += historyItem.amount;
                    }
                });

                expenses.forEach(expense => {
                    const expenseDate = new Date(expense.date).toISOString().split('T')[0];
                    if (expenseByDay[expenseDate] !== undefined) {
                        expenseByDay[expenseDate] += expense.amount;
                    }
                });

                const days = Object.keys(incomeByDay).sort();
                return {
                    labels: days.map(day => {
                        const date = new Date(day);
                        const dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                        return dayNames[date.getDay()] + ', ' + date.getDate();
                    }),
                    income: days.map(key => incomeByDay[key] || 0),
                    expense: days.map(key => expenseByDay[key] || 0)
                };
            } else if (filter === 'day') {
                // Last 24 hours (grouped by hour)
                const incomeByHour = {};
                const expenseByHour = {};

                for (let i = 23; i >= 0; i--) {
                    const date = new Date(now);
                    date.setHours(date.getHours() - i, 0, 0, 0);
                    const hourKey = date.getHours();
                    incomeByHour[hourKey] = monthlyIncome / (30 * 24); // Hourly average
                    expenseByHour[hourKey] = 0;
                }

                // Add extra budget history to income (for today only)
                const today = new Date();
                extraBudgetHistory.forEach(historyItem => {
                    const historyDate = new Date(historyItem.date);
                    if (historyDate.toDateString() === today.toDateString()) {
                        const hour = historyDate.getHours();
                        if (incomeByHour[hour] !== undefined) {
                            incomeByHour[hour] += historyItem.amount;
                        }
                    }
                });

                expenses.forEach(expense => {
                    const expenseDate = new Date(expense.date);
                    if (expenseDate.toDateString() === today.toDateString()) {
                        const hour = expenseDate.getHours();
                        if (expenseByHour[hour] !== undefined) {
                            expenseByHour[hour] += expense.amount;
                        }
                    }
                });

                const hours = Object.keys(incomeByHour).sort((a, b) => a - b);
                return {
                    labels: hours.map(hour => hour + ':00'),
                    income: hours.map(key => incomeByHour[key] || 0),
                    expense: hours.map(key => expenseByHour[key] || 0)
                };
            }

            return { labels: [], income: [], expense: [] };
        }

        function updateChart() {
            if (!incomeExpenseChart) return;

            const data = getFilteredData(currentChartFilter);
            
            incomeExpenseChart.data.labels = data.labels;
            incomeExpenseChart.data.datasets[0].data = data.income;
            incomeExpenseChart.data.datasets[1].data = data.expense;
            incomeExpenseChart.update('active');
        }

        window.updateChartFilter = function(filter) {
            currentChartFilter = filter;
            
            // Update select value
            const selectElement = document.getElementById('chartFilterSelect');
            if (selectElement) {
                selectElement.value = filter;
            }

            updateChart();
        };

        // Make updateChart globally accessible for when expenses change
        window.updateExpenseChart = updateChart;

        // Handle window resize for chart
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                if (incomeExpenseChart) {
                    // Update legend options based on new window size
                    const isMobile = window.innerWidth <= 480;
                    const isTablet = window.innerWidth <= 768;
                    
                    incomeExpenseChart.options.plugins.legend.position = 'bottom';
                    incomeExpenseChart.options.plugins.legend.labels.padding = isMobile ? 8 : (isTablet ? 16 : 20);
                    incomeExpenseChart.options.plugins.legend.labels.font.size = isMobile ? 10 : (isTablet ? 11 : 13);
                    incomeExpenseChart.options.plugins.legend.labels.boxWidth = isMobile ? 10 : (isTablet ? 11 : 13);
                    incomeExpenseChart.options.plugins.legend.labels.boxHeight = isMobile ? 10 : (isTablet ? 11 : 13);
                    incomeExpenseChart.options.plugins.legend.padding.top = isMobile ? 5 : (isTablet ? 20 : 25);
                    incomeExpenseChart.options.plugins.legend.padding.bottom = isMobile ? 10 : (isTablet ? 15 : 20);
                    
                    incomeExpenseChart.resize();
                    incomeExpenseChart.update();
                }
            }, 250);
        });

        // Initialize
        updateTotal();
        updateRemainingBudget();
        
        // Initialize chart
        setTimeout(() => {
            const chartCanvas = document.getElementById('incomeExpenseChart');
            if (chartCanvas) {
                initializeChart();
            }
        }, 100);
        
        // Enter key for income input
        const incomeInputEl = document.getElementById('monthlyIncome');
        if (incomeInputEl) {
            incomeInputEl.addEventListener('keypress', function(e) {
                if (e.key === 'Enter' && !incomeLocked) {
                    saveIncome();
                }
            });
        }
        
        // Ensure remaining budget is updated on page load with correct values
        setTimeout(() => {
            updateRemainingBudget();
        }, 100);
    </script>
</body>
</html>
