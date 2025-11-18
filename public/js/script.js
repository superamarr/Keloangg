document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', () => {
        const item = button.parentElement;
        const isOpen = item.classList.contains('open');

        // Tutup semua item terlebih dahulu
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));

        // Buka item yang diklik jika belum terbuka
        if (!isOpen) item.classList.add('open');
    });
});

// Hamburger Menu Toggle
const hamburgerBtn = document.getElementById('hamburgerBtn');
const hamburgerCloseBtn = document.getElementById('hamburgerCloseBtn');
const mobileMenu = document.getElementById('mobileMenu');
const closeMenuBtn = document.getElementById('closeMenuBtn');
const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');

function openMobileMenu() {
    mobileMenu.classList.add('active');
    mobileMenuOverlay.classList.add('active');
    hamburgerBtn.classList.add('active');
    if (hamburgerCloseBtn) hamburgerCloseBtn.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeMobileMenu() {
    mobileMenu.classList.remove('active');
    mobileMenuOverlay.classList.remove('active');
    hamburgerBtn.classList.remove('active');
    if (hamburgerCloseBtn) hamburgerCloseBtn.classList.remove('active');
    document.body.style.overflow = '';
}

if (hamburgerBtn) {
    hamburgerBtn.addEventListener('click', openMobileMenu);
}

if (hamburgerCloseBtn) {
    hamburgerCloseBtn.addEventListener('click', closeMobileMenu);
}

if (closeMenuBtn) {
    closeMenuBtn.addEventListener('click', closeMobileMenu);
}

if (mobileMenuOverlay) {
    mobileMenuOverlay.addEventListener('click', closeMobileMenu);
}

// Mobile Dropdown Toggle
const mobileDropdownToggle = document.querySelector('.mobile-dropdown-toggle');
const mobileDropdown = document.querySelector('.mobile-dropdown');

if (mobileDropdownToggle && mobileDropdown) {
    mobileDropdownToggle.addEventListener('click', (e) => {
        e.preventDefault();
        mobileDropdown.classList.toggle('active');
    });
}

// Close menu when clicking on links (except dropdown toggle)
mobileMenuLinks.forEach(link => {
    // Skip dropdown toggle - it should only toggle dropdown, not close menu
    if (!link.classList.contains('mobile-dropdown-toggle')) {
        link.addEventListener('click', () => {
            setTimeout(closeMobileMenu, 300);
        });
    }
});

// Close dropdown when clicking on dropdown links
const mobileDropdownLinks = document.querySelectorAll('.mobile-dropdown-link');
mobileDropdownLinks.forEach(link => {
    link.addEventListener('click', () => {
        setTimeout(closeMobileMenu, 300);
    });
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href !== '#' && href !== '') {
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                const offsetTop = target.offsetTop - 90;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        }
    });
});