<x-layouts.app title="eTalent FAQ">

<section class="max-w-5xl mx-auto px-6 py-16">
    <!-- Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Find answers to common questions about our online courses, payments, and physical training centers.
        </p>
    </div>

    <!-- FAQ Items -->
    <div class="space-y-6">

        {{-- General --}}
        <div>
            <h2 class="text-xl font-semibold text-indigo-600 mb-4">General Questions</h2>

            <div class="space-y-4">
                <details class="group bg-white shadow-sm rounded-lg p-5 border">
                    <summary class="cursor-pointer font-medium text-gray-800 flex justify-between items-center">
                        What is eTalent?
                        <span class="group-open:rotate-180 transition">⌄</span>
                    </summary>
                    <p class="mt-3 text-gray-600">
                        eTalent is a learning platform that allows students to enroll in online courses, watch video lessons,
                        and also register for physical training at our certified learning centers.
                    </p>
                </details>

                <details class="group bg-white shadow-sm rounded-lg p-5 border">
                    <summary class="cursor-pointer font-medium text-gray-800 flex justify-between items-center">
                        Who can use the platform?
                        <span class="group-open:rotate-180 transition">⌄</span>
                    </summary>
                    <p class="mt-3 text-gray-600">
                        Anyone! Whether you're a beginner, student, graduate, or working professional, our courses are designed
                        to support all skill levels.
                    </p>
                </details>
            </div>
        </div>

        {{-- Payments --}}
        <div>
            <h2 class="text-xl font-semibold text-indigo-600 mb-4">Payments & Course Access</h2>

            <div class="space-y-4">
                <details class="group bg-white shadow-sm rounded-lg p-5 border">
                    <summary class="cursor-pointer font-medium text-gray-800 flex justify-between items-center">
                        Do I need to pay before accessing a course?
                        <span class="group-open:rotate-180 transition">⌄</span>
                    </summary>
                    <p class="mt-3 text-gray-600">
                        Yes. Once payment is confirmed, you will automatically gain full access to the course videos and learning materials.
                    </p>
                </details>

                <details class="group bg-white shadow-sm rounded-lg p-5 border">
                    <summary class="cursor-pointer font-medium text-gray-800 flex justify-between items-center">
                        What payment methods are supported?
                        <span class="group-open:rotate-180 transition">⌄</span>
                    </summary>
                    <p class="mt-3 text-gray-600">
                        We support secure online payments such as debit cards, bank transfers, and other supported payment gateways on the platform.
                    </p>
                </details>

                <details class="group bg-white shadow-sm rounded-lg p-5 border">
                    <summary class="cursor-pointer font-medium text-gray-800 flex justify-between items-center">
                        Will I lose access after some time?
                        <span class="group-open:rotate-180 transition">⌄</span>
                    </summary>
                    <p class="mt-3 text-gray-600">
                        No. Once you purchase a course, you retain lifetime access unless otherwise stated for a specific program.
                    </p>
                </details>
            </div>
        </div>

        {{-- Online Learning --}}
        <div>
            <h2 class="text-xl font-semibold text-indigo-600 mb-4">Online Learning</h2>

            <div class="space-y-4">
                <details class="group bg-white shadow-sm rounded-lg p-5 border">
                    <summary class="cursor-pointer font-medium text-gray-800 flex justify-between items-center">
                        How do I watch my course videos?
                        <span class="group-open:rotate-180 transition">⌄</span>
                    </summary>
                    <p class="mt-3 text-gray-600">
                        After enrolling, go to your dashboard and click on your course. You will see all available video lessons there.
                    </p>
                </details>

                <details class="group bg-white shadow-sm rounded-lg p-5 border">
                    <summary class="cursor-pointer font-medium text-gray-800 flex justify-between items-center">
                        Can I use my phone to learn?
                        <span class="group-open:rotate-180 transition">⌄</span>
                    </summary>
                    <p class="mt-3 text-gray-600">
                        Yes. Our platform works smoothly on mobile phones, tablets, and desktop devices.
                    </p>
                </details>
            </div>
        </div>

        {{-- Physical Centers --}}
        {{-- <div>
            <h2 class="text-xl font-semibold text-indigo-600 mb-4">Physical Training Centers</h2>

            <div class="space-y-4">
                <details class="group bg-white shadow-sm rounded-lg p-5 border">
                    <summary class="cursor-pointer font-medium text-gray-800 flex justify-between items-center">
                        Can I attend classes physically?
                        <span class="group-open:rotate-180 transition">⌄</span>
                    </summary>
                    <p class="mt-3 text-gray-600">
                        Yes. You can register for physical training centers directly from the platform where available.
                    </p>
                </details>

                <details class="group bg-white shadow-sm rounded-lg p-5 border">
                    <summary class="cursor-pointer font-medium text-gray-800 flex justify-between items-center">
                        How do I register for a physical center?
                        <span class="group-open:rotate-180 transition">⌄</span>
                    </summary>
                    <p class="mt-3 text-gray-600">
                        Simply visit the Centers section, choose your preferred location, and complete the registration process.
                    </p>
                </details>

                <details class="group bg-white shadow-sm rounded-lg p-5 border">
                    <summary class="cursor-pointer font-medium text-gray-800 flex justify-between items-center">
                        Are physical classes different from online courses?
                        <span class="group-open:rotate-180 transition">⌄</span>
                    </summary>
                    <p class="mt-3 text-gray-600">
                        Physical classes offer face-to-face mentoring, hands-on practice, and direct interaction with instructors,
                        while online courses provide flexibility to learn at your own pace.
                    </p>
                </details>
            </div>
        </div> --}}

        {{-- Support --}}
        <div>
            <h2 class="text-xl font-semibold text-indigo-600 mb-4">Support & Account</h2>

            <div class="space-y-4">
                <details class="group bg-white shadow-sm rounded-lg p-5 border">
                    <summary class="cursor-pointer font-medium text-gray-800 flex justify-between items-center">
                        What if I forget my password?
                        <span class="group-open:rotate-180 transition">⌄</span>
                    </summary>
                    <p class="mt-3 text-gray-600">
                        You can reset your password using the "Forgot Password" option on the login page.
                    </p>
                </details>

                <details class="group bg-white shadow-sm rounded-lg p-5 border">
                    <summary class="cursor-pointer font-medium text-gray-800 flex justify-between items-center">
                        How can I contact support?
                        <span class="group-open:rotate-180 transition">⌄</span>
                    </summary>
                    <p class="mt-3 text-gray-600">
                        You can contact our support team via the Contact page or send us an email. We respond as quickly as possible.
                    </p>
                </details>
            </div>
        </div>

    </div>
</section>

</x-layouts.app>
