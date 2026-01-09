<form action="#" method="POST" class="space-y-4">
    @csrf
    <input type="text" name="full_name" placeholder="Full Name" required class="w-full px-4 py-2 border rounded-lg ...">
    <input type="tel" name="phone_number" placeholder="Phone Number" required class="...">
    <input type="email" name="email" placeholder="Email Address" required class="...">
    <textarea name="message" placeholder="Your Message" rows="4" required class="..."></textarea>
    <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg ...">Send Message</button>
</form>