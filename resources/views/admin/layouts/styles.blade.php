<style>
    body {
        font-family: 'Inter', sans-serif;
    }

    /* Navbar Smooth Transition */
    #navbar {
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    /* Mobile Menu Toggle Animation */
    .toggle-icon span {
        display: block;
        width: 24px;
        height: 3px;
        background-color: #374151;
        margin: 5px auto;
        transition: all 0.3s ease-in-out;
    }

    .toggle-active span:nth-child(1) {
        transform: translateY(8px) rotate(45deg);
    }

    .toggle-active span:nth-child(2) {
        opacity: 0;
    }

    .toggle-active span:nth-child(3) {
        transform: translateY(-8px) rotate(-45deg);
    }

    /* Dropdown Card Styling */
    .dropdown-card-dekstop {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        min-width: 220px;
        background-color: white;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        overflow: hidden;
        z-index: 50;
    }

    .dropdown:hover .dropdown-card-dekstop {
        display: block;
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-card-dekstop a {
        display: flex;
        align-items: center;
        padding: 10px 16px;
        color: #374151;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    .dropdown-card-dekstop a:hover {
        background-color: #1d4ed8;
        color: white;
    }

    .dropdown-card-dekstop a i {
        margin-right: 8px;
        font-size: 18px;
    }

    /* dropdown mobile */
    .block-element {
        display: block;
        animation: fadeIn 0.3s ease-in-out;
    }

    .dropdown-card-mobile {
        /* display: none; */
        position: absolute;
        top: 100%;
        left: 0;
        min-width: 220px;
        background-color: white;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        /* overflow: hidden; */
        z-index: 50;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-card-mobile a {
        display: flex;
        align-items: center;
        padding: 10px 16px;
        color: #374151;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    /* .dropdown-card-dekstop a:hover {
      background-color: #1d4ed8;
      color: white;
    } */

    .dropdown-card-mobile a i {
        margin-right: 8px;
        font-size: 18px;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
