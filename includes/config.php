<?php
// ─────────────────────────────────────────────
// Site-wide Configuration
// ─────────────────────────────────────────────

define('SITE', [
    'name'        => 'Niño R. Hisula',
    'role'        => 'UI/UX Designer & Front-End Developer',
    'tagline'     => 'I design beautiful, user-friendly interfaces and bring them to life with clean, modern code.',
    'email'       => 'nino.hisula@example.com',
    'github'      => 'https://github.com/',
    'linkedin'    => 'https://linkedin.com/',
    'twitter'     => 'https://twitter.com/',
    'description' => 'Personal portfolio of Niño R. Hisula — UI/UX Designer and Front-End Developer specializing in responsive web design and user experience.',
]);

// ─────────────────────────────────────────────
// Skills Data
// ─────────────────────────────────────────────
define('SKILLS', [
    'UI/UX Design' => [
        ['name' => 'Figma',                  'level' => 85],
        ['name' => 'Wireframing',            'level' => 88],
        ['name' => 'Prototyping',            'level' => 82],
        ['name' => 'User Interface Design',  'level' => 86],
        ['name' => 'Canva',                  'level' => 90],
    ],
    'Front-End Development' => [
        ['name' => 'HTML5 / CSS3',           'level' => 90],
        ['name' => 'JavaScript (ES6)',        'level' => 78],
        ['name' => 'Bootstrap 5',            'level' => 88],
        ['name' => 'Responsive Web Design',  'level' => 85],
    ],
    'Tools & Others' => [
        ['name' => 'Git & GitHub',           'level' => 80],
        ['name' => 'PHP / MySQL',            'level' => 75],
        ['name' => 'Cisco Packet Tracer',    'level' => 78],
        ['name' => 'VS Code',                'level' => 90],
    ],
]);

// ─────────────────────────────────────────────
// Projects Data
// ─────────────────────────────────────────────
define('PROJECTS', [
    [
        'id'          => 'proj-1',
        'title'       => 'AidLens – Welfare Monitoring System',
        'category'    => 'Capstone',
        'description' => 'An analytics-driven welfare monitoring system with beneficiary urgency classification and distribution clustering, developed for the City Social Welfare and Development Office, Panabo City.',
        'tags'        => ['PHP', 'Laravel', 'MySQL', 'Chart.js', 'Bootstrap 5'],
        'image'       => ASSETS_PATH . '/images/project1.jpg',
        'github'      => 'https://github.com/',
        'demo'        => '#',
        'long_desc'   => 'AidLens is a full-stack capstone project built for the CSWDO of Panabo City, Davao Del Norte. It automates beneficiary tracking, classifies urgency levels using data analytics, and clusters distributions for efficient welfare delivery. Presented and deployed from February to March 2026 by a team of 4th year BSIT students from Davao Del Norte State College.',
    ],
    [
        'id'          => 'proj-2',
        'title'       => 'Student Information System',
        'category'    => 'Full-Stack',
        'description' => 'A web-based student information system for managing enrollment, grades, and academic records for a school department.',
        'tags'        => ['PHP', 'MySQL', 'Bootstrap 5', 'JavaScript'],
        'image'       => ASSETS_PATH . '/images/project2.png',
        'github'      => 'https://github.com/',
        'demo'        => '#',
        'long_desc'   => 'Developed as a school project during 3rd year, this Student Information System handles student enrollment, subject loading, grade encoding, and report generation. Built with native PHP and MySQL with a responsive Bootstrap 5 interface. Supports multiple user roles: admin, faculty, and student.',
    ],
    [
        'id'          => 'proj-3',
        'title'       => 'Network Topology Design',
        'category'    => 'Networking',
        'description' => 'A simulated enterprise network topology using Cisco Packet Tracer, implementing VLANs, routing protocols, and network security configurations.',
        'tags'        => ['Cisco Packet Tracer', 'VLAN', 'RIP', 'OSPF', 'Networking'],
        'image'       => ASSETS_PATH . '/images/project3.png',
        'github'      => '#',
        'demo'        => '#',
        'long_desc'   => 'Designed and simulated a multi-branch enterprise network using Cisco Packet Tracer. The topology includes VLAN segmentation, inter-VLAN routing, OSPF dynamic routing, DHCP configuration, and access control lists (ACL) for network security. Completed as part of the networking coursework and Cisco Networking Academy training.',
    ],
    [
        'id'          => 'proj-4',
        'title'       => 'Point of Sale System',
        'category'    => 'Full-Stack',
        'description' => 'A simple POS system built during internship for a local business, featuring product management, sales transactions, and daily sales reports.',
        'tags'        => ['PHP', 'MySQL', 'Bootstrap 5', 'JavaScript', 'XAMPP'],
        'image'       => ASSETS_PATH . '/images/project4.png',
        'github'      => 'https://github.com/',
        'demo'        => '#',
        'long_desc'   => 'Developed during internship as a practical solution for a small local business. Features include product catalog management, cashier transaction interface, receipt generation, inventory tracking, and daily/monthly sales reports with visual charts. Built with PHP, MySQL, and Bootstrap 5 running on a local XAMPP environment.',
    ],
    [
        'id'          => 'proj-5',
        'title'       => 'Ethical Hacking Lab Portfolio',
        'category'    => 'Security',
        'description' => 'A collection of ethical hacking exercises and vulnerability assessments completed under the Cisco Networking Academy Ethical Hacker course.',
        'tags'        => ['Ethical Hacking', 'Kali Linux', 'Nmap', 'Metasploit', 'Cisco'],
        'image'       => ASSETS_PATH . '/images/project5.png',
        'github'      => '#',
        'demo'        => '#',
        'long_desc'   => 'A hands-on lab portfolio documenting penetration testing techniques and vulnerability assessment exercises completed through the Cisco Networking Academy Ethical Hacker program. Covers reconnaissance, scanning, exploitation, and reporting using tools such as Nmap, Metasploit, Wireshark, and Kali Linux. Completed and certified on November 27, 2025.',
    ],
    [
        'id'          => 'proj-6',
        'title'       => 'Personal Portfolio Website',
        'category'    => 'Frontend',
        'description' => 'This responsive personal portfolio website showcasing projects, skills, and certifications — built with pure PHP, Bootstrap 5, and custom CSS.',
        'tags'        => ['PHP', 'Bootstrap 5', 'CSS3', 'JavaScript', 'AOS'],
        'image'       => ASSETS_PATH . '/images/project6.png',
        'github'      => 'https://github.com/',
        'demo'        => '#',
        'long_desc'   => 'Designed and built this portfolio website from scratch using PHP for templating, Bootstrap 5 for responsive layout, and custom CSS for a dark-themed aesthetic with gradient accents. Features include a certificate lightbox gallery, animated skill bars, project modals, and a working contact form — all without any JavaScript framework.',
    ],
]);

