<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Form Message</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f6f6f6; padding:20px;">
    <div style="max-width:600px; margin:auto; background:white; border-radius:12px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.1);">
        <div style="background: linear-gradient(to right, #6A3318, #661437, #6A4E0F); padding:30px; text-align:center;">
            <h1 style="color:white; margin:0; font-size:28px;">New Message from Website</h1>
        </div>
        <div style="padding:30px; line-height:1.7;">
            <p><strong>From:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> <a href="mailto:{{ $email }}">{{ $email }}</a></p>
            <p><strong>Subject:</strong> {{ $subject }}</p>
            <hr style="border:1px solid #eee; margin:25px 0;">
            <h3>Message:</h3>
            <p style="background:#f9f9f9; padding:20px; border-radius:8px; white-space: pre-wrap;">{{ $message }}</p>
            <p style="margin-top:30px; color:#666;">
                Sent on {{ now()->format('d M Y \a\t H:i') }}
            </p>
        </div>
    </div>
</body>
</html>