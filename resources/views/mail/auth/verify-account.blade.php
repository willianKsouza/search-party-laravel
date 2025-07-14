<div
    style="background-color: #1e2939; color: #ff6900; font-family: Arial, sans-serif; padding: 20px; border-radius: 8px;">
    <p style="font-weight: bold; font-size: 18px; margin-bottom: 16px;">Hi {{ $user->user_name }},</p>
    <p style="font-size: 16px; line-height: 1.5; margin-bottom: 24px;">
        Thank you for registering! Please click the button below to verify your email address:
    </p>
    <a href="{{ route('verification.verify') }}"
        style="display: inline-block; background-color: transparent; color: #ff6900; border: 2px solid #ff6900; padding: 12px 24px; text-decoration: none; font-weight: bold; border-radius: 4px; margin-bottom: 24px;">
        Verify Email
    </a>
    <p style="font-size: 14px; margin-top: 24px;">
        If you did not create an account, no further action is required.
    </p>

    <p style="font-size: 14px; margin-top: 24px;">
        Best regards,<br>
        <strong>Your Company</strong>
    </p>
</div>
