<h1>Verify Your Email Address</h1>
<p>
    A new verification link has been sent to your email address.
</p>
<p>
    <form action="{{ route('verification.send') }}" method="post">
    @csrf
       If you did not receive the email, please check your spam folder or
    <button type="submit">click here</button> to request another verification link.
    </form>
 
</p>
