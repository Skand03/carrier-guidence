
<style>
    .navbar {
        background-color: var(--primary-color, #4361ee) !important;
        padding: 12px 0 !important;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.15) !important;
        position: sticky !important;
        top: 0 !important;
        z-index: 2000 !important;
        width: 100% !important;
        display: block !important;
    }
    #mitra-navbar-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        padding: 0 20px !important;
        width: 100% !important;
        box-sizing: border-box !important;
    }
    .navbar-logo {
        color: white !important;
        text-decoration: none !important;
        font-size: 26px !important;
        font-weight: 800 !important;
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
        flex-shrink: 0 !important;
        margin-right: 20px !important;
    }
    .navbar-links {
        display: flex !important;
        gap: 30px !important;
        align-items: center !important;
        flex-wrap: nowrap !important;
        list-style: none !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    .navbar-link {
        color: white !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        transition: all 0.3s !important;
        font-size: 16px !important;
        white-space: nowrap !important;
    }
    .navbar-link:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }
    .navbar-user-info {
        color: rgba(255, 255, 255, 0.9);
        font-size: 14px;
        font-weight: 500;
        padding-right: 10px;
        border-right: 1px solid rgba(255, 255, 255, 0.3);
        margin-right: -10px;
    }
    .navbar-btn {
        background-color: white;
        color: var(--primary-color, #4361ee) !important;
        padding: 8px 22px;
        border-radius: 10px;
        font-weight: 700;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .navbar-btn:hover {
        background-color: #f8f9fa;
        transform: translateY(-2px) !important;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        opacity: 1 !important;
    }
    @media (max-width: 768px) {
        .navbar-links {
            gap: 15px;
        }
        .navbar-logo span {
            display: none;
        }
        .navbar-link {
            font-size: 14px;
        }
        .navbar-user-info {
            display: none;
        }
    }
</style>

<nav class="navbar">
    <div id="mitra-navbar-container" style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 20px; width: 100%; box-sizing: border-box;">
        <a href="index.php" class="navbar-logo">
            <i class="fas fa-brain"></i> <span>Mitra</span>
        </a>
        <div class="navbar-links" style="display: flex; gap: 30px; align-items: center;">
            <a href="Dashboard.php" class="navbar-link">Career Guidance</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <span class="navbar-user-info">Hi, <?php echo htmlspecialchars(explode(' ', $_SESSION['user_name'] ?? 'User')[0]); ?></span>
                <a href="logout.php" class="navbar-link navbar-btn">Logout</a>
            <?php else: ?>
                <a href="loginPage.php" class="navbar-link">Login</a>
                <a href="registerPage.php" class="navbar-link navbar-btn">Sign up</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
