<script>
    // Scroll Effect for Navbar
    const navbar = document.getElementById('navbar');
    const logo = document.getElementById('navbar-logo');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('bg-[rgba(244,244,244,0.8)]', 'shadow-md', 'backdrop-blur-sm');
            navbar.classList.remove('bg-transparent', 'text-white');
            navbar.classList.add('text-gray-800');
            logo.classList.add('text-blue-600');
            logo.classList.remove('text-white');
        } else {
            navbar.classList.add('bg-transparent', 'text-white');
            navbar.classList.remove('bg-[rgba(244,244,244,0.8)]', 'shadow-md', 'text-gray-800',
                'backdrop-blur-sm');
            logo.classList.add('text-white');
            logo.classList.remove('text-blue-600');
        }
    });

    // Mobile Menu Toggle
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        menuToggle.classList.toggle('toggle-active');
    });

    // Dropdown mobile
    const dropButton = document.querySelectorAll('.dropdown button');
    dropButton.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const dropdownCard = this.nextElementSibling; // Cari elemen dropdown-card yang bersangkutan

            // Tutup semua dropdown lainnya
            document.querySelectorAll('.dropdown-card-mobile').forEach(card => {
                if (card !== dropdownCard) {
                    card.classList.add('hidden'); // Sembunyikan dropdown lainnya
                }
            });

            // Toggle dropdown yang diklik
            dropdownCard.classList.toggle('hidden'); // Menampilkan/menyembunyikan dropdown yang diklik
        });
    });
    // end of navbar


    // animasi untuk content
    // Scroll-to-Reveal Animation Template
    const animatedElements = document.querySelectorAll('.animate-hidden');

    const handleScrollAnimation = () => {
        const triggerHeight = window.innerHeight * 0.8; // Adjust visibility threshold
        animatedElements.forEach((el) => {
            const rect = el.getBoundingClientRect();
            // Show element if it's near viewport
            if (rect.top < triggerHeight && rect.bottom > 0) {
                el.classList.add('animate-visible');
                el.classList.remove('animate-hidden');
            } else {
                // Hide element if it's out of view
                el.classList.add('animate-hidden');
                el.classList.remove('animate-visible');
            }
        });
    };

    window.addEventListener('scroll', handleScrollAnimation);

    // CSS animations
    const style = document.createElement('style');
    style.textContent = `
  /* Hidden State */
  .animate-hidden {
    opacity: 0;
    transition: opacity 0.6s ease-in-out, transform 0.6s ease-in-out;
  }

  /* Visible State */
  .animate-visible {
    opacity: 1;
    transition: opacity 0.6s ease-in-out, transform 0.6s ease-in-out;
  }

  /* Animations from Directions */
  .animate-from-left {
    transform: translateX(-50px);
  }
  .animate-visible.animate-from-left {
    transform: translateX(0);
  }

  .animate-from-right {
    transform: translateX(50px);
  }
  .animate-visible.animate-from-right {
    transform: translateX(0);
  }

  .animate-from-top {
    transform: translateY(-50px);
  }
  .animate-visible.animate-from-top {
    transform: translateY(0);
  }
  
  .animate-from-bottom {
    transform: translateY(50px);
  }
  .animate-visible.animate-from-bottom {
    transform: translateY(0);
  }
`;
    document.head.appendChild(style);

    // Initial trigger for elements in view
    document.addEventListener('DOMContentLoaded', () => {
        handleScrollAnimation();
    });
</script>

<!-- untuk struktur organisasi -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.tailwindcss.com"></script>