// ─────────────────────────────────────────────
// Certificates Data
// ─────────────────────────────────────────────
define('CERTIFICATES', [
    [
        'id'         => 'cert-1',
        'title'      => 'Capstone Certificate of Completion',
        'issuer'     => 'Davao Del Norte State College',
        'date'       => 'April 13, 2026',
        'expires'    => null,
        'credential' => null,
        'image_path' => ASSETS_PATH . '/images/certs/cert-aidlens.png',
        'color'      => '#1a3c8f',
        'icon'       => 'bi-mortarboard-fill',
        'tags'       => ['Capstone', 'BSIT', 'AidLens', 'DDNSC'],
    ],
    [
        'id'         => 'cert-2',
        'title'      => 'Advanced Seminar Series',
        'issuer'     => 'Davao Del Norte State College',
        'date'       => 'October 17, 2025',
        'expires'    => null,
        'credential' => null,
        'image_path' => ASSETS_PATH . '/images/certs/cert-seminar.jpg',
        'color'      => '#6b21a8',
        'icon'       => 'bi-person-video3',
        'tags'       => ['Seminar', 'IT Specialist', 'BSIT', 'Virtual'],
    ],
    [
        'id'         => 'cert-3',
        'title'      => 'Ethical Hacker',
        'issuer'     => 'Cisco Networking Academy',
        'date'       => 'November 27, 2025',
        'expires'    => null,
        'credential' => null,
        'image_path' => ASSETS_PATH . '/images/certs/cert-ethical-hacker.jpg',
        'color'      => '#0ea5e9',
        'icon'       => 'bi-shield-lock-fill',
        'tags'       => ['Cybersecurity', 'Ethical Hacking', 'Cisco'],
    ],
    [
        'id'         => 'cert-4',
        'title'      => 'JavaScript Essentials 1',
        'issuer'     => 'Cisco Networking Academy',
        'date'       => 'April 14, 2026',
        'expires'    => null,
        'credential' => null,
        'image_path' => ASSETS_PATH . '/images/certs/cert-js-essentials.jpg',
        'color'      => '#f59e0b',
        'icon'       => 'bi-filetype-js',
        'tags'       => ['JavaScript', 'Web Dev', 'Cisco'],
    ],
    [
        'id'         => 'cert-5',
        'title'      => 'Getting Started with Cisco Packet Tracer',
        'issuer'     => 'Cisco Networking Academy',
        'date'       => 'January 26, 2024',
        'expires'    => null,
        'credential' => null,
        'image_path' => ASSETS_PATH . '/images/certs/cert-packet-tracer.jpg',
        'color'      => '#10b981',
        'icon'       => 'bi-diagram-3-fill',
        'tags'       => ['Networking', 'Packet Tracer', 'Cisco'],
    ],
]);
