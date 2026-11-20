<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(SiteSectionSeeder::class);

        $password = "12345678";

        User::updateOrCreate(
            ['email' => 'abdalftahmohamed054@gmail.com'],
            ['name' => 'Abdalftah Mohamed', 'password' => $password]
        );

        $this->command->warn("Admin login -> email: abdalftahmohamed054@gmail.com | password: {$password}");

        Profile::updateOrCreate(['id' => 1], [
            'name' => 'Abdalftah Mohamed',
            'title' => 'Senior Full Stack Developer',
            'tagline' => 'Building scalable, secure, and high-performance web applications.',
            'bio' => "Full Stack Developer with 4 years of experience specializing in Laravel, PHP, and MySQL, with a proven track record of building scalable, secure, and high-performance web applications. Experienced in designing and developing RESTful APIs, integrating third-party services, optimizing database performance, and implementing secure authentication, authorization, and Role-Based Access Control (RBAC). Strong foundation in MVC architecture, Object-Oriented Programming (OOP), and software design principles, with hands-on experience in real-time applications using Pusher and Livewire. Passionate about writing clean, maintainable code, solving complex technical challenges, and delivering reliable, production-ready backend solutions.",
            'email' => 'abdalftahmohamed054@gmail.com',
            'phone' => '+20 109 152 3688',
            'location' => 'Mansoura, Egypt',
            'github_url' => 'https://github.com/abdalftahmohamed?tab=repositories',
            'linkedin_url' => 'https://www.linkedin.com/in/abdelftah-mohamed-abdalftah-0640831b9',
            'whatsapp_url' => 'https://wa.me/+201091523688',
        ]);

        $skills = [
            // Backend
            ['name' => 'PHP', 'category' => 'backend', 'level' => 100],
            ['name' => 'Laravel', 'category' => 'backend', 'level' => 100],
            ['name' => 'REST APIs', 'category' => 'backend', 'level' => 100],
            ['name' => 'Livewire', 'category' => 'backend', 'level' => 95],
            ['name' => 'Authentication & Authorization', 'category' => 'backend', 'level' => 100],
            ['name' => 'RBAC', 'category' => 'backend', 'level' => 100],

            // Frontend
            ['name' => 'JavaScript', 'category' => 'frontend', 'level' => 95],
            ['name' => 'HTML5', 'category' => 'frontend', 'level' => 100],
            ['name' => 'CSS3', 'category' => 'frontend', 'level' => 100],
            ['name' => 'Tailwind CSS', 'category' => 'frontend', 'level' => 95],
            ['name' => 'Bootstrap', 'category' => 'frontend', 'level' => 100],
            ['name' => 'Responsive Design', 'category' => 'frontend', 'level' => 95],

            // Database
            ['name' => 'MySQL', 'category' => 'database', 'level' => 100],
            ['name' => 'Database Design', 'category' => 'database', 'level' => 100],
            ['name' => 'Query Optimization', 'category' => 'database', 'level' => 95],
            ['name' => 'Database Optimization', 'category' => 'database', 'level' => 95],

            // Architecture & Engineering
            ['name' => 'MVC Architecture', 'category' => 'architecture', 'level' => 100],
            ['name' => 'Object-Oriented Programming', 'category' => 'architecture', 'level' => 100],
            ['name' => 'Clean Code', 'category' => 'architecture', 'level' => 95],
            ['name' => 'Software Architecture', 'category' => 'architecture', 'level' => 95],
            ['name' => 'Scalable Systems', 'category' => 'architecture', 'level' => 95],

            // Integrations
            ['name' => 'Third-Party Integrations', 'category' => 'integration', 'level' => 95],
            ['name' => 'Payment Gateways', 'category' => 'integration', 'level' => 95],
            ['name' => 'Real-Time Applications', 'category' => 'integration', 'level' => 95],
            ['name' => 'Pusher', 'category' => 'integration', 'level' => 95],
            ['name' => 'Webhooks', 'category' => 'integration', 'level' => 95],

            // Tools & DevOps
            ['name' => 'Git', 'category' => 'tools', 'level' => 95],
            ['name' => 'GitHub', 'category' => 'tools', 'level' => 95],
            // ['name' => 'Composer', 'category' => 'tools', 'level' => 100],
            // ['name' => 'Linux', 'category' => 'tools', 'level' => 85],
            // ['name' => 'Docker', 'category' => 'tools', 'level' => 85],
        ];

        foreach ($skills as $i => $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill + ['order' => $i]);
        }

        $projects = [
            [
                'title' => 'ERP System',
                'description' => 'Developed and maintained a large-scale Enterprise Resource Planning (ERP) solution supporting end-to-end business operations across finance, accounting, inventory, procurement, sales, CRM, HR, payroll, POS, and business analytics. Implemented financial workflows including invoicing, payments, expenses, journal entries, tax management, and financial reporting. Built inventory and supply chain modules covering warehouses, stock movements, purchasing, suppliers, product management, and order processing. Developed employee and customer management modules with configurable workflows and Role-Based Access Control (RBAC). Integrated third-party services including payment gateways, email notifications, and external business APIs.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST API', 'Bootstrap'],
                'github_url' => 'https://github.com/abdalftahmohamed/erp-code',
                'live_url' => '#',
                'featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Courses-qlr',
                'description' => 'Developed a full-featured e-learning platform with course management, enrollments, exams, certificates, progress tracking, and role-based access control. Integrated multiple payment gateways including Stripe, Paymob, PayTabs, PayPal, and Fawry. Integrated VdoCipher for secure video streaming and Zoom/Google Meet for live classes. Implemented notifications, student–instructor chat, activity logging, queues, scheduled jobs, and RESTful APIs. Designed maintainable backend architecture using Laravel Services, Eloquent ORM, MySQL, authentication, authorization, and validation.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST API', 'Bootstrap'],
                'github_url' => 'https://github.com/abdalftahmohamed/Courses-qlr',
                'live_url' => '#',
                'featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'TimeDoc – Clinic Management System',
                'description' => 'Built a comprehensive clinic management platform with bilingual Arabic/English support and role-based access control. Developed modules for patient management, appointments, visits, doctors, schedules, medical records, invoices/payments, diagnostic tests and results, and clinic administration. Designed service/repository-based business logic, role-specific dashboards, appointment scheduling and collision validation, and RESTful APIs using Laravel Sanctum. Added extensive feature testing covering core clinical and administrative workflows.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST API', 'Bootstrap'],
                'github_url' => 'https://github.com/abdalftahmohamed/timedocum',
                'live_url' => '#',
                'featured' => true,
                'order' => 3,
            ],
            [
                'title' => 'Velora-car — Car Rental Management System',
                'description' => 'Developed a complete car rental management system for managing vehicles, customers, reservations, payments, and rental operations. Implemented vehicle availability tracking with double-booking prevention, automated rental cost calculation, pickup and return workflows, late-fee handling, role-based access control, notifications, activity logging, and operational dashboards and reports.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST API', 'Bootstrap'],
                'github_url' => 'https://github.com/abdalftahmohamed/Velora-car',
                'live_url' => '#',
                'featured' => true,
                'order' => 4,
            ],
            [
                'title' => 'AVENOR – Perfume E-Commerce Platform',
                'description' => 'Developed a modern e-commerce platform for perfumes and fragrances, featuring product categorization, product listings, shopping cart, checkout, customer accounts, and order management. The platform provides a premium shopping experience with a luxury-focused design tailored to the fragrance brand.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST API', 'Bootstrap'],
                'github_url' => 'https://github.com/abdalftahmohamed/AVENOR',
                'live_url' => '#',
                'featured' => true,
                'order' => 5,
            ],
            [
                'title' => 'LeOffice – Legal Office Management System',
                'description' => 'Built a multi-branch legal management platform with role-based access control and Arabic/English localization. Developed modules for clients, cases, sessions, courts, tasks, invoices/payments, expenses, documents, notifications, and activity logging. Implemented a client portal and CMS for firm content management, along with branch-based data scoping, media management, and permission-based workflows.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST API', 'Bootstrap'],
                'github_url' => 'https://github.com/abdalftahmohamed/leOffice',
                'live_url' => '#',
                'featured' => true,
                'order' => 6,
            ],


        ];
        foreach ($projects as $project) {
            Project::updateOrCreate(['title' => $project['title']], $project);
        }

        $experiences = [

            [
                'company' => 'Hola Company',
                'role' => 'Backend Developer',
                'description' => 'Developed and maintained ERP, accounting, and business management systems using Laravel and PHP. Built financial modules including invoicing, payments, expense tracking, reporting, and business workflow automation. Designed scalable RESTful APIs and optimized complex MySQL queries to improve system performance. Developed reusable backend components and integrated third-party services to support diverse business requirements. Participated in system architecture, database design, feature development, debugging, and performance optimization. Worked on multiple custom web applications across various industries while following clean code and Laravel best practices.',
                'location' => 'Saudi Arabia',
                'start_date' => '2023-01-01',
                'end_date' => '2024-02-01',
                'is_current' => false,
                'order' => 0,
            ],

            [
                'company' => 'Etrevago Company',
                'role' => 'Backend Developer',
                'description' => 'Developed and maintained Learning Management Systems (LMS) and education-focused platforms using Laravel. Built modules for course management, student enrollment, online assessments, attendance tracking, grading, and learning workflows. Designed and implemented RESTful APIs to support web and mobile educational applications. Integrated third-party services, including payment gateways, email notifications, and live communication features. Implemented secure authentication, authorization, and role-based access control for administrators, instructors, students, and parents. Optimized application performance and collaborated with frontend developers to deliver scalable and user-friendly educational solutions.',
                'location' => 'Heliopolis, Cairo, Egypt',
                'start_date' => '2024-02-01',
                'end_date' => '2025-12-01',
                'is_current' => false,
                'order' => 1,
            ],

            [
                'company' => 'SahelBooks®',
                'role' => 'Backend Developer',
                'description' => 'Develop and maintain enterprise-grade ERP solutions using Laravel, PHP, and MySQL. Design and implement scalable RESTful APIs for ERP modules consumed by web and mobile applications. Refactor legacy code into Service and Repository architectures, improving code maintainability and scalability. Integrate third-party services, including payment gateways, email services, and external APIs. Optimize database performance through query optimization, indexing, and caching techniques. Implement secure authentication, authorization, and Role-Based Access Control (RBAC) while collaborating with cross-functional teams to deliver production-ready features.',
                'location' => 'Nasr City, Cairo, Egypt',
                'start_date' => '2025-12-01',
                'end_date' => '2026-11-01',
                'is_current' => true,
                'order' => 2,
            ],

        ];

        foreach ($experiences as $experience) {

            Experience::updateOrCreate(
                [
                    'company' => $experience['company'],
                    'role' => $experience['role'],
                ],
                $experience
            );
        }

        Education::updateOrCreate(['institution' => 'Zagazig university'], [
            'degree' => "Bachelor's degree in computer science",
            'field' => 'Computer Science',
            'start_date' => '2017-10-01',
            'end_date' => '2021-06-01',
            'order' => 0,
        ]);

        $testimonials = [
            [
                'quote' => 'Abdalftah rebuilt our accounting and inventory workflow into one ERP system. The financial reporting alone saved us hours every week, and he was easy to reach whenever we needed changes.',
                'name' => 'Business Owner',
                'role' => 'ERP System client',
            ],
            [
                'quote' => 'We needed a learning platform that could handle payments, live classes, and certificates without breaking. Abdalftah delivered exactly that and explained every technical decision clearly.',
                'name' => 'Platform Founder',
                'role' => 'Edvora LMS client',
            ],
            [
                'quote' => 'Our clinic went from paper schedules to a full booking and records system in a few weeks. Abdalftah paid close attention to how our staff actually work, not just the spec sheet.',
                'name' => 'Clinic Manager',
                'role' => 'TimeDoc EG client',
            ],
            [
                'quote' => 'Case tracking, client portal, multi-branch access, Abdalftah handled the complexity of a legal office without slowing down. Support after launch has been just as reliable.',
                'name' => 'Law Firm Partner',
                'role' => 'LexOffice client',
            ],
            [
                'quote' => 'Clear communication from day one. Abdalftah scoped the API, flagged risks early, and shipped on the timeline he committed to.',
                'name' => 'Startup Founder',
                'role' => 'Product client',
            ],
            [
                'quote' => 'What stood out was the code quality. Everything was organized, tested, and easy for our team to pick up after the project ended.',
                'name' => 'Engineering Lead',
                'role' => 'Backend project client',
            ],
            [
                'quote' => 'We handed Abdalftah a messy set of requirements around roles and permissions, and he turned it into a clean, secure access control system without extra back and forth.',
                'name' => 'Operations Manager',
                'role' => 'RBAC implementation client',
            ],
            [
                'quote' => 'Reliable, responsive, and genuinely invested in getting the details right. I would work with Abdalftah again without hesitation.',
                'name' => 'Product Owner',
                'role' => 'Long-term client',
            ],
        ];

        foreach ($testimonials as $i => $testimonial) {
            Testimonial::updateOrCreate(['name' => $testimonial['name']], $testimonial + ['order' => $i]);
        }
    }
}
