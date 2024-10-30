<?php

namespace Database\Seeders;

use App\Models\Faq;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Faq::factory(10)->create();

        $data = [
            [
                'question' => 'What is Million Quotes?',
                'answer' => 'Million Quotes is a comprehensive quote database designed to inspire and uplift individuals daily through a curated collection of motivational and inspirational quotes from various authors, thinkers, and leaders.',
                'order_position' => 1,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'How can I access Million Quotes?',
                'answer' => 'You can access Million Quotes through our website or mobile application, available for download on major app stores. Simply create an account to start exploring our extensive quote library.',
                'order_position' => 2,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Is there a cost to use Million Quotes?',
                'answer' => 'Million Quotes offers a free version with access to a wide range of quotes. We also provide a premium subscription that unlocks additional features, such as personalized quotes, ad-free browsing, and exclusive content.',
                'order_position' => 3,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Can I submit my own quotes to Million Quotes?',
                'answer' => 'Yes! We welcome users to contribute their own quotes. You can submit your quotes through our website or app, and our team will review them for inclusion in the database.',
                'order_position' => 4,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'How are quotes categorized in Million Quotes?',
                'answer' => 'Quotes in Million Quotes are categorized by themes such as motivation, success, love, happiness, and more. You can easily browse through categories or use the search function to find quotes that resonate with you.',
                'order_position' => 5,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Can I share quotes from Million Quotes on social media?',
                'answer' => 'Absolutely! You can easily share your favorite quotes directly from our platform to various social media platforms. Just click the share button next to any quote you wish to share.',
                'order_position' => 6,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Is there a daily quote feature?',
                'answer' => 'Yes! Million Quotes offers a daily quote feature that delivers a fresh inspirational quote to your inbox or app notification every day. You can opt to receive these notifications during your preferred time.',
                'order_position' => 7,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Can I save my favorite quotes?',
                'answer' => 'Yes, you can save your favorite quotes by adding them to your personal favorites list within the app or website. This allows you to easily revisit and reflect on quotes that inspire you.',
                'order_position' => 8,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'How does Million Quotes ensure the quality of its content?',
                'answer' => 'Our team carefully curates quotes from reputable sources and authors. We also encourage community input and feedback to maintain high standards for the quotes featured in our database.',
                'order_position' => 9,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'How can I contact support if I have issues or questions?',
                'answer' => 'If you have any issues or questions regarding Million Quotes, you can reach out to our support team through the Contact Us section on our website or app. We are here to assist you!',
                'order_position' => 10,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],



//  Million Facts
            // [
            //     'question' => 'What is The Million Facts?',
            //     'answer' => 'The Million Facts is a dedicated platform that curates and shares a plethora of interesting and random facts. Our goal is to provide an endless supply of knowledge that can entertain, educate, and spark curiosity.',
            //     'order_position' => 1,
            //     'status' => 'active',
            //     'created_at' => Carbon::now(),
            // ],
            // [
            //     'question' => 'Where can I find these facts?',
            //     'answer' => 'You can find our facts on our website, social media platforms, and through our newsletters. We regularly update our content to keep it fresh and engaging.',
            //     'order_position' => 2,
            //     'status' => 'active',
            //     'created_at' => Carbon::now(),
            // ],
            // [
            //     'question' => 'Can I submit my own facts to The Million Facts?',
            //     'answer' => 'Yes! We encourage our community to contribute. If you have an interesting or random fact, please submit it through our submission form on the website.',
            //     'order_position' => 3,
            //     'status' => 'active',
            //     'created_at' => Carbon::now(),
            // ],
            // [
            //     'question' => 'Are the facts verified for accuracy?',
            //     'answer' => 'Yes, we strive to provide accurate and reliable information. Our team conducts thorough research to verify the facts before sharing them with our audience.',
            //     'order_position' => 4,
            //     'status' => 'active',
            //     'created_at' => Carbon::now(),
            // ],
            // [
            //     'question' => 'How often do you update your content?',
            //     'answer' => 'We update our content regularly, with new facts added daily. Be sure to check back often for the latest interesting tidbits!',
            //     'order_position' => 5,
            //     'status' => 'active',
            //     'created_at' => Carbon::now(),
            // ],
            // [
            //     'question' => 'Can I use the facts for educational purposes?',
            //     'answer' => 'Absolutely! Our facts can be used for educational purposes, presentations, or simply to impress your friends. Just be sure to credit The Million Facts as your source.',
            //     'order_position' => 6,
            //     'status' => 'active',
            //     'created_at' => Carbon::now(),
            // ],
            // [
            //     'question' => 'Is there a subscription fee to access the facts?',
            //     'answer' => 'No, The Million Facts is completely free to access. We believe in sharing knowledge with everyone without any barriers.',
            //     'order_position' => 7,
            //     'status' => 'active',
            //     'created_at' => Carbon::now(),
            // ],
            // [
            //     'question' => 'Do you have a mobile app?',
            //     'answer' => 'Currently, we do not have a mobile app, but our website is mobile-friendly and can be easily accessed from your smartphone or tablet.',
            //     'order_position' => 8,
            //     'status' => 'active',
            //     'created_at' => Carbon::now(),
            // ],
            // [
            //     'question' => 'Can I follow you on social media?',
            //     'answer' => 'Yes! We are active on various social media platforms including Facebook, Twitter, and Instagram. Follow us to get daily doses of fascinating facts right in your feed!',
            //     'order_position' => 9,
            //     'status' => 'active',
            //     'created_at' => Carbon::now(),
            // ],
            // [
            //     'question' => 'How can I stay updated with the latest facts?',
            //     'answer' => 'You can subscribe to our newsletter on our website to receive the latest facts directly in your inbox. Additionally, following us on social media will keep you in the loop about our newest content.',
            //     'order_position' => 10,
            //     'status' => 'active',
            //     'created_at' => Carbon::now(),
            // ],
        ];

        Faq::insert($data);
    }
}
